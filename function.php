<?php
function contaValida($username, $password) {
$link = mysqli_connect("localhost", "root", "", "projeto");
$sql = "SELECT * FROM admin WHERE username = '".$username."'
AND password = ('$password')";
$result = mysqli_query($link, $sql);
		if ($result) {
	if ($row = mysqli_fetch_assoc($result)) {
	return true;
	}
}
	return false;
}
	function registraConta($username) {
	session_start();
	session_unset();
		$link = mysqli_connect("localhost", "root", "", "projeto");
		$sql = "SELECT * FROM admin WHERE username = '".$username."'";
		$result = mysqli_query($link, $sql);
		if ($result) {
	if ($row = mysqli_fetch_assoc($result)) {
	$_SESSION["CONTA_ID"] = $row["id"];
	}
}
}
	function logout() {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ./login.php");
	exit;
}
	function validaSessao() {
	session_start();
		if (empty($_SESSION["CONTA_ID"])) {
		header("Location: ./login.php");
	exit;
	}
}
