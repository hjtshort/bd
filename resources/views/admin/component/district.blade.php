@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <button id="btnShowThanhPho" class="btn btn-primary" style="margin-bottom: 15px">Thêm quận/huyện <i
                            class="fa fa-plus"></i></button>
                <div id="modalThanhPho" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thêm quận/huyện</h4>
                            </div>
                            <div class="modal-body">
                                <div id="mess_error">

                                </div>

                                <form id="myForm" action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label-control">Thành phố</label>
                                        <select name="city_id" class="form-control" id="select1">
                                            @forelse($city as $key=>$val)
                                                <option value="{{ $val->id }}">{{ $val->city_name }}</option>
                                            @empty
                                                <option value="">Chưa có thành phố</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Tên quận/huyên</label>
                                        <input type="text" name="district_name" class="form-control">
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
                                        <label class="label-control">Thành phố</label>
                                        <select name="city_id" class="form-control" id="select2">
                                            @forelse($city as $key=>$val)
                                                <option value="{{ $val->id }}">{{ $val->city_name }}</option>
                                            @empty
                                                <option value="">Chưa có thành phố</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control">Quận/huyện</label>
                                        <input type="text" name="district_name" class="form-control">
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
                            <form id="search_form" action="" method="get">
                            <div class="col-sm-3 m-b-xs">
                                <select id='sl-dm' name='city' class="input-sm form-control input-s-sm inline">
                                    <option value='' selected >--Chọn thành phố</option>
                                    @forelse($city as $key=>$val)
                                    <option @if($val->id==$selectValue) selected  @endif value="{{ $val->id }}">{{ $val->city_name }}</option>
                                        @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-6 m-b-xs">
                            </div>
                            <div class="col-sm-3">

                                    <div class="input-group"><input id="search" type="text" name="search"
                                                                    placeholder="Tìm kiếm ..."
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
                                    <th>Quận huyện</th>
                                    <th>Tên thành phố</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 0; ?>
                                @forelse($district as $key=>$val)
                                    <?php $stt++; ?>
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $val->district_name }}</td>
                                        <td>
                                            {{ $val->getCity->city_name }}
                                        </td>

                                        <td class="text-center">

                                            <span><button class="btn btn-warning"
                                                          onclick="Edit('{{ $val->id }}','{{ $val->district_name }}',{{ $val->getCity->id }})">Sửa</button></span>
                                            <span><button class="btn btn-danger delete"
                                                          onclick="del({{ $val->id }})">Xóa</button></span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Không có dữ liệu</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <ul class="pagination">

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
                url: '{{ route('createDistrict') }}',
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response == 'success') {
                        location.reload();
                    } else if (response == 'error') {
                        mess('error', 'Server error!')
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
                url: '{{ route('updateDistrict') }}',
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

        function Edit(id, name, city) {
            $('#myForm2').find('input[name=id]').val(id);
            $('#myForm2').find('input[name=district_name]').val(name);
            $('#select2  option[value="' + city + '"]').prop("selected", true);

            $('#modalThanhPho_Edit').modal('show')

        }

        function del(id) {
            bootbox.confirm({
                size: "small",
                message: "Are you sure?",
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url: '{{ route('deleteDistrict') }}',
                            type: 'POST',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'id': id
                            },
                            success: function (response) {
                                if (response == 'success') {
                                    location.reload()
                                } else {
                                    mess('error', 'Server error,Try again!')
                                }
                            }
                        })
                    }
                }
            })
        }
        $('#sl-dm').change(function(){
            $('#search_form').submit()
        })
    </script>
@endsection

