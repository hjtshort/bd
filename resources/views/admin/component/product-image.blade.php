@extends('admin.admin-master')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách hình ảnh </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-6">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Hình ảnh</label>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                                  <span class="input-group-btn">
                                                                      <span class="btn btn-primary btn-file">
                                                                          Chọn tệp… <input type="file" id="imgInp"
                                                                                           name="image" value="">

                                                                      </span>
                                                                  </span>
                                                <input type="text" class="form-control" value="" readonly>


                                            </div>
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                        </div>
                        <div class="col-sm-6">
                            <img id='img-upload'/>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Hình ảnh</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-user">
                                                <li><a href="#">Config option 1</a>
                                                </li>
                                                <li><a href="#">Config option 2</a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            @forelse($image as $key=>$value)
                                                <div class="col-md-4">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-right">
                                                            <button onclick="del_img({{ $id }},'{{ $value }}')" class="btn btn-danger">x</button>
                                                        </div>
                                                        <div class="panel-body">
                                                            <img style="width: 100%" src="{{ asset('/upload/'.$value) }}"
                                                                 alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                            @empty
                                                <h1>Chưa có ảnh</h1>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('message'))
        <script>
            mess('success', 'Thêm thành công!')
        </script>
    @endif
    <script>
        function del_img(id,img)
        {
            $.ajax({
                url: '{{ route('deleteImage') }}',
                type: 'POST',
                data: {
                    'id':id,
                    'img':img,
                    '_token':'{{ csrf_token() }}'
                },
                success: function (response) {
                    if(response=='success'){
                        location.reload()
                    }else{
                        console.log(response)
                    }
                }
            })
        }
    </script>
@endsection

