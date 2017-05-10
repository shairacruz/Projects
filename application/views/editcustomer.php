<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <title>Edit Customer</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <!-- Bootstrap -->
	    <link href="/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/css/stylesheet.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
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
			          	alert(XMLHttpRequest+ textStatus+ errorThrown);
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
				        	alert(XMLHttpRequest + ", " + textStatus + ", " +  errorThrown);
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
	</head>
	<body>

		<div class="container-fluid no-gutter">
	    	<div class="col-xs-12 no-gutter">
		    	<div class="col-md-6 head">
		    		<p> <a href="#" class="nounderline"> <img src="/images/new.png" />&nbsp;&nbsp;New </a>
		    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/view.png" />&nbsp;&nbsp;View my Website </a>
		    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/support.png" />&nbsp;&nbsp;Get Support </a></p> 
		    	</div>

		    	<div class="col-md-6 head">
		     		<p id="dp"> <img src="/images/dp.png" />&nbsp;&nbsp;&nbsp;Cruz, Shaira Yvonne A. </p> 
		    	</div>
			</div>

			<div class="col-xs-12 no-gutter nav">
		    	<div class="col-md-2 no-gutter">
		    		<p id="dashboard1"> 
		    		<a href="http://shai.dev.ph/index.php/home/index" class="menu">
		    		<img src="/images/dashboard.png" />&nbsp;&nbsp;&nbsp;Dashboard </a></p>

		    		<p class="menu">
		    		<a href="http://shai.dev.ph/index.php/home/product" class="menu"> 
		    		<img src="/images/blog.png" />&nbsp;&nbsp;&nbsp;Products </p>

		    		<p class="menu">
		    		<a href="http://shai.dev.ph/index.php/home/order" class="menu"> 
		    		<img src="/images/file.png" />&nbsp;&nbsp;&nbsp;Orders </a></p>

		    		<p class="active">
		    		<img src="/images/pages.png" />&nbsp;&nbsp;&nbsp;View Customer </a></p>
		    	</div>

		    	<div class="col-md-6">
					<div class="panel-heading">
                        <h3 class="heading">Edit Customer</h3>
                    </div>
                    <div class="panel-body">
                        
                            <fieldset>

                                <div class="form-group">
                                    <h4 id="lbl"> UserID:  </h4> <p> <span id="UsedID" value=""><?php echo $customer_id; ?></span></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="15" placeholder="Username" id="Username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="20" placeholder="First Name" id="FName" type="text" autofocus>
                                    <input class="form-control" maxlength="5" placeholder="M.I" id="MName" type="text" autofocus>
                                    <input class="form-control" maxlength="10" placeholder="Last Name" id="LName" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="10" placeholder="Password" id="Password" type="password" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="50" placeholder="Email Address" id="Email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="15" placeholder="Contact Number" id="ContactNumber" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" maxlength="100" placeholder="Address" id="Address" type="text" autofocus>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="address">
                                  <input type="button" value="Update Customer" name="btnAdd" id="Update" class="btnadd">	 
                                  <input type="button" value="Cancel" name="btnCancel" id="Cancel" class="btndelete">      
                                </div>
                          </fieldset>
                    
                    </div>
		    	</div>

		    	<div class="col-md-6">

		    	</div>

			</div>
	    </div>

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <!-- Include all compiled plugins (below), or include individual files as needed -->

	    <script src="/js/bootstrap.min.js"></script>
	    <script src="/js/custom.js"></script>
  	</body>
</html>