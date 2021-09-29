<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

        <li class="nav-item dropdown">
          @php
            $adminData = App\Models\Admin::findOrFail(1);
          @endphp
            <a class="nav-link" data-toggle="dropdown" href="{{ route('dashboard') }}" aria-expanded="true">
              <div class="image user-panel mb-2 d-flex">
                <img src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin/'.$adminData->profile_photo_path) : url('upload/admin/no-image-box.png') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
              <span class="dropdown-item dropdown-header">Rasel Hossain</span>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.profile') }}" class="dropdown-item dropdown-footer">Profile</a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.profile') }}" class="dropdown-item dropdown-footer">Setting</a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>


   
   
   
   
   
   
   
   
   
        </ul>
  </nav>