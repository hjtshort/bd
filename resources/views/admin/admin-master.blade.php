<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Nông sản Cái Răng</title>

    <link href="{{ asset('/cpanel/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('/cpanel/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{ asset('/cpanel/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/css/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/tag/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/tag/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{ asset('/cpanel/css/style.css')}}" rel="stylesheet">
    <style>
    .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
    </style>
</head>
    <script src="{{ asset('/cpanel/js/jquery.js')}}"></script>
    

    <script src="{{ asset('/cpanel/js/bootstrap.min.js')}}"></script>
 
    <script src="{{ asset('/cpanel/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ asset('/cpanel/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->


    <!-- Peity -->
    <script src="{{ asset('/cpanel/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('/cpanel/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/cpanel/js/inspinia.js')}}"></script>
    <script src="{{ asset('/cpanel/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('/cpanel/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{ asset('/cpanel/js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('/cpanel/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{ asset('/cpanel/js/plugins/switchery/switchery.js')}}"></script>
    <script src="{{ asset('/cpanel/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('/cpanel/js/popper.js')}}"></script>
    <script src="{{ asset('/cpanel/js/bootstrap.js')}}"></script>
    <script src="{{ asset('/cpanel/js/bootbox.min.js')}}"></script>

    <script src="{{ asset('/cpanel/tag/bootstrap-tagsinput.js')}}"></script>
    <script src="{{ asset('/cpanel/tag/typeahead.bundle.js')}}"></script>
    <script>
        function mess(type,mess)
                {
                    Command: toastr[type](mess)

                toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
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
            }
    </script>
<body>
<div id="wrapper">
        @include('admin.module.sidebar')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('admin.module.navbar')
        <!-- Content -->
        @yield('content')
        <!-- end: Content -->
        </div>
</div>
</body>
<script>
         
            $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
    
            var hienthi = document.querySelector('.hienthi');
            var switchery = new Switchery(hienthi, { color: '#1AB394' });

            var noibat = document.querySelector('.noibat');
            var switchery_2 = new Switchery(noibat, { color: '#ED5565' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });



            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
       
        
 
    
</script>
</html>
