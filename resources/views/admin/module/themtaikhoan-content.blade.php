@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
<div class="row">
    <form role="form" action="" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                          <div class="ibox-title">
                                  <h5>Thông tin tài khoản</h5>
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
                                              <label>Tên đăng nhập</label> 
                                              <input name="username" type="text" placeholder="Nhập tên đăng nhập " class="form-control" value="{{old('username')}}">
                                              <p class="text-danger">{{ $errors->first('username') }}</p>
                                          </div>
                                          <div class="form-group">
                                              <label>Mật khẩu</label> 
                                              <input name="password" type="password" placeholder="Nhập vào mật khẩu" class="form-control" value="{{old('password')}}">
                                              <p class="text-danger">{{ $errors->first('password') }}</p>
                                          </div>
                                  </div>
                                  <div class="col-sm-12">
                                      <div class="form-group">
                                            <label>Ảnh đại diện</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file">
                                                        Chọn tệp… <input type="file" id="imgInp" name="image" >
                                                       
                                                        
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                      </div>
                                  </div>
                                  <div class="col-sm-12">
                                        <div class="col-md-4 no-padding" style="text-align:center;width:100%;min-height: 150px;background-color:#eee;margin-bottom:15px">                                                                                
                                            <img id='img-upload'style="max-width:300px"/>                                                            
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
                                                <label>Chọn vai trò</label>
                                                <input id='dd' type="text" name="level" value="{{old('level')}}"/>
                                                <p class="text-danger">{{ $errors->first('level') }}</p>
                                                    <script>
                                                    var cities = new Bloodhound({
                                                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
                                                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                    prefetch: 'assets/cities.json'
                                                    });
                                                    cities.initialize();

                                                    var elt = $('#dd');
                                                    elt.tagsinput({
                                                    itemValue: 'value',
                                                    itemText: 'text',
                                                    typeaheadjs: {
                                                        name: 'cities',
                                                        displayKey: 'text',
                                                        source: cities.ttAdapter()
                                                    }
                                                    });
                                                    function a()
                                                    {
                                                    elt.tagsinput('add', { "value": 1 , "text": "Quản lý sản phẩm"     });
                                                    elt.tagsinput('add', { "value": 2 , "text": "Quản lý bài viết,tin tức"    });
                                                    elt.tagsinput('add', { "value": 3 , "text": "Quản lý đơn hàng"       });
                                                    // elt.tagsinput('add', { "value": 10, "text": "Beijing"      });
                                                    // elt.tagsinput('add', { "value": 13, "text": "Cairo"        });
                                                    }
                                                    a()
                                                
                                                    </script>
                                                                    
                                        </div>
                                        <div class="form-group">
                                            <button type="button" id="reset"class="btn btn-primary" style="width: 100%">Reset <i class="fa fa-refresh"></i></button>
                                        </div>
                          </div>
                    </div>
                    <div class="save">
                            <button type="submit" class="btn btn-primary" style="width: 100%">Thêm <i class="fa fa-check"></i></button>
                    </div>
              </div>
        </div>
    </form>
</div>
</div>
<script>
        $('#reset').click(function (e) { 
        
        $("#dd").tagsinput('removeAll')
        a()
    }); 
</script>
@endsection