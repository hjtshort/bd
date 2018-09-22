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
                                        <input type="text" name="city_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Alias</label>
                                        <input type="text" name="city_alias" class="form-control">
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
                                    <input type="hidden" name="id">
                                    <div class="form-group">
                                        <label class="label-control">Tên thành phố</label>
                                        <input type="text" name="city_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Alias</label>
                                        <input type="text" name="city_alias" class="form-control">
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
                        <div class="row">
                            <div class="col-sm-3 m-b-xs">

                            </div>
                            <div class="col-sm-6 m-b-xs">
                            </div>
                            <div class="col-sm-3">
                                <form action="" method="get">
                                <div class="input-group"><input id="search" type="text" name="search" placeholder="Tìm kiếm ..."
                                                                class="input-sm form-control"> <span
                                        class="input-group-btn">
                              <button id="btn-search" type="submit" class="btn btn-sm btn-primary"><i
                                      class="fa fa-search"></i></button> </span></div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sanpham">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thành phố</th>
                                    <th>Alias</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 0; ?>
                                @forelse($city as $key=>$value)
                                    <?php $stt++; ?>
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $value->city_name }}</td>
                                        <td>
                                            {{ $value->city_alias }}
                                        </td>

                                        <td class="text-center">
                                            {{--<span><button class="btn btn-primary"><i class="fa fa-eye"></i></button></span>--}}
                                            <span><button class="btn btn-warning"
                                                          onclick="Edit('{{ $value->id }}','{{ $value->city_name }}','{{ $value->city_alias }}')">Sửa</button></span>
                                            <span><button class="btn btn-danger delete" onclick="del({{ $value->id }})">Xóa</button></span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Not Found</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <ul class="pagination">
                                {{ $city->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
                    if (response == 'success') {
                        location.reload();
                    } else if (response == 'error') {
                        Command: toastr["error"]("Server Error!")

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
                    } else {
                        $('#mess_error').append(`<div class="alert alert-danger">${response}</div>`)
                    }
                }
            })
        })
        $('#myForm2').on('submit', function (event) {
            event.preventDefault()
            var data = $(this).serialize()
            $('#mess_error2').empty()
            $.ajax({
                url: '{{ route('updateCity') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response == 'success') {
                        location.reload();
                    } else if (response == 'error') {
                        mess('error', 'Server error!')

                    } else {
                        $('#mess_error2').append(`<div class="alert alert-danger">${response}</div>`)
                    }
                }
            })

        })

        function Edit(id, name, alias) {
            $('#myForm2').find('input[name=id]').val(id);
            $('#myForm2').find('input[name=city_name]').val(name);
            $('#myForm2').find('input[name=city_alias]').val(alias);
            $('#modalThanhPho_Edit').modal('show')

        }
        function del(id)
        {
            bootbox.confirm({
                size: "small",
                message: "Are you sure?",
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
                                if(response=='success'){
                                    location.reload()
                                }else{
                                    mess('error','Server error,Try again!')
                                }
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection

