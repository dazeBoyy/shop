<?php 
setcookie('name', $name, time() - 3600, "/");
header('Location: http://localhost/dim/index.php?page=1');
?>