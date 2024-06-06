<?php include 'start_session.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // Check if form was submitted
    if(isset($_POST['create_playlist'])) {
        // Get form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        // Prepare SQL query
        $sql = "INSERT INTO playlists (name, description, user_id) VALUES ('$name', '$description', '$user_id')";

        // Execute SQL query
        if (mysqli_query($conn, $sql)) {
            header("Location: /finalproject/utacy.php");
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
    <link rel="stylesheet" href="style_main.css">
    <link rel="icon" href="icon16.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="playlist_check.js"></script>

    <title>Create playlist</title>

</head>

<body>
    <div class="bg_container">
        <div class="header">
            <div class="logo">
                <h3>Utacy</h3>
            </div>

            <div class="nav">
                <a href="utacy.php">Create</a>
                <a href="utacy_addsong.php">Add</a>
                <a href="#">Edit</a>
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
                        $sql = "SELECT name FROM playlists WHERE user_id='$user_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<li><a href='playlist.php'>" . $row["name"] . "</a></li>";
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
                    <h1>Create a playlist</h1>
                    <hr><br>

                    <form method="post" id="playlist-form" onsubmit="return validatePlaylist()">
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10"><br>
                                <button type="submit" class="btn btn-custom" name="create_playlist">Create</button>
                                <p class="feedback"></p>
                                </div>
                        </div>
                    </form>

                </div>

            </div>
            
        </div>

    </div>

    






</body>
</html>