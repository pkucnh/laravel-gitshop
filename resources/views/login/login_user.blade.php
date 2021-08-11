@extends('shop.index')

@section('title')
<title>Git - Mô hình đồ chơi cao cấp</title>

@endsection
@section('content')
<link rel="stylesheet" href="{{asset('login/css/error.css')}}">
{{-- Banner --}}
@include('aside.slide')
{{-- <section id="advertisement">
    <div class="container">
        <img src="{{asset('shop/images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section> --}}
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="active">Đăng nhập</li>
        </ol>
    </div>
    <div class="row">
        @include('aside.aside_product')
        <div class="col-sm-9 padding-right">
            <div class="left-sidebar">
                <h2>Đăng nhập</h2>
            </div>
            <p class="error-message ">{{ $errors->first('message') }}</p>
            <form class="loginform" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên tài khoản hoặc email</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tài khoản hoặc email">
                    <p class="error-message ">{{ $errors->first('email') }}</p>
                    <small id="emailHelp" class="form-text text-muted">Không chia sẻ tài khoản hoặc email với bất kỳ ai.</small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
                    <p class="error-message ">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu</label>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button><br>
                <a href="{{url('dang-nhap-facebook')}}" class=""><img src="{{asset('shop/images/logo/fb.png')}}" style="height: 35px; width:35; margin-top: 10px; margin-right: 10px;" alt=""></a>
                <a href="{{url('dang-nhap-google')}}" class=""><img src="{{asset('shop/images/logo/gg.png')}}" style="height: 35px; width:35; margin-top: 10px;" alt=""></a>
                {{-- <button type="submit" class="btn btn-google"><i class="fa fa-google-plus" aria-hidden="true">Google</i></button> --}}
            </form>
        </div>
        
    </div>
</div>
@endsection