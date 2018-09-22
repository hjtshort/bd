@extends('admin.admin-master')
@section('content')
<div class="wrapper wrapper-content">
<div class="row">
	<div class="col-lg-12">
    <a class="btn btn-primary" style="margin-bottom: 15px;" href="{{route('themdanhmuc')}}">Thêm danh mục sản phẩm <i class="fa fa-plus"></i></a>
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
                      </div>
                      <div class="col-sm-4 m-b-xs">
                       
                      </div>
                      <div class="col-sm-3">
                          <div class="input-group"><input type="text" id="search" placeholder="Tìm kiếm sản phẩm..." class="input-sm form-control"> <span class="input-group-btn">
                              <button type="button" id="btn-search" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span></div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-sanpham">
                          <thead>
                          <tr>
                              <th class="text-center"><button id="delete_all" class="btn btn-danger"><i class="fa fa-trash"></i></button></th>
                               <th>#</th>
                              <th>Tên danh mục</th>
                              <th>Số sản phẩm </th>  
                              <th class="text-center">Thao tác</th>       
                          </tr>
                          </thead>
                          <tbody>
                              <?php $stt=0; ?>
                              @foreach($data as $val)
                              <?php $stt++; ?>
                          <tr>
                              
                              <td class="text-center"><input type="checkbox"   class="i-checks" name="input[]" value="{{$val->id}}"></td>
                              <td>{{$stt}}</td>
                              <td>{{$val->tendanhmuc}}</small></td>
                              <td>{{$val->sl}}</td>
                              <td class="text-center">
                                    <span><a href="{{route('editdanhmuc',$val->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                                    <span><button class="btn btn-danger"><i class="fa fa-trash"></i></button></span>
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
  @if(Session::has('message'))
     <script>
        Command: toastr["success"]("{{ Session::get('message') }}")

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
  @if(Session::has('message_update'))
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
<script>
$('.btn-danger').click(function (e) { 
    var id =$(this).closest('tr').find('input:checkbox').val()
    bootbox.confirm("Bạn có muốn xóa danh mục. Nếu xóa sản phẩm thuộc danh mục sẽ mất?", function(result){ 
       
       if(result)
        {
            
            $.ajax({
                type: "post",
                url: "{{route('deletedm')}}",
                data: {
                    "_token":"{{ csrf_token() }}",
                    "id":id
                },
                success: function (response) {
                    if(response=='ok')
                        location.reload()
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
        bootbox.confirm("Bạn có muốn xóa danh mục. Nếu xóa sản phẩm thuộc danh mục sẽ mất?", function(result){ 
            if(result)
            {
                $.ajax({
                    type: "post",
                    url: "{{route('deletedm_all')}}",
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
  </script>
  @endsection