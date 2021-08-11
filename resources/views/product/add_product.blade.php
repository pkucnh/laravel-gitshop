@extends('admin.index')

@section('title')
<title>Admin - add - Product</title>

@endsection
@section('content')
<div class="content-wrapper">
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Bảng sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
                </div>
          </div>
        </div>
      </section> --}}
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm sản phẩm</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="pages" class=" form-control-label">Giá</label></div>
                                    <div class="col-12 col-md-9"><input type="number" min="0" id="text-input" name="price" placeholder="$" class="form-control"></div>
                                </div>
                                <!-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Giá KM</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="giakm" placeholder="Nhập giá khuyến mãi" class="form-control"></div>
                                </div> -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file" required></div>
                                    {{-- <div class="col-12 col-md-9"><input type="file" name="im" class="form-control-file"><small class="help-block form-text">Ảnh sẽ được giữ nguyên nếu không upload.</small></div> --}}
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image phụ</label></div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="img1" class="form-control-file">
                                        <input type="file" id="file-input" name="img2" class="form-control-file">
                                        <input type="file" id="file-input" name="img3" class="form-control-file">
                                    </div>
                                </div>
                                {{-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="date_publish" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" name="date" placeholder="Ngày nhập" class="form-control"></div>
                                </div> --}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="menu_id" id="select" class="form-control">
                                            @php
                                                  $menu = App\Models\Menu::get();
                                                 
                                            @endphp
                                            @foreach($menu as $menus)
                                                <option value="{{$menus->id}}">{{$menus->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" id="select" class="form-control">

                                            @foreach($data as $row)
                                                <option value="{{$row->id}}">{{$row->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="number" min="0" id="text-input" name="amount" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            <br>
                            <!-- <button  name="add-product">Thêm sản phẩm mới</button> -->
                            <input class="btn btn-success float-right" type="submit" value="Thêm">
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

