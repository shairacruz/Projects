<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <title>Add Order</title>
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
                <div class="col-md-12 head">
                    <p> <a href="#" class="nounderline"> <img src="/images/new.png" />&nbsp;&nbsp;New </a>
                        <a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/view.png" />&nbsp;&nbsp;View my Website </a>
                        <a href="#" class="nounderline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/images/support.png" />&nbsp;&nbsp;Get Support </a>
                        <span id="dp"><img src="/images/dp.png" />&nbsp;&nbsp;&nbsp;Cruz, Shaira Yvonne A. </span></p> 
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

                    <p class="active">
                        <img src="/images/file.png" />&nbsp;&nbsp;&nbsp;Orders </a></p>

                    <p class="menu">
                        <a href="http://shai.dev.ph/index.php/home/customer" class="menu"> 
                        <img src="/images/pages.png" />&nbsp;&nbsp;&nbsp;View Customer </a></p>
                </div>

                <div class="col-md-10 no-gutter">
                    <div class="panel-heading">
                        <h3 class="header">Add Order</h3>
                        <h1 id="lbltotal">Total: &#8369; <span id="totalPrice"> </span></h1>
                    </div>
                    <div class="panel-body no no-gutter">
                        <form>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p><select class="form-control search" placeholder="Username" id="username" autofocus>
                                        </select></p>
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
                                            <th id="qty"> Qty </th>
                                            <th id="price"> Cost Price </th>
                                        </tr>
                                    </thead>
                                    <tbody id="data"></tbody>

                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <!-- Include all compiled plugins (below), or include individual files as needed -->

            <script src="/js/bootstrap.min.js"></script>
            <script src="/js/addorder.js"></script>
    </body>
</html>