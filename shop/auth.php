<?php
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


	$mysql = new mysqli('localhost', 'root', '', 'dima-shop');
	$result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");

	$user = $result->fetch_assoc();
	if ($user == 0) {
		echo "Такого пользователя не существует";
		exit();
	}

	setcookie('name', $user['name'], time() + 3600, "/");

	$mysql->close();

	header('Location: http://localhost/dim/index.php?page=1');
?>