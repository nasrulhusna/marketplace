<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
	// list data kategori
    public function index()
    {
    	$categorys = Category::where('parent_id',null)->get();
    	return view('admin.category.index',compact('categorys'));
    }
    // fungsi tambah data kategori
    public function store(Request $request)
    {
    	// return $request->all();
    	$category = new Category;
    	$category->slug = $request->slug;
    	$category->name = $request->name;
    	$category->parent_id = $request->parent_id;
    	$category->icon = $request->icon ;
    	$category->save();
    	Alert::success('Success Message', 'Data telah berhasil ditambahkan');
    	return redirect()->back();
    }
    // edit fata kategori fungsinta
    public function edit(Request $request,$id)
    {
    	$category = Category::find($id);
    	$categorys = Category::where('parent_id',null)->get();
    	return view('admin.category.edit',compact('category','categorys'));

    }
    // fungsi update
    public function update(Request $request,$id)
    {
    	$category = Category::find($id);
    	// return $category;
    	$category->slug = $request->slug;
    	$category->name = $request->name;
    	$category->parent_id = $request->parent_id;
    	$category->icon = $request->icon ;
    	$category->save();
    	Alert::success('Success Message', 'Data telah berhasil diedit');
    	return redirect(route('category.index'));
    }
    // fungsi hapus
    public function destroy($id)
    {
    	$category = Category::find($id);
    	$category->delete();
    	Alert::success('Success Message', 'Data telah berhasil dihapus');
    	return redirect(route('category.index'));

    }

}
