@extends('shop.index')

@section('title')
<title>Git - Mô hình đồ chơi cao cấp</title>

@endsection
@section('content')
{{-- Banner --}}
@include('aside.slide')  
<section id="advertisement">
</section>
<section>
    <div class="container">
        <div class="row">
            @include('aside.aside_shop')  
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản phẩm</h2>
                    @foreach($search as $key => $row)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('product/images')}}/{{$row->img}}" alt="" />
                                    <a href="{{url('detail-product')}}/{{$row->id}}">{{$row->Name}}</a>
                                    <h5>{{number_format($row->Price),' '}}vnđ</h5><br>
                                    {{-- @if (Session('customer_id'))
                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    @else
                            
                                    <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>

                                    @endif --}}
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <div class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    {!!$search->links();!!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection