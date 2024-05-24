<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Cay Canh Online " />
  <meta name="keywords" content="Ogani, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Cây Cảnh Online</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

  <!-- Css Styles -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/elegant-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

<body>

  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Humberger Begin -->
  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="#"><img src="img/logo.png" alt="" /></a>
    </div>
    <div class="humberger__menu__cart">
      <ul>
        <li>
          <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
        </li>
      </ul>
      <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__language">
        <img src="img/language.png" alt="" />
        <div>English</div>
        <span class="arrow_carrot-down"></span>
        <ul>
          <li><a href="#">Spanis</a></li>
          <li><a href="#">English</a></li>
        </ul>
      </div>
      <div class="header__top__right__auth">
        <a href="#"><i class="fa fa-user"></i> Login</a>
      </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
      <ul>
        <li class="active"><a href="./index.html">Home</a></li>
        <li><a href="./shop-grid.html">Shop</a></li>
        <li>
          <a href="#">Pages</a>
          <ul class="header__menu__dropdown">
            <li><a href="./shop-details.html">Shop Details</a></li>
            <li><a href="./shoping-cart.html">Shoping Cart</a></li>
            <li><a href="./checkout.html">Check Out</a></li>
            <li><a href="./blog-details.html">Blog Details</a></li>
          </ul>
        </li>
        <li><a href="./blog.html">Blog</a></li>
        <li><a href="./contact.html">Contact</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
      <ul>
        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
        <li>Free Shipping for all Order of $99</li>
      </ul>
    </div>
  </div>
  <!-- Humberger End -->

  <!-- Header Section Begin -->
  @include('layouts.header')
  <!-- Header Section End -->

  @yield('content')

  <!-- Footer Section Begin -->
  @include('layouts.footer')
  <!-- Footer Section End -->


  <!-- Js Plugins -->
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
  <script src="{{asset('assets/js/mixitup.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>