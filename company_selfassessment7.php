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

  <style>
    /* Question Container Styling */
    .question-container {
      margin-bottom: 32px;
      padding-bottom: 24px;
      border-bottom: 1px solid #e2e8f0;
    }

    .question-container:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .question-header {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 16px;
    }

    .q-number {
      background: #eff6ff;
      color: #2563eb;
      font-weight: 800;
      font-size: 0.9rem;
      padding: 4px 10px;
      border-radius: 6px;
      border: 1px solid #bfdbfe;
      flex-shrink: 0;
    }

    .question-title {
      font-weight: 700;
      color: #1e293b;
      font-size: 1rem;
      margin: 0;
      line-height: 1.5;
    }

    .section-subgroup-title {
      font-weight: 700;
      color: #1e293b;
      font-size: 0.95rem;
      margin-top: 16px;
      margin-bottom: 8px;
    }

    .nested-group-title {
      font-weight: 700;
      color: #334155;
      font-size: 0.9rem;
      margin-top: 10px;
      margin-bottom: 6px;
    }

    /* Form Option Controls */
    .options-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 8px;
    }

    .radio-card-option {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
      font-size: 0.92rem;
      color: #334155;
    }

    .radio-card-option input[type="radio"] {
      width: 16px;
      height: 16px;
      accent-color: #1d4ed8;
      cursor: pointer;
    }

    .checkbox-card-inline {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
      font-size: 0.92rem;
      color: #334155;
    }

    .checkbox-card-inline input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: #1d4ed8;
      cursor: pointer;
    }

    /* Nested Groups for Indentation */
    .nested-group {
      margin-left: 20px;
      padding-left: 14px;
      border-left: 2px dashed #cbd5e1;
      margin-top: 10px;
      margin-bottom: 14px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .nested-group.active {
      display: flex;
    }

    .btn-submit-final {
      background-color: #1d4ed8;
      color: #ffffff;
    }

    .btn-submit-final:hover {
      background-color: #1e40af;
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
            <a href="company_selfassessment.php" class="nav-subitem active">Self-Assessment</a>
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
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 3 of 6</span>
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
          <div class="step-connector active"></div>
          
          <div class="step-item active">
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
            <div class="step-title">Register Tech Up</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">Onsite Assessment</div>
          </div>
        </div>
      </section>

      <!-- SECTION 05: SELF ASSESSMENT -->
      <form id="projectFlowForm" onsubmit="event.preventDefault(); submitAssessment();">
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            <div>
              <h2>Self Assessment</h2>
              <p>Evaluate your company's readiness and digital maturity level.</p>
            </div>
          </div>

          <!-- Live Progress Bar Card -->
          <div class="assessment-progress-card">
            <div class="progress-info">
              <span class="progress-title"><i class="fa-solid fa-chart-line"></i> Assessment Progress</span>
              <span class="progress-percentage" id="progressPercentText">100% Completed</span>
            </div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" id="progressBarFill" style="width: 100%;"></div>
            </div>
            <p class="progress-subtext">Each completed question contributes 10% toward total completion (13 Questions Total).</p>
          </div>

          <div class="form-card">

            <!-- QUESTION 12 -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q12</span>
                <p class="question-title">Describe the data protection and privacy policies in your company.</p>
              </div>

              <div class="options-group">
                <label class="radio-card-option">
                  <input type="radio" name="data_policy_status" value="No" onchange="handlePolicyStatus(this.value)">
                  <span>No data protection policies in place</span>
                </label>
                <label class="radio-card-option">
                  <input type="radio" name="data_policy_status" value="Basic" onchange="handlePolicyStatus(this.value)">
                  <span>Basic privacy policy established</span>
                </label>
                <label class="radio-card-option">
                  <input type="radio" name="data_policy_status" value="Comprehensive" onchange="handlePolicyStatus(this.value)">
                  <span>Comprehensive data governance & compliance framework</span>
                </label>
              </div>
            </div>

            <!-- QUESTION 13 -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q13</span>
                <p class="question-title">Describe the cybersecurity initiatives in your company</p>
              </div>

              <!-- Sub-section: Dedicated Personnel -->
              <div class="section-subgroup-title">Dedicated Personnel</div>
              <div class="options-group">
                <label class="radio-card-option">
                  <input type="radio" name="dedicated_personnel" value="none">
                  <span>No dedicated personnel.</span>
                </label>
                <label class="radio-card-option">
                  <input type="radio" name="dedicated_personnel" value="one">
                  <span>One dedicated personnel.</span>
                </label>
                <label class="radio-card-option">
                  <input type="radio" name="dedicated_personnel" value="team" checked>
                  <span>Has a dedicated team.</span>
                </label>
              </div>

              <!-- Sub-section: Governance -->
              <div class="section-subgroup-title">Governance</div>

              <div class="nested-group">
                <div class="nested-group-title">Awareness Program/Activities</div>
                <div class="options-group">
                  <label class="radio-card-option">
                    <input type="radio" name="awareness_program" value="yes">
                    <span>Yes</span>
                  </label>
                  <label class="radio-card-option">
                    <input type="radio" name="awareness_program" value="no" checked>
                    <span>No</span>
                  </label>
                </div>

                <div class="nested-group-title">Policies</div>
                <div class="options-group">
                  <label class="radio-card-option">
                    <input type="radio" name="cybersecurity_policies" value="yes" checked>
                    <span>Yes</span>
                  </label>
                  <label class="radio-card-option">
                    <input type="radio" name="cybersecurity_policies" value="no">
                    <span>No</span>
                  </label>
                </div>

                <div class="nested-group-title">Risk Assessment</div>
                <div class="options-group">
                  <label class="radio-card-option">
                    <input type="radio" name="risk_assessment" value="yes">
                    <span>Yes</span>
                  </label>
                  <label class="radio-card-option">
                    <input type="radio" name="risk_assessment" value="no" checked>
                    <span>No</span>
                  </label>
                </div>

                <div class="nested-group-title">Continuous Revision</div>
                <div class="options-group">
                  <label class="radio-card-option">
                    <input type="radio" name="continuous_revision" value="no">
                    <span>No</span>
                  </label>
                  <label class="radio-card-option">
                    <input type="radio" name="continuous_revision" value="seldom">
                    <span>Seldom</span>
                  </label>
                  <label class="radio-card-option">
                    <input type="radio" name="continuous_revision" value="regular" checked>
                    <span>Regular</span>
                  </label>
                </div>
              </div>

              <!-- Sub-section: Resources -->
              <div class="section-subgroup-title">Resources</div>
              <div class="options-group">
                <label class="checkbox-card-inline">
                  <input type="checkbox" name="cyber_resources[]" value="password_management">
                  <span>Password management</span>
                </label>
                <label class="checkbox-card-inline">
                  <input type="checkbox" name="cyber_resources[]" value="ip_whitelisting" checked>
                  <span>IP Whitelisting</span>
                </label>
                <label class="checkbox-card-inline">
                  <input type="checkbox" name="cyber_resources[]" value="firewall_systems" checked>
                  <span>Firewall systems</span>
                </label>
                <label class="checkbox-card-inline">
                  <input type="checkbox" name="cyber_resources[]" value="antivirus_software" checked>
                  <span>Antivirus software</span>
                </label>
                <label class="checkbox-card-inline">
                  <input type="checkbox" name="cyber_resources[]" value="intrusion_detection">
                  <span>Cybersecurity Intrusion Detection System</span>
                </label>
              </div>

            </div>

          </div>

          <!-- Bottom Actions Bar -->
          <div class="form-actions-bar">
            <button type="button" class="btn btn-secondary" onclick="goToPreviousStep()"><i class="fa-solid fa-arrow-left"></i> Back</button>
            <div style="display: flex; gap: 12px;">
              <button type="button" class="btn btn-secondary"><i class="fa-solid fa-floppy-disk"></i> Save as Draft</button>
              <button type="submit" class="btn btn-primary btn-submit-final">Submit <i class="fa-solid fa-paper-plane"></i></button>
            </div>
          </div>
        </section>
      </form>

    </main>
  </div>

  <!-- JavaScript -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function goToPreviousStep() {
      window.location.href = 'company_selfassessment5.php';
    }

    function submitAssessment() {
      window.location.href = 'company_selfassessment_results.php';
    }

    function handlePolicyStatus(val) {
      // Dynamic logic for Question 12 if needed
    }
  </script>
</body>
</html>