<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Smart Tech Up - Registration</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <!-- Top Navigation Bar -->
  <header class="top-nav">
    <div class="nav-container-centered">
      
      <!-- Logo Section -->
      <div class="nav-logo-group">
        <img src="miti-sirim-logo.png" alt="MITI and SIRIM Logo" class="brand-logo-img" />
      </div>

      <!-- Links & Button Group -->
      <div class="nav-center-group">
        <nav class="nav-links">
          <a href="#">NIMP 2030</a>
          <a href="#">FAQ</a>
          <a href="#" class="highlight-link">SFERE</a>
          <a href="#">Biddings</a>
          <a href="#">Contact Us</a>
        </nav>
        <a href="login.php" class="btn-login-dark">LOGIN</a>
      </div>

    </div>
  </header>

  <!-- Main Content Layout -->
  <main class="main-wrapper">
    <div class="split-container">
      
      <!-- Left Section: Compact Registration Form -->
      <div class="form-section">
        <div class="form-card">
          <div class="form-header">
            <h1>Create Your Account</h1>
            <p>Smart Tech Up Registration Portal</p>
          </div>

          <form action="register_process.php" method="POST" class="register-form">
            
            <!-- Row 1: Email & Company Name -->
            <div class="form-row">
              <div class="input-field">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" id="email" name="email" placeholder="e.g. contact@company.com" required />
              </div>

              <div class="input-field">
                <label for="company_name">Company Name <span class="required">*</span></label>
                <input type="text" id="company_name" name="company_name" placeholder="e.g. Nexus Tech" required />
              </div>
            </div>

            <!-- Row 2: Passwords -->
            <div class="form-row">
              <div class="input-field">
                <label for="password">Password <span class="required">*</span></label>
                <div class="password-box">
                  <input type="password" id="password" name="password" placeholder="••••••••" required />
                  <i class="fa-regular fa-eye toggle-pwd" onclick="togglePasswordVisibility('password', this)"></i>
                </div>
              </div>

              <div class="input-field">
                <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                <div class="password-box">
                  <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required />
                  <i class="fa-regular fa-eye toggle-pwd" onclick="togglePasswordVisibility('confirm_password', this)"></i>
                </div>
              </div>
            </div>

            <!-- Row 3: Role Dropdown -->
            <div class="input-field full-width">
              <label for="company_type">Company Registration Category <span class="required">*</span></label>
              <div class="select-box">
                <select id="company_type" name="company_type" required>
                  <option value="" disabled selected>Select category</option>
                  <option value="applicant">Smart Tech Up / Smart Factory Recognition Applicant</option>
                  <option value="solution_provider">Solution Provider</option>
                </select>
                <i class="fa-solid fa-chevron-down select-icon"></i>
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary">Register Account</button>

            <div class="form-footer-link">
              Already have an account? <a href="login.php">Log in</a>
            </div>

          </form>
        </div>
      </div>

      <!-- Right Section: Professional Image -->
      <div class="image-section">
        <img src="register.jpg" alt="Modern Smart Factory" class="hero-image" />
      </div>

    </div>
  </main>

  <!-- Dark Professional Footer -->
  <footer class="site-footer">
    <div class="footer-container">
      
      <!-- Top Grid Section -->
      <div class="footer-top">
        
        <!-- Brand Info & Socials -->
        <div class="footer-brand">
          <div class="footer-logo">
            <div class="logo-icon">
              <i class="fa-solid fa-microchip"></i>
            </div>
            <div>
              <h3>Smart Tech Up</h3>
              <p class="logo-sub">MITI & SIRIM Programme</p>
            </div>
          </div>
          <p class="brand-desc">
            Accelerating advanced technology adoption among manufacturing companies and transformation into digitally connected smart factories.
          </p>
          <div class="social-links">
            <a href="#" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
            <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>

        <!-- Column 1: Programme Details -->
        <div class="footer-column">
          <h4>Programme</h4>
          <ul>
            <li><a href="#">Government Assistance (50%)</a></li>
            <li><a href="#">On-site Assessment (OSFA)</a></li>
            <li><a href="#">Project Guidance</a></li>
            <li><a href="#">Subsidised Loans</a></li>
            <li><a href="#">Guidelines & Manuals</a></li>
          </ul>
        </div>

        <!-- Column 2: Eligibility & Process -->
        <div class="footer-column">
          <h4>Process & Criteria</h4>
          <ul>
            <li><a href="#">Companies Act 2016</a></li>
            <li><a href="#">51% Malaysian Owned</a></li>
            <li><a href="#">Online Self-Assessment</a></li>
            <li><a href="#">Open Biddings Status</a></li>
            <li><a href="#">Audit & Impact Study</a></li>
          </ul>
        </div>

        <!-- Column 3: Help & Support -->
        <div class="footer-column">
          <h4>Support & FAQ</h4>
          <ul>
            <li><a href="#">Smart FAQ</a></li>
            <li><a href="#">Technology Covered</a></li>
            <li><a href="#">AI Chatbot Assistant</a></li>
            <li><a href="#">Contact Support</a></li>
            <li><a href="#">SIRIM Updates</a></li>
          </ul>
        </div>

      </div>

      <hr class="footer-divider" />

      <!-- Bottom Bar -->
      <div class="footer-bottom">
        <p class="copyright">© 2026 Smart Tech Up. All rights reserved.</p>
        
        <div class="legal-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
          <a href="#">Cookie Policy</a>
          <a href="#">Security</a>
        </div>

      </div>

    </div>
  </footer>

  <script>
    function togglePasswordVisibility(fieldId, iconElement) {
      const field = document.getElementById(fieldId);
      if (field.type === "password") {
        field.type = "text";
        iconElement.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        field.type = "password";
        iconElement.classList.replace("fa-eye-slash", "fa-eye");
      }
    }
  </script>

</body>
</html>