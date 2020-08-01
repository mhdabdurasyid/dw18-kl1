<?php

require '4B_config.php';
$query = "SELECT * from type_tb";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Type Hero</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="4B_index.php"><button type="button" class="btn btn-warning">Home</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4B_add_hero.php"><button type="button" class="btn btn-warning">Add Hero</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4B_add_type.php"><button type="button" class="btn btn-warning">Add Type</button></a>
            </li>
        </ul>

        <h5>Hapus Type Hero</h5>
        <div class="row">
            <?php
            while ($type = mysqli_fetch_array($result)) {
                echo "<div class=\"col-2\">";
                echo "<div class=\"card\" style=\"height: 7rem;\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\" >" . $type["name"] . "</h5>";
                echo "<a href=\"4B_delete.php?id=" . $type["id"] . "\" class=\"btn btn-danger\" name=\"hapus\">Hapus</a>";
                echo "</div></div></div>";
            }
            ?>
        </div>
    </div>
</body>

</html>