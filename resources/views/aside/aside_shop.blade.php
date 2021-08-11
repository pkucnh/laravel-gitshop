{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> --}}
    <div class="col-sm-3">
    <div class="left-sidebar">
            <h2>Tìm kiếm</h2>
            <div class="panel-group category-products" id="accordian">  
                <div class="panel panel-default">              
                    <div class="panel-heading">   
                        <div class="single-widget">
							<form action="{{URL::to('/tim-kiem')}}" method="POST" class="searchform">
                                {{ csrf_field() }}
								<input type="text" name="search" placeholder="Tìm kiếm" style="width: 167px" >
								<button type="submit" name="search_product" class="btn btn-default"><i class="fa fa-search"></i></button>
                                {{-- <a href="{{url('tim-kiem')}}" class="btn-default check_out buttoncart" style="margin-left: -20px"><i class="fa fa-search"></i></a> --}}
							</form>
						</div>
                    </div>
                </div>  
            </div>

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
        </div> --}}
        
        <div class="shipping text-center"><!--shipping-->
            <img src="{{asset('shop/images/banner/banner1.jpg')}}" alt="" />
        </div><!--/shipping-->
<br>
    
    </div>
</div>