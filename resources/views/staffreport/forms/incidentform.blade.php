@php
    $barangayincident = config('barangay');
@endphp

<input type="hidden" name="record_id" id="record_id_incident" value="0">
<input type="hidden" name="typeOfRecord" id="typeOfRecord_incident" value="INCIDENTREPORT">
<input type="hidden" name="staff_id" id="staff_id_incident" value="{{ auth()->user()->id }}">
<div class="card-body pt-2">
    <div class="mt-0 mb-2">
        <div class="d-flex justify-content-center gap-2 align-items-center mb-2">
            <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
            <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
        </div>
        <p class="mb-3 text-center fw-semibold" style="font-size: 16px;">TIBIAO MDRRMO INCIDENT REPORT</p>
        <hr>
    </div>
    <div class="row mx-auto align-items-end">
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Firstname</label>
                <input type="text" value="{{ auth()->user()->firstname }}" id="firstname_incident"
                    class="form-control" readonly>
            </div>

        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Middlename</label>
                <input type="text" id="middlename_incident" value="{{ auth()->user()->middlename }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Lastname</label>
                <input type="text" id="lastname_incident" value="{{ auth()->user()->lastname }}" class="form-control"
                    readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Designation</label>
                <input type="text" id="designation_incident" value="{{ auth()->user()->designation }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Contact</label>
                <input type="text" id="phone_num_incident" value="{{ auth()->user()->phone_num }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Type of Incident</label>
                <input type="text" id="typeincident_incident" name="typeincident" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Barangay</label>
                <input type="search" name="barangay" id="barangay_incident" class="form-control" required list="incidentbarangay">
                <datalist id="incidentbarangay">
                    @foreach ($barangayincident as $b)
                        <option>{{ $b }}</option>
                    @endforeach
                </datalist>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Date & Time of Occurence</label>
                <input type="datetime-local" name="datetimeoccurence" id="datetimeoccurence_incident" required
                    class="form-control">
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group">
                <label for="" class="mb-1">Specific Location</label>
                <input type="text" name="specificlocation" id="specificlocation_incident" class="form-control"
                    required>
            </div>
        </div>
        <div class="col-3">
            <div class="row mx-auto">
                <div class="col-12">
                    <label for="" class="mb-0 mt-1">(No. of Person Involved)</label>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="mb-1">Injured</label>
                        <input type="number" name="involvedinjured" id="involvedinjured_incident" value="0"
                            class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="mb-1">Dead</label>
                        <input type="number" name="involveddead" id="involveddead_incident" value="0"
                            class="form-control" required>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-3 mt-3">
            <div class="form-group">
                <label for="" class="mb-1">File Submitted</label>
                <input type="file" name="filesubmitted" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Detailed Description of Incident</label>
                <textarea rows="3" name="detaileddesc" id="detaileddesc_incident" required class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>
