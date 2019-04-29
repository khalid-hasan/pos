{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Factories')

@section('content_header')
    <h1>Factories</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Factories</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('factory.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Add Factory</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($factories as $factory)
            <tr>
              <td>{{$factory->id}}</td>
              <td>{{$factory->factory_name}}</td>
              <td>{{$factory->address}}</td>
              <td>{{$factory->phone}}</td>
              <td><a href="{{route('factory.edit', $factory->id)}}">Edit</a> | <a href="{{route('factory.delete', $factory->id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Factory Name</th>
            <th>Address</th>
            <th>Mobile</th>
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