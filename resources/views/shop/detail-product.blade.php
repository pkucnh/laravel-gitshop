@extends('shop.index')

@section('title')
<title>Git - Mô hình đồ chơi cao cấp</title>

@endsection
@section('content')
{{-- Banner --}}
@include('aside.slide')
<section>
    <div class="container mt-25">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                @foreach($products as $pro)
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Chi tiết sản phẩm  >  {{$pro->Slug}}</li>
                    {{-- <li class="active">{{$pro->Slug}}</li> --}}
                @endforeach
            </ol>
        </div>
        <div class="row">
            @include('aside.aside_product')  
            <div class="col-sm-9 padding-right">
                @foreach($products as $pro)
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset('product/images')}}/{{$pro->img}}" alt="" />
                            <h3>100%</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                      <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img1}}" style="height: 100px; width: 87px;" alt=""></a>
                                      <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img2}}"  style="height: 100px; width: 87px;" alt=""></a>
                                      <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img3}}"  style="height: 100px; width: 87px;"  alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img1}}" style="height: 100px; width: 87px;" alt=""></a>
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img2}}"  style="height: 100px; width: 87px;" alt=""></a>
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img3}}"  style="height: 100px; width: 87px;"  alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img1}}" style="height: 100px; width: 87px;" alt=""></a>
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img2}}"  style="height: 100px; width: 87px;" alt=""></a>
                                        <a href=""><img onerror="this.src='{{asset('product/images/noimg.jpg')}}'" src="{{asset('product/images')}}/{{$pro->img3}}"  style="height: 100px; width: 87px;"  alt=""></a>
                                    </div>
                                    
                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('shop/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h1 value="{{$pro->Name}}" class="cart_product_name_{{$pro->id}}">{{$pro->Name}}</h1>
                            <p>ID: {{$pro->id}}</p>
                            <img src="{{asset('shop/images/product-details/rating.png')}}" alt="" />
                            <form>
                                <span>
                                   @csrf
                                    <input type="hidden" value="{{$pro->id}}" class="cart_product_id_{{$pro->id}}">
                                    <input type="hidden" value="{{$pro->Name}}" class="cart_product_name_{{$pro->id}}">
                                    <input type="hidden" value="{{$pro->img}}" class="cart_product_image_{{$pro->id}}">
                                    <input type="hidden" value="{{$pro->Price}}" class="cart_product_price_{{$pro->id}}">
                                    <span>{{number_format($pro->Price),' '}}vnđ</span><br><br><br>
                                    <label>Số lượng:</label>
                                    <input type="number" name="amount" min="1" max="{{$pro->Amount}}" value="1" class="cart_product_amount_{{$pro->id}}">
                                    <p>Số lượng trong kho: {{$pro->Amount}}</p>
                                    <p><b>Tình trạng:</b>
                                        @if($pro->Amount==0)
                                            Hết hàng
                                        @else
                                            Còn hàng
                                        @endif
                                    </p>
                                    <p><b>Ngày nhập:</b>{{$pro->created_at}}</p>
                                    <p><b>Số lượt xem:</b> {{$pro->Views}}</p><br>
                                    <p><b>Tag:</b> <a href="">Onepiece</a> | <a href="">Naruto</a> | <a href="">The ragons ball</a></p><br>
                                    {{-- <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=507829347122115&autoLogAppEvents=1" nonce="0mU0s01k"></script> --}}
                                    {{-- <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="large">
                                        <a target="_blank"href="{{\URL::current()}}&amp;src=sdkpreparse"  class="fb-xfbml-parse-ignore">Chia sẻ</a></div> --}}
                                        <div class="fb-like" data-href="{{\URL::current()}}" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
                                    <input type="hidden" name="productid_hidden" value="{{$pro->id}}" />
                                    @if($pro->Amount==0)
                                        <img src="{{asset('shop/images/blog/sold.png')}}" width="120px" height="120px" alt="">
                                    @else
                                        @if (Session('customer_id'))
                                        <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$pro->id}}"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                        @else
                                        {{-- <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Mua ngay</a> --}}
                                        <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        {{-- <button type="submit" class="btn btn-default add-to-cart" href="{{url('dang-nhap')}}"><i class="fa fa-shopping-cart"></i>Add to cart</button> --}}
                                        @endif
                                    @endif
                   
                                </span>
                            </form>
                            {{-- <a href=""><img src="{{asset('shop/images/product-details/share.png" class="share img-responsive')}}"  alt="" /></a> --}}
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
        
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Mô tả</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Bình luận</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-12" style="padding: 10px 20px">
                               <p >{!!$pro->Note!!}</p>
                            </div>            
                        </div>
                        @endforeach
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>PhucNH</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <form >
                                    @csrf
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$pro->id}}">
                                    <div id="comment_show"></div>                                
                                </form>
                                <p><b class="mt-2">Bình luận:</b></p>
                               
                                @if(Session('customer_id'))
                                    <form action="#">
                                        <textarea class="comment_content"></textarea>
                                        <input type="hidden" class="user_id" value="{{Session('customer_id')}}">
                                        <div id="notify_comment"></div>
                                        <button type="button" class="btn btn-default pull-right send-comment">
                                            Gửi
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm đề xuất</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                @foreach($productoffer as $offer)
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$offer->id}}" class="cart_product_id_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->Name}}" class="cart_product_name_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->img}}" class="cart_product_image_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->Price}}" class="cart_product_price_{{$offer->id}}" >
                                    <input type="hidden" value="1" class="cart_product_amount_{{$offer->id}}" >
                                </form>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('product/images')}}/{{$offer->img}}" style="height: 250px" alt="" />
                                                {{-- <h2>${{$offer->Price}}</h2> --}}
                                                {{-- <p>{{$offer->Name}}</p> --}}
                                                <a href="{{url('detail-product')}}/{{$offer->Slug}}/{{$offer->id}}">{{$offer->Name}}</a>
                                                <h6>{{number_format($offer->Price),' '}}vnđ</h6>
                                                @if (Session('customer_id'))
                                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$offer->id}}"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                                @else
                                                    <a class="btn btn-default add-to-cart" style="color: #363432;
                                                    font-size: 16px;
                                                    font-weight: 300;
                                                    font-family: 'Roboto', sans-serif" href="{{url('dang-nhap')}}"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>                                               
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
    
</section>
@endsection