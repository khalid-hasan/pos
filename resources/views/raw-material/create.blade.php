{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Add Raw Material')

@section('content_header')
    <h1>Add Raw Material</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Raw Material</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" >
              <div class="box-body">

                <div class="form-group">
                  @csrf
                  <label>Select Factory</label>
                  <select class="form-control" name="factory_id" required>
                    <option value="">--SELECT--</option>
                    @foreach ($factories as $factory)
                    <option value="{{$factory->factory_id}}">{{$factory->factory_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Raw Material Name</label>
                  <input type="text" class="form-control" id="material_name" placeholder="Raw Material Name" name="material_name" value="{{ old('material_name') }}">
                </div>
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" value="{{ old('quantity') }}" required>
                </div>  
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                  <label>Production Type</label>
                  <input type="text" class="form-control" id="production_type" placeholder="Production Type" name="production_type" value="{{ old('production_type') }}" required>
                </div>
                <div class="form-group">
                  <label>Assign Date</label>
                  <input type="date" class="form-control" id="assign_date" placeholder="Assign Date" name="assign_date" value="{{ old('assign_date') }}" required>
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