<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use ImageKit\ImageKit;

class AdminController extends Controller
{
    public function index()
    {
        return redirect('admin/appointments');
    }

    /**
     * @return Application|Factory|View
     */
    public function products()
    {
        $products = Product::all();
        $categories = ProductCategory::all();
        return view('auth.admin.products', compact('products', 'categories'));
    }

    /**
     * @return RedirectResponse
     * @throws \Exception
     */
    public function storeProducts(Request $request): RedirectResponse
    {
        $imageKit = new ImageKit(
            env('IMAGEKIT_PUBLIC_KEY'),
            env('IMAGEKIT_PRIVATE_KEY'),
            env('IMAGEKIT_URL_ENDPOINT')
        );

        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
            'image_big' => 'required|image|mimes:jpeg,png,jpg',
            'catalogue_number' => 'required'
        ]);

        try {

            if (!$request->hasFile('image_big')) {
                throw new \Exception('Missing product image file');
            }

            $file = $request->file('image_big');
            $file->storeAs('/public/products', $file->getClientOriginalName());

            Product::create([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'price' => $request->input('price'),
                'brand' => $request->input('brand'),
                'category_id' => $request->input('category_id'),
                'image_big' => $file->getClientOriginalName(),
                'image_small' => 'N/a',
                'catalogue_number' => $request->input('catalogue_number')
            ]);

            return redirect()->back()->with('msg', 'Успешно добавихте продукт!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function categories()
    {
        $categories = ProductCategory::all();
        return view('auth.admin.categories', compact('categories'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function appointments(Request $request)
    {
        if (!is_null($request->input('filter'))) {
            $appointments = DB::table('appointments')->join('customers', 'customers.id', '=', 'appointments.client_id')
                ->join('services', 'services.id', '=', 'appointments.service_id')
                ->select('appointments.*', 'services.name as sName', 'customers.name as cName')
                ->where('day', '=', $request->input('filter'))
                ->orderBy('day')->orderBy('from_h')
                ->get();
        } else {
//            $today = Carbon::now();
            $appointments = DB::table('appointments')
//                ->whereBetween('day', [
//                    $today->startOfMonth()->format('Y-m-d'),
//                    $today->endOfMonth()->format('Y-m-d')
//                ])
                ->join('customers', 'customers.id', '=', 'appointments.client_id')
                ->join('services', 'services.id', '=', 'appointments.service_id')
                ->select('appointments.*', 'services.name as sName', 'customers.name as cName')
                ->orderBy('day')
                ->orderBy('from_h')
                ->get();
        }
        $services = Service::all();
        $customers = Customer::all();
        $daysForToday = DB::table('appointments')
            ->where('day', '=', Carbon::today()->format('Y-m-d'))
            ->get();
        return view('auth.admin.appointments', compact('appointments', 'services', 'customers', 'daysForToday'));
    }

    /**
     * @throws \Exception
     */
    public function storeAppointments(Request $request)
    {
        if ($request->input('hours_from') === $request->input('hours_to')) {
            return redirect()->back()->with('msg', 'Не може двата часа да са еднакви');
        }

        $days = DB::table('appointments')
            ->where('day', '=', $request->input('date'))
            ->get();

        foreach ($days as $day) {
            if ($day->from_h === $request->input('hours_from')) {
                return redirect()->back()->with('msg', 'Има запазен клиент за тези часове');
            }

            /**
             * P1 starts between the start and end of P2 (P2.from <= P1.from <= P2.to)
             * P2 starts between the start and end of P1 (P1.from <= P2.from <= P1.to)
             *
             * $from = $day->from_h
             * $from_compare = request
             */

            $from = (float)$day->from_h;
            $to = (float)$day->until_h;
            $from_compare = (float)$request->input('hours_from');
            $to_compare = (float)$request->input('hours_to');

            if (
                ($from > $from_compare && $from < $to_compare) ||
                ($from_compare > $from && $from_compare < $to)
            ) {
                return redirect()->back()->with('msg', 'Има запазен клиент за тези часове');
            }
        }
        try {
            Appointment::create([
                'name' => '?',
                'service_id' => $request->input('service'),
                'client_id' => $request->input('customer'),
                'day' => $request->input('date'),
                'from_h' => $request->input('hours_from'),
                'until_h' => $request->input('hours_to')
            ]);

            return redirect()->back()->with('msg', 'Успешно записа час!');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function services()
    {
        $services = Service::all();
        return view('auth.admin.services', compact('services'));
    }

    public function storeServices(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        try {
            Service::create([
                'name' => $request->input('name'),
                'price' => $request->input('price')
            ]);

            return redirect()->back()->with('msg', 'Успешно добавена услуга!');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function customers()
    {
        $customers = DB::table('customers')->where('name', '<>', 'Анонимен')->get();
        return view('auth.admin.customers', compact('customers'));
    }

    /**
     * @throws \Exception
     */
    public function storeCustomers(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

        try {
            Customer::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile') ?? 'N/a',
                'email' => $request->input('email') ?? 'N/a',
            ]);

            return redirect()->back()->with('msg', 'Успешно добавена клиент!');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function orders()
    {
        $orders = DB::table('orders')
            ->join('shop_customers', 'shop_customers.id', '=', 'orders.customer_id')
            ->select('orders.created_at', 'orders.status', 'orders.id as orderId', 'shop_customers.*')
            ->orderBy('orders.created_at', 'desc')
            ->get();


//        Mail::raw('Имаш нова поръчйа', function ($message) {
//            $message->to('hamamdzhiev@hotmail.com')
//                ->subject('нова поръчка');
//        });

        return \view('auth.admin.orders', compact('orders'));
    }


    public function order($id)
    {
        $order = DB::table('orders as o')
            ->where('o.id', '=', $id)
            ->join('order_product as op', 'op.order_id', '=', 'o.id')
            ->join('products as p', 'p.id', '=', 'op.product_id')
            ->join('shop_customers as sc', 'sc.id', '=', 'o.customer_id')
            ->select(
                'o.status', 'o.shipping_type', 'o.postal_code', 'o.region', 'o.city', 'o.street', 'o.created_at as orderCreatedAt', 'o.id as orderId',
                'p.catalogue_number as productSKU', 'p.price as productPrice', 'p.name as productName',
                'op.amount as productAmount',
                'sc.name as customerName', 'sc.mobile as customerMobile', 'sc.email as customerEmail',
            )
            ->get();


        return \view('auth.admin.order', compact('order'));
    }

    /**
     * @throws \Exception
     */
    public function changeOrderStatus(Request $request, $orderId): RedirectResponse
    {
        $status = $request->input('order_status');

        try {
            DB::table('orders')
                ->where('id', '=', $orderId)
                ->update([
                    'status' => $status
                ]);
            return redirect()->back()->with('msg', 'Успешно променихте статуса на поръчката!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
