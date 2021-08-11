@extends('admin.index')

@section('title')
<title>Quản lý - Phân quyền</title>

@endsection
@section('content')
<style></style>
<div class="content-wrapper">
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Logout</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
                </div>
          </div>
        </div>
      </section> --}}
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4><strong>Phân quyền</strong> </h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$user->name}}" name="name" placeholder="Nhập tên sản phẩm" class="form-control"></div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Chức vụ</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="level" id="select" class="form-control">                             
                                                @foreach($customer as $row)
                                                    @if($row->level === $user->level)
                                                        <option value="{{$row->level}}" selected>
                                                            @if($row->level == 0)
                                                                Người dùng
                                                            @elseif($row->level == 1)
                                                                Quản lý nhân sự
                                                            @elseif($row->level == 2)
                                                                    Quản lý sản phẩm, danh mục
                                                            @elseif($row->level == 3)
                                                                Quản lý mã giảm giá
                                                            @elseif($row->level == 4)
                                                                Quản lý phí vận chuyển
                                                            @elseif($row->level == 5)
                                                                    Quản lý đơn hàng
                                                            @elseif($row->level == 6)
                                                                Quản lý bình luận
                                                            @elseif($row->level == 8)
                                                                Quản trị viên
                                                            @endif
                                                        </option>                          
                                                    @endif 
                                                @endforeach
                                            <option value="0">Người dùng</option>    
                                            <option value="1">Quản lý nhân sự</option>
                                            <option value="2">Quản lý sản phẩm, danh mục</option>
                                            <option value="3">Quản lý mã giảm giá</option>
                                            <option value="4">Quản lý phí vận chuyển</option>
                                            <option value="5">Quản lý đơn hàng</option>
                                            <option value="6">Quản lý bình luận</option>
                                            <option value="8">Quản trị viên</option>
                                        </select>
                                    </div>
                                </div>
                            <br>
                            <!-- <button  name="add-product">Thêm sản phẩm mới</button> -->
                            <input class="btn btn-success float-right" type="submit" value="Cập nhật">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
<!-- Scripts -->
<!-- <script src="{{('https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js')}}"></script> -->
@endsection

