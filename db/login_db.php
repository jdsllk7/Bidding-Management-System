<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["email"]) &&
        isset($_POST["password"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])

    ) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

        // die("SELECT * FROM users WHERE email='$email' AND password='$password'");

        if ($email == 'admin@admin.com' && $password == 'admin') {
            setcookie('admin', 'admin', time() + (86400 * 30), "/");
            header('Location: index.php?msg=SUCCESS: Login Successful. Welcome Boss&type=true');
        } else {

            if (mysqli_num_rows($data) == 1) {

                $user = mysqli_fetch_assoc($data);
                setcookie('userId', $user['userId'], time() + (86400 * 30), "/");
                setcookie('email', $user['email'], time() + (86400 * 30), "/");
                setcookie('username', $user['username'], time() + (86400 * 30), "/");

                header('Location: index.php?msg=SUCCESS: Login Successful&type=true');
            } else {
                header('Location: login.php?msg=ERROR: Incorrect Credentials&type=false');
            }
        }
    }
}
