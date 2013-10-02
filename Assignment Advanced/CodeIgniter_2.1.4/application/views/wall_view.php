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
		<div class="well">
			<form class="form-horizontal" method="post" action="new_message">
				<legend>Post a message on the wall "<?php echo $this->input->get('id')?>"</legend>
				<div class="control-group">
					<div class="controls">
					    <div class="input-prepend">
						<span class="add-on"><i class="icon-lock"></i></span>
						<textarea id="msg" class="input-xlarge" name="msg"></textarea>
						<?= "<input type='hidden' value='".$this->input->get('id')."' name='id'/>";
						 ?>			
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="btn btn-success" >Post</button>
					</div>
				</div>
		  	</form>
		</div>
		<div id="wall">		
			<?php 
			echo $this->session->userdata('wall');
			 ?>
		</div>
	</div>
</body>
</html>