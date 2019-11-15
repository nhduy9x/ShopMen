@extends('layouts.admin.main')    
@section('title','Mã giảm giá')
@section('page','Mã giảm giá')
@section('content')
<div class="row">
  <div class="col-lg-4">
    <div class="box">
         <div class="box box-primary">
            <div class="box-header with-border">
              @if(isset($code))
              <h3 class="box-title"> Sửa mã ưu đãi</h3>
              @else
              <h3 class="box-title"> Tạo mã ưu đãi</h3>
              @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('save')}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="{{isset($code->id)?$code->id:''}}">
                  <label for="exampleInputEmail1">Mức ưu đãi</label>
                  <input type="type" name="value" class="form-control" id="exampleInputEmail1" placeholder="giảm theo -10% hoặc chừ tiền trực tiếp -10000 " value="{{isset($code->value)?$code->value:''}}">
                </div>
                <span style="color: red">
                  @if(count($errors)>0)
                    {{$errors->first('value')}}
                  @endif
                </span>
                <div class="form-group">
                  <label for="exampleInputEmail1">thể loại sale</label>
                  <input type="type" name="type" class="form-control" id="exampleInputEmail1" placeholder="sale"
                  value="{{isset($code->type)?$code->type:''}}">
                </div>
                <span style="color: red">
                  @if(count($errors)>0)
                    {{$errors->first('type')}}
                  @endif
                </span>
                <div class="form-group">
                  <label for="exampleInputEmail1">Số lượng:</label>
                  <input type="type" name="stocks" class="form-control" id="exampleInputEmail1" placeholder="số lượng ưu đãi" value="{{isset($code->stocks)?$code->stocks:''}}">
                </div>
                <span style="color: red">
                  @if(count($errors)>0)
                    {{$errors->first('stocks')}}
                  @endif
                </span>
                <div class="form-group">
                  <label for="exampleInputPassword1">Loại mã ưu đãi</label>
                  <select name="target" class="form-control">
                  <option value="">--chon--</option>
                  <option value="total">Tong tien</option>
                  <option value="subtotal">Tong tien chua ship</option>                             
                  </select>
                </div>
                <span style="color: red">
                  @if(count($errors)>0)
                    {{$errors->first('target')}}
                  @endif
                </span>
                <div class="form-group date">
                  <label for="exampleInputEmail1">Thời gian kết thúc</label>
                  <input type="date" class="form-control" name="date" id="exampleInputEmail1" placeholder="Thời gian kết thúc" value="{{isset($code->time_expired)?$code-> time_expired:''}}">
                </div>
                <span style="color: red">
                  @if(count($errors)>0)
                    {{$errors->first('date')}}
                  @endif
                </span>
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>   
            
    </div>
  </div>
  <div class="col-lg-8">
    <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã ưu đãi</th>
                  <th>Loại ưu đãi</th>
                  <th>Thơi gian kết thúc</th>
                  <th>Số lượng</th>
                  <th>Chương trình sale</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($codes as $code)
                <tr>
                  <td>{{$code->id}}</td>
                  <td>{{$code->code_name}}</td>
                  <td>{{$code->target}}</td>
                  <td>{{$code->time_expired}}</td>
                  <td>{{$code->stocks}}</td>
                  <td>{{$code->type}}</td>
                  <td><a href="{{route('code','id'.'='.$code->id)}}" class="btn btn-primary">Sửa</a>
                      <a href="" class="btn btn-danger">Xóa</a>
                      
                  </td>
                </tr>
                @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
</div>
 
@endsection
@section('js')
<script>
                function confirmDel() {
                    return confirm("Bạn có chắc xóa không");
                }

            </script>
@endsection