<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class FrontendController extends Controller
{

    //home page
    function index(){
      return view('welcome');
    }

}
