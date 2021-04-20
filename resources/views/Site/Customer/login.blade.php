@extends('Site.App.App')
@push('title', 'Login Form')
@push('CSS')
    @notifyCss
@endpush
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading">
                        <h2 class="title">Login</h2>
                        <p>If you have an account with us, please log in.</p>
                    </div><!-- End .heading -->
                    @if(session('messages'))
                        <div class="alert alert-danger">
                            <p>{{ session('messages') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('auth.login') }}" id="LoginForm" method="post">
                        @csrf
                        <input type="email" name="email" class="form-control {{ session()->has('messages') ? 'is-invalid':'' }} {{ $errors->login->first('email') ? 'is-invalid':'' }} " value="{{ old('email') }}"
                               placeholder="Email Address">
                        <input type="password" name="password" class="form-control {{ session()->has('messages') ? 'is-invalid':'' }} {{ $errors->login->first('password') ? 'is-invalid':'' }}" value="{{ old('password') }}"
                               placeholder="Password">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                            <a href="#" class="forget-pass"> Forgot your password?</a>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="heading">
                        <h2 class="title">Create An Account</h2>
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    </div><!-- End .heading -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops! something went wrong.</strong>
                            <br>
                            <br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group col-md-12">
                        <a href="" class="btn btn-danger btn-sm mb-1 btn-block"><i class="sicon-social-google" style="font-size: 20px"></i> Signup With Google</a>
                        <a href="" class="btn btn-primary btn-sm btn-block"><i class="sicon-social-facebook" style="font-size: 20px;"></i> Signup With Facebook</a>
                    </div>
                    <p class="text-center">Or</p>
                    <form action="{{ route('auth.register') }}" method="post">
                        @csrf
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                        @error('first_name') <p class="text-danger">{{ $message }}</p>@enderror
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"  name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                        @error('last_name') <p class="text-danger">{{ $message }}</p>@enderror
                        <h2 class="title mb-2">Login information</h2>
                        <input type="text" pattern="[0-9]{11}" class="form-control @error('phone') is-invalid @enderror"  name="phone" value="{{ old('phone') }}" placeholder="Phone example 018*******">
                        @error('phone') <p class="text-danger">{{ $message }}</p>@enderror
                        <input type="email" class="form-control @error('r_email') is-invalid @enderror" name="r_email"  placeholder="Email Address" value="{{ old('r_email') }}">
                        @error('r_email') <p class="text-danger">{{ $message }}</p>@enderror
                        <input type="password" class="form-control @error('r_password') is-invalid @enderror" name="r_password"  placeholder="Password" value="{{ old('r_password') }}">
                        @error('r_password') <p class="text-danger">{{ $message }}</p>@enderror
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"  placeholder="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}">
                        @error('confirm_password') <p class="text-danger">{{ $message }}</p>@enderror
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="newsletter_signup" class="custom-control-input" id="newsletter-signup">
                            <label class="custom-control-label" for="newsletter-signup">Sing up our Newsletter</label>
                        </div><!-- End .custom-checkbox -->

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div><!-- End .form-footer -->
                    </form>
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
@push('JS')
    <script src="{{ asset('assets/frontend/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            const FormValidate = $('LoginForm')
            if (FormValidate.length > 0) {
                FormValidate.validate({
                    rule: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: 'email filed is required.'
                        }
                    }
                });
            }
        });
    </script>
    @notifyJs
@endpush
