<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{ asset('common/font-awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/scss/master.css') }}">
    <script src="{{ asset('common/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('common/js/axios.min.js') }}"></script>
    @stack('css')
    @stack('js')
</head>
<body>

    <header class="header">
        <div class="header_top"> 
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('frontend/image/logo.png') }}" alt="">
            </a>
            <div class="search"> <!--active search_sm-->
                <input type="search" placeholder="Search" class="search_input">
                <button class="search_submit">
                    <i class="fas fa-search"></i>
                </button>
                <div class="search_reault">
                    {{-- <div class="search_header">
                        <button class="nl">Search</button>
                    </div> --}}
                    <div class="result_body" id="search_result">
                        {{-- <a href="#" class="result_item">
                            <div class="image">
                                <img src="{{ asset('frontend/image/product.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <span class="name">Cisco UCS-C220-M5SX 1RU rack server (6 Core)</span>
                                <strong class="price">$150</strong>
                            </div>
                        </a> --}}
                    </div>
                    <div class="search_over"></div>
                </div>
            </div>
            <button class="search_show_sm">
                <i class="fas fa-search"></i>
            </button>
            
            <div class="header_right">
                <div class="sp_wrap account">
                    @if (!Auth::check())
                    <a href="{{ route('login') }}" class="sp_btn">
                        <i class="icn far fa-user-circle"></i>
                        <div class="sp_right">
                            <span class="had">Account</span>
                        </div>
                    </a>
                    @else
                    <form action="{{ route('logout') }}" method="post" id="user_logout" style="displey:none;">@csrf</form>
                    <button class="sp_btn">
                        <i class="icn far fa-user-circle"></i>
                        <div class="sp_right">
                            <span class="had">{{ Auth::user()->name }}</span>
                            <span class="sub">{{ Auth::user()->email }}</span>
                        </div>
                    </button>
                    <ul class="drop_out">
                        <li><a href="#">Deshboard</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="{{ route('cart') }}">Cart</a></li>
                        <li><a href="{{ route('order') }}">Order</a></li>
                        <li><a href="javascript:void(0)" onclick="document.getElementById('user_logout').submit()">Logout</a></li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>

    </header>


<script>
$('.sp_btn').click(function() {
    $('.drop_out').toggleClass('active');
});

let search_input = document.querySelector('.search_input');
let search       = document.querySelector('.search');
let search_reault = document.querySelector('.search_reault');
let search_show_sm = document.querySelector('.search_show_sm');
search_show_sm.addEventListener('click', function() {
    search.classList.toggle('search_sm');
});
let asset = '{{ asset("") }}';
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
let interval;
search_input.addEventListener('input', function() {
    let val = this.value;
    clearTimeout(interval);
    if (val) {
        search.classList.add('active');
        if (window.innerWidth <= 768) {
            search.classList.add('search_sm');
        }
        interval = setTimeout(() => {
            axios.get('{{ route("product.search") }}', {
                params: {
                    search: val,
                }
            })
            .then(response => {
                let data = response.data;
                if (data.length > 0) {
                    let htm = '';
                    data.forEach((item) => {
                        htm += `
                            <a href="${asset}product/details/${item.id}/${item.name.replaceAll(' ', '_')}" class="result_item">
                                <div class="image"> 
                                    <img src="${asset}frontend/products/${item.image}" alt="${item.name}">
                                </div>
                                <div class="info">
                                    <span class="name">${highlight(item.name, val)}</span>
                                    <strong class="price">${item.regular_price}TK</strong>
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
        }, 100);
        
    } else {
        search.classList.remove('active');
    }
});
$('.search_over').click(function() {
    search.classList.remove('active');
});
// window.addEventListener('click', function(e) {
//     let parent_match = e.target.offsetParent.parentElement.classList.contains('search');
//     let target_is_input = e.target.classList.contains('search_input');
//     if (parent_match || target_is_input) {
//         let val = search_input.value;
//         if (val) {
//             search.classList.add('active');
//             if (window.innerWidth <= 768) {
//                 search.classList.add('search_sm');
//             }
//         }
//     } else {
//         search.classList.remove('active');
//         if (window.innerWidth <= 768) {
//             search.classList.add('search_sm');
//         }
//     }
// });
</script>
<style>
    .search_over {
        position: fixed;
        z-index: -1;
        background: #00000069;
        width: 100vw;
        height: 100vh;
        left: 0;
        top: 68px;
    }
    .header .search .search_reault {
        z-index: unset;
    }
    .highlight {
        background-color: yellow;
    }
    .sp_wrap {
        position: relative
    }
    .drop_out {
        display: block;
        position: absolute;
        background: #fff;
        top: 100%;
        width: 200px;
        margin: 0;
        box-shadow: 0 5px 10px 0 rgba(0,0,0,0.1);
        transition: all 0.3s cubic-bezier(0.34, 1.61, 0.7, 1);
        transform: scale(0);
        transform-origin: top;
    }
    .drop_out.active {
        transform: scale(1);
    }
    .drop_out li a {
        display: block;
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        transition: all 0.2s ease-in-out;
    }
    .drop_out li a:hover {
        padding-left: 15px;
    }
</style>

    @yield('content')


    <footer class="footer">
        <div class="container">
            <div class="footer_grid">
                <div class="part">
                    <h4 class="footer_title">
                        SUPPORT
                    </h4>
                    <a href="tel:01700000000" class="support_item">
                        <div class="support_left">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="support_right">
                            <div>
                                <span class="small_tit">9AM-8PM</span>
                                <span class="had">01700000000</span>
                            </div>
                        </div>
                    </a>
                    <a href="mailto:test-email@gmail.com" class="support_item">
                        <div class="support_left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="support_right">
                            <div>
                                <span class="small_tit">Email</span>
                                <span class="had">test-email@gmail.com</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="part">
                    <h4 class="footer_title">
                        Important links
                    </h4>
                    <ul class="imp_links">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                        <li><a href="#">Link 5</a></li>
                    </ul>
                </div>
                <div class="part">
                    <h4 class="footer_title">
                        Important links
                    </h4>
                    <ul class="imp_links">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                        <li><a href="#">Link 5</a></li>
                    </ul>
                </div>
                <div class="part">
                    <h4 class="footer_title">STAY CONNECTED</h4>
                    <p class="footer_strong">Shop name</p>
                    <p class="footer_light">Shop address</p>
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
                    popup('#popup1');
                }
                if (response.data == 'removed') {
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
  @stack('footer_js')
</body>
</html>