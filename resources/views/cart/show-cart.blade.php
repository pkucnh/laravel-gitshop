@extends('shop.index')

@section('title')
<title>Toposa | Shop</title>

@endsection
@section('content')
{{-- Banner --}}
@include('aside.slide')

  
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{url('/')}}">Trang chủ</a></li>
              <li class="active">giỏ hàng</li>
            </ol>
        </div>
        @php
            $message = Session::get('message');
             if ($message) {
                    echo '<div class="alert alert-success">'.$message.'</div>';
                    Session::put('message',null);
             }   
        @endphp
        <div>
        <div class="table-responsive cart_info">
            <form action="{{url('/update-cart')}}" method="post">
            @csrf
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng giá</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @if(Session::get('cart'))
                        @foreach(Session::get('cart') as $cart)
                            @php
                                $subtotal = $cart['product_price'] * $cart['product_amount'];
                                $total += $subtotal;
                            @endphp
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{asset('product/images')}}/{{$cart['product_image']}}" style="width: 100px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{url('detail-product')}}/{{$cart['product_id']}}">{{$cart['product_name']}}</a></h4>
                                <p>Sản phẩm ID: {{$cart['product_id']}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{number_format($cart['product_price'])}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                    <input class="form-control dai" type="number" min="1"  name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_amount']}}" autocomplete="off" size="2">
                                    {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($subtotal)}} vnđ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/delete-cart/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                            
                        </tr>
                        @endforeach           
                    @else
                    <tr>
                        <td>
                            <p><strong> Giỏ hàng trống!</strong></p>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td>
                            <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>

        <div class="col-sm-3">
            <div class="wit">
                <div class="cart_menus"><span>Tổng giỏ hàng</span> </div>
            <div class="chose_area wits">
                <div class="total_area ng">
                    <ul><li>Giá tạm thời:<span>{{number_format($total),' '}} vnđ</span></li>     
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key =>$cou)
                                    <li>
                                        @if($cou['coupon_condition']==1)
                                        <a class="cart_quantity_delete" href="{{url('/delete-coupon/')}}"><i class="fa fa-times"></i></a>
                                            Mã giảm giá:<span> {{$cou['coupon_number']}}% / Tổng đơn hàng</span>
                                            <p>
                                                @php
                                                    $total_coupon = ($total*$cou['coupon_number']/100);
                                                    echo '<p><li>Giảm:'.'<span>'.number_format($total_coupon).' vnđ</span>'.'</li></p>';
                                                @endphp
                                            </p>
                                                <li>Tổng tiền sau khi giảm
                                                    @php
                                                       $total_coupon = $total- $total_coupon;  
                                                    @endphp
                                                    <span>{{ number_format($total_coupon)}} vnđ</span>
                                                </li>
                                            </p>
                                        @elseif($cou['coupon_condition']==2)
                                        <a class="cart_quantity_delete" href="{{url('/delete-coupon/')}}"><i class="fa fa-times"></i></a>
                                        Mã giảm giá:<span> Giảm {{number_format($cou['coupon_number'])}} vnđ</span> 
                                        <p>
                                            @php
                                                $total_coupon = $total - $cou['coupon_number'] ;
                                            @endphp
                                            </li>
                                        </p>
                                        </p>
                                            <li>Tổng tiền sau khi giảm:
                                                <span>{{number_format($total_coupon)}} vnđ</span>
                                            </li>
                                        </p>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                            @if(Session::get('fee'))
                            <li> <a class="cart_quantity_delete" href="{{url('/delete-fee/')}}"><i class="fa fa-times"></i></a> Vận chuyển:
                                <span>{{number_format(Session::get('fee'))}} vnđ</span>
                                @php $total_after_fee = $total + Session::get('fee'); @endphp
                            </li>
                        @endif
                        <hr>
                        </p>
                        @if(Session('cart'))
                        <li>Tổng giỏ hàng:
                            <span>
                            @php
                                if(Session::get('fee') && !Session::get('coupon')){
                                    $total_after = $total_after_fee;
                                    echo  number_format($total_after);
                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                    $total_after =  $total_coupon;
                                    echo  number_format($total_after);
                                }elseif(Session::get('fee') && Session::get('coupon')){
                                    $total_after =  $total_coupon;
                                    $total_after =  $total_coupon + Session::get('fee');
                                    echo  number_format($total_after);
                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                    $total_after =  $total;
                                    echo  number_format($total_after);
                                }
                            @endphp
                            vnđ</span>
                        </li>
                        @endif
                    </p>
                        {{-- <li>Tiền sau khi giảm:<span>{{$total}}</span></li> --}}
                    </ul>
                        {{-- <a class="btn btn-default update" href="">Check Out</a> --}}
                        {{-- <a class="btn btn-default check_out" href="">Check Out</a> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Hoàn thành các nước đề hoàn thành đơn hàng?</h3>
            <p>Chọn xem bạn có mã giảm giá hoặc điểm thưởng muốn sử dụng hoặc muốn ước tính chi phí giao hàng của mình.</p>
        </div>
        @if(Session('cart'))
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <form>
                        @csrf
                        <ul class="user_info">
                                <li class="single_field">
                                    <label>Tỉnh/Thành phố:</label>
                                    <select class="choose city" name="city" id="city">
                                        <option value="">--Tỉnh/Thành phố--</option>
                                        @foreach($citys as $key => $city)
                                            <option value="{{$city->ID}}">{{$city->Name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </li>
                                <li class="single_field">
                                    <label>Quận/Huyện:</label>
                                    <select class="choose district" name="district" id="district">
                                        <option value="">---Quận/huyện---</option>
                                    </select>
                                </li>
                                <li class="single_field">
                                    <label>Phường/Xã</label>
                                    <select class="village" name="village" id="village">
                                        <option value="">---Phường/Xã---</option>
                                    </select>
                                </li>
                        </ul>
                        <input type="button" name="calculate_order" class="btn btn-default check_out calculate_delivery" value="Kiểm tra">
                    </form>
                </div>
                <div>
                    @php
                    $message = Session::get('cou');
                    $messages = Session::get('cous');
                     if ($message) {
                            echo '<div class="alert alert-success">'.$message.'</div>';
                            Session::put('message',null);
                     }   
                     if ($messages) {
                            echo '<div class="alert alert-danger">'.$messages.'</div>';
                            Session::put('message',null);
                     } 
                @endphp
                {{-- Coupon --}}
                    <div class="chose_area">
                        <form action="{{url('/check_coupon')}}" method="post">
                            @csrf
                            <ul class="user_info">
                                {{-- <li class="single_field"> --}}
                                    <label>Mã giảm giá:</label>
                                    <input type="text" style="height: 50px" name="coupon" class="" placeholder="Nhập mã giảm giá">
                                {{-- </li> --}}
                            </ul>
                            <input type="submit" class="btn btn-default check_out" name="check_coupon" value="Kiểm tra">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="cart_menus"><span>Chi tiết đơn hàng</span> </div>
                <div class="chose_area">
                    <form method="POST">
                        @csrf
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Họ và tên</label>
                                <input type="text" name="name" class="name">
                            </li>
                            <li class="single_field">
                                <label>Số điện thoại:</label>
                                <input type="text" name="phone" class="phone">
                            </li>
                            <li class="single_field">
                                <label>Email:</label>
                                <input type="text" name="email" class="email">
                            </li>
              
                        </ul>
                        <ul class="user_info">
                            <label>Địa chỉ:</label>
                            <input type="text" name="adress" class="adress">
                        </ul>
                        @if(Session::get('fee'))
                            <input type="hidden" class="order_feeship" name="order_feeship" value="{{Session::get('fee')}}">
                        @else
                        <input type="hidden" class="order_feeship" name="order_feeship" value="15000">
                        @endif

                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                                <input type="hidden" class="order_coupon" name="order_coupon" value="{{$cou['coupon_code']}}">
                            @endforeach
                        @else
                            <input type="hidden" class="order_coupon" name="order_coupon" value="Không có mã giảm giá">
                        @endif

                        <ul class="user_info payment_options">
                            <label>Phương thức thanh toán:</label>
                            <select name="payment_select" class="payment_select">
                                <option value="0">--- Thanh toán khi nhận hàng ---</option>
                                <option value="1">--- Chuyển khoảng ---</option>
                                <option value="2">--- Thanh toán qua ví MoMo ---</option>
                            </select>
                        </ul>
                        <ul class="user_info">
                            <label>Ghi chú:</label>
                            <textarea class="note" name="note" id="" cols="30" rows="5"></textarea>
                        </ul>
                        <input type="button" name="send_order" class="btn btn-default check_out send_order" value="Thanh toán">
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</section><!--/#do_action-->
@endsection