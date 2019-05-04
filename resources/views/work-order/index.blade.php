{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'All Work Orders')

@section('content_header')
    <h1>All Work Orders</h1>
@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">All Work Orders</h3>
      </div>

      <div class="col-6 col-sm-4">
      <button onclick="location.href='{{route('work-order.create')}}'" type="button" class="btn btn-block btn-primary add-btn">New Work Order</button>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Factory</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Assigned Date</th>
            <th>Received Date</th>
            <th>Remaining Quantity</th>
            <th>Received Quantity</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          
            @foreach ($work_orders as $work_order)
            <tr>
              <td>{{$work_order->id}}</td>
              <td>{{$work_order->factory_name}}</td>
              <td>{{$work_order->name}}</td>
              <td>{{$work_order->product_quantity}}</td>
              <td>{{$work_order->raw_material_total_price}}</td>
              <td>{{$work_order->assigned_date}}</td>
              <td>{{$work_order->received_date}}</td>
              <td>{{$work_order->remaining_quantity}}</td>
              <td>{{$work_order->received_quantity}}</td>
              <td>{{$work_order->status}}</td>
              <td><a href="" class="btn btn-info order" role="button" data-toggle="modal" data-target="#myModal" data-work-id="{{$work_order->id}}" data-product-id="{{$work_order->product_id}}"><span class="glyphicon glyphicon-plus"></span> Receive</a> <a href="{{route('work-order.delete', $work_order->id)}}" class="btn btn-info order" role="button"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
            </tr>
            @endforeach
          
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
            <th>Factory</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Assigned Date</th>
            <th>Received Date</th>
            <th>Remaining Quantity</th>
            <th>Received Quantity</th>
            <th>Status</th>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Receive Product</h4>
          </div>
            <div class="modal-body">
              <div class="panel-body">

                <form role="form" method="post" >
                  @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label>Work ID</label>
                      <input type="text" class="form-control" id="work_id" name="work_id" readonly>
                    </div> 

                    <div class="form-group">
                      <label>Product ID</label>
                      <input type="text" class="form-control" id="product_id" name="product_id" readonly>
                    </div> 

                    <div class="form-group">
                      <label>Received Quantity</label>
                      <input type="text" class="form-control" id="received_quantity" placeholder="Received Quantity" name="received_quantity" value="{{ old('received_quantity') }}" required>
                    </div> 

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

                    <button type="submit" class="btn btn-primary">Receive</button>

                    </div>
                  </div>
                </form>
          </div>
        </div>
      </div>
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

  $('#myModal').on('show.bs.modal', function(e) {
      var workId = $(e.relatedTarget).data('work-id');
      $(e.currentTarget).find('input[name="work_id"]').val(workId);
  });

  $('#myModal').on('show.bs.modal', function(e) {
      var productId = $(e.relatedTarget).data('product-id');
      $(e.currentTarget).find('input[name="product_id"]').val(productId);
  });
  </script>
@stop