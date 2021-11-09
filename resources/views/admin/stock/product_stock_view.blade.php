@extends('admin.admin_master')
@section('title', 'Product Purchase Information')

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
            <li class="breadcrumb-item active">All Purchase</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>All Product Purchase Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('purchase.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square mr-1"></i> All Purchase</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="row justify-content-center">
                <div class="card-body col-md-6">
                    <table id="example1" class="table table-bordered table-striped">
                      <tbody>
                          <tr>
                              <td class="text-right">Date</td>
                              
                              {{-- <td>{{ \Carbon\Carbon::parse($viewPurchase->today_date)->format('D, d M, Y')  }}</td> --}}
                          </tr>
                          <tr>
                            <td class="text-right">Name</td>
                            <td>{{ $stockProduct->product_name }}</td>
                          </tr>
                          <tr >
                            <td class="text-right">Reference No</td>
                            <td>{{ $stockProduct->reference_no }}</td>
                          </tr>
                          <tr >
                            <td class="text-right">Cost Price</td>
                            <td>{{ $stockProduct->cost }}TK</td>
                          </tr>
                          <tr >
                            <td class="text-right">Quantity</td>
                            <td>{{ $stockProduct->quantity }}</td>
                          </tr>
                          <tr>
                            <td  class="text-right">Amount</td>
                            <td>{{ $stockProduct->payable_amount }}TK</td>
                          </tr>
                          <tr >
                            <td class="text-right">Pay</td>
                            <td>{{ $stockProduct->paid_amount }}TK</td>
                          </tr>
                          <tr >
                            <td class="text-right">Due</td>
                            <td>{{ $stockProduct->due }}TK</td>
                          </tr>
    
                     </tbody>
                    </table>
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
