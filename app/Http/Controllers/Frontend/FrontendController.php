<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories=Category::where('navbar','1')->where('status','1');
        return view('frontend.index',compact('categories'));
    }
    public function categories()
    {
        $categories=App\Models\Category::where('navbar','1')->where('status','1');
        return view('frontend.index',compact('categories'));


    }
}
