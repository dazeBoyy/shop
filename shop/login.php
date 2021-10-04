<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="container mt-5  justify-content-center">
        <div class="row">
            <div class="col me-auto mx-auto ">
                <h4 class="text-white">Форма авторизации</h4><br>
                <form name="login" action="auth.php" method="post" onsubmit="return validate()">
                    <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Имя">
                    <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Пароль">
                    <button type="submit" class="btn btn" style="background-color: #ffc107">Войти</button>
                    <a class="btn btn-primary"  href="registration.php">Вернуться к регистрации</a>
                </form>
            </div>
        </div>
    </div>
    </div>
<script>
    function validate() {
        let a = document.forms["login"]["name"].value;
        if (a == "") {
            alert("Укажите ваше имя");
            return false;
        }
        let с = document.forms["login"]["password"].value;
        if (с == "") {
            alert("Укажите ваш пароль");
            return false;
        }
    }
</script>

</body>
</html>