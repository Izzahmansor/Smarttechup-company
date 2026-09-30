<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Registration - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="company_selfassessment_style.css" />
  <!-- Chart.js for Donut Chart -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .result-card {
      background: #ffffff;
      border-radius: 12px;
      padding: 32px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      text-align: center;
      margin-top: 24px;
    }

    .result-title {
      font-size: 1.4rem;
      font-weight: 800;
      color: #0f172a;
      letter-spacing: 0.5px;
      margin-bottom: 24px;
      text-transform: uppercase;
    }

    .chart-wrapper {
      position: relative;
      width: 320px;
      height: 320px;
      margin: 0 auto 30px auto;
    }

    .eligibility-notice {
      font-size: 0.95rem;
      color: #334155;
      margin-bottom: 24px;
      line-height: 1.5;
    }

    .rating-box {
      margin: 20px 0;
    }

    .rating-title {
      font-weight: 700;
      color: #1e293b;
      font-size: 1rem;
      margin-bottom: 4px;
    }

    .rating-score {
      font-size: 1.8rem;
      font-weight: 800;
      color: #1d4ed8;
      line-height: 1.2;
    }

    .rating-label {
      font-size: 1.1rem;
      font-weight: 700;
      color: #1d4ed8;
      margin-top: 2px;
    }

    .rating-description {
      font-size: 0.92rem;
      color: #475569;
      max-width: 650px;
      margin: 16px auto 28px auto;
      line-height: 1.5;
    }

    .scores-table-container {
      max-width: 480px;
      margin: 0 auto 24px auto;
      text-align: left;
    }

    .scores-table-title {
      font-weight: 700;
      color: #1e293b;
      font-size: 0.95rem;
      margin-bottom: 12px;
      text-align: center;
    }

    .score-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 16px;
      border-bottom: 1px dashed #e2e8f0;
      font-size: 0.95rem;
    }

    .score-row:last-child {
      border-bottom: none;
    }

    .score-row .factor-name {
      font-weight: 700;
      color: #334155;
      text-transform: UPPERCASE;
    }

    .score-row .factor-val {
      font-weight: 600;
      color: #1e293b;
    }

    .detailed-summary-link {
      font-size: 0.9rem;
      color: #475569;
      margin-bottom: 30px;
    }

    .detailed-summary-link a {
      color: #1d4ed8;
      font-weight: 700;
      text-decoration: underline;
    }

    .action-buttons-group {
      display: flex;
      justify-content: flex-end;
      gap: 16px;
      margin-top: 20px;
    }

    .btn-action-home {
      background-color: #f1f5f9;
      color: #334155;
      border: 1px solid #cbd5e1;
      padding: 10px 32px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }

    .btn-action-register {
      background-color: #1e3a8a;
      color: #ffffff;
      border: none;
      padding: 10px 40px;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
    }

    .page-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 40px;
      padding-top: 16px;
      border-top: 1px solid #e2e8f0;
      font-size: 0.82rem;
      color: #64748b;
    }

    .page-footer a {
      color: #64748b;
      text-decoration: none;
      margin-left: 12px;
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
            <a href="index.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
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
            <a href="company_selfassessment_results.php" class="nav-subitem active">Results & Eligibility</a>
            <a href="register_tech_up.php" class="nav-subitem">Register Smart Tech Up</a>
            <a href="company_onsite_assessment.php" class="nav-subitem">Onsite Assessment</a>
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
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 4 of 6</span>
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
          <div class="step-connector active"></div>
          
          <div class="step-item active">
            <div class="step-number">4</div>
            <div class="step-title">Result and Eligibility Summary</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">5</div>
            <div class="step-title">Register Smart Tech Up</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">Onsite Factory Assessment</div>
          </div>
        </div>
      </section>

      <!-- Main Result Workspace -->
      <div class="result-card">
        <h2 class="result-title">RESULT AND ELIGIBILITY SUMMARY</h2>

        <!-- Donut Chart Canvas -->
        <div class="chart-wrapper">
          <canvas id="readinessChart"></canvas>
        </div>

        <p class="eligibility-notice">
          Congratulations, you are eligible to register for Smart Tech Up Program. Click REGISTER button below to join the program.
        </p>

        <div class="rating-box">
          <div class="rating-title">Your overall self-assessment rating is</div>
          <div class="rating-score">50%</div>
          <div class="rating-label">Learner</div>
        </div>

        <p class="rating-description">
          Have interest to pursue pilot project for Industry 4.0 in operation. Planning and strategies, efforts either simple or scattered initiatives exists. Ready for minor system adoption.
        </p>

        <div class="scores-table-container">
          <div class="scores-table-title">Your readiness scores in the three shift factors for are as follows:</div>
          <div class="score-row">
            <span class="factor-name">PEOPLE</span>
            <span class="factor-val">8%</span>
          </div>
          <div class="score-row">
            <span class="factor-name">PROCESS</span>
            <span class="factor-val">10%</span>
          </div>
          <div class="score-row">
            <span class="factor-name">TECHNOLOGY</span>
            <span class="factor-val">32%</span>
          </div>
        </div>

        <p class="detailed-summary-link">
          Click <a href="#">HERE</a> for DETAILED SUMMARY AND RECOMMENDATION.
        </p>

        <!-- Bottom Action Buttons -->
        <div class="action-buttons-group">
          <button type="button" class="btn-action-home" onclick="window.location.href='landing.php'">Home</button>
          <button type="button" class="btn-action-register" onclick="window.location.href='register_tech_up.php'">Register</button>
        </div>
      </div>

      <!-- Page Footer -->
      <footer class="page-footer">
        <div>Copyright © 2026 Smart Tech Up. All rights reserved.</div>
        <div>
          <a href="#">Legal Terms</a> | 
          <a href="#">Privacy Policy</a> | 
          <a href="#">Cookie Policy</a>
        </div>
      </footer>

    </main>
  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    // Initialize Donut Chart
    const ctx = document.getElementById('readinessChart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['People', 'Process', 'Technology'],
        datasets: [{
          data: [14, 26, 60],
          backgroundColor: [
            '#1e293b', // Dark Navy / Blue for People
            '#d97706', // Gold / Orange for Process
            '#881337'  // Maroon / Dark Red for Technology
          ],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '55%',
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  </script>
</body>
</html>
