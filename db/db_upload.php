<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
      isset($_POST["pName"]) &&
      isset($_POST["pDescription"]) &&
      isset($_POST["pQuantity"]) &&
      isset($_POST["pInitialCost"]) &&
      isset($_POST["duration"]) &&

      !empty($_POST["pName"]) &&
      !empty($_POST["pDescription"]) &&
      !empty($_POST["pQuantity"]) &&
      !empty($_POST["duration"]) &&
      !empty($_POST["pInitialCost"])
    ) {

      $pName = $_POST["pName"];
      $pDescription = $_POST["pDescription"];
      $pQuantity = $_POST["pQuantity"];
      $pInitialCost = $_POST["pInitialCost"];
      $duration = $_POST["duration"];
      $ProductCategory = $_POST["ProductCategory"];

      $timestamp = date("Y-m-d H:i:s", strtotime($duration));

      //pImages Validation
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["pImage"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pImage"]["tmp_name"]);
        if ($check !== false) {
          $uploadOk = 1;
        } else {
          $uploadOk = 0;
        }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        // $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["pImage"]["size"] > 500000) {
        $uploadOk = 0;
      }
      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        $uploadOk = 0;
      }
      if ($uploadOk == 0) {
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file)) {
          $uploadOk = 1;
        } else {
          //echo "Sorry, there was an error uploading your file.";
        }
      }

      if ($uploadOk == 1) {

        //insert
        $sql = "INSERT INTO product (
        pName,
        pDescription,
        pImage,
        pQuantity,
        pInitialCost,
        bCountDown,
        Category
        ) VALUES (
          '$pName',
          '$pDescription',
          '$target_file',
          '$pQuantity',
          '$pInitialCost',
          '$timestamp',
          '$ProductCategory'
          )";


        if (mysqli_query($conn, $sql)) {
          header('Location: index.php?msg=SUCCESS: Upload successful.&type=true');
        }else{
          header('Location: upload.php?msg=ERROR: Oops, Something went wrong when uploading the image&type=false'); 
        }
      } else {
        header('Location: upload.php?msg=ERROR: Something went wrong when uploading the image&type=false');
      }
    } else {
      header('Location: upload.php?msg=ERROR: Unable to upload product. Please try again&type=false');
    }
  
}
