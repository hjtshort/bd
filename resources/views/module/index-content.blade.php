@extends('welcome')
@section('content')
    <div class="page-main">
        <div class="slider">
            <div>
                <a href="#">
                    <img src="assets/images/slider.jpg" alt="slider" style="width: 100%">
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="assets/images/slider.jpg" alt="slider" style="width: 100%">
                </a>
            </div>
            <div>
                <a href="#">
                    <img src="assets/images/slider.jpg" alt="slider" style="width: 100%">
                </a>
            </div>
        </div>
        <div class="search-bar pt-3">
            <div class="container">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tên đường, quận, huyện, từ khóa">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button class="btn btn-main w-100"><i class="fe fe-search"></i> Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="direction" id="direction" class="form-control">
                                            <option value="">Tất cả hướng</option>
                                            @foreach($direction as $value)
                                                <option value="{{ $value->id }}">{{ $value->direction_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="" id="property" class="form-control">
                                            <option value="">Tất cả bất động sản</option>
                                            @foreach($property as $val)
                                                <option value="{{ $val->id }}"> {{ $val->property_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="" id="type" class="form-control">
                                            <option value="">Tất cả tỉnh thành</option>
                                            @foreach($city as $value)
                                                <option value="{{ $value->id }}">{{ $value->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="">Tất cả loại</option>
                                            @foreach($type as $value)
                                                <option value="{{ $value->id }}">{{ $value->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="" id="district" class="form-control">
                                            <option value="">Quận/Huyện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container pt-3">
            <div class="row">
                <div class="col-lg-9">
                    <h2>Tổng số bất động sản mua bán nhà đất : {{ $countAll }}</h2>
    {{--                    <div class="d-flex align-items-center justify-content-end pb-3">--}}
    {{--                        <span class="mr-2">Sắp xếp: </span>--}}
    {{--                        <form action="">--}}
    {{--                            <select name="" id="" class="form-control">--}}
    {{--                                <option value="">Tin mới nhất</option>--}}
    {{--                            </select>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
                    <div class="row">
                        @foreach($product as $key => $value)
                            @php
                                $avatar = json_decode($value->product_img)[0];
                            @endphp
                        <div class="col-6 col-lg-3">
                            <div class="card card-product">
                                <div class="card-header bg-main p-1">
                                    <h5 class="text-white m-0"></h5>
                                </div>
                                <div class="card-body p-1">
                                    <a href="">
                                        <div class="image">
                                            <img class="card-img-top" src="{{ \Illuminate\Support\Facades\Storage::url($avatar) }}"
                                                 alt="{{ $value->product_title }}">
                                            <div class="badge-product daidien">Đại diện</div>
                                            <div class="badge-product ban">{{ $value->property_name }}</div>
                                            @if($value->product_fast == 1)
                                            <div class="bangap">Bán gấp</div>
                                                @endif
                                        </div>
                                    </a>
                                    <div class="box-info address">
                                        <strong>Lê Văn Lương, Quận 7</strong>
                                    </div>
                                    <div class="box-info">
                                        <span>Loại</span>
                                        <span>{{ $value->type_name }}</span>
                                    </div>
                                    <div class="box-info">
                                        <span>Diện tích</span>
                                        <span>{{ $value->product_acreage }} m<sup>2</sup></span>
                                    </div>
                                    <div class="box-info">
                                        <span>Giá bán</span>
                                        <span>
                                        <span class="price">
                                            {{ \App\Helpers\PrintPrice::print($value->product_price) }}
                                        </span>
                                    </span>
                                    </div>
                                    <p><i>{{ $value->product_address }}</i></p>
                                    <a href="{{ route('detail',$value->product_slug) }}" class="btn btn-main mb-3">Chi tiết</a>
                                    <span class="date"><i class="fe fe-clock"></i> {{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar-title">
                            <h2>Nhân viên hỗ trợ</h2>
                        </div>
                        <div class="sidebar-body">
                            <div class="item">
                                <div class="grid-item">
                                    <a href="#">
                                        <div class="img">
                                            <img src="assets/images/nhanvien.jpg">
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a class="name" href="">
                                        Quốc Bảo
                                    </a>
                                    <p class="phone">
                                        0999888777
                                    </p>
                                    <a class="mail" href="">
                                        bdskimdien@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="grid-item">
                                    <a href="#">
                                        <div class="img">
                                            <img src="assets/images/nhanvien.jpg">
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a class="name" href="">
                                        Quốc Bảo
                                    </a>
                                    <p class="phone">
                                        0999888777
                                    </p>
                                    <a class="mail" href="">
                                        bdskimdien@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="grid-item">
                                    <a href="#">
                                        <div class="img">
                                            <img src="assets/images/nhanvien.jpg">
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a class="name" href="">
                                        Quốc Bảo
                                    </a>
                                    <p class="phone">
                                        0999888777
                                    </p>
                                    <a class="mail" href="">
                                        bdskimdien@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="grid-item">
                                    <a href="#">
                                        <div class="img">
                                            <img src="assets/images/nhanvien.jpg">
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a class="name" href="">
                                        Quốc Bảo
                                    </a>
                                    <p class="phone">
                                        0999888777
                                    </p>
                                    <a class="mail" href="">
                                        bdskimdien@gmail.com
                                    </a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="grid-item">
                                    <a href="#">
                                        <div class="img">
                                            <img src="assets/images/nhanvien.jpg">
                                        </div>
                                    </a>
                                </div>
                                <div class="grid-item">
                                    <a class="name" href="">
                                        Quốc Bảo
                                    </a>
                                    <p class="phone">
                                        0999888777
                                    </p>
                                    <a class="mail" href="">
                                        bdskimdien@gmail.com
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-title">
                            <h2>Đối tác</h2>
                        </div>
                        <div class="sidebar-body">
                            <img class="mb-1" src="assets/images/bds.jpg">
                            <img class="mb-1" src="assets/images/banner.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
