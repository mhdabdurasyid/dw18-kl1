<?php

require '4B_config.php';
$query = "SELECT heroes_tb.id, photo, heroes_tb.name, type_tb.name as type FROM heroes_tb join type_tb WHERE heroes_tb.type_id=type_tb.id
";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Games</title>
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
            <li class="nav-item">
                <a class="nav-link" href="4B_delete_type.php"><button type="button" class="btn btn-danger">Delete Type</button></a>
            </li>
        </ul>

        <div class="row">
            <?php
            while ($hero = mysqli_fetch_array($result)) {
                echo "<div class=\"col-3\">";
                echo "<div class=\"card\" style=\"height: 25rem;\">";
                echo "<img src=\" data:image/jpeg;base64," . base64_encode($hero['photo']) . "\" class=\"card-img-top\" style=\"width: 15rem; height: 15rem;\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\" >" . $hero["name"] . "</h5>";
                echo "<p class=\"card-text\">" . $hero["type"] . "</p>";
                echo "<a href=\"4B_detail_hero.php?id=" . $hero["id"] . "\" class=\"btn btn-warning\">Detail</a>";
                echo "</div></div></div>";
            }
            ?>

        </div>
    </div>
</body>

</html>