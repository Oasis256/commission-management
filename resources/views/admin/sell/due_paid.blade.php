@extends('admin.admin_master')
@section('title', 'Customer Due Information')

@push('css')
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('admin_content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Due Paid</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background:#1f2d3d">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title mt-1 text-light"> <strong>Customer Due Paid  Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('sell.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square mr-1"></i> All Sell</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="row">
                <div class="card-body col-md-6">
                    
                    <div class="form-group">
                        <label for="due_paid" class="col-form-label" style="width: 160px;">Due Paid
                        <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="due_paid" id="due_paid">
                        @error('due_paid')
                            <span class="invalid-feedback" style="display:block">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="form-control bg-danger">Due Paid</button>
                  </div>
                </div>

                <div class="card-body col-md-6">
                    <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                                <tr>
                                    <td class="text-right">Sell Date</td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($CustomerDue->date)->format('D, d M, Y')  }}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Name</td>
                                    <td>{{ $CustomerDue->product->product_name }}</td>
                                </tr>
                                <tr >
                                    <td class="text-right"> Price</td>
                                    <td>{{ $CustomerDue->product->product_price }}TK</td>
                                </tr>
                                <tr >
                                    <td class="text-right">Quantity</td>
                                    <td>{{ $CustomerDue->quantity }}</td>
                                </tr>
                                <tr >
                                    <td class="text-right">Amount</td>
                                    <td>{{ $CustomerDue->payable_amount }}</td>
                                </tr>
                                <tr >
                                    <td class="text-right">Paid</td>
                                    <td>{{ $CustomerDue->paid_amount }}</td>
                                </tr>
                                <tr >
                                    <td class="text-right">due</td>
                                    <td>{{ $CustomerDue->due }}</td>
                                </tr>
                          </table>
                    </div>
                  
                </div>

              </div>
          
            </div>      
          </div>

        </div>
      
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

@endsection

@push('js')
    <!-- DataTables  & Plugins -->
<script src="{{ asset('contents/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
