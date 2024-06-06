<?php include 'start_session.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $song_id = $_GET['id'];

    // Fetch the data of the selected song from the database
    $sql = "SELECT title, artist, album, cover, file FROM songs WHERE id='$song_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $artist = $row['artist'];
        $album = $row['album'];
        $cover = $row['cover'];
        $file = $row['file'];
    }

    if (isset($_POST['skip_back'])) {
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

    if (isset($_POST['skip_song'])) {
        $sql = "SELECT id FROM songs WHERE user_id='$user_id' AND id > '$song_id' ORDER BY id LIMIT 1";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            // Redirect the user to the next song page
            $next_song_id = mysqli_fetch_assoc($result)['id'];
            header("Location: utacy_playsong.php?id=$next_song_id");
            exit();
        } else {
            // If there is no next song, check if there are any songs left in the database
            $sql = "SELECT id FROM songs WHERE user_id='$user_id' ORDER BY id ASC LIMIT 1";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                // Redirect the user to the first song in their database
                $first_song_id = mysqli_fetch_assoc($result)['id'];
                header("Location: utacy_playsong.php?id=$first_song_id");
                exit();
            } else {
                // If there are no songs left, redirect the user to the song add page
                echo '<script>alert("There are no other songs.");</script>';
            }
        }
    }
    
    if (isset($_POST['delete_song'])) {
        // Delete the current song from the database
        $sql = "DELETE FROM songs WHERE id='$song_id' AND user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            // Get the next song ID from the database
            $sql = "SELECT id FROM songs WHERE user_id='$user_id' AND id > '$song_id' ORDER BY id LIMIT 1";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                // Redirect the user to the next song page
                $next_song_id = mysqli_fetch_assoc($result)['id'];
                header("Location: utacy_playsong.php?id=$next_song_id");
                exit();
            } else {
                // If there is no next song, check if there are any songs left in the database
                $sql = "SELECT id FROM songs WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    // Redirect the user to the last song in their database
                    $last_song_id = mysqli_fetch_assoc($result)['id'];
                    header("Location: utacy_playsong.php?id=$last_song_id");
                    exit();
                } else {
                    // If there are no songs left, redirect the user to the song add page
                    header("Location: utacy_addsong.php");
                    exit();
                }
            }
        } else {
            // Display an error message if the deletion was unsuccessful
            echo "Error deleting song: " . mysqli_error($conn);
        }
    }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_playsong.css">
    <link rel="icon" href="icon16.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="playlist_check.js"></script>
    <script src="image_preview.js"></script>
    <script src="audio_control.js"></script>
    <script src="volume_slider.js"></script>
    <script src="duration.js"></script>
    <script src="toggle_loop.js"></script>

    <title><?php echo $title; ?> - <?php echo $artist?></title>

</head>

<body>
    <div class="bg_container">
        <div class="header">
            <div class="logo">
                <h3>Utacy</h3>
            </div>

            <div class="nav">
                <a href="utacy_addsong.php">Add</a>
                <a href="logout.php" class="logout">Logout</a>
            </div>
        </div>

        <div class="main_panel">
            <div class="left_panel">
                <div class="hello">
                    <h4>Hello, <u><?php echo $username ?></u></h4>
                </div>                <div class="playlist">
                    <h6>Playlist</h6>
                    <ul>
                    <?php
                        $sql = "SELECT id, title, artist FROM songs WHERE user_id='$user_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<li>";
                                echo "<a href='utacy_playsong.php?id=" . $row['id'] . "'>";
                                echo "<p class='song-li'>" . $row["title"] . " - <b>" . $row["artist"] . "</b></p>";
                                echo "</a>";
                                echo "</li>";
                            }                            
                        } else {
                            echo "No songs added.";
                        }

                        ?>
                        </ul>
                </div>
            </div>

            <div class="right_panel">
                <div class="create">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="image-preview-container">
                                <div class="preview">
                                    <img id="preview-selected-image" src="cover/<?php echo $cover; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <p class="label" id="labelTitle"><?php echo $title?></p>
                <p class="label" id="labelAlbum"><?php echo $album?></p>
            </div>
                   
        </div>

        <div class="playbar">
            <div class="details-container">
                <div class="details">
                        <p><?php echo $title; ?></p>
                        <p><b><?php echo $artist; ?></b></p>
                </div>
            </div>

            <div class="controls">
                <div class="playbutton">
                    <button id="togglePlay" onclick="playPause()"><i class="bi bi-pause-circle-fill" id="playPauseButton"></i></button>
                </div>

                <div class="slider">
                    <audio id="myAudio" preload="metadata">
                        <source src="songs/<?php echo $file; ?>" type="audio/mpeg">
                    </audio>
                    <span class="time" id="currentTime">0:00</span>
                    <input type="range" class="slider-length" id="seekBar" value="0" min="0" max="100" step="1">
                    <span class="time" id="duration">0:00</span>
                </div>

                <div class="skipbutton">
                    <div class="button-container">
                        <form method="POST"><button type="submit" name="skip_back"><i class="bi bi-skip-start-fill" id="startButton"></i></button></form>
                        <form method="POST"><button type="submit" name="skip_song"><i class="bi bi-skip-end-fill" id="endButton"></i></button></form>
                      
                    </div>
                </div>

                
            </div>

            <div class="delete-container">
                <button onclick="toggleLoop()"><i class="bi bi-arrow-repeat" id="loopButton"></i></button>
                <i class="bi bi-volume-down-fill" id="volumeIcon"></i>
                <input id="vol-control" type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" onchange="SetVolume(this.value)"></input>
                <form method="POST" onsubmit="return confirm('Are you sure you want to remove this song?')">
                    <button class="delete" type="submit" name="delete_song"><i class="bi bi-trash-fill"></i></button>
                </form>
                
            </div>
        </div>
                    
    </div>
        
</body>
</html>