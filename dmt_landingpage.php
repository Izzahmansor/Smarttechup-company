<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Overview - Smart Tech Up & Smart Factory Recognition</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    html, body {
      height: 100%;
      overflow-x: hidden;
    }

    body {
      background-color: #f1f5f9;
      color: #1e293b;
      display: flex;
      flex-direction: column;
    }

    /* Top Navigation Bar */
    .app-header {
      height: 60px;
      background-color: #0b1148;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      color: #ffffff;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      z-index: 10;
      flex-shrink: 0;
    }

    .header-logo {
      height: 40px;
      object-fit: contain;
    }

    .user-dropdown {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      color: #ffffff;
      background: rgba(255, 255, 255, 0.08);
      padding: 8px 16px;
      border-radius: 20px;
      transition: background 0.2s ease;
    }

    .user-dropdown:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .user-avatar-placeholder {
      width: 28px;
      height: 28px;
      background-color: #3b5998;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 13px;
    }

    /* App Layout Structure */
    .app-container {
      display: flex;
      flex-direction: column;
      flex: 1;
      min-height: 0;
    }

    /* Sub-Header / Breadcrumb */
    .sub-header-bar {
      height: 38px;
      background-color: #ffffff;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      padding: 0 32px;
      flex-shrink: 0;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 12px;
      color: #64748b;
    }

    .breadcrumb-separator {
      font-size: 9px;
      color: #94a3b8;
    }

    .active-page {
      color: #3b5998;
      font-weight: 600;
    }

    /* Main Workspace */
    .main-workspace {
      flex: 1;
      max-width: 1080px;
      width: 100%;
      margin: 0 auto;
      padding: 24px 24px 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Hero Section */
    .hero-section {
      text-align: center;
      margin-bottom: 24px;
    }

    .welcome-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background-color: #e0e7ff;
      color: #3730a3;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: 20px;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .hero-title {
      font-size: 26px;
      font-weight: 800;
      color: #0f172a;
      letter-spacing: -0.5px;
      margin-bottom: 6px;
    }

    .hero-subtitle {
      font-size: 13px;
      color: #64748b;
      line-height: 1.4;
    }

    /* Portal Grid Layout */
    .portal-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 24px;
      width: 100%;
    }

    @media (max-width: 868px) {
      .portal-grid {
        grid-template-columns: 1fr;
      }
    }

    /* Portal Card Style */
    .portal-card {
      background-color: #ffffff;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .portal-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 24px -6px rgba(11, 17, 72, 0.12);
      border-color: #cbd5e1;
    }

    /* Card Image Header */
    .card-image-container {
      position: relative;
      height: 150px;
      width: 100%;
      overflow: hidden;
    }

    .card-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .portal-card:hover .card-image {
      transform: scale(1.05);
    }

    .image-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(180deg, rgba(11, 17, 72, 0.1) 0%, rgba(11, 17, 72, 0.65) 100%);
    }

    .card-tag {
      position: absolute;
      bottom: 12px;
      left: 14px;
      font-size: 10px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 6px;
      color: #ffffff;
      display: flex;
      align-items: center;
      gap: 6px;
      backdrop-filter: blur(4px);
    }

    .tag-stu {
      background: rgba(37, 99, 235, 0.88);
    }

    .tag-factory {
      background: rgba(225, 29, 72, 0.88);
    }

    /* Card Body Content */
    .card-body {
      padding: 16px 18px;
      display: flex;
      flex-direction: column;
      flex: 1;
    }

    .card-title {
      font-size: 17px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 4px;
    }

    .card-description {
      font-size: 12px;
      color: #64748b;
      line-height: 1.45;
      margin-bottom: 12px;
    }

    /* Feature List */
    .feature-list {
      list-style: none;
      margin-bottom: 16px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .feature-list li {
      font-size: 11.5px;
      color: #334155;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .feature-list li i {
      color: #2563eb;
      font-size: 12px;
    }

    .card-card-factory .feature-list li i {
      color: #e11d48;
    }

    /* Card Footer Action Buttons */
    .card-footer {
      margin-top: auto;
    }

    .btn-portal {
      width: 100%;
      padding: 11px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: all 0.25s ease;
    }

    .btn-stu {
      background-color: #2563eb;
      color: #ffffff;
      box-shadow: 0 3px 8px rgba(37, 99, 235, 0.2);
    }

    .btn-stu:hover {
      background-color: #1d4ed8;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
    }

    .btn-factory {
      background-color: #e11d48;
      color: #ffffff;
      box-shadow: 0 3px 8px rgba(225, 29, 72, 0.2);
    }

    .btn-factory:hover {
      background-color: #be123c;
      box-shadow: 0 4px 12px rgba(225, 29, 72, 0.35);
    }

    /* App Footer */
    .app-footer {
      padding: 14px 24px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 32px;
      font-size: 11px;
      color: #64748b;
      border-top: 1px solid #e2e8f0;
      background-color: #ffffff;
      flex-shrink: 0;
    }

    .app-footer a {
      color: #3b5998;
      text-decoration: none;
      font-weight: 500;
    }

    .app-footer a:hover {
      text-decoration: underline;
    }

    .footer-divider {
      color: #cbd5e1;
    }
  </style>
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
        <span class="user-email">stusuper</span>
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
        <span class="active-page">Portal Selection</span>
      </div>
    </div>

    <!-- Main Workspace Content -->
    <main class="main-workspace">
      
      <!-- Hero Headline Section -->
      <section class="hero-section">
        <div class="welcome-badge">
          <i class="fa-solid fa-rocket"></i> Portal Pathway
        </div>
        <h1 class="hero-title">What would you like to do?</h1>
        <p class="hero-subtitle">Select your portal pathway to start a Smart Tech Up application or obtain Smart Factory Recognition.</p>
      </section>

      <!-- Pathway Cards Grid -->
      <div class="portal-grid">

        <!-- Card 1: Smart Tech Up -->
        <article class="portal-card">
          <div class="card-image-container">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" alt="Smart Tech Up" class="card-image" />
            <div class="image-overlay"></div>
            <span class="card-tag tag-stu"><i class="fa-solid fa-microchip"></i> Technology Funding</span>
          </div>

          <div class="card-body">
            <h2 class="card-title">Smart Tech Up</h2>
            <p class="card-description">
              Start your Smart Tech Up Application here to apply for technology funding, track milestone implementation, and manage proposals.
            </p>
            
            <ul class="feature-list">
              <li><i class="fa-solid fa-circle-check"></i> Complete Self-Assessment & OSFA Requirements</li>
              <li><i class="fa-solid fa-circle-check"></i> Apply for STU Standard, Fast Lane, or PPP</li>
              <li><i class="fa-solid fa-circle-check"></i> Real-time Proposal & Project Tracking</li>
            </ul>

            <div class="card-footer">
              <a href="dmt_stupage.php" class="btn-portal btn-stu">
                <span>Start Application</span>
                <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- Card 2: Smart Factory Excellence and Recognition -->
        <article class="portal-card card-card-factory">
          <div class="card-image-container">
            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&auto=format&fit=crop" alt="Smart Factory Excellence and Recognition" class="card-image" />
            <div class="image-overlay"></div>
            <span class="card-tag tag-factory"><i class="fa-solid fa-award"></i> Excellence & Certification</span>
          </div>

          <div class="card-body">
            <h2 class="card-title">Smart Factory Excellence and Recognition</h2>
            <p class="card-description">
              Get Smart Factory Recognition. Demonstrate high-level industrial automation readiness and achieve SIRIM & MITI accreditation.
            </p>

            <ul class="feature-list">
              <li><i class="fa-solid fa-circle-check" style="color: #e11d48;"></i> Submit Factory Readiness & Assessment Data</li>
              <li><i class="fa-solid fa-circle-check" style="color: #e11d48;"></i> Verify Industry 4.0 Compliance & Automation</li>
              <li><i class="fa-solid fa-circle-check" style="color: #e11d48;"></i> Receive Official SIRIM Smart Factory Certification</li>
            </ul>

            <div class="card-footer">
              <a href="dmt_spherepage.php" class="btn-portal btn-factory">
                <span>Get Recognition</span>
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