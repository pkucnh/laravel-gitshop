@php
    use App\Models\Product;
   $product_like = Product::orderbyDesc('like')->paginate(3);   
@endphp
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Dannh mục</h2>
        @php
            $menu = App\Models\Menu::all();
        @endphp
        @foreach($menu as $menu)
        <h2 style="margin-top: -20px">
          <a class="btn btn-primary" style="width: 100%" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{$menu->name}}</a>
        </h2>
        <div class="row" style="margin-bottom: 10px; margin-top: -20px">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body" style="margin-left: 20px">
                  @php
                      $category = App\Models\Category::where('id_menu',$menu->id)->get();
                  @endphp
                    @foreach($category  as $cate )
                      <a class="text-center" style="color: rgb(57, 57, 57); font-size: 16px;" href="{{url('bycategory')}}/{{$cate->Slug}}/{{$cate->id}}">{{$cate->Name}}</a><br>
                  @endforeach
              </div>
            </div>
          </div>
          
        </div>
        @endforeach

        {{-- <div class="brands_products">
            <h2>Thương hiệu</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>
        </div> --}}
        
        {{-- <div class="price-range">
            <h2>Lọc theo giá</h2>
            <div class="well text-center">
                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div>
        
        <div class="shipping text-center">
            <img src="{{asset('shop/images/banner/banner1.jpg')}}" alt="" />
        </div> --}}
<br>
        <div class="brands_products"><!--brands_products-->
            <h2>Sản phẩm nổi bật</h2>
            <div class="brands-name ">
                @foreach($product_like as $like)
                <div id="row_wishlist" class="row">    
                    <div class="row" style="margin:10px 0">
                        <div class="col-md-4">
                            <img width="100%" src="{{asset('product/images')}}/{{$like->img}}">
                        </div>
                        <div class="col-md-8 info_wishlist"><a href="{{url('detail-product')}}/{{$like->Slug}}/{{$like->id}}" style="font-weight: 500;color:rgb(29, 29, 29);">{{$like->Name}}</a>
                            <p style="color:#8b8b8b">{{number_format($like->Price),' '}}vnđ</p>
                            {{-- <a href="'+url+'">Đặt hàng</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>