@extends('admin.admin_master')
@section('title', 'Admin Product Purchase')

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
                                    <h3 class="card-title mt-1 text-light"> <strong>Add Product Purchase
                                            Information</strong> </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('purchase.index') }}" class="btn btn-primary btn-sm"><i
                                            class="nav-icon fas fa-th mr-1"></i> All Product Purchase</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="{{ route('purchase.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="datepicker" class="col-form-label" style="width: 160px;">Date<span
                                            class="text-danger">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control mydate" name="date" id="datepicker" value="<?php echo date('m/d/Y'); ?>">
                                        @error('date')
                                            <span class="invalid-feedback" style="display:block">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="reference_no" class="col-form-label" style="width: 160px;">Reference No
                                        <span class="text-danger">*</span> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="reference_no" id="reference_no">
                                        @error('reference_no')
                                            <span class="invalid-feedback" style="display:block">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="note" class="col-form-label" style="width: 160px;">Note</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="note" id="note">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card" style="background: #ddd">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="form-group row justify-content-center">
                                <label for="supplier_id" class="col-form-label" style="width: 120px;">Supplier <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <select class="form-control js-example-basic-single" name="supplier_id"
                                        id="supplier_id">
                                        <option disabled selected>Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="invalid-feedback" style="display:block">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="product_id" class="col-form-label" style="width: 120px;">Add Product<span
                                        class="text-danger">*</span> </label>
                                <div class="col-sm-6">

                                    <select class="form-control js-example-basic-single" name="product_id" id="product_id"
                                        onchange="return showTableData()">
                                        <option disabled selected>Select Product</option>

                                    </select>
                                    @error('product_id')
                                        <span class="invalid-feedback" style="display:block">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="product-table" class="table table-striped table-bordered mb-0">
                            <thead>
                                <tr class="bg-dark">
                                    <th class="w-35 text-center">Product</th>
                                    <th class="w-10 text-center">Available</th>
                                    <th class="w-10 text-center">Quantity</th>
                                    <th class="w-10 text-center">Cost</th>
                                    <th class="w-10 text-center">Sell Price</th>
                                    <th class="w-10 text-center">List commisition </th>
                                    <th class="w-10 text-center">Item Total</th>
                                    <th class="w-5 text-center">
                                        <i class="fas fa-trash text-danger"></i>
                                    </th>
                                </tr>
                            </thead>

                            <tbody id="table_data" style="visibility: hidden;">
                                <tr id="rowId" class="rowId">
                                    <td class="text-center" style="min-width:100px;" style="font-size: 13px;">
                                        <span class="name" id="item-name" style="font-size: 13px;"></span>
                                    </td>
                                    <td class="text-center" data-title="Available">
                                        <input id="available" type="hidden" name="available" value="">
                                        <span class="text-center available" id="available" name="available"
                                            style="font-size: 13px;">0</span>
                                    </td>


                                    <td style="padding:2px;" data-title="Quantity">
                                        <input class="form-control input-sm text-center quantity" name="quantity"
                                            type="text" min="1" value="1" id="quantity" onkeypress="isInputNumber(event)">
                                    </td>

                                    <td style="padding:2px; min-width:80px;" data-title="Purchase Price">
                                        <input class="form-control input-sm text-center purchase-price" type="text"
                                            name="cost_price" id="cost_price" value="1" style="font-size: 13px;"
                                            onkeypress="isInputNumber(event)">
                                    </td>
                                    <td style="padding:2px;min-width:80px;">
                                        <input class="form-control input-sm text-center sell-price" type="text"
                                            name="sell_price" id="sell_price" style="font-size: 13px;" readonly>
                                    </td>
                                    <td class="text-center" data-title="Tax Amount">
                                        <span id="list_commisition" name="list_commisition" class=""
                                            style="font-size: 13px;">0.00</span>
                                    </td>
                                    <td class="text-right" data-title="Total">
                                        <span class="itemtotal" id="itemtotal" style="font-size: 13px;">0.0</span>
                                    </td>
                                    <td class="text-center">
                                        <i class="fas fa-close text-red pointer remove" title="Remove"></i>
                                    </td>
                                </tr>
                            </tbody>

                            <script>
                                function showTableData() {
                                    let showTable = document.getElementById('product_id');

                                    if (showTable) {
                                        document.getElementById('table_data').style.visibility = 'visible';
                                    }

                                }
                            </script>

                            <tfoot>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6"> Subtotal</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="itemtotal" type="hidden" name="itemtotal" value="">
                                        <span class="subtotal" id="subtotal" name="subtotal"
                                            style="font-size: 13px;">0.0</span>
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Instat commisition (%)</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="instant_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="instant_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Monthly commisition</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="monthly_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="monthly_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Yearly commisition</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="yearly_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="yearly_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Transport commisition</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="transport_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="transport_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Extra-1 commisition</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="extra1_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="extra1_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th class="text-right" colspan="6">Extra-2 commisition</th>
                                    <th class="col-sm-2 text-right">
                                        <input id="extra2_commisition" onkeypress="isInputNumber(event)"
                                            class="text-right" type="taxt" name="extra2_commisition" value="0">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-info">
                                    <th class="text-right" colspan="6">Payable Amount </th>
                                    <th class="col-sm-2 text-right">
                                        <input type="hidden" name="payable_amount" value="0" id="payable_amount">
                                        <h4 class="text-center" id="payable_amount_text"><b>0.00</b></h4>
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-warning">
                                    <th class="text-right" colspan="6">Per Product Cost </th>
                                    <th class="col-sm-2 text-right">
                                        <input type="hidden" name="per_product_cost" value="0" id="per_product_cost">
                                        <h4 class="text-center" id="per_product_cost_text"><b>0.00</b></h4>
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>

                                <tr class="bg-blue">
                                    <th class="text-right" colspan="6">Payment Method</th>
                                    <th class="col-sm-2 text-center">
                                        <select id="pmethod-id" class="form-control" name="pmethod_id" tabindex="-1"
                                            aria-hidden="true">
                                            @foreach ($pemthods as $pemthod)
                                                <option value="{{ $pemthod->id }}">{{ $pemthod->payment_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-blue">
                                    <th class="text-right" colspan="6">Paid Amount </th>
                                    <th class="col-sm-2 text-right">
                                        <input id="paid_amount" onkeypress="isInputNumber(event)" class="text-center"
                                            type="taxt" name="paid_amount">
                                    </th>
                                    <th class="w-25p">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th colspan="2" class="w-10 text-right">Due Amount</th>
                                    <th colspan="4" class="w-70 bg-red text-center">
                                        <input id="due_amount" type="hidden" name="due_amount" value="0">
                                        <span class="" id="due_amount">0.00</span>
                                    </th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                                <tr class="bg-gray">
                                    <th colspan="2" class="w-10 text-right">
                                        Change Amount </th>
                                    <th colspan="4" class="w-70 bg-green text-center">
                                        <input type="hidden" name="change_amount">
                                        <span value="0" id="change_amount">0.00</span>
                                    </th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="offset-sm-1 col-sm-10">
                    <button type="submit" class="btn btn-primary col-sm-6">Submit Now</button>
                    <button type="reset" class="btn btn-danger col-sm-4">Reset</button>
                </div>
            </div>
            </form>


        </div>
        <!-- /.container-fluid -->
    </section>

@endsection

@push('js')
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
            $('#supplier_id').select2();
            $('#product_id').select2();

            $('#supplier_id').on('change', function() {
                let supplier_id = $('#supplier_id').val();

                $.ajax({
                    url: "{{ route('product.supplier') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        id: supplier_id
                    },
                    success: function(data) {
                        //console.log( data );
                        let html = `<option value="">Select Product</option>`;
                        data.forEach(function(item) {

                            html +=
                                `<option value="${item['id']}">${item['product_name']}</option>`;

                        });

                        $('#product_id').html(html);
                    }
                });

            });

            $('#product_id').on('change', function() {
                let product_id = $('#product_id').val();

                $.ajax({
                    url: "{{ route('product.retreve') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        id: product_id
                    },
                    success: function(data) {

                        let html = `<option value="">Select Product</option>`;


                        $('#item-name').html(data['product_name']);
                        $('#sell_price').val(data['product_price']);
                    }
                });
            });

        });

        $('#quantity').change(function() {
            getSubTotal();
        });

        $('#cost_price').change(function() {
            getSubTotal();
        });



        $('#instant_commisition').change(function() {
            getcommisition()

        });

        $('#monthly_commisition').change(function() {
            getcommisition()

        });

        $('#yearly_commisition').change(function() {
            getcommisition()

        });

        $('#transport_commisition').change(function() {
            getcommisition();


        });

        $('#extra1_commisition').change(function() {
            getcommisition()

        });

        $('#extra2_commisition').change(function() {
            getcommisition()

        });



        function getSubTotal() {
            let quantity = $('#quantity').val();
            let cost_price = $('#cost_price').val();

            // if(quantity>0 && cost_price>0){
            sub_total = quantity * cost_price;
            $('#subtotal').html(sub_total);
            $('#itemtotal').html(sub_total);
            $('#payable_amount').val(sub_total);
            $('#payable_amount_text').html($('#payable_amount').val());



            //}
        }


        function getcommisition() {
            let instant_commisition = $('#instant_commisition').val() * $('#quantity').val();
            let yearly_commisition = $('#yearly_commisition').val() * $('#quantity').val();
            let monthly_commisition = $('#monthly_commisition').val() * $('#quantity').val();
            let transport_commisition = $('#transport_commisition').val() * $('#quantity').val();
            let extra1_commisition = $('#extra1_commisition').val() * $('#quantity').val();
            let extra2_commisition = $('#extra2_commisition').val() * $('#quantity').val();
            let per_product_cost = $('#per_product_cost').val() * $('#quantity').val();

            //get  commisson of sub total
            let inst_commisition = sub_total * (instant_commisition / 100);

            //get instant commission 
            let inst_com = sub_total - inst_commisition;
            //console.log('Instant commisition ' + inst_com);

            //get commission of month
            let montly_com = inst_com - monthly_commisition;
            //console.log('Monthly commisition: ' + montly_com)

            //get commission of yearly
            let yearly_com = montly_com - yearly_commisition;
            //console.log('yearly_commisition commisition: ' + yearly_com);

            //get commission of transport
            let transport_com = yearly_com - transport_commisition;
            //console.log('transport_commisition commisition: ' + transport_com)


            //get commission of extra 1
            let extra1_amount = transport_com - extra1_commisition;
            //console.log('extra1_commisition commisition: ' + extra1_amount)


            //get commission of extra2
            let extra2_amount = extra1_amount - extra2_commisition;
            //console.log('extra2_commisition commisition: ' + extra2_amount)


            $('#payable_amount').val(extra2_amount);
            $('#payable_amount_text').html($('#payable_amount').val());
            let per_amount = extra2_amount / $('#quantity').val();
            $('#per_product_cost').val(per_amount);
            $('#per_product_cost_text').html(per_amount);

            //$('#paid_amount').val(sub_total);


            // let montly_com = inst_com * monthly_commisition / 100;
            // let month_com = inst_com - montly_com;
            // console.log('Monthly commisition ' + month_com);


            // let yearly_com = month_com * yearly_commisition / 100;
            // let year_com = yearly_com - month_com;
            // //console.log('Yearly commisition ' + year_com);

            // let extra1_com = yearly_com * extra1_commisition / 100;
            // let extra01_com = extra1_com - year_com;
            // //console.log('cxtra 1 ' + extra01_com);


            // let extra2_com = yearly_com * extra2_commisition / 100;
            // let extra02_com = extra2_com - extra01_com;
            // console.log('cxtra 2 ' + extra02_com);






        }
    </script>

@endpush
