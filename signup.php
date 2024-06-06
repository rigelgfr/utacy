<!DOCTYPE html>
<?php include 'session.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_signup.css">
    <link rel="icon" href="icon16.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="scroll.js"></script>
    <script src="popup.js"></script>
    <script src="check.js"></script>

    
    <title>Utacy - Sign Up</title>

</head>

<body>
    <div class="overlay">
        <div class="top">
            <div class="logo"><img src="bocchi_pixel.png"></div>
        </div>

        <div class="main">
            <div class="signupBox" id="signup_box">
                <form action="utacy_db.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control custom-input" id="username" name="username">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control custom-input" id="password" name="password" minlength="8" placeholder="Minimum 8 characters">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="checkpass">Retype Password:</label>
                        <input type="password" class="form-control custom-input" id="checkpass" name="checkpass">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control custom-input" id="email" name="email">
                    </div>
                    <br>
                    
                    <div class="button">
                        <input type="button" class="btn btn-custom" value="SIGN UP" onclick="signup()">
                        <br><br>
                        
                    </div>
                    <div class="switchText">
                    <p class="switch">Already have an account?<p class="loginSwitch" onclick="redirectToLogin()">Login</p></p>
                    </div>
                </form>


            </div>

            
        </div>
    </div>


  






</body>
</html>