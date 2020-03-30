<?php
include("include/header.php");
if (isset($_SESSION['user'])) {
			header("location:http://localhost/urban/index.php");
	}
if (isset($_POST['submit'])) {
	$user->register($_POST);
}
?>	

	<div class="container-fluid" style="margin-top: 25px;">
		<div class="row"> 
			<div class="col-sm-4 offset-sm-4">
				<div class="card">
					<div class="card-header text-sm-center">
						Register here
					</div>
				  	<div class="card-body">
				  		<?php  
				  			if (isset($_SESSION['error'])) {
				  				echo '<div class="alert alert-danger" role="alert">';
				  				echo $_SESSION['error'];
				  				echo '</div>';
				  			}
				  		?>
					   	<form method="post">
						   	<fieldset class="form-group">
						   		<label for="name">Name</label>
						   		<input class="form-control" type="text" name="name" value="<?php echo @$_POST['name'] ?>" id="name" placeholder="Enter the Name">
						   	</fieldset>
						   	<fieldset class="form-group">
						   		<label for="email">Email</label>
						   		<input class="form-control" type="text" name="email"  value="<?php echo @$_POST['email'] ?>"id="email" placeholder="Enter the Email">
						   	</fieldset>
						   	<fieldset class="form-group">
						   		<label for="password">Password</label>
						   		<input class="form-control" type="password" name="password" id="password" placeholder="Enter the Password">
						   	</fieldset>
						   	<input type="submit" name="submit" class="btn btn-primary float-sm-right" value="Register">
					   </form>
				  </div>
				</div>
			</div>
		</div>
	</div>

<?php include("include/footer.php") ?>