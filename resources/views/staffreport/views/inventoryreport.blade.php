@extends('layout.mainlayout')
@section('content')
    @include('staffreport.css.staffreport')
    <div class="row mx-auto">
        <div class="card-body px-2 py-1">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Submit Report | Inventory</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="breadcrum-sm-class">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('submitreportdashboard') }}">Submit Report</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Submit Report | Inventory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card w-100 px-0 mb-0">
            <form class="reportform">
                @include('staffreport.forms.inventoryform')
                <hr>
                <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-success">
                        <i class="bi bi-send-fill"></i>
                        Send
                    </button>
                    <button class="btn btn-danger">
                        <i class="bi bi-ban"></i>
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('js')
    @include('staffreport.js.reportform')
@endsection
