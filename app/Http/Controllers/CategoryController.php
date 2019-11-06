<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
class CategoryController extends Controller
{
    //add view categoryview
    function categoryview(){
      $categories = Category::paginate(1);
      return view('category/categoryview', compact('categories'));
    }

    // insert category

    function categoryinsert(Request $request){
      $request->validate([
        'category_name'=>'required',
      ],[
        'category_name.required' => 'Category name is must be required',
      ]);

      Category::insert([
        'category_name' => $request->category_name,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('message', 'Your Category add successfully!');
    }

    // category ediv viwe

    function categoryeditview($category_id){
      $single_category_info = Category::findOrFail($category_id);
      return view('category/category_edit_view', compact('single_category_info'));
    }

    function categoryeditinsert(Request $request){
      Category::findOrFail($request->category_id)->update([
        'category_name' => $request->category_name,
      ]);
      return back()->with('edit_msg', 'category name update successfully!..');
    }

    //delete category_id

    function categorydelete($category_id){
      Category::findOrFail($category_id)->delete();
      return back()->with('delete_message', 'category deleted successfully!');
    }
}
