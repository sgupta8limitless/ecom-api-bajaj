<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::with('category')->get();
        return $data;
    }

 

    public function store(Request $request)
    {
        $product=new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->image=$request->image;
        $product->description=$request->description;
        $product->cid=$request->cid;

        $product->save();

        return ["success"=>true,"message"=>"Product Created"];

    }

  
    public function show(string $id)
    {
        $data=Product::find($id);
        return $data;
    }

    
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->image=$request->image;
        $product->description=$request->description;
        $product->cid=$request->cid;

        $product->save();

        return ["success"=>true,"message"=>"Product Updated"];

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $product->delete();
        return ["success"=>true,"message"=>"Product Deleted"];
    }
}
