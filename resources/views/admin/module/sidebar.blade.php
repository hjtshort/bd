<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" style="width:70px;height:70px;" src="{{asset('/upload/avatar/'.Auth::guard('admin')->user()->image.'')}}" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> 
                             </span> <span class="text-muted text-xs block"><strong class="font-bold">{{ Auth::guard('admin')->user()->username }}</strong> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                            </ul>
                        </div>
                
                <div class="logo-element">
                    Admin
                </div>
            </li>
            <?php $check=json_decode(Auth::guard('admin')->user()->level); ?>
            <!-- li -->
            <li @if(Request::segment(2)=='dashboard')
                    class='active'
                @endif>
                <a href="{{ route('admin/dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Bảng điều khiển</span></a>
            </li>
            <!-- li -->
            <!-- li -->
            @if(array_search('3',$check)>-1)
            <li @if(Request::segment(2)=='quan-ly-hoa-don')
                 class='active'
                @endif>
                <a href="{{ route('quanlyhoadon') }}"><i class="fa fa-list"></i> <span class="nav-label">Quản lý hóa đơn</span></a>
            </li>
            @endif
            <!-- li -->
            <!-- li -->
            @if(array_search('1',$check)>-1)
            <li @if(Request::segment(2)=='san-pham') class="active" @endif>
                <a href="#"><i class="fa fa-gift"></i> <span class="nav-label">Sản phẩm</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Request::segment(3)=='danh-sach-san-pham') class="active" @endif><a href="{{ route('danhsachsanpham') }}">Danh sách sản phẩm</a></li>
                    <li @if(Request::segment(3)=='danh-muc-san-pham') class="active" @endif><a href="{{ route('danhmucsanpham') }}">Danh mục sản phẩm</a></li>
                </ul>
            </li>
            @endif
            <!-- li -->
            <!-- li -->
            @if(array_search('2',$check)>-1)
            <li @if(Request::segment(2)=='tin-tuc') class="active" @endif>
                <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Nội dung</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li  @if(Request::segment(3)=='danh-sach-tin-tuc') class="active" @endif><a href="{{ route('danhsachtintuc') }}">Quản lý tin tức</a></li>
                    <li @if(Request::segment(3)=='danh-muc-tin-tuc') class="active" @endif><a href="{{route('danhmuctintuc')}}">Quản lý danh mục tin tức</a></li>
                </ul>
            </li>
            @endif
            <!-- li -->
            <!-- li -->
            <li>
                <a href="#"><i class="fa fa-image"></i> <span class="nav-label">Quản lý Slider</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Request::segment(2)=='quan-ly-slider' && Request::segment(3)==1) class="active" @endif><a href="{{{ route('quanlislider',1) }}}">Slider 1</a></li>
                    <li @if(Request::segment(2)=='quan-ly-slider' && Request::segment(3)==2) class="active" @endif><a href="{{{ route('quanlislider',2) }}}">Slider 2</a></li>
                    <li @if(Request::segment(2)=='quan-ly-slider' && Request::segment(3)==3) class="active" @endif><a href="{{{ route('quanlislider',3) }}}">Slider 3</a></li>
                </ul>
            </li>
            <!-- li -->
            <!-- li -->
            @if(array_search('0',$check)>-1)
            <li @if(Request::segment(2)=='quan-ly-tai-khoan')
                 class='active'
                @endif>
                <a href="{{ route('quanlytaikhoan') }}"><i class="fa fa-user"></i> <span class="nav-label">Quản lý tài khoản</span></a>
            </li>
            @endif
            <!-- li -->
        </ul>

    </div>
</nav>