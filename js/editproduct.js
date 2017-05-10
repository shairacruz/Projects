$(document).ready(function () {
    var ProdID = $("#ProdID").val();
    $.ajax({
        url: "/index.php/home/retrieveproduct",
        type: "POST",
        data: {
            ProdID: ProdID
        },
        dataType: "json",
        success: function (data)
        {
            $("#ProdID").val(data[0]["ProdID"])
            $("#ProdName").val(data[0]["ProdName"]);
            $("#Price").val(data[0]["Price"]);
            $("#Stock").val(data[0]["Stock"]);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown)
        {
            alert("Error Occured!");
        }

    });

    $("#Update").click(function () {
        var ProdName = $("#ProdName").val();
        var Stock = $("#Stock").val();
        var Price = $("#Price").val();
        $.ajax({
            url: "/index.php/home/updateproduct",
            type: "POST",
            data: {
                ProdID: ProdID, ProdName: ProdName, Stock: Stock, Price: Price
            },
            dataType: "json",
            success: function (data)
            {
                alert("Item Successfully Updated!");
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