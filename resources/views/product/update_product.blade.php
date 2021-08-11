@extends('admin.index')

@section('title')
<title>Quản lý - sản phẩm</title>

@endsection
@section('content')
<style></style>
<div class="content-wrapper">
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Logout</a></li>
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
                        <h4><strong>Cập nhật sản phẩm</strong> </h4>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$product->Name}}" name="name" placeholder="Nhập tên sản phẩm" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="pages" class=" form-control-label">Giá</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$product->Price}}" name="price" placeholder="Nhập giá" class="form-control"></div>
                                </div>
                                <!-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Giá KM</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="giakm" placeholder="Nhập giá khuyến mãi" class="form-control"></div>
                                </div> -->
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" value="{{$product->img}}" name="img" class="form-control-file"><img src="{{asset('product/images')}}/{{$product->img}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh phụ</label></div>
                                    <div class="col-12 col-md-9 ">
                                        <div class="float-left"> <input type="file" id="file-input" name="img1" value="{{$product->img1}}"class="form-control-file"><img src="{{asset('product/images')}}/{{$product->img1}}"></div>
                                        
                                        <div class="float-left"> <input type="file" id="file-input" name="img2" value="{{$product->img2}}" class="form-control-file"><img src="{{asset('product/images')}}/{{$product->img2}}">  </div>
                                            <div class="float-left"> <input type="file" id="file-input" name="img3" value="{{$product->img3}}" class="form-control-file"><img src="{{asset('product/images')}}/{{$product->img3}}">  </div>
                                    </div>
                                </div>
                                {{-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="date_publish" class=" form-control-label">Date</label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="text-input" value="{{$product->date}}" name="date" placeholder="Ngày nhập" class="form-control">{{$product->date}}</div>
                                </div> --}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="menu_id" id="select" class="form-control">
                                            @php
                                                  $menu = App\Models\Menu::get();
                                            @endphp
                                            @foreach($menu as $menus)
                                                @if($menus->id == $product->id_menu)
                                                    <option value="{{$menus->id}}" selected>{{$menus->name}}</option>
                                                @else
                                                <option value="{{$menus->id}}">{{$menus->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category_id" value="" id="select" class="form-control">                             
                                                {{-- <option value="{{$product->Category_id}}">{{$product->name}}</option> --}}
                                                @foreach($data as $row)
                                                @if($row->id === $product->Category_id)
                                                    <option value="{{$row->id}}" selected>{{$row->Name}}</option>
                                                @else
                                                <option value="{{$row->id}}">{{$row->Name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="publish_house" class=" form-control-label">Số lượng</label></div>
                                    <div class="col-12 col-md-9"><input type="number" min="0" id="text-input" value="{{$product->Amount}}" name="amount" placeholder="Nhập số hàng tồn kho" class="form-control"></div>
                                </div>
                                {{-- <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Note</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckupdateor" cols="30" rows="10">{{$product->Note}}</textarea>
                                    </div>
                                </div> --}}
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor"  id="info" cols="30" rows="10">{!!$product->Note!!}</textarea>
                                    </div>
                                </div>
                            <br>
                            <!-- <button  name="add-product">Thêm sản phẩm mới</button> -->
                            <input class="btn btn-success float-right" type="submit" value="Cập nhật">
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

