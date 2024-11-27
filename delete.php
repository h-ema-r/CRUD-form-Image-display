<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Delete the user from the database
    $sql = $conn->prepare("DELETE FROM `tablexam` WHERE id = ?");
    $sql->bindParam(1,$id,PDO::PARAM_INT);

    if ($sql->execute()) {
        header('Location: display.php');
    } else {
        die("Error deleting record: " . $sql->errorInfo()[2]);
    }
}
?>
