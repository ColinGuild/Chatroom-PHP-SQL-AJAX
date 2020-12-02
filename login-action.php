<?php
	
     session_start();

	//must coonect to server with this file too

	$serverName = "localhost:3306";
	$serverUser = "root";
	$serverPassword = "root";
	$databaseName = "chatroom";
	// as the default server name is localhost 
	// and the default username is root 
	// and the default password is blank
	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$conn = mysqli_connect($serverName, $serverUser, $serverPassword, $databaseName);
	if(mysqli_connect_error())
	{
		echo "<p>There is something wrong happend when connecting to the database.</p>";
		echo "<p>Please try again after sometime.</p>";
		echo "<p>Exiting....</p>";
		exit();
	}


if (isset($_POST['username1'])){
	
	$username1 = stripslashes($_POST['username1']);
	$username1 = mysqli_real_escape_string($conn, $username1);
	
	

	
	$password1 = stripslashes($_POST['password1']);
	$password1 = mysqli_real_escape_string($conn, $password1);
	
	$create_datetime = "test";
	
	$sql = "SELECT *From users WHERE username = ? and password = ?";
	
	$stmt     = $conn->prepare($sql);
	
	if(!$stmt) {
		echo "error";
	}
	
	$stmt->bind_param('ss',$username1,$password1);
	
	if ($stmt->execute()){
		//$stmt->store_result();
		//$stmt->bind_result($username1,$password);
		
		while ($stmt->fetch()){
			
		}
		if ($stmt->num_rows == 0){//use this to check if user exists only works with while
			$user="No User Found";
			echo $user;
		}else{
			$_SESSION['user']=$username1;
			echo $_SESSION['user'];
			
		}
			
		
	}
	$stmt->close();
}
	

	
/*		
		if($stmt->fetch()){
			
				echo $username1;
			
			
		}
		
		
	}
	
	$stmt->close();
}
*/