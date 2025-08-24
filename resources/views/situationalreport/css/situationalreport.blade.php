<style>
    #situationalreportTable_wrapper .row .dt-length {
        display: flex;
    }

    #situationalreportTable_wrapper .row .dt-length label {
        display: none;
    }

    #situationalreportTable.dataTable>thead>tr>th,
    #situationalreportTable.dataTable>thead>tr>td {
        position: relative !important;
        text-wrap: nowrap !important;
    }

    #situationalreportTable.dataTable>thead>tr>th:last-child {
        position: sticky !important;
        right: 0 !important;
        background: white !important;
        z-index: 3;
        width: 150px;
    }

    #situationalreportTable.dataTable th,
    #situationalreportTable.dataTable td {
        white-space: nowrap !important;
        position: relative;
    }

    #situationalreportTable_wrapper .dt-layout-table {
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

    #situationalreportTable th[data-dt-column="6"] {
        padding: 0 !important;
    }

    th,
    td {
        font-size: 12px !important;
    }
</style>
