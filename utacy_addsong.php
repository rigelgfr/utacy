<?php include 'start_session.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Check if form was submitted
    if(isset($_POST['create_song'])) {
        // Get form data
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $album = $_POST['album'];
        $file = $_POST['file'];
        $cover = $_POST['cover'];
        
        // Prepare SQL query
        $sql = "INSERT INTO songs (title, artist, album, file, cover, user_id) VALUES ('$title', '$artist', '$album', '$file', '$cover', '$user_id')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            header("Location: /finalproject/utacy_addsong.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_addsong.css">
    <link rel="icon" href="icon16.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="playlist_check.js"></script>
    <script src="image_preview.js"></script>

    <title>Add song</title>

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
                </div>                
                <div class="playlist">
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

                        // Close database connection
                        mysqli_close($conn);
                        ?>
                        </ul>
                </div>
            </div>

            <div class="right_panel">
                <div class="create">
                    <h1>Add a song</h1>
                    <hr><br>

                    <form method="post" id="song-form" onsubmit="return validateSong()">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="image-preview-container">
                                    <div class="preview">
                                        <img id="preview-selected-image"/>
                                    </div>
                                    <input type="file" id="cover-upload" accept="image/*" name="cover" onchange="previewImage(event);" />
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <label for="title" class="col-sm-2 col-form-label">Title:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="artist" class="col-sm-2 col-form-label">Artist:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="artist" name="artist">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="album" class="col-sm-2 col-form-label">Album:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="album" name="album">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="path" class="col-sm-2 col-form-label">File:</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file-upload" accept="audio/*" name="file"/>
                                    </div>
                                </div>

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10"><br>
                                    <button type="submit" class="btn btn-custom" name="create_song">Add</button>
                                    <p class="feedback"></p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
            
        </div>

    </div>

    






</body>
</html>