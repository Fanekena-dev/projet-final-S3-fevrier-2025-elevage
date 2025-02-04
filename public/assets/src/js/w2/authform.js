$(document).ready(function () {
    $('#admin-signin-form').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const url = this.action;
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                const _response = JSON.parse(response);
                if (!response.success) {
                    $('#message')
                        .addClass('alert alert-danger mb-3')
                        .text(_response.message);
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
});