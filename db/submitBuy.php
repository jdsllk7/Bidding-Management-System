<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["finalCost"]) &&
        isset($_POST["address"]) &&
        isset($_POST["city"]) &&
        isset($_POST["country"]) &&
        isset($_POST["zip"]) &&
        isset($_POST["tel"]) &&
        isset($_POST["productId"]) &&
        isset($_POST["userId"]) &&

        !empty($_POST["finalCost"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["city"]) &&
        !empty($_POST["country"]) &&
        !empty($_POST["zip"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["productId"]) &&
        !empty($_POST["userId"])
    ) {

        $finalCost = $_POST["finalCost"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $zip = $_POST["zip"];
        $tel = $_POST["tel"];
        $productId = $_POST["productId"];
        $userId = $_POST["userId"];

        //insert
        $sql = "INSERT INTO payments (
        finalCost,
        address,
        city,
        country,
        zip,
        tel,
        productId,
        userId
        ) VALUES (
          '$finalCost',
          '$address',
          '$city',
          '$country',
          '$zip',
          '$tel',
          $productId,
          $userId
          )";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../index.php?msg=SUCCESS: Payment successful.&type=true&productId=' . $productId . '');
        } else {
            header('Location: ../index.php?msg=ERROR: Unable to make payment. Please try again.&type=false&productId=' . $productId . '');
        }
    } else {
        header('Location: ../index.php?msg=ERROR: Unable to make payment. Please try again..&type=false&productId=' . $productId . '');
    }
}//end if(POST)
