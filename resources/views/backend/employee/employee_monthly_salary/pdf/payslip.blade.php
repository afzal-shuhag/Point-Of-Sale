<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monthly Salary</title>
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style type="text/css">
      table{
        border-collapse : collapse;
      }
      h2,h3{
        margin:0;
        padding:0;
      }
      .table{
        width:100%;
        margin-bottom: 1rem;
        background-color: transparent;
      }
      .table th,
      .table td{
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
      }
      .table thead th{
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
      }
      .table tbody + tbody{
        border-top: 2px solid #dee2e6;
      }
      .table .table{
        background-color: #fff;
      }
      .table bordered{
        border: 1px solid #dee2e6;
      }
      .table bordered th,
      .table bordered td{
        border-bottom-width: 2px;
      }
      .text-center{
        text-align: center;
      }
      .text-center{
        text-align: right;
      }
      table tr td{
        padding: 5px;
      }
      .table bordered thead th, .table bordered td, .table bordered th{
        border: 1px solid black !important;
      }
      .table bordered thead th{
        background-color: #cacaca;
      }
    </style>
  </head>
  <body>
    <div class="container">
      @php
      $date = date('Y-m',strtotime($totalattendgroupbyid['0']->date));
      if($date != null){
        $where[] = ['date','like',$date.'%'];
      }

      $total_attend = App\Model\EmployeeAttendance::with(['user'])->where('employee_id',$totalattendgroupbyid['0']->employee_id)->where($where)->get();
      $single_salary = (float)$totalattendgroupbyid['0']->user->salary;
      $salary_per_day = $single_salary/30;
      $absent_count = count($total_attend->where('attend_status','Absent'));
      $total_salary_minus = $absent_count*$salary_per_day;
      $total_salary = $single_salary - $total_salary_minus;
      @endphp
      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:80px; height:70px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Point Of Sale</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
              <td width="25%" class="text-center"> <img src="{{ url('public/upload/employee_images/'. $totalattendgroupbyid['0']->user->image) }}" alt="" style="width:80px; height:70px;"> </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Employee Monthly Salary</h5>
        </div>
        <div class="col-md-12">
          <table border="1" width="100%">
            <tbody>
                <td style="width:50%;">Employee Name</td>
                <td>{{ $totalattendgroupbyid['0']->user->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Basic Salary</td>
                <td>{{ $totalattendgroupbyid['0']->user->salary }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Total Absent for this month</td>
                <td>{{ $absent_count }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Month</td>
                <td>{{ date('M Y',strtotime($totalattendgroupbyid['0']->date)) }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Salary for this month</td>
                <td>{{ $total_salary }}</td>
            </tbody>
          </table>
        </div>
        <br>
        <div class="col-md-12">
          <table border="0" width="100%">
            <tbody>
              <tr>
                <td style="width:30%;"></td>
                <td style="width:30%;"></td>
                <td style="width:40%; text-align:center;">
                  <hr>
                  <p style="text-align:center;">Authority</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <hr style="border:dashed 1px; width:96%; color:#DDD; margin-bottom:10px;">

      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:80px; height:70px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Point OF Sale</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
              <td width="25%" class="text-center"> <img src="{{ url('public/upload/employee_images/'. $totalattendgroupbyid['0']->user->image) }}" alt="" style="width:80px; height:70px;"> </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Employee Monthly Salary</h5>
        </div>
        <div class="col-md-12">
          <table border="1" width="100%">
            <tbody>
                <td style="width:50%;">Employee Name</td>
                <td>{{ $totalattendgroupbyid['0']->user->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Basic Salary</td>
                <td>{{ $totalattendgroupbyid['0']->user->salary }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Total Absent for this month</td>
                <td>{{ $absent_count }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Month</td>
                <td>{{ date('M Y',strtotime($totalattendgroupbyid['0']->date)) }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Salary for this month</td>
                <td>{{ $total_salary }}</td>
            </tbody>
          </table>
        </div>
        <br>
        <div class="col-md-12">
          <table border="0" width="100%">
            <tbody>
              <tr>
                <td style="width:30%;"></td>
                <td style="width:30%;"></td>
                <td style="width:40%; text-align:center;">
                  <hr>
                  <p style="text-align:center;">Authority</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      </div>
    </div>
  </body>
</html>
