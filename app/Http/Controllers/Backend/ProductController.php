<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Eproduct;
use App\Model\Product_Image;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use App\Ecategory;
use Auth;

class ProductController extends Controller
{
  public function view()
  {
    $allData = Product::all();
    return view('backend.product.view-products',compact('allData'));
  }

  public function add()
  {
    $data['suppliers'] = Supplier::all();
    $data['units'] = Unit::all();
    $data['categories'] = Category::all();
    return view('backend.product.add-product', $data);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
      'supplier_id' => 'required',
      'unit_id' => 'required',
      'category_id' => 'required',
    ]);

    $product = new Product();

    $product->name = $request->name;
    $product->supplier_id = $request->supplier_id;
    $product->unit_id = $request->unit_id;
    $product->category_id = $request->category_id;
    $product->created_by = Auth::user()->id;
    $product->save();

    // ProductImage Model insert image
      if ($request->hasFile('product_image')) {
        $files = $request->file('product_image');
        foreach($files as $file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(5)."-".date('his')."-".Str::random(3).".".$extension;
            $destinationPath = 'images/products'.'/';
            $file->move($destinationPath, $fileName);
            $product_image = new Product_Image();
            $product_image->product_id = $product->id;
            $product_image->image = $fileName;
            $product_image->save();
        }
      }

    return redirect()->route('products.view')->with('success_message_top', 'Data Inserted Successfully!!');
  }

  public function edit($id)
  {
    $data['editData'] = Product::find($id);
    $data['suppliers'] = Supplier::all();
    $data['units'] = Unit::all();
    $data['categories'] = Category::all();
    return view('backend.product.edit-product', $data);
  }

  public function update(Request $request,$id)
  {
    $this->validate($request,[
      'name' => 'required',
      'supplier_id' => 'required',
      'unit_id' => 'required',
      'category_id' => 'required',
    ]);

    $product = Product::find($id);

    $product->name = $request->name;
    $product->supplier_id = $request->supplier_id;
    $product->unit_id = $request->unit_id;
    $product->category_id = $request->category_id;
    $product->updated_by = Auth::user()->id;
    $product->save();

    return redirect()->route('products.view')->with('success_message_top', 'Data Updated Successfully!!');
  }

  public function delete($id)
  {
    $product = Product::find($id);
    $product->delete();
    return redirect()->route('products.view')->with('success_message_top', 'Data deleted Successfully!!');
  }



  //eproducts
  public function eview()
  {
    $allData = Eproduct::all();
    // foreach ($allData as $key => $value) {
    //   $product_image = Product_Image::where('product_id',$value->id)->first()->image;
    // }
    return view('backend.product.view-eproducts',compact('allData'));
  }

  public function eadd()
  {
    $data['categories'] = Ecategory::all();
    return view('backend.product.add-eproduct', $data);
  }

  public function estore(Request $request)
  {
    $this->validate($request,[
      'title' => 'required',
      'image' => 'required',
      'price' => 'required',
      'description' => 'required',
      'category_id' => 'required',
    ]);

    $product = new Eproduct();

    $product->title = $request->title;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category_id = $request->category_id;

    if($request->file('image')){
      $file = $request->file('image');
      // @unlink(public_path('upload/user_images/' . $data->image));
      $filename = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/product_images'), $filename);
      $product['image'] = $filename;
    }

    $product->save();


    return redirect()->route('eproducts.view')->with('success_message_top', 'Data Inserted Successfully!!');
  }

  // public function eedit($id)
  // {
  //   $data['editData'] = Eproduct::find($id);
  //   $data['categories'] = Category::all();
  //   return view('backend.product.edit-product', $data);
  // }
  //
  // public function update(Request $request,$id)
  // {
  //   $this->validate($request,[
  //     'name' => 'required',
  //     'supplier_id' => 'required',
  //     'unit_id' => 'required',
  //     'category_id' => 'required',
  //   ]);
  //
  //   $product = Product::find($id);
  //
  //   $product->name = $request->name;
  //   $product->supplier_id = $request->supplier_id;
  //   $product->unit_id = $request->unit_id;
  //   $product->category_id = $request->category_id;
  //   $product->updated_by = Auth::user()->id;
  //   $product->save();
  //
  //   return redirect()->route('products.view')->with('success_message_top', 'Data Updated Successfully!!');
  // }

  // public function delete($id)
  // {
  //   $product = Product::find($id);
  //   $product->delete();
  //   return redirect()->route('products.view')->with('success_message_top', 'Data deleted Successfully!!');
  // }
}
