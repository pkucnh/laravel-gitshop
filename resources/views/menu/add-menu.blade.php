@extends('admin.index')

@section('title')
<title>Quản trị - danh mục</title>

@endsection
@section('content')
<div class="content-wrapper">
    <div class="content mt-1">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><strong>Thêm danh mục</strong> </h3>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="name" class=" form-control-label">Tên danh mục</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="........" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Ẩn hiện</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="anhien" id="select" class="form-control">       
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiện</option>
                                        </select>
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

