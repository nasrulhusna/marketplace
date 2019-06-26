<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;
use App\user;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::all();
        $user = User::all();
        return view('admin.dashboard',compact('category','product','user'));
    }
    public function media()
    {
        $data = array('title' => 'Atur Media');
        return view('admin.media',compact($data));
    }
}
