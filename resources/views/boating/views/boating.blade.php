@extends('layout.mainlayout')
@section('content')
    @include('boating.css.boating')
    @include('boating.modals.newboating')
    <div class="row mx-auto">
        <div class="card-body px-2 py-1">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Boating</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="breadcrum-sm-class">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Boating</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card w-100 px-0 mb-0">
            <div class="card-body p-3">
                <table id="boatingTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date Created</th>
                            <th>Owner of Boat</th>
                            <th>Address</th>
                            <th>Expiration Date</th>
                            <th width="80px">Permit Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('boating.js.boating')
    @include('boating.js.newboating')
    @include('boating.js.deleteboating')
@endsection
