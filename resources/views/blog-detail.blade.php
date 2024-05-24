@extends('layouts.userpage')

@section('content')
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

<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg" data-setbg="{{asset('assets/img/banner-2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{$blog->BlogTitle}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <div class="blog__details__title d-flex">
                        <img src="{{asset('assets/uploads/blogs/'.$blog->BlogImage)}}" width="800" height="500" alt="">
                        <div class="detail-text">
                            <p class="ml-2 "><strong>{{$blog->Description}}</strong></p>
                            <p class="ml-3"> {{$blog->BlogDetail}}</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>BÀI VIẾT LIÊN QUAN</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($Reblog as $rb)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('assets/uploads/blogs/'.$rb->BlogImage)}}" width="300" height="300" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{date_format(date_create($rb->created_at),'d-m-Y')}}</li>
                        </ul>
                        <h5><a href="{{route('blog-detail',['id'=>$rb->BlogID])}}">{{$blog->BlogTitle}}</a></h5>
                        <p>{{$blog->Description}} </p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- Related Blog Section End -->
@endsection