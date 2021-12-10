<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
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
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->post());
        return response()->json([
            'product'=>$product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  ProductResource $product
     * @return \Illuminate\Http\Response
     */
    public function show(ProductResource $product)
    {
        return response()->json($product);
        // ->response()
        // ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  ProductResource $product
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductResource $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  ProductResource $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductResource $product)
    {
        $product->fill($request->post())->save();
        return response()->json([
            'product' => $product
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  ProductResource $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductResource $product)
    {
        $product->delete();
        return response()->json([
            'mensaje'=>'producto eliminado'
        ]);
    }
}
