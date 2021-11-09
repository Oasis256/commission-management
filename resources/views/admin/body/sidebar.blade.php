<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('contents/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Codenext IT</span>
    </a>

    <!-- Sidebar -->
    @php
      $adminData = App\Models\Admin::findOrFail(1);
    @endphp
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ (!empty($adminData->profile_photo_path)) ? url('upload/admin/'.$adminData->profile_photo_path) : url('upload/admin/no-image-box.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block">{{ $adminData->name }}</a>
        </div>
      </div>

      @php
          $prefix = Request::route()->getPrefix();
          $route = Route::current()->getName();
      @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $route == 'admin.dashboard'? 'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/brands'? 'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>Brands <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link {{ $route == 'brand.index' ? 'active':'' }}">
                  <i class="fab fa-bandcamp"></i>
                  <p>All Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.create') }}" class="nav-link {{ $route == 'brand.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/categories'? 'active':'' }}">
              <i class="fas fa-hand-holding-medical"></i>
              <p>Categories <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{ $route == 'category.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link {{ $route == 'category.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/suppliers'? 'active':'' }}">
              <i class="fas fa-ticket-alt"></i>
              <p>Supplier <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('supplier.index') }}" class="nav-link {{ $route == 'supplier.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supplier.create') }}" class="nav-link {{ $route == 'supplier.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Supplier</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/store'? 'active':'' }}">
              <i class="fas fa-users"></i>
              <p>Customer <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('customer.index') }}" class="nav-link {{ $route == 'customer.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.create') }}" class="nav-link {{ $route == 'customer.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/purchases'? 'active':'' }}">
              <i class="fas fa-shopping-bag"></i>
              <p>Purchase <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase.index') }}" class="nav-link {{ $route == 'purchase.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purchase.create') }}" class="nav-link {{ $route == 'purchase.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/products'? 'active':'' }}">
              <i class="fas fa-shopping-cart"></i>
              <p>Products <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link {{ $route == 'product.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link {{ $route == 'product.create' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unit.index') }}" class="nav-link {{ $route == 'unit.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Units</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/inventory'? 'active':'' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>Inventory <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase.index') }}" class="nav-link {{ $route == 'purchase.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('inventory.crate') }}" class="nav-link {{ $route == 'inventory.crate' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inventory Create</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/sell'? 'active':'' }}">
              <i class="fas fa-chart-bar"></i>
              <p>Sell <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sell.list') }}" class="nav-link {{ $route == 'sell.list' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sell List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sell.add') }}" class="nav-link {{ $route == 'sell.add' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sell</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/report'? 'active':'' }}">
              <i class="fas fa-chart-bar"></i>
              <p>Reports <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('stock.index') }}" class="nav-link {{ $route == 'stock.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Product</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('commisition.index') }}" class="nav-link {{ $route == 'commisition.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commission List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('total.commisition') }}" class="nav-link {{ $route == 'total.commisition' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total Commission</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('balance.commisition') }}" class="nav-link {{ $route == 'balance.commisition' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Commission Balance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('sell.report') }}" class="nav-link {{ $route == 'sell.report' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sell Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('purchase.report') }}" class="nav-link {{ $route == 'purchase.report' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Report</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ $prefix == '/setting' ? 'active':'' }}">
              <i class="fas fa-cog"></i>
              <p>Setting <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('payment.index') }}" class="nav-link {{ $route == 'payment.index' ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Method</p>
                </a>
              </li>
              
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>