<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project Flow - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="stu_companydashboard_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />
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
            <a href="landing.php" class="nav-subitem active"><i class="fa-solid fa-house"></i> Home</a>
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
    <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 1 of 6</span>
  </div>
  
  <div class="stepper-wrapper">
    <div class="step-item active">
      <div class="step-number">1</div>
      <div class="step-title">Declaration</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">2</div>
      <div class="step-title">Company Information</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">3</div>
      <div class="step-title">Self-Assessment</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">4</div>
      <div class="step-title">Result & Eligibility</div>
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

      <!-- Grid Content Layout -->
      <div class="content-grid">
        
        <!-- Left Column: Announcement & Required Documents -->
        <div class="grid-col">
          <div class="info-card highlight-card">
            <div class="card-badge"><i class="fa-solid fa-bullhorn"></i> Official Announcement</div>
            <h3 class="card-heading">Smart Tech Up Portal is Open</h3>
            <p class="card-text">
              We are pleased to announce that Smart Tech Up Portal is officially reopened. Companies interested in On-site Smart Factory Assessment (OSFA) can contact us for assistance.
            </p>

            <div class="contact-box">
              <i class="fa-solid fa-envelope"></i>
              <span>Need Help? Email <strong>osfa@sirim.my</strong></span>
            </div>

            <a href="declaration.php" class="btn-primary-action">
              <span>Begin Step 1: Declaration</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>

          <div class="info-card margin-top-card">
            <h3 class="card-heading"><i class="fa-solid fa-file-shield"></i> Required Financial Documents</h3>
            <p class="card-subtext">Ensure you have prepared the following official documents prior to application submission:</p>

            <ul class="document-list">
              <li>
                <div class="doc-icon"><i class="fa-solid fa-file-check"></i></div>
                <div class="doc-details">
                  <span class="doc-name">Letter of Consent (Form FI)</span>
                  <span class="doc-desc">Authorizes credit check & personal data access</span>
                </div>
              </li>
              <li>
                <div class="doc-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <div class="doc-details">
                  <span class="doc-name">Audited Financial Statements</span>
                  <span class="doc-desc">Must cover the last 2 financial years</span>
                </div>
              </li>
              <li>
                <div class="doc-icon"><i class="fa-solid fa-building-columns"></i></div>
                <div class="doc-details">
                  <span class="doc-name">Bank Statements & Reports</span>
                  <span class="doc-desc">Latest 6 months statements + Debtor/Creditor Aging Report</span>
                </div>
              </li>
              <li>
                <div class="doc-icon"><i class="fa-solid fa-id-card"></i></div>
                <div class="doc-details">
                  <span class="doc-name">SSM Information & Licenses</span>
                  <span class="doc-desc">Form 24, 44, 49 & Business / Manufacturing License</span>
                </div>
              </li>
            </ul>

            <div class="note-box">
              <i class="fa-solid fa-circle-info"></i>
              <span>Additional supporting documentation may be requested depending on specific financial institution policies.</span>
            </div>
          </div>
        </div>

        <!-- Right Column: Vertical Flowchart Diagram -->
        <div class="grid-col">
          <div class="flowchart-container">
            
            <div class="flow-banner flow-start">START</div>

            <div class="diagram-pathway">
              <!-- Background Path Line -->
              <div class="connecting-line"></div>

              <!-- Floating Graphic Icons -->
              <i class="fa-regular fa-pen-to-square float-icon float-1"></i>
              <i class="fa-regular fa-envelope float-icon float-2"></i>
              <i class="fa-solid fa-user-group float-icon float-3"></i>
              <i class="fa-regular fa-comments float-icon float-4"></i>
              <i class="fa-regular fa-file-lines float-icon float-5"></i>
              <i class="fa-solid fa-bullseye float-icon float-6"></i>
              <i class="fa-solid fa-sitemap float-icon float-7"></i>

              <!-- Step 1: Left -->
              <div class="flow-card-row align-left">
                <div class="flow-card active-card">
                  <span class="flow-card-title">Company Registration</span>
                  <span class="current-badge">You are here</span>
                </div>
              </div>

              <!-- Step 2: Right -->
              <div class="flow-card-row align-right">
                <div class="flow-card">
                  <span class="flow-card-title">Self-Assessment</span>
                </div>
              </div>

              <!-- Step 3: Right -->
              <div class="flow-card-row align-right">
                <div class="flow-card">
                  <span class="flow-card-title">Loan Eligibility Screening</span>
                </div>
              </div>

              <!-- Step 4: Left -->
              <div class="flow-card-row align-left">
                <div class="flow-card">
                  <span class="flow-card-title">Onsite Assessment</span>
                </div>
              </div>

              <!-- Step 5: Left -->
              <div class="flow-card-row align-left">
                <div class="flow-card">
                  <span class="flow-card-title">Preparation of Technical Proposal</span>
                </div>
              </div>

              <!-- Step 6: Right -->
              <div class="flow-card-row align-right">
                <div class="flow-card">
                  <span class="flow-card-title">Pitching</span>
                </div>
              </div>

              <!-- Step 7: Center -->
              <div class="flow-card-row align-center">
                <div class="flow-card card-large">
                  <span class="flow-card-title">Start Project</span>
                </div>
              </div>

            </div>

            <div class="flow-banner flow-end">END</div>

          </div>
        </div>

      </div>

    </main>
  </div>

  <!-- JavaScript for Accordion Interactivity -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }
  </script>

</body>
</html>