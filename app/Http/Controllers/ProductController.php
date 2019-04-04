<?php

namespace App\Http\Controllers;

use Request;
use File;
use App\Cate;
use App\Product;
use App\Image;
use App\Http\Requests\ProductRequest;
use Auth;
class ProductController extends Controller
{
	public function getList() {
		$product = Product::select('id', 'name', 'price', 'cate_id', 'created_at') -> orderBy('id', 'DESC') -> get() -> toArray();
		return view('admin.product.product_list', compact('product'));
	}
    public function getAdd() {
    	$cate = Cate::select('name', 'id', 'parent_id') -> get() -> toArray();
    	return view('admin.product.product_add', compact('cate'));
    }

    public function postAdd(ProductRequest $request) {
    	$img = $request -> file('fImages');
    	$img_name = $img -> getClientOriginalName();
    	$product = new Product();
    	$product -> name = $request -> txtName;
    	$product -> alias = changeTitle($request -> txtName);
    	$product -> price = $request -> rdoStatus;
    	$product -> intro = $request -> txtIntro;
    	$product -> content = $request -> txtContent;
    	$product -> image = $img_name;
    	$product -> keywords = $request -> txtKeywords;
    	$product -> description = $request -> txtDescription;
    	$product -> user_id = Auth::user() -> id;
    	$product -> cate_id = $request -> sltParent;
    	$product -> save();
    	$des = 'resources/upload/';
    	$img->move($des, $img_name);
    	$product_id = $product -> id;
    	if($request -> hasFile('fProductDetail')) {
    		foreach ($request -> file('fProductDetail') as $file) {
    			$product_image = new Image();
    			if(isset($file)) {
    				$product_image -> image = $file -> getClientOriginalName();
    				$product_image -> product_id = $product_id;
    				$file -> move('resources/upload/detail/', $file -> getClientOriginalName());
    				$product_image -> save();
    			}
    		}
    	}
    	return redirect() -> route('admin.product.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Add Product Success!']);
    }
    public function getDelete($id) {
        $product_detail = Product::findOrFail($id) -> image() -> get() -> toArray();
        foreach ($product_detail as $value) {
            File::delete('resources/upload/detail/' . $value["image"]);
        }
        $product = Product::findOrFail($id);
        File::delete('resources/upload/' . $product -> image);
        $product -> delete($id);
        return redirect() -> route('admin.product.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Delete Product Success!']);
    }

    public function getEdit($id) {
        $cate = Cate::select('id', 'name', 'parent_id') -> get() -> toArray();
        $product = Product::findOrFail($id) -> toArray();
        $product_image = Product::findOrFail($id) -> image() -> get() -> toArray();
        return view('admin.product.product_edit', compact('cate', 'product', 'product_image'));
    }

    public function postEdit(Request $request, $id) {
        $product = Product::findOrFail($id);
        $img_current = 'resources/upload/detail'.Request::input('img_current');
        if (!empty(Request::file('fImages'))) {
            $file_name = Request::file('fImages') -> getClientOriginalName();
            $product -> image = $file_name;
            Request::file('fImages') -> move('resources/upload/', $file_name);
            if(File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $product -> name = Request::input('txtName');
        $product -> alias = changeTitle(Request::input('txtName'));
        $product -> price = Request::input('rdoStatus');
        $product -> intro = Request::input('txtIntro');
        $product -> content = Request::input('txtContent');
        //$product -> image = $img_name;
        $product -> keywords = Request::input('txtKeywords');
        $product -> description = Request::input('txtDescription');
        $product -> user_id = Auth::user() -> id;
        $product -> cate_id = Request::input('sltParent');
        if (!empty(Request::file('fProductDetail'))) {
            foreach (Request::file('fProductDetail') as $file) {
                $product_img = new Image();
                if (isset($file)) {
                    $product_img -> image = $file -> getClientOriginalName();
                    $product_img -> product_id = $id;
                    $file -> move('resources/upload/detail/', $file -> getClientOriginalName());
                    $product_img -> save();
                }
            }
        }
        $product -> save();
        return redirect() -> route('admin.product.getList') -> with(['flash_level' => 'success', 'flash_messages' => 'Edit Product Success!']);
    }

    public function getDelImg($id) {
        if(Request::ajax()) {
            $idHinh = (int) Request::get('idHinh');
            $image =  Image::findOrFail($idHinh);
            if (!empty($image)) {
                $img = 'resources/upload/detail/'.$image -> image;
                if (File::exists($img)) {
                    File::delete($img);

                }
                $image -> delete();
            }
        }
        return "Oke";
    }

    public function home() {
        $product = Product::select('id', 'name', 'alias', 'price', 'image') -> orderBy('id', 'DESC') -> get();
        return view('user.pages.home', compact('product'));
    }
}
