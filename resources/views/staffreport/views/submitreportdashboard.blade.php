@extends('layout.mainlayout')
@section('content')
    @include('staffreport.css.staffreport')
    @php
        $reports = [
            [
                'title' => 'INCIDENT RECORD REPORT',
                'class' => 'bg-red',
                'route' => route('incidentreportPrint'),
            ],
            ['title' => 'SITUATIONAL RECORD REPORT', 'class' => 'bg-orange', 'route' => ''],
            ['title' => 'PROGRESS RECORD REPORT', 'class' => 'bg-blue', 'route' => ''],
            ['title' => 'INVENTORY RECORD REPORT', 'class' => 'bg-green', 'route' => ''],
        ];
    @endphp
    <div class="row mx-auto">
        <div class="card-body px-2 py-1 mb-2">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Records Report</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="breadcrum-sm-class">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Records Report</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            @foreach ($reports as $report)
                <div class="d-flex flex-column justify-content-center align-items-center text-white p-4 {{ $report['class'] }}"
                    style="width: 24%; min-height: 300px; border-radius: 10px">
                    <i class="bi bi-journal-text" style="font-size: 100px"></i>
                    <p class="mb-2 fw-semibold text-center" style="font-size: 16px">{{ $report['title'] }}</p>
                    <a href="{{ $report['route'] }}" class="btn w-100 mt-3 text-white"
                        style="border: 1px solid white">Submit</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    @include('staffreport.js.staffreport')
@endsection
