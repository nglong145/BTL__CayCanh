<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="header__logo">
          <a href="{{route('home')}}" style="width:119px;height:55px"><img src="https://caycanhonline.vn/wp-content/uploads/2019/05/LOGO-Web.png " alt="" /></a>
        </div>
      </div>
      <div class="col-lg-6">
        <nav class="header__menu">
          <ul>
            <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
            <li><a href="{{route('shop')}}">Cửa hàng</a></li>
            <li>
              <a href="#">Sản phẩm</a>
            </li>
            <li><a href="{{route('blog')}}">Bài Viết</a></li>

          </ul>
        </nav>
      </div>
      <div class="col-lg-3 p-0">
        <div class="header__cart">
          <ul class="header_cart-ul m-0">
            @if(session()->has('id'))

            <li class="navbar navbar-expand-lg navbar-light bg-light mr-1 p-0 ">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-0">
                  <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="{{asset('assets/uploads/profile/'.$user->avatar)}}" alt="Avatar" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
                      {{$user->fullname}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('profile')}}">Thay đổi thông tin</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            @else
            <li><a href="{{route('login')}}"><i class="fa fa-user"></i>Tài khoản</a></li>
            @endif

            @php
            $total = 0;
            $quantity=0;
            @endphp
            @foreach($tCart as $tc)

            @php
            $quantity+=1;
            $total += ($tc->Price *$tc->CartQuantity)
            @endphp
            @endforeach

            <li>
              <a href="{{URL::to('/cart')}}"><i class="fa fa-shopping-bag"></i><span>{{$quantity}}</span></a>

            </li>

            <li class="header__cart__price"><span>${{number_format($total)}}</span></li>

          </ul>

        </div>
      </div>
    </div>
    <div class="humberger__open">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</header>