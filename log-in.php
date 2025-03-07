<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/log-in.css">
</head>
<body>
  <div class="login-container">
    <h2>HSGH</h2>
    <form id="login-form">
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

  <script>
    // Form validation logic
    document.getElementById('login-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission for validation

      // Reset error messages
      document.getElementById('email-error').textContent = '';
      document.getElementById('password-error').textContent = '';

      // Get form values
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      let valid = true;

      // Email validation
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === '' || !emailPattern.test(email)) {
        document.getElementById('email-error').textContent = 'Please enter a valid email address.';
        valid = false;
      }

      // Password validation
      if (password === '') {
        document.getElementById('password-error').textContent = 'Password is required.';
        valid = false;
      }

      // If form is valid, show success message (or redirect)
      if (valid) {
        alert('Login Successful!');
        // Here you can add form submission to a backend or redirect
      }
    });
  </script>

</body>
</html>
