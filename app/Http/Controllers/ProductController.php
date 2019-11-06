<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Image;
class ProductController extends Controller
{

    function view_product(){
      $categories = Category::all();
      return view('products/productview', compact('categories'));
    }

    function productviewlist(){

      $products = Product::paginate(2);
      $deleted_products = Product::onlyTrashed()->get();
      return view('products/productviewlist', compact('products', 'deleted_products'));
    }

    function insert_product(Request $request){

      $request->validate([
        'category_id' => 'required',
        'product_name' => 'required',
        'product_price' => 'required',
        'product_description' => 'required',
        'product_quantity' => 'required | numeric',
        'alert_quantity' => 'required | numeric',
        'product_image' => 'required',
      ],[
        'category_id.required' => 'please select your categroy name!',
        'product_name.required' => 'product name must be required!',
        'product_price.required' => 'product price must be required!',
        'product_description.required' => 'product description must be required!',
        'product_quantity.required' => 'product quantity must be required!',
        'alert_quantity.required' => 'alert quantity must be required!',
        'product_image.required' => 'please select your product image',
      ]);

      $lastinsertedid = Product::insertGetId([
        'category_id' => $request->category_id,
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_description' => $request->product_description,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity,
        'created_at' => Carbon::now(),
      ]);

      if($request->hasFile('product_image')){
        $uploaded_image = $request->product_image;
        $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
        $new_img_name = $lastinsertedid.'.'.$our_uploaded_img_extension;
        Image::make($uploaded_image)->resize(391, 350)->save(base_path('public/uploads/product_img/'.$new_img_name));

         Product::find($lastinsertedid)->update([
          'product_image' => $new_img_name,
        ]);
      }
      return back()->with('message', 'Your product added successfully');
    }


    function delete_product($product_id){
      Product::findOrFail($product_id)->delete();
      return back()->with('delete_message', "Your Product Deleted Successfully");
    }

    function edit_product($product_id){
      $single_products =  Product::findOrFail($product_id);
      $categories = Category::all();
      return view('products/product_edit', compact('single_products', 'categories'));
    }

    function edit_insert_product(Request $request){
      Product::find($request->product_id)->update([
        'category_id' => $request->category_name,
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_description' => $request->product_description,
        'product_quantity' => $request->product_quantity,
        'alert_quantity' => $request->alert_quantity,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);

      if($request->hasFile('product_image')){
        if(Product::find($request->product_id)->product_image !='default_product_image.jpg'){
          $nametodelete = Product::find($request->product_id)->product_image;
          unlink(base_path('public/uploads/product_img/'.$nametodelete));
        }
      }

      $uploaded_image = $request->product_image;
      $our_uploaded_img_extension = $uploaded_image->getClientOriginalExtension();
      $new_img_name = $request->product_id.'.'.$our_uploaded_img_extension;
      Image::make($uploaded_image)->resize(391, 350)->save(base_path('public/uploads/product_img/'.$new_img_name));

       Product::find($request->product_id)->update([
        'product_image' => $new_img_name,
      ]);

        return back()->with('edit_msg', 'Your Product update successfully!');
    }

    function product_restore($deleted_product_id){
        Product::onlyTrashed()->find($deleted_product_id)->restore();
        return back()->with('restore_msg', 'Your Product again stored..');
    }

    function product_parmanet_delete($deleted_product_id){
      $p_image_name =  Product::onlyTrashed()->findOrFail($deleted_product_id)->product_image;
      if($p_image_name != 'default_product_image.jpg'){
        unlink(base_path('public/uploads/product_img/'.$p_image_name));
      }
       Product::onlyTrashed()->findOrFail($deleted_product_id)->forceDelete();
      return back()->with('par_delete', 'your product is permanently deleted!..');
    }

}
