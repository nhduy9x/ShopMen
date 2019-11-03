@extends('layouts.admin.main')    
@section('title','Đơn hàng')
@section('page','Đơn hàng')
@section('content')
<div class="row">
  <div class="col-lg-6">
    <div class="box">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Tạo mã ưu đãi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Mức ưu đãi</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Loại mã ưu đãi</label>
                  <select name="category_id" class="form-control">
                  <option value="">--chon--</option>
                                               
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Thời gian kết thúc</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>   
            
    </div>
  </div>
  <div class="col-lg-6">
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
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>#msanf
                  </td>
                  <td>theo phần trăm/theo tiền</td>
                  <td>7/8/2019</td>
                  <td><a href="" class="btn btn-primary">Sửa</a>
                      <a href="" class="btn btn-danger">Xóa</a>
                      
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Mozilla 1.8</td>
                  <td>Chờ xác nhận</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Seamonkey 1.1</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>A</td>
                </tr>
                
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