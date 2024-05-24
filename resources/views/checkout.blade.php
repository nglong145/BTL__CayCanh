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
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a href="./index.html">Cửa Hàng</a>
                        <a href="./index.html">Giỏ Hàng</a>
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">

        @php
        $totalCart=0;
        @endphp
        <div class="checkout__form">
            <h4>Thông tin hóa đơn</h4>

            <form action="{{route('checkout.add')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__input">
                            <p>Họ Tên:<span>*</span></p>
                            <input type="text" placeholder="Họ và Tên" name="fullname" class="checkout__input__add" require>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder=" Địa Chỉ" name="address" class="checkout__input__add" require>
                        </div>
                        <div class="checkout__input">
                            <p>Số Điện Thoại<span>*</span></p>
                            <input type="text" placeholder="Số điện thoại" name="phone" class="checkout__input__add" require>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Hóa đơn thanh toán</h4>


                            <div class="checkout__order__products">Sản Phẩm <span>Số Tiền</span></div>
                            <ul>
                                @foreach($checkout as $sp)
                                @php
                                $totalItem = $sp->Price * $sp->CartQuantity;
                                $totalCart += $totalItem;
                                @endphp

                                <li>{{$sp->ProductName}} <span>{{number_format($totalItem)}} vnđ</span></li>

                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Tổng tiền <span>{{number_format($totalCart)}} vnđ</span></div>
                            <div class="checkout__order__total">Tổng thanh toán <span>{{number_format($totalCart)}} vnđ</span></div>

                            <input type="hidden" name="total" value="{{$totalCart}}">

                            <p>Hình thức thanh toán</p>
                            <div class="checkout__input__checkbox">
                                <label for="online">
                                    Thanh toán trực tuyến
                                    <input type="checkbox" name="payment" id="online" value="Thanh toán trực tuyến">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="cod">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" name="payment" id="cod" value="Thanh toán khi nhận hàng">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<!-- Checkout Section End -->

<script>
    // Lấy tất cả các checkbox
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Lắng nghe sự kiện click trên mỗi checkbox
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('click', () => {
            // Nếu checkbox được chọn
            if (checkbox.checked) {
                // Lặp qua tất cả các checkbox và loại bỏ checked nếu không phải checkbox hiện tại
                checkboxes.forEach((cb) => {
                    if (cb !== checkbox) {
                        cb.checked = false;
                    }
                });
            }
        });
    });
</script>

@endsection