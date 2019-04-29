{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add User')

@section('content_header')
    <h1>Add User</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">
                @csrf
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" id="user_id" placeholder="Username" name="user_id" value="{{ old('user_id') }}" required="">
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}" required>
                </div> 
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ old('address') }}" required>
                </div> 
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                </div> 
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
                </div> 
                <div class="form-group">
                  <label>Residence</label>
                  <select class="form-control" name="residence" required>
                    <option value="">--SELECT--</option>
                    <option value="BN">Bangladesh</option>
                    <option value="IN">India</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>User Role</label>
                  <select class="form-control" name="role" required>
                    <option value="">--SELECT--</option>
                    <option value="Seller">Seller</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
              <div class="error">{{ session('message') }}</div>
            @endif

                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
           </div>
            </form>
          </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop