<script>
    let typeFormReport = "";
    let typeTable = "";
    $(document).on('submit', '.reportform', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        let form = $(this);
        let typeLogin = form.find('input[name="typeLogin"]').val();
        saveupdateForm(formData);
    });

    $(document).on("click", ".editRecord", function() {
        formReset('reportform');
        let record_id = $(this).data("record_id");
        typeFormReport = $(this).data("type");
        typeTable = $(this).data("table") ?? "";

        $(`#${typeFormReport}Modal`).modal("show");

        let findData = reportFormData.find(x => x.record_id == record_id);
        populateForm(findData, "reportform", `_${typeFormReport}`)
    })

    function saveupdateForm(formData) {
        $.ajax({
            url: "{{ route('save_new_staffreport') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == "success") {
                    formReset('reportform');
                    $(`#${typeFormReport}Modal`).modal("hide");

                    if (typeTable == "") {
                        const fnName = `reload${typeFormReport}reportTable`;

                        // check if the function exists in the global scope
                        if (typeof window[fnName] === "function") {
                            window[fnName]();
                        }
                    } else if (typeTable == "staff") {
                        reloadstaffreportTable();
                    } else if (typeTable == "archive") {
                        reloadarchivedTable();
                    }

                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        allowOutsideClick: false
                    });
                }
                if (response.status == "error") {
                    Swal.fire({
                        title: "Failed",
                        text: response.error,
                        icon: "error",
                        showCancelButton: false,
                    })
                }
            },
            error: function(xhr, status, error) {
                let errorMessage = "An unexpected error occurred.";
                errorMessage = errorGetter(xhr, status);
                Swal.fire({
                    title: "Failed",
                    text: errorMessage,
                    icon: "error",
                    showCancelButton: false,
                });
            }
        });
    }
</script>
