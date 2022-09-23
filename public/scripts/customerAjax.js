// $(document).ready(function () {
//     $("#userForm").submit(function (e) {
//         return false;
//     });
//     $(document).on("click", "#formSubmissionUser", function () {
//         let userId = $("#userId").val();
//         var values = $("#fileUpload")
//             .map(function () {
//                 return $(this).val();
//             })
//             .get()
//             .join();
//         let data = {
//             userImage: values,
//             fname: $("#fname").val(),
//             lname: $("#lname").val(),
//             uname: $("#uname").val(),
//             pwd: $("#pwd").val(),
//             cpwd: $("#cpwd").val(),
//             phone: $("#phone").val(),
//             address: $("#address").val(),
//         };

//         // csrf token
//         $.ajaxSetup({
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//         });

//         $.ajax({
//             type: "PUT",
//             url: "/customer/" + userId,
//             data: data,
//             dataType: "json",
//             success: function (response) {
//                 if (response.status == 404) {
//                     $("#infoBox").html("");
//                     $("#infoBox").css("bg-danger");
//                     $("#infoBox").append("<p>" + response.message + "</p>");
//                 } else if (response.status == 200) {
//                     $("#infoBox").html("");
//                     $("#infoBox").css("bg-success");
//                     $("#infoBox").append("<p>" + response.message + "</p>");
//                 }
//             },
//         });
//     });
// });
