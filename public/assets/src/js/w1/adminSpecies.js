$(document).ready(
  function () {
    function validateInteger(input) {
      return /^\d+$/.test(input);
    }

    function validateDecimal(input) {
      return /^\d+(\.\d{1,2})?$/.test(input);
    }

    function validateInput(input, validator) {
      let value = $(input).val();
      let isValid = validator(value);
      let errorMessage = $(input).next(".error-message");

      if (isValid) {
        $(input).removeClass("is-invalid").addClass("is-valid");
        errorMessage.hide();
      } else {
        $(input).removeClass("is-valid").addClass("is-invalid");
        errorMessage.show();
      }
    }

    const url = '/projet-final-S3-fevrier-2025-elevage/admin/species/updatable-info';
    $.ajax({
      url: url,
      type: 'GET',
      success: function (response) {
        console.log(response);
        const _response = JSON.parse(response);
        _response.forEach((element, i) => {
          $('#table-update-species tbody').append( // afaka natao fonction ilay input : InputFactory(args...);
            `<tr>
              <td>
                <input type="hidden" name="species[${i}][species_id]" value="${element.species_id}">
                ${element.species_name}
              </td>
              <td>
                <input type="text" class="form-control validate-decimal" name="species[${i}][min_weight_sale]" value="${element.min_weight_sale}">
              </td>
              <td>
                <input type="text" class="form-control validate-decimal" name="species[${i}][max_weight]" value="${element.max_weight}">
              </td>
              <td>
                <input type="text" class="form-control validate-decimal" name="species[${i}][selling_price]" value="${element.selling_price}">
              </td>
              <td>
                <input type="text" class="form-control validate-number" name="species[${i}][day_without_eating]" value="${element.day_without_eating}">
              </td>
              <td>
                <input type="text" class="form-control validate-decimal" name="species[${i}][weight_loss]" value="${element.weight_loss}">
              </td>
            </tr>`
          );
          $(".validate-number").on("input", function () {
            if ($('#update-btn-submit').hasClass('disabled')) $('#update-btn-submit').removeClass('disabled').text('Validate update');
            validateInput(this, validateInteger);
          });

          $(".validate-decimal").on("input", function () {
            if ($('#update-btn-submit').hasClass('disabled')) $('#update-btn-submit').removeClass('disabled').text('Validate update');
            validateInput(this, validateDecimal);
          });
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
      }
    });
    $('#a-very-big-form-indeed').submit(
      function (e) {
        e.preventDefault();

        let allValid = true;

        $(".validate-number").each(function () {
          if (!validateInteger($(this).val())) {
            validateInput(this, validateInteger);
            allValid = false;
          }
        });

        $(".validate-decimal").each(function () {
          if (!validateDecimal($(this).val())) {
            validateInput(this, validateDecimal);
            allValid = false;
          }
        });

        if (!allValid) {
          alert("Correct all errors before sending !");
          return;
        }

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
              $('#update-success')
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