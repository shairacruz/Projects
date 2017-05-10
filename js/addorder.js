$(document).ready(function () {
    $.ajax(
            {
                url: "/index.php/home/loadusername",
                type: "POST",
                data: {},
                dataType: "json",
                success: function (data)
                {
                    $("tbody").children("tr").remove();
                    for (var i = 0; i < data.length; i++)
                    {
                        var laman = "<option value=" + data[i]['UserID'] + ">" + data[i]['Username'] + "</option>";
                        $("#username").append(laman);
                    }
                }
            });

    $.ajax({
        url: "/index.php/home/showproduct",
        type: "POST",
        data: {},
        dataType: "json",
        success: function (data)
        {
            console.log(data);
            $("tbody").children("tr").remove();
            for (var i = 0; i < data.length; i++)
            {
                //alert("narito");
                var laman = "<tr data-chk=" + data[i]['ProdID'] + ">" +
                        "<td> <input id=chk" + data[i]['ProdID'] + " class='product-list' type= 'checkbox' name='product[]' value=" + data[i]['ProdID'] + "></td>" +
                        "<td>" + data[i]['ProdName'] + "</td>" +
                        "<td> &#8369;" + parseFloat(data[i]['Price']).toFixed(2) +
                        "<input type=hidden value=" + data[i]['Price'] + " id=price" + data[i]['ProdID'] + "></td>" +
                        "<td align='center'><input id=" + data[i]['ProdID'] + " class='form-control qty qty-disabled qty-list' placeholder='Qty' type='text'/></td>" +
                        "<td id=total" + data[i]['ProdID'] + "> </td></tr>";
                $("#data").append(laman);
                $('#price').change(function () {
                    $('#price').val($('#price').val().toFixed(2));
                });
            }
            $(".qty-list").prop('disabled', false);
        }
    });

    $("#Add").click(function () {
        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var FName = $("#FName").val();
        var MName = $("#MName").val();
        var LName = $("#LName").val();
        var Email = $("#Email").val();
        var ContactNumber = $("#ContactNumber").val();
        var Address = $("#Address").val();

        $.ajax({
            url: "/index.php/home/addcustomer",
            type: "POST",
            data: {
                "Username": Username,
                "Password": Password,
                "FName": FName,
                "MName": MName,
                "LName": LName,
                "Email": Email,
                "ContactNumber": ContactNumber,
                "Address": Address
            },
            dataType: "json",
            success: function (data)
            {
                alert("New Item Successfully Added!");
                window.location.assign("http://shai.dev.ph/index.php/home/customer");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                alert(XMLHttpRequest + textStatus + errorThrown);
            }
        });
    });

    $("#Cancel").click(function () {
        $.ajax({
            url: "/index.php/home/customer",
            type: "POST",
            data: {},
            dataType: "json",
            success: function (data)
            {
                window.location.assign("http://shai.dev.ph/index.php/home/customer");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown)
            {
                bootbox.alert("Error Occured!");
            }
        });
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
                $("tbody").children("tr").remove();
                for (var i = 0; i < data.length; i++)
                {
                    var laman = "<tr data-chk=" + data[i]['ProdID'] + ">" +
                            "<td> <input id=chk" + data[i]['ProdID'] + " class='product-list' type= 'checkbox' name='product[]' value=" + data[i]['ProdID'] + "></td>" +
                            "<td>" + data[i]['ProdName'] + "</td>" +
                            "<td> &#8369;" + data[i]['Price'] +
                            "<input type=hidden value=" + data[i]['Price'] + " id=price" + data[i]['ProdID'] + "></td>" +
                            "<td align='center'><input id=" + data[i]['ProdID'] + " class='form-control qty qty-disabled qty-list' placeholder='Qty' type='text'/></td>" +
                            "<td id=total" + data[i]['ProdID'] + "> </td></tr>";
                    $("#data").append(laman);
                    $('#price').change(function () {
                        $('#price').val($('#price').val().toFixed(2));
                    });
                }
            }
        });
    });
    var qty = [];
    var costprice = [];
    $("#saveorder").on("click", function ()
    {

        event.preventDefault();
        var product = $("input.product-list:checkbox:checked").map(function ()
        {
            return $(this).val();
        }).get();
        qty.splice(0, qty.length);
        for (var i = 0, l = product.length; i < l; i++)
        {
            qty.push($("#" + product[i]).val());
        }
        //console.log(product);
        //console.log(qty);
        //console.log(costprice);
    });

    $("#product-table").on("change", ".product-list", function ()
    {
        var checked_value = $(this).val();
        if (this.checked)
        {
            $("#" + checked_value).prop('disabled', false);
            $("#" + checked_value).removeClass('qty-disabled');
        } else
        {
            $("#" + checked_value).prop('disabled', true);
            $("#" + checked_value).addClass('qty-disabled');
        }
    });

    $("#product-table").on("keyup", ".qty", function ()
    {
        var cost = 0;
        var qty = $(this).val();
        var element = $(this).attr("id");
        var price = $("#price" + element).val();
        cost = price * qty;
        cost.toFixed(2);
        costprice.push(cost);
        $("#total" + element).html(cost);

        //console.log(qty);
        //console.log(costprice);
        var totalPrice = getTotal();

        console.log(totalPrice);
        $("#totalPrice").html(totalPrice);
    });

    function getTotal() {
        var total = 0;
        var i = 0;
        while (costprice.length > i) {
            total += costprice[i];
            i++;
        }
        return total;
    }

});