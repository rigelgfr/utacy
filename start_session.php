<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utacy";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();
        $user_id = $_SESSION['user_id'];

        $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$user_id'");
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
        }

?>