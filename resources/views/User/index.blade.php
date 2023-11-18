@extends('LayoutUser')
@section('content')
    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            @foreach ($sliders as $item)
                <div class="single-slider pt-105 pb-225 bg-img"
                    style="background-image:url({{ asset('uploads/slider/' . $item->image) }});">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content-3 slider-animated-1 pl-295">
                                    <h1>{!! $item->name !!}</h1>
                                    <p class="slider-sale">
                                        {!! $item->desc !!}
                                    </p>
                                    <a href="{{ $item->link }}">Mua ngay!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- slider-area-end -->
    <!-- banner-area-4-start -->
    <div class="banner-area-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="banner-img-2 mt-30">
                        <a href="#"><img src="{{ asset('User/img/banner/14.jpg') }}" alt="banner" /></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="banner-total mt-30">
                        <div class="single-banner-7 xs-mb">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{ asset('User/img/banner/15.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                        <div class="single-banner-3 col-xs-12">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{ asset('User/img/banner/16.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="banner-total-2">
                        <div class="single-banner-4 hidden-xs">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{ asset('User/img/banner/17.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                        <div class="single-banner-5">
                            <div class="banner-img-2">
                                <a href="#"><img src="{{ asset('User/img/banner/18.jpg') }}" alt="banner" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-4-end -->
    <!-- product-area-start -->
    <div class="product-area pt-90 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30">
                        <h2>Sản phẩm hàng đầu</h2>
                        <p>Duyệt qua bộ sưu tập các sản phẩm hấp dẫn nhất và bán chạy nhất của chúng tôi.</br>
                            chắc chắn sẽ tìm thấy những gì bạn đang tìm kiếm.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- tab-menu-start -->
                    <div class="tab-menu mb-40 text-center">
                        <ul class="nav justify-content-center">
                            <li><a class="active" href="#Audiobooks" data-bs-toggle="tab">mới </a></li>
                            <li><a href="#books" data-bs-toggle="tab">giảm giá</a></li>
                            <li><a href="#bussiness" data-bs-toggle="tab">Nổi Bật </a></li>
                        </ul>
                    </div>
                    <!-- tab-menu-end -->
                </div>
            </div>
            <!-- tab-area-start -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Audiobooks">
                    @if (count($newProduct) > 0)
                        <div class="tab-active owl-carousel">
                            @foreach ($newProduct as $item)
                                <div class="tab-total">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            <a href="{{ route('home.show', $item->slug) }}">
                                                <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="book" class="primary" />
                                            </a>
                                            <div class="quick-view">
                                                <a class="action-view" onclick="doDuLieuSanPham({{ $item->id }})"
                                                    title="Xem Nhanh">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="product-flag">
                                                <ul>
                                                    @if ($item->newPro == 0)
                                                        <li><span class="sale">mới</span></li>
                                                    @endif
                                                    @if ($item->priceOld > 0)
                                                        <li>
                                                            <span
                                                                class="discount-percentage">-{{ number_format(100 - ($item->priceOld / $item->price) * 100) }}%</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="{{ route('home.show', $item->slug) }}">{{ $item->name }}</a>
                                            </h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <input type="hidden" class="hide_qty_{{ $item->id }}" value="1">
                                                <a href="#" class="addCart" data-proId="{{ $item->id }}"
                                                    title="Thêm giỏ hàng"><i class="fa fa-shopping-cart"></i>Thêm giỏ
                                                    hàng</a>
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li><a href="{{ route('home.show', $item->slug) }}"
                                                            title="Chi tiết"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="div-search col-12">
                            <div height="200" width="200" class="img-search">
                                <img src="{{ asset('User/img/no-products-found.png') }}">
                            </div>
                            <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                        </div>
                    @endif

                </div>
                <div class="tab-pane fade" id="books">
                    @if (count($saleProduct) > 0)
                        <div class="tab-active owl-carousel">
                            @foreach ($saleProduct as $key => $item)
                                <div class="tab-total">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            <a href="{{ route('home.show', $item->slug) }}">
                                                <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="book" class="primary" />
                                            </a>
                                            <div class="quick-view">
                                                <a class="action-view" onclick="doDuLieuSanPham({{ $item->id }})"
                                                    title="Xem Nhanh">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="product-flag">
                                                <ul>
                                                    @if ($item->newPro == 0)
                                                        <li><span class="sale">mới</span></li>
                                                    @endif
                                                    @if ($item->priceOld > 0)
                                                        <li>
                                                            <span
                                                                class="discount-percentage">-{{ number_format(100 - ($item->priceOld / $item->price) * 100) }}%</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="{{ route('home.show', $item->slug) }}">{{ $item->name }}</a>
                                            </h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <input type="hidden" class="hide_qty_{{ $item->id }}"
                                                    value="1">
                                                <a href="#" class="addCart" data-proId="{{ $item->id }}"
                                                    title="Thêm giỏ hàng"><i class="fa fa-shopping-cart"></i>Thêm giỏ
                                                    hàng</a>
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li><a href="{{ route('home.show', $item->slug) }}"
                                                            title="Chi tiết"><i class="fa fa-external-link"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="div-search col-12">
                            <div height="200" width="200" class="img-search">
                                <img src="{{ asset('User/img/no-products-found.png') }}">
                            </div>
                            <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="bussiness">
                    @if (count($topProduct) > 0)
                        <div class="tab-active owl-carousel">
                            @foreach ($topProduct as $item)
                                <div class="tab-total">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            <a href="{{ route('home.show', $item->slug) }}">
                                                <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="book" class="primary" />
                                            </a>
                                            <div class="quick-view">
                                                <a class="action-view" onclick="doDuLieuSanPham({{ $item->id }})"
                                                    title="Xem Nhanh">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="product-flag">
                                                <ul>
                                                    @if ($item->newPro == 0)
                                                        <li><span class="sale">mới</span></li>
                                                    @endif
                                                    @if ($item->priceOld > 0)
                                                        <li>
                                                            <span
                                                                class="discount-percentage">-{{ number_format((($item->priceOld - $item->price) / $item->price) * 100) }}%</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details text-center">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="{{ route('home.show', $item->slug) }}">{{ $item->name }}</a>
                                            </h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <input type="hidden" class="hide_qty_{{ $item->id }}"
                                                    value="1">
                                                <a href="#" class="addCart" data-proId="{{ $item->id }}"
                                                    title="Thêm giỏ hàng"><i class="fa fa-shopping-cart"></i>Thêm giỏ
                                                    hàng</a>
                                            </div>
                                            <div class="add-to-link">
                                                <ul>
                                                    <li><a href="{{ route('home.show', $item->slug) }}"
                                                            title="Chi tiết"><i class="fa fa-external-link"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="div-search col-12">
                            <div height="200" width="200" class="img-search">
                                <img src="{{ asset('User/img/no-products-found.png') }}">
                            </div>
                            <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- tab-area-end -->
        </div>
    </div>
    <!-- product-area-end -->
    <!-- banner-area-start -->
    <div class="banner-area-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img-2">
                        <a href="#"><img src="{{ asset('User/img/banner/5.jpg') }}" alt="banner" /></a>
                        <div class="banner-text">
                            <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                            <h2>Sale up to 30% off</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- most-product-area-start -->
    <div class="most-product-area pt-85 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>{{ $cateTop3[0]['name'] }}</h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @if (count($cateTop3[0]->CateToPro) > 0)
                                @foreach ($cateTop3[0]->CateToPro as $item)
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img
                                                    src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="$cateTop3[0]['name']" /></a>
                                        </div>
                                        <div class="most-product-content">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="#">{{ $item->name }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                    @if ($item->priceOld > 0)
                                                        <li class="old-price">{{ number_format($item->priceOld) }}₫</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="div-search col-4">
                                    <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>{{ $cateTop3[1]['name'] }} </h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @if (count($cateTop3[1]->CateToPro) > 0)
                                @foreach ($cateTop3[1]->CateToPro as $item)
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img
                                                    src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="$cateTop3[0]['name']" /></a>
                                        </div>
                                        <div class="most-product-content">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="#">{{ $item->name }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                    @if ($item->priceOld > 0)
                                                        <li class="old-price">{{ number_format($item->priceOld) }}₫</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="div-search col-4">
                                    <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="section-title-2 mb-30">
                        <h3>{{ $cateTop3[2]['name'] }}</h3>
                    </div>
                    <div class="product-active-2 owl-carousel">
                        <div class="product-total-2">
                            @if (count($cateTop3[2]->CateToPro) > 0)
                                @foreach ($cateTop3[2]->CateToPro as $item)
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img
                                                    src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                    alt="$cateTop3[0]['name']" /></a>
                                        </div>
                                        <div class="most-product-content">
                                            <div class="product-rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h4><a href="#">{{ $item->name }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>{{ number_format($item->price) }}₫</li>
                                                    @if ($item->priceOld > 0)
                                                        <li class="old-price">{{ number_format($item->priceOld) }}₫</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="div-search col-4">
                                    <div class="title-seach">Không tìm thấy sản phẩm nào</div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="block-newsletter">
                        <h2>ĐĂNG KÝ GỬI BẢN TIN</h2>
                        <p>Bạn luôn có thể cập nhật thông tin mới của công ty chúng tôi!</p>
                        <form action="#">
                            <input type="email" placeholder="Nhập địa chỉ email của bạn" />
                        </form>
                        <a href="#">Gửi Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- most-product-area-end -->
    <!-- recent-post-area-start -->
    <div class="recent-post-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title section-title-res pt-95 bt-3 text-center mb-30">
                        <h2>Bài viết mới nhất</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center">
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ asset('User/img/post/1.jpg') }}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">06</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">The History and the Hype</a></h3>
                                <span class="meta-author"> Demo Oreka </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be
                                    worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ asset('User/img/post/2.jpg') }}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">07</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">Answers to your Questions</a></h3>
                                <span class="meta-author"> Demo Oreka </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be
                                    worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ asset('User/img/post/3.jpg') }}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">08</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">What is Bootstrap?</a></h3>
                                <span class="meta-author"> Demo Oreka </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be
                                    worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-post">
                            <div class="post-img">
                                <a href="#"><img src="{{ asset('User/img/post/4.jpg') }}" alt="post" /></a>
                                <div class="blog-date-time">
                                    <span class="day-time">09</span>
                                    <span class="moth-time">Dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h3><a href="#">Etiam eros massa</a></h3>
                                <span class="meta-author"> Demo Oreka </span>
                                <p>Discover five of our favourite dresses from our new collection that are destined to be
                                    worn and loved immediately.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent-post-area-end -->
    <!-- banner-area-start -->
    <div class="banner-area banner-res-large pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner service-mrg-btm">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('User/img/banner/1.png') }}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Mặt hàng miễn phí vận chuyển</h4>
                            <p>Đối với tất cả các đơn hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner service-mrg-btm">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('User/img/banner/2.png') }}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Đảm bảo lại tiền</h4>
                            <p>đảm bảo hoàn lại tiền 100%</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('User/img/banner/3.png') }}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Thanh toán khi giao hàng</h4>
                            <p>Sự hài lòng của khách hàng là nhất</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-banner mrg-none-xs">
                        <div class="banner-img">
                            <a href="#"><img src="{{ asset('User/img/banner/4.png') }}" alt="banner" /></a>
                        </div>
                        <div class="banner-text">
                            <h4>Trợ giúp & Hỗ trợ</h4>
                            <p>Gọi cho chúng tôi : 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-area-end -->
    <!-- social-group-area-start -->
    <div class="social-group-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title-3">
                        <h3>TWEET MỚI NHẤT</h3>
                    </div>
                    <div class="twitter-content">
                        <div class="twitter-icon">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="twitter-text">
                            <p>
                                Sự rõ ràng cũng là một quá trình năng động tuân theo thói quen thay đổi của độc giả. Thật
                                đáng ngạc nhiên khi lưu ý làm thế nào
                            </p>
                            <a href="#">Oreka</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title-3">
                        <h3>GIỮ LIÊN LẠC</h3>
                    </div>
                    <div class="link-follow">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-group-area-end -->
@endsection
@section('js')
    <script>
        setInterval(function() {
            $('.owl-next').click();
        }, 10000);
    </script>
@stop
