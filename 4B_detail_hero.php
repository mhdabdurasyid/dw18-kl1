<?php

$id = $_GET["id"];
require '4B_config.php';
$query = "SELECT heroes_tb.id, photo, heroes_tb.name, type_tb.name as type FROM heroes_tb join type_tb WHERE heroes_tb.type_id=type_tb.id AND heroes_tb.id=$id
";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hero</title>
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

        <div class="card">
            <?php
            while ($hero = mysqli_fetch_array($result)) {
                echo "<img src=\" data:image/jpeg;base64," . base64_encode($hero['photo']) . "\" class=\"card-img-top\" style=\"width: 15rem; height: 15rem;\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\" >" . $hero["name"] . "</h5>";
                echo "<p class=\"card-text\">" . $hero["type"] . "</p>";
                echo "<p class=\"card-text\">Lorem Ipsum Dolor Sit Amet, mea te verear signiferumque, per illum labores ne. Blandit omnesque scripserit pri ex, et pri dicant eirmod deserunt. Aeque perpetua ea nec. Sit erant patrioque delicatissimi ut. Et sea quem sint, nam in minim voluptatibus. Etiam placerat eam in.</p>";
                echo "<a href=\"4B_edit_hero.php?id=" . $hero["id"] . "\" class=\"btn btn-warning\">Ubah</a>";
                echo "<a href=\"4B_delete_hero.php?id=" . $hero["id"] . "\" class=\"btn btn-danger\">Hapus</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>