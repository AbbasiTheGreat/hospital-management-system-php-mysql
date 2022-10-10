<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hospital Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style>
body {
  background-image: url('./hospital.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
</head>
<body>
	


      <div class="container d-flex justify-content-center align-items-center "
      style="min-height: 100vh"  style="background-color: gold;">
      	<form class="border shadow p-3 rounded p-3 mb-2 bg-gradient-warning text-dark p-3 mb-2 bg-info text-dark"
      	      action="check-login.php" 
      	      method="POST" 
      	      style="width: 450px;"
      	      style="color: lemonchiffon;">
      	      <h1 class="text-center p-3">Hospital Login</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
	 
		  <div class="mb-3">
		    <label for="username" 
		           class="form-label">User name</label>
		    <input type="text" 
		           class="form-control" 
		           name="username" 
		           id="username">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Password</label>
		    <input type="password" 
		           name="password" 
		           class="form-control" 
		           id="password">
		  </div>
		  <div class="mb-1">
		    <label class="form-label">Select User Type:</label>
		  </div>
		  <select class="form-select mb-3"
		          name= "role"
		          aria-label="Default select example">
			  <option selected value="Doctor">Doctor</option>
			  <option value="Pharmacist">Pharmacist</option>
			  <option value="Receptionist">Receptionist</option>
		  </select>
		 
		  <button type="submit" 
		          class="btn btn-primary btn-lg btn-block">LOGIN</button>
		</form>
      </div>
</body>
</html> 
<?php }else{ 
header("Location: ./logout.php");
} ?>