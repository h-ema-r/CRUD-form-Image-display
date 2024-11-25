<?php
include 'connect.php';

// Insert image
if (isset($_POST['submit1'])) {
    // Check if the file is uploaded without any error
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $image = $_FILES['file'];
        
        // Print the image array to debug
        // print_r($image);
        
        // Get file details
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];
        
        // Specify allowed file types
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        
        // Check if the file has a valid extension
        if (in_array($file_extension, $allowed_extensions)) {
            // Check file size (e.g., 5MB max)
            if ($image_size < 5 * 1024 * 1024) {
                // Create a unique name for the file to avoid overwriting
                $new_image_name = uniqid('', true) . '.' . $file_extension;
                $image_upload_path = 'uploads/' . $new_image_name;
                
                // Move the uploaded file to the "uploads" directory
                if (move_uploaded_file($image_tmp_name, $image_upload_path)) {
                    echo "Image uploaded successfully!";
                } else {
                    echo "Error in uploading the image.";
                }
            } else {
                echo "File is too large. Please upload a file smaller than 5MB.";
            }
        } else {
            echo "Invalid file type. Please upload a JPG, JPEG, PNG, or GIF image.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <h2>Upload Image</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" name="file" class="form-control">
        </div>
        <button type="submit" name="submit1" class="btn btn-dark mt-3">Upload</button>
    </form>

    <!-- Redirect to Display Images Page -->
    <div class="mt-4">
        <a href="display.php" class="btn btn-primary">View Uploaded Images</a>
    </div>
</div>

</body>
</html>
