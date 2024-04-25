$(document).ready(function () {
    $("#contact-us-btn").on("click", function () {
        if (validateContactUsForm()) {
            $("#contact-us-btn").hide();
            $("#loadingBtn").removeAttr("hidden");

            var email = $("#email").val();
            var service = $("#service").val();
            var description = $("#description").val();

            var formData = new FormData();
            formData.append("email", email);
            formData.append("service", service);
            formData.append("message", description);
            var csrfToken = $('meta[name="csrf-token"]').attr("content");

            // AJAX request
            $.ajax({
                url: "/submit-contact-message",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    toastr.success(response.success);
                    $("#contact-us-btn").show();
                    $("#loadingBtn").attr("hidden", true);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                    toastr.error("Error occurred while sending the message.");

                    $("#contact-us-btn").show();
                    $("#loadingBtn").attr("hidden", true);
                },
            });
        }
    });

    // validate contact us form
    function validateContactUsForm() {
        var email = $("#email").val();
        var service = $(".custom-border-color").val();
        var description = $("#description").val();

        // Reset error messages and border colors
        $("#email_error", "#description_error", "#service_error").text("");
        $("#email", ".custom-border-color", "#description").css(
            "border-color",
            ""
        );

        if (!email) {
            $("#email_error").text("Email is required.").css("color", "red");
            $("#email").css("border-color", "red");
        } else if (!isValidEmail(email)) {
            $("#email_error")
                .text("Please enter a valid email address.")
                .css("color", "red");
            $("#email").css("border-color", "red");
        }

        if (!service) {
            $("#service_error")
                .text("Service type is required.")
                .css("color", "red");
            $(".custom-border-color").css("border-color", "red");
        }

        if (!description) {
            $("#description_error")
                .text("Description is required.")
                .css("color", "red");
            $("#description").css("border-color", "red");
        }

        // Check if there are any errors
        if (
            $("#email_error").text() ||
            $("#service_error").text() ||
            $("#description_error").text()
        ) {
            return false;
        }

        // Set the values if they are valid
        $("#email").val(email);
        $("#service").val(service);
        $("#description").val(description);

        return true;
    }

    function isValidEmail(email) {
        // Regular expression for a simple email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // email error handeling
    $("body").on("input", "#email", function () {
        var email = $(this).val();

        if (!email) {
            $("#email_error").text("Email is required.").css("color", "red");
            $("#email").css("border-color", "red");
        } else if (!isValidEmail(email)) {
            $("#email_error")
                .text("Please enter a valid email address.")
                .css("color", "red");
            $("#email").css("border-color", "red");
        } else {
            $("#email_error").text("");
            $("#email").css("border-color", "");
        }

        if (email) {
            $(this).val(email);
        } else {
            $(this).val("");
        }
    });

    // service input event handler

    $(".custom-border-color").on("blur", function () {
        $("#service_error").text("");
        $(".custom-border-color").css("border-color", "");
    });

    // description input event handler
    $("#description").on("input", function () {
        var description = $("#description").val();

        if (!description) {
            $("#description_error")
                .text("Description is required.")
                .css("color", "red");
            $("#description").css("border-color", "red");
        } else {
            $("#description_error").text("");
            $("#description").css("border-color", "");
        }
    });
});
