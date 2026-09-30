<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>02 Project Flow - Technical Proposal & RFP</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="company_selfassessment_style.css" />
</head>
<body>

<style>
    /* ==========================================================================
   Technical Proposal Step Specific Layout & Visual Elements
   ========================================================================== */

/* Main Card Wrapper */
.proposal-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 28px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  margin-bottom: 24px;
}

.proposal-card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 20px;
  margin-bottom: 24px;
  border-bottom: 1px solid #f1f5f9;
}

.header-title-group {
  display: flex;
  align-items: center;
  gap: 16px;
}

.card-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background-color: #eff6ff;
  color: #2563eb;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
}

.header-title-group h3 {
  font-size: 18px;
  font-weight: 800;
  color: #0f172a;
}

.header-title-group p {
  font-size: 13px;
  color: #64748b;
  margin-top: 2px;
}

.status-pill {
  font-size: 11.5px;
  font-weight: 700;
  padding: 6px 14px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.pill-pending {
  background-color: #fffbeb;
  color: #b45309;
  border: 1px solid #fde68a;
}

/* Fields & Section */
.form-group-section {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-bottom: 24px;
}

.field-container {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.field-label {
  font-size: 13px;
  font-weight: 700;
  color: #334155;
  display: flex;
  align-items: center;
  gap: 8px;
}

.field-label i {
  color: #2563eb;
}

.form-control-readonly {
  width: 100%;
  padding: 12px 16px;
  background-color: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  font-size: 14px;
  color: #1e293b;
  font-weight: 600;
  outline: none;
}

.textarea-readonly {
  resize: vertical;
  line-height: 1.6;
}

/* Document Box */
.document-preview-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 20px;
  background-color: #f1f5f9;
  border: 1px dashed #cbd5e1;
  border-radius: 12px;
  margin-bottom: 28px;
}

.doc-file-info {
  display: flex;
  align-items: center;
  gap: 14px;
}

.doc-icon-badge {
  width: 42px;
  height: 42px;
  background-color: #fee2e2;
  color: #dc2626;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
}

.doc-details {
  display: flex;
  flex-direction: column;
}

.doc-label {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  color: #64748b;
  letter-spacing: 0.5px;
}

.doc-filename {
  font-size: 14px;
  font-weight: 700;
  color: #2563eb;
}

.btn-download-doc {
  background-color: #ffffff;
  color: #2563eb;
  border: 1px solid #bfdbfe;
  padding: 10px 18px;
  border-radius: 8px;
  font-size: 12.5px;
  font-weight: 700;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.2s ease;
}

.btn-download-doc:hover {
  background-color: #eff6ff;
  border-color: #2563eb;
}

/* Terms & Declaration Checkboxes */
.terms-acknowledgement-section {
  background-color: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 22px;
  margin-bottom: 28px;
}

.terms-heading {
  font-size: 15px;
  font-weight: 800;
  color: #0f172a;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 6px;
}

.terms-heading i {
  color: #10b981;
}

.terms-subheading {
  font-size: 13px;
  color: #64748b;
  margin-bottom: 18px;
  line-height: 1.5;
}

.terms-checkbox-list {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.term-checkbox-card {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  padding: 14px 16px;
  background-color: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.term-checkbox-card:hover {
  border-color: #2563eb;
  background-color: #eff6ff;
}

.term-checkbox-card input[type="checkbox"] {
  display: none;
}

.checkbox-indicator {
  width: 20px;
  height: 20px;
  border-radius: 5px;
  border: 2px solid #94a3b8;
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  color: transparent;
  flex-shrink: 0;
  margin-top: 1px;
  transition: all 0.2s ease;
}

.term-checkbox-card input[type="checkbox"]:checked ~ .checkbox-indicator {
  background-color: #2563eb;
  border-color: #2563eb;
  color: #ffffff;
}

.term-checkbox-card:has(input[type="checkbox"]:checked) {
  border-color: #2563eb;
  background-color: #eff6ff;
}

.term-text {
  font-size: 13px;
  color: #334155;
  font-weight: 500;
  line-height: 1.5;
}

/* Form Action Buttons */
.proposal-actions-bar {
  display: flex;
  justify-content: center;
  padding-top: 8px;
}

.btn-accept-proposal {
  background-color: #2563eb;
  color: #ffffff;
  border: none;
  padding: 14px 36px;
  font-size: 14px;
  font-weight: 700;
  border-radius: 8px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
  transition: all 0.2s ease;
}

.btn-accept-proposal:hover:not(:disabled) {
  background-color: #1d4ed8;
  transform: translateY(-1px);
  box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
}

.btn-accept-proposal:disabled {
  background-color: #e2e8f0;
  color: #94a3b8;
  cursor: not-allowed;
  box-shadow: none;
}
</style>

  <!-- Top Navigation Header (UNCHANGED) -->
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
    
    <!-- Left Collapsible Accordion Sidebar (UNCHANGED) -->
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
            <a href="onsite_assessment.php" class="nav-subitem">Onsite Assessment</a>
          </div>
        </div>

        <!-- Category 3: 02 Project Flow -->
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-diagram-project"></i> 02 Project Flow</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="company_project_application.php" class="nav-subitem">Project Application</a>
            <a href="company_technical_proposal.php" class="nav-subitem active">Technical Proposal & RFP</a>
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
      
      <!-- Top Dynamic Flow Tracker (UNCHANGED PROCESS BAR - STEP 2 ACTIVE) -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
          <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 2 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Project Application</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item active">
            <div class="step-number">2</div>
            <div class="step-title">Technical Proposal & RFP</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">3</div>
            <div class="step-title">CI Selection</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">4</div>
            <div class="step-title">Project Implementation</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">5</div>
            <div class="step-title">Project Completion</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">Post Project Audit</div>
          </div>
        </div>
      </section>

      <!-- Technical Proposal & RFP Workspace Card -->
      <section class="proposal-card">
        <div class="proposal-card-header">
          <div class="header-title-group">
            <span class="card-icon"><i class="fa-solid fa-file-signature"></i></span>
            <div>
              <h3>Technical Proposal & RFP</h3>
              <p>Review your project specification, attached proposal document, and accept the agreement terms to proceed.</p>
            </div>
          </div>
          <span class="status-pill pill-pending"><i class="fa-solid fa-clock"></i> Pending Acceptance</span>
        </div>

        <form id="proposalAcceptForm">
          <!-- Form Section 1: Read-Only Project Overview -->
          <div class="form-group-section">
            <div class="field-container">
              <label class="field-label" for="projectTitle">
                <i class="fa-solid fa-diagram-project"></i> Project Title
              </label>
              <input type="text" id="projectTitle" class="form-control-readonly" value="PROJECT TITLE" readonly />
            </div>

            <div class="field-container">
              <label class="field-label" for="projectDesc">
                <i class="fa-solid fa-align-left"></i> Project Description
              </label>
              <textarea id="projectDesc" class="form-control-readonly textarea-readonly" rows="4" readonly>project desc</textarea>
            </div>
          </div>

          <!-- Form Section 2: Attached Proposal File Download Box -->
          <div class="document-preview-card">
            <div class="doc-file-info">
              <div class="doc-icon-badge">
                <i class="fa-solid fa-file-pdf"></i>
              </div>
              <div class="doc-details">
                <span class="doc-label">Technical Proposal and RFP Document</span>
                <span class="doc-filename">a-sample-file.pdf</span>
              </div>
            </div>
            <a href="a-sample-file.pdf" target="_blank" class="btn-download-doc">
              <i class="fa-solid fa-download"></i> View / Download Document
            </a>
          </div>

          <!-- Form Section 3: Terms & Conditions Checkboxes -->
          <div class="terms-acknowledgement-section">
            <h4 class="terms-heading">
              <i class="fa-solid fa-shield-check"></i> Declaration & Acceptance Terms
            </h4>
            <p class="terms-subheading">I acknowledge that upon acceptance of this technical proposal and RFP, I fully understand and agree to the following terms and conditions:</p>

            <div class="terms-checkbox-list">
              
              <!-- Term 1 -->
              <label class="term-checkbox-card">
                <input type="checkbox" class="term-checkbox" required />
                <span class="checkbox-indicator"><i class="fa-solid fa-check"></i></span>
                <span class="term-text">
                  The project shall be executed strictly in accordance with the accepted proposal, without any changes to the scope, deliverables, or commitments made.
                </span>
              </label>

              <!-- Term 2 -->
              <label class="term-checkbox-card">
                <input type="checkbox" class="term-checkbox" required />
                <span class="checkbox-indicator"><i class="fa-solid fa-check"></i></span>
                <span class="term-text">
                  The accepted proposal is final and binding, and no modifications, amendments, or alterations shall be entertained after acceptance.
                </span>
              </label>

              <!-- Term 3 -->
              <label class="term-checkbox-card">
                <input type="checkbox" class="term-checkbox" required />
                <span class="checkbox-indicator"><i class="fa-solid fa-check"></i></span>
                <span class="term-text">
                  Company/Applicant shall be fully responsible for any cost incurred as a result of changes, deviations, or modifications from the accepted proposal.
                </span>
              </label>

              <!-- Term 4 -->
              <label class="term-checkbox-card">
                <input type="checkbox" class="term-checkbox" required />
                <span class="checkbox-indicator"><i class="fa-solid fa-check"></i></span>
                <span class="term-text">
                  Company understand that non-compliance with this declaration may result in penalty, withdrawal of approval, or other actions as deemed appropriate.
                </span>
              </label>

            </div>
          </div>

          <!-- Form Actions Bar -->
          <div class="proposal-actions-bar">
            <button type="submit" id="btnAcceptProposal" class="btn-accept-proposal" disabled>
              <i class="fa-solid fa-circle-check"></i> Accept Technical Proposal and RFP
            </button>
          </div>
        </form>
      </section>

    </main>

  </div>

  <!-- Interactive Logic -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    // Enable/Disable Accept Button based on all 4 checkboxes checked
    const checkboxes = document.querySelectorAll('.term-checkbox');
    const btnAccept = document.getElementById('btnAcceptProposal');

    function checkTermsValidation() {
      const allChecked = Array.from(checkboxes).every(cb => cb.checked);
      btnAccept.disabled = !allChecked;
    }

    checkboxes.forEach(cb => {
      cb.addEventListener('change', checkTermsValidation);
    });

    document.getElementById('proposalAcceptForm').addEventListener('submit', function(e) {
      e.preventDefault();
      if (!btnAccept.disabled) {
        alert("Technical Proposal and RFP successfully accepted!");
        window.location.href = 'ci_selection.php'; // Redirects to Step 3
      }
    });
  </script>

</body>
</html>
