<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Tech Up - Log In</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="login_style.css" />
</head>
<body>

  <div class="login-wrapper">
    
    <!-- Left Decorative Graphic Side -->
    <div class="login-left">
      <div class="organic-shape-container">
        <img src="tech-cloud-bg.jpg" alt="Technology Cloud Graphic" class="graphic-img" />
      </div>
    </div>

    <!-- Right Login Form Side -->
    <div class="login-right">
      <div class="login-box">
        
        <!-- Logo -->
        <div class="logo-container">
          <img src="sirim-logo.png" alt="SIRIM Logo" class="sirim-logo" />
        </div>

        <!-- Headings -->
        <h1 class="main-title">SMART TECH UP</h1>
        <h2 class="sub-title">LOG IN</h2>
        <p class="welcome-text">Welcome! Please enter your details</p>

        <!-- Role Selector Tabs -->
        <div class="role-selector">
          <button type="button" class="role-btn">Applicant</button>
          <button type="button" class="role-btn active">Staff</button>
          <button type="button" class="role-btn">Crowd Innovators</button>
        </div>

        <!-- Form -->
        <form action="login_process.php" method="POST" class="login-form">
          
          <div class="form-group">
            <label for="email"><span class="required">*</span> Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required />
          </div>

          <div class="form-group">
            <label for="password"><span class="required">*</span> Password</label>
            <div class="password-input-wrapper">
              <input type="password" id="password" name="password" placeholder="Enter password" required />
              <i class="fa-solid fa-eye-slash toggle-password"></i>
            </div>
          </div>

          <div class="form-actions-link">
            <a href="forgot_password.php" class="forgot-link">Forgot your password?</a>
          </div>

          <p class="register-text">
            Don't have an account? <a href="register.php" class="register-link">Register now.</a>
          </p>

          <button type="submit" class="btn-login">Log In</button>

        </form>

        <!-- Footer -->
        <footer class="login-footer">
          Copyright &copy; 2026 Smart Tech Up. All rights reserved.
        </footer>

      </div>
    </div>

  </div>

</body>
</html>