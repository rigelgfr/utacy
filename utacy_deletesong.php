<?php
include 'start_session.php';

$current_song_id = $_GET['id'];

// Delete the current song from the database
$sql = "DELETE FROM songs WHERE id='$current_song_id' AND user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Get the next song ID from the database
    $sql = "SELECT id FROM songs WHERE user_id='$user_id' AND id > '$current_song_id' ORDER BY id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Redirect the user to the next song page
        $next_song_id = mysqli_fetch_assoc($result)['id'];
        header("Location: utacy_playsong.php?id=$next_song_id");
        exit();
    } else {
        // If there is no next song, redirect the user to the song list page
        header("Location: utacy_addsong.php");
        exit();
    }
} else {
    // Display an error message if the deletion was unsuccessful
    echo "Error deleting song: " . mysqli_error($conn);
}
?>