<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ProductCategory::all()); // api
    }

    /**
     * @throws Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            ProductCategory::create([
                'name' => $request->input('name'),
                'slug' => 'N/A',
            ]);

            return redirect()->back();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
