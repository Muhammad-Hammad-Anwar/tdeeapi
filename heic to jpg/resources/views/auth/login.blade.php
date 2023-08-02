@extends('auth.layout.app')

@section('page_title')
    Login
@endsection

@section('content')
<div class="login-box card">
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" class="form-horizontal form-material m-t-40 text-center" id="loginform">
            @csrf
            <a href="{{ route('home') }}" class="db">
                <img src="{{ asset('admin/images/favicon.png') }}" alt="Home" width="30%" /><br/>
                <h3 class="text-dark mt-3">Equation Balancer</h3>
            </a>
            <div class="form-group m-t-40">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div> 
                        <div class="ms-auto">
                            <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot password?</a> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-xs-12 p-b-20">
                    <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Log In</button>
                </div>
            </div>
        </form>
        <form class="form-horizontal" id="recoverform" action="index.html">
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3>Recover Password</h3>
                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="Email">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg w-100 text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
