
<script type="text/javascript">
	
	$(document).ready(function(){
			let totalCount=0//total number of messages
			function displayMsg(result){
				
				let count=0
				var json=JSON.parse(result);
				//console.log(json);
				//document.getElementById("chatbox").innerHTML = json[1].name + ", " + json[1].message; 
				
				
				//$('#chatbox').html(JSON.stringify(result,null,4));
				//var json=JSON.parse(result);
				
				$.each(json, function(index, object) {//itterate through each message appending and counting to chatbox
					//console.log(object.name, ": ", object.message);
					count+=1;
					
					$('#chatbox').append(object.name, ": ", object.message, "</br>")
					
					//$('#chatbox').html(object.name, ": ", object.message);	
				})
				
				if (count > totalCount){//if total number of messages changes
				totalCount = count
				var chatHistory = document.getElementById("chatbox");
				chatHistory.scrollTop = chatHistory.scrollHeight;//scroll to bottom when new message occurs
				
				}
				//setInterval(function(){$('#chatbox').html("")}, 10000);	
		

				
				//console.log(obj[1].name);
				
				
				//var obj=JSON.parse(result);
				//for(var k in obj){
				//	$('#chatbox').html(result["name"]);			
					
				//}
			}
		
		
			function checkStatus(){
					
				   $.ajax({
					   type:'POST',
						url: "display-action.php", 
						data: {},
						//dataType: "json",
						success: function(result){ 
						$('#chatbox').html("")
						displayMsg(result);		
						
				}});
				
			}
				
				
		// Check for latest message
		setInterval(function(){checkStatus();}, 500);	//repeat every 500 miliseconds
				
	
	
	});
	
</script>
