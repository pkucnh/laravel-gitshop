@extends('admin.index')

@section('title')
<title>Quản trị - Mã giảm giá</title>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm mã giảm giá</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form  action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="pages" class=" form-control-label">Mã giảm giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="code" placeholder="$" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="number" min="0" id="text-input" name="amount" placeholder="........." class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Ngày bắt đầu</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_start" placeholder="Nhập giá khuyến mãi" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Ngày kết thúc</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date_end" placeholder="Nhập giá khuyến mãi" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Hình thức giảm</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="condition" id="select" class="form-control">
                                                <option value="1">Giảm theo %</option>
                                                <option value="2">Giảm theo giá tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Số giảm</label></div>
                                    <div class="col-12 col-md-9"><input type="number" min="0" id="text-input" name="number" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Tình trạng</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="1">Đã kích hoạt</option>
                                            <option value="0">Chưa kích hoạt</option>
                                    </select>
                                    </div>
                                </div>
                            <br>
                            <!-- <button  name="add-product">Thêm sản phẩm mới</button> -->
                            <input class="btn btn-success float-right" name="add_coupon" type="submit" value="Thêm">
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

