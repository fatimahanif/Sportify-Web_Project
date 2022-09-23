$(document).ready(function () {
    fetchProducts();
    function fetchProducts() {
        let i = 0;
        $.ajax({
            type: "GET",
            url: "/products/ajax/fetch",
            dataType: "json",
            success: function (response) {
                $("#cart-content-div").html(" ");
                $.each(response.productArray, function (key, item) {
                    $("#cart-content-div").append(
                        '<div class="cart-item"> \
                    <img src="/img/products/' +
                            item.Image +
                            '" alt="Product" />\
                    <div>\
                        <h4>' +
                            item.ProductName +
                            "</h4>\
                        <h5>" +
                            item.Price +
                            '</h5>\
                        <span class="remove-item">Quantity: <span\
                                style="border-radius: 100%">' +
                            response.quantityArray[i] +
                            '</span></span>\
                    </div>\
                    <div>\
                        <a href="/products/cart/delete/ ' +
                            response.cartIds[i] +
                            '" id="removeCartItem" data-id="' +
                            response.cartIds[i] +
                            '">\
                        <span class="remove-item text-danger">Remove</span></a>\
                    </div>\
                </div> '
                    );
                    i++;
                });
            },
        });
    }

    $(document).on("click", "#removeCartItem", function (e) {
        e.preventDefault();
        const cartId = $(this).attr("data-id");
        // csrf token
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // Code to delete the cart item
        $.ajax({
            url: "/products/cart/delete/" + cartId,
            type: "DELETE",
            success: function () {
                console.log("Cart item was deleted");
                fetchProducts();
            },
        });
    });
});
