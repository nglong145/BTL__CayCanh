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
                    <h2>Cửa Hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <span>Cửa Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        @php
        $totalProduct=0;
        @endphp
        <div class="row">
            <!-- sidebar danh muc -->
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh Mục</h4>
                        <ul>
                            @foreach($categories as $dm)
                            <li><a href="{{route('shop-cate',['id'=>$dm->CategoryID])}}">{{$dm->CategoryName}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- san pham -->
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-7">
                            <div class="filter__sort">
                                <span>Sắp xếp</span>
                                <select>
                                    <option value="0">Mặc định</option>
                                    <option value="1">Giá tăng dần</option>
                                    <option value="2">Giá giảm dần</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-">
                            <div class="filter__found">

                                @php
                                $totalProduct=$products->total();
                                @endphp
                                <h6><span>{{$totalProduct}}</span> Sản Phẩm</h6>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    @foreach($products as $sp)

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('assets/uploads/products/'.$sp->ImgMain)}}">
                                <ul class="product__item__pic__hover">
                                    <form method="POST" action="{{route('cart.add')}}">
                                        @csrf

                                        <input type="hidden" name="ProductID" value="{{$sp->ProductID}}">
                                        <input type="hidden" name="Quantity" value="1">

                                        <li>
                                            <button style=" border:none" type="submit" name="addToCart" class="primary-btn"><i class="fa fa-shopping-cart"></i></button>

                                        </li>
                                    </form>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{route('product-detail',['id'=>$sp->ProductID])}}">{{$sp->ProductName}}</a></h6>
                                <h5>{{number_format($sp->Price).' ₫'}}</h5>
                            </div>
                        </div>
                    </div>

                    @endforeach


                </div>
                <div>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->


</script>

@endsection