{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Order Details')

@section('content_header')
    <h1>Order Details</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Order Details</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('order.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Place Order</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($orders as $order)
            <tr>
              <td>{{$order->order_id}}</td>
              <td>{{$order->name}}</td>
              <td>{{$order->quantity}}</td>
              <td>{{$order->discount}}</td>
              <td>{{$order->unitprice}}</td>
              <td>{{$order->total}}</td>
              <td>{{$order->customer_name}}</td>
              <td>{{$order->created_at}}</td>
              <td><a href="{{route('order.delete', $order->id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
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
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script> 
    console.log('Hi!'); 

    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'dom'         : 'Bfrtip',
      'buttons'     : ['copy', 'csv', 'excel', 'pdf', 'print']
    })
  })

  </script>
@stop