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

/* Bigger Nav Header (Matching original layout) */
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
  max-width: 1040px;
  width: 100%;
  margin: 0 auto;
  padding: 16px 24px 12px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

/* Hero Section */
.hero-section {
  text-align: center;
  margin-bottom: 16px;
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
  margin-bottom: 6px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.hero-title {
  font-size: 24px;
  font-weight: 800;
  color: #0f172a;
  letter-spacing: -0.5px;
  margin-bottom: 4px;
}

.hero-subtitle {
  font-size: 12.5px;
  color: #64748b;
  line-height: 1.4;
}

/* Portal Grid Layout */
.portal-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
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
  box-shadow: 0 12px 24px -6px rgba(11, 17, 72, 0.1);
  border-color: #cbd5e1;
}

/* Card Image Header (Compact Height) */
.card-image-container {
  position: relative;
  height: 130px;
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
  background: linear-gradient(180deg, rgba(11, 17, 72, 0.1) 0%, rgba(11, 17, 72, 0.6) 100%);
}

.card-tag {
  position: absolute;
  bottom: 10px;
  left: 12px;
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

.tag-applicant {
  background: rgba(59, 89, 152, 0.85);
}

.tag-innovator {
  background: rgba(13, 148, 136, 0.85);
}

/* Card Body Content */
.card-body {
  padding: 14px 16px;
  display: flex;
  flex-direction: column;
  flex: 1;
}

.card-title {
  font-size: 16px;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 4px;
}

.card-description {
  font-size: 11.5px;
  color: #64748b;
  line-height: 1.45;
  margin-bottom: 10px;
}

/* Feature List */
.feature-list {
  list-style: none;
  margin-bottom: 12px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.feature-list li {
  font-size: 11px;
  color: #334155;
  font-weight: 500;
  display: flex;
  align-items: center;
  gap: 8px;
}

.feature-list li i {
  color: #3b5998;
  font-size: 12px;
}

/* Card Footer Action Button */
.card-footer {
  margin-top: auto;
}

.btn-portal {
  width: 100%;
  padding: 10px;
  border-radius: 6px;
  font-size: 12.5px;
  font-weight: 600;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: all 0.25s ease;
}

.btn-applicant {
  background-color: #3b5998;
  color: #ffffff;
  box-shadow: 0 3px 8px rgba(59, 89, 152, 0.2);
}

.btn-applicant:hover {
  background-color: #2d4373;
  box-shadow: 0 4px 12px rgba(59, 89, 152, 0.3);
}

.btn-innovator {
  background-color: #0d9488;
  color: #ffffff;
  box-shadow: 0 3px 8px rgba(13, 148, 136, 0.2);
}

.btn-innovator:hover {
  background-color: #0f766e;
  box-shadow: 0 4px 12px rgba(13, 148, 136, 0.3);
}

/* App Footer */
.app-footer {
  padding: 12px 24px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 40px;
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