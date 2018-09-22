@extends('admin.admin-master')
@section('content')

<div class="wrapper wrapper-content">
<div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Danh sách đơn hàng</h5>
                  <div class="ibox-tools">
                      <a class="collapse-link">
                          <i class="fa fa-chevron-up"></i>
                      </a>
                  </div>
              </div>
              <div class="ibox-content">
                  <div class="row">
                    
                    
                      <div class="col-sm-3 pull-right">
                          <div class="input-group"><input type="text" id="search" placeholder="Tìm kiếm đơn hàng..." class="input-sm form-control"> <span class="input-group-btn">
                              <button id="btn-search" type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button> </span></div>
                      </div>
                  </div>
                  <div class="table-responsive">
                      <table class="table table-striped table-sanpham">
                          <thead>
                          <tr>
                              <th class='text-center'><span><button id="delete_all" class="btn btn-danger"><i class="fa fa-trash"></i></button></span></th>
                              <th>#</th>
                             
                              <th>Khách hàng</th>
                              <th>Ngày đặt</th>
                              <th>Ngày giao</th>
                              <th>Địa chỉ</th>
                              <th>Trạng thái</th>
                              <th>Tin nhắn</th>     
                              <th>Tổng</th>   
                              <th class="text-center">Thao tác</th>                 
                          </tr>
                          </thead>
                          <tbody>
                         
                          @foreach($data as $index => $value)
                          <tr>
                            <td class='text-center'><input type="checkbox" class="i-checks" name="id" value="{{$value->id}}"></td>
                              <td>{{ $index }}</td>
                        
                              <td><a href="{{ route('chitiethoadon',$value->id) }}">{{$value->ten}}</a></td>
                              <td>{{ date('d-m-Y',strtotime($value->ngaydat))}}</td>
                              <td>{{ date('d-m-Y',strtotime($value->ngaygiao))}}</td>
                              <td>{{ $value->diachi }}</td>
                              <td>
                                    <select name="" class="status" class="form-control">
                                          <option value="2" {{ $value->trangthai ==2 ? 'selected':'' }}>Đã hủy</option>
                                          <option  value="1" {{ $value->trangthai == 1 ? 'selected':'' }}>Đã xử lý</option>
                                          <option value="0" {{ $value->trangthai == 0 ? 'selected':'' }}>Chưa xử lý</option>
                                    </select>
                              </td>
                              <td>{{ $value->tinnhan }}</td>
                              <td>{{ number_format($value->tongtien) }} đ</td>
                              <td class="text-center">
                                    <!-- <span><a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a></span> -->
                                    <span><button class="btn btn-danger delete"><i class="fa fa-trash"></i></button></span>
                              </td>
                          </tr>
                          @endforeach
                      
                          </tbody>
                      </table>
                  </div>
            <div style="display: flex;justify-content: center;">
                  {{ $data->links() }}
              </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  <script>
  $('.status').on('change', function(e){
    var id=$(this).closest('tr').find('input[name=id]').val()
    var status=$(this).val()
   $.ajax({
       type: "post",
       url: "{{route('changestatus')}}",
       data: {
           "id":id,
           "status":status,
           "_token":"{{ csrf_token() }}"

       },
       success: function (response) {
          if(response=='ok')
            location.reload()
       }
   });
});
  $(document).keypress(function(e) {
    if(e.which == 13) {
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
    }
});
$('.delete').click(function (e) { 
    var id =$(this).closest('tr').find('input:checkbox').val()
    bootbox.confirm("Bạn có muốn xóa đơn hàng không ?", function(result){ 
       
       if(result)
        {
            
            $.ajax({
                type: "post",
                url: "{{route('delete_donhang')}}",
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
    $('#delete_all').click(function(e){
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
                    url: "{{route('deletedonhangall')}}",
                    data: {
                        "id":id,
                        '_token':'{{csrf_token()}}'
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
<!-- end: Content -->