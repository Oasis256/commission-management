@extends('admin.admin_master')
@section('title', 'Admin Add Customer Information')

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
            <li class="breadcrumb-item active">All Customer</li>
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
                        <h3 class="card-title mt-1 text-light"> <strong>Add Customer Information</strong> </h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('customer.index') }}" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-th mr-1"></i> All Customer</a>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('customer.store') }}">
                    @csrf
                  <div class="form-group row">
                      <div class="col-md-1"></div>
                      <label for="name" class="col-form-label" style="width: 100px;">Name  <span class="text-danger">*</span> </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name">
                      @error('name')
                          <span class="invalid-feedback" style="display:block">
                              <strong class="text-danger">{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="phone" class="col-form-label" style="width: 100px;">Phone</label>
                    <div class="col-sm-8">
                       <input type="phone" class="form-control" name="phone" id="phone">
                       @error('phone')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="email" class="col-form-label" style="width: 100px;">Email</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="email" id="email">
                       @error('email')
                        <span class="invalid-feedback" style="display:block">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="date_of_birth" class="col-form-label" style="width: 100px;">Date of Birth</label>
                    <div class="col-sm-8">
                       <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="age" class="col-form-label" style="width: 100px;">Age</label>
                    <div class="col-sm-8">
                       <input type="number" class="form-control" name="age" id="age">
                    </div>
                  </div>

                 <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="category_id" class="col-form-label"  style="width: 100px;">Gender <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                    <select class="form-control" name="gender">
                        <option disabled selected>Select Gender</option>
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                        
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="city" class="col-form-label" style="width: 100px;">City</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="city" id="city">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-1"></div>
                    <label for="status" class="col-form-label" style="width: 100px;">Status <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
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
                    <div class="col-md-1"></div>
                    <label for="city" class="col-form-label" style="width: 100px;">Address</label>
                    <div class="col-sm-8">
                       <textarea type="text" class="form-control" name="address" id="address" cols="30" rows="3" style="resize: none"></textarea>
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


