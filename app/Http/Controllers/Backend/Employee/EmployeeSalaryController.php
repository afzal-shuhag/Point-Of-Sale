<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\User;
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
  public function view()
  {
    $data['allData'] = User::where('role','employee')->get();
    return view('backend.employee.employee_salary.view_employee_salary', $data);
  }

  public function increment($id)
  {
    $data['editData'] = User::where('id',$id)->first(); //or we can ue find($id);
    return view('backend.employee.employee_salary.add_employee_salary', $data);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'increment_salary' => 'required',
      'effected_date' => 'required',
    ]
    );
    $user = User::find($id);
    $previous_salary = $user->salary;
    $present_salary = (float)$previous_salary+(float)$request->increment_salary;
    $user->salary = $present_salary;
    $user->save();

    $salaryData = new EmployeeSalaryLog();
    $salaryData->employee_id = $id;
    $salaryData->previous_salary = $previous_salary;
    $salaryData->present_salary = $present_salary;
    $salaryData->increment_salary = $request->increment_salary;
    $salaryData->effected_date = date('Y-m-d',strtotime($request->effected_date));
    $salaryData->save();

    return redirect()->route('employee.salary.view')->with('success_message_top','Employee Salary updated successfully!');
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
    $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$id)->get();
    return view('backend.employee.employee_salary.employee_salary_details', $data);
  }

}
