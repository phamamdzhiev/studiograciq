<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Builder $data
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Builder $data, Request $request): JsonResponse
    {
        if ($request->has('category')) {
            $sql = DB::table('products')->where('category_id', '=', $request->query('category'));
        } else if ($request->has('latest')) {
            $sql = DB::table('products')->latest()->take(10);
        } else {
            $sql = DB::table('products');
        }

        return response()->json($sql->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return Response
     */
    public function store(Request $request, $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function show(int $id): JsonResponse
    {
        try {
            $product = DB::table('products as p')
                ->where('p.id', '=', $id)
                ->join('product_categories as pc', 'pc.id', '=', 'p.category_id')
                ->select('p.*', 'pc.name as productCategoryName')
                ->first();

            return response()->json($product);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
