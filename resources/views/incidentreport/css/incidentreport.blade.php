<style>
    #incidentreportTable_wrapper .row .dt-length {
        display: flex;
    }

    #incidentreportTable_wrapper .row .dt-length label {
        display: none;
    }

    #incidentreportTable.dataTable>thead>tr>th,
    #incidentreportTable.dataTable>thead>tr>td {
        position: relative !important;
        text-wrap: nowrap !important;
    }

    #incidentreportTable.dataTable>thead>tr>th:last-child {
        position: sticky !important;
        right: 0 !important;
        background: white !important;
        z-index: 3;
        width: 150px;
    }

    #incidentreportTable.dataTable th,
    #incidentreportTable.dataTable td {
        white-space: nowrap !important;
        position: relative;
    }

    #incidentreportTable_wrapper .dt-layout-table {
        overflow-x: auto !important;
        overflow-y: hidden !important;
    }

    .sticky-action {
        position: sticky !important;
        right: 0 !important;
        background: white !important;
        z-index: 3;
        width: 80px !important;
    }

    #incidentreportTable th[data-dt-column="8"] {
        padding: 0 !important;
    }

    th, td
    {
        font-size: 12px !important;
    }
</style>
