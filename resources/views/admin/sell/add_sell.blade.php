@extends('admin.admin_master')
@section('title', 'Admin Product Sell Information')

@push('css')
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('contents/admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>


    <style>
        .ui-menu-item {
            color: blue !important;
            font-weight: bold !important;
            width: 500px !important;

        }

        .ui-menu {
            width: 500px !important;
        }

        ul {
            list-style: none !important;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 17px !important;
        }

    </style>
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
                        <li class="breadcrumb-item active">All Product Purchase</li>
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
                                    <h3 class="card-title mt-1 text-light"> <strong>Add Sell
                                            Information</strong> </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('sell.list') }}" class="btn btn-primary btn-sm"><i
                                            class="nav-icon fas fa-th mr-1"></i> All Product Sell</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('sell.store') }}">
                                @csrf
                                {{--============= first row start  ================--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="datepicker" class="col-form-label" style="width: 160px;">Date<span
                                                    class="text-danger">*</span> </label>
                                                <input type="text" class="form-control mydate" name="date" id="datepicker" value="<?php echo date('m/d/Y'); ?>">
                                                @error('date')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reference_no" class="col-form-label">invoice No
                                                <span class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" name="invoice_no" id="invoice_no" value="<?php echo rand(000000,999999); ?>" readonly>
                                                @error('reference_no')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                </div>
                                {{--============= first row end  ================--}}


                                {{--============= second row start  ================--}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customer_id" class="col-form-label" style="width: 160px;">Customer <span
                                                    class="text-danger">*</span></label>
                                                <select class="form-control js-example-basic-single" name="customer_id"
                                                    id="customer_id">
                                                    <option disabled selected>Select Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_id" class="col-form-label" style="width: 160px;">Product<span
                                                    class="text-danger">*</span> </label>
                                                <select class="form-control js-example-basic-single" name="product_id"
                                                    id="product_id">
                                                    <option disabled selected>Select Product</option>
                                                    @foreach ($products as $product)
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_price" class="col-form-label" style="width: 160px;">Product Price</label>
                                                <input type="text" class="form-control" name="product_price" id="product_price" value="0" onkeypress="isInputNumber(event)" min="1" readonly>
                                                @error('product_price')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>


                                </div>

                                {{--============== second row end  =================--}}

          
                                {{--============= 3rd row start  ================--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity" class="col-form-label" style="width: 160px;">Quantity</label>
                                                <input type="text" class="form-control" name="quantity" id="quantity" value="0" onkeypress="isInputNumber(event)" min="1">
                                                @error('quantity')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="payable_amount" class="col-form-label" style="width: 160px;">Payable Amount</label>
                                                <input type="text" class="form-control" name="payable_amount" id="payable_amount"  value="0" onkeypress="isInputNumber(event)">
                                                @error('payable_amount')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                {{--============= 3rd row end  ================--}}


                                {{--============= 4th row start  ================--}}
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="paid_amount" class="col-form-label" style="width: 160px;">Paid Amount</label>
                                                <input type="text" class="form-control" name="paid_amount" id="paid_amount" value="0" onkeypress="isInputNumber(event)">
                                                @error('paid_amount')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="due" class="col-form-label" style="width: 160px;">Due</label>
                                                <input type="text" class="form-control" name="due" id="due" value="0" onkeypress="isInputNumber(event)">
                                                @error('due')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pmethod_id" class="col-form-label" style="width: 160px;">Payment Method</label>
                                            <select class="form-control js-example-basic-single" name="pmethod_id"
                                                id="pmethod_id">
                                                <option disabled selected>Select Payment</option>
                                                @foreach ($payments as $payment)
                                                    <option value="{{ $payment->id }}">{{ $payment->payment_name }}</option>
                                                @endforeach
                                                {{-- <option value="0">New purpose</option> --}}
                                            </select>
                                            <input type="text" name="bkash" id="bkash" class="form-control mt-2" placeholder="bKash Number" style="display: none;"> 
                                                @error('pmethod_id')
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                {{--============= 4th row end  ================--}}
                                <hr>

                                <div class="form-group row mt-3 justify-content-center">
                                    <div class="offset-sm-1 col-sm-3">
                                        <button type="submit" class="btn btn-primary col-sm-6">Submit Now</button>
                                    </div>
                                </div>

  
                        </div>
                    </div>
                </div>


                </div>

            </div>

            </form>


        </div>
        <!-- /.container-fluid -->
    </section>

@endsection

@push('js')

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#pmethod_id',function(){
                var pmethod_id = $(this).val();
                console.log(pmethod_id);
                if(pmethod_id == 1){
                    $('#bkash').show();
                }else{
                    $('#bkash').hide();
                }

            })
        })
    </script>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>



    <script>
        let sub_total = 0;
        $(function() {
            $('#product_id').select2();

            $('#product_id').on('change', function() {
                let product_id = $('#product_id').val();

                $.ajax({
                    url: "{{ route('sell.product.retreve') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        id: product_id
                    },
                    success: function(data) {

                        $('#product_price').val(data['product_price']);
                    }
                });
            });

        });

        $('#quantity').change(function() {
            getSubTotal();
        });

        $('#product_price').change(function() {
            getSubTotal();
        });

        $('#paid_amount').change(function() {
            getSubTotal();
        });

      



        function getSubTotal() {
            let quantity = $('#quantity').val();
            let product_price = $('#product_price').val();
            let payable_amount = $('#payable_amount').val();
            let paid_amount = $('#paid_amount').val();
            let due_amount = payable_amount - paid_amount;

            // if(quantity>0 && cost_price>0){
            sub_total = quantity * product_price;
            $('#subtotal').html(sub_total);
            $('#itemtotal').html(sub_total);
            $('#payable_amount').val(sub_total);
            $('#payable_amount').html($('#payable_amount').val());
            $('#due').html($('#due').val(due_amount));



            //}
        }

    </script>

   
@endpush
