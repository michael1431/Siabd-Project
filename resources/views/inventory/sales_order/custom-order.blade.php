@extends('layouts.fixed')

@section('title','Manage Order -CDF')
@section('style')
    <style>
        .check_label{
            padding: 5px;
        }
    </style>
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Order</h1>
                <p>
                    @if(request('order_history'))
                    <a class="btn btn-xs btn-info" href="{{route('view-order')}}">View Pending Order</a>
                    @else
                    <a class="btn btn-xs btn-info" href="{{route('view-order',['order_history=1'])}}">View Order History</a>
                    @endif
                </p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <div class="row">
        <div class="container-fluid">
        
        <!-- Main content -->
        <section class="content">
            <div class="col-lg-12">
    
                <div class="card"><br>
                    <div class="card-body">
                        <div class="row">
    
                            {{-- requisition items lists start --}}
                            <div class="col-lg-12 table-responsive">
                                <h4 class="bg-info text-center" style="padding: 10px;">List of Order Item's</h4>
                                <div class="table-responsive">
    
                                    <table class="table table-hover table-striped table-bordered" id="productTable">
                                        <thead>
                                            <tr class="bg-info">
                                                <td> #SL</td>
                                                <td> Code</td>
                                                <td> Name</td>
                                                <td> Price</td>
                                                <td> Qty</td>
                                                <td> Remarks</td>
                                                <td> Action </td>
                                            </tr>
                                        </thead>
                                
                                        <tbody class="bodyItem" id="requisition_items">
                                            <tr>
                                                <td colspan="12" class=" bg-danger text-center">Product yet not ordered ! !! !!!</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                
                                    <br>
                                    <br>
                                    <br>
                                
                                </div>
                                {{-- @include('inventory.requisition.item-list-requisition') --}}
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        {{ Form::label('','Sub-Distributor') }}
                                        {{ Form::text('distributor[name]',null,['class'=>'form-control','id'=>"distributor_name"]) }}
                                    </div>
                                    <div class="col-md-4 form-group">
                                        {{ Form::label('','Sub-Distributor Phone') }}
                                        {{ Form::text('distributor[phone]',null,['class'=>'form-control','id'=>"distributor_phone"]) }}
                                    </div>
                                    <div class="col-md-4 form-group">
                                        {{ Form::label('','Sub-Distributor Address') }}
                                        {{ Form::text('distributor[address]',null,['class'=>'form-control','id'=>"distributor_address"]) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        {{ Form::label('','Customer') }}
                                        <select name="customer_name" id="customer_name" class="form-control">
                                            @foreach ($customers as $customer)
                                                @if($customer->user_id)
                                                    <option value="{{ $customer->user_id }}" >{{$customer->name." ".$customer->phone1 }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        {{-- {{ Form::textarea('description',null,['class'=>'form-control confirmationNote','rows'=>5,'cols'=>10,'placeholder'=>'Purchase Requisition note ']) }} --}}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        {{ Form::label('','Note / Description') }}
                                        {{ Form::text('description',null,['class'=>'form-control confirmationNote','placeholder'=>'Order note ']) }}
                                    </div>
                                    <div class="col-md-2 form-group">
                                        {{ Form::label('','') }}
                                        {{ Form::button("Confirm Order",['class'=>'form-control btn btn-info btn-block confirmRequisition','style'=>'margin-top:6px;']) }}
                                    </div>
                                </div>
                               
                                
                                <br>
                                <br>
                            </div>
                            {{-- requisition items lists End --}}
    
                            {{-- Requisition items add form Start --}}
                            <div class="col-lg-12 table-responsive">
                                <h4 class="bg-info text-center" style="padding: 10px;">Item Add Form</h4>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                            {{Form::label('', 'Item Code', ['class'=>'label-control'])}}
                            
                                          {{--  {{ Form::select('inventory_item_id',$codes,null,['class'=>'form-control findInfo','required','id'=>'inventory_item_id findInfo']) }}--}}
                            
                                            {{-- @php
                                                $products = \App\Product::all();
                                                ini_set('max_execution_time', 180)
                                            @endphp --}}
                            
                                            <select onchange="get_product_price()" class="form-control" id="product_id">
                                                <option>Select Code/Name</option>        
                                                    @forelse($products as $product)
                                                        <option value="{{ $product->id }}"> <label class="label-success"> {{ $product->item_code }} </label> - {{ $product->name  }} - {{ $product->department ? $product->department->name : " " }} - {{ $product->group ? $product->group->name : " " }}</option>
                                                    @empty
                                                    @endforelse
                                  
                                            </select>
                                            @if ($errors->has('code'))
                                                <span class="help-block text-center" id="success-alert">
                                                <strong>{{ $errors->first('code') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                            
                            
                            
                                    <div class="col-lg-2 col-sm-2">
                                        <div class="form-group{{ $errors->has('product_unit_id') ? ' has-error' : '' }}">
                                            {{Form::label('', 'Unit', ['class'=>'label-control'])}}
                                            {{ Form::text('product_unit_id',null,['class'=>'form-control','autofocus','readonly','id'=>'unit']) }}
                            
                                            @if ($errors->has('product_unit_id'))
                                                <span class="help-block text-center" id="success-alert">
                                                <strong>{{ $errors->first('product_unit_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-2 col-sm-2">
                                        <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                                            {{Form::label('', 'Qty', ['class'=>'label-control'])}}
                                            {{ Form::text('qty',null,['class'=>'form-control','autofocus','required','placeholder'=>'Ex. 50','autocomplete'=>"off",'id'=>'qty'    ]) }}
                            
                                            @if ($errors->has('qty'))
                                                <span class="help-block text-center" id="success-alert">
                                            <strong>{{ $errors->first('qty') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                            
                            
                                    <div class="col-lg-2 col-sm-2">
                                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                            {{Form::label('', 'Price', ['class'=>'label-control'])}}
                                            {{ Form::text('price',null,['class'=>'form-control','autofocus','required','placeholder'=>'Ex. 120 tk','id'=>'price']) }}
                            
                                            @if ($errors->has('price'))
                                                <span class="help-block text-center" id="success-alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                            
                            
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                            {{Form::label('', 'Note / Remarks / Description ', ['class'=>'label-control'])}}
                                            {{ Form::textarea('note',null,['class'=>'form-control','autofocus','rows'=>5,'cols'=>5,'placeholder'=>'Ex. Remarks / Note / Description','id'=>'note']) }}
                            
                                            @if ($errors->has('price'))
                                                <span class="help-block text-center" id="success-alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            
                                    <div class=" col-lg-3">
                                        <div class="form-group">
                                            {{ Form::button("Add To Order List",['class'=>'btn btn-primary btn-block storeRequestRequisition']) }}
                                        </div>
                                    </div>
                            </div>
                            
    
                            </div>
                            {{-- Requisition items add form End--}}
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        </div>
    </div>
    
    

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('plugin')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>

@stop
@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $('#productTable').dataTable();
        $(document).ready(function () {
                
                pendingProducts();
            });
    
            /* pending product list start */
            function pendingProducts() {
              //alert();
                $.ajax({
                    method:"get",
                    url:"{{ route('inventory.requisition.pending.products',['sales_man_order=1']) }}",
                    dataType:"html",
                    success:function (response) {
                        $("#requisition_items").html(response);
                    }
                });
            }
             /* store requisition at TempData Start*/
            $(document).on('click','.storeRequestRequisition',function () {
                var product_id = $("#product_id").val();
                var price = $("#price").val();
                var qty = $('#qty').val();
                var note = $("#note").val();
    
                if(product_id =="Select Code/Name" || price =='' || qty ==''){
                    $("#qty").css({"background":"#DC4C40","color":"#fff"});
                    $("#price").css({"background":"#DC4C40","color":"#fff"});
                }else{
                    $.ajax({
                        method:"post",
                        url:"{{ route('inventory.purchase.temp.store') }}",
                        data : {product_id:product_id,price:price,qty:qty,type:5,note:note, _token:"{{ csrf_token() }}"},
                        dataType:"json",
                        success:function (res) {
                            pendingProducts();
                            if(res.success == 1){
                                $.notify("Product / Item Added to Order List", {globalPosition: 'bottom center',className: 'success'});
                            }
                            $("#unit").val(null);
                            $("#price").val(null);
                            $('#qty').val(null);
                            $('#note').val(null);
                        }
                    });
                }
            });
            // /* store requisition at TempData End */
    
          function get_product_price(){
              var id = $("#product_id").val();
              if(id !=null){
                  $.ajax({
                      method:"post",
                      url:"{{ route('inventory.item.info') }}",
                      data: {id:id, _token:"{{ csrf_token() }}"},
                      dataType:'json',
                      success:function (response) {
                          //$("#unit").val(response.unit);
                          $("#price").val(response.price);
                      }
                  });
              }
          }
            /* Requisition Confirmation Start */
            $(document).on("click",".confirmRequisition",function () {
               var note = $('.confirmationNote').val();
               var customer = $('#customer_name').val();
               var distributor_name = $('#distributor_name').val();
               var distributor_phone = $('#distributor_phone').val();
               var distributor_address = $('#distributor_address').val();
                
                var token  = "{{ csrf_token() }}";
                $.ajax({
                    method:"post",
                    url : "{{ route('store-daily-log') }}",
                    data:{ note:note, _token:token,customer:customer,name:distributor_name,phone:distributor_phone,address:distributor_address},
                    dataType:"json",
                    success:function (res) {
                        if (res.success == 1){
                            pendingProducts();
                            $.notify("Order Created successfully", {globalPosition: 'bottom center',className: 'success'});
                            $('.confirmationNote').val(null);
                        }
                    }
                });
    
            });
    </script>
@stop
         
    

@stop
