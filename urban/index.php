<?php 
	include("include/header.php");
	if (!isset($_SESSION['user'])) {
			header("location:http://localhost/urban/register.php");
	}
?>	
	<div class="container-fluid" style="margin-top: 25px;">
		<div class="row"> 
			<div class="col-sm-4 offset-sm-4">
				<div class="card">
					<div class="card-header text-sm-center">
						Dashboard
					</div>
				  	<div class="card-body">
					   <h2>hello <?php echo $_SESSION['user']->name; ?></h2>
				  </div>
				</div>
			</div>
		</div>
	</div>

<?php include("include/footer.php") ?>