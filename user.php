<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="userOper" placeholder="Username" id="userOper">
	</form>
	<div id="show"></div>
	<script src="js/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#userOper').change(function(){
				var userOper = $('#userOper').val();
				$.ajax({
					type: 'POST',
					url: 'function.php',
					data: {action: 'validate', userOper : userOper},
					dataType: 'json',
					success:function(response){
						if(response.success == true){
							$('#show').html(response.message);
						}else{
							$('#show').html(response.message);
						}
					}
				});
			});
		});
	</script>
</body>
</html>