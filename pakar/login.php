<!DOCTYPE HTML>
<html lang="en-US">
<head>

<link rel="shortcut icon" href="favicon.gif" type="image/x-icon" />
	<meta charset="UTF-8">
	<title>Login PHP</title>
	<link rel="stylesheet" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="jquery-1.7.min.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		$("#login").click(function(){
			
			var action = $("#lg-form").attr('action');
			var form_data = {
				username: $("#username").val(),
				password: $("#password").val(),
				is_ajax: 1
			};
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
					if(response == "success")
						$("#lg-form").slideUp('slow', function(){
							$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
						});
					else
						$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');
				}	
			});
			return false;
		});
	});
	</script>
    <style type="text/css">
<!--
.style3 {
	color: #990000;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style4 {
	color: #00FF00;
	font-weight: bold;
}
.style6 {
	color: #000000;
	font-weight: bold;
}
-->
    </style>
<style type="text/css">
<!--
body {
	background: url(bg1.jpg);margin:0;padding:0;background-size:100% 100%;
}
-->
</style>  
</head>
<body>

<form action="LoginPeriksa.php" method="post" name="form1" target="_self">
	<div class="lg-container">
		<h1>
<h1>Area Pakar Silahkan Login</h1>
<form id="form1" name="form1" method="post" action="">
          <center> 
          <p><br>
  <label>
  <input name="TxtUser" type="text" id="textfield" placeholder="username" />
</label>
<p>
      <label>
      <input type="password" name="TxtPasswd" id="textfield2" placeholder="password" style="margin-top:5px;" />
    </label>      
     
      </table>
<p>
        <label>
         <input type="submit" name="button" id="button" value="Login" />
        </label>
      <left><p><img src="dokter.gif" width="288" height="219">
      
</form>
<div class="style4" id="message"></div>
<p><span class="style6">SISTEM PAKAR DIAGNOSA PENYAKIT GANGGUAN MENTAL </span><br>
  <span class="style3">ashikmawan@gmail.com</span></p>
</body>
    
</html>