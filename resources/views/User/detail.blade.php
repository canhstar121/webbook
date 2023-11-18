@extends('LayoutUser')
@section('content')
    @include('User.inc.area',['active'=>$product->name, 'cate' => $product->ProToCate])
    <!-- product-main-area-start -->
    <div class="product-main-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 order-lg-1 order-1">
                    <!-- product-main-area-start -->
                    <div class="product-main-area">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li
                                            data-thumb="{{ asset('uploads/sanpham/' . $product->ProToGall->imageDefault) }}">
                                            <img src="{{ asset('uploads/sanpham/' . $product->ProToGall->imageDefault) }}"
                                                alt="woman" />
                                        </li>
                                        @if ($product->ProToGall->image != '')
                                            @php
                                                $imgArr = explode('|', $product->ProToGall->image);
                                            @endphp
                                            @foreach ($imgArr as $item)
                                                <li data-thumb="{{ asset('uploads/sanpham/' . $item) }}">
                                                    <img src="{{ asset('uploads/sanpham/' . $item) }}" alt="woman" />
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="product-info-main">
                                    <div class="page-title">
                                        <h1>{{ ucwords($product->name) }}</h1>
                                    </div>
                                    <div class="product-info-stock-sku">
                                        <span>{{ $product->qty > 0 ? 'Còn hàng' : 'Hết hàng' }}</span>
                                        <div class="product-attribute">
                                            <span>SP{{ $product->id }}</span>
                                        </div>
                                    </div>
                                    <div class="product-reviews-summary">
                                        <div class="rating-summary">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                        <div class="reviews-actions">
                                            <a href="#">3 Đánh giá</a>
                                            <a href="#" class="view">Thêm đánh giá</a>
                                        </div>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="price-final">
                                            <span>{{ number_format($product->price) }}₫</span>
                                            @if ($product->priceOld > 0)
                                                <span class="old-price">{{ number_format($product->priceOld) }}₫</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-add-form">
                                        <form action="#">
                                            <div class="quality-button">
                                                <input class="qty" min="1" max="{{ $product->qty }}"
                                                    name="qtyOrder" type="number" value="1">
                                            </div>
                                            <a href="#">Thêm giỏ hàng</a>
                                        </form>
                                    </div>
                                    @php
                                        $check = false;
                                        if(Auth::check() && isset($product->ProToWhish)){
                                            if($product->ProToWhish->user_id == Auth::id()){
                                                $check = true;
                                            }
                                        }
                                    @endphp
                                    <div class="product-social-links">
                                        <div class="product-addto-links">
                                            <a style="color: {!! $check == true ? 'red' : 'white' !!}" href="{{ route('link.show',$product->id) }}"><i class="fa fa-heart"></i></a>
                                            <a href="{{ route('link.edit',$product->id) }}"><i class="fa fa-pie-chart"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                                        </div>
                                        <div class="product-addto-links-text">
                                            <p>
                                                {!! substr(strip_tags($product->description), 0, 200) !!} ...
                                                <a title="Xem thêm Giới thiệu về nội dung {{ $product->name }}"
                                                    class="readmore-detail" href="javascript:void(0)"
                                                    onclick="ScrollTo('desc');">Xem thêm</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-main-area-end -->
                    <!-- product-info-area-start -->
                    <div class="product-info-area mt-80">
                        <!-- Nav tabs -->
                        <ul class="nav">
                            <li><a class="active" href="#Details" data-bs-toggle="tab">Mô tả</a></li>
                            <li><a href="#Reviews" data-bs-toggle="tab">Đánh giá (3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Details">
                                <div class="valu">
                                    <h3 style="font-weight: normal;font-size: 1.45rem;">{{ ucfirst($product->name) }}</h3>
                                    <p id="desc">{!! $product->description !!}</p><br>
                                    <h3 style="font-size: 17px;color: #555555; font-weight: bold; line-height: 1.5;">Thông
                                        tin chi tiết</h3>
                                    <ul class="float-left">
                                        <li> <strong>Tác giả: </strong> {{ ucwords($product->ProToInfo->author) }}</li>

                                        <li> <strong>Nhà phát hành: </strong> <a itemprop="publisher" class="publishers"
                                                href="#">{{ strtoupper($product->ProToInfo->namePublishing) }}</a>
                                        </li>

                                        <li> <strong>Giấy phép XB: </strong>
                                            -QĐ/NXB ThN
                                        </li>

                                        <li> <strong>Ngôn ngữ: </strong>

                                            {{ ucwords($product->ProToInfo->translator) }} </li>

                                        <li> <strong>Kích thước: </strong>

                                            {{ $product->ProToInfo->size }} </li>

                                        <li> <strong>Số trang: </strong> <span
                                                itemprop="numberOfPages">{{ ucwords($product->ProToInfo->page) }}</span><br>
                                        </li>
                                    </ul>
                                    <ul class="float-right">
                                        <li> <strong>Nhà xuất bản: </strong> <span
                                                class="publishers">{{ ucwords($product->ProToInfo->publishing) }}</span>
                                        </li>
                                        <li> <strong>Mã Sản phẩm: </strong>
                                            SP{{ $product->id }}
                                        </li>
                                        <li> <strong>Khối lượng: </strong>
                                            {{ $product->ProToInfo->weight }} gam
                                        </li>
                                        <li> <strong>Định dạng: </strong>

                                            {{ ucwords($product->ProToInfo->formality) }} </li>
                                        <li> <strong>Ngày phát hành: </strong> {{ ucwords($product->ProToInfo->year) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <div class="valu valu-2">
                                    <div class="section-title mb-60 mt-60">
                                        <h2>Customer Reviews</h2>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="review-title">
                                                <h3>themes</h3>
                                            </div>
                                            <div class="review-left">
                                                <div class="review-rating">
                                                    <span>Price</span>
                                                    <div class="rating-result">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                                <div class="review-rating">
                                                    <span>Value</span>
                                                    <div class="rating-result">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                                <div class="review-rating">
                                                    <span>Quality</span>
                                                    <div class="rating-result">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-right">
                                                <div class="review-content">
                                                    <h4>themes </h4>
                                                </div>
                                                <div class="review-details">
                                                    <p class="review-author">Review by<a href="#">plaza</a></p>
                                                    <p class="review-date">Posted on <span>12/9/16</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="review-add">
                                        <h3>Youre reviewing:</h3>
                                        <h4>Joust Duffle Bag</h4>
                                    </div>
                                    <div class="review-field-ratings">
                                        <span>Your Rating <sup>*</sup></span>
                                        <div class="control">
                                            <div class="single-control">
                                                <span>Value</span>
                                                <div class="review-control-vote">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                            <div class="single-control">
                                                <span>Quality</span>
                                                <div class="review-control-vote">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                            <div class="single-control">
                                                <span>Price</span>
                                                <div class="review-control-vote">
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review-form">
                                        <div class="single-form">
                                            <label>Nickname <sup>*</sup></label>
                                            <form action="#">
                                                <input type="text" />
                                            </form>
                                        </div>
                                        <div class="single-form single-form-2">
                                            <label>Summary <sup>*</sup></label>
                                            <form action="#">
                                                <input type="text" />
                                            </form>
                                        </div>
                                        <div class="single-form">
                                            <label>Review <sup>*</sup></label>
                                            <form action="#">
                                                <textarea name="massage" cols="10" rows="4"></textarea>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="review-form-button">
                                        <a href="#">Submit Review</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-info-area-end -->
                    <!-- new-book-area-start -->
                    <div class="new-book-area mt-60">
                        <div class="section-title text-center mb-30">
                            <h3>{{ isset($productlike[0]['count']) ? 'CÓ THỂ BẠN CŨNG THÍCH' : 'CÁC SẢN PHẨM KHÁC CỦA SHOP' }}
                            </h3>
                        </div>
                        <div class="tab-active-2 owl-carousel">
                            <!-- single-product-start -->
                            @foreach ($productlike as $item)
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="{{ route('home.show', $item->slug) }}">
                                            <img src="{{ asset('uploads/sanpham/' . $item->ProToGall->imageDefault) }}"
                                                alt="book" class="primary" />
                                        </a>
                                        <div class="quick-view">
                                            <a class="action-view" href="#" onclick="doDuLieuSanPham({{ $item->id }})" title="Xem Nhanh">
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
                                        <h4><a
                                                href="{{ route('home.show', $item->slug) }}">{{ ucwords($item->name) }}</a>
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
                                                <li><a href="{{ route('home.show', $item->slug) }}" title="Chi tiết"><i
                                                            class="fa fa-external-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- single-product-end -->
                        </div>
                    </div>
                    <!-- new-book-area-start -->
                </div>
                {{--  <div class="col-lg-3 col-md-12 col-12 order-lg-2 order-2">
                    <div class="shop-left">
                        <div class="left-title mb-20">
                            <h4>Related Products</h4>
                        </div>
                        <div class="random-area mb-30">
                            <div class="product-active-2 owl-carousel">
                                <div class="product-total-2">
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/20.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Endeavor Daytrip</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$30.00</li>
                                                    <li class="old-price">$33.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/21.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Savvy Shoulder Tote</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$30.00</li>
                                                    <li class="old-price">$35.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-most-product">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/22.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Compete Track Tote</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$35.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-total-2">
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/23.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Voyage Yoga Bag</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$30.00</li>
                                                    <li class="old-price">$33.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-most-product bd mb-18">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/24.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Impulse Duffle</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$70.00</li>
                                                    <li class="old-price">$74.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-most-product">
                                        <div class="most-product-img">
                                            <a href="#"><img src="img/product/22.jpg" alt="book" /></a>
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
                                            <h4><a href="#">Fusion Backpack</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li>$59.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner-area mb-30">
                            <div class="banner-img-2">
                                <a href="#"><img src="img/banner/33.jpg" alt="banner" /></a>
                            </div>
                        </div>
                        <div class="left-title-2 mb-30">
                            <h2>Compare Products</h2>
                            <p>You have no items to compare.</p>
                        </div>
                        <div class="left-title-2">
                            <h2>My Wish List</h2>
                            <p>You have no items in your wish list.</p>
                        </div>
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
    <!-- product-main-area-end -->
@endsection
