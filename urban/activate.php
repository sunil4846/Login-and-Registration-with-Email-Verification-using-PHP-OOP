<?php 
include("include/header.php");
if (isset($_SESSION['user'])) {
			header("location:http://localhost/urban/index.php");
	}
if (isset($_GET['active']) || isset($_POST['submit'])) {
	$tk = isset($_POST['submit']) ? $_POST['active'] : $_GET['active'];
	$id = isset($_POST['submit']) ? $_POST['id'] : $_GET['id'];

	$user->activate($id,$tk);
}
?>	
	<div class="container-fluid" style="margin-top: 25px;">
		<div class="row"> 
			<div class="col-sm-4 offset-sm-4">
				<div class="card">
					<div class="card-header text-sm-center">
						Activate your Account
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
						   		<label for="active">Activation code</label>
						   		<input class="form-control" type="text" name="active" id="active" placeholder="Enter your Activate code">
						   	</fieldset>
						   	<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
						   	<input type="submit" name="submit" class="btn btn-primary float-sm-right" value="Activate">
					   </form>
				  </div>
				  <div class="card-footer text-muted text-sm-center">
				  	We have sent you an email, kindly activate your account <br>
				  	You can copy and paste the code in the above field or just use the link to activate.	
				  </div>
				</div>
			</div>
		</div>
	</div>

<?php include("include/footer.php") ?>