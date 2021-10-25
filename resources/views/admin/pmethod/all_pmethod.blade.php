@extends('admin.admin_master')
@section('title', 'Admin All Payment method')

@push('css')
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

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
            <li class="breadcrumb-item active">All Payment Method</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>All Payment Method Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('payment.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square mr-1"></i> Add Payment Method</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S1 No.</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pmethods as $key=>$pmethod)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pmethod->payment_name }}</td>
                    <td>{{ $pmethod->payment_details }}</td>
                     <td>
                       <input type="checkbox" data-toggle="toggle" data-on="On" data-size="sm" id="pstatus" data-id="{{ $pmethod->id }}" data-off="Off" {{ $pmethod->status == 1 ? 'checked':'' }} data-onstyle="primary" data-offstyle="warning">
                     </td>
                    <td>{{ $pmethod->created_at->diffForHumans() }}</td>
                    <td>
                       
                        <a href="#" class="btn btn-sm btn-info disabled"><i class="fas fa-pencil-alt">
                        </i> Edit</a>
                         <a href="#" class="btn btn-sm btn-danger disabled" id="delete"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                  </tr> 
                  @endforeach
                  </tbody>
                </table>
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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    $('body').on('change','#pstatus', function(){
        let id = $(this).attr('data-id');
        
        if(this.checked){
            var status = 1;
        }else{
            var status = 0;
        }
       $.ajax({
           url:'/setting/payment/'+id+'/'+status,
           method:'get',
           success: function(result){
             toastr.success(result.messege);
           }
       });
  
  
    });
  
  </script>

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
