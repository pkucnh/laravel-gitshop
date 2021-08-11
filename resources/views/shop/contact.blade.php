@extends('shop.index')

@section('title')
<title>Git - Mô hình đồ chơi cao cấp</title>

@endsection
@section('content')
{{-- Banner --}}
@include('aside.slide') 

<div id="contact-page" class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Trang chủ</a></li>
          <li class="active">Liên hệ</li>
        </ol>
    </div>
    <div class="bg">
        <div class="row">    		
            <div class="col-sm-12">    			   			
                {{-- <h2 class="title text-center">LIÊN HỆ VỚI CHÚNG TÔI</h2>    			    				    				 --}}
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.060602914979!2d106.64649881462353!3d10.882995292249277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d61ee0b66ff5%3A0xc702e452b8cc9c25!2zNjgsIDIgVGjhu5tpIEFuIDExLCBIaeG7h3AgVGjDoG5oLCBRdeG6rW4gMTIsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1627217258651!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>			 		
        </div>    	
        <div class="row"style="margin-top: 20px">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Liên hệ</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Nhập tên">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Nhập email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="number" name="phone" class="form-control" required="required" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            @if(Session('thongbao'))
                                <div class="alert alert-success">{{Session('thongbao')}}</div>
                                   @php
                                   Session('thongbao',null)
                                   @endphp
                            @endif
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi yêu cầu">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông tin liên hệ</h2>
                    <address>
                        <p>Web: Gitstore.com</p>
                        <p>Địa chỉ: 68/2A, Thới An 11, Phường Thới An, Q.12, TP.HCM</p>
                        {{-- <p>Newyork USA</p> --}}
                        <p>SĐT: +84 981 799 175</p>
                        {{-- <p>Fax: 1-714-252-0026</p> --}}
                        <p>Email: phucnh2307@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Mạng xã hội</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-github"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->

@endsection