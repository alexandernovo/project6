<div class="modal fade reportFormModal" id="progressModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="progressModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="reportform">
                <div class="modal-body">
                    @include('staffreport.forms.progressform')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
