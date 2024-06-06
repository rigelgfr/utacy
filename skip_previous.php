<?php include 'start_session.php';

$song_id = $_GET['id'];

if (isset($_POST['skip_song'])) {
    $sql = "SELECT id FROM songs WHERE user_id='$user_id' AND id < '$song_id' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Redirect the user to the previous song page
        $prev_song_id = mysqli_fetch_assoc($result)['id'];
        header("Location: utacy_playsong.php?id=$prev_song_id");
        exit();
    } else {
        // If there is no previous song, check if there are any songs left in the database
        $sql = "SELECT id FROM songs WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Redirect the user to the last song in their database
            $last_song_id = mysqli_fetch_assoc($result)['id'];
            header("Location: utacy_playsong.php?id=$last_song_id");
            exit();
        } else {
            // If there are no songs left, redirect the user to the song add page
            echo '<script>alert("There are no other songs.");</script>';
        }
    }
}
mysqli_close($conn);

?>