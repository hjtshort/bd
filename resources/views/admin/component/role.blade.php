@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">

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

                                <form id="formRole" action="" method="post">
                                    @csrf
                                    <input id="hdId" type="hidden" name="id">
                                    <div class="form-group">
                                        <label class="label-control">Tên phân quyền</label>
                                        <input type="text" id="role_name" name="role_name" class="form-control">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Sửa</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Bảng phân quyền </h5>
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
                                    <th>#</th>
                                    <th>Tên quyền</th>
                                    <th>Prefix</th>
                                    <th class="">Thao tác</th>
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
    <script>
        $(function(){
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getDataRoles') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    {data:'role_name',name:'role_name'},
                    { data: 'role_alias', name: 'role_alias' },
                    { data: 'action', name: 'action' },

                ]

            });
            $('#datatable').on('click','.edit',function(){
                $('#hdId').val($(this).attr('data-id'));
                $('#role_name').val($(this).attr('data-name'));
                $('#modalRole').modal('show');
            })
            $('#formRole').on('submit',function(e){
                e.preventDefault();
                var data = $(this).serialize();
                var id = $('#hdId').val();
                $.ajax({
                    url: '{{ url('admin/role') }}/'+id,
                    type: 'PUT',
                    data: data,
                    success: function (response) {
                        if(response.status){
                            mess('success',response.message);
                            $('#modalRole').modal('toggle');
                            $('#datatable').DataTable().ajax.reload();
                        }
                    }
                });
            })
        });
    </script>
@endsection

