@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thêm tài khoản quản trị</h5>
                    </div>
                    <div class="ibox-content" style="display: block;">
                        <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" class="form-control" value="{{ old('email') }}">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password">
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Nhập lại mật khẩu</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation">
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Họ và tên</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Giới tính</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <div class="iradio_square-green " style="position: relative;">
                                                    <input type="radio" value="1" name="sex"
                                                           style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper"
                                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                                    </ins>
                                                </div>
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                                </ins>
                                            </div>
                                            <i>

                                            </i> Nam
                                        </label>
                                    </div>
                                    <div class="i-checks">
                                        <label class="">
                                            <div class="iradio_square-green" style="position: relative;">
                                                <div class="iradio_square-green" style="position: relative;">
                                                    <input type="radio" value="0" name="sex"
                                                           style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper"
                                                         style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                                    </ins>
                                                </div>
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                                </ins>
                                            </div>
                                            <i>

                                            </i> Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="i-checks"><label class="">
                                            <div class="icheckbox_square-green" style="position: relative;">
                                                <input type="checkbox" value="" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper"
                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">

                                                </ins>
                                            </div>
                                            <i>

                                            </i> Option one </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                          <span class="input-group-btn">
                                              <span class="btn btn-primary btn-file">
                                                  Chọn tệp… <input type="file" id="imgInp"
                                                                   name="image" value="">

                                              </span>
                                          </span>
                                        <input type="text" class="form-control" value="" readonly>
                                    </div>
                                    <img width="300px;" id='img-upload'/>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            getDistrict()
        });
        $('#city_id').change(function () {
            getDistrict()
        });

        function getDistrict(city) {
            var id = $('#city_id').val();
            var str = '';
            $.ajax({
                url: '{{ route('getDistrict') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                },
                success: function (response) {
                    response.forEach(function (item) {

                        str += `<option value="${item.id}">${item.district_name}</option>`
                    });
                    $('#district_id').html(str)
                }
            })
        }
    </script>
@endsection
