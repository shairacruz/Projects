$(document).ready(function () {
    $.ajax(
            {
                url: "/index.php/home/showcustomer",
                type: "POST",
                data: {},
                dataType: "json",
                success: function (data)
                {
                    $("tbody").children("tr").remove();
                    for (var i = 0; i < data.length; i++)
                    {
                        console.log(data)
                        var laman = "<tr id=" + data[i]['UserID'] + "> <td>" + data[i]['Username'] + "</td> <td>" + data[i]['Name'] + "</td> <td>" + data[i]['Email'] + "</td> <td>" + data[i]['ContactNumber'] + "</td> <td>" + data[i]['Address'] + "</td> <td><input type='button' data-id=" + data[i]['UserID'] + " value='Edit' class='btnedit'> <input type='button' data-id=" + data[i]['UserID'] + " value='Delete' class='btndelete'></td> </tr>";
                        $("#data").append(laman);
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
                                url: "/index.php/home/deletecustomer",
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
        window.location.assign("http://shai.dev.ph/index.php/home/edit_customer/" + id);
    });

    $("#search").on("click", function () {
        $("#data").html();
        var txtSearch = $("#customer").val();
        console.log(txtSearch);
        $.ajax({
            url: "/index.php/home/showcustomerbykeyword",
            type: "POST",
            data:
                    {
                        "Name": txtSearch
                    },
            dataType: "json",
            success: function (data)
            {
                console.log(data);
                $("tbody").children("tr").remove();
                for (var i = 0; i < data.length; i++)
                {
                    var laman = "<tr id=" + data[i]['UserID'] + "> <td>" + data[i]['Username'] + "</td> <td>" + data[i]['Name'] + "</td> <td>" + data[i]['Email'] + "</td> <td>" + data[i]['ContactNumber'] + "</td> <td>" + data[i]['Address'] + "</td> <td><input type='button' data-id=" + data[i]['UserID'] + " value='Edit' class='btnedit'> <input type='button' data-id=" + data[i]['UserID'] + " value='Delete' class='btndelete'></td> </tr>";
                    $("#data").append(laman);
                }
            }
        });

    });
});