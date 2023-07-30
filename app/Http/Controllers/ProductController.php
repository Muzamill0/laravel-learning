<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data = [
            'products' => Product::all()
        ];
        return view('products.index', $data);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        $file = $request['image'];

        if ($file) {
            $file_name = 'product' . time() . '.' . $file->getClientOriginalExtension();
        } else {
            $file_name = 'default.png';
        }
        // dd($file_name);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name,
        ];

        $product_created = Product::create($data);
        if($product_created){
            $file->move(public_path('uploads'), $file_name);
            return back()->with('success', 'Product has been created');
        } else{
            return back()->with('error', 'Product has failed to create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // dd($product);
        $data = [
            'product' => $product
        ];
        return view('products.edit', $data);
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request['image'];

        if ($file) {
            $file_name = 'product' . time() . '.' . $file->getClientOriginalExtension();
        } else {
            $file_name = $product->image;
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name
        ];

        $product_updated = Product::find($product->id)->update($data);
        if($product_updated){
            $file->move(public_path('uploads'), $file_name);
            return back()->with('success', 'Product has been updated');
        } else{
            return back()->with('error', 'Product has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product_deleted = Product::find($product->id)->delete();
        if($product_deleted){
            return back()->with('success', 'Product has been delete');
        } else{
            return back()->with('error', 'Product has failed to delete');
        }
    }
}
