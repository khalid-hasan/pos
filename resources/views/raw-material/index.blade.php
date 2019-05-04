{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Raw Materials')

@section('content_header')
    <h1>All Raw Materials</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Raw Materials</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('raw-material.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Add Raw Material</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Material Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($raw_materials as $raw_material)
            <tr>
              <td>{{$raw_material->id}}</td>
              <td>{{$raw_material->material_name}}</td>
              <td>{{$raw_material->quantity}}</td>
              <td>{{$raw_material->price}}</td>
              <td><a href="{{route('raw-material.delete', $raw_material->id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Material Name</th>
            <th>Quantity</th>
            <th>Price</th>
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