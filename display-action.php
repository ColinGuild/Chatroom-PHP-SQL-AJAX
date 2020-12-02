<?php

session_start();//must start session whenever connecting to server


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
	
	if(!isset($_SESSION['user'])/* && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'*/){
 die("<script>window.location.reload()</script>");
}

	if(isset($_SESSION['user'])){
		
		$sql="SELECT name, message FROM messages"; //get all messages
		$stmt     = $conn->prepare($sql);
		
		if(!$stmt) {
		echo "error";
		}
		
		if ($stmt->execute()){
		$stmt->bind_result($name, $message);
		$msgArray = array();
		
		while ($stmt->fetch()){
			$tmp = array();//temporary array
			$tmp["name"] = $name;
			$tmp["message"] = $message;
			array_push($msgArray, $tmp);//push temp array to perm array
		}

		

			
		
			
		
	}
	$stmt->close();
	print_r(json_encode($msgArray));//convert array to json
	
}
		
		
	
