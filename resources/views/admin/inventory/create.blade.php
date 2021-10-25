@extends('admin.admin_master')
@section('title', 'Admin Add Supplier')

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
            <li class="breadcrumb-item active">All Supplier</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>Add Inventory Product Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('supplier.index') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-th mr-1"></i> All Supplier</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('inventory.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="product_id" class="col-sm-2 col-form-label"  style="width: 160px;">Product <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                        <select class="form-control" name="product_id">
                            <option disabled selected>Select Product</option>
                            @foreach($products as $product)
                             <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                            
                        </select>
                        @error('product_id')
                            <span class="invalid-feedback" style="display:block">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="unit" class="col-sm-2 col-form-label"  style="width: 160px;">Unit <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                        <select class="form-control" name="unit">
                            <option disabled selected>Select Product</option>
                            @foreach($units as $unit)
                             <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                            
                        </select>
                        @error('unit')
                            <span class="invalid-feedback" style="display:block">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                  <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="quantity" id="quantity">
                    @error('quantity')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div>

                 {{-- <div class="form-group row">
                    <label for="stock_in_date" class="col-sm-2 col-form-label">stock in date <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="stock_in_date" id="stock_in_date">
                    @error('stock_in_date')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div> --}}

                 {{-- <div class="form-group row">
                    <label for="stock_out_date" class="col-sm-2 col-form-label">stock out date  <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="stock_out_date" id="stock_out_date">
                    @error('stock_out_date')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div> --}}

                 {{-- <div class="form-group row">
                    <label for="stock_by" class="col-sm-2 col-form-label">stock by </label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" name="stock_by" id="stock_by">
                    </div>
                 </div> --}}

            
                  
                  <div class="form-group row">
                      <div class="offset-sm-1 col-sm-10">
                      <button type="submit" class="btn btn-primary">Add New</button>
                      </div>
                  </div>
                  </form>
              </div>
            </div>      
          </div>
        </div>
      
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection

@push('js')

<script>
    $(document).ready(function(){
      $('#image').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>
    
@endpush

