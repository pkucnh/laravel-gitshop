@extends('admin.index')

@section('title')
<title>Quản trị | Đơn hàng</title>

@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card mt-2">
                <div class="card-header bg-dark">
                  <h3 style="text-align: center">KIỂM DUYỆT ĐƠN HÀNG</h3>
                </div>
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Mã đơn hàng</th>
                      <th>Ngày đặt hàng</th>
                      <th>Tình trạng đơn hàng</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->order_code}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>
                              @if($row->status == 0)
                              <b class="text-primary">Đang chờ kiểm duyệt</b>
                              @endif
                              @if($row->status == 1)
                              <b class="text-warning">Đã duyệt đơn hàng</b>
                              @endif
                              @if($row->status == 2)
                              <b class="text-secondary">Đang đóng gói</b>
                              @endif
                              @if($row->status == 3)
                              <b class="text-info">Đang vận chuyển</b>
                              @endif
                              @if($row->status == 4)
                              <b class="text-success">Đã nhận</b>
                              @endif
                              @if($row->status == 5)
                              <b class="text-danger">Hủy đơn hàng</b>
                              @endif
                            </td>
                            <td><button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal{{$row->id}}">
                              Xem
                          </button></td>
                            <td><a href="{{url('/order/update')}}/{{$row->id}}" class="btn btn-info">Duyệt</a></td>
                            <td><a href="{{url('/order/delete')}}/{{$row->id}}"  class="btn btn-danger">Hủy đơn</a></td>
                          </tr>
                          <div class="modal fade" id="largeModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel">Chi tiết đơn hàng</h5>
                                        @php
                                          // use App\Models\Order_detail;
                                          $order_details = App\Models\Order_detail::where('order_code',$row->order_code)->join('products', 'products.id', '=', 'order_detail.product_id')->select('order_detail.*','products.img')->get();   
                                        @endphp
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <div class="card">                                               
                                            <div class="card-body">
                                              @php
                                                $i = 0;
                                                $total = 0;    
                                              @endphp
                                                @foreach ($order_details as $item)
                                                    <h3 class="card-title mb-3" style="font-weight: bold;"></h3>
                                                    <div class="col-sm-12 mb-2 float-left">
                                                      <div class="col-sm-6 float-left">
                                                        <img class="card-img-top" onerror="this.src='{{asset('shop/images/home/defauld.jpg')}}'" src="{{asset('product/images')}}/{{$item->img}}" style="height: 250px; display:block;">                                                  
                                                      </div>
                                                      <div class="col-sm-6 float-left">
                                                        <ul class="list">
                                                          <li><h5 style="font-weight: bold;"><span>Mã sản phẩm</span>: <b class="text-danger">{{ $item->product_id}}</b></h5></li>
                                                          <li><h5 style="font-weight: bold;"><span>Tên sản phẩm</span>: <b class="text-danger">{{ $item->name}}</b></h5></li>
                                                          <li><h5 style="font-weight: bold;"><span>Giá</span>: <b class="text-danger">{{number_format($item->price),''}}đ</b></h5></li>   
                                                          <li><h5 style="font-weight: bold;"><span>Số lương</span>: <b class="text-danger">{{$item->sales_quanlity}}</b></h5></li>  
                                                          <li><h5 style="font-weight: bold;"><span>Ngày mua</span>: <b class="text-danger">{{ $item->created_at}}</b></h5></li>          
                                                          {{-- <li><h5 style="font-weight: bold;"><span>Ngày cập nhật</span>: <b class="text-danger"></b>.{{ $item->updated_at}}</h5></li>    --}}
                                                        </ul>
                                                        {{-- <input type="hidden" value=" "> --}}
                                                        @php 
                                                          $i++;
                                                          $subtotal = $item->price*$item->sales_quanlity;
                                                          $total+=$subtotal;
                                                        @endphp                
                                                        @php
                                                          $coupon = App\Models\Voucher::where('code',$item->coupon)->first();
                                                          if($coupon){
                                                            $coupon_condition = $coupon->conditions;
                                                            $coupon_number = $coupon->number;
                                                          }else{
                                                            $coupon_condition = 2;
                                                            $coupon_number = 0;
                                                          }
                                                        @endphp
                                                 
                                                    </div>
                                                   
                                                  </div>                                                             
                                                  @endforeach
                                                  <div class="card-footer">  
                                                    @php 
                                                    $total_coupon = 0;
                                                    @endphp
                                              
                                                    @if($coupon_condition==1)
                                                    @php
                                                    $total_after_coupon = ($total*$coupon_number)/100;
                                                    echo '<strong>Mã giảm giá: Giảm %'.$coupon_number.'/ Tổng đơn hàng</strong></br>';
                                                    echo '<strong>Tổng giảm :'.number_format($total_after_coupon,0,',','.').'đ<strong></br>';
                                                    $total_coupon = $total + $item->fee - $total_after_coupon ;
                                                    @endphp
                                                    @else 
                                                    @php
                                                    echo '<strong>Mã giảm giá : Giảm '.number_format($coupon_number,0,',','.').'đ'.'<strong></br>';
                                                    $total_coupon = $total + $item->fee - $coupon_number ;
                                      
                                                    @endphp
                                                    @endif
                                                    {{-- <b class="text-danger"></b> --}}
                                                    Phí ship : <strong>{{number_format($item->fee,0,',','.')}}đ<strong> <br>
                                                    Thanh toán: <strong> <b class="text-danger">{{number_format($total_coupon,0,',','.')}}đ </b><strong>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
             
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content-wrapper -->
  </div>
  <script type="text/javascript">
    function deleteuser(id){
      let link = "{{url('/user/delete')}}";
      if(confirm('Are you sure you want to delete?')){
        $.ajax({
          url: link,
          data: {
            'id':id,
            '_token': '{{csrf_token()}}',
          },
          type: "post",
          error: function(xhr, status, errorThrow){
            alert( errorThrow);
          },
          success: function(data){
            alert(data);
            location.reload();
          }
        });
      }
    }
  </script>
@endsection