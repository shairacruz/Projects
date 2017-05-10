$(document).ready(function () {
    $.ajax(
            {
                url: "/index.php/home/showorder",
                type: "POST",
                data: {},
                dataType: "json",
                success: function (data)
                {
                    $("tbody").children("tr").remove();
                    for (var i = 0; i < data.length; i++)
                    {
                        var laman = "<tr id=" + data[i]['ProdID'] + "> <td>" + data[i]['ProdName'] + "</td> <td>&#8369; " + parseFloat(data[i]['Price']).toFixed(2) + "</td> <td>" + data[i]['Stock'] + "</td> <td><input type='button' data-id=" + data[i]['ProdID'] + " value='Edit' class='btnedit'> <input type='button' data-id=" + data[i]['ProdID'] + " value='Delete' class='btndelete'></td> </tr>";
                        $("#data").append(laman);
                        $('#price').change(function () {
                            $('#price').val($('#price').val().toFixed(2));
                        });
                    }
                }


            });

    $("#product-table").on("click", ".btndelete", function () {
        var id = $(this).attr("data-id");

        bootbox.confirm({
            size: "small",
            message: "Are you sure to delete?",
            callback: function (result) {
                if (result)
                {

                    $.ajax(
                            {
                                url: "/index.php/home/deleteproduct",
                                type: "POST",
                                data: {"id": id},
                                dataType: "json",
                                success: function ()
                                {
                                    $("#" + id).hide().html('').fadeOut("slow", 1);
                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown)
                                {
                                    alert("error");
                                }
                            });
                } else
                {

                }
            }
        })
    });

    $("#product-table").on("click", ".btnedit", function () {
        var id = $(this).attr("data-id");
        window.location.assign("http://shai.dev.ph/index.php/home/edit_product/" + id);
    });

    $("#search").on("click", function () {
        $("#data").html();
        var txtSearch = $("#product").val();
        console.log(txtSearch);
        $.ajax({
            url: "/index.php/home/showproductbykeyword",
            type: "POST",
            data:
                    {
                        "ProdName": txtSearch
                    },
            dataType: "json",
            success: function (data)
            {
                console.log(data);
                $("tbody").children("tr").remove();
                for (var i = 0; i < data.length; i++)
                {
                    var laman = "<tr id=" + data[i]['ProdID'] + "> <td>" + data[i]['ProdName'] + "</td> <td>&#8369; " + parseFloat(data[i]['Price']).toFixed(2) + "</td> <td>" + data[i]['Stock'] + "</td> <td><input type='button' data-id=" + data[i]['ProdID'] + " value='Edit' class='btnedit'> <input type='button' data-id=" + data[i]['ProdID'] + " value='Delete' class='btndelete'></td> </tr>";
                    $("#data").append(laman);
                    $('#price').change(function () {
                        $('#price').val($('#price').val().toFixed(2));
                    });
                }
            }
        });

    });
});