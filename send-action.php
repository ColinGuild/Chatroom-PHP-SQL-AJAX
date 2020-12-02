<?php
	session_start(); //must start session whenever connecting to server
	

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
if(isset($_SESSION['user']) && isset($_POST['msg'])){		
 $msg=htmlspecialchars($_POST['msg']);
 $username=htmlspecialchars($_POST['username']);
 if($msg!=""){
	 $sql = "INSERT INTO messages (name,message,posted) VALUES (?,?,NOW())";//add new message to table
	 $stmt     = $conn->prepare($sql);
	 if(!$stmt) {
		echo "error";
	}
	
	$stmt->bind_param('ss',$_SESSION['user'],$msg);//bind variables to '?' for security purposes
	
	$stmt->execute();
	
	$stmt->close();
	echo "SEND " . $_SESSION['user'];
	
  //$sql=$conn->prepare("INSERT INTO messages (name,msg,posted) VALUES (?,?,NOW())");
  //$sql->execute(array($_SESSION['user'],$msg));
 }
}
?>
