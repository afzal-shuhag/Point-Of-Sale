<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EmployeeSalaryLog;
use App\Model\Designation;
use App\Model\EmployeeLeave;
use App\Model\LeavePurpose;
use App\Model\EmployeeAttendance;
use App\User;
use DB;
use PDF;

class EmployeeAttendanceController extends Controller
{
  public function view()
  {
    $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
    return view('backend.employee.employee_attendance.view_employee_attendance', $data);
  }

  public function add(){

    $data['employees'] = User::where('role','Employee')->get();
    return view('backend.employee.employee_attendance.add_employee_attendance', $data);
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'date' => 'required',
    ]
    );
    EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
    $count = sizeof($request->employee_id);
    for ($i=0; $i < $count; $i++) {
      $attend_status = 'attend_status'.$i;
      $attend = new EmployeeAttendance();
      $attend->employee_id = $request->employee_id[$i];
      $attend->date = date('Y-m-d',strtotime($request->date));
      $attend->attend_status = $request->$attend_status;
      $attend->save();
    }

    return redirect()->route('employee.attendance.view')->with('success_message_top','Employee attendance added successfully!');
  }

  public function edit($date)
  {
    $data['editData'] = EmployeeAttendance::where('date',$date)->get();
    $data['employees'] = User::where('role','Employee')->get();
    return view('backend.employee.employee_attendance.add_employee_attendance', $data);
  }


  public function details($date)
  {
    $data['details'] = EmployeeAttendance::where('date',$date)->get();
    return view('backend.employee.employee_attendance.details_employee_attendance', $data);
  }
}
