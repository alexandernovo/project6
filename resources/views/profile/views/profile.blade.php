@extends('layout.mainlayout')
@section('content')
    <div class="card">
        <div class="card-body p-0">
            <div class="row mx-auto">
                <div class="col-4 border-end p-4 pb-3" style="border-right: 1px solid #555554; background-color: #F1F2F2">
                    <div class="d-flex justify-content-center">
                        <div class="border rounded-circle bg-white" style="width: 150px; height: 150px">
                        </div>
                    </div>
                    <p class="mb-2 text-center mt-1">
                        {{ '@' . auth()->user()->username }}
                    </p>
                    <p class="mb-1 text-center mt-1 fw-semibold" style="font-size: 20px">
                        {{ auth()->user()->firstname }}
                        {{ auth()->user()->middlename ? strtoupper(substr(auth()->user()->middlename, 0, 1)) . '.' : '' }}
                        {{ auth()->user()->lastname }}
                    </p>
                    <div class="primary-bg-new gap-3 p-2 px-3 text-white d-flex justify-content-between align-items-center"
                        style="border-radius: 20px">
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="" style="height: 35px; width: 35px">
                        <p class="mb-0" style="font-size: 18px">
                            {{ auth()->user()->designation }}
                        </p>
                        <img src="{{ asset('assets/images/logo1.png') }}" alt="" style="height: 35px; width: 35px">
                    </div>
                    <div class="mt-3">
                        <div class="form-group bg-white rounded position-relative mb-1">
                            <i class="bi bi-person-circle position-absolute"
                                style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                            <input type="text" class="form-control" style="text-indent: 20px"
                                value="{{ auth()->user()->username }}">
                        </div>
                        <div class="form-group bg-white rounded position-relative mb-1">
                            <i class="bi bi-eye-slash-fill position-absolute"
                                style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                            <input type="text" class="form-control" style="text-indent: 20px" placeholder="********">
                        </div>
                        <div class="form-group bg-white rounded position-relative mb-1">
                            <i class="bi bi-house-door-fill position-absolute"
                                style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                            <input type="text" class="form-control" style="text-indent: 20px"
                                value="{{ auth()->user()->address }}">
                        </div>
                        <div class="form-group bg-white rounded position-relative mb-1">
                            <i class="bi bi-telephone-fill position-absolute"
                                style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                            <input type="text" class="form-control" style="text-indent: 20px"
                                value="{{ auth()->user()->phone_num }}">
                        </div>
                        <div class="form-group bg-white rounded position-relative mb-1">
                            <i class="bi bi-envelope-fill position-absolute"
                                style="left: 15px; top: 50%; transform: translateY(-50%);"></i>
                            <input type="text" class="form-control" style="text-indent: 20px"
                                value="{{ auth()->user()->email }}">
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <button class="btn btn-prime">Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-8 p-4"></div>
            </div>
        </div>
    </div>
@endsection
