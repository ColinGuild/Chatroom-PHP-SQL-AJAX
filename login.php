<div id="login-wrapper">
<div class="form-wrapper">
<form method="post" action="" name="signin-form">
    <div class="form-element">
		<h1>Sign in</h1>
        <label>Username</label>
        <input id="username1" type="text" name="username1" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input id="password1" type="password" name="password1" required />
    </div><!-- SIGNIN LINK -->
    <button id="signin-submit" type="button" name="login1" value="login">Log In</button>
	<a id="register-link"  href="#">Register</a>
	<p id="error">hi</p>
</form>
</div>
</div>

<!-- REGISTER LINK -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#register-link").click(function(){
			$("#login-wrapper").css("display","none");
			$("#signup-wrapper").css("display","block");
		});
	});
</script>


<!--SEND FORM -->
<script type="text/javascript">
	
	$(document).ready(function(){
		
		
		
		
		$("#signin-submit").click(function() {
			
			let username1 = $("#username1").val();
			let password1 = $("#password1").val();
			
			if(username1 == '' || password1 == ''){
				alert("Form fields cannot be empty.");
			} else {
					
				   $.ajax({
					   type:'POST',
						url: "login-action.php", 
						data: {username1:username1, password1:password1},
						success: function(result){ 
						let user = result;
						if (user == "No User Found"){
							isLoggedIn(user, false);//function found in index.php
							
						}else{
							
							isLoggedIn(user, true);
							
						}
				}});
				
				
			};
				
	
	});
	});
	
</script>


