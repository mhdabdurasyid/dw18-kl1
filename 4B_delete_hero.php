<?php

$id = $_GET["id"];
require '4B_config.php';
$query = "delete from heroes_tb where id=$id";
$result = mysqli_query($conn, $query);

header("Location:4B_index.php");
