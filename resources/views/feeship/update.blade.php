@extends('admin.index')

@section('title')
<title>Quản trị - Phí vận chuyển</title>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Cập nhật phí vận chuyển</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form  action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                  <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                
                                        <option value="">-- Chọn tỉnh thành phố --</option>
                                    @foreach($city as $key => $ci)
                                        <option value="{{$ci->ID}}">{{$ci->Name}}</option>
                                    @endforeach
                                        
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                  <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                                        <option value="">-- Chọn quận huyện --</option>
                                       
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                  <select name="village" id="village" class="form-control input-sm m-bot15 village">
                                        <option value="">-- Chọn xã phường --</option>   
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Phí vận chuyển</label>
                                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                           
                            <br>
                            <!-- <button  name="add-product">Thêm sản phẩm mới</button> -->
                            {{-- <input class="btn btn-success float-right" name="add_coupon" type="submit" value="Thêm"> --}}
                            <button type="submit" name="add_delivery" class="btn btn-info add_delivery">Cập nhật</button>
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
<!-- Scripts -->
<!-- <script src="{{('https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js')}}"></script>
<script src="{{('https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js')}}"></script> -->
@endsection

