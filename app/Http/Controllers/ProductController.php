<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Resquest;

class ProductController extends Controller
{
   
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'category_name' => 'required',
        'description' => 'required',
        'price' => 'required',
    ]);
         $product = new Product;
         $product->name = $request->category_name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->save();
         return redirect('/home')->with('status', 'Product save successfully!');
     
    }

  
    public function show(Product $product)
    {
         $products = Product::orderBy('id', 'desc')->get();
         return view('home',[
             'products' =>$products
         ]);
    }

   
    public function edit($product_id)
    {
         $singleData = Product::find($product_id);
         return view('edit-form',[
             'singleData' => $singleData
         ]);
    }

   
    public function update(Request $data,$product_id)
    {
         $validatedData = $data->validate([
        'category_name' => 'required',
        'description' => 'required',
        'price' => 'required',
    ]);
         $product = Product::find($product_id);
         $product->name = $data->category_name;
         $product->description = $data->description;
         $product->price = $data->price;
         $product->save();
         return redirect('/home')->with('update', 'Product Updated successfully!');
    }

    
    public function destroy($product_id)
    {
       $delete = Product::destroy($product_id);
       return redirect('/home')->with('deleted', 'Product deleted successfully!');

    }
}
