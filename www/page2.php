<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 08.11.2016
 * Time: 22:08
 */

/*
Pagina de autorizare
trebuie sa arate diferit pentru utilizatorii logati si cei nelogati
*/

session_start();
if($_POST['Logout'] == 'LogOut') {
	session_destroy();
	header("Location: index.php");
	die();
}
$user = [
	'andrei' => '123',
	'mihai' => '123',
	'elena' => '111',
	'nicoleta' => '0000',
];
//var_dump($_POST);
if(isset($_POST['login']) && isset($_POST['pass']) ){
	$login = $_POST['login'];
	$pass = $_POST['pass'];
}

if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['memorize'])){
	$login = $_SESSION['login'] = $_POST['login'];
	$pass = $_SESSION['pass'] = $_POST['pass'];
}
if(isset($_SESSION['login']) && isset($_SESSION['pass']) ){
	$login = $_SESSION['login'];
	$pass = $_SESSION['pass'];
}

//var_dump($user["$login"]);
//var_dump($login);
//var_dump($pass);
$eLogat = isset($login) && isset($pass) ; //!!!
$eLogat = $eLogat && ($pass === $user["$login"]);
if($eLogat):

	echo "<h1>Buna, $login! </h1>";
	?>
	<form action="page2.php" method="post">
		<input type="submit" value="LogOut" name="Logout">
	</form>
	<a href="index.php">Pagina principala</a>

	<?php

	;else:
	?>
	<h1>Logare</h1>
	<form action="index.php" method="post">
		<input type="text" name="login">
		<input type="password" name="pass">
		<input type="checkbox" name="memorize">
		<input type="submit" name="Login">
	</form>
	<a href="index.php">Pagina principala</a>
	<?php
endif;
// Masiv cu abonatii

?>