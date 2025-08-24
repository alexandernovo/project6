<script>
    let inventoryreportOptions;
    let inventoryreportTable;
    let inventoryreportData = [];
    let selectedinventoryreportId = null;

    inventoryreportOptions = {
        processing: false,
        serverSide: true,
        // data: [],
        ajax: {
            url: "{{ route('getinventoryreport') }}",
            type: 'POST',
            dataType: 'json',
            data: function(d) {
                d._token = '{{ csrf_token() }}';
            },
            dataSrc: function(json) {
                inventoryreportData = json.data;
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
                title: 'Quantity',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Unit',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Description',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Property No.',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Date Acquired',
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return "";
                }
            },
            {
                title: 'Amount',
                className: 'text-nowrap p-3 align-middle text-center',
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
            appendButtonsinventoryreport();
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    };

    $(document).ready(function() {
        renderinventoryreportTable();
    })

    function renderinventoryreportTable() {
        if (inventoryreportTable) {
            inventoryreportTable.destroy();
        }
        inventoryreportTable = new DataTable('#inventoryreportTable', inventoryreportOptions)
    }

    $(document).on("click", "#reloadinventoryreportBtn", function() {
        reloadButtonLoading(true);
        reloadinventoryreportTable();
        setTimeout(() => {
            reloadButtonLoading(false);
        }, 500);
    });

    function reloadinventoryreportTable() {
        if (inventoryreportTable) {
            inventoryreportTable.ajax.reload(null, false);
        } else {
            renderinventoryreportTable();
        }
    }

    function reloadinventoryreportTableWithPagination() {
        if (inventoryreportTable) {
            inventoryreportTable.ajax.reload(null, true);
        } else {
            renderinventoryreportTable();
        }
    }

    function appendButtonsinventoryreport() {
        $('#inventoryreportTable_wrapper .row .dt-length').append(`
            <div class="d-flex gap-2 ms-2 align-items-center inventoryreportBtnSm">
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
                <button class="btn btn-info d-flex flex-nowrap align-items-center gap-2" id="reloadinventoryreportBtn">
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
            $("#reloadinventoryreportBtn").html(`
                    <div class="spinner-border text-white" role="status" style="width: 14px; height: 14px">
                </div>
                Reloading
            `);
        } else {
            $("#reloadinventoryreportBtn").html(`
                <i class="bi bi-arrow-clockwise"></i>
                Reload
            `);
        }
    }

    $(document).on('click', '#inventoryreportTable tbody tr', function() {
        let data = inventoryreportTable.row(this).data();
        if (!data) return;

        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            selectedinventoryreportId = null;
        } else {
            $('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            selectedinventoryreportId = data.record_id; // inventoryreport the ID
        }
    });

    // Reinventoryreport selection after reload
    // inventoryreportOptions.drawCallback = function(settings) {
    //     inventoryreportTable.rows().every(function() {
    //         let data = this.data();
    //         if (data.record_id === selectedinventoryreportId) {
    //             $(this.node()).addClass('selected');
    //         }
    //     });
    // };
</script>
