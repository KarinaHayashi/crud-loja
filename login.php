<?php
include("./function.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (contaValida($_POST["username"], $_POST["password"])) {
	registraConta($_POST["username"]);
header("Location: ./index.php");
exit;
}
	
	$mensagem = "Username ou Password incorreto!";
}
include("./header.php");
?>
<html>
<head>
<body>
<style>
		a{
			text-shadow: 2px 2px 4px black;
			 }
		h1{
			text-shadow: 2px 2px 4px black;
			 
			 }
		h2{
			border: 1px solid rgb(105, 108, 255);
             border-radius: 5px;
             background-color: rgb(226, 199, 219);
             color: rgb(105, 108, 255);
             text-align: center;
             padding: 5px;
			 background-image: url('img.jpg');
		}	 
		body {
			background-image: url('img.jpg');
			}
</style>
<h2>
	<form name="formLogin" method="POST">
	<table>
	<tr>
	<td colspan="2">
	<?=isset($mensagem)?$mensagem:"";?>
	</td>
	</tr>
	<tr>
	<td><a style="font-family:Arial; color:white; font-size:20px">Username:</td>
	<td>
	<input type="text" name="username"
	value="<?=isset($username)?$username:"";?>">
	</td>
	</tr>
	<tr>
	<td><a style="font-family:Arial; color:white; font-size:20px">Password:</td>
	<td>
	<input type="password" name="password"
	value="<?=isset($password)?$password:"";?>">
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<input type="submit" name="submit" value="Submit">
	</td>
	</tr>
	</table>
	</form>
		</h2>
<script language="JavaScript" type="text/javascript">
<!--
if (document.formLogin.username.value) {
document.formLogin.password.focus();
} else {
document.formLogin.username.focus();
}
//-->
</script>
</body>
</head>
</html>
<? include("./footer.php"); ?>