<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["username"]) &&
        isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        isset($_POST["repeatPassword"]) &&

        !empty($_POST["username"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["repeatPassword"])
    ) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];

        //insert
        $sql = "INSERT INTO users (
        username,
        email,
        password
        ) VALUES (
          '$username',
          '$email',
          '$password'
          )";

        $data = mysqli_query($conn, "SELECT * from users WHERE email like '$email'");

        if (mysqli_num_rows($data) == 0 && $repeatPassword == $password) {

            mysqli_query($conn, $sql); //run insert query
            $userId = mysqli_insert_id($conn);

            header('Location: login.php?msg=SUCCESS: Signup successful. Please login to get started&type=true');
        } else {
            header('Location: signup.php?msg=ERROR: Unable to register your account. Please try again&type=false');
        }
    } else {
        header('Location: signup.php?msg=ERROR: Unable to register your account. Please try again&type=false');
    }
}//end if(POST)
