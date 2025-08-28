<script>
    let incidentreportOptions;
    let incidentreportTable;
    let reportFormData = [];
    let selectedincidentreportId = null;

    incidentreportOptions = {
        processing: false,
        serverSide: true,
        // data: [],
        ajax: {
            url: "{{ route('getstaffreports') }}",
            type: 'POST',
            dataType: 'json',
            data: function(d) {
                d._token = '{{ csrf_token() }}';
                d.typeOfRecord = "INCIDENTREPORT";
            },
            dataSrc: function(json) {
                reportFormData = json.data;
                return json.data;
            }
        },
        columns: [{
                title: 'No.',
                className: 'text-nowrap p-3 text-center align-middle',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                title: 'Staff<br>Name',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.fullname;
                }
            },
            {
                title: 'Designation',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.designation;
                }
            },
            {
                title: 'Type of<br>Incident',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.typeincident;
                }
            },
            {
                title: 'Date & Time<br>of Occurence',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return formatDateToStr(row.datetimeoccurence);
                }
            },
            {
                title: 'Barangay',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.barangay;
                }
            },
            {
                title: 'Specific<br>Location',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.specificlocation;
                }
            },
            {
                title: `Detailed Description<br>of Incident`,
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.detaileddesc;
                }
            },
            {
                title: `
                    <div class="p-2" style="border-bottom: 1px solid #EBF1F6">No. of Person Involved</div>
                    <div class="d-flex">
                        <div class="w-50 p-2" style="border-right: 1px solid #EBF1F6">Injured</div>
                        <div class="w-50 p-2">Dead</div>
                    </div>
                `,
                orderable: false,
                className: 'text-nowrap p-3 align-middle text-center p-0',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex">
                           <div class="w-50 p-2" style="border-right: 1px solid #EBF1F6">${row.involvedinjured}</div>
                           <div class="w-50 p-2">${row.involveddead}</div>
                        <div>
                    `;
                }
            },
            {
                title: 'File<br>Submitted',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Date<br>Submitted',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return formatDateToStr(row.created_at);
                }
            },
            {
                title: 'Action',
                className: 'text-nowrap p-3 align-middle text-center sticky-action',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning editRecord" data-type="incident" data-record_id="${row.record_id}">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>
                            <button class="btn btn-danger deleteRecord" data-record_id="${row.record_id}">
                                <i class="bi bi-trash3-fill"></i>
                                Delete
                            </button>
                        <div>
                    `;
                }
            }
        ],
        initComplete: function(settings, json) {
            appendButtonsincidentreport();
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    };

    $(document).ready(function() {
        renderincidentreportTable();
    })

    function renderincidentreportTable() {
        if (incidentreportTable) {
            incidentreportTable.destroy();
        }
        incidentreportTable = new DataTable('#incidentreportTable', incidentreportOptions)
    }

    $(document).on("click", "#reloadincidentreportBtn", function() {
        reloadButtonLoading(true);
        reloadincidentreportTable();
        setTimeout(() => {
            reloadButtonLoading(false);
        }, 500);
    });

    function reloadincidentreportTable() {
        if (incidentreportTable) {
            incidentreportTable.ajax.reload(null, false);
        } else {
            renderincidentreportTable();
        }
    }

    function reloadincidentreportTableWithPagination() {
        if (incidentreportTable) {
            incidentreportTable.ajax.reload(null, true);
        } else {
            renderincidentreportTable();
        }
    }

    function appendButtonsincidentreport() {
        $('#incidentreportTable_wrapper .row .dt-length').append(`
            <div class="d-flex gap-2 ms-2 align-items-center incidentreportBtnSm">
                <div class="d-flex">
                    <div class="input-group" style="width: 120%">
                        <span  style="border: 1px solid #EAEFF4 !important" class="input-group-text filter-padding">From:</span>
                        <input type="date" id="dateFromFilter" value="{{ date('Y-m-d') }}" class="form-control filter-padding rounded-end-0 border-end-0">
                    </div>
                    <div class="input-group" style="width: 110%">
                        <span  style="border: 1px solid #EAEFF4 !important" class="input-group-text rounded-start-0 filter-padding">To:</span>
                        <input type="date" id="dateToFilter" value="{{ date('Y-m-d') }}" class="form-control filter-padding rounded-end-0 border-end-0">
                    </div>
                    <button data-bs-toggle="tooltip" data-bs-title="Filter by Date & Time of Incident" type="button" id="filterDateBtn" class="btn btn-prime filter-padding d-flex gap-1 align-items-center border-1 rounded-start-0 position-relative">
                        <i class="bi bi-funnel-fill"></i>
                        Filter
                    </button>
                </div>
                <button class="btn btn-info d-flex flex-nowrap align-items-center gap-2" id="reloadincidentreportBtn">
                    <span>
                        <i class="bi bi-arrow-clockwise"></i>
                    </span>
                    Reload
                </button>
            </div>
        `);
    }

    function reloadButtonLoading(isLoading) {
        if (isLoading) {
            $("#reloadincidentreportBtn").html(`
                    <div class="spinner-border text-white" role="status" style="width: 14px; height: 14px">
                </div>
                Reloading
            `);
        } else {
            $("#reloadincidentreportBtn").html(`
                <i class="bi bi-arrow-clockwise"></i>
                Reload
            `);
        }
    }

    $(document).on('click', '.deleteRecord', function() {
        let record_id = $(this).data("record_id");
        Swal.fire({
            title: `Delete this Incident Report?`,
            text: `Are you sure you want to delete this Incident Report?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "Delete"
        }).then((result) => {
            if (result.isConfirmed) {
                postRequest("{{ route('deleteRecord') }}", {
                    record_id: record_id,
                }, (response) => {
                    if (response.status == "success") {
                        reloadincidentreportTable();
                    }
                })
            }
        });
    });
</script>
