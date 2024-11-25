<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Delete the user from the database
    $sql = "DELETE FROM `tablexam` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: display.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
