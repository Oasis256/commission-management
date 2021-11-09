@extends('admin.admin_master')
@section('title', 'Total Commisition Information')

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
            <li class="breadcrumb-item active">Sell</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>Product Purchase Commisition Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        {{-- <a href="{{ route('sell.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square mr-1"></i> All Sell</a> --}}
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="row justify-content-center">
                  
                <div class="card-body col-md-8">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr style="background: #1f2d3d; color:#fff; font-size:25px;">
                          <th>Commisition List</th>
                          <th>Total Commisition</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> <strong>Instant commisition</strong> </td>
                            <td>{{ $instant_commisition }}</td>
                        </tr> 
                        <tr>
                            <td> <strong>Monthly commisition</strong> </td>
                            <td>{{ $monthly_commisition }}</td>
                        </tr> 
                        <tr>
                            <td> <strong>Yearly commisition</strong> </td>
                            <td>{{ $yearly_commisition }}</td>
                        </tr> 
                        <tr>
                            <td> <strong>Transport commisition</strong> </td>
                            <td>{{ $transport_commisition }}</td>
                        </tr> 
                        <tr>
                            <td> <strong>Extra One commisition</strong> </td>
                            <td>{{ $extra_one_commisition }}</td>
                        </tr> 
                        <tr>
                            <td> <strong>Extra Two commisition</strong> </td>
                            <td>{{ $extra_two_commisition }}</td>
                        </tr> 

                        <tr style="background: #1f2d3d; color:#fff; font-size:25px;">
                            <td> <strong>Total Commisition</strong> </td>
                            <td>{{ $total_commisition }}</td>
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
