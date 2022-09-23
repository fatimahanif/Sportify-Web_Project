$(document).ready(function() {
    let total = 0;
    fetchCategories();

    function fetchCategories(take = 6) {
        total += take;
        $.ajax({
            type: "GET",
            url: "/admin/categories/fetch/" + take,
            dataType: "json",
            success: function(response) {
                $("#tableCategories").html("");
                console.log(response.categories);
                $.each(response.categories, function(index, item) {
                    $("#tableCategories").append(
                        "<tr>\
                <td>" +
                        item.CategoryName +
                        "</td>\
                <td>" +
                        item.CategoryDescription +
                        "</td>\
                <th><a class='btn btn-danger' id='deleteProduct' data-id=" +
                        item.id +
                        " href='/admin/categories/delete/" +
                        item.id +
                        "'>Delete</a></th>\
            </tr>\
                "
                    );
                });
            },
        });
    }

    $(document).on("click", "#loadMoreProducts", function() {
        total += 5;
        fetchCategories(total);
    });

});