@extends('admin.index')

@section('title')
<title>Quản trị - Loại sản phẩm</title>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm loại sản phẩm</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="img" class="form-control-file" required></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            <br>
                            <input class="btn btn-success float-right" type="submit" value="Thêm">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
@endsection

