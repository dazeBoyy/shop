<?php

include("connection.php");

function output_products($con, $limit, $offset)
{

    $products= mysqli_query($con, "SELECT * FROM products LIMIT $limit OFFSET $offset;");
    return $products;
}

function get_course_by_id( $id ){
    global $con;

    $query = "SELECT * FROM `products` WHERE id=" . $id;
    $req = mysqli_query($con, $query);
    $resp = mysqli_fetch_assoc($req);

    return $resp;
}
