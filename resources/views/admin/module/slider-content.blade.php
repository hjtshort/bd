@extends('admin.admin-master')
@section('content')

<div class="wrapper wrapper-content">
        <div class="row">
        <form role="form" method="post" action="" enctype='multipart/form-data'>
        <input name="_token"  type="hidden" class="form-control" placeholder="Username"  value="{!! csrf_token() !!}" >
                <div class="col-lg-8">
                      <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                    <h5>Cấu hình Slider {{$slide->id}}</h5>
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
                                                <label>Tiêu đề Slider</label> 
                                                <input type="text" placeholder="Nhập tiêu đề" class="form-control" name="tieude" value="{{$slide->noidung}}">
                                                <label class="text-danger">{{ $errors->first('tieude') }}</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Link bài viết:</label> 
                                                <input type="text" placeholder="Chọn link bài viết" class="form-control" name="link"  value="{{$slide->link}}">
                                                <label class="text-danger">{{ $errors->first('link') }}</label>
                                            </div>
                                            <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="input-group">
                                                                      <span class="input-group-btn">
                                                                          <span class="btn btn-primary btn-file">
                                                                              Chọn tệp… <input type="file" id="imgInp" name="image" value="{{$slide->hinhnen}}" >
                                                                             
                                                                          </span>
                                                                      </span>
                                                                      <input type="text" class="form-control" value="{{$slide->hinhnen}}" readonly>
                                                                     
                                                                  </div>
                                                                  <label class="text-danger">{{ $errors->first('image') }}</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                    @if(!empty($slide->hinhnen))
                                                                    <img id='img-upload' src="{{asset('upload/slider/'.$slide->hinhnen)}}"/>
                                                                    @else
                                                                    <img id='img-upload'/>
                                                                    @endif
                                                            </div>
                                                    </div>
                                                    
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
                                                  <label>Hiện/ Ẩn</label>
                                                  <select class="form-control" name="status">
                                                  @if($slide->status == 1)
                                                  <option value="1" selected>Hiện</option>
                                                  <option value="0" >Ẩn</option>
                                                @else
                                                <option value="0" selected>Ẩn</option>
                                                <option value="1" >Hiện</option>
                                                
                                                  @endif
                                                  </select>
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
@endsection