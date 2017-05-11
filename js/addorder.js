$(document).ready(function () {
    var totalPrice;
    var qty = [];
    var costprice = [];
    var cost = 0;
    var prod = [];
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
                            "<td> &#8369; " + parseFloat(data[i]['Price']).toFixed(2) + 
                            "<input type=hidden value=" + data[i]['Price'] + " id=price" + data[i]['ProdID'] + "></td>" +
                            "<td align='center'><input id=" + data[i]['ProdID'] + " class=' form-control qty qty-disabled qty-list' placeholder='Qty' type='text'/></td>" +
                            "<td><input class='price form-control cost-list' placeholder='Cost Price' type='text' id=total" + data[i]['ProdID'] + ">  </td></tr>";
                $("#data").append(laman);
            }
            $(".qty-list").prop('disabled', false);
            $(".cost-list").prop('disabled', true);
        }
    });

    $("#SaveOrder").on("click", function () {
        
        var order = [];
        var orderedproduct = [];
        
        order[0] = $("#username").val();
        order[1] = $("#totalPrice").val();
        order[2] = new Date().toJSON().slice(0,10).replace(/-/g,'/');
        
        console.log(order);
        
        var username = $("#username").val();
        var TotalPrice = $("#totalPrice").val();
        

        $.ajax({
            url: "/index.php/home/addorder",
            type: "POST",
            data: {
                "UserID": order[0],
                "TotalPrice": order[1],
                "OrderDate": order[2]
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
                        "<td><input class='form-control cost-list' placeholder='Cost Price' type='text' id=total" + data[i]['ProdID'] + ">  </td></tr>";
                    $("#data").append(laman);
                    $('.price').change(function () {
                        $('.price').val($('#price').val().toFixed(2));
                    });
                }
            }
        });
    });  

    $("#product-table").on("change", ".product-list", function ()
    {
        var zero = 0;
        getProdQtyCost();
        
        var checked_value = $(this).val();
        if (this.checked)
        {           
            $("#" + checked_value).prop('disabled', false);
            $("#" + checked_value).removeClass('qty-disabled');
        } else
        {
            
            $("#totalPrice").html(getTotal());
            $("#" + checked_value).val();
            $("#total" + checked_value).val();
            $("#" + checked_value).prop('disabled', true);
            $("#" + checked_value).addClass('qty-disabled');
        }
    });

    $("#product-table").on("keyup", ".qty", function ()
    {
        var qty = $(this).val();
        var element = $(this).attr("id");
        var price = $("#price" + element).val();
        cost = price * qty;
        
        $("#total" + element).val(cost);
        totalPrice = getTotal();
        $("#totalPrice").html(totalPrice);
        $("#totalPrice").val(totalPrice);
    });
    
    function getTotal() {
        var total = 0;
        var j = 0;
        
        getProdQtyCost();
       
        while (costprice.length > j) {
            //console.log(costprice[j]+total);
            //console.log(total);
            total += parseInt(costprice[j]);
            j++;
        }
        
        //console.log(prod);
        //console.log(qty);
        
        return parseFloat(total).toFixed(2);
    }
    
    function getProdQtyCost(){
        event.preventDefault();
        prod = $("input.product-list:checkbox:checked").map(function ()
        {
            return $(this).val();
        }).get();
        
        qty.splice(0, qty.length);
        for (var i = 0, l = prod.length; i < l; i++)
        {
            qty.push($("#" + prod[i]).val());
        }
        
        costprice.splice(0, costprice.length);
        for (var i = 0, l = prod.length; i < l; i++)
        {
            costprice.push($("#total" + prod[i]).val());
        }
    }

});