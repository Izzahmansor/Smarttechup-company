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
    .registration-container {
      background: #ffffff;
      border-radius: 12px;
      padding: 32px 40px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      border: 1px solid #e2e8f0;
      text-align: center;
      margin-top: 24px;
    }

    .main-heading {
      font-size: 1.4rem;
      font-weight: 800;
      color: #1e3a8a;
      text-transform: uppercase;
      margin-bottom: 8px;
      letter-spacing: 0.5px;
    }

    .sub-notice {
      font-size: 0.88rem;
      color: #334155;
      margin-bottom: 24px;
      line-height: 1.4;
      font-weight: 600;
    }

    .loan-question-box {
      margin-bottom: 28px;
    }

    .question-label {
      font-size: 0.95rem;
      font-weight: 800;
      color: #1e3a8a;
      margin-bottom: 12px;
    }

    .radio-inline-group {
      display: flex;
      justify-content: center;
      gap: 24px;
      font-size: 0.88rem;
      font-weight: 700;
      color: #1e3a8a;
    }

    .radio-inline-group label {
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
    }

    .documents-section {
      text-align: left;
      max-width: 1000px;
      margin: 0 auto;
    }

    .section-title {
      font-size: 0.95rem;
      font-weight: 800;
      color: #1e3a8a;
      margin-bottom: 20px;
    }

    /* 2-Column Grid Split */
    .two-column-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px 40px;
    }

    .doc-upload-group {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 8px;
    }

    .doc-label {
      font-size: 0.85rem;
      font-weight: 700;
      color: #1e3a8a;
      margin-bottom: 8px;
      line-height: 1.3;
    }

    .btn-upload {
      background: #ffffff;
      border: 1px solid #94a3b8;
      border-radius: 4px;
      padding: 4px 14px;
      font-size: 0.82rem;
      color: #334155;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
      transition: all 0.2s ease;
    }

    .btn-upload:hover {
      background: #f8fafc;
      border-color: #64748b;
    }

    .form-group-select {
      margin-bottom: 0;
    }

    .form-group-select label {
      font-size: 0.85rem;
      font-weight: 800;
      color: #1e3a8a;
      margin-bottom: 6px;
      display: block;
    }

    .custom-select {
      width: 100%;
      padding: 8px 12px;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      background-color: #f8fafc;
      color: #64748b;
      font-size: 0.88rem;
      outline: none;
      cursor: pointer;
    }

    /* Terms of Reference (TOR) Section Styles */
    .tor-section {
      text-align: left;
      max-width: 1000px;
      margin: 32px auto 0 auto;
      padding-top: 24px;
      border-top: 1px solid #e2e8f0;
    }

    .tor-box {
      height: 200px;
      overflow-y: scroll;
      background-color: #f8fafc;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      padding: 16px;
      font-size: 0.85rem;
      color: #334155;
      line-height: 1.6;
    }

    .tor-box h4 {
      font-size: 0.95rem;
      font-weight: 700;
      color: #1e3a8a;
      margin-top: 12px;
      margin-bottom: 6px;
    }

    .tor-box h4:first-child {
      margin-top: 0;
    }

    .tor-checkbox-group {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 16px;
      font-size: 0.88rem;
      font-weight: 600;
      color: #1e3a8a;
    }

    .tor-checkbox-group input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #1d4ed8;
      cursor: pointer;
    }

    .tor-hint {
      font-size: 0.8rem;
      color: #ef4444;
      margin-top: 4px;
      display: block;
    }

    /* Full-width container for bottom selection section */
    .fi-section {
      margin-top: 24px;
      padding-top: 20px;
      border-top: 1px dashed #e2e8f0;
    }

    .actions-wrapper {
      margin-top: 32px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 12px;
    }

    .btn-save-draft {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      color: #334155;
      padding: 8px 36px;
      border-radius: 4px;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .btn-proceed-osfa {
      background: linear-gradient(180deg, #1d4ed8 0%, #1e3a8a 100%);
      color: #ffffff;
      border: none;
      padding: 10px 48px;
      border-radius: 4px;
      font-size: 0.9rem;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 260px;
      transition: all 0.2s ease;
    }

    .btn-proceed-osfa:disabled {
      background: #cbd5e1;
      color: #94a3b8;
      cursor: not-allowed;
      box-shadow: none;
    }

    @media (max-width: 768px) {
      .two-column-grid {
        grid-template-columns: 1fr;
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
            <a href="register_tech_up.php" class="nav-subitem active">Register Smart Tech Up</a>
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
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 5 of 6</span>
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
          <div class="step-connector active"></div>
          
          <div class="step-item active">
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

      <!-- Main Registration Content Container -->
      <div class="registration-container">
        <h2 class="main-heading">REGISTER Smart Tech Up</h2>
        <p class="sub-notice">
          Your Registration to Smart Tech Up Program is IN PROCESS.<br />
          Participants of the Smart Tech Up Program are also eligible to apply loan from the financial institution partners.
        </p>

        <form id="loanForm" action="#" method="POST" enctype="multipart/form-data">
          <!-- Loan Option Question -->
          <div class="loan-question-box">
            <div class="question-label">Would you like to check your loan eligibility?</div>
            <div class="radio-inline-group">
              <label>
                <input type="radio" name="check_loan_eligibility" value="YES" checked onchange="toggleLoanDocs(true)" /> YES
              </label>
              <label>
                <input type="radio" name="check_loan_eligibility" value="NO" onchange="toggleLoanDocs(false)" /> NO
              </label>
            </div>
          </div>

          <!-- Upload & Institution Selection Section -->
          <div class="documents-section" id="loanDocumentsSection">
            <div class="section-title">General Documents</div>

            <!-- Split into 2 Columns Grid -->
            <div class="two-column-grid">
              
              <!-- Left Column Documents -->
              <div>
                <div class="doc-upload-group">
                  <label class="doc-label">Letter of Consent by Company for FI to conduct credit checking and access to Personal data</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('consent_doc')">+ Upload</button>
                  <input type="file" id="consent_doc" name="consent_doc" style="display: none;" />
                </div>

                <div class="doc-upload-group">
                  <label class="doc-label">Audited Financial Statement (last 2 years)</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('financial_doc')">+ Upload</button>
                  <input type="file" id="financial_doc" name="financial_doc" style="display: none;" />
                </div>

                <div class="doc-upload-group">
                  <label class="doc-label">Corporate Profile/Annual Report</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('corporate_profile_doc')">+ Upload</button>
                  <input type="file" id="corporate_profile_doc" name="corporate_profile_doc" style="display: none;" />
                </div>

                <div class="doc-upload-group">
                  <label class="doc-label">Bank Statement (latest 6 months)</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('bank_statement_doc')">+ Upload</button>
                  <input type="file" id="bank_statement_doc" name="bank_statement_doc" style="display: none;" />
                </div>
              </div>

              <!-- Right Column Documents -->
              <div>
                <div class="doc-upload-group">
                  <label class="doc-label">Debtor and Creditor Aging Report</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('aging_report_doc')">+ Upload</button>
                  <input type="file" id="aging_report_doc" name="aging_report_doc" style="display: none;" />
                </div>

                <div class="doc-upload-group">
                  <label class="doc-label">SSM Information OR Certified true copy of M&A, Form 24, 44, 49</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('ssm_doc')">+ Upload</button>
                  <input type="file" id="ssm_doc" name="ssm_doc" style="display: none;" />
                </div>

                <div class="doc-upload-group">
                  <label class="doc-label">Business/Manufacturing License</label>
                  <button type="button" class="btn-upload" onclick="triggerFileUpload('license_doc')">+ Upload</button>
                  <input type="file" id="license_doc" name="license_doc" style="display: none;" />
                </div>
              </div>

            </div>

            <!-- Financial Institutions Selection (2-Column Layout) -->
            <div class="fi-section">
              <div class="two-column-grid">
                <div class="form-group-select">
                  <label>Financial Institution 1</label>
                  <select class="custom-select" name="financial_institution_1">
                    <option value="">- Select -</option>
                    <option value="bank1">Bank A</option>
                    <option value="bank2">Bank B</option>
                  </select>
                </div>

                <div class="form-group-select">
                  <label>Financial Institution 2</label>
                  <select class="custom-select" name="financial_institution_2">
                    <option value="">- Select -</option>
                    <option value="bank1">Bank A</option>
                    <option value="bank2">Bank B</option>
                  </select>
                </div>

                <div class="form-group-select">
                  <label>Financial Institution 3</label>
                  <select class="custom-select" name="financial_institution_3">
                    <option value="">- Select -</option>
                    <option value="bank1">Bank A</option>
                    <option value="bank2">Bank B</option>
                  </select>
                </div>
              </div>
            </div>

          </div>

          <!-- TERMS OF REFERENCE (TOR) & FEES DISCLAIMER SECTION -->
          <div class="tor-section">
            <div class="section-title">Terms of Reference (TOR) & Program Fees</div>
            
            <div class="tor-box" id="torBox" onscroll="checkTorScroll()">
              <h4>1. Program Assessment & Onsite Evaluation Fees</h4>
              <p>
                All participating companies must acknowledge that the Smart Tech Up Program includes technical readiness assessments conducted by certified assessors. Any costs or fees associated with the Onsite Factory Assessment (OSFA), technical reports, or consultation services will be billed in accordance with the established program fee structure outlined in the official Program Guidelines.
              </p>

              <h4>2. Scope of Financial & Technical Assistance</h4>
              <p>
                Participation in the Smart Tech Up Program or submission of loan applications to financial institution partners does not guarantee automated approval of funding or grants. All applications are subject to evaluation by the appointed Technical Committee and partner Financial Institutions.
              </p>

              <h4>3. Information Accuracy & Confidentiality</h4>
              <p>
                The applicant agrees that all documentation provided—including corporate profiles, financial statements, and operational data—is accurate and truthful. Data collected will be treated as confidential and handled strictly in accordance with applicable Personal Data Protection regulations.
              </p>

              <h4>4. Program Fee Acknowledgment</h4>
              <p>
                By proceeding with registration, the applicant confirms full awareness of any participating assessment fees, consultation costs, or implementation expenses required under the Smart Tech Up Program framework.
              </p>
            </div>

            <span class="tor-hint" id="torHint"><i class="fa-solid fa-circle-info"></i> Please scroll to the bottom of the Terms of Reference to enable the agreement checkbox.</span>

            <div class="tor-checkbox-group">
              <input type="checkbox" id="agreeTor" disabled onchange="toggleProceedButton()">
              <label for="agreeTor">I have read, understood, and agree to the Terms of Reference (TOR) and Program Fee structure.</label>
            </div>
          </div>

          <!-- Bottom Action Buttons -->
          <div class="actions-wrapper">
            <button type="button" class="btn-save-draft">Save</button>
            <button type="button" class="btn-proceed-osfa" id="btnProceedOSFA" disabled onclick="ProceedOSFA()">Proceed to OSFA</button>
          </div>
        </form>
      </div>

    </main>
  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function triggerFileUpload(inputId) {
      document.getElementById(inputId).click();
    }

    function toggleLoanDocs(show) {
      const section = document.getElementById('loanDocumentsSection');
      section.style.display = show ? 'block' : 'none';
    }

    function checkTorScroll() {
      const torBox = document.getElementById('torBox');
      const checkbox = document.getElementById('agreeTor');
      const hint = document.getElementById('torHint');

      // Check if user scrolled to bottom (or within 5px threshold)
      if (torBox.scrollTop + torBox.clientHeight >= torBox.scrollHeight - 5) {
        checkbox.disabled = false;
        hint.style.display = 'none';
      }
    }

    function toggleProceedButton() {
      const checkbox = document.getElementById('agreeTor');
      const btn = document.getElementById('btnProceedOSFA');
      btn.disabled = !checkbox.checked;
    }

    function ProceedOSFA() {
      window.location.href = 'company_onsite_assessment.php';
    }
  </script>
</body>
</html>