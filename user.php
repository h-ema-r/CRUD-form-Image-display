<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $email = $_POST['email'];

    $sql = $conn->prepare("INSERT INTO `tablexam` (name, rollno, email) VALUES(?,?,?)");
    $sql->bindParam(1,$name,PDO::PARAM_STR);
    $sql->bindParam(2,$rollno,PDO::PARAM_INT);
    $sql->bindParam(3,$email,PDO::PARAM_STR);

    if ($sql->execute()) {
        header('Location: display.php');
    } else {
        die("Error:" . implode(", ", $sql->errorInfo()));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Add New User</h1>

    <form action="" method="POST" class="my-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="rollno">Roll Number</label>
            <input type="text" name="rollno" id="rollno" class="form-control" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-3">Add User</button>
    </form>
</div>

</body>
</html>
