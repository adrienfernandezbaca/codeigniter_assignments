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
		      <li class="active"><a href="signin">Sign In</a></li>
		    </ul>
		     <ul class="nav navbar-nav navbar-right">
		      <li><a href="register">Register</a></li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>

		<!-- form -->
		<div id='errors'>
					<?php 
					if(isset($this->session->userdata['registration']))
					{

							echo $this->session->userdata['registration'];
							$this->session->unset_userdata('registration');	
					} 
					?>
		</div>

	<!-- form -->
		<div class="well">
		      <form id="signin" class="form-horizontal" method="post" action="process_login">
				<legend>Sign In</legend>
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
					<label class="control-label"></label>
				     <div class="controls">
				       <button type="submit" class="btn btn-success" >Signin</button>
				     </div>
				</div>
			  </form>
			  <a href="register">Don't have an account? Register...</a>
		</div>
	</div>
</body>
</html>