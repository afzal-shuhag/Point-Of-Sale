<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\StudentYear;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\User;
use DB;
use PDF;

class EmployeeRegController extends Controller
{
  public function view()
  {
    $data['allData'] = User::where('role','employee')->get();
    return view('backend.employee.employee_reg.view_employee', $data);
  }

  public function studentSearch(Request $request)
  {
    $data['years'] = StudentYear::orderBy('id','desc')->get();
    $data['classes'] = StudentClass::all();
    $data['year_id'] = $request->year_id;
    $data['class_id'] = $request->class_id;
    $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    return view('backend.student.student_reg.view_student', $data);
  }

  public function add(){

    $data['designations'] = Designation::all();
    return view('backend.employee.employee_reg.add_employee', $data);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'name' => 'required|string',
      'fname' => 'required|string',
      'mname' => 'required|string',
      'mobile' => 'required|unique:users,mobile',
      'address' => 'required',
      'gender' => 'required',
      'religion' => 'required',
      'dob' => 'required',
      'join_date' => 'required',
      'designation_id' => 'required',
      'salary' => 'required',
      // 'image' => 'required|image',
    ]
    );
    DB::transaction(function() use($request){
      $checkYear = date('Y',strtotime($request->join_date));
      $employee = User::where('role','Employee')->orderBy('id','desc')->first();
      if($employee == null){
        $firstReg = 0;
        $employee_id = $firstReg+1;
        if($employee_id<10){
          $id_no = '000'.$employee_id;
        }elseif($employee_id<100){
          $id_no = '00'.$employee_id;
        }elseif($employee_id<1000){
          $id_no = '0'.$employee_id;
        }
      }else{
        $employee = User::where('role','Employee')->orderBy('id','desc')->first()->id;
        $employee_id = $employee+1;
        if($employee_id<10){
          $id_no = '000'.$employee_id;
        }elseif($employee_id<100){
          $id_no = '00'.$employee_id;
        }elseif($employee_id<1000){
          $id_no = '0'.$employee_id;
        }
      }
      $final_id_no = $checkYear.$id_no;

      $user = new User();
      $code = rand(0000,9999);
      $user->code = $code;
      $user->password = bcrypt($code);
      $user->id_no = $final_id_no;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = 'Employee';
      $user->fname = $request->fname;
      $user->mname = $request->mname;
      $user->mobile = $request->mobile;
      $user->address = $request->address;
      $user->gender = $request->gender;
      $user->religion = $request->religion;
      $user->salary = $request->salary;
      $user->designation_id = $request->designation_id;
      $user->dob = date('Y-m-d', strtotime($request->dob));
      $user->join_date = date('Y-m-d', strtotime($request->join_date));
      if($request->file('image')){
        $file = $request->file('image');
        // @unlink(public_path('upload/user_images/' . $data->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/employee_images'), $filename);
        $user['image'] = $filename;
      }
      $user->save();

      $employee_salary = new EmployeeSalaryLog();
      $employee_salary->employee_id = $user->id;
      $employee_salary->effected_date = date('Y-m-d', strtotime($request->join_date));
      $employee_salary->previous_salary = $request->salary;
      $employee_salary->present_salary = $request->salary;
      $employee_salary->increment_salary = '0';
      $employee_salary->save();

    });
    return redirect()->route('employee.registration.view')->with('success_message_top','Employee Registration completedsuccessfully!');
  }

  public function edit($id)
  {
    $data['editData'] = User::where('id',$id)->first(); //or we can ue find($id);
    $data['designations'] = Designation::all();
    return view('backend.employee.employee_reg.add_employee', $data);
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->fname = $request->fname;
    $user->mname = $request->mname;
    $user->mobile = $request->mobile;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->religion = $request->religion;
    $user->designation_id = $request->designation_id;
    $user->dob = date('Y-m-d', strtotime($request->dob));
    if($request->file('image')){
      $file = $request->file('image');
      @unlink(public_path('upload/employee_images/' . $data->image));
      $filename = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/employee_images'), $filename);
      $user['image'] = $filename;
    }
    $user->save();

    return redirect()->route('employee.registration.view')->with('success_message_top','Employee Information updated successfully!');
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
