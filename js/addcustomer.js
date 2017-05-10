$(document).ready(function () {
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
                "Username": Username, "Password": Password, "FName": FName, "MName": MName, "LName": LName, "Email": Email, "ContactNumber": ContactNumber, "Address": Address
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
});