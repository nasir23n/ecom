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
$cart = Session::get('cart');
$cart_item = $cart ? $cart : [];
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
                        <input class="nav_search" type="search" id="search_input" placeholder="Search">
                        <button class="nav_s_submit"><i class="fa fa-search"></i></button>
                        <div class="search_reault">
                            <div class="result_body" id="search_result">
                                <a href="#" class="result_item">
                                    <div class="image">
                                        <img src="{{ asset('frontend/image/product1.jpg') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <span class="name">Cisco UCS-C220-M5SX 1RU rack server (6 Core)</span>
                                        <strong class="price">$150</strong>
                                    </div>
                                </a>
                            </div>
                            <div class="search_over"></div>
                        </div>
                    </div>
                </div>
                
                <script>
                    function highlight(inp_text, string) {
                        let searched = string.trim();
                        let text = inp_text;
                        if (searched !== "") {
                            let re = new RegExp(searched,"gi"); // search for all instances
                            let newText = text.replace(re, `<span class="highlight">${searched}</span>`);
                            text = newText;
                        }
                        return text;
                    }
                    let interval,
                        search_input    = document.getElementById('search_input'),
                        search_result   = document.querySelector('.product_search')
                        url           = '{{ url("") }}';
                    search_input.addEventListener('input', function() {
                        let val = this.value;
                        clearTimeout(interval);
                        if (val) {
                            console.log(val);
                            search_result.classList.add('active');
                            if (window.innerWidth <= 768) {
                                search_result.classList.add('search_sm');
                            }
                            interval = setTimeout(() => {
                                axios.get('{{ route("product.search") }}', {
                                    params: {
                                        search: val,
                                    }
                                })
                                .then(response => {
                                    let data = response.data;
                                    console.log(data);
                                    if (data.length > 0) {
                                        let htm = '';
                                        data.forEach((item) => {
                                            htm += `
                                                <a href="${url}/product/${item.slug}" class="result_item">
                                                    <div class="image"> 
                                                        <img src="${url}/${item.image}" alt="${item.name}">
                                                    </div>
                                                    <div class="info">
                                                        <span class="name">${highlight(item.name, val)}</span>
                                                        <strong class="price">${item.price}TK</strong>
                                                    </div>
                                                </a>
                                            `;
                                        });
                                        $('#search_result').html(htm);
                                    } else {
                                        $('#search_result').html('<h2>No Product Found</h2>')
                                    }
                                })
                                .catch(error => console.log(error));
                            }, 200);
                            
                        } else {
                            search_result.classList.remove('active');
                        }
                    });
                    // $('.search_over').click(function() {
                    //     search.classList.remove('active');
                    // });
                </script>
                <div class="nav_icn product_search_toggle">
                    <button class="crf" id="src_fld_o_c">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="nav_icn product_card">
                    <a href="{{ route('cart') }}" class="crf">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="bdg cart">{{ count($cart_item) }}</span>
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
                                @if (!file_exists(auth()->user()->image))
                                    <i class="far fa-user-circle"></i>
                                @else
                                    <img width="50" height="50" src="{{ asset(auth()->user()->image) }}" alt="" style="border-radius: 50%;object-fit: cover;">
                                @endif
                            </button>
                            <ul class="drop_element drop_right">
                                <li>
                                    <a href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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
            <span class="bdg cart">{{ count($cart_item) }}</span>
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
                // console.log(response);
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