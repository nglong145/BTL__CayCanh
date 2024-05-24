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

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/banner-2.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bài Viết</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Trang Chủ</a>
                        <span>Bài Viết</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('assets/uploads/blogs/'.$blog->BlogImage)}}" width="300" height="300" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{date_format(date_create($blog->created_at),'d-m-Y')}}</li>
                                </ul>
                                <h5><a href="{{route('blog-detail',['id'=>$blog->BlogID])}}">{{$blog->BlogTitle}}</a></h5>
                                <p>{{$blog->Description}} </p>
                                <a href="{{route('blog-detail',['id'=>$blog->BlogID])}}" class="blog__btn">ĐỌC THÊM <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    <div class="col-lg-12">
                        {{$blogs->links('pagination::bootstrap-5')}}

                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Blog Section End -->
@endsection