$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();

        var formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            subject: $("#subject").val(),
            message: $("#message").val(),
        };
  
        $.ajax({
            type: "POST",
            url: "https://downnorthgarlic.com/forms/contact.php",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(data) {
                console.log("success")
                if (!data.success) {
                    console.log(data);
                    $("form").html(
                        '<div class="alert alert-danger">Form inputs were wrong, please try again.</div>'
                    );
                } else {
                    $("form").html(
                        '<div class="alert alert-success">' + data.message + "</div>"
                    );
                }
            },
            error: function(xhr, status, error) {
                console.log("failed1") 
                console.log(xhr)
                console.log(status)
                console.log(error)
                $("form").html(
                    '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
                );
            }
        })

        event.preventDefault();
    });
});