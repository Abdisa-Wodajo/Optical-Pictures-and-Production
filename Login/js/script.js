$(document).ready(function () {
  $("form").on("submit", function (e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
      type: form.attr("method"),
      url: form.attr("action"),
      data: form.serialize(),
      success: function (data) {
        var $response = $("<div>").html(data);

        // Update error message
        var errorMsg = $response.find(".error").text();
        if (errorMsg) {
          $(".error").text(errorMsg).show();
        } else {
          $(".error").hide();
        }

        // Update success message
        var successMsg = $response.find(".success").text();
        if (successMsg) {
          $(".success").text(successMsg).show();
        } else {
          $(".success").hide();
        }

        // Update input fields with previous values
        $('input[name="name"]').val($response.find('input[name="name"]').val());
        $('input[name="uname"]').val(
          $response.find('input[name="uname"]').val()
        );
      },
      error: function () {
        alert("An error occurred during the AJAX request.");
      },
    });
  });
});
