@extends('admin.index')

@section('title')
<title>Quản trị - Loại sản phẩm</title>

@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        {{-- <div class="container-fluid">
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
        </div> --}}
      </section>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4><strong>Cập nhật loại sản phẩm</strong> </h4>
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
                                            @if($menus->id == $categories->id_menu)
                                                <option value="{{$menus->id}}" selected>{{$menus->name}}</option>
                                            @else
                                            <option value="{{$menus->id}}">{{$menus->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên loại sản phẩm</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$categories->Name}}" name="name" placeholder="Nhập tên sản phẩm" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Ảnh đại diện</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" value="{{$categories->img}}" name="img" class="form-control-file" required><img src="{{asset('category/images')}}/{{$categories->img}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="content" class=" form-control-label">Mô tả</label></div>
                                    <div class="col-12 col-md-9">
                                    <textarea name="note" class="ckeditor" cols="30" rows="10">{!!$categories->Note!!}</textarea>
                                    </div>
                                </div>
                            <br>
                            <!-- <button  name="add-categories">Thêm sản phẩm mới</button> -->
                            <input class="btn btn-success float-right" type="submit" value="Cập nhật">
                            </form>      
                        </div>          
                    </div><!-- .content -->
                </div><!-- .content -->
            </div><!-- .content -->
        </div><!-- .content -->
    </div><!-- .content -->
</div><!-- .content -->
@endsection

