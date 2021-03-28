
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Syndash - Bootstrap4 Admin Template</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{  asset('assets/backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{  asset('assets/backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{  asset('assets/backend/assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/assets/css/icons.css') }}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ asset('assets/backend/assets/css/app.css') }}" />
</head>

<body class="bg-lock-screen">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<form method="POST"  action="{{ route('login') }}">
                    @csrf
                    <div class="card-body p-md-5 text-center">
                        <h2 class="text-white">10:53 AM</h2>
                        @php
                            $toDay = date('D, M, Y');
                        @endphp
                        <div class="">
                            <img src="{{ asset('assets/backend/assets/images/icons/user.png') }}" class="mt-5" width="80" alt="" />
                        </div>
                        <p class="mt-2 text-white">Administrator</p>
                        <h5 class="text-white">{{ $toDay }}</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                    <li>{{  $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group mt-3">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror " placeholder="Username" />
                        </div>
                        <div class="form-group mt-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                        </div>
                        <input type="submit" class="btn btn-light btn-block" value="Login">
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 12:54:21 GMT -->
</html>
