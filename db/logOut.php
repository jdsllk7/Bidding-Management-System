<?php
setcookie('userId', '', time() - 3600, "/");
setcookie('username', '', time() - 3600, "/");
setcookie('email', '', time() - 3600, "/");
setcookie('admin', '', time() - 3600, "/");
header('Location:../index.php?msg=You have logged out&type=false');