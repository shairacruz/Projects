<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	    <title>Add Customer</title>
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
                        <h3 class="heading">Add Customer</h3>
                    </div>
                    <div class="panel-body">
                        
                            <fieldset>
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
                                  <input type="button" value="Add Customer" name="btnAdd" id="Add" class="btnadd">	 
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
	    <script src="/js/addcustomer.js"></script>
  	</body>
</html>