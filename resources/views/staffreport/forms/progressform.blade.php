<input type="hidden" name="record_id" id="record_id_progress" value="0">
<input type="hidden" name="typeOfRecord" id="typeOfRecord_progress" value="PROGRESSREPORT">
<input type="hidden" name="staff_id" id="staff_id_progress" value="{{ auth()->user()->id }}">
<div class="card-body pt-2">
    <div class="mt-0 mb-2">
        <div class="d-flex justify-content-center gap-2 align-items-center mb-2">
            <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
            <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
        </div>
        <p class="mb-3 text-center fw-semibold" style="font-size: 16px;">TIBIAO MDRRMO PROGRESS REPORT</p>
        <hr>
    </div>
    <div class="row mx-auto align-items-end">
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Firstname</label>
                <input type="text" value="{{ auth()->user()->firstname }}" id="firstname_progress"
                    class="form-control" readonly>
            </div>

        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Middlename</label>
                <input type="text" id="middlename_progress" value="{{ auth()->user()->middlename }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Lastname</label>
                <input type="text" id="lastname_progress" value="{{ auth()->user()->lastname }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Designation</label>
                <input type="text" name="designation" id="designation_progress"
                    value="{{ auth()->user()->designation }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Contact</label>
                <input type="text" name="phone_num" id="phone_num_progress"
                    value="{{ auth()->user()->phone_num }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="" class="mb-1">Barangay</label>
                <input type="text" name="barangay" id="barangay_progress" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Affected Families</label>
                <input type="number" id="affectedfamilies_progress" name="affectedfamilies" class="form-control"
                    required>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Person/Individuals</label>
                <input type="number" name="individuals" id="individuals_progress" required class="form-control">
            </div>
        </div>
        <div class="col-3">
            <div class="row mx-auto">
                <div class="col-12">
                    <label for="" class="mb-0 mt-1">(Evacuation Centers/Outside)</label>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="mb-1">Families</label>
                        <input type="number" name="evacuationfamilies" id="evacuationfamilies_progress"
                            value="0" class="form-control" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="" class="mb-1">Individuals</label>
                        <input type="number" name="evacuationindividuals" id="evacuationindividuals_progress"
                            value="0" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Clearing Operations</label>
                <input type="text" name="clearingoperations" id="clearingoperations_progress" required class="form-control">
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
                <label for="" class="mb-1">Remarks</label>
                <textarea rows="3" name="remarks" id="remarks_progress" required class="form-control"></textarea>
            </div>
        </div>
    </div>
