<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use App\Category;

class BerandaController extends Controller
{
	protected $category;
	public function __construct(){
		$this->category = Category::where('parent_id',null)->get();
	}
    public function index()
    {
    	$category= $this->category;
    	$product = Product::take(9)->orderBy('id','DESC')->get();
    	return view('homepage.index',compact('product','category'));
    }
    public function product()
    {
    	$category= $this->category;
    	$product = Product::orderBy('id','DESC')->paginate(6);
    	// $product = DB::table('product')->paginate(6);
    	return view('homepage.product',compact('product','category'));
    }
    public function productbycategory($slug)
    {
    	$categorys= Category::where('slug',$slug)->first();
    	$id 	= $categorys->id;
    	$category= $this->category;
    	$name = $categorys->name;
    	$product = Product::orderBy('id','DESC')->where('category_id',$id)->paginate(6);
    	// $product = DB::table('product')->paginate(6);
    	return view('homepage.productbycategory',compact('product','category','name'));
    }
      public function detail($slug)
    {
        $user = User::all()->first();
        $product = Product::where('slug',$slug)->first();
        $category= $this->category;
        return view('homepage.detail',compact('product','category','user'));
    }
        public function supplier()
    {
        
        $category= $this->category;
        $user = User::orderBy('id','DESC')->where('status',1)->where('status','!=','member')->get();
        return view('homepage.supplier',compact('category','user'));
    }
    public function productbysupplier($id)
    {
        $category= $this->category;
        $user = User::find($id);
        
        $product = $user->product;
        return view('homepage.productpenjual',compact('product','category','user'));
    }
}
