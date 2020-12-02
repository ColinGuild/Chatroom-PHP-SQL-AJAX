<!--SEND MESSAGE -->
<script type="text/javascript">
	
	$(document).ready(function(){
		
		
		
		
		$("#submitmsg").click(function() {
					val=$("#usermsg").val();
				   $.ajax({
					   type:'POST',
						url: "send-action.php", 
						data: {username:username, msg:val},//send username and message value to send-action
						success: function(result){ 
						console.log(result);
						 $('#usermsg').val("");//clear message box
				}});
				
				
			
				
	
	});
	});
	
</script>