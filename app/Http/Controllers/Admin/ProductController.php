<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Group;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'product' => [],
            'groups' => Group::with('children')->where('parent_id', 0)->where('active', 1)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('group');

        $group = Group::findOrFail($data['group_id']);
        $data += ['position' => $group->position];

        $product = Product::create($data);

        if($request->has('group')) {
            $product->group()->attach($request->input('group'));
        }

        if($product) {
            return redirect()
                ->back()
                ->withSuccess('Product created successfully!');
        } else {
            return back()
                ->withErrors('Save error')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'groups' => Group::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->except('group');
        if($product->group_id !== $request->group_id) {
            $group = Group::findOrFail($data['group_id']);
            $data += ['position' => $group->position];
        }

        $result = $product->update($request->except('group'));

        if($request->has('group')) {
            $product->group()->attach($request->input('group'));
        }

        if($result) {
            return redirect()
                ->back()
                ->withSuccess('Product changed successfully!');
        } else {
            return back()
                ->withErrors('Save error')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete($id);
        return redirect()->back()->withSuccess('Product deleted successfully!');
    }
}
