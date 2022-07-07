
<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{ URL::asset('assets/img/icon.png')}}" />

		<title>4GO Dashboard - تسجيل الدخول</title>

		<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}" />

		<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css')}}" />
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <style>
            /* body{
                background-color: rgba(39, 39, 39, 0.8);
                background-blend-mode: soft-light;
                background-image: url('{{ URL::asset("assets/img/automation.mp4")}}');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: cover;

            } */
            *{
                font-family: 'Cairo', sans-serif !important;
            }
            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
            }
            .content {
                position: fixed;
                top: 0;
                bottom: 0;
                right: 0;
                left: 0;
                min-width : 100%;
                background: rgba(0, 0, 0, 0.5);
                color: #f1f1f1;
                margin: auto;

            }
            label{
                color: #543a79;
            }

        </style>


	</head>

	<body class="authentication">
        <video autoplay muted loop id="myVideo">
            <source src="{{ URL::asset("assets/img/automation.mp4")}}" type="video/mp4">
        </video>
		<!-- Container start -->
		<form class="container content" method="POST" action="{{ URL::route('auth.signin') }}">
                @csrf
                @method('POST')
				<div class="row justify-content-md-center " style="margin: auto;height: 100% !important;">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 "></div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 " style="margin: auto">
                        <div class="container-fluid">
                            <div class="row" class="" style="background-color: #fff;border-radius: 10px;opacity: 90%">
                                <div class="col-md-12">
                                    <div class="row gutters p-0 pt-3 tb-3 pr-3 pl-3 ">

                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12 text-center pt-4">
                                            <img src="{{ URL::asset('assets/img/4go-logo.png')}}" alt="4Go Dashboard" width="60%" />
                                        </div>
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12 text-center p-0" style="color: #543a79">
                                            <h3>تسجيل الدخول</h3>
                                        </div>
                                        @if($errors->any())
                                            <div id="message" class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12 text-center p-0" style="color: #543a79">
                                                <div class="form-group bg-danger text-center pb-2 pt-2">
                                                    <p class="text-bold text-light">فشل تسجيل الدخول برجاء التأكد من البيانات.</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12 text-center p-0" style="color: #543a79">
                                        <hr>
                                        </div>
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="email">البريد الالكتروني</label>
                                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" placeholder="ادخل البريد الالكتروني" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="password">كلمة المرور</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="ادخل كلمة المرور" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">

                                                <input type="checkbox"  name="remember" class="" id="remember" >
                                                <label for="remember" class="mr-1">تذكرنى</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lglg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <input type="submit" value="تسجيل الدخول"  class="form-control btn pt-1 pb-2 mb-2" style="color:#fbc112;background-color:#543a79;font-size:1rem;">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 "></div>
				</div>

		</form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {

                setTimeout(() => {
                    const box = document.getElementById('message');

                    box.style.display = 'none';
                }, 3000);
            });
        </script>
	</body>

</html>
