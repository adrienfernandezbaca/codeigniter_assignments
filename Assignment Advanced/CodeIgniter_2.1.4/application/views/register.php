<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>

	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="home">Test App</a>
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		      <li ><a href="home">Home</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="signin">Sign In</a></li>
		    </ul>
		     <ul class="nav navbar-nav navbar-right">
		      <li class="active"><a href="register">Register</a></li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>

	<!-- form -->
		<div class="well">
				<div id='registration-msg'>
					<?php 
					if(isset($this->session->userdata['errors']))
					{
						foreach($this->session->userdata['errors'] as $row)
						{
							echo $row;
						}
						$this->session->unset_userdata('errors');	
					} 

					if(isset($this->session->userdata['registration']))
					{

							echo $this->session->userdata['registration'];
							$this->session->unset_userdata('registration');	
					} 

					?>
				</div>
		      <form id="signup" class="form-horizontal" method="post" action="process_registration">
				<legend>Sign Up</legend>
				<div class="control-group">
			        <label class="control-label">First Name</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" class="input-xlarge" id="fname" name="fname" placeholder="First Name">
						</div>
					</div>
				</div>
				<div class="control-group ">
			        <label class="control-label">Last Name</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" class="input-xlarge" id="lname" name="lname" placeholder="Last Name">
						</div>
					</div>
				</div>
				<div class="control-group">
			        <label class="control-label">Email</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span>
							<input type="text" class="input-xlarge" id="email" name="email" placeholder="Email">
						</div>
					</div>
				</div>
				<div class="control-group">
			        <label class="control-label">Password</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
							<input type="Password" id="passwd" class="input-xlarge" name="passwd" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="control-group">
			        <label class="control-label">Confirm Password</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
							<input type="Password" id="conpasswd" class="input-xlarge" name="conpasswd" placeholder="Re-enter Password">
						</div>
					</div>
				</div>

				<div class="control-group">
				<label class="control-label"></label>
			      <div class="controls">
			       <button type="submit" class="btn btn-success" >Create My Account</button>

			      </div>

			</div>

			  </form>

		</div>
	</div>
</body>
</html>