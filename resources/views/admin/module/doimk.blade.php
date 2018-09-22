@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
  <div class="row">
            <div class="col-lg-8">
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5>Xác nhận mật khẩu</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Mật khẩu cũ</label> 
                                            <input type="password" placeholder="Nhập vào mật khẩu cũ của bạn" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label> 
                                            <input type="password" placeholder="Nhập mật khẩu mới đi nào!" class="form-control">
                                        </div> 
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu</label> 
                                            <input type="password" placeholder="Xác nhận lại mật khẩu nhé!" class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
            <div class="col-lg-4">
                  <div class="widget-text-box">
                      <p>Bạn đã chắc chắn chưa? Nếu chắc hãy bấm Lưu nhé!</p>
                  </div>
                  <div class="save" style="height: 60px">
                          <button class="btn btn-primary" style="width: 100%;height: 100%">Lưu <i class="fa fa-check"></i></button>
                  </div>
            </div>
      </div>
</div>
@endsection
<!-- end: Content -->