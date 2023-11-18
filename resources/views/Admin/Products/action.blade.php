@extends('LayoutAdmin')
@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>{{ !isset($product) ? 'Thêm Mới' : 'Cập Nhật' }}</h2>
                    </div>
                </div>
                <!-- end main title -->
                @php
                    $route = isset($product) ? route('sanpham.update', $product->id) : route('sanpham.store');
                    $name = isset($product) ? $product->name : '';
                    $description = isset($product) ? $product->description : '';
                    $price = isset($product) ? $product->price : 0;
                    $qty = isset($product) ? $product->qty : '';
                    $status = isset($product) ? $product->status : '';
                    $namePublishing = isset($product) ? $product->ProToInfo->namePublishing : '';
                    $author = isset($product) ? $product->ProToInfo->author : '';
                    $translator = isset($product) ? $product->ProToInfo->translator : '';
                    $publishing = isset($product) ? $product->ProToInfo->publishing : '';
                    $year = isset($product) ? $product->ProToInfo->year : '';
                    $weight = isset($product) ? $product->ProToInfo->weight : '';
                    $size = isset($product) ? $product->ProToInfo->size : '';
                    $page = isset($product) ? $product->ProToInfo->page : '';
                    $formality = isset($product) ? $product->ProToInfo->formality : '';
                    $imageDefault = isset($product) ? asset('uploads/sanpham/' . $product->ProToGall->imageDefault) : '';
                @endphp
                <!-- form -->
                <div class="col-12">
                    <form action="{{ $route }}" method="POST" class="form" enctype="multipart/form-data">
                        @isset($product)
                            @method('PUT')
                        @endisset
                        @csrf

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-12">
                                    <div class="form__img" style="height: 200px;">
                                        <label for="form__img-upload">Ảnh (Mặc định)</label>
                                        <input id="form__img-upload" name="imagedefault" type="file" accept="image/*"
                                            {{ isset($product) ? '' : 'required' }}>
                                        <img id="form__img" src="{{ $imageDefault }}" alt=" " style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 form__content">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form__input" placeholder="Tên" required
                                        value="{{ $name }}">
                                </div>

                                <div class="col-12">
                                    <textarea id="text" name="desc" class="form__textarea" placeholder="Mô tả">{{ $description }}</textarea>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="namePublishing"
                                        placeholder="Nhà Phát Hành" required value="{{ $namePublishing }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="author" placeholder="Tác giả" required
                                        value="{{ $author }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="translator" placeholder="Tên người dịch"
                                        value="{{ $translator }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="publishing" placeholder="Nhà Xuất bản"
                                        required value="{{ $publishing }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="year" placeholder="Năm Phát Hành"
                                        pattern="[0-9,]*" required value="{{ $year }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="weight" placeholder="Khối lượng"
                                        required value="{{ $weight }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="size" placeholder="Kích Thước"
                                        required value="{{ $size }}">
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" name="page" placeholder="Số Trang"
                                        pattern="[0-9,]*" required value="{{ $page }}">
                                </div>

                                <div class="col-12 col-lg-4">
                                    <input type="text" class="form__input" name="price" placeholder="Giá Bán" required
                                        onkeyup="dinhDangGia(this)" pattern="[0-9,]*" value="{{ number_format($price) }}">
                                </div>

                                <div class="col-12 col-lg-4">
                                    <input type="text" class="form__input" name="qty" placeholder="Số Lượng" required
                                        value="{{ $qty }}">
                                </div>

                                <div class="col-12 col-lg-4">
                                    <select class="js-example-basic-single" name="status" id="status" required>
                                        <option value=""></option>
                                        <option {{ $status == 0 ? 'selected' : '' }} value="0">Hiện</option>
                                        <option {{ $status == 1 ? 'selected' : '' }} value="1">Ẩn</option>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form__input" name="formality" placeholder="Định Dạng"
                                        required value="{{ $formality }}">
                                </div>

                                <div class="col-12 col-lg-6">
                                    <select class="js-example-basic-single" name="cateid" id="country" required>
                                        <option value=""></option>
                                        <option value="0">--- Chọn ---</option>
                                        {!! $html !!}
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form__gallery">
                                        <label id="gallery1" for="form__gallery-upload">Tải ảnh</label>
                                        <input data-name="#gallery1" id="form__gallery-upload" name="gallery[]"
                                            class="form__gallery-upload" type="file" accept="image/*" multiple>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button style="float: right;" type="submit"
                                        class="form__btn eventClick">Thêm</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- end form -->
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script></script>
@stop
