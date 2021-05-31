<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Eproduct;
use App\Model\Product_Image;

class ProductController extends Controller
{
    public function index()
    {
      $products = Eproduct::all();
      return view('frontend.pages.index',compact('products'));
    }

    public function cat_product($cat_id)
    {
      $products = Eproduct::where('category_id',$cat_id)->orderBy('id','desc')->get();
      if ($products == null) {
        return redirect()->back()->with('error_message_top','Sorry! there is no product in this category');
      }else{
        return view('frontend.pages.cat_products',compact('products'));
      }
    }
    public function product_details($id)
    {
      $product = Eproduct::where('id',$id)->first();
      return view('frontend.pages.product_details',compact('product'));
    }
}
