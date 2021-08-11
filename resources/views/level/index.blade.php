@extends('admin.index')

@section('title')
<title>Quản trị | Git</title>

@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card mt-2">
                <div class="card-header bg-dark">
                  <h3 style="text-align: center">QUẢN LÝ PHÂN QUYỀN</h3>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Ảnh</th>
                      <th>Chức vụ</th>
                      <th></th>
                      <th></th>
                      {{-- <th></th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td><img class="img" onerror="this.src='{{asset('shop/images/home/defauld.jpg')}}'" src="{{asset('user/images')}}/{{$row->img}}"></td>
                            <td>
                                @if($row->level == 0)
                                    <b class="text-primary">Người dùng</b>
                                @endif
                                @if($row->level == 1)
                                <b class="text-success">Quản lý nhân sự</b>
                                @endif
                                @if($row->level == 2)
                                <b class="text-warning">Quản lý sản phẩm,</b>
                                @endif
                                @if($row->level == 2)
                                <b class="text-warning">Quản lý loại sản phẩm </b>
                                @endif
                                @if($row->level == 3)
                                <b class="text-info">Quản lý mã giảm giá </b>
                                @endif
                                @if($row->level == 4)
                                <b class="text-dark">Quản lý phí vận chuyển </b>
                                @endif
                                @if($row->level == 5)
                                <b class="text-orange">Quản lý đơn hàng </b>
                                @endif
                                @if($row->level == 6)
                                <b class="text-secondary">Quản lý bình luận </b>
                                @endif
                                @if($row->level == 8)
                                <b class="text-danger">Quản trị viên </b>
                                @endif
                            </td>
                            <td><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal{{$row->id}}">
                              Xem
                          </button></td>
                            <td><a href="{{url('/level/up')}}/{{$row->id}}" class="btn btn-danger">Phân quyền</a></td>
                            {{-- <td><a onclick=" deleteuser('{{$row->id}}');" class="btn btn-danger">Xóa</a></td> --}}
                            {{-- <td><button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#largeModal2{{$row->id}}">Xóa</a></td>
                              <div class="modal fade" id="largeModal2{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="card">                                               
                                                <div class="card-body">
                                                        <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                         Bạn có chắc chắn muốn xóa? <a href="{{url('/user/delete')}}/{{$row->id}}"  class="btn btn-danger">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                          </tr>
                          <div class="modal fade" id="largeModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Chi tiết thông tin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="card">                                               
                                            <div class="card-body">
                                                    <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                    <div class="col-sm-6 float-left">
                                                      <img class="card-img-top" onerror="this.src='{{asset('shop/images/home/defauld.jpg')}}'" src="{{asset('user/images')}}/{{$row->img}}" style="height: 300px; width:300px; display:block;">        
                                                    </div>        
                                                    <div class="col-sm-6 float-left">                                  
                                                        <ul class="list">
                                                            <li><h5 style="font-weight: bold;"><span>Email</span>: <b class="text-danger">{{$row->email}}</b></h5></li>
                                                            <li><h5 style="font-weight: bold;"><span>Mật khẩu</span>: <b class="text-danger">{{$row->password}}</b></h5></li>
                                                            <li><h5 style="font-weight: bold;"><span>Cấp bậc</span>: <b class="text-danger">
                                                              @if($row->level == 0)
                                                                    <b class="text-primary">Người dùng</b>
                                                                @endif
                                                                @if($row->level == 1)
                                                                <b class="text-success">Quản lý nhân sự</b>
                                                                @endif
                                                                @if($row->level == 2)
                                                                <b class="text-warning">Quản lý sản phẩm,</b>
                                                                @endif
                                                                @if($row->level == 2)
                                                                <b class="text-warning">Quản lý loại sản phẩm </b>
                                                                @endif
                                                                @if($row->level == 3)
                                                                <b class="text-info">Quản lý mã giảm giá </b>
                                                                @endif
                                                                @if($row->level == 4)
                                                                <b class="text-dark">Quản lý phí vận chuyển </b>
                                                                @endif
                                                                @if($row->level == 5)
                                                                <b class="text-orange">Quản lý đơn hàng </b>
                                                                @endif
                                                                @if($row->level == 6)
                                                                <b class="text-secondary">Quản lý bình luận </b>
                                                                @endif
                                                                @if($row->level == 8)
                                                                <b class="text-danger">Quản trị viên </b>
                                                                @endif
                            
                                                            </b></h5></li>
                                                            <li><h5 style="font-weight: bold;"><span>Địa chỉ</span>: <b class="text-danger"></b>{{$row->Address}}</h5></li>   
                                                            <li><h5 style="font-weight: bold;"><span>Ghi chú</span>: <b class="text-danger"></b>{!!$row->Note!!}</h5></li>  
                                                            <li><h5 style="font-weight: bold;"><span>Ngày nhập</span>: <b class="text-danger"></b>{{$row->created_at}}</h5></li>          
                                                            <li><h5 style="font-weight: bold;"><span>Ngày cập nhật</span>: <b class="text-danger"></b>.{{$row->updated_at}}</h5></li>   
                                                        </ul>
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
             
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content-wrapper -->
  </div>
  <script type="text/javascript">
    function deleteuser(id){
      let link = "{{url('/user/delete')}}";
      if(confirm('Are you sure you want to delete?')){
        $.ajax({
          url: link,
          data: {
            'id':id,
            '_token': '{{csrf_token()}}',
          },
          type: "post",
          error: function(xhr, status, errorThrow){
            alert( errorThrow);
          },
          success: function(data){
            alert(data);
            location.reload();
          }
        });
      }
    }
  </script>
@endsection