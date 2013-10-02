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
		      <a class="navbar-brand" href="dashboard">Test App</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse navbar-ex1-collapse">
		      <ul class="nav navbar-nav">
		        <li><a href="dashboard">Home</a></li>
		        <li><a href="dashboard">Dashboard</a></li>
		        <li><a href=<?php echo "edit?id=".$this->session->userdata['user_info']['id'] ?>>Profile</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href=<?php echo "wall?id=".$this->session->userdata['user_info']['id'].">".$this->session->userdata['user_info']['first_name']."  ".$this->session->userdata['user_info']['last_name']; ?></a></li>
		        <li><a href="logout">Logout</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
	  </nav>

	<!-- form -->
		<div class="well edit_information left">
				      <form class="form-horizontal" method="post" action="user_editing">
				<legend>Edit Information</legend>
				<div class="control-group">
			        <label class="control-label">First Name</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
							<?php 

							if(isset($this->session->userdata['edit_user']))
							{
								echo '<input type="text" class="input-xlarge" id="fname" name="fname" value="'.$this->session->userdata['edit_user'][0]->first_name.'">';
							}
							else
							{
								echo '<input type="text" class="input-xlarge" id="fname" name="fname" placeholder="First Name">';
							}
							 ?>	
						</div>
					</div>
				</div>
				<div class="control-group ">
			        <label class="control-label">Last Name</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-user"></i></span>
							<?php  

							if(isset($this->session->userdata['edit_user']))
							{
								echo '<input type="text" class="input-xlarge" id="lname" name="lname" value="'.$this->session->userdata['edit_user'][0]->last_name.'">';
							}
							else
							{
								echo '<input type="text" class="input-xlarge" id="lname" name="lname" placeholder="Last Name">';
							}

							?>		
						</div>
					</div>
				</div>
				<div class="control-group">
			        <label class="control-label">Email</label>
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-envelope"></i></span>
							<?php  

							if(isset($this->session->userdata['edit_user']))
							{
								echo '<input type="text" class="input-xlarge" id="email" name="email" value="'.$this->session->userdata['edit_user'][0]->email.'">';
							}
							else
							{
								echo '<input type="text" class="input-xlarge" id="email" name="email" placeholder="Email">';
							}
							echo "<input type='hidden' value='".$this->input->get('id')."' name='id'/>";
							
							?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="btn btn-success" >Save</button>
					</div>
				</div>
			</form>
		</div>
		<div class="well edit_information right">
			<form class="form-horizontal" method="post" action="user_editing">
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


				<legend>Change Password</legend>
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
						<button type="submit" class="btn btn-success" >Update Password</button>
					</div>
				</div>
				<?php 
				echo "<input type='hidden' value='".$this->input->post('id')."' name='id'/>";
				 ?>
		  	</form>
		</div>
		<div class="well">
			<form class="form-horizontal" method="post" action="user_editing">
				<legend>Edit description</legend>
				<div class="control-group">
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
						<?php 

							if(isset($this->session->userdata['edit_user']))
							{
								echo '<textarea id="description" class="input-xlarge" name="description" value="'.$this->session->userdata['edit_user'][0]->description.'"></textarea>';
							}
							else
							{
								echo '<textarea id="description" class="input-xlarge" name="description"></textarea>';
							}
						 	echo "<input type='hidden' value='".$this->input->get('id')."' name='id'/>";
						 ?>
						
							
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="btn btn-success" >Save</button>
					</div>
				</div>
				<?php 
				echo "<input type='hidden' value='".$this->input->get('id')."' name='id'/>";
				 ?>
		  	</form>
		</div>
	</div>
</body>
</html>