@extends('admin.admin-master')
@section('content')
<script src="{{ asset('/cpanel/ckeditor/ckeditor.js') }}"></script>
<div class="wrapper wrapper-content">
	<div class="row">
            <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5>Nội dung</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form role="form" method="post" action="" enctype='multipart/form-data'>
                                            <input name="_token" type="hidden"  class="form-control" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Tiêu đề</label> 
                                        <input name="tieude" type="text" placeholder="Nhập tiêu đề bài viết" class="form-control" value="{{ $data->tieude }}">
                                            <p class='text-danger'>{{$errors->first('tieude')}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            
                                            <div class="row">
                                                <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                    Chọn tệp… <input type="file" id="imgInp" name="image"  >
                                                                    
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" value="{{$data->hinhbangtin}}" readonly>
                                                        </div>
                                                        <div class="col-md-4 no-padding" style="text-align:center;width:100%;min-height: 300px;background-color:#eee;margin-bottom:15px">                                                                                
                                                        <img id='img-upload'style="max-width:300px" src="{{asset('/upload/tintuc/'.$data->hinhbangtin.'')}}" />                                                            
                                                        </div>
                                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="row">
                                                          
                                                                        <div class="col-md-12">
                                                                                <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                        <label>Hiển thị tin</label><br>
                                                                                                        <input {{ $data->hienthi==1? 'checked':'' }} type="checkbox" class="hienthi" name="hienthi"  value="1"/>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                        <label>Tin nổi bật</label><br>
                                                                                                        <input {{ $data->noibat==1? 'checked':'' }} type="checkbox" class="noibat" name="noibat" value="1"  />
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group">
                                                                                                <label>Chọn danh mục</label>
                                                                                                <select name="danhmuc" class="form-control">
                                                                                                    @foreach($data1 as $val)
                                                                                                        <option {{ $data->danhmuctintuc_id==$val->id? 'selected':'' }} value="{{$val->id}}">{{$val->tendanhmuc}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="save">
                                                                                <button type="submit" class="btn btn-primary" style="width: 100%";>Lưu <i class="fa fa-check"></i></button>
                                                                            </div>
                                                                        </div>
                                                
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <div>
                                                 <textarea name="noidung" id="editor1" cols="30" rows="10">{!!$data->noidung!!}</textarea>
                                                 <p class='text-danger'>{{$errors->first('noidung')}}</p>
                                                 <script>
                                                  var url ="{{url('/')}}";
                                                 
                                                  CKEDITOR.replace( 'editor1', {
                                                        filebrowserBrowseUrl: url+'/cpanel/ckeditor/ckfinder/ckfinder.html',
                                                        filebrowserImageBrowseUrl: url+'/cpanel/ckeditor/ckfinder/ckfinder.html?Type=Images',
                                                        filebrowserUploadUrl: url+'/cpanel/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                        filebrowserImageUploadUrl: url+'/cpanel/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                        filebrowserWindowWidth : '1000',
                                                        filebrowserWindowHeight : '700'
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection