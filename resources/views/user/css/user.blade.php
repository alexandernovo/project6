<style>
    #userTable_wrapper .row .dt-length {
        display: flex;
    }

    #userTable_wrapper .row .dt-length label {
        display: none;
    }

    #userTable.dataTable>thead>tr>th,
    #userTable.dataTable>thead>tr>td {
        position: relative !important;
        text-wrap: nowrap !important;
    }

    #userTable.dataTable>thead>tr>th:last-child {
        position: sticky !important;
        right: 0 !important;
        background: white !important;
        z-index: 3;
        width: 150px;
    }

    #userTable.dataTable th,
    #userTable.dataTable td {
        white-space: nowrap !important;
        position: relative;
    }

    #userTable_wrapper .dt-layout-table {
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

    #userTable th[data-dt-column="6"] {
        padding: 0 !important;
    }

    th,
    td {
        font-size: 12px !important;
    }
</style>
