@extends('admin.admin-master')
@section('content')
    <script src="{{ asset('cpanel/ckeditor/ckeditor.js') }}"></script>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thông tin sản phẩm</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form" action="" method="post" enctype='multipart/form-data'>
                                    <input hidden type="text" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="product_title" value="{{old('product_title')}}"
                                               placeholder="Nhập tiêu đề" class="form-control">
                                        <p class="text-danger">{{ $errors->first('product_title') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Alias</label>
                                        <input type="text" name="product_alias" value="{{old('product_alias')}}"
                                               placeholder="Nhập alias" class="form-control">
                                        <p class="text-danger">{{ $errors->first('product_alias') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="product_address" value="{{old('product_address')}}"
                                               placeholder="Nhập alias" class="form-control">
                                        <p class="text-danger">{{ $errors->first('product_address') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Thành phố</label>
                                                <select name="city_id" class="form-control" id="city_id">
                                                    @forelse($city as $key=>$val)
                                                        <option {{ (old("city_id") == $val->id ? "selected":"") }} value="{{ $val->id }}">{{ $val->city_name }}</option>
                                                    @empty
                                                        <option value="">Không có dữ liệu</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Quận/huyện</label>
                                                <select name="district_id" class="form-control" id="district_id">
                                                    <option value="">aa</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="">Loại</label>
                                                <select name="type_id" class="form-control" id="type_id">
                                                    @forelse($type as $key=>$val)
                                                        <option {{ (old("type_id") == $val->id ? "selected":"") }} value="{{ $val->id }}">{{ $val->type_name }}</option>
                                                    @empty
                                                        <option value="">Không có dữ liệu</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="">Bất động sản</label>
                                                <select name="property_id" class="form-control" id="property_id">
                                                    @forelse($property as $key => $val)
                                                        <option {{ (old("property_id") == $val->id ? "selected":"") }} value="{{ $val->id }}">{{ $val->property_name }}</option>
                                                    @empty
                                                        <option value="">Không có dữ liệu</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <div>
                                            <textarea name="product_info" id="editor1" cols="80"
                                                      rows="10">{{old('product_info')}}</textarea>
                                            <script>
                                                CKEDITOR.replace('editor1');
                                            </script>
                                            <p class="text-danger">{{ $errors->first('product_info') }}</p>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Diện tích</label>
                                    <input type="number" name="product_acreage" class="form-control" step="0.01">
                                    <p class="text-danger">{{ $errors->first('product_acreage') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <div class="input-group m-b">
                                        <input name="product_price" type="number"
                                                                        value="{{old('product_price')}}"
                                                                        class="form-control"> <span
                                                class="input-group-addon">đ</span></div>
                                    <p class="text-danger">{{ $errors->first('product_price') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thao tác</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label>Gấp</label>
                            <select name="product_fast" class="form-control">
                                <option {{ (old("product_fast") == 1 ? "selected":"") }} value="1">Có</option>
                                <option {{ (old("product_fast") == 0 ? "selected":"") }} value="0">Không
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="product_status" class="form-control">
                                <option {{ (old("product_status") == 1 ? "selected":"") }} value="1">Có</option>
                                <option {{ (old("product_status") == 0 ? "selected":"") }} value="0">Không
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        {{--<h5>Phân loại</h5>--}}
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label>Hướng</label>
                            <select name="direction_id" class="form-control" id="direction_id">
                                @forelse($direction as $key => $val)
                                    <option {{ (old("direction_id") == $val->id ? "selected":"") }} value="{{ $val->id }}">{{ $val->direction_name }}</option>
                                @empty
                                    <option value="">Không có dữ liệu</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>

                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Chọn hình ảnh</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Hình ảnh</label>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                                  <span class="input-group-btn">
                                                                      <span class="btn btn-primary btn-file">
                                                                          Chọn tệp… <input type="file" id="imgInp"
                                                                                           name="image" value="">

                                                                      </span>
                                                                  </span>
                                                <input type="text" class="form-control" value="" readonly>


                                            </div>
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <img id='img-upload'/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="save">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Lưu <i class="fa fa-check"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            getDistrict()
        });
        $('#city_id').change(function () {
            getDistrict()
        });

        function getDistrict() {
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