<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" style="width:70px;height:70px;"
                                 src="{{asset('upload/avatar/'.Auth::user()->avatar)}}"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">
                             </span> <span class="text-muted text-xs block"><strong
                                        class="font-bold">{{ Auth::user()->name }}</strong> <b
                                        class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Profile</a><    /li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>

                <div class="logo-element">
                    Admin
                </div>
            </li>

            <!-- li -->
            <li @if(Request::segment(1)=='admin' && Request::segment(2)=='') class="active" @endif>
                <a href="{{ route('index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Bảng điều khiển</span></a>
            </li>
            <!-- li -->
            <!-- li -->

            <li
                @if(Request::segment(3)=='city')
                class='active'
                @endif
            >

                <a href="{{ route('city') }}"><i class="fa fa-list"></i> <span class="nav-label">Thành phố</span></a>
            </li>
            <li
                @if(Request::segment(3)=='district')
                class='active'
                @endif
            >

                <a href="{{ route('district') }}"><i class="fa fa-list"></i> <span class="nav-label">Quận/Huyện</span></a>
            </li>

            <!-- li -->
            <!-- li -->
            <li   @if(Request::segment(2)=='product')
                  class='active'
                    @endif
            >
                <a href="{{ route('product') }}"><i class="fa fa-gift"></i> <span class="nav-label">Sản phẩm</span></a>
            </li>

            <li @if(Request::segment(2)=='user') class="active" @endif>
                <a href="#"><i class="fa fa-gift">

                    </i> <span class="nav-label">Tài khoản quản trị</span>
                    <span
                        class="fa arrow">

                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="@if(Request::segment(2)=='user' && Request::segment(3)=='' ) class='active' @endif"><a href="{{ route('getUser') }}">Danh sách tài khoản</a></li>
                    <li @if(Request::segment(3)=='create' && Request::segment(2)=='user' ) class='active' @endif><a href="{{ route("getCreateUser") }}">Thêm tài khoản</a></li>
                </ul>
            </li>
            <li   @if(Request::segment(2)=='role')
                  class='active'
                    @endif
            >
                <a href="{{ route('role.role.index') }}"><i class="fa fa-gift"></i> <span class="nav-label">Bảng phân quyền</span></a>
            </li>
        </ul>

    </div>
</nav>
