@extends('admin.admin_master')
@section('title', 'Product Purchase Report Information')

@push('css')
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function() {
        $("#datepicker").datepicker();
    });

    $(function() {
        $("#datepicker1").datepicker();
    });
</script>

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
            <li class="breadcrumb-item active">Purchase Report</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <form action="{{ route('form.to.purchase') }}" method="post">
            @csrf
                <div class="row justify-content-center">
                    <div class="col-md-4 col-md-offset-2 form-group-lg">
                        <input class="form-control date" type="text" name="start_date" value="" id="datepicker" placeholder="Start Date">
                        @error('start_date')
                            <span class="invalid-feedback" style="display:block">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group-lg">
                        <input class="form-control date" type="text" name="end_date" value="" id="datepicker1" placeholder="End Date">
                        @error('end_date')
                            <span class="invalid-feedback" style="display:block">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-2">
                            <a href="{{ route('today.purchase.report') }}" target="_blank" class="btn btn-primary btn-block btn-sm">  Today</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('seven.days.purchase.report') }}" target="_blank" class="btn btn-success btn-block btn-sm">  Last 7 Days</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('month.purchase.report') }}" target="_blank" class="btn btn-warning btn-block btn-sm">  Last 30 Days</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('year.purchase.report') }}" class="btn btn-info btn-block btn-sm">  Last 365 Days</a>
                        </div>
                    </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-block btn-danger" type="submit">
                            <span class="fa fa-search"></span>Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background:#1f2d3d">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title mt-1 text-light"> <strong>Product Purchase Report Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        {{-- <a href="{{ route('purchase.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square mr-1"></i> Add Purchase</a> --}}
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S1 No.</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Reference No</th>
                    <th>Cost Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Pay</th>
                    <th>Due</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($purchases as $key=>$purchase)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $purchase->today_date }}</td>
                    <td>{{ $purchase->product->product_name }}</td>
                    <td>{{ $purchase->reference_no }}</td>
                    <td>{{ $purchase->cost }}TK</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->payable_amount }}TK</td>
                    <td>{{ $purchase->paid_amount }}TK</td>
                    <td>{{ $purchase->due }}TK</td>
                     

                    <td>
                      @if($purchase->due == 0)
                      @else 
                         <a title="Due Pay" href="{{ route('purchase.edit',$purchase->id) }}" class="btn btn-sm btn-success"><i class="fas fa-money-bill-alt"></i></a>
                      @endif
                        <a title="Purchase View" href="{{ route('purchase.show',$purchase->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye">
                        </i></a>
                         {{-- <a title="delete" href="{{ route('purchase.delete',$purchase->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash"></i></a> --}}
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
