<?php
include("config.php");
$query =  mysqli_real_escape_string($conn,$_GET['q']);
echo $query;

 ?>
