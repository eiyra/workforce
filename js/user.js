$(function () {
  $("#forgotPasswordForm").on("submit", function (e) {
    $.ajax({
      type: "POST",
      url: "action.php",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success == 2) {
          $("#errorMessge").text(response.message);
          $("#errorMessge")
            .removeClass("hidden alert-success")
            .addClass("alert-danger");
        } else if (response.success == 1) {
          $("#inputSection").addClass("hidden");
          $("#errorMessge").text(response.message);
          $("#errorMessge")
            .removeClass("hidden alert-danger")
            .addClass("alert-success");
        } else if (response.success == 0) {
          $("#errorMessge").text(response.message);
          $("#errorMessge")
            .removeClass("hidden alert-success")
            .addClass("alert-danger");
        }
      },
    });
    return false;
  });

  $("#savePasswordForm").on("submit", function (e) {
    $.ajax({
      type: "POST",
      url: "action.php",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.success == 1) {
          $("#errorMessge").text(response.message);
          $("#errorMessge")
            .removeClass("hidden alert-danger")
            .addClass("alert-success");
          $("#savePasswordForm")[0].reset();
        } else if (response.success == 0) {
          $("#errorMessge").text(response.message);
          $("#errorMessge")
            .removeClass("hidden alert-success")
            .addClass("alert-danger");
        }
      },
    });
    return false;
  });
});
