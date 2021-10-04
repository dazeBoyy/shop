<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registration form</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">

	</head>
	<body>
		<div class="container mt-5 justify-content-center">
			<div class="row">
				<div class="col me-auto mx-auto"> 
					<h4 class="text-white">Форма регистрации</h4><br>
					<form name="reg" action="check.php" method="post" onsubmit="return validate()">
						<input type="text" class="form-control mb-3" name="name" id="name" placeholder="Имя">
						<input type="text" class="form-control mb-3" name="mail" id="mail" placeholder="Почта">
						<input type="password" class="form-control mb-3" name="password" id="password" placeholder="Пароль">
						<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        <a class="btn btn"  href="login.php" style="background-color: #ffc107">Авторизация в аккаунт</a>
					</form>
				</div>
			</div>
		</div>
        <script>
            function validate() {
                let a = document.forms["reg"]["name"].value;
                if (a == "" || a < 1 ) {
                    alert("Укажите ваше имя");
                    return false;
                }
                let b = document.forms["reg"]["mail"].value;
                if (b == "") {
                    alert("Укажите вашу почту");
                    return false;
                }
                let с = document.forms["reg"]["password"].value;
                if (с == "") {
                    alert("Задайте пароль");
                    return false;
                }
            }
        </script>

    </body>
</html>