<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        return view('auth.admin.appointments');
    }
}
