@extends('layout.mainlayout')
@section('content')
    @include('home.css.home')
    @include('home.components.login')
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 bg-home"
        style="height: calc(100vh - 122px);">
        <div class="card col-4" style="border-radius: 14px">
            <div class="card-body">
                <div class="mt-3 mb-4">
                    <div class="d-flex justify-content-center gap-2 align-items-center mb-2">
                        <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                            alt="" style="width: 78px; height: 78px" />
                        <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                            alt="" style="width: 78px; height: 78px" />
                    </div>
                    <p class="mb-3 text-center fw-semibold" style="font-size: 19px;">TIBIAO MDRRMO PORTAL</p>
                    <hr>
                </div>
                <div>
                    <p class="mb-1 text-center fw-semibold" style="font-size: 19px;">Log in to your Account</p>
                    <p class="text-center fw-semibold" style="font-size: 13px;">Enter your username and password to log in
                    </p>
                    <form id="login_form_staff">
                        <input type="hidden"name="typeLogin" id="typeLogin" value="STAFF">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-1">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <p id="error_login_staff" class="text-danger mt-1 d-none mb-0 error-class"></p>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-prime w-100">Log in</button>
                            <p class="mb-0 text-center mt-2" style="font-size: 12px">No Account? <a href="{{ route('signup') }}">Sign up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('home.js.login')
@endsection
