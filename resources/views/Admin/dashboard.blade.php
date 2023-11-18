@extends('LayoutAdmin')
@section('content')
    <main class="main">
        <div class="container-fluid">
            <div class="row">
                <!-- main title -->
                <div class="col-12">
                    <div class="main__title">
                        <h2>Tổng Quan</h2>
                    </div>
                </div>
                <!-- end main title -->
            </div>

            <div class="row row--grid">
                <!-- stats -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stats">
                        <span>Đơn hàng tháng này</span>
                        <p>{{ $orderCount }}</p>
                        <img src="{{ asset('Admin/img/graph-bar.svg') }}" alt="">
                    </div>
                </div>
                <!-- end stats -->

                <!-- stats -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stats">
                        <span>Sản phẩm</span>
                        <p>{{ $productCount }}</p>
                        <img src="{{ asset('Admin/img/film.svg') }}" alt="">
                    </div>
                </div>
                <!-- end stats -->

                <!-- stats -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stats">
                        <span>Bài Viết</span>
                        <p>2 573</p>
                        <img src="{{ asset('Admin/img/comments.svg') }}" alt="">
                    </div>
                </div>
                <!-- end stats -->

                <!-- stats -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="stats">
                        <span>Người Dùng</span>
                        <p>{{ $userCount }}</p>
                        <img src="{{ asset('Admin/img/star-half-alt.svg') }}" alt="">
                    </div>
                </div>
                <!-- end stats -->

                <!-- dashbox -->
                <div class="col-12">
                    <div class="dashbox">
                        <div class="dashbox__title">
                            <h3><img src="{{ asset('Admin/img/chart.svg') }}" alt="">Doanh Thu</h3>

                        </div>
                        <div class="dashbox__table-wrap">
                            <div style="text-transform: capitalize;" id="myChart"></div>
                        </div>
                    </div>
                </div>
                <!-- end dashbox -->

                <!-- dashbox -->
                {{--  <div class="col-12 col-xl-5">
                    <div class="dashbox">
                        <div class="dashbox__title">
                            <h3><img src="{{ asset('Admin/img/mail.svg') }}" alt=""> Liên Hệ</h3>
                        </div>

                        <div class="dashbox__table-wrap">
                            <table class="main__table main__table--dash">
                                <tbody>
                                    @php
                                        $noidung = 'Có rất nhiều biến thể của Lorem Ipsum mà bạn có thể tìm thấy, nhưng đa số được biến đổi bằng cách thêm các yếu tố hài hước, các từ ngẫu nhiên có khi không có vẻ gì là có ý nghĩa. Nếu bạn định sử dụng một đoạn Lorem Ipsum, bạn nên kiểm tra kĩ để chắn chắn là không có gì nhạy cảm được giấu ở giữa đoạn văn bản. Tất cả các công cụ sản xuất văn bản mẫu Lorem Ipsum đều được làm theo cách lặp đi lặp lại các đoạn chữ cho tới đủ thì thôi, khiến cho lipsum.com trở thành công cụ sản xuất Lorem Ipsum đáng giá nhất trên mạng. Trang web này sử dụng hơn 200 từ la-tinh, kết hợp thuần thục nhiều cấu trúc câu để tạo ra văn bản Lorem Ipsum trông có vẻ thật sự hợp lí. Nhờ thế, văn bản Lorem Ipsum được tạo ra mà không cần một sự lặp lại nào, cũ';
                                    @endphp
                                    <tr>
                                        <td style="width: 45%;">
                                            <div class="main__table-text">
                                                <h4><img src="{{ asset('Admin/img/mail.svg') }}" style="margin-right: 4px;"
                                                        width="20px" height="20px" alt="">
                                                    Nguyễn Văn A</h4>
                                            </div>
                                            <div class="main__table-text">
                                                <span
                                                    style="color: rgb(141 141 141);margin-left: 12.9%; font-size: 11px; margin-top: -12px; ">{{ substr($noidung, 0, 35) }}{{ strlen($noidung) > 35 ? '...' : '' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;margin-left: -24%;color: rgb(141 141 141);">
                                                <span>
                                                    <small>12 giờ trước</small>
                                                </span>
                                                <span>
                                                    <p><small>Đánh dấu chưa đọc</small></p>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                            </table>
                        </div>
                    </div>
                </div>  --}}
                <!-- end dashbox -->

                <!-- dashbox -->
                <div class="col-12 col-xl-6">
                    <div class="dashbox">
                        <div class="dashbox__title">
                            <h3><img src="{{ asset('Admin/img/user-circle.svg') }}" alt=""> Người Dùng Mới</h3>

                            <div class="dashbox__wrap">
                                <a class="dashbox__refresh" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M21,11a1,1,0,0,0-1,1,8.05,8.05,0,1,1-2.22-5.5h-2.4a1,1,0,0,0,0,2h4.53a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4.77A10,10,0,1,0,22,12,1,1,0,0,0,21,11Z" />
                                    </svg></a>
                            </div>
                        </div>

                        <div class="dashbox__table-wrap">
                            <table class="main__table main__table--dash">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>HỌ & TÊN</th>
                                        <th>EMAIL</th>
                                        <th>NGÀY GIỜ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="main__table-text">{{ $user->id }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->name }}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text main__table-text--grey">{{ $user->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{ $user->created_at }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end dashbox -->

                <!-- dashbox -->
                <div class="col-12 col-xl-6">
                    <div class="dashbox">
                        <div class="dashbox__title">
                            <h3><img src="{{ asset('Admin/img/award.svg') }}" alt=""> Sản Phẩm Hàng Đầu</h3>

                            <div class="dashbox__wrap">
                                <a class="dashbox__refresh" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M21,11a1,1,0,0,0-1,1,8.05,8.05,0,1,1-2.22-5.5h-2.4a1,1,0,0,0,0,2h4.53a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4.77A10,10,0,1,0,22,12,1,1,0,0,0,21,11Z" />
                                    </svg></a>
                            </div>
                        </div>

                        <div class="dashbox__table-wrap">
                            <table class="main__table main__table--dash">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SẢN PHẨM</th>
                                        <th>THỂ LOẠI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productTop as $item)
                                    <tr>
                                        <td>
                                            <div class="main__table-text">{{ $item->id }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">{{ $item->name }}</div>
                                        </td>
                                        <td>
                                            <div class="main__table-text">{{ $item->ProToCate->name }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end dashbox -->
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        new Morris.Bar({
            element: 'myChart',
            parseTime: false,
            hideHover: 'auto',
            barColors: ['#ff55a5'],
            xkey: 'day',
            ykeys: ['total'],
            labels: ['Tổng'],
            xLabelAngle: 43,
            labelTop: true,
            data: {!! json_encode($chartData) !!}
        });
    </script>
@stop
