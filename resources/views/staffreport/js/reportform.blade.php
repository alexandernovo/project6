<script>
    $(document).on('submit', '.reportform', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        saveupdateForm(formData);
    });

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
                        text: reponse.error,
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
