@extends('shop.index')

@section('title')
<title>Toposa | Lịch sử đặt hàng</title>

@endsection
@section('content')
<style>
  .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
padding: 8px;
    line-height: 50px;
    text-align: center;
    vertical-align: top;
    height: 50px;
    border-top: 1px solid #ddd;
}
</style>
{{-- Banner --}}
@include('aside.slide')
<div class="container">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="#">Trang chủ</a></li>
          <li class="active">Lịch sử đặt hàng</li>
        </ol>
    </div>
    <div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            Liệt kê tất cả đơn hàng
        </h4>
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
           
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($getorder as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            
            <td>
              @if($ord->status==0)
                    Đơn hàng mới
              @elseif($ord->status==1) 
                  Đã xác nhận đơn hàng
              @elseif($ord->status==2) 
                  Đã đóng gói - chờ vận chuyển
              @elseif($ord->status==3) 
                  Đang vận chuyển
              @elseif($ord->status==4) 
              <div class="text-success">Đã nhận hàng</div>
              @elseif($ord->status==5) 
              <div class="text-danger">Đơn hàng đã bị hủy</div>
              @endif
            </td>
                
            <td>
              <a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit btn btn-success" ui-toggle-class="">
                Xem đơn hàng</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         {{--  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> --}}
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$getorder->links()!!}
          </ul>
        </div>
      </div>
    </footer>
   
  </div>
</div>
</div>
@endsection