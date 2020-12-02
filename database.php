<?php 
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
?>
<html>
<head>
	<title>PHP and MySQLi Create Table Example</title>
</head>
<body>
<!--create username table if not created already -->
<?php
	$sqlQuery = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$returnResult = $conn->query($sqlQuery);
	if($returnResult)
	{
		echo "<p>Table created successfully.</p>";
		/*$sql="INSERT INTO users(username, email, password)
			VALUES('chicky', 'hi', 'sup')";
		$result = mysqli_query($conn, $sql) or die("Bad Query");
		
		echo "Good Query";*/
		
	}
	else 
	{
		echo "<p>Error occurred while creating the table.</p>";
		echo "<p>Exiting...</p>";
		exit();
	}
	
	/*$sql="INSERT INTO users(username, email, password)
			VALUES('chicky', 'hi', 'sup')";
		$result = mysqli_query($conn, $sql) or die("Bad Query");
		
		echo "Good Query";*/
		
		//create messages table if it does not exist already
		$sqlQuery2="CREATE TABLE IF NOT EXISTS `chatroom`.`messages` ( `name` VARCHAR(100) NOT NULL , `message` VARCHAR(250) NOT NULL , `posted` DATETIME NOT NULL , `id` INT(11) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
			$returnResult2 = $conn->query($sqlQuery2);
	if($returnResult2)
	{
		echo "<p>Table 2 created successfully.</p>";
		/*$sql="INSERT INTO users(username, email, password)
			VALUES('chicky', 'hi', 'sup')";
		$result = mysqli_query($conn, $sql) or die("Bad Query");
		
		echo "Good Query";*/
		
	}
	else 
	{
		echo "<p>Error occurred while creating Table 2.</p>";
		echo "<p>Exiting...</p>";
		exit();
	}
?>
</body>
</html>
