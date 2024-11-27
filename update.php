<?php
include 'connect.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Fetch existing details from database
    $sql = $conn->prepare("SELECT * FROM `tablexam` WHERE id = ?");
    $sql->bindParam(1,$id,PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row){
    $name = $row['name'];
    $rollno = $row['rollno'];
    $email = $row['email'];

    // Update the details if form is submitted
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];

        $sql = $conn->prepare("UPDATE `tablexam` SET name = ?, rollno = ?, email = ? WHERE id = ?");
        $sql->bindParam(1,$name,PDO::PARAM_STR);
        $sql->bindParam(2,$rollno,PDO::PARAM_INT);
        $sql->bindParam(3,$email,PDO::PARAM_STR);
        $sql->bindParam(4, $id, PDO::PARAM_INT);

        if ($sql->execute()) {
            header('Location: display.php');
            exit();
        } else {
            die("Error updating record: " . implode(", ", $sql->errorInfo()));
        }
    }
} else {
    echo "No record found for this ID.";
}
} else {
    echo "No record selected for update.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Update User Details</h1>

    <form action="" method="POST" class="my-4">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="rollno">Roll Number</label>
            <input type="text" name="rollno" id="rollno" class="form-control" value="<?php echo $rollno; ?>" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required autocomplete="off">
        </div>

        <button type="submit" name="update" class="btn btn-primary mt-3">Update User</button>
    </form>
</div>

</body>
</html>
