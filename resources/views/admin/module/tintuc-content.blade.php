@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
<div class="row">
	<div class="col-lg-12">
        <a href="{{route('themtintuc')}}" style="margin-bottom: 15px;"  class="btn btn-primary">Thêm tin tức <i class="fa fa-plus"></i></a>
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
                      <div class="col-sm-5 m-b-xs">
                          <select id="danhmuc" class="input-sm form-control input-s-sm inline">
                          <option @if(!isset($_GET['danhmuc'])) selected @endif value="">--Chọn danh mục--</option>
                          @foreach($danhmuc as $l)
                          <option @if(isset($_GET['danhmuc']) && $_GET['danhmuc']==$l->id) selected @endif value="{{$l->id}}">{{$l->tendanhmuc}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="col-sm-4 m-b-xs">
                     
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group"><input type="text" id="search" placeholder="Tìm kiếm sản phẩm..." class="input-sm form-control"> <span class="input-group-btn">
                              <button id="btn-search" type="button" btn-search class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span></div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-sanpham">
                          <thead>
                          <tr>
                              <th class="text-center"><span><button id="delete_all" class="btn btn-danger"><i class="fa fa-trash"></i></button></span></th>
                              <th>#</th>
                              <th>Tiêu đề</th>
                              <th>Ảnh hiển thị</th>
                              <th>Danh mục tin tức </th> 
                              <th>Ngày đăng</th>
                              <th>Trạng thái</th>
                              <th>Thao tác</th>           
                          </tr>
                          </thead>
                          <tbody>
                            <?php $stt=0; ?>
                            @foreach($data as $value)
                            <?php $stt++; ?>
                          <tr>
                              <td class="text-center"><input type="checkbox"  class="i-checks" name="input[]" value="{{$value->id}}"></td>
                              <td>{{$stt}}</td>
                              <td>{{$value->tieude}}</td>
                              <td>
                                  <div class="img">
                                    <img src="{{ asset('/upload/tintuc/'.$value->hinhbangtin.'') }}" width="100%" alt="">
                                  </div>
                              </td>
                              <td>{{$value->tendanhmuc}}</td>
                              <td>{{substr($value->created_at,0,strpos($value->created_at,' '))}}</td>
                              <td>{{$value->hienthi==1? 'Hiện':'Ẩn' }}</td>
                              <td class="text-center">
                                    <span><a  class="btn btn-warning delete" href="{{route('edittintuc',$value->id)}}"><i class="fa fa-edit"></i></a></span>
                                    <span><button class="btn btn-danger delete"><i class="fa fa-trash"></i></button></span>
                              </td>
                          </tr>
                          @endforeach
                          
                          </tbody>
                      </table>
                  </div>
			<div style="display: flex;justify-content: center;">
	          		<ul class="pagination">
	          			{{$data->links()}}
	          		</ul>
	          </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  @if(\Session::has('message'))
  <script>
      mess('success','Thêm tin tức thành công!')
  </script>
  @endif
  @if(\Session::has('edit_message'))
  <script>
      mess('success','Chỉnh sửa thành công!')
  </script>
  @endif
  <script>
     $('#danhmuc').on('change', function () {
            var url=window.location.pathname;
           if(this.value!='')
           {
              
                location.href=url+'?danhmuc='+this.value
           }
           else 
           {
                location.href=url 
           }
        })
        $('#btn-search').click(function (e) { 
            var url=window.location.pathname;
            var search=$('#search').val()
            if(search!='')
            {
                location.href=url+'?search='+search
            }
            else
            {
                location.href=url
            }          
        });
  $('.delete').click(function (e) { 
    var id=$(this).closest('tr').find('input:checkbox').val();  
    var token= $('meta[name=csrf-token]').attr("content");
    bootbox.confirm("Bạn có muốn xóa các sản phẩm đã chọn!", function(result){ 
        if(result)
        {
            $.ajax({
                type: "post",
                url: "{{route('deltintuc')}}",
                data: {
                    "id":id,
                    '_token': token
                },
                success: function (response) {
                    if(response=='ok')
                    {
                        location.reload()
                    }
                }
            });
        }
    });
     
 });

 $('#delete_all').click(function(e){
     var token = $('meta[name=csrf-token]').attr("content");
     var id = [];
     $(".i-checks:checked").each(function(){
         id.push($(this).val());
     })

     if(id.length > 0){
        bootbox.confirm("Bạn có muốn xóa các sản phẩm đã chọn!", function(result){ 
            if(result)
            {
                $.ajax({
                    type: "post",
                    url: "{{route('deltintuc_all')}}",
                    data: {
                        "id":id,
                        '_token': token
                    },
                    success: function (response) {
                        if(response=='ok')
                        {
                            location.reload()
                        }
                    }
                });
            }
            else
            {
                $(".i-checks:checked").each(function(){
                    $(this).prop('checked',false).iCheck('update')
                })
            }
    
        });
        
     }
     
 });
  </script>
  @endsection
