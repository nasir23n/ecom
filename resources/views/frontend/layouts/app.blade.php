<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Best online shopping store">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{ asset('common/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/scss/master.css') }}">
    <script src="{{ asset('common/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('common/js/axios.min.js') }}"></script>
    @stack('css')
    @stack('js')
</head>
<body>
@php
if (Auth::check()) {
    $cart_item = Auth::user()->carts()->get();
}
@endphp
<form action="{{ route('logout') }}" id="logout" method="post">@csrf</form>
<header class="header">
    <div class="container">
        <nav class="nav_bar">
            <a href="{{ route('home') }}" class="nav_logo">
                <span>ECOM</span>
            </a>
            <div class="nav_con">
                <div class="product_search">
                    <div class="form">
                        <input class="nav_search" type="text" name="nav_search" placeholder="Search">
                        <button class="nav_s_submit" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="nav_icn product_search_toggle">
                    <button class="crf" id="src_fld_o_c">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="nav_icn product_card">
                    <a href="{{ route('cart') }}" class="crf">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="bdg cart">{{ (Auth::check()) ? count($cart_item) : 0 }}</span>
                    </a>
                </div>
                <div class="nav_icn product_fave">
                    <a href="#" class="crf">
                        <i class="far fa-heart"></i>
                        <span class="bdg">0</span>
                    </a>
                </div>
                <div class="nav_icn nav_user">
                    @guest
                        <a href="{{ route('login') }}" class="crf">
                            <i class="far fa-user-circle"></i>
                        </a>
                    @else
                        <div class="drop_container">
                            <button class="crf drop">
                                <i class="far fa-user-circle"></i>
                            </button>
                            <ul class="drop_element drop_right">
                                <li>
                                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-user-secret"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-shopping-basket"></i> Order</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" onclick="$('#logout').submit()">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="mobile_nav_footer">
    <div class="nav_icn product_card">
        <a href="{{ route('cart') }}" class="crf">
            <i class="fa fa-shopping-cart"></i>
            <span class="bdg cart">{{ (Auth::check()) ? count($cart_item) : 0 }}</span>
        </a>
    </div>
    <div class="nav_icn product_fave">
        <a href="#" class="crf">
            <i class="far fa-heart"></i>
            <span class="bdg">0</span>
        </a>
    </div>
    <div class="nav_icn nav_user">
        <div class="drop_container">
            <button class="crf drop">
                <i class="far fa-user-circle"></i>
            </button>
            <ul class="drop_element drop_right">
                <li>
                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-user-secret"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-shopping-basket"></i> Order</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="$('#logout').submit()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

    @yield('content')

    <footer class="footer_wrapper">
        <div class="container">
            <div class="footer">
                <div class="about">
                    <div class="logo">
                        <img src="{{ asset('frontend/image/logo.png') }}" alt="Ecom">
                    </div>
                    <div class="about">
                        <p>Ecom is a Bangladesh No.1 Online Shopping Store.</p>
                    </div>

                    <br>
                    <ul class="social_icon">
                        <li><a class="facebook" href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li><a class="twitter" aria-label="twitter" href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="linkedin" href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                        <li><a class="instagram" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="important_link">
                    <h3 class="footer_heading">Important link</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy &amp; Policy</a></li>
                    </ul>
                </div>
                <div class="our_service">
                    <h3 class="footer_heading">Our Services</h3>
                    <ul>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Architecture Design</a></li>
                    </ul>
                </div>
                <div class="get_in_touch">
                    <h3 class="footer_heading">Get in touch</h3>
                    <div class="tuch_wrap">
                        <span class="icon"><i class="fa fa-map-marker"></i></span>
                        <span class="address">
                            Mymensingh,Mymensingh,Nandail
                        </span>
                    </div>
                    <div class="tuch_wrap">
                        <span class="icon"><i class="fa fa-phone"></i></span>
                        <span>
                            <a href="tel:+8801700000000">+880 1700-000000</a>
                        </span>
                    </div>
                    <div class="tuch_wrap">
                        <span class="icon"><i class="fa fa-envelope"></i></span>
                        <span>
                            <a href="mailto:nasrullah23a@gmail.com">nasrullah23a@gmail.com</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer_2_wrapper">
        <div class="container">
            <div class="footer_2">
                <div class="copyright">Copyrights By Nasrullah(nasir) - 2021</div>
                <div class="developed_by">
                    <span>Develop By</span>
                    <a href="#">Nasrullah(nasir)</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="popup_wrap" id="popup1">
        <div class="popup_container">
            <div class="popup_header">
                <strong class="header_txt">Item added</strong>
                <button class="popup_close" close="#popup1">&#9587;</button>
            </div>
            <div class="popup_body">
                This item is added to cart.
            </div>
            <div class="popup_footer">
                <div class="flex justify_right">
                    <button class="nl popup_close">Continue shopping</button> &nbsp;&nbsp;
                    <a href="{{ route('cart') }}" class="nl primary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cartCount(is_inc=true) {
            let cart = $('.cart');
            cart.each(function() {
                let val = Number($(this).text());
                if (is_inc) {
                    $(this).html(val + 1);
                } else {
                    $(this).html(val - 1);
                }
            });
        }

        function add_cart(sel, product_id) {
            let route = '{{ route("cart.add") }}';
            if ($(sel).hasClass('active')) {
                route = '{{ route("cart.remove") }}';
            }
            axios.post(route, {
                product_id,
            })
            .then(response => {
                if (response.data == 'success') {
                    $(sel).addClass('active');
                    cartCount();
                    popup('#popup1');
                }
                if (response.data == 'removed') {
                    cartCount(false);
                    $(sel).removeClass('active');
                }
            })
            .catch(error => console.log(error));
        }

        $('[popup]').click(function() {
            let targ = $(this).attr('popup');
            $(targ).addClass('active');
        });
        $('.popup_close').click(function() {
            $('.popup_wrap').removeClass('active');
        });

        $('.popup_wrap').click(function(e) {
            if (e.target.classList.contains('popup_wrap')) {
                $('.popup_wrap').removeClass('active');
            }
        });

        function popup(target, callback=false) {
            let target_elem = $(target);
            let popup_body = target_elem.find('.popup_body');
            target_elem.addClass('active');
            if (typeof callback == 'function') {
                callback(target_elem, popup_body);
            }
        }
        // popup('#popup2', function(self, pop_body) {
            
        // });
        

    </script>
<script src="{{ asset('frontend/js/app.js') }}"></script>
  @stack('footer_js')
</body>
</html>