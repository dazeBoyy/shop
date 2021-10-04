<?php
    session_start();
    include("connection.php");
    include("function.php");


if ( isset($_GET['delete_id']) && isset($_SESSION['cart_list']) ) {
    foreach ($_SESSION['cart_list'] as $key => $value) {
        if ( $value['id'] == $_GET['delete_id'] ) {
            unset($_SESSION['cart_list'][$key]);

        }
    }
}

if ( isset($_GET['goods_id']) && !empty($_GET['goods_id']) ) {

    $current_added_course = get_course_by_id($_GET['goods_id']);

    // ...
    if ( !empty($current_added_course) ) {

        if ( !isset($_SESSION['cart_list'])) {
            $_SESSION['cart_list'][] = $current_added_course;
        }


        $course_check = false;

        if ( isset($_SESSION['cart_list']) ) {
            foreach ($_SESSION['cart_list'] as $value) {
                if ( $value['id'] == $current_added_course['id'] ) {
                    $course_check = true;
                }
            }
        }


        if ( !$course_check ) {
            $_SESSION['cart_list'][] = $current_added_course;
        }

    } else {
        header("Location: 404.php");
    }

}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Корзина</title>
		<link rel="stylesheet" href="style_for_cart.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage</title>
        <!-- Favicon-->
        <link rel="icon" href="assets/favicon.ico" >
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ffc107;">
        <div class="container px-4 px-lg-5">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="brand">
                    <a class="navbar-brand" href="index.php?page=1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree" viewBox="0 0 16 16">
                            <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
                        </svg>
                        lukumland
                    </a>
                </div>

                <form class="d-flex ms-auto me-5">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>



            </div>
        </div>
    </nav>

    <div class="container mt-5  justify-content-center text-center">
        <div class="row">
            <div class="col me-auto mx-auto">
                <h1 class="">Корзина</h1>

                    <?php if ( isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) !=0 ) : ?>

                        <?php   $sum = 0;?>
                            <?php foreach( $_SESSION['cart_list'] as $goods ) : ?>
            <div class="row gx-5 ">
                <div class="col">
                    <div class="alert alert-warning" role="alert">

                                    <?php echo $goods['name']; ?> |
                                    <?php echo $goods['price']; ?> руб.
                                    <a href="cart.php?delete_id=<?php echo $goods['id']; ?>"><i class="bi bi-x-octagon-fill"></i></a>
                    </div>
                    <?php  $sum += $goods['price']; ?>

                            <?php endforeach; ?>
                    <h2>Сумма заказа: <?php echo $sum ?></h2>


                    <?php else : ?>
            </div>
                <p>
                    Ваша корзина пуста
                </p>
                        <h2>Сумма заказа: <?php echo $sum = 0?> </h2>


                <?php endif; ?>
            </div>
    </div>
        </div>
    </div>

            <div class="container">
        <footer class="py-5 fixed-bottom " style="background-color: #ffc107";>
            <div><h5 class="m-0 text-center text-dark" >© 2021 – 2021 ООО «Интернет Решения». Все права защищены.
                </h5>
            </div>
        </footer>
            </div>
        </div>
    </div>



	</body>
</html>

