<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.admin.admin');
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
     * @return void
     */
    public function storeProducts(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'image_big' => 'required',
            'image_small' => 'required',
            'catalogue_number' => 'required'
        ]);

        dd($request->all());
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
            $appointments = DB::table('appointments')->where('day', '=', $request->input('filter'))->orderBy('day')->orderBy('from_h')->get();
        } else {
            $appointments = DB::table('appointments')->orderBy('day')->orderBy('from_h')->get();
        }
        return view('auth.admin.appointments', compact('appointments'));
    }

    public function storeAppointments(Request $request)
    {
        if ($request->input('hours_from') === $request->input('hours_to')) {
            return redirect()->back()->with('msg', 'Не може двата часа да са еднакви');
        }

        $days = DB::table('appointments')->where('day', '=', $request->input('date'))->get();

        foreach ($days as $day) {
            if ($day->from_h === $request->input('hours_from')) {
                return redirect()->back()->with('msg', 'Ne stavaa, brat');
            }
        }

        try {
            Appointment::create([
                'name' => 'Анонимен',
                'service_id' => 1,
                'day' => $request->input('date'),
                'from_h' => $request->input('hours_from'),
                'until_h' => $request->input('hours_to')
            ]);

            return redirect()->back()->with('msg', 'Успешно записа час!');

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
