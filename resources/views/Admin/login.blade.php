<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('Admin') }}/css/admin.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>Admin</title>
</head>

<body>

    <div class="sign section--bg" data-bg="{{ asset('Admin') }}/img/section/section.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">
                        <!-- authorization form -->
                        <form action="{{ route('auth.store') }}" method="POST" class="sign__form">
                            @csrf
                            <input type="hidden" name="action" value="login">
                            <a href="#" class="sign__logo" style="font-size: 38px;">
                                <span style="color: white;">ADM</span><span class="text-gradient">IN</span>
                            </a>

                            <div class="sign__group">
                                <input type="text" class="sign__input" name="email" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" name="password" placeholder="Password">
                            </div>

                            <div class="sign__group sign__group--checkbox">
                                <input id="remember" name="remember" type="checkbox" checked="checked">
                                <label for="remember">Remember Me</label>
                            </div>

                            <button type="submit" class="sign__btn" type="button">Sign in</button>

                            <span class="sign__text">Dont have an account? <a href="signup.html">Sign up!</a></span>

                            <span class="sign__text"><a href="forgot.html">Forgot password?</a></span>
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('Admin') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('Admin') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Admin') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('Admin') }}/js/jquery.mousewheel.min.js"></script>
    <script src="{{ asset('Admin') }}/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="{{ asset('Admin') }}/js/select2.min.js"></script>
    <script src="{{ asset('Admin') }}/js/admin.js"></script>
</body>

</html>
