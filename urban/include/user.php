<?php  

class User extends mysqli
{
	
	public function __construct()
	{
		Parent::__construct("localhost","root","","urban");
		if ($this->connect_error) {
			$_SESSION['error'] = "DB Connection error:".$this->connect_error;
			return;
		}
	}

	public function register($data)
	{
		$pass = password_hash($data['password'], PASSWORD_DEFAULT);
		$token = bin2hex(random_bytes(4));
		$q = "SELECT * FROM user WHERE email='$data[email]'";
		$run = $this->query($q);
		if ($run->num_rows > 0) {
			$_SESSION['error'] = "Email already exists!!!";
			return;
		}
		else{
			$q = "INSERT INTO user(name,email,password,token,active) VALUES('$data[name]','$data[email]','$pass','$token',0)";
			$run = $this->query($q);
			if ($run) {
				$user = $this->getuser($data['email']);
				$_SESSION['id'] = $user->id;
				$this->send_mail($user->email, $user->id, $token);
				header("location:http://localhost/urban/activate.php");
			}else{
				$_SESSION['error'] = "Something went wrong.";
			}
		}
	}

	public function getuser($email)
	{
		$q = "SELECT * FROM user WHERE email='$email'";
		$run = $this->query($q);
		$row = $run->fetch_object();
		return $row;
	}

	public function send_mail($email,$id,$token)
	{
		$subject = "Account Activation Code";
		$headers = "From: test app \r\n";
		$headers .= "Reply-To: abc@abc.com \r\n";
		$headers .="CC: sunilrajput4846@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";
		$message = '<html><body>';
		$message .= '<h6>Your Activation Code</h6>';
		$message .= '<h3>'.$token.'</h3>';
		$message .= '<h1>OR</h1>';
		$message .= '<h3>'.$_SERVER['SERVER_NAME'].'/urban/activate.php?active='.$token.'&id='.$id.'</h3>';
		$message .= '</body></html>';
		mail($email, $subject, $message,$headers);  
	}

	public function activate($id,$token)
	{
		$q = "UPDATE user SET active=1 WHERE id='$id' AND token='$token'";
		$run = $this->query($q);
		if ($run) {
			$user = $this->getuserbyid($id);
			$_SESSION['user'] = $user;
			header("location:http://localhost/urban/index.php");
		}else{
			$_SESSION['error'] = "Wrong Activation Code!!";
		}
	}

	public function getuserbyid($id)
	{
		$q = "SELECT * FROM user WHERE id='$id'";
		$run = $this->query($q);
		$row = $run->fetch_object();
		return $row;		
	}

	public function auth($email,$password)
	{
		$q = "SELECT id FROM user WHERE email='$email' AND active=1";
		$run = $this->query($q);
		if ($run->num_rows > 0) {
			$row = $run->fetch_object();
			$q = "SELECT * FROM user WHERE id='$row->id'";
			$run = $this->query($q);
			$row = $run->fetch_object();
			if (password_verify($password, $row->password)) {
				$_SESSION['user'] = $row;
				header("location:http://localhost/urban/index.php");
			}else{
				$_SESSION['error'] = "Password is not valid";
			}
		}else{
			$_SESSION['error'] = "Email does not exist or user is not active";
		}
	}
}

?>