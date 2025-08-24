@extends('layout.mainlayout')
@section('content')
    @php
        $reports = [
            ['title' => 'INCIDENT RECORD REPORT', 'class' => 'bg-danger', 'route' => ''],
            ['title' => 'SITUATIONAL RECORD REPORT', 'class' => 'bg-warning', 'route' => ''],
            ['title' => 'PROGRESS RECORD REPORT', 'class' => 'bg-primary', 'route' => ''],
            ['title' => 'INVENTORY RECORD REPORT', 'class' => 'bg-green', 'route' => ''],
        ];
    @endphp
    <div class="d-flex justify-content-between">
        @foreach ($reports as $report)
            <div class="d-flex flex-column justify-content-center align-items-center text-white p-4 {{ $report['class'] }}" style="width: 24%; min-height: 300px; border-radius: 10px">
                <i class="bi bi-journal-text" style="font-size: 100px"></i>
                <p class="mb-2 fw-semibold text-center" style="font-size: 16px">{{ $report['title'] }}</p>
                <button class="btn w-100 mt-3 text-white" style="border: 1px solid white">View</button>
            </div>
        @endforeach
    </div>
@endsection
