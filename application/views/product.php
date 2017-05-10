<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <title>Products</title>

	    <!-- Bootstrap -->
	    <link href="/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/css/stylesheet.css" rel="stylesheet">

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	    <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>

		<script type="text/javascript">
		$(document).ready(function(){
			$.ajax(
			{
				url: "/index.php/home/showproduct",
			       type: "POST",
			       data: {},
			       dataType: "json",
			       success: function(data)
			       {
				        $("tbody").children("tr").remove();
				       	for (var i = 0; i < data.length; i++)
				       	{
				       	var laman = "<tr id=" + data[i]['ProdID'] +"> <td>"+data[i]['ProdName']+"</td>"+
                                                "<td>&#8369; "+parseFloat(data[i]['Price']).toFixed(2)+"</td>"+
                                                "<td>"+data[i]['Stock']+"</td>"+
                                                "<td><input type='button' data-id=" + data[i]['ProdID'] + " value='Edit' class='btnedit'>"+
                                                "<input type='button' data-id=" + data[i]['ProdID'] +" value='Delete' class='btndelete'></td> </tr>";
				       	$("#data").append(laman);
				       	$('#price').change(function() {
  							$('#price').val( $('#price').val().toFixed(2));
						});
			       	}
			    }


			});

			$("#product-table").on("click", ".btndelete", function(){
				var id = $(this).attr("data-id");

				bootbox.confirm({ 
				  size: "small",
				  message: "Are you sure to delete?", 
				  callback: function(result){
				  	if (result) 
				  	{
				  		
					    $.ajax(
						{
							url: "/index.php/home/deleteproduct",
						       	type: "POST",
						       	data: { "id" : id},
						       	dataType: "json",
						    	success: function()
						       	{
							    	$("#" + id).hide().html('').fadeOut("slow", 1);
						       	},
								error: function (XMLHttpRequest, textStatus, errorThrown)
						        { 
						         	alert("error");
						       	}
						});
					} 
					else 
					{
					    
					}
				  }
				})
			});

			$("#product-table").on("click", ".btnedit", function(){
				var id = $(this).attr("data-id");
				window.location.assign("http://shai.dev.ph/index.php/home/edit_product/"+id);
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
				        console.log(data);
				        $("tbody").children("tr").remove();
				       	for (var i = 0; i < data.length; i++)
				       	{
					       	var laman = "<tr id=" + data[i]['ProdID'] +"> <td>"+data[i]['ProdName']+"</td> <td>&#8369; "+parseFloat(data[i]['Price']).toFixed(2)+"</td> <td>"+data[i]['Stock']+"</td> <td><input type='button' data-id=" + data[i]['ProdID'] + " value='Edit' class='btnedit'> <input type='button' data-id=" + data[i]['ProdID'] +" value='Delete' class='btndelete'></td> </tr>";
					       	$("#data").append(laman);
					       	$('#price').change(function() {
	  							$('#price').val( $('#price').val().toFixed(2));
							});
			       		}
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

			<div class="col-xs-12 no-gutter">
		    	<div class="col-md-2 no-gutter nav">
		    		<p id="dashboard1"> 
		    		<a href="http://shai.dev.ph/index.php/home/index" class="menu">
		    		<img src="/images/dashboard.png" />&nbsp;&nbsp;&nbsp;Dashboard </a></p>

		    		<p class="active">
		    		<img src="/images/blog.png" />&nbsp;&nbsp;&nbsp;Products </p>

		    		<p class="menu">
		    		<a href="http://shai.dev.ph/index.php/home/order" class="menu"> 
		    		<img src="/images/file.png" />&nbsp;&nbsp;&nbsp;Orders </a></p>

		    		<p class="menu">
		    		<a href="http://shai.dev.ph/index.php/home/customer" class="menu"> 
		    		<img src="/images/pages.png" />&nbsp;&nbsp;&nbsp;View Customer </a></p>
		    	</div>

		    	<div class="col-md-10">
		    		<h2 class="heading"> Products </h2>
		    		<input class="form-control search" maxlength="30" placeholder="Product Name" id="product" name="txtProdName" type="text" autocomplete="off" autofocus>
                    <input type="button" value="Search" id="search" class="btnadd">
                    <button onclick="window.location.href='http://shai.dev.ph/index.php/home/add_product'" type="button" class="addbutton"> Add New </button>
		    	</div>

		    	<div class="col-md-10">
					<table id="product-table">
						<thead>
						<tr> 
							<th> &nbsp;&nbsp;Product Name </th>
							<th id="price"> Price </th>
							<th> Stocks </th>
							<th> Action </th>
						</tr>
						</thead>
						<tbody id="data"></tbody>
						
					</table>
		    	</div>
			</div>
	    </div>

	    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="/js/bootstrap.min.js"></script>
	    <script src="/js/bootbox.min.js"></script>
	    <script src="/js/custom.js"></script>
  	</body>
</html>