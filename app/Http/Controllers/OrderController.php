<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
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

        $newCustomer = Customer::create([
            'name' => $request->orderData['name'],
            'email' => $request->orderData['email'],
            'mobile' => $request->orderData['mobile']
        ]);

        $newOrder = Order::create([
            'street' => $request->orderData['street'],
            'city' => $request->orderData['city'],
            'region' => $request->orderData['region'],
            'country' => 'Bulgaria',
            'postal_code' => $request->orderData['postal_code'],
            'shipping_type' => $request->orderData['shipping'],
            'delivery_desc' => 'N/A',
            'customer_id' => $newCustomer->id
        ]);

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
