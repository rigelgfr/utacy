<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="excss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Sign Up</title>

</head>

<body>

<div class="container">
        <h1 id="welcome">Welcome to Utacy,</h1><br>
        <h1 id="slogan">Where music connects people</h1><br>
        <p>Upload your favorite songs and tune in to them.<br>Create your own playlists and show off your taste.</p><br>
        <div class="buttons">
          <button onclick="openSignupForm()" class="btn btn-purple btn-lg mr-3">Sign Up</button>
          <h2>or</h2>
          <a href="#login" class="btn btn-outline-purple btn-lg">Log In</a>
        </div>
    </div>

<div class="signup-form-wrapper" id="signup-form-wrapper">
  <div class="signup-form">
    <h2>Sign Up</h2>
    <form action="#">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="password-confirm">Retype Password:</label>
      <input type="password" id="password-confirm" name="password-confirm" required>

      <button type="submit" class="btn btn-purple">Sign Up</button>
      <button type="button" onclick="closeSignupForm()" class="btn btn-outline-purple">Close</button>
    </form>
  </div>
</div>

<script src="signup.js"></script>

</body>
</html>
