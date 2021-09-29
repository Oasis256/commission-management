@extends('admin.admin_master')

@section('title','Admin Profile')

@section('admin_content')

<section class="content">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Admin Profile</li>
              </ol>
            </div>
          </div>
        </div>
    </div>
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin/'.$adminData->profile_photo_path) : url('upload/admin/no-image-box.png') }}"
                     alt="User profile picture" style="width:100px; height:90px;">

                     <h3 class="profile-username">{{ $adminData->name }}</h3>
                    <p class="text-muted">{{ $adminData->email }}</p>

                    <a href="{{ route('admin.profile_edit') }}" class="btn btn-primary btn-sm">Edit Profile</a>
              </div>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">

                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Admin Change Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="settings">
                  <form class="form-horizontal" method="post" action="{{ route('update.change.password') }}">
                    @csrf
                    <div class="form-group row">
                      <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="current password" value="">
                        @error('current_password')
                          <strong> <span class="text-danger">{{ $message }}</span> </strong>
                        @enderror
                      </div>
                     
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" placeholder="New password">
                        @error('password')
                          <strong> <span class="text-danger">{{ $message }}</span> </strong>
                        @enderror
                      </div>
                    </div>   
                    <div class="form-group row">
                      <label for="password_confirmation" class="col-sm-2 col-form-label">Re-type Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-type password">
                        @error('password_confirmation')
                          <strong> <span class="text-danger">{{ $message }}</span> </strong>
                        @enderror
                      </div>
                    </div>              
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
 </section>
@endsection