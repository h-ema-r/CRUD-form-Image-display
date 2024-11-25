<?php
include 'connect.php';

// Fetch all users
$sql = "SELECT * FROM `tablexam`";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-5">Student Details</h1>

    <button type="button" class="btn btn-primary my-5"><a href="user.php" class="text-light">Add user</a></button>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Roll No.</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['rollno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <button class="btn btn-primary"><a href="update.php?updateid=<?php echo $row['id']; ?>" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid=<?php echo $row['id']; ?>" class="text-light">Delete</a></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="my-5">Uploaded Images</h2>
    <div class="row">
        <?php
        $images = glob('uploads/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach ($images as $image) {
            echo '<div class="col-3 mb-3">
                    <img src="' . $image . '" class="img-fluid" alt="Uploaded Image">
                  </div>';
        }
        ?>
    </div>

</div>

</body>
</html>
