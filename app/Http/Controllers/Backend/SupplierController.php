<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SupplierController extends Controller
{
    public function view()
    {
      $allData = Supplier::all();
      return view('backend.supplier.view-suppliers',compact('allData'));
    }

    public function add()
    {
      return view('backend.supplier.add-supplier');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'mobile_no' => 'required',
      ]);

      $supplier = new Supplier();

      $supplier->name = $request->name;
      $supplier->mobile_no = $request->mobile_no;
      $supplier->email = $request->email;
      $supplier->address = $request->address;
      $supplier->created_by = Auth::user()->id;
      $supplier->save();

      return redirect()->route('suppliers.view')->with('success_message_top', 'Data Inserted Successfully!!');
    }

    public function edit($id)
    {
      $editData = Supplier::find($id);
      return view('backend.supplier.edit-supplier', compact('editData'));
    }

    public function update(Request $request,$id)
    {
      $this->validate($request,[
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'mobile_no' => 'required',
      ]);

      $supplier = Supplier::find($id);

      $supplier->name = $request->name;
      $supplier->mobile_no = $request->mobile_no;
      $supplier->email = $request->email;
      $supplier->address = $request->address;
      $supplier->updated_by = Auth::user()->id;
      $supplier->save();

      return redirect()->route('suppliers.view')->with('success_message_top', 'Data Updated Successfully!!');
    }

    public function delete($id)
    {
      $supplier = Supplier::find($id);
      $supplier->delete();
      return redirect()->route('suppliers.view')->with('success_message_top', 'Data deleted Successfully!!');
    }
}
