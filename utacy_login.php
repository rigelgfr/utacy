<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utacy";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;

            header('Location: utacy_addsong.php');
            exit();
        } else {
            $error = "Invalid password.";

            header('Location: login.php?error=Wrong%20input');
            exit();
        }
    } else {
        $error = "Invalid username.";

        header('Location: login.php?error=Wrong%20input');
            exit();
    }

    header("Location: login.php?error=Wrong%20input");
    exit();
}

mysqli_close($conn);
