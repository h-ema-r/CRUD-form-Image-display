<?php

include 'connect.php';




// include 'connect.php';
// // submit button click vayo vane--insert data in database
// if(isset($_POST['submit'])){
//     $name=$_POST['name'];
//     $email=$_POST['email'];
//     $mobile=$_POST['mobile'];
//     $password=$_POST['password'];


// }

// Check if the form data is received via POST
if (isset($_POST['submit'])) {
$name =$_POST['name'];
$rollno=$_POST['rollno'];
$email=$_POST['email'];



$sql =$conn->prepare("insert into `tablexam`(name,rollno,email)
     values(?,?,?)");

$sql->bindParam(1,$name,PDO::PARAM_STR);
$sql->bindParam(2,$rollno,PDO::PARAM_INT);
$sql->bindParam(3,$email,PDO::PARAM_STR);


if($sql->execute()){
//echo "Data inserted successfully";
header('location:display.php');
}else{
  die("Error inserting data: " . implode(", ", $sql->errorInfo()));
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student Details</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
</head>
<body>
   <!-- Navbaar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Display</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="uploadImage.php">upload-image</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <h1 class="d-flex justify-content-center mt-5">Student Details</h1>
    <div class="container">
    
        <form class="my-5" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="off" required>
              </div>

              <div class="form-group">
                <label>Rollno.</label>
                <input type="text" class="form-control" id="rollno" name="rollno" autocomplete="off" required>
              </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
            </div>
           

            <button type="submit" class="btn btn-dark mt-3" name="submit">Submit</button>
          </form>

    </div>
    
</body>
</html>