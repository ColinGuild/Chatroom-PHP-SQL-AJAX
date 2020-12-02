<?php
 session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>

<div id="wrapper">
	 <div id="darkLayer" class="darkClass" style=""></div>
    <div id="menu">
        <p class="welcome">Welcome, <b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="button"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">

  function isLoggedIn(user, logged){//check if user is logged in and displays/hides signup/login box and dark layer.
		if (logged === true){
			
				$('.welcome').text('Welcome, ' + user);
				console.log(user);
				

				$("#login-wrapper").css("display","none");
				$("#signup-wrapper").css("display","none");
				$("#darkLayer").css("display","none");
				
		}else if (logged === false){
				$("#login-wrapper").css("display","block");
				$("#signup-wrapper").css("display","none");
				$("#darkLayer").css("display","block");
				$('#error').text("No user found or invalid password.");
				$("#error").css("color","red");
			
		}
		
  }
  
  

</script>
<!--Get all other files-->
<?php require 'login.php';?>
<?php require 'logout.php';?>
<?php require 'database.php';?>
<?php require 'register.php';?>
<?php require 'send.php';?>
<?php require 'display.php';?>
</body>
</html>
	