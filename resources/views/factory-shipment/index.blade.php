{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Shipment Details')

@section('content_header')
    <h1>All Shipment Details</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Shipment Details</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('factory-shipment.create')}}'" type="button" class="btn btn-block btn-primary add-btn">New Shipment</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Shipment Name</th>
            <th>Shipment Creation Date</th>
            <th>Shipment Arrival Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($factory_shipments as $factory_shipment)
            <tr>
              <td>{{$factory_shipment->id}}</td>
              <td>{{$factory_shipment->factory_name}}</td>
              <td>{{$factory_shipment->shipment_name}}</td>
              <td>{{$factory_shipment->shipment_creation_date}}</td>
              <td>{{$factory_shipment->shipment_arrival_date}}</td>
              <td><a href="{{route('factory-shipment.delete', $factory_shipment->id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Shipment Name</th>
            <th>Shipment Creation Date</th>
            <th>Shipment Arrival Date</th>
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