<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Onsite Assessment Report - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="company_selfassessment_style.css" />
  <!-- Chart.js for Donut Chart -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    /* Content Modernization Styling */
    .report-wrapper {
      background: #ffffff;
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
      border: 1px solid #e2e8f0;
      margin-top: 24px;
    }

    .report-hero {
      text-align: center;
      padding-bottom: 28px;
      margin-bottom: 32px;
      border-bottom: 1px solid #f1f5f9;
    }

    .report-hero h1 {
      font-size: 1.6rem;
      font-weight: 800;
      color: #0f172a;
      letter-spacing: -0.02em;
      text-transform: uppercase;
      margin-bottom: 6px;
    }

    .report-hero p {
      font-size: 0.88rem;
      color: #64748b;
    }

    .modern-section {
      margin-bottom: 40px;
    }

    .section-header-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .section-num {
      background: #eff6ff;
      color: #1d4ed8;
      font-weight: 800;
      font-size: 0.85rem;
      padding: 6px 12px;
      border-radius: 8px;
    }

    .section-title {
      font-size: 1.15rem;
      font-weight: 800;
      color: #0f172a;
      margin: 0;
    }

    /* 1. Modern Grid Layout for Company Info */
    .company-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 16px;
    }

    .info-card-item {
      background: #f8fafc;
      border: 1px solid #f1f5f9;
      border-radius: 10px;
      padding: 14px 18px;
      transition: all 0.2s ease;
    }

    .info-card-item:hover {
      border-color: #cbd5e1;
      background: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .info-label {
      font-size: 0.75rem;
      font-weight: 700;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 4px;
    }

    .info-val {
      font-size: 0.92rem;
      font-weight: 600;
      color: #0f172a;
      word-break: break-word;
    }

    /* 2. Overall Score & Metrics Dashboard */
    .summary-hero-card {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
      border-radius: 16px;
      padding: 32px;
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
      box-shadow: 0 12px 24px -6px rgba(30, 58, 138, 0.25);
    }

    .score-badge-group {
      display: flex;
      align-items: center;
      gap: 24px;
    }

    .score-circle-value {
      font-size: 3rem;
      font-weight: 800;
      line-height: 1;
      background: linear-gradient(180deg, #ffffff 0%, #93c5fd 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .score-meta .label {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #93c5fd;
      font-weight: 700;
    }

    .score-meta .level-tag {
      display: inline-block;
      margin-top: 6px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 4px 14px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 700;
    }

    .metrics-dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 16px;
    }

    .stat-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 18px 16px;
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-box:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
    }

    .stat-num {
      font-size: 2rem;
      font-weight: 800;
      color: #1d4ed8;
      line-height: 1.1;
    }

    .stat-title {
      font-size: 0.72rem;
      font-weight: 800;
      color: #64748b;
      text-transform: uppercase;
      margin-top: 6px;
      letter-spacing: 0.5px;
    }

    /* 3. Shift Factor Cards */
    .shift-category-title {
      font-size: 0.95rem;
      font-weight: 800;
      color: #1e3a8a;
      display: flex;
      align-items: center;
      gap: 8px;
      margin: 20px 0 12px 0;
    }

    .remarks-card-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 24px;
    }

    .remark-item {
      background: #f8fafc;
      border-left: 4px solid #3b82f6;
      border-radius: 0 8px 8px 0;
      padding: 12px 16px;
      font-size: 0.88rem;
      color: #334155;
      font-weight: 600;
    }

    /* 4. Architecture House Diagram */
    .sfs-wrapper {
      margin: 20px 0;
      text-align: center;
      background: #f8fafc;
      padding: 20px;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
    }

    .sfs-img {
      max-width: 100%;
      height: auto;
      max-height: 380px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .sfs-caption {
      margin-top: 10px;
      font-size: 0.85rem;
      color: #64748b;
      font-weight: 600;
    }

    /* 6. Results Summary Grid */
    .results-layout {
      display: grid;
      grid-template-columns: 280px 1fr;
      gap: 32px;
      align-items: center;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 28px;
    }

    .chart-container-box {
      width: 220px;
      height: 220px;
      margin: 0 auto;
    }

    .score-breakdown-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .breakdown-row {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .breakdown-label-group {
      display: flex;
      justify-content: space-between;
      font-size: 0.88rem;
      font-weight: 700;
    }

    .breakdown-bar-bg {
      height: 8px;
      background: #e2e8f0;
      border-radius: 10px;
      overflow: hidden;
    }

    .breakdown-bar-fill {
      height: 100%;
      border-radius: 10px;
    }

    /* Modern Table Styling */
    .table-responsive {
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      margin-bottom: 12px;
    }

    .styled-table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
      font-size: 0.88rem;
    }

    .styled-table th {
      background: #f8fafc;
      color: #475569;
      font-weight: 700;
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 0.5px;
      padding: 12px 16px;
      border-bottom: 1px solid #e2e8f0;
      text-align: left;
    }

    .styled-table td {
      padding: 12px 16px;
      color: #334155;
      border-bottom: 1px solid #f1f5f9;
    }

    .styled-table tbody tr:last-child td {
      border-bottom: none;
    }

    .cost-badge {
      display: inline-block;
      background: #eff6ff;
      color: #1d4ed8;
      font-weight: 800;
      padding: 4px 10px;
      border-radius: 6px;
      font-size: 0.85rem;
    }

    .section-footer-summary {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      margin-bottom: 24px;
    }

    .disclaimer-text {
      font-size: 0.8rem;
      color: #64748b;
      font-style: italic;
    }

    .grand-total-card {
      background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
      color: #ffffff;
      border-radius: 12px;
      padding: 20px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      margin-bottom: 32px;
    }

    .grand-total-card .label {
      font-size: 0.95rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .grand-total-card .val {
      font-size: 1.5rem;
      font-weight: 800;
      color: #60a5fa;
    }

    /* Verification Box */
    .verification-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 24px;
      margin-bottom: 32px;
    }

    .verification-header {
      font-size: 0.85rem;
      font-weight: 700;
      color: #475569;
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .custom-checkbox-list {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .custom-check-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: 0.88rem;
      color: #334155;
      cursor: pointer;
    }

    .custom-check-item input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-top: 2px;
      accent-color: #1d4ed8;
    }

    .acceptance-pill {
      background: #dbeafe;
      color: #1e4ed8;
      border-radius: 8px;
      padding: 12px;
      text-align: center;
      font-weight: 700;
      font-size: 0.88rem;
      margin-top: 20px;
    }

    /* Bottom Floating Bar Actions */
    .report-actions {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin-top: 32px;
    }

    .btn-action-primary {
      background: linear-gradient(180deg, #1d4ed8 0%, #1e3a8a 100%);
      color: #ffffff;
      border: none;
      padding: 12px 36px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 0.92rem;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(29, 78, 216, 0.25);
      transition: all 0.2s ease;
    }

    .btn-action-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(29, 78, 216, 0.35);
    }

    .btn-action-secondary {
      background: #ffffff;
      color: #334155;
      border: 1px solid #cbd5e1;
      padding: 12px 28px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 0.92rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-action-secondary:hover {
      background: #f8fafc;
      border-color: #94a3b8;
    }

    @media (max-width: 900px) {
      .results-layout {
        grid-template-columns: 1fr;
      }
      .summary-hero-card {
        flex-direction: column;
        text-align: center;
        gap: 16px;
      }
    }
  </style>
</head>
<body>

  <!-- Top Navigation Header -->
  <header class="app-header">
    <div class="header-left">
      <img src="miti-sirim-logo.png" alt="MITI & SIRIM Logo" class="header-logo" />
    </div>
    <div class="header-right">
      <div class="user-dropdown">
        <span class="user-avatar"><i class="fa-solid fa-user"></i></span>
        <div class="user-info">
          <span class="user-name">Hi, stuuser03@yopmail.com</span>
          <span class="user-role">Owner</span>
        </div>
        <i class="fa-solid fa-caret-down"></i>
      </div>
    </div>
  </header>

  <div class="app-layout">
    
    <!-- Left Collapsible Accordion Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Welcome Back,</div>
        <div class="sidebar-user-email">stuuser03@yopmail.com</div>
        <span class="sidebar-user-badge"><i class="fa-solid fa-shield-halved"></i> Owner</span>
      </div>

      <div class="sidebar-menu">
        <!-- Category 1: Dashboard -->
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Dashboard</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_loanstatus.php" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> Loan Status</a>
            <a href="company_nda_agreement.php" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> NDA Agreement</a>
          </div>
        </div>

        <!-- Category 2: 01 Application & OSFA -->
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-folder-open"></i> 01 Application & OSFA</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="declaration.php" class="nav-subitem">Declaration</a>
            <a href="company_registration.php" class="nav-subitem">Company Information</a>
            <a href="company_selfassessment.php" class="nav-subitem">Self-Assessment</a>
            <a href="company_selfassessment_results.php" class="nav-subitem">Results & Eligibility</a>
            <a href="register_tech_up.php" class="nav-subitem">Register Smart Tech Up</a>
            <a href="#" class="nav-subitem active">Onsite Assessment</a>
          </div>
        </div>

        <!-- Category 3: 02 Project Flow -->
        <div class="accordion-item">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-diagram-project"></i> 02 Project Flow</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="company_project_application.php" class="nav-subitem">Project Application</a>
            <a href="#" class="nav-subitem">Technical Proposal & RFP</a>
            <a href="#" class="nav-subitem">CI Selection</a>
            <a href="#" class="nav-subitem">Project Implementation</a>
            <a href="#" class="nav-subitem">Project Completion</a>
            <a href="#" class="nav-subitem">Post Project Audit</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      
      <!-- Top Dynamic Flow Tracker -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
          <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 6 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Declaration</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Company Information</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Self-Assessment</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Result & Eligibility</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Register Tech Up</div>
          </div>
          <div class="step-connector active"></div>
          
          <div class="step-item active">
            <div class="step-number">6</div>
            <div class="step-title">Onsite Factory Assessment</div>
          </div>
        </div>
      </section>

      <!-- MODERN REPORT WRAPPER -->
      <div class="report-wrapper">
        
        <div class="report-hero">
          <h1>Report On Onsite Assessment</h1>
          <p>Official Industry 4.0 Onsite Assessment findings and project recommendations</p>
        </div>

        <!-- 1. Company Information -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">01</span>
            <h2 class="section-title">Company Information</h2>
          </div>
          
          <div class="company-info-grid">
            <div class="info-card-item">
              <div class="info-label">Company Name</div>
              <div class="info-val">STUUSER05 COMPANY</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Company Address</div>
              <div class="info-val">123, Jalan 1, Taman 1, 12345 Kuala Lumpur</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Factory Address</div>
              <div class="info-val">123, Jalan 1, Taman 1, 12345 Kuala Lumpur</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Year Of Establishment</div>
              <div class="info-val">2024</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Contact Person</div>
              <div class="info-val">John Doe</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Contact Person's Position</div>
              <div class="info-val">CEO</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Mobile Phone</div>
              <div class="info-val">0123456789</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Company's Telephone</div>
              <div class="info-val">0123456789</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Email</div>
              <div class="info-val">stuuser05@yopmail.com</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Company's Website</div>
              <div class="info-val">https://www.google.com</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Main Product</div>
              <div class="info-val">Product 1</div>
            </div>
            <div class="info-card-item">
              <div class="info-label">Total Employees</div>
              <div class="info-val">10</div>
            </div>
          </div>
        </div>

        <!-- 2. Overall Assessment Summary -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">02</span>
            <h2 class="section-title">Overall Assessment Summary</h2>
          </div>

          <div class="summary-hero-card">
            <div class="score-badge-group">
              <div class="score-circle-value">50%</div>
              <div class="score-meta">
                <div class="label">Total Score Index</div>
                <div class="level-tag"><i class="fa-solid fa-layer-group"></i> Learner Tier</div>
              </div>
            </div>
            <div style="font-size: 0.88rem; opacity: 0.85; max-width: 320px;">
              Ready for minor system adoption and digital process integration.
            </div>
          </div>

          <div class="metrics-dashboard">
            <div class="stat-box">
              <div class="stat-num">3</div>
              <div class="stat-title">Highlights</div>
            </div>
            <div class="stat-box">
              <div class="stat-num">1</div>
              <div class="stat-title">Recommendations</div>
            </div>
            <div class="stat-box">
              <div class="stat-num">3</div>
              <div class="stat-title">Improvements</div>
            </div>
            <div class="stat-box">
              <div class="stat-num">1</div>
              <div class="stat-title">Pain Points</div>
            </div>
            <div class="stat-box">
              <div class="stat-num">1</div>
              <div class="stat-title">Solutions</div>
            </div>
          </div>
        </div>

        <!-- 3. Remarks Sections -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">03</span>
            <h2 class="section-title">Assessment Remarks</h2>
          </div>

          <!-- 3.1 People -->
          <div class="shift-category-title"><i class="fa-solid fa-users text-blue-600"></i> 3.1 Shift Factor - People</div>
          <div class="remarks-card-list">
            <div class="remark-item">REMARKS Q1 Strategy</div>
            <div class="remark-item">REMARKS Q1 Leadership</div>
            <div class="remark-item">REMARKS Q2</div>
            <div class="remark-item">REMARKS Q3</div>
          </div>

          <!-- 3.2 Process -->
          <div class="shift-category-title"><i class="fa-solid fa-gears text-blue-600"></i> 3.2 Shift Factor - Process</div>
          <div class="remarks-card-list">
            <div class="remark-item">REMARKS Q4 Production Mix</div>
            <div class="remark-item">REMARKS Q4 Performance Mix</div>
            <div class="remark-item">REMARKS Q4 Horizontal Integration</div>
            <div class="remark-item">REMARKS Q12</div>
            <div class="remark-item">REMARKS Q13</div>
          </div>

          <!-- 3.3 Technology -->
          <div class="shift-category-title"><i class="fa-solid fa-microchip text-blue-600"></i> 3.3 Shift Factor - Technology</div>
          <div class="remarks-card-list">
            <div class="remark-item">REMARKS Q5</div>
            <div class="remark-item">REMARKS Q6</div>
            <div class="remark-item">REMARKS Q7</div>
            <div class="remark-item">REMARKS Q9</div>
            <div class="remark-item">REMARKS Q10</div>
            <div class="remark-item">REMARKS Q11</div>
            <div class="remark-item">REMARKS Q8</div>
          </div>
        </div>

        <!-- 4. Architecture Diagram -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">04</span>
            <h2 class="section-title">Smart Factory Transformation Architecture</h2>
          </div>

          <div class="sfs-wrapper">
                <img src="smartfactorystrategy.png" alt="Smart Factory Strategy" class="sfs-img" onerror="this.src='https://via.placeholder.com/600x320?text=smart+factory+strategy';" />
                <img src="smartfactorystrategy(2).png" alt="Smart Factory Strategy" class="sfs-img" onerror="this.src='https://via.placeholder.com/600x320?text=smart+factory+strategy(2)';" />
                <div class="sfs-caption">Smart Factory Strategy</div>
              </div>
        </div>

        <!-- 5. Recommendations -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">05</span>
            <h2 class="section-title">Recommendations</h2>
          </div>
        </div>

        <!-- 6. Results Summary -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">06</span>
            <h2 class="section-title">Results Summary (Findings by Assessors)</h2>
          </div>

          <div class="results-layout">
            <div class="chart-container-box">
              <canvas id="osfaDonutChart"></canvas>
            </div>

            <div class="score-breakdown-list">
              <div class="breakdown-row">
                <div class="breakdown-label-group">
                  <span style="color: #1e293b;"><i class="fa-solid fa-circle" style="color: #1e293b;"></i> PEOPLE</span>
                  <span>8% (14% Weight)</span>
                </div>
                <div class="breakdown-bar-bg">
                  <div class="breakdown-bar-fill" style="width: 14%; background: #1e293b;"></div>
                </div>
              </div>

              <div class="breakdown-row">
                <div class="breakdown-label-group">
                  <span style="color: #d97706;"><i class="fa-solid fa-circle" style="color: #d97706;"></i> PROCESS</span>
                  <span>10% (26% Weight)</span>
                </div>
                <div class="breakdown-bar-bg">
                  <div class="breakdown-bar-fill" style="width: 26%; background: #d97706;"></div>
                </div>
              </div>

              <div class="breakdown-row">
                <div class="breakdown-label-group">
                  <span style="color: #881337;"><i class="fa-solid fa-circle" style="color: #881337;"></i> TECHNOLOGY</span>
                  <span>32% (60% Weight)</span>
                </div>
                <div class="breakdown-bar-bg">
                  <div class="breakdown-bar-fill" style="width: 60%; background: #881337;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 7. POC/ Project Identification -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">07</span>
            <h2 class="section-title">POC / Project Identification</h2>
          </div>

          <div class="table-responsive">
            <table class="styled-table">
              <thead>
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Pain Points</th>
                  <th>Projects</th>
                  <th style="width: 180px;">Estimated Costings</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Test Pain Point</td>
                  <td>Project</td>
                  <td><span class="cost-badge">RM 8,000</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- 8. Projects -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">08</span>
            <h2 class="section-title">Projects Overview</h2>
          </div>

          <div class="table-responsive">
            <table class="styled-table">
              <thead>
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Projects</th>
                  <th>Description/Details</th>
                  <th>Implementation</th>
                  <th>Impact</th>
                  <th>Costing</th>
                  <th>Technology</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Project 1</td>
                  <td>Desc</td>
                  <td>Implementation</td>
                  <td>Improvement</td>
                  <td><span class="cost-badge">RM 8,000</span></td>
                  <td>Additive Manufacturing</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="disclaimer-text">* Please be informed that this is an estimation of project cost and not the final project value.</div>
        </div>

        <!-- 9. Training -->
        <div class="modern-section">
          <div class="section-header-row">
            <span class="section-num">09</span>
            <h2 class="section-title">Training Schedule</h2>
          </div>

          <div class="table-responsive">
            <table class="styled-table">
              <thead>
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Training</th>
                  <th>Description</th>
                  <th>Objective</th>
                  <th>Duration</th>
                  <th>Location</th>
                  <th>Audience</th>
                  <th>Costing</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Training</td>
                  <td>Desc</td>
                  <td>Objective</td>
                  <td>3 Days</td>
                  <td>SIRIM Academy</td>
                  <td>CEO</td>
                  <td><span class="cost-badge">RM 8,000</span></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Grand Total Bar -->
          <div class="grand-total-card">
            <div class="label"><i class="fa-solid fa-receipt"></i> Total Project Value Investment</div>
            <div class="val">RM 16,000</div>
          </div>
        </div>

        <!-- Verification & Acceptance Checkboxes -->
        <div class="verification-card">
          <div class="verification-header">
            <i class="fa-solid fa-shield-check text-blue-600"></i> Verification & Digital Signoff (Verified by DMT)
          </div>
          <div class="custom-checkbox-list">
            <label class="custom-check-item">
              <input type="checkbox" checked />
              <span>I acknowledge that I have viewed and received this OSFA Report.</span>
            </label>
            <label class="custom-check-item">
              <input type="checkbox" checked />
              <span>I understand that the Smart Tech Up project shall be based on data and information of this OSFA Report.</span>
            </label>
            <label class="custom-check-item">
              <input type="checkbox" checked />
              <span>I declared that I have the financial capability to fund 50% of total project value cost based on this OSFA Report.</span>
            </label>
          </div>
          <div class="acceptance-pill">
            <i class="fa-solid fa-circle-check"></i> Accepted on behalf of company on 11/09/2026
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="report-actions">
          <button type="button" class="btn-action-primary" onclick="window.location.href='company_project_application.php'">
            Proceed to Project Application <i class="fa-solid fa-arrow-right"></i>
          </button>
          <button type="button" class="btn-action-secondary" onclick="window.print()">
            <i class="fa-solid fa-file-pdf"></i> Export To PDF
          </button>
        </div>

      </div>

    </main>
  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    // Initialize OSFA Donut Chart
    const ctx = document.getElementById('osfaDonutChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['People', 'Process', 'Technology'],
        datasets: [{
          data: [14, 26, 60],
          backgroundColor: [
            '#1e293b',
            '#d97706',
            '#881337'
          ],
          borderWidth: 3,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>