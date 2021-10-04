<?php

	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	if(mb_strlen($name) < 3 || mb_strlen($name) > 10) {
		echo "Недопустимая длина имени";
		exit();
	}

	if(mb_strlen($mail) < 5 || mb_strlen($mail) > 20) {
		echo "Недопустимая длина почты";
		exit();
	}

	if(mb_strlen($password) < 5 || mb_strlen($password) > 20) {
		echo "Недопустимая длина пароля";
		exit();
	}


	$mysql = new mysqli('localhost', 'root', '', 'dima-shop');
	$mysql->query("INSERT INTO `users` (`name`, `mail`, `password`) VALUES ('$name', '$mail', '$password')");

	setcookie('name', $name, time() + 3600, "/");

	$mysql->close();

	header('Location: http://localhost/dim/login.php');
?>