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
                <a class="nav-link" href="4B_add_hero.php"><button type="button" class="btn btn-warning">Add Hero</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="4B_delete_type.php"><button type="button" class="btn btn-danger">Delete Type</button></a>
            </li>
        </ul>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Type Hero</h5>
                <form action="4B_add_type.php" method="POST">
                    <div class="form-group">
                        <label for="name">Type Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button type="submit" class="btn btn-warning" name="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        require "4B_config.php";
        $query = "insert into type_tb(name) values('$name')";
        $result = mysqli_query($conn, $query);
        echo "<div class=\"alert alert-warning\" role=\"alert\">Sukses tambah type hero</div>";
    }
    ?>
</body>

</html>