@extends('layout.mainlayout')
@section('content')
    @include('dashboard.css.dashboard')
    @php
        $countDash = $countDash->pluck('total', 'typeOfRecord')->toArray();
        $counts = [
            [
                'title' => 'Incident Report | Month',
                'class' => 'bg-red',
                'route' => '',
                'id' => 'incidentreportcount',
                'count' => $countDash['INCIDENTREPORT'] ?? 0,
            ],
            [
                'title' => 'Situational Report | Month',
                'class' => 'bg-orange',
                'route' => '',
                'id' => 'situationalreportcount',
                'count' => $countDash['SITUATIONALREPORT'] ?? 0,
            ],
            [
                'title' => 'Progress Report | Month',
                'class' => 'bg-blue',
                'route' => '',
                'id' => 'progressreportcount',
                'count' => $countDash['PROGRESSREPORT'] ?? 0,
            ],
            [
                'title' => 'Inventory Report | Month',
                'class' => 'bg-green',
                'route' => '',
                'id' => 'inventoryreportcount',
                'count' => $countDash['INVENTORYREPORT'] ?? 0,
            ],
        ];
    @endphp
    <div class="row mx-auto">
        <div class="card-body px-2 py-1">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between px-0">
            @foreach ($counts as $count)
                <div class="border p-3 {{ $count['class'] }}" style="width: 24%; border-radius: 13px">
                    <p class="mb-1 text-white text-center" style="font-size: 18px">{{ $count['title'] }}</p>
                    <p class="mb-1 text-white text-center" style="font-size: 30px">
                        <i class="bi bi-journal-text text-white" style="font-size: 30px"></i>
                        {{ $count['count'] }}
                    </p>
                </div>
            @endforeach
        </div>
        <div class="card mt-3 mb-0">
            <div class="card-body p-3">
                <p class="mb-2 fw-semibold" style="font-size: 16px">REPORT | THIS MONTH</p>
                <table id="reportTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Staff Name</th>
                            <th>Designation</th>
                            <th>Report Type</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>File Submitted</th>
                            <th>Date & Time Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        @if (auth()->user()->usertype == 'ADMIN')
            <div class="card mt-3">
                <div class="card-body p-3">
                    <p class="mb-2 fw-semibold" style="font-size: 16px">MONTHLY REPORT DATA CHART</p>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    @include('dashboard.js.report')
@endsection
