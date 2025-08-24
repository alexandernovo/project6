<script>
    let incidentreportOptions;
    let incidentreportTable;
    let incidentreportData = [];
    let selectedincidentreportId = null;

    incidentreportOptions = {
        processing: false,
        serverSide: false,
        data: [],
        // ajax: {
        //     url: "",
        //     type: 'POST',
        //     dataType: 'json',
        //     data: function(d) {
        //         d._token = '{{ csrf_token() }}';
        //     },
        //     dataSrc: function(json) {
        //         incidentreportData = json.data;
        //         return json.data;
        //     }
        // },
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
                    return "";
                }
            },
            {
                title: 'Designation',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Type of<br>Incident',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Date & Time<br>of Occurence',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Barangay',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Specific<br>Location',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: `Detailed Description<br>of Incident`,
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
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
                    return "";
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
                    return row.total
                }
            },
            {
                title: 'Action',
                className: 'text-nowrap p-3 align-middle text-center sticky-action',
                render: function(data, type, row) {
                    return row.total
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

    $(document).on('click', '#incidentreportTable tbody tr', function() {
        let data = incidentreportTable.row(this).data();
        if (!data) return;

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            selectedincidentreportId = null;
        } else {
            $('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            selectedincidentreportId = data.record_id; // incidentreport the ID
        }
    });

    // Reincidentreport selection after reload
    // incidentreportOptions.drawCallback = function(settings) {
    //     incidentreportTable.rows().every(function() {
    //         let data = this.data();
    //         if (data.record_id === selectedincidentreportId) {
    //             $(this.node()).addClass('selected');
    //         }
    //     });
    // };
</script>
