<?php
session_start();



    include("connection.php");
    include("function.php");



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ffc107;">
            <div class="container px-4 px-lg-5">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="brand">
                        <a class="navbar-brand" href="?page=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree" viewBox="0 0 16 16">
                                <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
                            </svg>
                            lukumland
                        </a>
                    </div>

                    <form class="d-flex ms-auto me-5">
                        <a class="btn " href="?page=1">
                        <input class="form-control me-2" type="search" placeholder="Искать"aria-label="Search">
                        </a>
                    </form>

                    <form action="cart.php" class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill"></i>
                            <span class="badge bg-dark text-white rounded-pill cart">
                                <?php  if (isset($_SESSION['cart_list'])) {
                                    echo count($_SESSION['cart_list']);
                                }?>
                            </span>
                        </button>
                    </form>

                    <?php if(isset($_COOKIE['name'])): ?>
                        <button class="btn btn-outline-dark ms-2" type="submit">
                            <i class="bi-person-fill"></i>
                            <?php echo $_COOKIE['name']; ?>
                        </button>
                        <form action="exit.php" method="post">
                            <button class="btn btn-outline-dark ms-2" type="submit">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </form>


                    <?php else: ?>
                    <form action="registration.php" method="post">
                        <button class="btn btn-outline-dark ms-2" type="submit">
                            <i class="bi-person-fill"></i>
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <div class="container-fluid   mt-3 ">
            <ul class="nav nav-pills nav-justified border-bottom border-4 border-warning">
                <li class="nav-item">
                    <button class="btn " type="submit"><h3>Ореховый</h3></button>
                </li>
                <li class="nav-item">
                    <button class="btn " type="submit"><h3>Фруктовый</h3></button>
                </li>
                <li class="nav-item">
                    <button class="btn " type="submit"><h3>Медовый</h3></button>
                </li>
                <li class="nav-item">
                    <button class="btn " type="submit"><h3>Инжирный</h3></button>
                </li>
            </ul>


        </div>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $offset = $limit * ($page - 1);

        $products_data = output_products($con, $limit, $offset);
        while ($product = mysqli_fetch_array($products_data)) {
            $product_name[] = $product;
        }
        ?>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php if(isset($product_name)): ?>
                    <?php foreach ($product_name as $products) {
                        ?>


                        <div class="col mb-5">
                            <!-- Product image-->
                            <div class="card h-100">
                                <img class="w-100 h-75" src="<?php echo $products['img']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="pb-2 pt-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h4><?php echo $products['name']; ?></h4>
                                        <!-- Product price-->
                                        <h5><?php echo $products['price']; ?> Pуб</h5>
                                        <!-- Product reviews-->
                                        <h2><div class="d-flex justify-content-center small text-warning mb-2">
                                            <?php
                                                for ($j = 1; $j <= $products['stars']; $j++) {
                                                    echo "*";
                                                }
                                            ?>
                                        </div><h2>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center area">
                                        <a class="btn btn-outline-dark m-3" href="goods.php?id=<?php echo $products['id']; ?>">Информация</a>
                                    </div>
                                    <div class="text-center area">
                                        <a class="btn btn-outline-dark m-3" href="cart.php?goods_id=<?php echo $products['id']?>">Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php else: ?>
                        <h2>Товар скоро будут добавлен</h2>

                    <?php endif; ?>

                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center " >
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page = isset($page) < 0 ? $page : 1; $page = $_GET['page'] - 1 ?>"">Предыдущая</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                        <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page = $_GET['page'] + 1 ?>">Следующая</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5" style="background-color: #ffc107";>
            <div class="container" ><h5 class="m-0 text-center text-dark" >© 2021 – 2021 ООО «Интернет Решения». Все права защищены.
                </h5></div>
        </footer>

    </body>
</html>
