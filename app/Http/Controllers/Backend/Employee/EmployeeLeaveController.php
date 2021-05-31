<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\EmployeeLeave;
use App\Model\LeavePurpose;
use App\User;
use DB;
use PDF;

class EmployeeLeaveController extends Controller
{
  public function view()
  {
    $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
    return view('backend.employee.employee_leave.view_employee_leave', $data);
  }

  public function add(){

    $data['leave_purpose'] = LeavePurpose::all();
    $data['employees'] = User::where('role','Employee')->get();
    return view('backend.employee.employee_leave.add_employee_leave', $data);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'employee_id' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'leave_purpose_id' => 'required',
    ]
    );
    if($request->leave_purpose_id == '0'){
      $leave_purpose = new LeavePurpose();
      $leave_purpose->name = $request->name;
      $leave_purpose->save();
      $leave_purpose_id = $leave_purpose->id;
    }else{
      $leave_purpose_id = $request->leave_purpose_id;
    }
    $data = new EmployeeLeave();
    $data->employee_id = $request->employee_id;
    $data->start_date = date('Y-m-d',strtotime($request->start_date));
    $data->end_date = date('Y-m-d',strtotime($request->end_date));
    $data->leave_purpose_id = $leave_purpose_id;
    $data->save();

    return redirect()->route('employee.leave.view')->with('success_message_top','Employee Leave added successfully!');
  }

  public function edit($id)
  {
    $data['editData'] = EmployeeLeave::where('id',$id)->first(); //or we can ue find($id);
    $data['leave_purpose'] = LeavePurpose::all();
    $data['employees'] = User::where('role','Employee')->get();
    return view('backend.employee.employee_leave.add_employee_leave', $data);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'employee_id' => 'required',
      'start_date' => 'required',
      'end_date' => 'required',
      'leave_purpose_id' => 'required',
    ]
    );
    if($request->leave_purpose_id == '0'){
      $leave_purpose = new LeavePurpose();
      $leave_purpose->name = $request->name;
      $leave_purpose->save();
      $leave_purpose_id = $leave_purpose->id;
    }else{
      $leave_purpose_id = $request->leave_purpose_id;
    }
    $data = EmployeeLeave::find($id);
    $data->employee_id = $request->employee_id;
    $data->start_date = date('Y-m-d',strtotime($request->start_date));
    $data->end_date = date('Y-m-d',strtotime($request->end_date));
    $data->leave_purpose_id = $leave_purpose_id;
    $data->save();

    return redirect()->route('employee.leave.view')->with('success_message_top','Employee Leave Updated successfully!');
  }

  public function promotion($student_id)
  {
    $data['editData'] = AssignStudent::with('student','discount')->where('student_id',$student_id)->first();
    $data['years'] = StudentYear::all();
    $data['classes'] = StudentClass::all();
    $data['groups'] = StudentGroup::all();
    $data['shifts'] = StudentShift::all();
    return view('backend.student.student_reg.promotion_student', $data);

  }

  public function promotionStore(Request $request, $student_id)
  {
    DB::transaction(function() use($request,$student_id){
      $user = User::where('id',$student_id)->first();
      $user->name = $request->name;
      $user->fname = $request->fname;
      $user->mname = $request->mname;
      $user->mobile = $request->mobile;
      $user->address = $request->address;
      $user->gender = $request->gender;
      $user->religion = $request->religion;
      $user->dob = date('Y-m-d', strtotime($request->dob));
      if($request->file('image')){
        $file = $request->file('image');
        @unlink(public_path('upload/student_images/' . $user->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/student_images'), $filename);
        $user['image'] = $filename;
      }
      $user->save();

      $assign_student = new AssignStudent();
      $assign_student->student_id = $student_id;
      $assign_student->year_id = $request->year_id;
      $assign_student->class_id = $request->class_id;
      $assign_student->group_id = $request->group_id;
      $assign_student->shift_id = $request->shift_id;
      $assign_student->save();

      $discount_student = new DiscountStudent();
      $discount_student->assign_student_id = $assign_student->id;
      $discount_student->discount = $request->discount;
      $discount_student->fee_category_id = '1';
      $discount_student->save();

    });
    return redirect()->route('students.registration.view')->with('success_message_top','Student Promoted successfully!');
  }

  public function details($id)
  {
    $data['details'] = User::where('id',$id)->first();
    $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
  }
}
