{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Transferred Money')

@section('content_header')
    <h1>All Transferred Money</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Transferred Money</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('transfer.create')}}'" type="button" class="btn btn-block btn-primary add-btn">Transfer Money</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Receiver Name</th>
            <th>Sender Name</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($transfers as $transfer)
            <tr>
              <td>{{$transfer->id}}</td>
              <td>{{$transfer->amount}}</td>
              <td>{{$transfer->receiver_name}}</td>
              <td>{{$transfer->sender_name}}</td>
              <td>{{$transfer->status}}</td>
              <td>{{$transfer->created_at}}</td>
              <td>
                @if ($transfer->status == 'Sent')
                <a href="{{route('transfer-bd.receive', $transfer->id)}}">Receive</a>

                @elseif ($transfer->status == 'Received')
                <a href="{{route('transfer-bd.undo', $transfer->id)}}">Undo</a>
                @endif
              </td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Receiver Name</th>
            <th>Sender Name</th>
            <th>Status</th>
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