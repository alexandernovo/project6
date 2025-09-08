@php
    $designations = [
        'Research and Planning',
        'Administration and Training',
        'Operations and Warning',
        'Team Alpha Driver',
        'Team Brave Driver',
        'Team Charlie Driver',
        'Team Leader',
        'Responder',
    ];
@endphp
@extends('layout.mainlayout')
@section('content')
    @include('home.css.home')
    @include('home.components.login')
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 bg-home overflow-y-auto"
        style="height: calc(100vh - 122px);">
        <div class="card col-6 mt-3" style="border-radius: 14px">
            <div class="card-body">
                <div class="mt-3 mb-2">
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
                    <p class="mb-4 text-center fw-semibold" style="font-size: 19px;">Create an Account</p>
                    <form id="signup_form_staff">
                        <input type="hidden" name="id" id="id" value="0">
                        <input type="hidden" name="status" id="status" value="INACTIVE">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Firstname</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Middlename</label>
                                    <input type="text" id="middlename" name="middlename" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Lastname</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Contact No.</label>
                                    <input type="text" id="phone_num" name="phone_num" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Designation</label>
                                    <select type="text" id="designation" name="designation"  class="form-select">
                                        @foreach ($designations as $designation)
                                            <option>{{ $designation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Password</label>
                                    <input type="password" id="password_var" name="password" class="form-control" required>
                                    <p class="text-danger mb-0 d-none" id="errorPassword" style="font-size: 12px">
                                        Password do not match!
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">Confirm Password</label>
                                    <input type="password" id="confirm_password" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-prime w-100">Sign up</button>
                                <p class="mb-0 text-center mt-2" style="font-size: 12px">
                                    Already have an account?
                                    <a href="{{ route('login') }}">Log in Here</a>
                                </p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('home.js.login')
    @include('home.js.signup')
@endsection
