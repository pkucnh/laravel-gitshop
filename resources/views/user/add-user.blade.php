@extends('admin.index')

@section('title')
<title>Quản lý người dùng</title>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm nhân viên</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Họ và tên</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control">
                                        <p class="error-message">{{ $errors->first('name') }}</p>
                                    </div>               
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="pages" class=" form-control-label">Email</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="email" placeholder="..............." class="form-control">
                                        <p class="error-message">{{ $errors->first('erro') }}</p>
                                        <p class="error-message">{{ $errors->first('email') }}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Mật khẩu</label></div>
                                    <div class="col-12 col-md-9"><input type="password" id="text-input" name="password" placeholder="............." class="form-control">
                                        <p class="error-message">{{ $errors->first('password') }}</p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Địa chỉ</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="address" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Ghi chú</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            <br>
                            <input class="btn btn-success float-right" type="submit" value="Thêm">
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

