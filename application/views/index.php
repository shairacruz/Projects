<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="css/stylesheet.css" rel="stylesheet">-->
    <link rel = "stylesheet" type = "text/css" href = "/css/stylesheet.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
    <div class="container-fluid no-gutter">
    	<div class="col-xs-12 no-gutter" id="links">
	    	<div class="col-md-6 head" id="header">
	    		<p> <a href="#" class="nounderline"> <img src="/images/new.png" />&nbsp;&nbsp;New </a>
	    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/view.png" />&nbsp;&nbsp;View my Website </a>
	    		<a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/support.png" />&nbsp;&nbsp;Get Support </a></p> 
	    	</div>

	    	<div class="col-md-6 head" id="profile">
	     		<p id="dp"> <img src="/images/dp.png" />&nbsp;&nbsp;&nbsp;Cruz, Shaira Yvonne A. </p> 
	    	</div>
		</div>

		<div class="col-xs-12 no-gutter nav">
	    	<div class="col-md-2 no-gutter" id="nav">
	    		<p id="dashboard"> 
	    		<img src="/images/dashboard.png" />&nbsp;&nbsp;&nbsp;Dashboard </a></p>

	    		<p class="menu active">
	    		<a href="http://shai.dev.ph/index.php/Home/product" class="menu"> 
	    		<img src="/images/blog.png" />&nbsp;&nbsp;&nbsp;Products </a></p>

	    		<p class="menu">
	    		<a href="http://shai.dev.ph/index.php/Home/order" class="menu"> 
	    		<img src="/images/file.png" />&nbsp;&nbsp;&nbsp;Orders </a></p>

	    		<p class="menu">
	    		<a href="http://shai.dev.ph/index.php/Home/customer" class="menu"> 
	    		<img src="/images/pages.png" />&nbsp;&nbsp;&nbsp;View Customer </a></p>
	    	</div>
	    	<div class="col-md-10" id="graph-data-container">

	    		<div class="first-panel" id="first-container">
	    			<div id="container1"> </div>   	
			    </div>

			    <div class="second-panel" id="second-container">
			    	<h3 id="key"> Key Figures </h3>
			    	<p> <br />Total New Customers This Month <span class="stat" id="NCM"> 38 </span><br/>
						Total New Customers - Last 30 days <span class="stat" id="TNC"> 270 </span><br/>
						Total Invoiced Month To Date <span class="stat" id="TIM"> &#36;11,762.80 </span><br/>
						Total Invoiced Excl Tax Month To Date <span class="stat" id="TIE"> &#36;10,692.82 </span><br/>
						Total Invoiced - Last 30 days <span class="stat" id="TI"> &#36;61,360.21 </span><br/>
						Average Daily Sales - Last 30 days <span class="stat" id="ADS"> &#36;2,037.21 </span><br/>
						Total Number Of Products In Database <span class="stat" id="TNP"> 7,963 </span><br/>
					</p>	    	
			    </div>

			    <div class="third-panel" id="third-container">
			    	<div id="container3"> </div>
			    </div>

			    <div class="fourth-panel" id="fourth-container">

			    </div>
	    	</div>
		</div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <!--<script src="js/custom.js"></script>-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script type = 'text/javascript' src = "/js/custom.js"></script>
 
  </body>
</html>

