<!--LOGOUT-->
<script type="text/javascript">
	
	$(document).ready(function(){
		
		
		
		
		$(".logout").click(function() {
					
				   $.ajax({
					   type:'POST',
						url: "logout-action.php", 
						success: function(result){ 
						let user = result;
						isLoggedIn(user, false);
						console.log(user);						
				}});
				
				
			
				
	
	});
	});
	
</script>