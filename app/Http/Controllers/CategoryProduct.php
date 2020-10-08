<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
    	return view('admin.add_category_product');
    }
    public function all_category_product(){
    	$all_category_product = DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $Request){
    	$data = array();
    	$data['category_name'] = $Request->category_product_name;
    	$data['category_desc'] = $Request->category_product_desc;
    	$data['category_status'] = $Request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message', 'thêm danh mục sản phẩm thành công');
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
    	DB::table('tbl_category_product')->where('$category_id', $category_product_id)->update(['category_status'=>0]);
    	Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công');
    	return Redirect::to('all_category_product');
    }
    public function active_category_product($category_product_id){
    	DB::table('tbl_category_product')->where('$category_id', $category_product_id)->update(['category_status'=>1]);
    	Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
    	return Redirect::to('all_category_product');
    }
    public function category_product_detail(Request $Request){
    	DB::table('tbl_category_product')->get();
    	return Redirect::to('admin.index', [$user=>user]);

    }
    public function product_detail($id){
    	DB::table('category_product_detail')->get();
    	return Redirect::to('admin_layout');
    }
}

