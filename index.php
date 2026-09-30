<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Overview - Smart Tech Up</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- External Stylesheet -->
  <link rel="stylesheet" href="landing_style.css" />
</head>
<body>

  <!-- Top Header Bar -->
  <header class="app-header">
    <div class="header-left">
      <img src="miti-sirim-logo.png" alt="MITI & SIRIM Logo" class="header-logo" />
    </div>
    <div class="header-right">
      <div class="user-dropdown">
        <span class="user-avatar-placeholder"><i class="fa-solid fa-user"></i></span>
        <span class="user-email">stuuser06@yopmail.com</span>
        <i class="fa-solid fa-caret-down"></i>
      </div>
    </div>
  </header>

  <!-- Main Container Layout -->
  <div class="app-container">

    <!-- Sub-Header / Breadcrumb -->
    <div class="sub-header-bar">
      <div class="breadcrumb">
        <span>Overview</span>
        <i class="fa-solid fa-chevron-right breadcrumb-separator"></i>
        <span class="active-page">Smart Tech Up</span>
      </div>
    </div>

    <!-- Main Workspace Content -->
    <main class="main-workspace">
      
      <!-- Hero Headline Section -->
      <section class="hero-section">
        <div class="welcome-badge">
          <i class="fa-solid fa-rocket"></i> Portal Selection
        </div>
        <h1 class="hero-title">What would you like to do?</h1>
        <p class="hero-subtitle">Select your portal pathway to manage applications or register as an approved technology provider.</p>
      </section>

      <!-- Pathway Cards Grid -->
      <div class="portal-grid">

        <!-- Card 1: Smart Tech Up Applicant -->
        <article class="portal-card">
          <div class="card-image-container">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" alt="Smart Tech Up Applicant" class="card-image" />
            <div class="image-overlay"></div>
            <span class="card-tag tag-applicant"><i class="fa-solid fa-building"></i> Industry Applicant</span>
          </div>

          <div class="card-body">
            <h2 class="card-title">Smart Tech Up Applicant</h2>
            <p class="card-description">
              Apply for Smart Tech Up funding, track project flow milestones, submit technical proposals, and manage assessment status.
            </p>
            
            <ul class="feature-list">
              <li><i class="fa-solid fa-circle-check"></i> Complete Self-Assessment & OSFA</li>
              <li><i class="fa-solid fa-circle-check"></i> Apply for STU Standard, Fast Lane, or PPP</li>
              <li><i class="fa-solid fa-circle-check"></i> Real-time Proposal & Implementation Tracking</li>
            </ul>

            <div class="card-footer">
              <a href="stu_companydashboard.php" class="btn-portal btn-applicant">
                <span>Start Application</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Card 2: Crowd Innovator -->
        <article class="portal-card">
          <div class="card-image-container">
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&auto=format&fit=crop" alt="Crowd Innovator" class="card-image" />
            <div class="image-overlay"></div>
            <span class="card-tag tag-innovator"><i class="fa-solid fa-lightbulb"></i> Solution Provider</span>
          </div>

          <div class="card-body">
            <h2 class="card-title">Crowd Innovator</h2>
            <p class="card-description">
              Join the ecosystem as a Tech Solution Provider (CI). Submit RFPs, collaborate with industrial applicants, and implement Smart Tech initiatives.
            </p>

            <ul class="feature-list">
              <li><i class="fa-solid fa-circle-check"></i> Register Provider Profile & Credentials</li>
              <li><i class="fa-solid fa-circle-check"></i> Respond to Industrial RFPs & Projects</li>
              <li><i class="fa-solid fa-circle-check"></i> Direct Collaboration with SIRIM & MITI</li>
            </ul>

            <div class="card-footer">
              <a href="crowd_innovator.php" class="btn-portal btn-innovator">
                <span>Register as Provider</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

      </div>

    </main>

    <!-- Page Footer -->
    <footer class="app-footer">
      <div class="footer-left">
        Copyright © 2026 Smart Tech Up. All rights reserved.
      </div>
      <div class="footer-right">
        <a href="#">Legal Terms</a> <span class="footer-divider">|</span>
        <a href="#">Privacy Policy</a> <span class="footer-divider">|</span>
        <a href="#">Cookie Policy</a>
      </div>
    </footer>

  </div>

</body>
</html>