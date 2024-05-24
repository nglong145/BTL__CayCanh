@extends('layouts.userpage')
@section('content')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="hero__categories">
          <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>Danh mục</span>
          </div>
          <ul>
            @foreach($categories as $dm)
            <li><a href="{{route('shop-cate',['id'=>$dm->CategoryID])}}">{{$dm->CategoryName}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="hero__search">
          <div class="hero__search__form">
            <form action="{{route('search')}}" method="get">

              <input type="text" name='keyword' placeholder="Bạn muốn tìm kiếm gì?" />
              <button type="submit" class="site-btn">
                Tìm kiếm
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/banner-2.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>Chi tiết sản phẩm</h2>
          <div class="breadcrumb__option">
            <a href="{{route('home')}}">Trang chủ</a>
            <a href="{{route('shop')}}">Cửa Hàng</a>
            <span>Chi tiết sản phẩm</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->


<!-- Product Details Section Begin -->
<section class="product-details spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="product__details__pic">
          <div class="product__details__pic__item">
            <img class="product__details__pic__item--large" src="{{asset('assets/uploads/products/'.$product[0]->ImgMain)}}" alt="" />
          </div>

        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="product__details__text">
          <h3>{{$product[0]->ProductName}}</h3>
          <div class="product__details__rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <div class="product__details__price">${{number_format($product[0]->Price).' ₫'}}</div>
          <p>
            {{$product[0]->Description}}
          </p>

          <form method="POST" action="{{route('cart.add')}}">
            @csrf
            <!-- kiểm tra số lượng sản phẩm
            nếu hết sản phẩm thì thông báo hết hàng -->
            @if($product[0]->Quantity ==0)
            <div class="product__details__quantity">
              <div class="quantity">
                <input type="text" class="form-control" name="Quantity" value="Het hang" style="padding:10px;font-size:20px; text-align:center" readonly>
              </div>
            </div>
            @else
            <div class="product__details__quantity">
              <div class="quantity">
                <input type="number" class="form-control" name="Quantity" min="1" max="{{$product[0]->Quantity}}" value="1" style="padding:10px;font-size:20px">
              </div>
            </div>
            @endif
            <input type="hidden" name="ProductID" value="{{$product[0]->ProductID}}">
            <button style="border:none" type="submit" name="addToCart" class="primary-btn"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
          </form>


        </div>
      </div>
      <div class="col-lg-12">
        <div class="product__details__tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Thông tin sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Mô tả sản phẩm</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="product__details__tab__desc">
                <h6>Thông tin sản phẩm</h6>
                <p>
                  {{$product[0]->info}}
                </p>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="product__details__tab__desc">
                <h6>Mô tả sản phẩm</h6>
                <p>
                  {{$product[0]->descSub1}}
                </p>
                <p>
                  {{$product[0]->descSub2}}
                </p>
              </div>
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
              <div class="product__details__tab__desc">
                <h6>Products Infomation</h6>
                <p>
                  Vestibulum ac diam sit amet quam vehicula elementum sed sit
                  amet dui. Pellentesque in ipsum id orci porta dapibus. Proin
                  eget tortor risus. Vivamus suscipit tortor eget felis
                  porttitor volutpat. Vestibulum ac diam sit amet quam vehicula
                  elementum sed sit amet dui. Donec rutrum congue leo eget
                  malesuada. Vivamus suscipit tortor eget felis porttitor
                  volutpat. Curabitur arcu erat, accumsan id imperdiet et,
                  porttitor at sem. Praesent sapien massa, convallis a
                  pellentesque nec, egestas non nisi. Vestibulum ac diam sit
                  amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                  ipsum primis in faucibus orci luctus et ultrices posuere
                  cubilia Curae; Donec velit neque, auctor sit amet aliquam vel,
                  ullamcorper sit amet ligula. Proin eget tortor risus.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title related__product__title">
          <h2>SẢN PHẨM TƯƠNG TỰ</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($simlarproducts as $sptt)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="{{asset('assets/uploads/products/'.$sptt->ImgMain)}}">

            <ul class="product__item__pic__hover">
              <form method="POST" action="{{route('cart.add')}}">
                @csrf

                <input type="hidden" name="ProductID" value="{{$sptt->ProductID}}">
                <input type="hidden" name="Quantity" value="1">

                <li>
                  <button style=" border:none" type="submit" name="addToCart" class="primary-btn"><i class="fa fa-shopping-cart"></i></button>

                </li>
              </form>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="{{route('product-detail',['id'=>$sptt->ProductID])}}">{{$sptt->ProductName}}</a></h6>
            <h5>{{number_format($sptt->Price).'₫'}}</h5>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Related Product Section End -->

@endsection