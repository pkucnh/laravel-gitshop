@extends('shop.index')

@section('title')
<title>Toposa | History</title>

@endsection
@section('content')
<style>
    
.align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important
}
.d-flex {
    display: -ms-flexbox !important;
    display: flex !important
}
</style>
{{-- Banner --}}
@include('aside.slide')
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Trang chủ</a></li>
          <li class="active">Đơn hàng chi tiết</li>
        </ol>
    </div>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Xem chi tiết đơn hàng đã đặt <strong>{{$order_code}}</strong>
   </div>
   
   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
         
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Email</th> 
          {{-- <th style="width:30px;"></th> --}}
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>{{$customer->name}}</td>
          <td>{{$customer->phone}}</td>
          <td>{{$customer->email}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin vận chuyển hàng
   </div>
   
   
   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>    
          <th>Tên người nhận</th>
          <th>Địa chỉ</th>
          <th>Số điện thoại</th>
          <th>Email</th>
          <th>Ghi chú</th>
          <th>Hình thức thanh toán</th>
          {{-- <th style="width:30px;"></th> --}}
        </tr>
      </thead>
      <tbody>
        
        <tr>   
          <td>{{$shipping->name}}</td>
          <td>{{$shipping->adress}}</td>
          <td>{{$shipping->phone}}</td>
          <td>{{$shipping->email}}</td>
          <td>{{$shipping->note}}</td>
          <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
        </tr>
        <tr>
            <div class="container">
            <div class="row">
                <div class="col-12  container">
                    <h2 class="text-center text-primary">Theo dõi đơn hàng</h2>
                        @if($order_status== 0)
                            <nav class="d-flex align-items-center">
                                <h4 style="color:#seagreen;">Xác nhận!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Đóng gói!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Vận chuyển!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Nhận hàng!</h4>
                            </nav>
                            <p>Lưu ý : Đơn hàng đang chờ xác thực từ bộ phận kiểm duyệt thời gian lâu nhất khoảng 5h.</p>
                           @elseif($order_status == 1)
                            <nav class="d-flex align-items-center">
                                <h4 style="color:seagreen;">Xác nhận!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Đóng gói!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Vận chuyển!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Nhận hàng!</h4>
                            </nav>
                            <p>Lưu ý :<b>Đơn hàng đã xác nhận</b>, đang chờ vận chuyển từ bộ phận vận chuyển thời gian lâu nhất khoảng 5h.</p>
                        @elseif($order_status== 2)
                            <nav class="d-flex align-items-center">
                                <h4 style="color:seagreen;">Xác nhận!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:seagreen;"> Đóng gói!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Vận chuyển!<span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Nhận hàng!</h4>
                            </nav>
                            <p>Lưu ý : :<b>Đơn hàng đã được đóng gói</b>, dự kiến thời gian giao hàng lâu nhất khoảng 48h.</p>
                        @elseif($order_status == 3)
                            <nav class="d-flex align-items-center">
                                <h4 style="color:seagreen;">Xác nhận!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color: seagreen;"> Đóng gói!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:seagreen;"> Vận chuyển!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:#seagreen;"> Nhận hàng!</h4>
                            </nav>
                            <p>Lưu ý : :<b>Đơn hàng đã được vận chuyển</b>, dự kiến thời gian giao hàng lâu nhất khoảng 48h.</p>
                        @elseif($order_status == 4)
                            <nav class="d-flex align-items-center">
                                <h4 style="color:seagreen;">Xác nhận!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:seagreen;"> Đóng gói!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:seagreen;"> Vận chuyển!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"><span class="lnr lnr-arrow-right"></span> </h4>
                                <h4 style="color:seagreen;"> Nhận hàng!<img src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png" width="40rem" alt="Success"></h4>
                            </nav>
                            <p>Lưu ý : :<b>Đơn hàng đã giao thành công cho quý khách</b>, chúc quý khách trải nghiệm sản phẩm thư giản.</p>
                        @else
                            <h4 class="text-danger">Đơn hàng của bạn đã bị hủy<img src="{{asset('shop/images/blog/x.png')}}" width="40rem" alt="Error"></h4>
                         @endif
                    </div>
                </div>
                </div>    
        </div>
        </tr><hr>
      </tbody>
    </table>

  </div>
  
</div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Stt</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Tổng tiền</th>            
            {{-- <th style="width:30px;"></th> --}}
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          $total = 0;
          @endphp
          @foreach($order_details as $key => $details)

          @php 
          $i++;
          $subtotal = $details->price*$details->sales_quanlity;
          $total+=$subtotal;
          @endphp
          <tr class="color_qty_{{$details->product_id}}">
           
            <td><i>{{$i}}</i></td>
            <td><a href=""><img src="{{asset('product/images')}}/{{$details->img}}" style="width: 100px" alt=""></a></td>
            <td>{{$details->name}}</td>
            {{-- <td>{{$details->sales_quantity}}</td> --}}
            <td>@if($details->coupon!='no')
              {{$details->coupon}}
              @else 
              Không mã
              @endif
            </td>
            {{-- <td>{{number_format($details->fee ,0,',','.')}}đ</td> --}}
            <td>

              <input type="number" class="form-control dai" min="1" readonly {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" value="{{$details->sales_quanlity}}" name="product_sales_quantity">

              <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->sales_quanlity}}">

              <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

            

            </td>
            <td>{{number_format($details->price ,0,',','.')}}đ</td>
            {{-- <td>{{number_format($details->product->price_cost ,0,',','.')}}đ</td> --}}
            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="10">  
              @php 
              $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
              @php
              $total_after_coupon = ($total*$coupon_number)/100;
              echo 'Mã giảm : '.$coupon_number.'%/ Tổng sản phẩm</br>';
              echo 'Tổng giảm : '.number_format($total_after_coupon,0,',','.').'đ</br>';
              $total_coupon = $total + $details->fee - $total_after_coupon ;
              @endphp
              @else 
              @php
              echo 'Tổng giảm :'.number_format($coupon_number,0,',','.').'đ'.'</br>';
              $total_coupon = $total + $details->fee - $coupon_number ;

              @endphp
              @endif

              Phí vận chuyển : {{number_format($details->fee,0,',','.')}}đ <br>
              Thanh toán: {{number_format($total_coupon,0,',','.')}}đ 
          
            </td>
          </tr>
          
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
@endsection