<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShopCustomer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
//        $request->orderData->validate([
//            'name' => 'required',
//            'email' => 'email',
//            'mobile' => 'required',
//            'street' => 'required',
//            'city' => 'required',
//            'postal_code' => 'required'
//        ]);

        $newCustomer = DB::table('shop_customers')->where('email', '=', $request->orderData['email'])->first();

        if (is_null($newCustomer)) {
            $newCustomer = ShopCustomer::create([
                'name' => $request->orderData['name'],
                'email' => $request->orderData['email'],
                'mobile' => $request->orderData['mobile']
            ]);
        }

        $newOrder = Order::create([
            'street' => $request->orderData['street'] ?? 'Вземане от салона',
            'city' => $request->orderData['city'] ?? 'Вземане от салона',
            'region' => $request->orderData['region'] ?? 'Вземане от салона',
            'country' => 'България',
            'postal_code' => $request->orderData['postal_code'] ?? 'Вземане от салона',
            'shipping_type' => $request->orderData['shipping'],
            'delivery_desc' => 'N/A',
            'customer_id' => $newCustomer->id
        ]);

        foreach ($request->cartItems as $item) {
            DB::table('order_product')->insert(
                [
                    'order_id' => $newOrder->id,
                    'product_id' => $item['id'],
                    'amount' => $item['amount']
                ]
            );
        }

        return response()->json($newOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
