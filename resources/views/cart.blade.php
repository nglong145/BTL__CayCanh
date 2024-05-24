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
            <a href="./index.html">Trang chủ</a>
            <a href="./index.html">Cửa Hàng</a>
            <span>Shop</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->

<section class="shoping-cart spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="shoping__cart__table">
          <table>
            <thead>
              <tr>
                <th class="shoping__product">Sản Phẩm</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Số Tiền</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
              $totalCart=0;
              @endphp
              @foreach($cart as $cartItem)
              <tr>
                <td class="shoping__cart__item">
                  <img src="{{asset('assets/uploads/products/'.$cartItem->ImgMain)}}" alt="" width="100" height="100">
                  <h5>{{$cartItem->ProductName}}</h5>
                </td>
                <td class="shoping__cart__price">
                  {{number_format($cartItem->Price)}}
                </td>
                <td class="shoping__cart__quantity">
                  <div class="quantity">

                    <!-- Sử dụng data-attribute để lưu trữ cart item id -->
                    <input class="quantity_shopingCart form-control" style="width:100px;margin-left:40px" type="number" name="Quantity" min="1" max="{{$cartItem->Quantity}}" value="{{$cartItem->CartQuantity}}" data-cartitemid="{{$cartItem->CartItemID}}">

                  </div>
                </td>
                @php
                $totalItem = $cartItem->Price * $cartItem->CartQuantity;
                $totalCart += $totalItem;
                @endphp
                <td class="shoping__cart__total">
                  {{number_format($totalItem)}}
                </td>
                <td class="shoping__cart__item__close">
                  <a class="icon_close" href="{{ route('cart.delete',['id'=>$cartItem->CartItemID])}}"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="shoping__checkout">
          <h5>Tổng tiền giỏ hàng</h5>
          <ul>
            <li>Tổng tiền hàng <span>${{number_format($totalCart)}}</span></li>
            <li>Tổng thanh toán <span>${{number_format($totalCart)}}</span></li>
          </ul>
          <a href="{{route('checkout')}}" class="primary-btn">Thanh Toán</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="shoping__cart__btns">
          <a href="#" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
          <form action="{{ route('cart.update') }}" method="POST" style="position :realtive;">
            @csrf
            <!-- Sử dụng vòng lặp foreach để tạo các ô input số lượng trong form -->
            @foreach($cart as $cartItem)
            <input type="hidden" name="CartItemID[]" value="{{ $cartItem->CartItemID }}">
            <input type="hidden" name="CartID[]" value="{{ $cartItem->CartID }}">
            <input type="hidden" name="ProductID[]" value="{{ $cartItem->ProductID }}">
            <input class="quantity_form" type="hidden" name="CartQuantity[]" value="{{$cartItem->CartQuantity}}" data-cartitemid="{{$cartItem->CartItemID}}">
            @endforeach
            <button type="submit" class="primary-btn cart-btn cart-btn-right" style="position:absolute;top:-5px;right:0;border:none">Cập nhật giỏ hàng</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Shoping Cart Section End -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.quantity_shopingCart').change(function() {
    // Lấy giá trị số lượng của sản phẩm tương ứng
    var value = $(this).val();
    // Lấy giá trị cart item id từ data-attribute
    var cartItemId = $(this).data('cartitemid');
    // Tìm ô input số lượng trong form có cart item id tương ứng và gán giá trị số lượng vào đó
    $('.quantity_form[data-cartitemid="' + cartItemId + '"]').val(value);
  });
</script>

@endsection