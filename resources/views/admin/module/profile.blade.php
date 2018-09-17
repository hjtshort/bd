@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
<div class="row">
      <div class="col-lg-6">
            <div class="widget-head-color-box navy-bg p-lg text-center">
                <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    Thằng lồn
                </h2>
                </div>
                <img src="img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
                 <div>
                    <span>Admin tối cao</span>
                </div>
            </div>
    </div>
    <div class="col-lg-6">
            <div class="widget-head-color-box white-bg p-lg text-left">
                <div class="m-b-lg">
                      <h2 class="font-bold no-margins text-center">
                          Thông tin quản trị
                      </h2>
                </div>
                <div class="admin-info">
                      <p><b>Tên quản trị: </b>Nguyễn Trường Thuận</p>
                      <p><b>Chức vụ: </b>Admin tối cao</p>
                      <p><b>Tùy chọn tài khoản: </b><a class="btn btn-xs btn-danger"><i class="fa fa-lock"></i> Đổi mật khẩu</a></p>
                </div>
            </div>
            <div class="widget-text-box">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
    </div>
  </div>
  </div>
@endsection
<!-- end: Content -->