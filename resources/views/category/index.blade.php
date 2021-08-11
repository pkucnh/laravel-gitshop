@extends('admin.index')

@section('title')
<title>Quản trị - Loại sản phẩm</title>

@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  {{-- <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header bg-dark">
              <h3 style="text-align: center">QUẢN LÝ LOẠI SẢN PHẨM</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                      <th>ID</th>
                      <th>Danh mục</th>
                      <th>Tên loại</th>
                      <th>Ảnh đại diện</th>
                      <th>Mô tả</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>{{$row->Name}}</td>
                            <td><img class="img" src="{{asset('category/images')}}/{{$row->img}}"></td>
                            <td style="width: 100px">{!!$row->Note!!}</td>
                            <td><a href="{{url('/category/update')}}/{{$row->id}}" class="btn btn-warning">Cập nhật</a></td>
                            {{-- <td><a onclick=" deletecategory('{{$row->id}}');" class="btn btn-danger">Xóa</a></td> --}}
                            <td><button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#largeModal{{$row->id}}">Xóa</a></td>
                              <div class="modal fade" id="largeModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h5 class="modal-title" id="largeModalLabel">Chi tiết thông tin</h5> --}}
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="card">                                               
                                                <div class="card-body">
                                                        <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                         Bạn có chắc chắn muốn xóa? <a href="{{url('/category/delete')}}/{{$row->id}}"  class="btn btn-danger">Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </tr>
                      @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <script type="text/javascript">
    function deletecategory(id){
      let link = "{{url('/category/delete')}}";
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