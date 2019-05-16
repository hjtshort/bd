@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Chi tiết đơn hàng </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="order row">
                            <div class="col-md-12">
                                <div class="order-title">
                                    <h1 class="text-center">ĐƠN HÀNG CK01</h1>
                                </div>
                                <div class="order-detail row">
                                    <div class="col-md-6">
                                        <p><b>Tên khách hàng: </b>{{ $user->ten }}</p>
                                        <p><b>Địa chỉ: </b>{{ $user->diachi }}</p>
                                        <p><b>Điện thoại: </b>{{ $user->dienthoai }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><b>Ngày đặt hàng: </b>{{ date('d-m-Y',strtotime($user->ngaydat))}}</p>
                                        <p><b>Ngày giao hàng: </b>{{ date('d-m-Y',strtotime($user->ngaygiao))}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sanpham">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình ảnh</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th class="text-center">Đơn vị tính</th>
                                    <th class="text-center">Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Tổng cộng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $index => $value)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>
                                            <div class="img">
                                                <img src="{{ url("upload/sanpham/{$value->images}")}}" width="100%"
                                                     alt="">
                                            </div>
                                        </td>
                                        <td><a href="{{ route('sanpham',$value->id) }}">{{ $value->id }}</a></td>
                                        <td>{{$value->tensanpham}}</td>
                                        <td class="text-center">{{ $value->donvitinh }}</td>
                                        <td class="text-center">{{ $value->pivot->soluong }}</td>
                                        <td>{{number_format($value->gia)}} đ</td>
                                        <td>{{ number_format($value->pivot->soluong * $value->gia) }} đ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- <div style="display: flex;justify-content: center;">
                                  <ul class="pagination">
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                  </ul>
                          </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- end: Content -->