$(document).ready(
  function () {
    const url = '/projet-final-S3-fevrier-2025-elevage/admin/species/updatable-info';
    $.ajax({
      url: url,
      type: 'GET',
      success: function (response) {
        console.log(response);
        const _response = JSON.parse(response);
        _response.forEach((element,i) => {          
          $('#table-update-species tbody').append( // afaka natao fonction ilay input : InputFactory(args...);
            `<tr>
              <td>
                <input type="hidden" name="species[${i}][species_id]" value="${element.species_id}">
                ${element.species_name}
              </td>
              <td>
                <input type="text" class="form-control" name="species[${i}][min_weight_sale]" value="${element.min_weight_sale}">
              </td>
              <td>
                <input type="text" class="form-control" name="species[${i}][max_weight]" value="${element.max_weight}">
              </td>
              <td>
                <input type="text" class="form-control" name="species[${i}][selling_price]" value="${element.selling_price}">
              </td>
              <td>
                <input type="text" class="form-control" name="species[${i}][day_without_eating]" value="${element.day_without_eating}">
              </td>
              <td>
                <input type="text" class="form-control" name="species[${i}][weight_loss]" value="${element.weight_loss}">
              </td>
            </tr>`
          );
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
    $('#a-very-big-form-indeed').submit(
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
          },
          error: function (xhr, status, error) {
            console.log(error);
          }
        });
      }
    );
  }
);