<?php
session_start();


include("connection.php");
include("function.php");


if ( isset($_GET['id']) ) {
    $query = "SELECT * FROM products WHERE id=" . $_GET['id'];
    $req = mysqli_query($con, $query);
    $current_goods = mysqli_fetch_assoc($req);
}


?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/favicon.ico" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>Document</title>
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
                    <a class="btn " href="?page=1">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </a>
                </form>

                <form action="cart.php" class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill"></i>
                        <span class="badge bg-dark text-white rounded-pill cart">
                            </span>
                    </button>
                </form>

                    <form action="registration.php" method="post">
                        <button class="btn btn-outline-dark ms-2" type="submit">
                            <i class="bi-person-fill"></i>
                        </button>
                    </form>
            </div>
        </div>
    </nav>




    <div class="container mt-5 me-0">
        <!-- Product image-->
        <div class="card  " style="width: 20rem; height: 10rem;">
            <img class="card-img-top" src="<?php echo $current_goods['img']; ?>" alt="..." />
            <!-- Product details-->
            <div class="pb-2 pt-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h4><?php echo $current_goods['name']; ?></h4>
                    <!-- Product price-->
                    <h5><?php echo $current_goods['price']; ?> Pуб</h5>
                    <!-- Product reviews-->
                    <h2><div class="d-flex justify-content-center small text-warning mb-2">
                            <?php
                            for ($j = 1; $j <= $current_goods['stars']; $j++) {
                                echo "*";
                            }
                            ?>
                        </div><h2>
                            <div class="text-center area">
                                <a class="btn btn-outline-dark m-3" href="cart.php?goods_id=<?php echo $current_goods['id']?>">Купить</a>
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


</body>
</html>




