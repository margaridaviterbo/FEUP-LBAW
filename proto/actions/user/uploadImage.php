<?php

$target_dir = "../../resources/images/users/";
$photo_name= basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $photo_name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

print_r($_FILES);

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file sizex
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo '<script> alert("The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.") </script>';
    } else {
        echo '<script> alert("Sorry, there was an error uploading your file.") </script>';
    }
}

?>