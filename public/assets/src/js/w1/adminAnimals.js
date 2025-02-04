$(document).ready(
  function () {
    const url = '/projet-final-S3-fevrier-2025-elevage/admin/species/index';
    $.ajax({
      url: url,
      type: 'GET',
      success: function (response) {
        console.log(response);
        const _response = JSON.parse(response);
        _response.forEach(element => {
          $('#animal-species')
            .append(
              `<option value="${element.species_id}">
              ${element.species_name}              
            </option>`
            )
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
    $('#form-add-animal').submit(
      function (e) {
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
            if (!_response.success) {

            }
            else {
              $('#add-animal-success')
                .addClass('alert alert-success mb-3')
                .text(_response.message);
            }
          },
          error: function (xhr, status, error) {
            console.log(error);
          }
        });
      }
    );
  }
);