<div class="main">
    <div class="user_container">
        <div class="user_wrap">
            <div class="aside">
                <div class="profile_wrap">
                    <div class="profile">
                        <img class="img" src="{{ asset('frontend/user/profile/user1.jpg') }}" alt="">
                    </div>
                    <h2 class="name">User One</h2>
                    <p class="email">user@gmail.com</p>
                </div>
                <ul class="user_links">
                    <li class="items"><a class="links @if((Route::currentRouteName() == 'user.dashboard')) active @endif" href="{{ route('user.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="items"><a class="links @if((Route::currentRouteName() == 'cart')) active @endif" href="{{ route('cart') }}"><i class="fa fa-shopping-basket"></i> Cart</a></li>
                    <li class="items"><a class="links" href="#"><i class="far fa-heart"></i> Fave</a></li>
                    <li class="items"><a class="links @if((Route::currentRouteName() == 'order')) active @endif" href="{{ route('order') }}"><i class="fa fa-shopping-cart"></i> Orders</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="head">
                    <button class="aside_toggle">
                        <i class="fa fa-times close"></i>
                        <i class="open fa fa-bars"></i>
                    </button>
                    <h3>
                        @isset($head)
                            {{ $head }}
                        @endisset
                    </h3>
                </div>
                <div class="content_body">