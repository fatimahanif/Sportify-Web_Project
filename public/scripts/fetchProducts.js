$(document).ready(function () {
    let total = 0;
    fetchrProducts();
    function fetchrProducts(take = 6) {
        total += take;
        $.ajax({
            type: "GET",
            url: "/admin/products/fetch/" + take,
            dataType: "json",
            success: function (response) {
                $("#tableProducts").html("");
                console.log(response.products);
                $.each(response.products, function (index, item) {
                    $("#tableProducts").append(
                        "<tr>\
                <td><img src='/img/products/" +
                            item.Image +
                            "' class='img-small'/></td>\
                <td>" +
                            item.ProductName +
                            "</td>\
                <td>" +
                            item.Price +
                            "</td>\
                <th><a class='btn btn-danger' id='deleteProduct' data-id=" +
                            item.id +
                            " href='/admin/products/delete/" +
                            item.id +
                            "'>Delete</a></th>\
            </tr>\
                "
                    );
                });
            },
        });
    }

    $(document).on("click", "#loadMoreProducts", function () {
        total += 5;
        fetchrProducts(total);
    });

    // $(document).on("click", "#deleteProduct", function (e) {
    //     e.preventDefault();
    //     const productId = $(this).attr("data-id");
    //     console.log(productId);
    //     // csrf token
    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     const url = "/admin/products/delete/" + productId;
    //     $.ajax({
    //         url: url,
    //         type: "GET",
    //         success: function () {
    //             console.log("product item was deleted");
    //             fetchrProducts($total);
    //         },
    //     });
    // });
});
