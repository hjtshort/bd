@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('createProduct') }}" class="btn btn-primary" style="margin-bottom: 15px">Thêm sản phẩm
                    <i class="fa fa-plus"></i></a>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách bất động sản </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-sanpham">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tiêu đề</th>
                                    <th>Địa chỉ</th>
                                    <th>Alias</th>
                                    <th>Giá</th>
                                    <th>Diện tích</th>
                                    <th>Hình ảnh</th>
                                    <th class="text-center">Thao tác</th>
                                    <th>Ẩn</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('message'))
        <script>
            mess('success', '{{ Session::get('message') }}')
        </script>
    @endif
    @if(Session::has('flash_message'))
        <script>
            Command: toastr["success"]('{{ Session::get('flash_message') }}')

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
        $(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getDataProduct') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    {data:'product_title',name:'product_title'},
                    { data: 'product_slug', name: 'product_slug' },
                    { data: 'product_address', name: 'product_address' },
                    { data: 'product_price', name: 'product_price' },
                    { data: 'product_acreage', name: 'product_acreage' },
                    { data: 'image', name: 'image' },
                    { data: 'action', name: 'action' },
                    { data: 'delete', name: 'delete' },
                ]

            });
            $('#datatable').on('click','.delete',function(){
                let id = $(this).val();
                var action = '';
                if($(this).is(':checked')){
                    action = 1;
                }else{
                    action = 0;
                }
                $.ajax({
                    url: '{{ route('deleteProduct') }}',
                    type: 'POST',
                    data: {
                        _token:'{{ csrf_token() }}',
                        id:id,
                        action:action,
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status){
                            mess('success',response.message)
                            $('#datatable').DataTable().ajax.reload();
                        }else{
                            mess('error',response.message)
                        }
                    }
                });
            })
        })

    </script>

@endsection
