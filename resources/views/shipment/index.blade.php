{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Shipments')

@section('content_header')
    <h1>All Shipments</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Shipments</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('shipment.create')}}'" type="button" class="btn btn-block btn-primary add-btn">New Shipment</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Shipment ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Send Date</th>
            <th>Receive Date</th>
            <th>Added By</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($shipments as $shipment)
            <tr>
              <td>{{$shipment->id}}</td>
              <td>{{$shipment->name}}</td>
              <td>{{$shipment->quantity}}</td>
              <td>{{$shipment->send_date}}</td>
              <td>{{$shipment->receive_date}}</td>
              <td>{{$shipment->added_by}}</td>
              <td><a href="{{route('shipment.delete', $shipment->product_id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>Shipment ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Send Date</th>
            <th>Receive Date</th>
            <th>Added By</th>
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