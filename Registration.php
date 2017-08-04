<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="assets/js/ie-emulation-modes-warning.js"></script>
   
   
 </head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">GLI</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="">Home</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

   <div class="container">
   <?php
   session_start();
   if(isset($_SESSION["errMsg"])){
	   echo "<br/><b class='text-danger'> Please correct the following errors </b><br/>";
	   echo "<b class='text-danger'>".$_SESSION["errMsg"]. "</b>";
	   session_destroy();
   }
   ?>
       <form class="form" id="registration_form" method="post" action="doRegistration.php">
        <h2 class="form-signin-heading">Fill The Form</h2>
		<b class="text-primary">First Name * :<b/>
		<br/>
        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="firstName">
		<span class="text-danger" id="first_name_error_msg"></span>
	    <br/>
		Last Name * :
		<br/>
		<input type="text" id="lastName" class="form-control" placeholder="Last Name" name="lastName" >
		<span class="text-danger" id="last_name_error_msg"></span>
		<br/>
		Email * :
		<br/>
        <input type="email" id="email" class="form-control" placeholder="Email (Ex:abc@gmail.com)" name="email" >
		<span class="text-danger" id="email_error_msg"></span>
		<br/>
		Phone * :
		<br/>
		<input type="text" id="phone" class="form-control" placeholder="Phone (Ex:800-123-123)" name="phone">
		<span class="text-danger" id="phone_error_msg"></span>
		<br/>
		Comments:
		<br/>
		<input type="text" id="comments" class="form-control" placeholder="Comments" name="comments">
		<br/>
        
		<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </form>

    </div> <!-- /.container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">© Copyright GLI Inc, 2017</p>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	
</body>
</html>