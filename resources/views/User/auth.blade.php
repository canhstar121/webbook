@extends('LayoutUser')
@section('content')
    @include('User.inc.area', ['active' => $action == 'signIn' ? 'Đăng nhập' : 'Đăng ký'])
    <!-- user-login-area-start -->
    <div class="user-login-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>{{ $action == 'signIn' ? 'Đăng nhập' : 'Đăng ký' }}</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12">
                    <form action="{{ route('auth.store') }}" method="POST">
                        @csrf
                        @if ($action == 'signIn')
                            <input type="hidden" name="action" value="login">
                            <input type="hidden" name="level" value="user">
                            <div class="login-form">
                                <div class="single-login">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" required />
                                </div>
                                <div class="single-login" style="position: sticky;">
                                    <label>Mật khẩu <span>*</span></label>
                                    <input type="password" name="password" required />
                                    <a style="position: absolute; top: 53%; right: 2%; color: #3b5998;" href="#">Quên
                                        mật khẩu?</a>
                                </div>
                                <div class="single-login single-login-2">
                                    <button style=" width: 100%; margin-top: 2%; " type="submit">Đăng nhập</button>
                                </div>
                                <p>Chưa có tài khoản? <a href="{{ route('authuser.create') }}">ĐĂNG KÝ</a> ngay!</p>
                            </div>
                        @else
                            <input type="hidden" name="action" value="register">
                            <div class="login-form">
                                <div class="single-login">
                                    <label>Tài khoản<span>*</span></label>
                                    <input type="text" name="name" required />
                                </div>
                                <div class="single-login">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" required />
                                </div>
                                <div class="single-login">
                                    <label>Số điện thoại</label>
                                    <input type="tel" name="phone" />
                                </div>
                                <div class="single-login" style="position: sticky;">
                                    <label>Mật khẩu <span>*</span></label>
                                    <input type="password" name="password" required />
                                </div>
                                <div class="single-login single-login-2">
                                    <button style=" width: 100%; margin-top: 2%; " type="submit">Đăng Ký</button>
                                </div>
                                <p>Dã có tài khoản? <a href="{{ route('authuser.index') }}">ĐĂNG NHẬP</a> ngay!</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- user-login-area-end -->
@endsection
