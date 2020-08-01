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
    <title>Tambah Type Hero</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="4B_index.php"><button type="button" class="btn btn-warning">Home</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4B_add_type.php"><button type="button" class="btn btn-warning">Add Type</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4B_delete_type.php"><button type="button" class="btn btn-danger">Delete Type</button></a>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Hero Baru</h5>
                <form action="4B_add_hero.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nama Hero</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="type">Type Hero</label>
                        <select class="form-control" id="type" name="type">
                            <?php
                            while ($type = mysqli_fetch_array($result)) {
                                echo "<option value=\"" . $type["id"] . "\">" . $type["name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="customFile" accept="image/png, image/jpeg">
                        <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-warning" name="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        require '4B_config.php';
        $name = $_POST["name"];
        $type_id = $_POST["type"];
        $photo = $_POST["customFile"];
        $query = "insert into heroes_tb(name, type_id, photo) values('$name', '$type_id', '$photo')";
        $result = mysqli_query($conn, $query);
        header("Location:4B_index.php");
    }
    ?>
</body>

</html>