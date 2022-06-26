
<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{ URL::asset('assets/img/icon.png') }}" />

		<title>4GO Dashboard - @stack('title')</title>

		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css')}}">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ URL::asset('/assets/fonts/style.css')}}">

		<!-- Main css -->
		<link rel="stylesheet" href="{{ URL::asset('/assets/css/main.css')}}">



		<!-- DateRange css -->
		<link rel="stylesheet" href="{{ URL::asset('/assets/vendor/daterange/daterange.css')}}" />

		<!-- Chartist css -->
		<link rel="stylesheet" href="{{ URL::asset('/assets/vendor/chartist/css/chartist.min.css')}}" />
		<link rel="stylesheet" href="{{ URL::asset('/assets/vendor/chartist/css/chartist-custom.css')}}" />

        <!-- Cairo Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Toast -->
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/jquery.toast.min.css')}}" />

        <!-- Custom Style -->
        <style>
            p,h1,h2,h3,h4,h5,h6,span,a,li,td,tr,input,label,button,.card-title,.cairo,select,option{
                font-family: 'Cairo', sans-serif !important;
            }

            .custom-navbar ul.navbar-nav li.nav-item .nav-link.active-page,
            .custom-navbar ul.navbar-nav li.nav-item .nav-link.active-page:hover,
            .page-header,
            .main-footer,
            .header-actions > li > a.user-settings .avatar,
            .custom-navbar ul.navbar-nav ul.dropdown-menu a.dropdown-item:hover,
            .bg-info, a.bg-info,
            .btn-primary,
            .navbar-toggler:focus, .navbar-toggler:hover,
            .navbar-toggler, .navbar-toggler,
            .btn-info
            {
                background-color: #543a79 !important;
            }

            .custom-navbar,
            .custom-navbar ul.navbar-nav li.nav-item:last-child .nav-link,
            th{
                background-color: #fbc112 !important;
                color: #000 !important;
            }
            .card-header:hover,
            .card .card-header .card-title,
            .card-header{
                background-color: #fbc112 !important;
                color : #543a79 !important;
            }


            .custom-navbar ul.navbar-nav li.nav-item:hover > a, .custom-navbar ul.navbar-nav li.nav-item.show > a{
                color: #000 !important;
            }

            .quick-settings-box .quick-settings-body .quick-setting-list > h6.title{
                color: #fff;
            }
            td,th{
                font-size: .8rem;
            }

        </style>
        @stack('css')

	</head>
    <body>

        @include('dashboard.layouts.loader')
        @include('dashboard.layouts.header')

        <!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->


        @include('dashboard.layouts.quick_setting')


        <!-- Container fluid start -->
		<div class="container-fluid">

            @include('dashboard.layouts.navbar')

            <div class="main-container">

                @include('dashboard.layouts.page_header')

                <!-- Content wrapper start -->
				<div class="content-wrapper">

                    @yield('content')

                </div>
				<!-- Content wrapper end -->
            </div>



            @include('dashboard.layouts.footer')
        </div>
		<!-- Container fluid end -->



        <!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ URL::asset('/assets/js/jquery.min.js')}}"></script>
		<script src="{{ URL::asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ URL::asset('/assets/js/moment.js')}}"></script>

        <!-- Toast -->
        <script src="{{ URL::asset('/assets/js/jquery.toast.min.js')}}"></script>



		<!-- Slimscroll JS -->
		<script src="{{ URL::asset('/assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
		<script src="{{ URL::asset('/assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>

		<!-- Daterange -->
		<script src="{{ URL::asset('/assets/vendor/daterange/daterange.js')}}"></script>
		<script src="{{ URL::asset('/assets/vendor/daterange/custom-daterange.js')}}"></script>

		<!-- Chartist JS -->
		<!--<script src="{{ URL::asset('/assets/vendor/chartist/js/chartist.min.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/chartist/js/chartist-tooltip.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/chartist/js/custom/threshold/threshold.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/chartist/js/custom/bar/bar-chart-orders.js')}}"></script>-->

		<!-- jVector Maps -->
		<!--<script src="{{ URL::asset('/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/jvectormap/world-mill-en.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/jvectormap/gdp-data.js')}}"></script>-->
		<!--<script src="{{ URL::asset('/assets/vendor/jvectormap/custom/world-map-markers2.js')}}"></script>-->

		<!-- Rating JS -->
		<script src="{{ URL::asset('/assets/vendor/rating/raty.js')}}"></script>
		<script src="{{ URL::asset('/assets/vendor/rating/raty-custom.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{ URL::asset('/assets/js/main.js')}}"></script>

        @stack('js')

	</body>

</html>
