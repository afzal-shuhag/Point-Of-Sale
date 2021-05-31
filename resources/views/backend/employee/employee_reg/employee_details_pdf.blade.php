<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee Details</title>
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
      <div class="row">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td width="20%" class="text-center"> <img src="{{ url('public/upload/logo.png') }}" alt="" style="width:100px; height:100px;"> </td>
              <td class="text-center" width="20%">
                <h4><strong>Point of Sale</strong></h4>
                <h5><strong>Sylhet, Bangladesh</strong></h5>
                <h6><strong>www.afzalshuhag.com</strong></h6>
              </td>
              <td width="25%" class="text-center"> <img src="{{ url('public/upload/employee_images/'. $details->image) }}" alt="" style="width:100px; height:100px;"> </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12 text-center">
          <h5 style="font-weight:bold; padding-top:-25px; text-align:center;">Employee Details Information</h5>
        </div>
        <div class="col-md-12">
          <table border="1" width="100%">
            <tbody>
              <tr>
                <td style="width:50%;">Employee Name</td>
                <td>{{ $details->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Father Name</td>
                <td>{{ $details->fname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Mother Name</td>
                <td>{{ $details->mname }}</td>
              </tr>
              <tr>
                <td style="width:50%;">ID No.</td>
                <td>{{ $details->id_no }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Mobile</td>
                <td>{{ $details->mobile }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Address</td>
                <td>{{ $details->address }}</td>
              </tr>
              <tr>
              <tr>
                <td style="width:50%;">Designation</td>
                <td>{{ $details->designation->name }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Gender</td>
                <td>{{ $details->gender }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Religion</td>
                <td>{{ $details->religion }}</td>
              </tr>
              <tr>
                <td style="width:50%;">DOB</td>
                <td>{{ $details->dob }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Join Date</td>
                <td>{{ $details->join_date }}</td>
              </tr>
              <tr>
                <td style="width:50%;">Salary</td>
                <td>{{ $details->salary }}</td>
              </tr>
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
  </body>
</html>
