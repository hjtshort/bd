@extends('admin.admin-master')
@section('content')
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<div class="wrapper wrapper-content">
	<div class="row">
            <div class="col-lg-8">
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5>Thông tin danh mục sản phẩm</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form role="form" method="post" action="">
                                         <input type="hidden"  value="{{ csrf_token() }}" class="form-control" name="_token">
                                        <div class="form-group">
                                            <label>Tên danh mục</label> 
                                            <input type="text" placeholder="Nhập tên sản phẩm" class="form-control" name="tendanhmuc" value="{{ $data->tendanhmuc }}">
                                            <p class="text-danger">{{$errors->first('tendanhmuc')}}</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="width: 100%">Lưu <i class="fa fa-check"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>         
            </div>
      </div>
</div>
@endsection