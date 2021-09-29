@extends('admin.admin_master')
@section('title', 'Admin All Brands')

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
            <li class="breadcrumb-item active">All Brand</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>Add Brand Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('brand.index') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-th mr-1"></i> All Brand</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group row">
                      <label for="brand_name" class="col-sm-2 col-form-label">Brand Name  <span class="text-danger">*</span> </label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="brand_name" id="brand_name">
                      @error('brand_name')
                          <span class="invalid-feedback" style="display:block">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="status " class="col-sm-2 col-form-label">Brand Status <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option disabled selected>Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                  
                  <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Brand Image</label>
                      <div class="col-sm-10">
                          <input type="file" class="form-control mb-4" name="image" id="image">
                          <img class="profile-user-img img-fluid " id="showImage"
                          src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin/'.$editData->profile_photo_path) : url('upload/admin/no-image-box.png') }}" alt="User" name="image" style="width:100px; height:100px;">
                      </div>
                  </div>     
                  
                  <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
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

