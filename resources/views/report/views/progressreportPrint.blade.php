@extends('layout.mainlayout')
@section('content')
    <div class="row mx-auto">
        <div class="card-body px-2 py-1">
            <div class="row align-items-center">
                <div class="col-12">
                    <div
                        class="d-flex align-items-center mb-2 flex-wrap text-lg-start text-sm-center gap-2 title-tips-class">
                        <h4 class="fw-semibold mb-0 text-nowrap">Records Report | Progress</h4>
                    </div>
                    <nav aria-label="breadcrumb" class="breadcrum-sm-class">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Records Report | Progress</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-2">
                <div class="d-flex justify-content-between">
                    <form method="GET" class=" w-25 mb-2">
                        <div class="form-group">
                            <label for="" class="mb-1">Select Month and Year</label>
                            <input type="month" class="form-control" name="monthyear"
                                value="{{ request('monthyear', date('Y-m')) }}" onchange="this.form.submit()">
                        </div>
                    </form>
                </div>
                <hr class="my-2">
                <div class="d-flex justify-content-center gap-3 align-items-center">
                    <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                        alt="" style="width: 78px; height: 78px" />

                    <div class="d-flex justify-content-center align-items-center flex-column mt-4">
                        <p class="mb-1" style="color: black; font-size: 15px; line-height: 18px">Republic of the
                            Philippines</p>
                        <p class="mb-1" style="color: black; font-size: 15px; line-height: 18px">Province of Antique</p>
                        <p class="mb-1 fw-semibold" style="color: black; font-size: 17px; line-height: 18px">MUNICIPALITY OF
                            TIBIAO</p>
                        <p class="mb-1" style="color: black; font-size: 15px; line-height: 18px">Municipal Disaster Risk
                            Reduction Office</p>
                        <p class="mb-1" style="color: black; font-size: 15px; line-height: 18px">Hotline No: 09778035582
                        </p>
                        <p class="mb-1" style="color: black; font-size: 15px; line-height: 18px">Email:
                            mdrrmotibiao@gmail.com</p>
                    </div>
                    <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                        alt="" style="width: 78px; height: 78px" />
                </div>

                <p class="mb-2 mt-4 text-center fw-semibold text-uppercase" style="font-size: 20px; color: black">
                    PROGRESS REPORT AS OF
                    {{ date('F Y', strtotime(request('monthyear', date('Y-m')) . '-01')) }}
                </p>
                <table class="table-bordered border-dark table mt-3">
                    <thead>
                        <tr>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">No.</th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Barangay</th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Affected Families</th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Person/Individuals</th>
                            <th class="text-center p-0 align-middle" style="font-size: 12px" style="font-size: 12px">
                                <div class="d-flex flex-column h-100">
                                    <div class="p-1" style="border-bottom: 1px solid black">
                                        Evacuation Centers/Outside
                                    </div>
                                    <div class="d-flex flex-1">
                                        <div style="border-right: 1px solid black;" class="w-50 h-100 p-1">Families</div>
                                        <div class="w-50 h-100 p-1">Individuals</div>
                                    </div>
                                </div>
                            </th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Remarks</th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Clearing Operations</th>
                            <th class="text-center p-1 align-middle" style="font-size: 12px" style="font-size: 12px">Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">{{ $loop->iteration }}</td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">{{ $d->barangay }}</td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">
                                    {{ $d->affectedfamilies }}
                                </td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">{{ $d->individuals }}</td>
                                <td class="text-center p-0 align-middle" style="font-size: 12px">
                                    <div class="d-flex h-100">
                                        <div style="border-right: 1px solid black;" class="w-50 h-100 p-1">
                                            {{ $d->evacuationfamilies }}</div>
                                        <div class="w-50 h-100 p-1">{{ $d->evacuationindividuals }}</div>
                                    </div>
                                </td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">{{ $d->remarks }}</td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">{{ $d->clearingoperations }}</td>
                                <td class="text-center px-2 py-1 align-middle" style="font-size: 12px">
                                    {{ date('F d, Y h:i a', strtotime($d->created_at)) }}
                                </td>
                            </tr>
                        @endforeach

                        @if (empty($data) || count($data) == 0)
                            <tr>
                                <td colspan="8" class="text-center py-1" style="font-size: 12px">No Data</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
