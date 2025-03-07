<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="assets/css/sign-up.css">
</head>
<body>
  <div class="signup-container">
    <h2>HSGH</h2>

    <form id="signup-form">
      <!-- Full Name Input -->
      <div class="input-group">
        <input type="text" id="full-name" name="full-name" placeholder=" " required>
        <label for="full-name">Full Name</label>
        <div class="error-message" id="name-error"></div>
      </div>

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

      <!-- Confirm Password Input -->
      <div class="input-group">
        <input type="password" id="confirm-password" name="confirm-password" placeholder=" " required>
        <label for="confirm-password">Confirm Password</label>
        <div class="error-message" id="confirm-password-error"></div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="submit-btn">Sign Up</button>
    </form>

    <div class="signup-footer">
      <p>Already have an account? <a href="#">Log in</a></p>
    </div>
  </div>

  <script>
    // Form Validation Logic
    document.getElementById('signup-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission for validation

      // Reset error messages
      document.getElementById('name-error').textContent = '';
      document.getElementById('email-error').textContent = '';
      document.getElementById('password-error').textContent = '';
      document.getElementById('confirm-password-error').textContent = '';

      // Get form values
      const name = document.getElementById('full-name').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;

      let valid = true;

      // Name validation
      if (name === '') {
        document.getElementById('name-error').textContent = 'Full Name is required.';
        valid = false;
      }

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

      // Confirm Password validation
      if (confirmPassword !== password) {
        document.getElementById('confirm-password-error').textContent = 'Passwords do not match.';
        valid = false;
      }

      // If form is valid, show success message (or submit to the server)
      if (valid) {
        alert('Sign Up Successful!');
      }
    });
  </script>

</body>
</html>
