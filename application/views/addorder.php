<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <title>Add Product</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <!-- Bootstrap -->
	    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>css/stylesheet.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <script type="text/javascript">
	    	$(document).ready(function(){
	    		var cost = 0;
	    		$.ajax(
				{
					url: "/index.php/home/loadusername",
				       type: "POST",
				       data: {},
				       dataType: "json",
				       success: function(data)
				       {
					        $("tbody").children("tr").remove();
					       	for (var i = 0; i < data.length; i++)
					       	{
					       	var laman = "<option value=" + data[i]['UserID'] +">"+data[i]['Username']+"</option>";
					       	$("#username").append(laman);
				       	}
				    }
				});

				$.ajax({
				   url: "/index.php/home/showproduct",
			       type: "POST",
			       data: {},
			       dataType: "json",
			       success: function(data)
			       {
				        console.log(data);
				        $("tbody").children("tr").remove();
				       	for (var i = 0; i < data.length; i++)
				       	{
				       		//alert("narito");
					       	var laman = "<tr data-chk=" + data[i]['ProdID'] +"><td> <input class='product-list' type= 'checkbox' name='product[]' value="+data[i]['ProdID']+"></td><td>"+data[i]['ProdName']+"</td><td>&#8369; "+data[i]['Price']+"</td> <td><input id="+data[i]['ProdID']+" name='qty["+data[i]['ProdID']+"]' id=" + data[i]['ProdID'] +"class='form-control qty qty-list' type='text'/></td><td> <input type='text' class='form-control' id='total'> </td></tr>";
					       	
					       	$("#data").append(laman);
					       	$('#price').change(function() {
	  							$('#price').val( $('#price').val().toFixed(2));
							});
			       		}
			    	}
			    });

	    		$("#Add").click(function(){
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
				       		"Username":Username, "Password":Password, "FName":FName, "MName":MName, "LName":LName, "Email":Email, "ContactNumber":ContactNumber, "Address":Address
				       	},
				       	dataType: "json",
				       	success: function(data)
				       	{
				       	alert("New Item Successfully Added!");
				        window.location.assign("http://digidirect.dev.ph/index.php/home/customer");
				       	},
				error: function (XMLHttpRequest, textStatus, errorThrown)
				          { 
				          alert(XMLHttpRequest + textStatus + errorThrown);
				          }
				  });
				});

				$("#Cancel").click(function(){
				$.ajax({
				url: "/index.php/home/customer",
				       	type: "POST",
				       	data: {},
				       	dataType: "json",
				       	success: function(data)
				       	{
				        window.location.assign("http://digidirect.dev.ph/index.php/home/customer");
				       	},
				error: function (XMLHttpRequest, textStatus, errorThrown)
				          { 
				          bootbox.alert("Error Occured!");
				          }
				  });
				});

				$("#search").on("click", function(){
					$("#data").html();
					var txtSearch = $("#product").val();
					console.log(txtSearch); 
					$.ajax({
					   url: "/index.php/home/showproductbykeyword",
				       type: "POST",
				       data:
				        {
				       		"ProdName":txtSearch
				       },
				       dataType: "json",
				       success: function(data)
				       {
					        $("tbody").children("tr").remove();
					       	for (var i = 0; i < data.length; i++)
					       	{
						       	var laman = "<tr data-chk=" + data[i]['ProdID'] +"><td> <input class='product-list' type= 'checkbox' name='product[]' value="+data[i]['ProdID']+"></td><td>"+data[i]['ProdName']+"</td><td>&#8369; "+data[i]['Price']+"</td> <td><input id="+data[i]['ProdID']+" name='qty["+data[i]['ProdID']+"]' id=" + data[i]['ProdID'] +"class='form-control qty qty-list' type='text'/></td><td> <input type='text' class='form-control' id='total'> </td></tr>";

						       	$("#data").append(laman);
						       	$('#price').change(function() {
		  							$('#price').val( $('#price').val().toFixed(2));
								});
				       		}
				    	}
			    	});				
				});

				$("#saveorder").on("click", function()
				{
			    	event.preventDefault();
				    var product = $("input.product-list:checkbox:checked").map(function()
				    {
				      return $(this).val();
				    }).get();

				    var qty = [];
				    for ( var i = 0, l = product.length; i < l; i++ )
				    {
					    qty.push($("#" + product[i]).val());
					}

					console.log(product);
					console.log(qty);

				     // <----
				    //console.log($('#id[]').attr("data-chk"));
				    // console.log(product);

				    // var qty = $('input.qty-list').map(function()
				    // {
				    // 	return $(this).val();
				    // }).get(); // <----

				    // for (var i = 0; i >= qty.length; i++) {
			     //  		if (qty[i] == ""){
			     //  			var index = array.indexOf(qty);
			     //  			qty[i].splice(index, i);
			     //  		}
			     //  	}
				    // console.log(qty);
				});
	    });

	    </script>
	</head>
	<body>

		<div class="container-fluid no-gutter">
	    	<div class="col-xs-12 no-gutter">
		    	<div class="col-md-6 head">
		    		<p> <a href="#" class="nounderline"> <img src="<?php echo base_url(); ?>images/new.png" />&nbsp;&nbsp;New </a>
		    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url(); ?>images/view.png" />&nbsp;&nbsp;View my Website </a>
		    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url(); ?>images/support.png" />&nbsp;&nbsp;Get Support </a></p> 
		    	</div>

		    	<div class="col-md-6 head">
		     		<p id="dp"> <img src="<?php echo base_url(); ?>images/dp.png" />&nbsp;&nbsp;&nbsp;Cruz, Shaira Yvonne A. </p> 
		    	</div>
			</div>

			<div class="col-xs-12 no-gutter nav">
		    	<div class="col-md-2 no-gutter">
		    		<p id="dashboard1"> 
		    		<a href="http://digidirect.dev.ph/index.php/home/index" class="menu">
		    		<img src="<?php echo base_url(); ?>images/dashboard.png" />&nbsp;&nbsp;&nbsp;Dashboard </a></p>

		    		<p class="menu">
		    		<a href="http://digidirect.dev.ph/index.php/home/product" class="menu"> 
		    		<img src="<?php echo base_url(); ?>images/blog.png" />&nbsp;&nbsp;&nbsp;Products </p>

		    		<p class="menu">
		    		<a href="http://digidirect.dev.ph/index.php/home/order" class="menu"> 
		    		<img src="<?php echo base_url(); ?>images/file.png" />&nbsp;&nbsp;&nbsp;Orders </a></p>

		    		<p class="active">
		    		<img src="<?php echo base_url(); ?>images/pages.png" />&nbsp;&nbsp;&nbsp;View Customer </a></p>
		    	</div>

		    	<div class="col-md-10">
					<div class="panel-heading">
                        <h3 class="header">Add Order</h3>
                        <h1 id="lbltotal">Total: &#8369; <?php echo 0 ?> </h1>
                    </div>
                <div class="col-md-12">
                    <div class="panel-body">
                    	<form>
                            <fieldset>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" placeholder="Username" id="username" autofocus>
                                    </select>
                                </div>
	                            </div>
	                                <div class="col-md-12">
							    		<h3> Products </h3>
							    		<input class="form-control search" maxlength="30" placeholder="Product Name" id="product" class="search" type="text" autocomplete="off" autofocus>
					                    <input type="button" value="Search" id="search" class="up btnadd">
					                    <button type="button" id="saveorder" class="addbutton"> Save Order </button>
							    	</div>
							    	<div class="col-md-12">
										<table id="product-table">
											<thead>
											<tr> 
												<th> &nbsp;&nbsp;</th>
												<th> Product Name </th>
												<th id="price"> Price </th>
												<th> Qty </th>
												<th id="price"> Cost Price </th>
											</tr>
											</thead>
											<tbody id="data"></tbody>
											
										</table>
							    </div>
	                        </fieldset>
                    	</form>
                    </div>
		    	</div>

		    	<div class="col-md-6">

		    	</div>

			</div>
	    </div>

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <!-- Include all compiled plugins (below), or include individual files as needed -->

	    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url(); ?>js/custom.js"></script>
  	</body>
</html>