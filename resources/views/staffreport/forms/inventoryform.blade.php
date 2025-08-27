<input type="hidden" name="record_id" id="record_id_inventory" value="0">
<input type="hidden" name="typeOfRecord" id="typeOfRecord_inventory" value="INVENTORYREPORT">
<input type="hidden" name="staff_id" id="staff_id_inventory" value="{{ auth()->user()->id }}">
<div class="card-body pt-2">
    <div class="mt-0 mb-2">
        <div class="d-flex justify-content-center gap-2 align-items-center mb-2">
            <img src="{{ asset('assets/images/logo2.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
            <img src="{{ asset('assets/images/logo1.png') }}" class="bg-white rounded-circle" width=""
                alt="" style="width: 58px; height: 58px" />
        </div>
        <p class="mb-3 text-center fw-semibold" style="font-size: 16px;">TIBIAO MDRRMO INVENTORY REPORT</p>
        <hr>
    </div>
    <div class="row mx-auto align-items-end">
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Firstname</label>
                <input type="text" value="{{ auth()->user()->firstname }}" id="firstname_inventory"
                    class="form-control" readonly>
            </div>

        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Middlename</label>
                <input type="text" id="middlename_inventory" value="{{ auth()->user()->middlename }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Lastname</label>
                <input type="text" id="lastname_inventory" value="{{ auth()->user()->lastname }}"
                    class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Designation</label>
                <input type="text" name="designation" id="designation_inventory"
                    value="{{ auth()->user()->designation }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Quantity</label>
                <input type="number" name="quantity" id="quantity_inventory" class="form-control" >
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="" class="mb-1">Unit</label>
                <input type="text" name="unit" id="unit_inventory" class="form-control" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Property No.</label>
                <input type="text" name="propertyno" id="propertyno_inventory" class="form-control" required>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Date Acquired</label>
                <input type="datetime-local" name="dateacquired" id="dateacquired_inventory" required
                    class="form-control">
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="form-group mt-1">
                <label for="" class="mb-1">Amount</label>
                <input type="number" name="amount" id="amount_inventory" required class="form-control">
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
                <label for="" class="mb-1">Description</label>
                <textarea rows="3" name="description" id="description_inventory" required class="form-control"></textarea>
            </div>
        </div>
    </div>
