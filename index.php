<?php
	session_start();
	if(isset($_SESSION['UID'])){
		header("Location:dashboard/");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Address Book</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Address Book</h1>
			<div class="conatiner">
				<div class="row">
					<div class="col-sm-6">
						<button id="login" class="btn btn-lg btn-info" data-toggle="modal" data-target="#loginPop">Login</button>
					</div>
					<div class="col-sm-6">
						<button id="register" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#registerPop">Register</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Login Modal -->
		<div class="modal fade" id="loginPop" tabindex="-1" role="dialog">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<div class="modal-header text-center">
						<h3>Login</h3>
						<p id="res"></p>
					</div>
					<div class="modal-body">
						<form class="form-vertical" role="form" id="loginForm">		        	
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="form-group col-sm-6">
									<label>Username</label>
									<input type="text" class="form-control" name="username" id="username" autocomplete="off" />
								</div>
								<div class="col-sm-3"></div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="form-group col-sm-6">
									<label>Password</label>
									<input type="password" class="form-control" name="password" id="password" autocomplete="off" />
								</div>
								<div class="col-sm-3"></div>
							</div>		        	
						
							<div class="modal-footer">
								<div class="col-sm-6">
									<input type="submit" value="Login" name="submit" class="btn btn-success" id="loginBtn" />
								</div>
								<div class="col-sm-6">
									<input type="reset" value="Reset" class="btn btn-danger" id="resetBtn" />
								</div>
							</div>
						</form>
					</div>
		    	</div>    
		  	</div>
		</div>

		<!-- Registration Modal -->
		<div class="modal fade" id="registerPop" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h3>Create A New Account</h3>
		        <p id="resRegister"></p>
		      </div>
		      <div class="modal-body">
		        <form class="form-vertical" role="form" id="registerForm">
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>First Name</label>
			        		<input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Last Name</label>
			        		<input type="text" class="form-control" name="ln" id="ln" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Choose Username</label>
			        		<input type="text" class="form-control" name="username" id="username" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>
		        	<div class="row">
		        		<div class="col-sm-3"></div>
		        		<div class="form-group col-sm-6">
			        		<label>Choose Password</label>
			        		<input type="password" class="form-control" name="password" id="password" autocomplete="off" />
			        	</div>
			        	<div class="col-sm-3"></div>
		        	</div>		        	
		        
		        <div class="modal-footer">
		        	<div class="col-sm-6">
		        		<input type="submit" value="Register" name="submit" class="btn btn-success" id="regBtn" />
		        	</div>
		        	<div class="col-sm-6">
		        		<input type="reset" value="Reset" class="btn btn-danger" id="resetBtn" />
		        	</div>
	        		</form>
			    </div>
		      </div>
		      
		    </div>    
		  </div>
		</div>

		<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/custom.js"></script>
	</body>
</html>