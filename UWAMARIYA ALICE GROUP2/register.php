<?php
$connection=new mysqli("localhost","root","",mytest);
if($connection->connect_error){
	die("connection failed: ".$connection->connect_error);
}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$email = $_POST['email'];
		$password =password_hash($_POST['password'],PASSWORD_DEFAULT);
		$mysql="INSERT INTO user(email,password)value('$email','$password')";
			if ($connection->query($sql)==TRUE){
				header("Location:login.html");
                exit();
				//echo "registration succesfull!";

			}else{
				echo "error: ".$sql."<br>" .$connection->error;
			}
			$connection->close();
	
	?>