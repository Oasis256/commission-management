@extends('admin.admin_master')

@section('title','admin dashboard')

@section('admin_content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

@php
     $date = date('Y-m-d');
     $today_sale = App\Models\Sell::where('status',1)->where('date',$date)->sum('payable_amount');
     $today_sale_paid = App\Models\Sell::where('status',1)->where('date',$date)->sum('paid_amount');
     $today_sale_due = App\Models\Sell::where('status',1)->where('date',$date)->sum('due');
     $customers = App\Models\Customer::orderBy('id','DESC')->get();

     $date = date('Y-m-d');
      $sells = App\Models\Sell::where('status',1)->latest()->limit(5)->get();
@endphp

<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $today_sale }}TK</h3>

            <p> <strong>Today Sale</strong> </p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $today_sale_paid  }}TK</h3>

            <p> <strong>Today Sell Paid</strong> </p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
         
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $today_sale_due }}TK</h3>

            <p> <strong>Today Sell Due</strong> </p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $customers->count() }}</h3>

            <p> <strong>Total Customer</strong> </p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Customer</th>
          <th>Invoice No</th>
          <th>Paid</th>
          <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sells as $key=>$sell)
        <tr>
          <td>{{ $sell->date }}</td>
          <td>{{ $sell->product->product_name }}</td>
          <td>{{ $sell->customer->name }}</td>
          <td>{{ $sell->invoice_no }}</td>
          <td>{{ $sell->paid_amount }}TK</td>

          <td>
            @if($sell->due == 0)
              <span class="badge badge-success">Paid</span>
            @else 
            <span class="badge badge-danger">Due</span>
            @endif
          </td>
        </tr> 

        @endforeach
        </tbody>
      </table>
    </div>


</div>


@endsection