<div id="signup-wrapper">
<div class="form-wrapper">
<form id="form" method="post" action=""  name="signup-form">
    <div class="form-element">
		<h1>Sign Up</h1>
        <label>Username</label>
        <input  id="username" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Email</label>
        <input  id="email" type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input id="password" type="password" name="password" required />
    </div>
    <button  id="register-submit" type="button" name="register" value="register">Register</button>
	<a id="signin-link"  href="#">Sign In</a>
</form>
</div>
</div>

<!-- SIGNIN LINK -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#signin-link").click(function(){
			$("#login-wrapper").css("display","block");
			$("#signup-wrapper").css("display","none");
		});
	});
</script>

<!--SEND FORM -->
<script type="text/javascript">
	
	$(document).ready(function(){
		
		
		
		
		$("#register-submit").click(function() {
			let username = $("#username").val();
			let email = $("#email").val();
			let password = $("#password").val();
			
			if(username == '' || email == '' || password == 'asd'){
				alert("Form fields cannot be empty.");
			} else {
					
				   $.ajax({
					   type:'POST',
						url: "signup-action.php", 
						data: {username:username, email:email, password:password},
						success: function(result){
							$("#login-wrapper").css("display","block");
							$("#signup-wrapper").css("display","none");
							$("#darkLayer").css("display","block");
				}});
				
				
			};
				
	
	});
	});
	
</script>

