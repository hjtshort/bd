@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnShowThanhPho" class="btn btn-primary" style="margin-bottom: 15px">Thêm thành phố <i
                        class="fa fa-plus"></i></button>
                <div id="modalThanhPho" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thêm thành phố</h4>
                            </div>
                            <div class="modal-body">
                                <div id="mess_error">

                                </div>

                                <form id="myForm" action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label-control">Tên thành phố</label>
                                        <input type="text" id="city_name" name="city_name" class="form-control"
                                               onblur="getSlug('city_name','city_alias')">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Alias</label>
                                        <input type="text" id="city_alias" name="city_alias" class="form-control">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modalThanhPho_Edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Sửa thành phố</h4>
                            </div>
                            <div class="modal-body">
                                <div id="mess_error2">

                                </div>

                                <form id="myForm2" action="" method="post">
                                    @csrf
                                    <input id="hdIdCity" type="hidden" name="id">
                                    <div class="form-group">
                                        <label class="label-control">Tên thành phố</label>
                                        <input type="text" id="edit_city_name" name="city_name" class="form-control"
                                        onblur="getSlug('edit_city_name','edit_city_alias')">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Alias</label>
                                        <input type="text" id="edit_city_alias" name="city_alias" class="form-control">
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
                        <h5>Danh sách thành phố </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-3 m-b-xs">--}}

                            {{--</div>--}}
                            {{--<div class="col-sm-6 m-b-xs">--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-3">--}}
                                {{--<form action="" method="get">--}}
                                {{--<div class="input-group"><input id="search" type="text" name="search" placeholder="Tìm kiếm ..."--}}
                                                                {{--class="input-sm form-control"> <span--}}
                                        {{--class="input-group-btn">--}}
                              {{--<button id="btn-search" type="submit" class="btn btn-sm btn-primary"><i--}}
                                      {{--class="fa fa-search"></i></button> </span></div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-sanpham">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thành phố</th>
                                    <th>Alias</th>
                                    <th class="">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                        {{--<div style="display: flex;justify-content: center;">--}}
                            {{--<ul class="pagination">--}}
                                {{--{{ $city->links() }}--}}
                            {{--</ul>--}}
                        {{--</div>--}}
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
                ajax: '{{ route('getCity') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    {data:'city_name',name:'city_name'},
                    { data: 'city_alias', name: 'city_alias' },
                    { data: 'action', name: 'action' },

                ]

            });
        $('#datatable').on('click','.delete',function(){
            var id = $(this).attr('data-id');
            bootbox.confirm({
                size: "small",
                message: "Bạn có muốn xóa?",
                callback: function(result){
                    if(result){
                        $.ajax({
                            url: '{{ route('deleteCity') }}',
                            type: 'POST',
                            data: {
                                '_token':'{{ csrf_token() }}',
                                'id':id
                            },
                            success: function (response) {
                                if(response.status){
                                    mess('success',response.message);
                                    $('#datatable').DataTable().ajax.reload();
                                }
                            }
                        })
                    }
                }
            })
        })
            $('#datatable').on('click','.edit',function(){
                $.ajax({
                    url: '{{ route('getInfoCity') }}',
                    type: 'POST',
                    data: {
                        id:$(this).attr('data-id'),
                        _token:'{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#hdIdCity').val(response.id);
                        $('#edit_city_name').val(response.city_name);
                        $('#edit_city_alias').val(response.city_alias);
                        $('#modalThanhPho_Edit').modal('show');
                    }
                });
            })

        });
        $('#btnShowThanhPho').click(function () {
            $('#modalThanhPho').modal('show')
        })
        $('#myForm').on('submit', function (event) {
            event.preventDefault();
            $('#mess_error').empty()
            var data = $('#myForm').serialize()
            $.ajax({
                url: '{{ route('createCity') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    if(response.status){
                        mess('success',response.message)
                        $('#datatable').DataTable().ajax.reload();
                        $('#modalThanhPho').modal('toggle')
                    }
                }
            })
        })
        $('#myForm2').on('submit', function (event) {
            event.preventDefault()
            var data = $(this).serialize()
            console.log(data);
            $('#mess_error2').empty()
            $.ajax({
                url: '{{ route('updateCity') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    console.log(response);

                    if(response.valid){
                        if (response.status) {
                            $('#datatable').DataTable().ajax.reload();
                            mess('success',response.message)
                            $('#modalThanhPho_Edit').modal('toggle')
                        } else {
                            mess('error', response.message)
                        }
                    }else{
                        $('#mess_error2').append(`<div class="alert alert-danger">${response.message}</div>`)
                    }
                }
            })

        })

    </script>
@endsection

