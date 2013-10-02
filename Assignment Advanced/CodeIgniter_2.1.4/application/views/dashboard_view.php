<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../../assets/css/login.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('a').click(function(){
        $(this).closest("form").submit(); 
      });
    });
  </script>
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
        <li class="active"><a href="dashboard">Dashboard</a></li>
          <li><a href=<?php echo "edit?id=".$this->session->userdata['user_info']['id'] ?>>Profile</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href=<?php echo "wall?id=".$this->session->userdata['user_info']['id'].">".$this->session->userdata['user_info']['first_name']."  ".$this->session->userdata['user_info']['last_name']; ?></a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
  <h2 class='left'>Manage Users</h2>

  <form action="new_user">
  <button type="submit" class="btn btn-success right" id='logout'>Add New</button>
  </form>
  <div class="clear"></div>
<?php 
echo $this->session->userdata['user_table'];
?>

</div>
</body>
</html>