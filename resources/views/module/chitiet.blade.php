@extends('welcome')
@section('content')
<div class="page-main">
    <div class="container">
        <div class="row pt-3">
            <div class="col-lg-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <h1>Bán gấp nhà phố mặt tiền khu Dân cư An Phú Hưng quận 7.</h1>
                <div class="slider">
                    @php
                        $arrayImage = json_decode($product_img);
                    @endphp
                    @foreach($arrayImage as $value)
                    <div>
                        <a href="#">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($value) }}" alt="slider" style="width: 100%">
                        </a>
                    </div>
                        @endforeach
                </div>
                <div class="detail">
                    <div class="detail-title">
                        <h2>Thông tin chi tiết</h2>
                    </div>
                    <div class="detail-content">
                        <ul class="p-1">
                            {!! $product_info !!}
                        </ul>
                    </div>
                </div>
                <div class="map p-0">
                    <div id="map">

                    </div>
                </div>
                <div class="related">
                    <div class="related-title">
                        <h2>Bất động sản liên quan</h2>
                    </div>
                    <div class="related-content py-3">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <div class="card card-product">
                                    <div class="card-header bg-main p-1">
                                        <h5 class="text-white m-0">Bán gấp nhà lầu hẻm...</h5>
                                    </div>
                                    <div class="card-body p-1">
                                        <a href="">
                                            <div class="image">
                                                <img class="card-img-top" src="assets/images/product.jpg" alt="Bán gấp nhà lầu hẻm...">
                                                <div class="badge-product daidien">Đại diện</div>
                                                <div class="badge-product ban">Bán</div>
                                                <div class="bangap">Bán gấp</div>
                                            </div>
                                        </a>
                                        <div class="box-info address">
                                            <strong>Lê Văn Lương, Quận 7</strong>
                                        </div>
                                        <div class="box-info">
                                            <span>Loại</span>
                                            <span>Nhà Hẻm</span>
                                        </div>
                                        <div class="box-info">
                                            <span>Diện tích</span>
                                            <span>5x6 m<sup>2</sup></span>
                                        </div>
                                        <div class="box-info">
                                            <span>Giá bán</span>
                                            <span>
                                                <span class="price">
                                                    2.55 tỷ
                                                </span>
                                            </span>
                                        </div>
                                        <p><i>Bán nhà 1 lầu hẻm 54 Lê Văn Lương phường Tân Hưng Quận 7</i></p>
                                        <button class="btn btn-main mb-3">Chi tiết</button>
                                        <span class="date"><i class="fe fe-clock"></i> 12-09-2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-product">
                                    <div class="card-header bg-main p-1">
                                        <h5 class="text-white m-0">Bán gấp nhà lầu hẻm...</h5>
                                    </div>
                                    <div class="card-body p-1">
                                        <a href="">
                                            <div class="image">
                                                <img class="card-img-top" src="assets/images/product.jpg" alt="Bán gấp nhà lầu hẻm...">
                                                <div class="badge-product daidien">Đại diện</div>
                                                <div class="badge-product ban">Bán</div>
                                                <div class="bangap">Bán gấp</div>
                                            </div>
                                        </a>
                                        <div class="box-info address">
                                            <strong>Lê Văn Lương, Quận 7</strong>
                                        </div>
                                        <div class="box-info">
                                            <span>Loại</span>
                                            <span>Nhà Hẻm</span>
                                        </div>
                                        <div class="box-info">
                                            <span>Diện tích</span>
                                            <span>5x6 m<sup>2</sup></span>
                                        </div>
                                        <div class="box-info">
                                            <span>Giá bán</span>
                                            <span>
                                                <span class="price">
                                                    2.55 tỷ
                                                </span>
                                            </span>
                                        </div>
                                        <p><i>Bán nhà 1 lầu hẻm 54 Lê Văn Lương phường Tân Hưng Quận 7</i></p>
                                        <button class="btn btn-main mb-3">Chi tiết</button>
                                        <span class="date"><i class="fe fe-clock"></i> 12-09-2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-product">
                                    <div class="card-header bg-main p-1">
                                        <h5 class="text-white m-0">Bán gấp nhà lầu hẻm...</h5>
                                    </div>
                                    <div class="card-body p-1">
                                        <a href="">
                                            <div class="image">
                                                <img class="card-img-top" src="assets/images/product.jpg" alt="Bán gấp nhà lầu hẻm...">
                                                <div class="badge-product daidien">Đại diện</div>
                                                <div class="badge-product ban">Bán</div>
                                                <div class="bangap">Bán gấp</div>
                                            </div>
                                        </a>
                                        <div class="box-info address">
                                            <strong>Lê Văn Lương, Quận 7</strong>
                                        </div>
                                        <div class="box-info">
                                            <span>Loại</span>
                                            <span>Nhà Hẻm</span>
                                        </div>
                                        <div class="box-info">
                                            <span>Diện tích</span>
                                            <span>5x6 m<sup>2</sup></span>
                                        </div>
                                        <div class="box-info">
                                            <span>Giá bán</span>
                                            <span>
                                                <span class="price">
                                                    2.55 tỷ
                                                </span>
                                            </span>
                                        </div>
                                        <p><i>Bán nhà 1 lầu hẻm 54 Lê Văn Lương phường Tân Hưng Quận 7</i></p>
                                        <button class="btn btn-main mb-3">Chi tiết</button>
                                        <span class="date"><i class="fe fe-clock"></i> 12-09-2018</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-product">
                                    <div class="card-header bg-main p-1">
                                        <h5 class="text-white m-0">Bán gấp nhà lầu hẻm...</h5>
                                    </div>
                                    <div class="card-body p-1">
                                        <a href="">
                                            <div class="image">
                                                <img class="card-img-top" src="assets/images/product.jpg" alt="Bán gấp nhà lầu hẻm...">
                                                <div class="badge-product daidien">Đại diện</div>
                                                <div class="badge-product ban">Bán</div>
                                                <div class="bangap">Bán gấp</div>
                                            </div>
                                        </a>
                                        <div class="box-info address">
                                            <strong>Lê Văn Lương, Quận 7</strong>
                                        </div>
                                        <div class="box-info">
                                            <span>Loại</span>
                                            <span>Nhà Hẻm</span>
                                        </div>
                                        <div class="box-info">
                                            <span>Diện tích</span>
                                            <span>5x6 m<sup>2</sup></span>
                                        </div>
                                        <div class="box-info">
                                            <span>Giá bán</span>
                                            <span>
                                                <span class="price">
                                                    2.55 tỷ
                                                </span>
                                            </span>
                                        </div>
                                        <p><i>Bán nhà 1 lầu hẻm 54 Lê Văn Lương phường Tân Hưng Quận 7</i></p>
                                        <button class="btn btn-main mb-3">Chi tiết</button>
                                        <span class="date"><i class="fe fe-clock"></i> 12-09-2018</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-box">
                    <div class="right-title">
                        <h2>Thông tin</h2>
                    </div>
                    <div class="info-table bg-white mt-3">
                        <div class="info-row">
                            <strong>Địa chỉ:</strong>
                            <i>khu dân cư An Phú Hưng</i>
                        </div>
                        <div class="info-row">
                            <strong>Địa chỉ:</strong>
                            <i>khu dân cư An Phú Hưng</i>
                        </div>
                        <div class="info-row">
                            <strong>Địa chỉ:</strong>
                            <i>khu dân cư An Phú Hưng</i>
                        </div>
                        <div class="info-row">
                            <strong>Địa chỉ:</strong>
                            <i>khu dân cư An Phú Hưng</i>
                        </div>
                        <div class="info-row">
                            <strong>Địa chỉ:</strong>
                            <div class="info-alert">
                                <i>khu dân cư An Phú Hưng</i>
                            </div>
                        </div>
                        <div class="info-row">
                            <strong>Diện tích:</strong>
                            <div class="info-alert">
                                <i>69 m<sup>2</sup></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-box">
                    <div class="right-title">
                        <h2>Bán hàng</h2>
                    </div>
                    <div class="info-search bg-white mt-3">
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
                        <div class="right-form">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên đường, quận, huyện, từ khóa">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" placeholder="Loại" name="type_id">
                                        <option value="0">Bất động sản</option>
                                        <option value="1">Bán nhà riêng</option>
                                        <option value="2">Cho thuê nhà đất </option>
                                        <option value="3">Đất dự án </option>
                                        <option value="4">Bán đất</option>
                                        <option value="5">Bán căn hộ chung cư</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" placeholder="Giá" name="price">
                                        <option value="0">Giá</option>
                                        <option value="1">500 - 1 tỷ</option>
                                        <option value="2">1 tỷ - 2 tỷ</option>
                                        <option value="3">2 tỷ - 4 tỷ</option>
                                        <option value="4">4 tỷ -6 tỷ</option>
                                        <option value="5">6 tỷ - 8 tỷ</option>
                                        <option value="6">8 tỷ - 10 tỷ </option>
                                        <option value="7">10 tỷ - 20 tỷ</option>
                                        <option value="8">20 tỷ - 30 tỷ</option>
                                        <option value="9">Trên 30 tỷ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" placeholder="Hướng nhà" name="arrow_id">
                                        <option value="0">Hướng</option>
                                        <option value="1">Hướng đông bắc</option>
                                        <option value="2">Hướng Bắc</option>
                                        <option value="3">Hướng Nam</option>
                                        <option value="4">Hướng Tây</option>
                                        <option value="5">Hướng Đông</option>
                                        <option value="6">Hướng Đông Nam</option>
                                        <option value="7">Hướng Tây Bắc</option>
                                        <option value="8">Hướng Tây Nam</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="city_id" placeholder="Phường" name="city_id">
                                        <option value="0">Tỉnh/Thành phố</option>
                                        <option value="2">Hà Nội</option>
                                        <option value="3" selected="selected">TP.HCM</option>
                                        <option value="10">Yên Bái</option>
                                        <option value="11">Vĩnh Phúc</option>
                                        <option value="12">Vĩnh Long</option>
                                        <option value="13">Tuyên Quang</option>
                                        <option value="14">Trà Vinh</option>
                                        <option value="15">Tiền Giang</option>
                                        <option value="16">Thừa Thiên Huế</option>
                                        <option value="17">Thanh Hóa</option>
                                        <option value="18">Thái Nguyên</option>
                                        <option value="19">Thái Bình</option>
                                        <option value="21">Tây Ninh</option>
                                        <option value="22">Sơn La</option>
                                        <option value="23">Sóc Trăng</option>
                                        <option value="24">Quảng Trị</option>
                                        <option value="25">Quảng Ninh</option>
                                        <option value="26">Quảng Ngãi</option>
                                        <option value="27">Quảng Nam</option>
                                        <option value="28">Quảng Bình</option>
                                        <option value="29">Phú Yên</option>
                                        <option value="30">Phú Thọ</option>
                                        <option value="31">Ninh Thuận</option>
                                        <option value="32">Ninh Bình</option>
                                        <option value="33">Nghệ An</option>
                                        <option value="34">Nam Định</option>
                                        <option value="35">Long An</option>
                                        <option value="36">Lào Cai</option>
                                        <option value="37">Lạng Sơn</option>
                                        <option value="38">Lâm Đồng</option>
                                        <option value="39">Lai Châu</option>
                                        <option value="40">Kon Tum</option>
                                        <option value="41">Kiên Giang</option>
                                        <option value="42">Khánh Hòa</option>
                                        <option value="43">Hưng Yên</option>
                                        <option value="44">Hòa Bình</option>
                                        <option value="45">Hậu Giang</option>
                                        <option value="46">Hải Dương</option>
                                        <option value="47">Hà Tĩnh</option>
                                        <option value="49">Hà Nam </option>
                                        <option value="50">Hà Giang</option>
                                        <option value="51">Gia Lai</option>
                                        <option value="52">Đồng Tháp</option>
                                        <option value="53">Đồng Nai</option>
                                        <option value="54">Điện Biên</option>
                                        <option value="55">Đắk Nông</option>
                                        <option value="56">Đắk Lắk</option>
                                        <option value="57">Cao Bằng</option>
                                        <option value="58">Cà Mau</option>
                                        <option value="59">Bình Thuận</option>
                                        <option value="60">Bình Phước</option>
                                        <option value="61">Bình Dương</option>
                                        <option value="62">Bình Định</option>
                                        <option value="63">Bến Tre</option>
                                        <option value="64">Bắc Ninh</option>
                                        <option value="65">Bạc Liêu</option>
                                        <option value="66">Bắc Kạn</option>
                                        <option value="67">Bắc Giang</option>
                                        <option value="68">Bà Rịa - Vũng Tàu</option>
                                        <option value="69">An Giang</option>
                                        <option value="70">Hải Phòng</option>
                                        <option value="71">Đà Nẵng</option>
                                        <option value="72">Cần Thơ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="district_id" placeholder="Phường" name="district_id">
                                        <option value="0">Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary w-100">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="right-box">
                    <div class="right-title">
                        <h2>Gọi lại cho tôi</h2>
                    </div>
                    <div class="bg-white mt-3">
                        <div class="right-form">
                            <form action="">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" placeholder="Họ và tên">
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Họ và tên">
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-success">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="right-box">
                    <div class="right-title">
                        <h2>Đối tác</h2>
                    </div>
                    <div class="doitac mt-3">
                        <img class="mb-1" src="assets/images/bds.jpg">
                        <img class="mb-1" src="assets/images/banner.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key=AIzaSyCDfOZA-NkwPz2yuKnSkcC5RUoBHa1MpQo&sensor=false&libraries=places'></script>
<script src="{{ asset('/assets/js/locationpicker.jquery.js') }}"></script>
<script>
    $("#map").locationpicker();
</script>
@endsection