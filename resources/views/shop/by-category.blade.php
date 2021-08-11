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
                    @foreach($products as $row)
                    <form>
                        @csrf
                        <input type="hidden" value="{{$row->id}}" class="cart_product_id_{{$row->id}}" >
                        <input type="hidden" value="{{$row->Name}}" class="cart_product_name_{{$row->id}}" >
                        <input type="hidden" value="{{$row->img}}" class="cart_product_image_{{$row->id}}" >
                        <input type="hidden" value="{{$row->Price}}" class="cart_product_price_{{$row->id}}" >
                        <input type="hidden" value="1" class="cart_product_amount_{{$row->id}}" >
                    </form>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('product/images')}}/{{$row->img}}" style="height: 280px" alt="" />
                                    <a href="{{url('detail-product')}}/{{$row->Slug}}/{{$row->id}}">{{$row->Name}}</a>
                                    <h5>{{number_format($row->Price),' '}}vnđ</h5><br>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <div class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            @if (Session('customer_id'))
                                                <li>
                                                    <a >
                                                        <button type="button" class=" add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i></button>
                                                    </a>
                                                </li>
                                            @else
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    {!!$products->links();!!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection