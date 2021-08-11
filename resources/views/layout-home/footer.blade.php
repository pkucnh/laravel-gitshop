<section class="features-area section_gap black">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{asset('shop/images/blog/f-icon1.png')}}" alt="">
                    </div>
                    <h6 style="color:black;">Miễn phí giao hàng</h6>
                    <p style="color:black;">Miễn phí với giao hàng tiết kiệm</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{asset('shop/images/blog/f-icon2.png')}}" alt="">
                    </div>
                    <h6 style="color:black;">Chính sách hoàn trả</h6>
                    <p style="color:black;">Miễn phí khi gửi đơn hoàn trả</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{asset('shop/images/blog/f-icon3.png')}}" alt="">
                    </div>
                    <h6 style="color:black;">Hỗ trợ 24/7</h6>
                    <p style="color:black;">Tổng đài giải đáp 0902318374</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="{{asset('shop/images/blog/f-icon4.png')}}" alt="">
                    </div>
                    <h6 style="color:black;">Thanh toán an toàn</h6>
                    <p style="color:black;">Nhận hàng mới trả tiền</p>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer" style="background: #222222">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2 style="color: white">Về chúng tôi</h2>
                        <p>
                            Gitshop là một trang mạng bán đồ chơi chính hãng Bandai giá rẻ để phục vụ cho tất cả mọi người.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2 style="color: white">Liên hệ</h2>
                            <p>Địa chỉ: 68/2A Thới An 11, P.Thới An, Q.12, TP.HCM</p>
                            <p>Facebook:https://www.facebook.com/profile.php?id=100034829753466</p>
                            <p>E-mail: Phucnh2307@gmail.com</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-widget">
                        <h2 style="color: white">Về tôi</h2>
                            <p>Nguyễn Hoàng Phúc</p>
                            <p>Mssv: Ps12099</p>
                            <p>Github:https://github.com/pkucnh</p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2 style="color: white">Theo dõi tôi</h2>
							<ul class="nav navbar-nav">
								<li style="width: 50px; height: 50px" ><a href="#" ><i class="fa fa-facebook"></i></a></li>
								<li style="width: 50px; height: 50px"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li style="width: 50px; height: 50px"><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
                    </div>
                </div>
                {{-- <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                {{-- <p class="pull-left">Copyright © 2021 GIT-SHOPPER Inc. All rights reserved.</p> --}}
                <p class="text-center">FPT POLYTECHNIC -<span><a target="_blank" href="http://www.themeum.com"> PhucNH</a></span></p>
            </div>
        </div>
    </div>
    
</footer>


<script src="{{asset('shop/js/jquery.js')}}"></script>
<script src="{{asset('shop/js/bootstrap.min.js')}}"></script>
<script src="{{asset('shop/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('shop/js/price-range.js')}}"></script>
<script src="{{asset('shop/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('shop/js/main.js')}}"></script>

<script src="{{asset('slideshow/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('slideshow/js/popper.min.js')}}"></script>
<script src="{{asset('slideshow/js/bootstrap.min.js')}}"></script>
<script src="{{asset('slideshow/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('slideshow/js/main.js')}}"></script>
{{-- <script src="{{asset('sweetalert/js/sweetalert.js')}}"></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


{{-- Share Facebook --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=507829347122115&autoLogAppEvents=1" nonce="0mU0s01k"></script>
{{-- -- Comment -- --}}
<script type="text/javascript">
    $(document).ready(function(){
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
        
            $.ajax({
                url: '{{url('/load-comment')}}',
                method: 'POST',
                data:{product_id:product_id, _token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_content = $('.comment_content').val();
            var user_id = $('.user_id').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/send-comment')}}',
                method: 'POST',
                data:{product_id:product_id, comment_content:comment_content ,user_id:user_id, _token:_token},
                    success:function(data){
                        load_comment();
                        $('.comment_content').val('');
                    }
            });
        });
    });
</script>

{{-- -- Ship -- --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action=='city'){
                result = 'district';
            }else{
                result = 'village';
            }
            console.log("ma_id", ma_id);
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
</script>

{{-- Feeship --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var city_id = $('.city').val();
            var district_id = $('.district').val();
            var village_id = $('.village').val();
            var _token = $('input[name="_token"]').val();

            if(city_id == '' && district_id == '' && village_id == ''){
                alert('làm ơn chọn để tính phí ship!!')
            }else{
                $.ajax({
                url: '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{city_id:city_id, district_id:district_id, village_id:village_id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }
        })
    });
</script>

{{-- -- Cart -- --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_image = $('.cart_product_image_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            var cart_product_amount = $('.cart_product_amount_'+ id).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/add-cart')}}',
                method: 'POST',
                data:{cart_product_id :cart_product_id , cart_product_name: cart_product_name,cart_product_image :
                    cart_product_image,cart_product_price:cart_product_price,cart_product_amount:cart_product_amount,_token :_token },
                    success:function(data){
                        swal("Thêm thành công!", "Chọn OK để tiếp tục", "success")
                    }
            })
            // swal("Good job!", "You clicked the button!", "success")
        });
    });
</script>
{{-- Order  --}}
<script type="text/javascript">
     $(document).ready(function(){
        $('.send_order').click(function(){
            var total_after = $('.total_after').val();
            swal({
                title: "OK để xác nhận đặt hàng!",
                text: "Sau khi đặt hàng 24h sẽ không giải quyết đổi trả!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    var name = $('.name').val();
                    var phone = $('.phone').val();
                    var email = $('.email').val();
                    var adress = $('.adress').val();
                    var note = $('.note').val();
                    var order_feeship = $('.order_feeship').val();
                    var shipping_method = $('.payment_select').val();
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val();

                    console.log(name,phone,email ,adress ,note,order_feeship,shipping_method,order_coupon);
                    $.ajax({
                        url: '{{url('/confirm-order')}}',
                        method: 'POST',
                        data:{name:name, phone:phone, email:email,adress:adress,note:note, order_feeship:order_feeship, shipping_method:shipping_method, order_coupon:order_coupon,_token :_token },
                            success:function(){
                                swal("Đặt hàng thành công", "OK để tiếp tục", {
                                    icon: "success",
                                });
                            }
                    });
                          window.setTimeout(function(){ 
                            location.reload();
                        } ,3000);
                }else{
                    swal("Hủy thành công", {
                        icon: "error",
                    });
                }
            });
        });
    });
</script>
</body>
</html>