{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Users')

@section('content_header')
    <h1>All Users</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Users</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('user.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Add User</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Residence</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($users as $user)
            <tr>
              <td>{{$user->user_id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->residence}}</td>
              <td>{{$user->role}}</td>
              <td><a href="{{route('user.edit', $user->user_id)}}">Edit</a> | <a href="{{route('user.delete', $user->user_id)}}">Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Residence</th>
            <th>Role</th>
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