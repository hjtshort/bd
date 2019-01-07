@extends('admin.admin-master')
@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        	@forelse($user as $key=>$value)
            <div class="col-lg-4">
                <div class="contact-box">
                    <a href="profile.html">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ Storage::url($value->avatar) }}">
                            {{--<div class="m-t-xs font-bold">Graphics designer</div>--}}
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{ $value->name }}</strong></h3>
                        <p><i class="fa fa-map-marker"></i> {{ $value->address }}</p>

                        <p><i class="fa fa-phone"></i> {{  $value->phone }}</p>

                        <p><i class="fa fa-envelope-o"></i> {{ $value->email }}</p>
                    </div>
                    <div class="clearfix"></div>
                        </a>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
