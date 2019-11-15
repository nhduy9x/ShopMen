@extends('layouts.admin.main')    
@section('title','Đơn hàng')
@section('page','Đơn hàng')
@section('content')
 <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Thơi gian</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                <tr>
                  <td>{{$order->id}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->created_at}}</td>
                  <td>
                    @if($order->status<1)
                    chơ xác nhận
                    @elseif($order->status<2)
                    đã xác nhận
                    @elseif($order->status<3)
                    đã hoàn thành
                    @else
                    đơn hàng đã bị hủy
                    @endif
                  </td>
                  <td><a href="" class="btn btn-primary">Xác nhận đơn hàng</a>
                      <a href="" class="btn btn-danger">Hủy đơn hàng</a>
                      
                  </td>
                </tr>
                  @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@section('js')
<script>
                function confirmDel() {
                    return confirm("Bạn có chắc xóa không");
                }

            </script>
@endsection