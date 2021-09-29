@extends('admin.admin_master')
@section('title', 'Admin Update Category')

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
                <form class="form-horizontal" method="post" action="{{ route('category.update',$editCategory->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                  <div class="form-group row">
                      <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $editCategory->category_name }}">
                      @error('category_name')
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
                        <option value="1" {{ $editCategory->status == 1 ? 'selected':'' }}>Active</option>
                        <option value="0" {{ $editCategory->status == 0 ? 'selected':'' }}>In Active</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                 </div>
                  <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
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

