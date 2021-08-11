@extends('shop.index')

@section('title')
<title>Git - Mô hình đồ chơi cao cấp</title>

@endsection
@section('content')
{{-- <section id="slider">
    <div class="container-slide">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('shop/images/banner/log.jpg')}}" style="height: 600px" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('shop/images/banner/log2.jpg')}}" style="height: 600px" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('shop/images/banner/log3.jpg')}}" style="height: 600px" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section> --}}
{{-- <div class="content">
    <div class="site-blocks-cover">
      <div class="img-wrap">
        <div class="owl-carousel slide-one-item hero-slider">
          <div class="slide">
            <img src="{{asset('shop/images/banner/bn.jpg')}}" alt="Free Website Template by Free-Template.co">  
          </div>
          <div class="slide">
            <img src="{{asset('shop/images/banner/log2.jpg')}}" alt="Free Website Template by Free-Template.co">  
          </div>
          <div class="slide">
            <img src="{{asset('shop/images/banner/bn1.jpg')}}" alt="Free Website Template by Free-Template.co">  
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row shop-now">
          <div class=" ml-auto align-self-center">
            <div class="intro">
              <div class="heading">
                <h1 class="text-white font-weight-bold"><span style="color: #fe980f">GIT</span> -STORE</h1>
              </div>
              <div class="text sub-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit <br> labore et dolore magnaanimi omnis qui distinctio</p>
                <p><a href="https://free-template.co/" target="_blank" class="btn btn-outline-primary btn-md btn-pill">Start a project</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div> --}}
  @include('aside.banner')
  {{-- @include('aside.slide') --}}
<section style="background: url({{asset('shop/images/home/bg.jpg')}}) no-repeat; ">

    <div class="container">
        <div class="row">
        @include('aside.aside_shop')    
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm mới nhất</h2>
                    @foreach($products as $row)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center" style="height: 350px">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$row->id}}" class="cart_product_id_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->Name}}" class="cart_product_name_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->img}}" class="cart_product_image_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->Price}}" class="cart_product_price_{{$row->id}}" >
                                    <input type="hidden" value="1" class="cart_product_amount_{{$row->id}}" >
                                    <img src="{{asset('product/images')}}/{{$row->img}}" alt="" />
                                    <a href="{{url('detail-product')}}/{{$row->Slug}}/{{$row->id}}">{{$row->Name}}</a>
                                    <h6>{{number_format($row->Price),' '}} vnđ</h6><br>

                                    {{-- @if (Session('customer_id'))
                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    @else
                                    <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    @endif --}}
                                  
                                </form> 
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <div class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            {{-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> --}}
                                            @if (Session('customer_id'))
                                                {{-- <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button> --}}
                                                <li>
                                                    <a >
                                                        <button type="button" class=" add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i></button>
                                                    </a>
                                            </li>
                                            @else
                                                {{-- <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> --}}
                                                      <li><a href="{{url('dang-nhap')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    @endforeach
                </div><!--features_items-->
                
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tshirt" data-toggle="tab">Sản phẩm nổi bật</a></li>
                            {{-- <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                            <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                            <li><a href="#kids" data-toggle="tab">Kids</a></li>
                            <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li> --}}
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt" >
                            @foreach($product as $new)
                            <form>
                                @csrf
                                <input type="hidden" value="{{$new->id}}" class="cart_product_id_{{$new->id}}" >
                                <input type="hidden" value="{{$new->Name}}" class="cart_product_name_{{$new->id}}" >
                                <input type="hidden" value="{{$new->img}}" class="cart_product_image_{{$new->id}}" >
                                <input type="hidden" value="{{$new->Price}}" class="cart_product_price_{{$new->id}}" >
                                <input type="hidden" value="1" class="cart_product_amount_{{$new->id}}" >
                            </form>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height: 270px">
                                            <img class="img" src="{{asset('product/images')}}/{{$new->img}}" alt="" />
                                            <a href="{{url('detail-product')}}/{{$new->Slug}}/{{$new->id}}">{{$new->Name}}</a>
                                            <h6>{{number_format($new->Price),' '}} vnđ</h6>
                                            {{-- <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$new->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button> --}}
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <div class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    @if (Session('customer_id'))
                                                    <li>
                                                        <a >
                                                            <button type="button" class=" add-to-cart" name="add-cart" data-id = "{{$new->id}}"><i class="fa fa-shopping-cart"></i></button>
                                                        </a>
                                                    </li>
                                                    @else
                                                    <li><a href="{{url('dang-nhap')}}"><i class="fa fa-shopping-cart"></i></a></li>                                                    
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm yêu thích</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                @foreach($product_like as $like)
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$like->id}}" class="cart_product_id_{{$like->id}}" >
                                    <input type="hidden" value="{{$like->Name}}" class="cart_product_name_{{$like->id}}" >
                                    <input type="hidden" value="{{$like->img}}" class="cart_product_image_{{$like->id}}" >
                                    <input type="hidden" value="{{$like->Price}}" class="cart_product_price_{{$like->id}}" >
                                    <input type="hidden" value="1" class="cart_product_amount_{{$like->id}}" >
                                </form>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('product/images')}}/{{$like->img}}" alt="" />
                                                <a href="{{url('detail-product')}}/{{$like->Slug}}/{{$like->id}}">{{$like->Name}}</a>
                                                <h6>{{number_format($like->Price),' '}} vnđ</h6>
                                                @if (Session('customer_id'))
                                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$like->id}}"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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
                            <div class="item">	
                                @foreach($product_like as $like)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('product/images')}}/{{$like->img}}" alt="" />
                                                <a href="{{url('detail-product')}}/{{$like->Slug}}/{{$like->id}}">{{$like->Name}}</a>
                                                <h6>{{number_format($row->Price),' '}} vnđ</h6>
                                                @if (Session('customer_id'))
                                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$like->id}}"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
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