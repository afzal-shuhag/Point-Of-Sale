<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Designation;
use DB;

class DesignationController extends Controller
{
  public function view()
  {
    $data['allData'] = Designation::all();
    return view('backend.setup.student_designation.view_designation',$data);
  }

  public function add()
  {
    return view('backend.setup.student_designation.add_designation');
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|unique:designations,name',
    ],
    [
      'name.required' => 'Please insert designation name',
    ]
  );

    $data = new Designation();
    $data->name = $request->name;
    $data->save();

    return redirect()->route('setups.student.designation.view')->with('success_message_top', 'Data inserted Successfully!!');

  }

  public function edit($id)
  {
    $editData = Designation::find($id);
    return view('backend.setup.student_designation.add_designation',compact('editData'));
  }

  public function update(Request $request,$id)
  {

    $this->validate($request,[
      'name' => 'required|unique:designations,name',
    ],
    [
      'name.required' => 'Please insert designation name',
    ]
  );

    $data = Designation::find($id);
    $data->name = $request->name;
    $data->save();

    // session()->flash('success', 'Data updated Successfully!!');
    return redirect()->route('setups.student.designation.view')->with('success_message_top', 'Data updated Successfully!!');


  }

  public function delete($id)
  {
    $class = StudentClass::find($id);

    $class->delete();

    return redirect()->route('setups.student.class.view')->with('success_message_top', 'Data deleted Successfully!!');
  }
}
