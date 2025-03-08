<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/log-in.css">
</head>
<body>
  <div class="login-container" >
     <h2><img src="../images/logo.png" alt="" style="width:220px;
    height:100px;"></h2>
    <form id="login-form" action="log-in_db.php" method="POST">
      <!-- Email Input -->
      <div class="input-group">
        <input type="email" id="email" name="email" placeholder=" " required>
        <label for="email">Email</label>
        <div class="error-message" id="email-error"></div>
      </div>

      <!-- Password Input -->
      <div class="input-group">
        <input type="password" id="password" name="password" placeholder=" " required>
        <label for="password">Password</label>
        <div class="error-message" id="password-error"></div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="submit-btn">Log In</button>

    </form>
    
  </div>

</body>
</html>
