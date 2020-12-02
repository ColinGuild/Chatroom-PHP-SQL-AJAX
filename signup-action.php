<?php
	//must coonect to server with this file too

	$serverName = "localhost:3306";
	$serverUser = "root";
	$serverPassword = "root";
	$databaseName = "chatroom";
	// as the default server name is localhost 
	// and the default username is root 
	// and the default password is blank
	$conn = mysqli_connect($serverName, $serverUser, $serverPassword, $databaseName);
	if(mysqli_connect_error())
	{
		echo "<p>There is something wrong happend when connecting to the database.</p>";
		echo "<p>Please try again after sometime.</p>";
		echo "<p>Exiting....</p>";
		exit();
	}



if (isset($_POST['username'])){
	
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	
	$create_datetime = "test";
	
	$sql = "INSERT INTO users (username, email, password) 
  			  VALUES(?, ?, ?)";
	
	$stmt     = $conn->prepare($sql);
	
	if(!$stmt) {
		echo "error";
	}
	echo "stmt";
	$stmt->bind_param('sss',$username,$email, $password);
	
	$stmt->execute();
	
	$stmt->close();
}





