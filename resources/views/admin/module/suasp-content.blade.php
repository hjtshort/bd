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
                                    <form role="form" action="" method="post"  enctype='multipart/form-data'>
                                        <input hidden type="text" name="_token" value="{!! csrf_token() !!}">
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label> 
                                            <input type="text" name="tensanpham" placeholder="Nhập tên sản phẩm" class="form-control" value="{{ $sp->tensanpham}}">
                                            <p class="text-danger">{{ $errors->first('tensanpham') }}</p>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <div>
                                                <textarea name="mota" id="editor1" cols="80" rows="10">{{$sp->mota}}</textarea>
                                                <script>
                                                       CKEDITOR.replace( 'editor1' );
                                                </script>
                                            </div>
                                        </div>
                                </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                              <label>Đơn vị tính</label>
                                             <select name="donvitinh" class="form-control">
                                                    @foreach($donvitinh as $value)
                                                    <option {{ ($sp->donvitinh_id == $value->id ? "selected":"") }} value="{{$value->id}}">{{$value->donvitinh}}</option>
                                                    @endforeach
                                             </select>
                                        </div>
                                  </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                              <label>Giá bán</label>
                                              <div class="input-group m-b"><input name="gia" type="number" class="form-control" value="{{$sp->gia}}"> <span class="input-group-addon">đ</span></div>
                                              <p class="text-danger">{{ $errors->first('gia') }}</p>
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
                                              <label>Cho phép đặt hàng</label>
                                              <select name="chophepdathang" class="form-control">
                                                <option value="0" @if($sp->chophepdathang==0) selected @endif >Cho phép</option>
                                                <option value="1"  @if($sp->chophepdathang==1) selected @endif  >Không cho phép</option>
                                              </select>
                                      </div>
                        </div>
                  </div>
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5>Phân loại</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                        </div>
                        <div class="ibox-content">
                                      <div class="form-group">
                                            <label>Đơn vị cung cấp</label> 
                                            <input type="text" name="donvicungcap" placeholder="Nhập tên đơn vị cung cấp" class="form-control" value="{{$sp->donvicungcap}}">
                                            <p class="text-danger">{{ $errors->first('donvicungcap') }}</p>
                                        </div>
                                      <div class="form-group">
                                              <label>Chọn danh mục</label>
                                              <select name="danhmuc" class="form-control">
                                                @foreach($data as $val)
                                                <option value="{{$val->id}}" @if($val->id==$sp->danhmucsanpham_id) selected @endif>{{$val->tendanhmuc}}</option>
                                                @endforeach
                                              </select>
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
                                                                          Chọn tệp… <input type="file" id="imgInp" name="image" value="" >
                                                                         
                                                                      </span>
                                                                  </span>
                                                                <input type="text" class="form-control" value="{{$sp->images }}" readonly>
                                                                
                                                                 
                                                              </div>
                                                              <p class="text-danger">{{ $errors->first('image') }}</p>
                                                        </div>
                                                        <div class="col-md-12">                                                                                
                                                        <img id='img-upload' src={{asset('/upload/sanpham/'.$sp->images.'')}}/>                                                            
                                                        </div>
                                                </div>
                                                
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="save">
                          <button type="submit" class="btn btn-primary" style="width: 100%">Lưu <i class="fa fa-check"></i></button>
                  </div>
            </div>
        </form>
      </div>
</div>
@if(Session::has('message') && Session::get('message')=='ok')
    <script>
        Command: toastr["success"]("Chỉnh sửa thành công!")

        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
        
    </script>
@endif


@endsection