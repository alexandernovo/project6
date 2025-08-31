<script>
    let reportOptions;
    let reportTable;
    let reportData = [];
    let selectedreportId = null;

    reportOptions = {
        processing: false,
        serverSide: true,
        scrollX: true,
        // data: [],
        ajax: {
            url: "{{ route('getreport') }}",
            type: 'POST',
            dataType: 'json',
            data: function(d) {
                d._token = '{{ csrf_token() }}';
            },
            dataSrc: function(json) {
                reportData = json.data;
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
                    if (row.filesubmitted) {
                        let fileUrl = "{{ asset('') }}" + row
                            .filesubmitted;
                        return `<a href="${fileUrl}" download><i style="font-size: 18px" class="bi bi-file-earmark-break"></i></a>`;
                    }
                    return 'N/A';
                }
            },
            {
                title: `Date & Time Submitted`,
                className: 'text-nowrap p-3 align-middle text-center',
                render: function(data, type, row) {
                    return formatDateToStr(row.created_at);
                }
            }
        ],
        initComplete: function(settings, json) {
            appendButtonsreport();
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    };

    $(document).ready(function() {
        renderreportTable();
    })

    function renderreportTable() {
        if (reportTable) {
            reportTable.destroy();
        }
        reportTable = new DataTable('#reportTable', reportOptions)
    }

    $(document).on("click", "#reloadreportBtn", function() {
        reloadButtonLoading(true);
        reloadreportTable();
        setTimeout(() => {
            reloadButtonLoading(false);
        }, 500);
    });

    function reloadreportTable() {
        if (reportTable) {
            reportTable.ajax.reload(null, false);
        } else {
            renderreportTable();
        }
    }

    function reloadreportTableWithPagination() {
        if (reportTable) {
            reportTable.ajax.reload(null, true);
        } else {
            renderreportTable();
        }
    }

    function reloadButtonLoading(isLoading) {
        if (isLoading) {
            $("#reloadreportBtn").html(`
                    <div class="spinner-border text-white" role="status" style="width: 14px; height: 14px">
                </div>
                Reloading
            `);
        } else {
            $("#reloadreportBtn").html(`
                <i class="bi bi-arrow-clockwise"></i>
                Reload
            `);
        }
    }
</script>
