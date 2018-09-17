@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
<div class="row">
	<div class="col-lg-12">
		<a href="{{ route('themtaikhoan') }}" class="btn btn-primary" style="margin-bottom: 15px;">Thêm tài khoản</a>
	</div>
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Danh sách sản phẩm </h5>
                  <div class="ibox-tools">
                      <a class="collapse-link">
                          <i class="fa fa-chevron-up"></i>
                      </a>
                  </div>
              </div>
              <div class="ibox-content">
                  <div class="row">
                      <div class="col-sm-3 m-b-xs">
                      </div>
                      <div class="col-sm-6 m-b-xs">
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group"><input type="text" placeholder="Tìm kiếm tài khoản..." class="input-sm form-control"> <span class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span></div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-sanpham">
                          <thead>
                          <tr>
                              <th class="text-center"><button id="delete_all" class="btn btn-danger"><i class="fa fa-trash"></i></button></th>
                               <th>#</th>
                               <th>Hình ảnh</th>
                              <th>Tài khoản</th>
                              <th>Vai trò </th>  
                              <th class="text-center">Thao tác</th>       
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td class="text-center"><input type="checkbox"   class="i-checks" name="input[]" value=""></td>
                              <td>1</td>
                              <td>
                                  <div class="img">
                                    <img src="" width="100%" alt="">
                                  </div>
                              </td>
                              <td>admin</small></td>
                              <td>Người quản lý</td>
                              <td class="text-center">
                                    <span><a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                                    <span><button class="btn btn-danger"><i class="fa fa-trash"></i></button></span>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center"><input type="checkbox"   class="i-checks" name="input[]" value=""></td>
                              <td>2</td>
                              <td>
                                  <div class="img">
                                    <img src="" width="100%" alt="">
                                  </div>
                              </td>
                              <td>admin</small></td>
                              <td>Người quản lý</td>
                              <td class="text-center">
                                    <span><a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                                    <span><button class="btn btn-danger"><i class="fa fa-trash"></i></button></span>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center"><input type="checkbox"   class="i-checks" name="input[]" value=""></td>
                              <td>3</td>
                              <td>
                                  <div class="img">
                                    <img src="" width="100%" alt="">
                                  </div>
                              </td>
                              <td>admin</small></td>
                              <td>Người quản lý</td>
                              <td class="text-center">
                                    <span><a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                                    <span><button class="btn btn-danger"><i class="fa fa-trash"></i></button></span>
                              </td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
			<div style="display: flex;justify-content: center;">
	          		<ul class="pagination">
	          			<li><a href="#">1</a></li>
	          			<li><a href="#">2</a></li>
	          			<li><a href="#">3</a></li>
	          			<li><a href="#">4</a></li>
	          		</ul>
	          </div>
              </div>
          </div>
      </div>
  </div>
  </div>
@endsection