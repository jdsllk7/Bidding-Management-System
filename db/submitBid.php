<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["newBidPrice"]) &&
        isset($_POST["productId"]) &&
        isset($_POST["oldBidPrice"]) &&

        !empty($_POST["oldBidPrice"]) &&
        !empty($_POST["newBidPrice"]) &&
        !empty($_POST["productId"])
    ) {

        $oldBidPrice = $_POST["oldBidPrice"];
        $newBidPrice = $_POST["newBidPrice"];
        $productId = $_POST["productId"];
        $userId = $_COOKIE["userId"];
        $username = $_COOKIE["username"];

        //insert
        $sql = "INSERT INTO bid (
        pBidCost,
        username,
        productId,
        userId
        ) VALUES (
          '$newBidPrice',
          '$username',
          '$productId',
          '$userId'
          )";


        if ($oldBidPrice < $newBidPrice) {

            $data = mysqli_query($conn, "SELECT * from bid WHERE productId = '$productId'");

            if (mysqli_num_rows($data) == 0) {

                if (mysqli_query($conn, $sql)) {
                    header('Location: productPage.php?msg=SUCCESS: Bid successfully submitted..&type=true&productId=' . $productId . '');
                } else {
                    header('Location: productPage.php?msg=ERROR: Unable to submit your bid. Please try again&type=false&productId=' . $productId . '');
                }
            } else {

                //UPDATE
                $sql = "UPDATE bid SET
                    pBidCost = '$newBidPrice',
                    username = '$username',
                    userId = '$userId'
                    WHERE productId = $productId";

                if (mysqli_query($conn, $sql)) {
                    header('Location: productPage.php?msg=SUCCESS: Bid successfully submitted...&type=true&productId=' . $productId . '');
                } else {
                    header('Location: productPage.php?msg=ERROR: Unable to submit your bid. Please try again&type=false&productId=' . $productId . '');
                }
            }
        } else {
            header('Location: productPage.php?msg=ERROR: Please enter price greater than: ' . $oldBidPrice . '. Please try again&type=false&productId=' . $productId . '');
        }
    } else {
        header('Location: productPage.php?msg=ERROR: Unable to submit your bid. Please try again&type=false&productId=' . $productId . '');
    }
}//end if(POST)
