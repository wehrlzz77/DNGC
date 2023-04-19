$(document).ready(function() {
    $('.php-email-form').submit(function(e) {
        e.preventDefault();
        // Get the form data
        var formData = $(this).serialize();
        console.log(formData);

        // Send an AJAX request to the contact.php file
        $.ajax({
            type: "POST",
            url: "contact.php",
            data: formData,
            success: function(response) {
                if (response == "success") {
                // Do something on success
                console.log("Email sent successfully.");
                } else {
                // Log the error message to the console
                console.log(response);
                }
            },
            error: function(xhr, status, error) {
                // Log the error message to the console
                console.log(error);
            }
        });
    });
});
// $(document).ready(function () {
//     $("form").submit(function (event) {
//         $(".form-group").removeClass("has-error");
//         $(".help-block").remove();

//         var formData = {
//             name: $("#name").val(),
//             email: $("#email").val(),
//             subject: $("#subject").val(),
//             message: $("#message").val(),
//         };
  
//         $.ajax({
//             type: "POST",
//             url: "https://downnorthgarlic.com/forms/contact.php",
//             data: formData,
//             dataType: "json",
//             encode: true,
//             success: function(data) { console.log("success") },
//             error: function(ts) { console.log("failed") }
//         }).done(function (data) {
//             console.log(data);

//             if (!data.success) {
//                 console.log(data);
//                 $("form").html(
//                     '<div class="alert alert-danger">Form inputs were wrong, please try again.</div>'
//                 );
//             } else {
//                 $("form").html(
//                     '<div class="alert alert-success">' + data.message + "</div>"
//                 );
//             }
//         })
//         .fail(function (data) {
//             console.log("form data sent: ")
//             console.log(formData)
//             console.log(data);
//             $("form").html(
//                 '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
//             );
//         });

//         event.preventDefault();
//     });
// });