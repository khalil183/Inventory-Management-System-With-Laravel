@include('layouts.header')
<!-- begin app -->
<div class="app">
    <!-- begin app-wrap -->
    <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
            <div class="h-100 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="{{ asset('public/backend/assets/img/loader/loader.svg') }}" alt="loader">
                </div>
            </div>
        </div>
        <!-- end pre-loader -->

        <!--start login contant-->
        <div class="app-contant">
            <div class="bg-white">
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                            <div class="d-flex align-items-center h-100-vh">
                                <div class="login p-50">
                                    <h1 class="mb-2">Admin Login</h1>

                                    <form action="{{ route('login') }}" method="post" class="mt-3 mt-sm-5">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input value="{{ old('email') }}" type="email" name="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        required placeholder="Email" autocomplete="email" autofocus />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <input type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        placeholder="Password" required />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-block d-sm-flex  align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="gridCheck" >
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                    <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit"
                                                    class="btn btn-primary text-uppercase">Login</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                            <div class="row align-items-center h-100">
                                <div class="col-7 mx-auto ">
                                    <img class="img-fluid" src="{{ asset('public/backend/assets/img/bg/login.svg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end login contant-->
    </div>
    <!-- end app-wrap -->
</div>
<!-- end app -->
@include('layouts.footer')


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
