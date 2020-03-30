<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<ul class="nav navbar-nav ">
			<li class="nav-item">
  				<a class="nav-link" href="index.php" >Dashboard</a>		
    		</li>
        <?php  
          if (!isset($_SESSION['user'])){
        ?>
      		<li class="nav-item float-sm-right" >
        		<a class="nav-link" href="register.php" >Register</a>
      		</li>
      		<li class="nav-item float-sm-right" >
        		<a class="nav-link" href="login.php">Login</a>
      		</li>
      		<?php }else{ ?>	
      		<li class="nav-item float-sm-right" >
        		<a class="nav-link" href="logout.php">Logout</a>
      		</li>
        <?php } ?>
    	</ul>    		 		
	</nav>