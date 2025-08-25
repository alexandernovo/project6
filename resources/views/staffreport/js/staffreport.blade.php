<script>
    let staffreportOptions;
    let staffreportTable;
    let staffreportData = [];
    let selectedstaffreportId = null;

    staffreportOptions = {
        processing: false,
        serverSide: true,
        // data: [],
        ajax: {
            url: "{{ route('getstaffreport') }}",
            type: 'POST',
            dataType: 'json',
            data: function(d) {
                d._token = '{{ csrf_token() }}';
            },
            dataSrc: function(json) {
                staffreportData = json.data;
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
                title: 'Staff Name',
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
                title: 'Report Type',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return formatRecordType(row.typeOfRecord);
                }
            },
            {
                title: 'Address',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.address;
                }
            },
            {
                title: 'Contact',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return row.phone_num;
                }
            },
            {
                title: 'File Submitted',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Date Submitted',
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
                            <button class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>
                            <button class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                Delete
                            </button>
                        <div>
                    `;
                }
            }
        ],
        initComplete: function(settings, json) {
            appendButtonsstaffreport();
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    };

    $(document).ready(function() {
        renderstaffreportTable();
    })

    function renderstaffreportTable() {
        if (staffreportTable) {
            staffreportTable.destroy();
        }
        staffreportTable = new DataTable('#staffreportTable', staffreportOptions)
    }

    $(document).on("click", "#reloadstaffreportBtn", function() {
        reloadButtonLoading(true);
        reloadstaffreportTable();
        setTimeout(() => {
            reloadButtonLoading(false);
        }, 500);
    });

    function reloadstaffreportTable() {
        if (staffreportTable) {
            staffreportTable.ajax.reload(null, false);
        } else {
            renderstaffreportTable();
        }
    }

    function reloadstaffreportTableWithPagination() {
        if (staffreportTable) {
            staffreportTable.ajax.reload(null, true);
        } else {
            renderstaffreportTable();
        }
    }

    function appendButtonsstaffreport() {
        $('#staffreportTable_wrapper .row .dt-length').append(`
            <div class="d-flex gap-2 ms-2 align-items-center staffreportBtnSm">
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
                <button class="btn btn-info d-flex flex-nowrap align-items-center gap-2" id="reloadstaffreportBtn">
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
            $("#reloadstaffreportBtn").html(`
                    <div class="spinner-border text-white" role="status" style="width: 14px; height: 14px">
                </div>
                Reloading
            `);
        } else {
            $("#reloadstaffreportBtn").html(`
                <i class="bi bi-arrow-clockwise"></i>
                Reload
            `);
        }
    }

    $(document).on('click', '#staffreportTable tbody tr', function() {
        let data = staffreportTable.row(this).data();
        if (!data) return;

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            selectedstaffreportId = null;
        } else {
            $('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            selectedstaffreportId = data.record_id; // staffreport the ID
        }
    });

    // Restaffreport selection after reload
    // staffreportOptions.drawCallback = function(settings) {
    //     staffreportTable.rows().every(function() {
    //         let data = this.data();
    //         if (data.record_id === selectedstaffreportId) {
    //             $(this.node()).addClass('selected');
    //         }
    //     });
    // };
</script>
