@extends('admin.admin_master')
@section('title', 'Admin Add Product')

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
            <li class="breadcrumb-item active">All Product</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>Add Product Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-th mr-1"></i> All Product</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('product.update',$editProduct->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="oldImage" value="{{ $editProduct->product_image }}">
                  <div class="form-group row">
                      <label for="product_name" class="col-form-label" style="width: 160px;">Product Name  <span class="text-danger">*</span> </label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $editProduct->product_name }}">
                      @error('product_name')
                          <span class="invalid-feedback" style="display:block">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="product_code" class="col-form-label" style="width: 160px;">Product Code <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_code" id="product_code" value="{{ $editProduct->product_code }}">
                    @error('product_code')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="category_id" class="col-form-label"  style="width: 160px;">Category <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        <option disabled selected>Select Category</option>
                        @foreach($categories as $category)
                         <option value="{{ $category->id }}" {{ $category->id == $editProduct->category_id ? 'selected':'' }}>{{ $category->category_name }}</option>
                        @endforeach
                        
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="brand_id" class="col-form-label"  style="width: 160px;">Brand <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="brand_id">
                        <option disabled selected>Select Brand</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == $editProduct->brand_id ? 'selected':'' }}>{{ $brand->brand_name }}</option>
                        @endforeach
                       
                    </select>
                    @error('brand_id')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="supplier_id" class="col-form-label"  style="width: 160px;">Supplier <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="supplier_id">
                          <option disabled selected>Select Supplier</option>
                        @foreach($suppliers as $supplier)
                          <option value="{{ $supplier->id }}" {{ $supplier->id == $editProduct->supplier_id ? 'selected':'' }}>{{ $supplier->supplier_name }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="product_price" class="col-form-label" style="width: 160px;">Product Price <span class="text-danger">*</span> </label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_price" id="product_price" value="{{ $editProduct->product_price }}">
                    @error('product_price')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="unit_id" class="col-form-label"  style="width: 160px;">Unit <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="unit_id">
                        <option disabled selected>Select Unit</option>
                        @foreach($units as $unit)
                          <option value="{{ $unit->id }}" {{ $unit->id == $editProduct->unit_id ? 'selected':'' }}>{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                    @error('unit_id')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

              
                  <div class="form-group row">
                    <label for="status" class="col-form-label" style="width: 160px;">Status <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option disabled selected>Select Status</option>
                        <option value="1" {{ $editProduct->status == 1 ? 'selected':'' }}>Active</option>
                        <option value="0" {{ $editProduct->status == 0 ? 'selected':'' }}>In Active</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                
                <div class="form-group row">
                  <label for="inputEmail" class="col-form-label" style="width: 160px;">Product Image</label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control mb-4" name="productImage" id="productImage">
                      <img class="profile-user-img img-fluid " id="showImage"
                      src="{{ (!empty($editProduct->product_image)) ? url($editProduct->product_image) : url('upload/admin/no-image-box.png') }}" alt="User" name="image" style="width:100px; height:100px;">
                  </div>
                </div>     
                  
                  <div class="form-group row">
                      <div class="offset-sm-1 col-sm-10">
                      <button type="submit" class="btn btn-primary">Update</button>
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
      $('#productImage').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      });
    });
  </script>
    
@endpush

