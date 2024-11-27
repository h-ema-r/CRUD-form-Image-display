<?php

$ds = "mysql:host=localhost;dbname=exam";

try {
    $conn = new PDO($ds,"root","admin");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connection successful!";

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
