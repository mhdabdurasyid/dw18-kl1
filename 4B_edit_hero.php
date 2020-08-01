<?php

$id = $_GET["id"];
require '4B_config.php';
$query = "SELECT heroes_tb.id, photo, heroes_tb.name, type_tb.name as type FROM heroes_tb join type_tb WHERE heroes_tb.type_id=type_tb.id AND heroes_tb.id=$id
";
$result = mysqli_query($conn, $query);
$query = "SELECT * from type_tb";
$result2 = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Detai Hero</title>
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

        <h5>Ubah Detail Hero</h5>
        <div class="card">
            <?php while ($hero = mysqli_fetch_array($result)) {
                echo "<form action=\"4B_edit_hero.php?id=" . $hero["id"] . "\" method=\"POST\">";
                echo "<div class=\"card-body\">";
                echo "<div class=\"form-group\">";
                echo "<label for=\"name\">Hero Name</label>";
                echo "<input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" placeholder=\"" . $hero["name"] . "\"></div>";
            }
            ?>
            <div class="form-group">
                <label for="type">Type Hero</label>
                <select class="form-control" id="type" name="type">
                    <?php
                    while ($type = mysqli_fetch_array($result2)) {
                        echo "<option value=\"" . $type["id"] . "\">" . $type["name"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Simpan</button>
        </div>
        </form>
    </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $id = $_GET["id"];
        $name = $_POST["name"];
        $type_id = $_POST["type"];
        require "4B_config.php";
        $query = "update heroes_tb set name='$name', type_id='$type_id' where id='$id'";
        $result = mysqli_query($conn, $query);
        header("Location:4B_index.php");
    }
    ?>
</body>

</html>