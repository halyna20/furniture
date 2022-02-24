<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupId = 0)
    {
        if($groupId !== 0) {
            $products = Product::where('group_id', $groupId)->where('active', 1)->get();
        } else {
            $products = Product::where('active', 1)->get();
        }

        return view('product.index', [
            'products' => $products
        ]);
    }

}
