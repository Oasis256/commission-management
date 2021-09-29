@extends('admin.admin_master')

@section('title','admin profile Update')

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
                <li class="breadcrumb-item active">Admin Profile Edit</li>
              </ol>
            </div>
          </div>
        </div>
    </div>
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2  pl-3 bg-dark">
                <div class="row">
                    <div class="col-md-6">
                      <h5> Admin Profile Update</h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary btn-sm" href="">Profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                  @csrf
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name"  value="{{ $editData->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{ $editData->email }}">
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control mb-4" name="image" id="image">

                        <img class="profile-user-img img-fluid " id="showImage"
                        src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin/'.$editData->profile_photo_path) : url('upload/admin/no-image-box.png') }}" alt="User" name="image" style="width:100px; height:100px;">
                    </div>
                  </div>     
                
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </div>
                </form>
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
 </section>
@endsection

@push('js')
{{-- <script src="{{ asset('contents/admin') }}/plugins/jquery/jquery.min.js"></script> --}}
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