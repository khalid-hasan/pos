{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('meta')
<meta name="csrf_token" content="{{ csrf_token() }}" />  
@stop

@section('title', 'Shipment Products')

@section('content_header')
    <h1>Shipment Products</h1>
@stop

@section('content')


<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{$shipment->shipment_name}}</h3>
      </div>
      <form role="form" method="post" >
        @csrf
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
            </thead>
            <tbody>
            
              @foreach($shipment_products as $shipment_product)
                <tr>
                  <td>{{$shipment_product->name}}</td>
                  <td>{{$shipment_product->quantity}}</td>
                  <td>{{$shipment_product->price}}</td>
                </tr>
              @endforeach
            
            </tbody>
            <tfoot>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
            </tfoot>
          </table>
        </div>

        <input type="hidden" class="shipment_id form-control" name="shipment_id[]" value="{{$shipment->id}}">
        @foreach($shipment_products as $shipment_product)
        <input type="hidden" class="product_id form-control" name="product_id[]" value="{{$shipment_product->product_id}}">
        <input type="hidden" class="quantity form-control" name="quantity[]" value="{{$shipment_product->quantity}}">
        <input type="hidden" class="price form-control" name="price[]" value="{{$shipment_product->price}}">
        @endforeach

        @if (session()->has('message'))
          <div class="error receive">{{ session('message') }}</div>
        @endif        
        <button type="submit" class="btn btn-primary receive">Add To Inventory</button>

      </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
@stop

@section('js')
  <script> 
    console.log('Hi!'); 

    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


  </script>

@stop