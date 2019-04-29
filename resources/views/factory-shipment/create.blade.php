{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'New Shipment')

@section('content_header')
    <h1>New Shipment</h1>
@stop

@section('content')

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Shipment</h3>
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
                  <label>Shipment Name</label>
                  <input type="text" class="form-control" id="shipment_name" placeholder="Shipment Name" name="shipment_name" value="{{ old('shipment_name') }}">
                </div>
                <div class="form-group">
                  <label>Shipment Creation Date</label>
                  <input type="date" class="form-control" id="shipment_creation_date" placeholder="Shipment Creation Date" name="shipment_creation_date" value="{{ old('shipment_creation_date') }}" required>
                </div>
                <div class="form-group">
                  <label>Shipment Arrival Date</label>
                  <input type="date" class="form-control" id="shipment_arrival_date" placeholder="Shipment Arrival Date" name="shipment_arrival_date" value="{{ old('shipment_arrival_date') }}" required>
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