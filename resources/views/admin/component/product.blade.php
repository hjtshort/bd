@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('createProduct') }}" class="btn btn-primary" style="margin-bottom: 15px">Thêm sản phẩm <i class="fa fa-plus"></i></a>
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
                                <select id='sl-dm' name='danhmuc' class="input-sm form-control input-s-sm inline">
                                    <option value=''>--Chọn danh mục sản phẩm</option>

                                    <option selected value=""></option>

                                </select>
                            </div>
                            <div class="col-sm-6 m-b-xs">
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group"><input id="search" type="text"
                                                                placeholder="Tìm kiếm sản phẩm..."
                                                                class="input-sm form-control"> <span
                                            class="input-group-btn">
                              <button id="btn-search" type="button" class="btn btn-sm btn-primary"><i
                                          class="fa fa-search"></i></button> </span></div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sanpham">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Địa chỉ</th>
                                    <th>Alias</th>
                                    <th>Giá</th>
                                    <th>Diện tích</th>
                                    <th>Chi tiết</th>
                                    <th>Hình ảnh</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 0; ?>
                                @forelse($product as $key=>$val)
                                    <?php $stt++ ?>
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $val->product_title }}</td>
                                        <td>{{ $val->product_address }}</td>
                                        <td>{{ $val->product_alias }}</td>
                                        <td>{{ number_format($val->product_price) }}</td>
                                        <td>{{ number_format($val->product_acreage) }}</td>
                                        <td><button class="btn btn-success">Xem</button></td>
                                        <td>
                                            <a href="{{ route('image',$val->id) }}"> <img width="40" src="{{ asset('/upload/folder_up.png') }}"
                                                             alt=""></a>

                                        </td>
                                        <td class="text-center">
                                            <span><button class="btn btn-primary"><i
                                                            class="fa fa-eye"></i></button></span>
                                            <span><a class="btn btn-warning" href="{{ route('editProduct',$val->id) }}"><i
                                                            class="fa fa-edit"></i></a></span>
                                            <span><button onclick="del({{ $val->id }})" class="btn btn-danger delete"><i
                                                            class="fa fa-trash"></i></button></span>
                                        </td>
                                    </tr>
                                @empty
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
    @if(Session::has('message'))
        <script>
            mess('success', 'Chỉnh sửa thành công!')
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

        function del(id)
        {
            var token = $('meta[name=csrf-token]').attr("content");
            bootbox.confirm("Bạn có muốn xóa các sản phẩm đã chọn!", function (result) {
                if (result) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('deleteProduct') }}",
                        data: {
                            "id": id,
                            '_token': token
                        },
                        success: function (response) {
                            if (response == 'ok') {
                                location.reload()
                            }else{
                                console.log(response)
                            }
                        }
                    });
                }
            });
        }
    </script>

@endsection

