@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Invoice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3>Invoice Pending List
                <a href="{{ route('invoice.add') }}" class="btn btn-success float-right"> <i class="fa fa-plus-circle"></i> Add Invoice</a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table style="padding:10px;" id="example1" class="table table-bordered table-hover" width="100%">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Custome Name</th>
                      <th>Invoice No</th>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $invoice)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>({{ $invoice->payment->customer->name }} - {{ $invoice->payment->customer->mobile_no }} - {{ $invoice->payment->customer->address }})</td>
                      <td>#{{ $invoice->invoice_no }}</td>
                      <td>{{ date('d-m-Y', strtotime($invoice->date)) }}</td>
                      <td>{{ $invoice->description }}</td>
                      <td>{{ $invoice->payment->total_amount }}</td>
                      <td>
                        @if($invoice->status == '0')
                          <span style="background:#FC4236; padding:3px;">Pending</span>
                        @elseif($invoice->status == '1')
                          <span style="background:#5EAB00; padding:3px;">Approved</span>
                        @endif
                      </td>
                      <td>
                        <a title="Approve" href="{{ route('invoice.approve', $invoice->id) }}" data-toggle="" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i></a>


                    <!-- <div class="modal fade" id="approveModal{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Approve your Purchase!!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('invoice.approve',$invoice->id) !!}" method="post">
                                  {{ csrf_field() }}
                                  <button type="submit" class="btn btn-lg btn-danger">Yes</button>
                              </form>

                            </div>
                            <div class="modal-footer">

                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- <script>
                      function myFunction() {
                        alert("Are You Sure to Delete???");
                      }
                      </script> -->
                      <a href="#deleteModal{{ $invoice->id }}" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                    <div class="modal fade" id="deleteModal{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('invoice.delete',$invoice->id) !!}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-lg btn-danger">Yes</button>
                            </form>

                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>



                      </td>

                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- DIRECT CHAT -->


        </section>
        <!-- /.Left col -->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
