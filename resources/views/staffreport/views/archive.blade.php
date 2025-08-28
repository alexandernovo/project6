@extends('layout.mainlayout')
@section('content')
    @include('staffreport.css.staffreport')
    @include('staffreport.modals.incidentmodal')
    @include('staffreport.modals.situationalmodal')
    @include('staffreport.modals.progressmodal')
    @include('staffreport.modals.inventorymodal')
    
    <div class="row mx-auto">
        <div class="card-body px-2 py-1">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Archive</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="breadcrum-sm-class">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Archive</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card w-100 px-0 mb-0">
            <div class="card-body p-3">
                <table id="archivedTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Staff Name</th>
                            <th>Designation</th>
                            <th>Report Type</th>
                            <th>File Submitted</th>
                            <th>Date & Time Submitted</th>
                            <th>Action</th>
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
    @include('staffreport.js.archive')
    @include('staffreport.js.reportformupdate')
@endsection
