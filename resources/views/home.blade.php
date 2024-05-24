@extends('layouts.userpage')

@section('content')

<!-- Hero Section Begin -->
<section class="hero">
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
                <div class="hero__item set-bg" data-setbg="{{asset('assets/img/slide.jpg')}}">
                    <div class="hero__text">
                        <span>Cây cảnh online</span>
                        <h2>
                            Chuyên cung cấp <br />các loại cây xanh</h2>
                        <a href="{{route('shop')}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($categories as $dm)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('assets/uploads/categories/'.$dm->CategoryImage)}}">
                        <h5><a href="{{route('shop-cate',['id'=>$dm->CategoryID])}}">{{$dm->CategoryName}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <li data-filter=".caybancong">Cây Ban Công</li>
                        <li data-filter=".cayvanphong">Cây Văn Phòng</li>
                        <li data-filter=".caydeban">Cây Để Bàn</li>
                        <li data-filter=".senda">Sen Đá</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($products as $sp)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$sp->Slug}}">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('assets/uploads/products/'.$sp->ImgMain)}}">
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{route('product-detail',['id'=>$sp->ProductID])}}">{{$sp->ProductName}}</a></h6>
                        <h5>{{number_format($sp->Price).' ₫'}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Bài viết nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('assets/uploads/blogs/'.$blog->BlogImage)}}" alt="" />
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{date_format(date_create($blog->created_at),'d-m-Y')}}</li>
                        </ul>
                        <h5>
                            <a href="{{route('blog-detail',['id'=>$blog->BlogID])}}">{{$blog->BlogTitle}}</a>
                        </h5>
                        <p>
                            {{$blog->Description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection