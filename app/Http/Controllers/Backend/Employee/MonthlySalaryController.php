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

class MonthlySalaryController extends Controller
{
    public function view()
    {
      return view('backend.employee.employee_monthly_salary.view_salary');
    }

    public function getSalary(Request $request)
    {
      $this->validate($request,[
        'date' => 'required',
      ]
      );
      $date = date('Y-m',strtotime($request->date));
      if($date != null){
        $where[] = ['date','like',$date.'%'];
      }
      $data = EmployeeAttendance::with(['user'])->select('employee_id')->groupBy('employee_id')->where($where)->get();

      // foreach($data as $key => $attend){
      //   $total_attend = EmployeeAttendance::with(['user'])->where('employee_id',$attend->employee_id)->where('date','like',$date.'%')->get();
      //   $absent_count = count($total_attend->where('attend_status','Absent'));
      //   $salary = (float)$attent->user->salary;
      //   $salary_per_day = $salary/30;
      //   $total_salary_minus = (float)$absent_count*(float)$salary_per_day;
      //   $total_salary = (float)$salary - (float)$total_salary_minus;
      // }
      return view('backend.employee.employee_monthly_salary.view_get_salary',compact('data','where'));
    }

    public function payslip($employee_id)
    {
      $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
      $date = date('Y-m',strtotime($id->date));
      if($date != null){
        $where[] = ['date','like',$date.'%'];
      }
      $data['totalattendgroupbyid'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();
      $pdf = PDF::loadView('backend.employee.employee_monthly_salary.pdf.payslip', $data);
      $pdf->SetProtection(['copy', 'print'], '', 'pass');
      return $pdf->stream('document.pdf');
    }
}
