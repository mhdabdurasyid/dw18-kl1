<?php

$id = $_GET["id"];
require '4B_config.php';
$query = "delete from type_tb where id=$id";
$result = mysqli_query($conn, $query);

header("Location:4B_delete_type.php");
