<?php

$link = mysqli_init();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dima-shop";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {

    die("failed to connect!");

}
