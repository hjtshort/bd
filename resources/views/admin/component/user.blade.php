@extends('admin.admin-master')
@section('content')

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách tài khoản quản trị </h5>
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
                                    <th>avatar</th>
                                    <th>Email</th>
                                    <th>Họ tên</th>
                                    <th>Đt</th>
                                    <th>Địa chỉ</th>
                                    <th class="text-center">Thao tác</th>
                                    <th>Xóa</th>
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
    <div id="modalRole" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật tên</h4>
                </div>
                <div class="modal-body">
                    <div id="mess_error2">

                    </div>
                    <form id="form_role">
                        @csrf
                        <input type="hidden" name="id" id="hdId">
                        <ul id="ul_role" class="todo-list m-t small-list ui-sortable">
                            @forelse($role as $key=>$value)
                                <li>
                                    <div><label>
                                            <input name="role_alias[]"  type="checkbox" value="{{ $value->role_alias }}">
                                            {{ $value->role_name }}
                                        </label>
                                    </div>


                                </li>
                            @empty
                            @endforelse
                        </ul>
                        <div align="right">
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </div>

                    </form>
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
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getDataUser') }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'email', name: 'email'},
                    {data: 'name', name: 'name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action'},
                    {data: 'delete', name: 'delete'},
                ]

            });
            $('#datatable').on('click', '.role', function () {
                let id = $(this).attr('data-id');
                let role = $(this).attr('data-role');
                if(role!=''){
                    let objRole = JSON.parse(role);
                    objRole.forEach((value,key)=>{
                        $(`:checkbox[value='${value}']`).prop("checked","true");
                    });
                }
                $('#hdId').val(id);
                $('#modalRole').modal('show');
            });
            $('.choose').click('fucntion', function () {

            });
            $('#datatable').on('click', '.delete', function () {
                let id = $(this).val();
                var action = '';
                if ($(this).is(':checked')) {
                    action = 1;
                } else {
                    action = 0;
                }
                $.ajax({
                    url: '{{ route('deleteUser') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        action: action,
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            mess('success', response.message)
                            $('#datatable').DataTable().ajax.reload();
                        } else {
                            mess('error', response.message)
                        }
                    }
                });
            })
            $('#form_role').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('postSetRole') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        if(response.status){
                            mess('success',response.message);

                        }
                    }
                });
            })
        })

    </script>

@endsection
