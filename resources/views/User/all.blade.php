@extends('LayoutUser')
@section('content')
    @include('User.inc.area', ['active' => !isset($result) ? 'Tất cả' : $result->name])
    <!-- shop-main-area-start -->
    <div class="shop-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 order-lg-1 order-2 mt-sm-50 mt-xs-40">
                    <div class="shop-left">
                        <div class="section-title-5 mb-30">
                            <h2>TÙY CHỌN MUA SẮM</h2>
                        </div>
                        <div class="left-title mb-20">
                            <h4>LOẠI</h4>
                        </div>
                        <div class="left-menu mb-30">
                            <ul>
                                @foreach ($categories as $item)
                                    <li><a
                                            href="{{ route('home.show', $item->slug) }}">{{ ucwords($item->name) }}<span>({{ $item->CateToPro->count() }})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>GIÁ</h4>
                        </div>
                        <style>
                            .left-menu ul li input {
                                display: inline-block;
                                font-size: 16px;
                                margin-right: 20px;
                            }

                            .left-menu ul li {
                                color: #333;
                                display: block;
                                font-size: 15px;
                                font-weight: 400;
                                line-height: 26px;
                                padding: 10px 0;
                                position: relative;
                                text-transform: capitalize;
                                text-decoration: none;
                                font-family: 'Rufina', serif;
                                font-weight: 400;
                            }
                        </style>
                        <div class="left-menu mb-30">
                            @php
                                $mucgia = [];
                                $gia = [];
                                if (isset(request()->mucgia)) {
                                    $gia = request()->mucgia;
                                } else {
                                    $gia = '';
                                }
                                $mucgia = explode(',', $gia);
                            @endphp
                            <ul>
                                <li>
                                    <input {{ in_array('duoi100', $mucgia) ? 'checked' : '' }} type="checkbox"
                                        data-filter='mucgia' name="mucgia" class="boloc-mucgia" value="duoi100"> Dưới
                                    100.000₫
                                </li>
                                <li>
                                    <input {{ in_array('100300', $mucgia) ? 'checked' : '' }} type="checkbox"
                                        data-filter='mucgia' name="mucgia" class="boloc-mucgia" value="100300">
                                    100.000₫-300.000₫
                                </li>
                                <li>
                                    <input {{ in_array('300500', $mucgia) ? 'checked' : '' }} type="checkbox"
                                        data-filter='mucgia' name="mucgia" class="boloc-mucgia" value="300500">
                                    300.000₫-500.000₫
                                </li>
                                <li>
                                    <input {{ in_array('tren500', $mucgia) ? 'checked' : '' }} type="checkbox"
                                        data-filter='mucgia' name="mucgia" class="boloc-mucgia" value="tren500"> Trên
                                    500.000₫
                                </li>
                            </ul>
                        </div>
                        <div class="left-title mb-20">
                            <h4>NGẪU NHIÊN</h4>
                        </div>

                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                @foreach ($random as $item)
                                    <div class="product-total-2">
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="{{ route('home.show', $item->slug) }}"><img
                                                        src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                        alt="book" /></a>
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
                                                <h4><a
                                                        href="{{ route('home.show', $item->slug) }}">{{ ucwords($item->name) }}</a>
                                                </h4>
                                                <div class="product-price">
                                                    <ul>
                                                        <li>{{ number_format($item->price) }}₫</li>
                                                        @if ($item->priceOld > 0)
                                                            <li class="old-price">{{ number_format($item->priceOld) }}₫
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($randomOther as $item2)
                                            <div class="single-most-product bd mb-18">
                                                <div class="most-product-img">
                                                    <a href="{{ route('home.show', $item2->slug) }}"><img
                                                            src="{{ asset('uploads/sanpham/' . $item2->ProToGall->imageDefault) }}"
                                                            alt="book" /></a>
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
                                                    <h4><a
                                                            href="{{ route('home.show', $item2->slug) }}">{{ ucwords($item2->name) }}</a>
                                                    </h4>
                                                    <div class="product-price">
                                                        <ul>
                                                            <li>{{ number_format($item2->price) }}₫</li>
                                                            @if ($item2->priceOld > 0)
                                                                <li class="old-price">
                                                                    {{ number_format($item2->priceOld) }}₫</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="left-title-2 mb-30">
                            <h2>SO SÁNH SẢN PHẨM</h2>
                            <p>Bạn không có gì để so sánh cả.</p>
                        </div>
                        <div class="left-title-2">
                            <h2>SẢN PHẨM YÊU THÍCH</h2>
                            <p>Bạn không có mục nào trong danh sách mong muốn của bạn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12 order-lg-2 order-1">
                    <div class="category-image mb-30">
                        <a href="#"><img src="{{ asset('User/img/banner/32.jpg') }}" alt="banner" /></a>
                    </div>
                    <div class="section-title-5 mb-30">
                        <h2>{{ isset($result) ? $result->name : 'Tất Cả' }}</h2>
                    </div>
                    <div class="toolbar mb-30">
                        <div class="shop-tab">
                            <div class="tab-3">
                                <ul class="nav">
                                    <li><a class="active" href="#th" data-bs-toggle="tab"><i
                                                class="fa fa-th-large"></i>Grid</a></li>
                                    <li><a href="#list" data-bs-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
                                </ul>
                            </div>
                            {{--  <div class="list-page">
                                <p>Items 1-9 of 11</p>
                            </div>  --}}
                        </div>
                        {{--  <div class="field-limiter">
                            <div class="control">
                                <span>Show</span>
                                <!-- chosen-start -->
                                <select data-placeholder="Default Sorting" style="width:50px;" class="chosen-select"
                                    tabindex="1">
                                    <option value="Sorting">1</option>
                                    <option value="popularity">2</option>
                                    <option value="rating">3</option>
                                    <option value="date">4</option>
                                </select>
                                <!-- chosen-end -->
                            </div>
                        </div>  --}}
                        <div class="toolbar-sorter">
                            <span>Sắp xếp</span>
                            <select id="sapxep" class="sorter-options" data-role="sorter">
                                <option value=""> Chọn </option>
                                <option {{ request()->sapxep == 'moinhat' ? 'selected' : '' }} value="moinhat"> Mới nhất
                                </option>
                                <option {{ request()->sapxep == 'banchaynhat' ? 'selected' : '' }} value="banchaynhat">
                                    Bán chạy nhất </option>
                                <option {{ request()->sapxep == 'giagiamdan' ? 'selected' : '' }} value="giagiamdan"> Giá
                                    giảm dần </option>
                                <option {{ request()->sapxep == 'giatangdan' ? 'selected' : '' }} value="giatangdan"> Giá
                                    tăng dần </option>
                            </select>
                            <a href="#"><i class="fa fa-arrow-up"></i></a>
                        </div>
                    </div>
                    <!-- tab-area-start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="th">
                            <div class="row">
                                @if ($products->count() > 0)
                                    @foreach ($products as $item)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <!-- single-product-start -->
                                            <div class="product-wrapper mb-40">
                                                <div class="product-img">
                                                    <a href="{{ route('home.show', $item->slug) }}">
                                                        <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                            alt="book" class="primary" />
                                                    </a>
                                                    <div class="quick-view">
                                                        <a class="action-view"
                                                            onclick="doDuLieuSanPham({{ $item->id }})"
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
                                                    <h4><a
                                                            href="{{ route('home.show', $item->slug) }}">{{ $item->name }}</a>
                                                    </h4>
                                                    <div class="product-price">
                                                        <ul>
                                                            <li>{{ number_format($item->price) }}₫</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-link">
                                                    <div class="product-button">
                                                        <a href="#" title="Thêm giỏ hàng"><i
                                                                class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                                    </div>
                                                    <div class="add-to-link">
                                                        <ul>
                                                            <li><a href="{{ route('home.show', $item->slug) }}"
                                                                    title="Details"><i
                                                                        class="fa fa-external-link"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-end -->
                                        </div>
                                    @endforeach
                                @else
                                    <div class="div-search col-12">
                                        <div height="200" width="200" class="img-search">
                                            <img src="{{ asset('User/img/no-products-found.png') }}">
                                        </div>
                                        <p class="title-seach">Không tìm thấy sản phẩm nào</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list">
                            @if ($products->count() > 0)
                                @foreach ($products as $item)
                                    <!-- single-shop-start -->
                                    <div class="single-shop mb-30">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="product-wrapper-2">
                                                    <div class="product-img">
                                                        <a href="{{ route('home.show', $item->slug) }}">
                                                            <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                                alt="book" class="primary" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-12">
                                                <div class="product-wrapper-content">
                                                    <div class="product-details">
                                                        <div class="product-rating">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h4><a
                                                                href="{{ route('home.show', $item->slug) }}">{{ ucwords($item->name) }}</a>
                                                        </h4>
                                                        <div class="product-price">
                                                            <ul>
                                                                <li>{{ number_format($item->price) }}₫</li>
                                                                @if ($item->priceOld > 0)
                                                                    <li class="old-price">
                                                                        {{ number_format($item->priceOld) }}₫</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <p>{!! substr(strip_tags($item->description), 0, 200) !!} ... </p>
                                                    </div>
                                                    <div class="product-link">
                                                        <div class="product-button">
                                                            <a href="#" title="Thêm giỏ hàng"><i
                                                                    class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                                        </div>
                                                        <div class="add-to-link">
                                                            <ul>
                                                                <li><a href="{{ route('home.show', $item->slug) }}"
                                                                        title="Chi tiết"><i
                                                                            class="fa fa-external-link"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-shop-end -->
                                @endforeach
                            @else
                                <div class="div-search col-12">
                                    <div height="200" width="200" class="img-search">
                                        <img src="{{ asset('User/img/no-products-found.png') }}">
                                    </div>
                                    <p class="title-seach">Không tìm thấy sản phẩm nào</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- tab-area-end -->
                    <!-- pagination-area-start -->
                    {{--  <div class="pagination-area mt-50">
                        <div class="list-page-2">
                            <p>Items 1-9 of 11</p>
                        </div>
                        <div class="page-number">
                            <ul>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#" class="angle"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>  --}}
                    <!-- pagination-area-end -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-main-area-end -->
@endsection
@section('js')
    <script>
        $('.boloc-mucgia').click(function() {
            var mucgia = [],
                temp = [];
            $.each($("[data-filter='mucgia']:checked"), function() {
                temp.push($(this).val());
            });
            if (temp.length !== 0) {
                mucgia += '?mucgia=' + temp.toString() +
                    '&sapxep={{ request()->sapxep }}' +
                    '&txtSearch={{ request()->txtSearch }}' +
                    '&txtCate={{ request()->txtCate }}';
            } else {
                url = '{!! url()->full() !!}';
                url = url.replace("&mucgia={{ request()->mucgia }}", "");
                window.location.href = url.replace("mucgia={{ request()->mucgia }}&", "");
                return false;
            }
            window.location.href = mucgia;
        });
        $('#sapxep').change(function() {
            var urlCu = '{!! url()->full() !!}';
            var urlMoi = urlCu.replace("&sapxep={{ request()->sapxep }}", "");
            var key = "{!! isset(request()->mucgia) ? '&' : '?' !!}";
            var url = urlMoi.replace(
                "?sapxep={{ request()->sapxep }}", "") + "" + key + "sapxep=" + $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    </script>
@stop
