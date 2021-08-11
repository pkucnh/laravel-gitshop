@extends('admin.index')

@section('title')
<title>Nhân sự - sửa</title>

@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        {{-- <div class="container-fluid">
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
        </div> --}}
      </section>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4><strong>Cập nhật nhận viên</strong> </h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="name" class=" form-control-label">Họ và tên</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$user->name}}" placeholder="........" class="form-control">
                                            <p class="error-message">{{ $errors->first('name') }}</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Ảnh đại diện</label></div>
                                        <div class="col-12 col-md-9"><input type="file"name="img" value="{{$user->img}}" class="form-control-file" required><img src="{{asset('user/images')}}/{{$user->img}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Địa chỉ</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="address" value="{{$user->Address}}" placeholder="........" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="content" class=" form-control-label">Ghi chú</label></div>
                                        <div class="col-12 col-md-9">
                                        <textarea name="note" class="ckeditor" cols="30" rows="10">{!!$user->Note!!}</textarea>
                                        </div>
                                    </div>
                                <br>
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

