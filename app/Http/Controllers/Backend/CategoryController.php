<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Ecategory;
use Auth;

class CategoryController extends Controller
{
  public function view()
  {
    $allData = Category::all();
    return view('backend.category.view-categories',compact('allData'));
  }

  public function add()
  {
    return view('backend.category.add-category');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
    ]);

    $category = new Category();

    $category->name = $request->name;
    $category->created_by = Auth::user()->id;
    $category->save();

    return redirect()->route('categories.view')->with('success_message_top', 'Data Inserted Successfully!!');
  }

  public function edit($id)
  {
    $editData = Category::find($id);
    return view('backend.category.edit-category', compact('editData'));
  }

  public function update(Request $request,$id)
  {
    $this->validate($request,[
      'name' => 'required',
    ]);

    $category = Category::find($id);

    $category->name = $request->name;
    $category->updated_by = Auth::user()->id;
    $category->save();

    return redirect()->route('categories.view')->with('success_message_top', 'Data Updated Successfully!!');
  }

  public function delete($id)
  {
    $category = Category::find($id);
    $category->delete();
    return redirect()->route('categories.view')->with('success_message_top', 'Data deleted Successfully!!');
  }

  public function ecatview()
  {
    $allData = Ecategory::all();
    return view('backend.category.view-e_categories',compact('allData'));
  }

  public function ecatadd()
  {
    return view('backend.category.add-ecategory');
  }

  public function ecatstore(Request $request)
  {
    $this->validate($request,[
      'name' => 'required',
    ]);

    $ecategory = new Ecategory();

    $ecategory->name = $request->name;
    $ecategory->save();

    return redirect()->route('eproducts.category')->with('success_message_top', 'Data Inserted Successfully!!');
  }

}
