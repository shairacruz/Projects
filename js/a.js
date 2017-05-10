<script type="text/javascript">
                $(document).ready(function(){
        var UserID = <?php echo $customer_id; ?>;
                        $.ajax({
        url: "/index.php/home/retrievecustomer",
        type: "POST",
        data: {
        UserID:UserID
                                        },
                                        dataType: "json",
                                        success: function(data)
                                        {
                $("#Username").val(data[0]["Username"]);
                $("#Password").val(data[0]["Password"]);
                $("#FName").val(data[0]["FName"]);
                $("#MName").val(data[0]["MName"]);
                $("#LName").val(data[0]["LName"]);
                $("#Email").val(data[0]["Email"]);
                $("#ContactNumber").val(data[0]["ContactNumber"]);
                $("#Address").val(data[0]["Address"]);
                                                },
                                                error: function (XMLHttpRequest, textStatus, errorThrown)
                                        {
                alert(XMLHttpRequest + textStatus + errorThrown);
                                        }
                                          
                                        });

                                $("#Update").on("click", function(){
                var UserID = <?php echo $customer_id; ?>;
                                        var Username = $("#Username").val();
                                        var Password = $("#Password").val();
                                        var FName = $("#FName").val();
                                        var MName = $("#MName").val();
                                        var LName = $("#LName").val();
                                        var Email = $("#Email").val();
                                        var ContactNumber = $("#ContactNumber").val();
                                        var Address = $("#Address").val();
                                        $.ajax(
                                        {
                url: "/index.php/home/updatecustomer",
                type: "POST",
                data:
        {
        "UserID":UserID,
                "Username":Username,
                "Password": Password,
                "FName": FName,
                "MName": MName,
                "LName": LName,
                "Email": Email,
                "ContactNumber": ContactNumber,
                "Address": Address
                                        },
                                        dataType: "json",
                                        success: function(data)
                                        {
                alert("Item Successfully Updated!");
                window.location.assign("http://shai.dev.ph/index.php/home/customer");
                                        },
                                                error: function (XMLHttpRequest, textStatus, errorThrown)
                                        {
                alert(XMLHttpRequest + ", " + textStatus + ", " + errorThrown);
                                        }
                                        });
                                });

                                $("#Cancel").on("click", function(){
                $.ajax({
                url: "/index.php/home/customer",
                        type: "POST",
                        data: {},
                                        dataType: "json",
                                        success: function(data)
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

</script>