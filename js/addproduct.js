$(document).ready(function () {
    $("#Add").click(function () {
        var ProdName = $("#ProdName").val();
        var Stock = $("#Stock").val();
        var Price = $("#Price").val();
        $.ajax({
            url: "/index.php/home/addproduct",
            type: "POST",
            data: {
                ProdName: ProdName, Stock: Stock, Price: Price
            },
            dataType: "json",
            success: function (data)
            {
                alert("New Item Successfully Added!");
                window.location.assign("http://shai.dev.ph/index.php/home/product");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert("Error Occured!");
            }
        });
    });

    $("#Cancel").click(function () {
        $.ajax({
            url: "/index.php/home/product",
            type: "POST",
            data: {},
            dataType: "json",
            success: function (data)
            {
                window.location.assign("http://shai.dev.ph/index.php/home/product");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                bootbox.alert("Error Occured!");
            }
        });
    });
});