<div class="col-sm-12" style="margin-bottom: 40px">
  <div id="slider-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#slider-carousel" data-slide-to="1"></li>
      <li data-target="#slider-carousel" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
      <div class="item active">
        {{-- <div class="col-sm-6">
          <h1><span>E</span>-SHOPPER</h1>
          <h2>Free E-Commerce Template</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          <button type="button" class="btn btn-default get">Get it now</button>
        </div> --}}
          <img src="{{asset('shop/images/banner/banner5.jpg')}}" class="girl img-responsive" style="height: 450px; width: 100%" alt="" />
          {{-- <img src="images/home/pricing.png"  class="pricing" alt="" />     --}}
      </div>
      <div class="item">
          {{-- <img src="{{asset('shop/images/banner/banner2.jpg')}}" class="girl img-responsive" alt="" /> --}}
          <img src="{{asset('shop/images/banner/banner6.jpg')}}" class="girl img-responsive" style="height: 450px; width: 100%"  alt="" />
      </div>
      
      <div class="item">
          <img src="{{asset('shop/images/banner/banner7.jpg')}}" class="girl img-responsive" style="height: 450px; width: 100%"  alt="" />
          {{-- <img src="images/home/pricing.png" class="pricing" alt="" /> --}}
      </div>
      
    </div>
    
    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" style="margin-left: 30px">
      <i class="fa fa-angle-left"></i>
    </a>
    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" style="margin-right: 30px">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
  
</div>