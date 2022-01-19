<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ url('public/backend/img/secure_login.svg') }}" type="image/x-icon">
    <title>Admin Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700" rel="stylesheet">

</head>
<body>
    <style>
        *, ::before, ::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        input:focus, button:focus {
            outline: none;
        }
        label {
            user-select: none;
        }
        body {
            /* background: rgb(244,245,247); */
            background: #f0f0f0;
        }
        .wrap {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        } 
        .frm {
            background: #ffffff;
            border: 2px solid #1b66ca;
            padding: 10px;
            border-radius: 8px;
            min-width: 350px;
            max-width: 400px;
            padding: 48px 20px 36px; 
            box-shadow: rgba(27, 102, 202, 0.2) 0px 7px 29px 0px;
            /* box-shadow: 0 0 4px 0 rgba(0,0,0,0.08), 0 2px 4px 0 rgba(0,0,0,0.12); */
            z-index: 999;
        }
        @media (max-width: 380px) {
            .frm {
                min-width: calc(100% - 30px);
            }
        }
        
        .fld {
            border-radius: 4px;
            color: #202124;
            border: 1px solid #ddd; 
            font-size: 16px;
            height: 28px;
            margin-bottom: 20px;
            padding: 20px 15px;
            z-index: 1;
            display: block;
            width: 100%;
            transition: all 0.2s ease-in-out;
        }
        .fld:focus {
            border: 1px solid #1b66ca;
            box-shadow: 0 0 0 3px rgba(27, 102, 202, 0.412);
        }

        .had {
            margin-bottom: 25px;
            display: flex;
            justify-content: center;
        }
        img {
            max-width: 90px;
            margin: 0 auto
        }
        .lgn {
            display: block;
            width: 100%;
            padding: 12px 20px;
            background: #1b66ca;
            font-size: 1rem;
            border: none;
            color: #ffffff;
            font-weight: bold;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }
        .lgn:focus {
            box-shadow: 0 0 0 3px rgba(27, 102, 202, 0.412);
        }
        .lgn:hover {
            background: #3080e9;
            cursor: pointer;
        }
        
        .primary {
            color: #084298;
            background-color: #cfe2ff;
            border-color: #b6d4fe;
        }
        .danger {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }
        .warning {
            color: #664d03;
            background-color: #fff3cd;
            border-color: #ffecb5;
        }
        .errs {
            padding: 12px 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid;
        }

        .remember_fld {
            display: flex;
            margin-bottom: 20px;
        }
        .remember_fld input {
            margin-right: 5px;
        }
 
        .forg {
            display: flex;
            margin-top: 20px;
            justify-content: space-around;
        }
        .forg a {
            color: #084298;
        } 

        .remember {
            height: 1px;
            left: -10000px;
            overflow: hidden;
            position: absolute;
            top: auto;
            width: 1px;
        }
        
        .fre {
            font-size: 14px;
            line-height: 1.43;
            min-height: 20px;
            padding-left: 24px;

            align-items: center;
            cursor: pointer;
            display: flex;
            position: relative;
        }
        .fre::before {
            height: 16px;
            top: 2px;
            width: 16px;

            background: #fff;
            border: 1.5px solid #bec0c2;
            border-radius: 0;
            content: "";
            height: 16px;
            left: 0;
            position: absolute;
            transition: background .2s ease,border-color .15s linear;
            width: 16px;
        }
        .fre::after {
            content: "";
            display: block;
            position: absolute;
            transform: rotate(
                    -45deg
                ) scale(0);
            transition: transform .2s ease-out;

            border: 2px solid #fff;
            border-right: 0;
            border-top: 0;
            height: 5px;
            left: 3px;
            top: 6px;
            width: 10px
        }
        
        .fre_check {
            height: 16px;
            top: 2px;
            width: 16px;

            animation: checkboxEffect .36s ease-in-out;
            animation-fill-mode: backwards;
            border: 1px solid #007fed;
            border-radius: 2px;
            display: none;
            left: 0;
            position: absolute;
        }
        .remember:checked+.fre::before {
            background: #007fed;
            border-color: #007fed
        }
        .remember:checked+.fre::after {
            transform: rotate(-45deg) scale(1);
        }
        .remember:checked+.fre .fre_check {
            display: block;
        }
        @keyframes checkboxEffect {
            0% {
                opacity: .5;
                transform: scale(1)
            }

            to {
                opacity: 0;
                transform: scale(1.6)
            }
        } 
    </style> 
    <div class="wrap">
        <form class="frm" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="had">
                <img src="{{ asset('backend/image/user.svg') }}" alt="user">
            </div>
            <h2 style="text-align:center;">Admin Login</h2>
            <br>
            @if (array_key_exists('block_time', $errors->messages()))
                <div class="errs danger block_time">
                    {{ $errors->messages()['email'][0] }}
                </div>
            @elseif(count($errors))
                <div class="errs danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                </div>
            @endif 
            @if (session('success'))
                <div class="errs primary">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('fail'))
                <div class="errs danger">
                    {{ session('fail') }}
                </div>
            @endif
            @if (session('status'))
                <div class="errs primary">
                    {{ session('status') }}
                </div>
            @endif 
            <input class="fld" type="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus required>
            <input style="margin-bottom:20px;" class="fld" type="password" name="password" placeholder="Password" required>
            <div style="margin-bottom: 20px;">
                <input class="remember" type="checkbox" id="remember" name="remember" checked>
                <label for="remember" class="fre">
                    <span class="fre_check"></span>
                    Accept all things
                </label>
            </div>
            @if (array_key_exists('block_time', $errors->messages()))
                <button class="lgn" timer="{{$errors->messages()['block_time'][0]}}" disabled>Try latter</button> 
            @else
                <button class="lgn" type="submit">Login</button>
            @endif 
            <div class="forg">
                <a href="#">Forgot password?</a>
            </div>
        </form>
    </div>
    @if (array_key_exists('block_time', $errors->messages()))
        <script>
            function startTimer(duration, display, block_time) {
                var timer = duration, minutes, seconds;
                var int_val = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = 'Try after '+minutes + ":" + seconds;
                    block_time.textContent = `Too many login attempts. Please try again in ${minutes + ":" + seconds} seconds.`;
                    if (--timer < 0) {
                        timer = duration;
                        clearInterval(int_val);
                        display.textContent = 'Login';
                        display.removeAttribute('disabled');
                        display.setAttribute('type', 'submit');
                    }
                }, 1000);
            }

            var btn = document.querySelector('.lgn');
            var timer = btn.getAttribute('timer');
            var block_time = document.querySelector('.block_time');

            window.onload = function () { 
                startTimer(timer, btn, block_time);
            }; 
        </script>
    @endif 

</body>
</html>