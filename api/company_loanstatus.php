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
  
  <link rel="stylesheet" href="studeclaration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />
</head>
<body>

<style>
/* ==========================================================================
   Loan Status Workspace Page Styling
   ========================================================================== */

/* Top Header Card */
.loan-page-header {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 24px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  margin-bottom: 24px;
}

.header-title-wrapper {
  display: flex;
  align-items: center;
  gap: 16px;
}

.title-icon-box {
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

.header-title-wrapper h2 {
  font-size: 20px;
  font-weight: 800;
  color: #0f172a;
}

.header-title-wrapper p {
  font-size: 13px;
  color: #64748b;
  margin-top: 2px;
}

.loan-summary-badge {
  font-size: 12.5px;
  font-weight: 700;
  color: #2563eb;
  background-color: #eff6ff;
  border: 1px solid #bfdbfe;
  padding: 8px 16px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* Financial Institution Card Architecture */
.fi-card {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  margin-bottom: 24px;
  overflow: hidden;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.fi-card:hover {
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
}

.fi-card-header {
  padding: 18px 24px;
  background-color: #f8fafc;
  border-bottom: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.fi-title {
  display: flex;
  align-items: center;
  gap: 12px;
}

.fi-number-badge {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background-color: #2563eb;
  color: #ffffff;
  font-size: 13px;
  font-weight: 800;
  display: flex;
  align-items: center;
  justify-content: center;
}

.fi-title h3 {
  font-size: 16px;
  font-weight: 800;
  color: #0f172a;
}

.fi-status-pill {
  font-size: 11.5px;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  gap: 6px;
}

.status-active {
  background-color: #ecfdf5;
  color: #047857;
  border: 1px solid #a7f3d0;
}

.fi-card-body {
  padding: 24px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

/* Grid Layouts */
.form-grid-2col {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-group.full-width {
  grid-column: span 2;
}

.input-label {
  font-size: 13px;
  font-weight: 700;
  color: #334155;
  display: flex;
  align-items: center;
  gap: 8px;
}

.input-label i {
  color: #2563eb;
}

.lock-tag {
  font-size: 11px;
  font-weight: 600;
  color: #64748b;
  background-color: #f1f5f9;
  border: 1px solid #cbd5e1;
  padding: 2px 8px;
  border-radius: 4px;
  margin-left: auto;
  display: inline-flex;
  align-items: center;
  gap: 4px;
}

/* Form Controls */
.form-control-select {
  width: 100%;
  padding: 11px 16px;
  background-color: #f8fafc;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  font-size: 13.5px;
  color: #0f172a;
  font-weight: 600;
  outline: none;
  cursor: pointer;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control-select:focus {
  border-color: #2563eb;
  background-color: #ffffff;
  box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
}

.amount-display-box {
  display: flex;
  align-items: center;
  padding: 11px 16px;
  background-color: #f1f5f9;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  gap: 8px;
}

.currency-tag {
  font-size: 13px;
  font-weight: 800;
  color: #64748b;
}

.amount-value {
  font-size: 14px;
  font-weight: 700;
  color: #0f172a;
}

.form-control-textarea {
  width: 100%;
  padding: 12px 16px;
  background-color: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  font-size: 13.5px;
  color: #0f172a;
  outline: none;
  resize: vertical;
  line-height: 1.5;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control-textarea:focus {
  border-color: #2563eb;
  box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
}

/* Locked / Readonly Field Styling */
.form-control-textarea[readonly] {
  background-color: #f8fafc;
  border-color: #e2e8f0;
  color: #64748b;
  cursor: not-allowed;
  resize: none;
}

.form-control-textarea[readonly]:focus {
  border-color: #e2e8f0;
  box-shadow: none;
}

/* Contact Person Details Inner Box */
.pic-section {
  background-color: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 20px;
  margin-top: 4px;
}

.pic-section-title {
  font-size: 14px;
  font-weight: 800;
  color: #0f172a;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 16px;
  padding-bottom: 10px;
  border-bottom: 1px solid #e2e8f0;
}

.pic-section-title i {
  color: #2563eb;
}

.input-icon-wrapper {
  position: relative;
  display: flex;
  align-items: center;
}

.field-icon {
  position: absolute;
  left: 14px;
  color: #94a3b8;
  font-size: 13px;
  pointer-events: none;
}

.form-control-input {
  width: 100%;
  padding: 10px 14px 10px 38px;
  background-color: #ffffff;
  border: 1px solid #cbd5e1;
  border-radius: 8px;
  font-size: 13.5px;
  color: #0f172a;
  font-weight: 500;
  outline: none;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control-input:focus {
  border-color: #2563eb;
  box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
}

.form-control-input::placeholder {
  color: #94a3b8;
}

/* Bottom Save Action Bar */
.form-save-action-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 24px;
  background-color: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  margin-bottom: 24px;
}

.save-info {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 13px;
  color: #64748b;
  font-weight: 500;
}

.save-info i {
  color: #2563eb;
  font-size: 16px;
}

.btn-save-loan {
  background-color: #2563eb;
  color: #ffffff;
  border: none;
  padding: 12px 28px;
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

.btn-save-loan:hover {
  background-color: #1d4ed8;
  transform: translateY(-1px);
  box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
}

/* Responsive Handling */
@media (max-width: 768px) {
  .form-grid-2col {
    grid-template-columns: 1fr;
  }
  
  .form-group.full-width {
    grid-column: span 1;
  }

  .loan-page-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 14px;
  }

  .form-save-action-bar {
    flex-direction: column;
    gap: 14px;
    align-items: stretch;
  }

  .btn-save-loan {
    justify-content: center;
  }
}
</style>

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
            <a href="company_loanstatus.php" class="nav-subitem active"><i class="fa-solid fa-chart-line"></i> Loan Status</a>
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
      
    <!-- Page Title & Header Card -->
      <section class="loan-page-header">
        <div class="header-title-wrapper">
          <div class="title-icon-box">
            <i class="fa-solid fa-building-columns"></i>
          </div>
          <div>
            <h2>Loan Application & Financing Status</h2>
            <p>Manage financial institution details, eligible loan amounts, and representative contact information.</p>
          </div>
        </div>
        <div class="loan-summary-badge">
          <i class="fa-solid fa-shield-halved"></i> Active Applications: 3
        </div>
      </section>

      <form id="loanStatusForm" action="#" method="POST">
        
        <!-- Financial Institution 1 -->
        <div class="fi-card">
          <div class="fi-card-header">
            <div class="fi-title">
              <span class="fi-number-badge">1</span>
              <h3>Financial Institution 1</h3>
            </div>
            <span class="fi-status-pill status-active"><i class="fa-solid fa-circle-check"></i> Connected</span>
          </div>

          <div class="fi-card-body">
            <!-- Institution Selection & Eligible Amount -->
            <div class="form-grid-2col">
              <div class="form-group">
                <label class="input-label" for="fi1_select">
                  <i class="fa-solid fa-building-columns"></i> Financial Institution Account
                </label>
                <select id="fi1_select" name="fi1_email" class="form-control-select">
                  <option value="fistu01@yopmail.com" selected>fistu01@yopmail.com</option>
                  <option value="fistu02@yopmail.com">fistu02@yopmail.com</option>
                  <option value="fistu03@yopmail.com">fistu03@yopmail.com</option>
                </select>
              </div>

              <div class="form-group">
                <label class="input-label">
                  <i class="fa-solid fa-money-bill-wave"></i> Eligible Loan Amount
                </label>
                <div class="amount-display-box">
                  <span class="currency-tag">RM</span>
                  <span class="amount-value">-</span>
                </div>
              </div>
            </div>

            <!-- Locked Remarks -->
            <div class="form-group full-width">
              <label class="input-label" for="fi1_remarks">
                <i class="fa-solid fa-comment-dots"></i> Remarks
                <span class="lock-tag"><i class="fa-solid fa-lock"></i> Financial Institution Only</span>
              </label>
              <textarea id="fi1_remarks" name="fi1_remarks" class="form-control-textarea" rows="3" placeholder="Remarks updated by financial institution will appear here..." readonly></textarea>
            </div>

            <!-- Contacted Person Details Section -->
            <div class="pic-section">
              <h4 class="pic-section-title">
                <i class="fa-solid fa-address-card"></i> Contacted Person Details
              </h4>

              <div class="form-grid-2col">
                <div class="form-group">
                  <label class="input-label" for="fi1_branch">Branch</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-code-branch field-icon"></i>
                    <input type="text" id="fi1_branch" name="fi1_branch" class="form-control-input" placeholder="Branch" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi1_pic_name">PIC Name</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-user field-icon"></i>
                    <input type="text" id="fi1_pic_name" name="fi1_pic_name" class="form-control-input" placeholder="PIC Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi1_pic_email">PIC Email</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-envelope field-icon"></i>
                    <input type="email" id="fi1_pic_email" name="fi1_pic_email" class="form-control-input" placeholder="PIC Email" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi1_pic_tel">PIC Tel No</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-phone field-icon"></i>
                    <input type="tel" id="fi1_pic_tel" name="fi1_pic_tel" class="form-control-input" placeholder="PIC Tel No" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Financial Institution 2 -->
        <div class="fi-card">
          <div class="fi-card-header">
            <div class="fi-title">
              <span class="fi-number-badge">2</span>
              <h3>Financial Institution 2</h3>
            </div>
            <span class="fi-status-pill status-active"><i class="fa-solid fa-circle-check"></i> Connected</span>
          </div>

          <div class="fi-card-body">
            <!-- Institution Selection & Eligible Amount -->
            <div class="form-grid-2col">
              <div class="form-group">
                <label class="input-label" for="fi2_select">
                  <i class="fa-solid fa-building-columns"></i> Financial Institution Account
                </label>
                <select id="fi2_select" name="fi2_email" class="form-control-select">
                  <option value="fistu01@yopmail.com" selected>fistu01@yopmail.com</option>
                  <option value="fistu02@yopmail.com">fistu02@yopmail.com</option>
                  <option value="fistu03@yopmail.com">fistu03@yopmail.com</option>
                </select>
              </div>

              <div class="form-group">
                <label class="input-label">
                  <i class="fa-solid fa-money-bill-wave"></i> Eligible Loan Amount
                </label>
                <div class="amount-display-box">
                  <span class="currency-tag">RM</span>
                  <span class="amount-value">-</span>
                </div>
              </div>
            </div>

            <!-- Locked Remarks -->
            <div class="form-group full-width">
              <label class="input-label" for="fi2_remarks">
                <i class="fa-solid fa-comment-dots"></i> Remarks
                <span class="lock-tag"><i class="fa-solid fa-lock"></i> Financial Institution Only</span>
              </label>
              <textarea id="fi2_remarks" name="fi2_remarks" class="form-control-textarea" rows="3" placeholder="Remarks updated by financial institution will appear here..." readonly></textarea>
            </div>

            <!-- Contacted Person Details Section -->
            <div class="pic-section">
              <h4 class="pic-section-title">
                <i class="fa-solid fa-address-card"></i> Contacted Person Details
              </h4>

              <div class="form-grid-2col">
                <div class="form-group">
                  <label class="input-label" for="fi2_branch">Branch</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-code-branch field-icon"></i>
                    <input type="text" id="fi2_branch" name="fi2_branch" class="form-control-input" placeholder="Branch" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi2_pic_name">PIC Name</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-user field-icon"></i>
                    <input type="text" id="fi2_pic_name" name="fi2_pic_name" class="form-control-input" placeholder="PIC Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi2_pic_email">PIC Email</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-envelope field-icon"></i>
                    <input type="email" id="fi2_pic_email" name="fi2_pic_email" class="form-control-input" placeholder="PIC Email" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi2_pic_tel">PIC Tel No</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-phone field-icon"></i>
                    <input type="tel" id="fi2_pic_tel" name="fi2_pic_tel" class="form-control-input" placeholder="PIC Tel No" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Financial Institution 3 -->
        <div class="fi-card">
          <div class="fi-card-header">
            <div class="fi-title">
              <span class="fi-number-badge">3</span>
              <h3>Financial Institution 3</h3>
            </div>
            <span class="fi-status-pill status-active"><i class="fa-solid fa-circle-check"></i> Connected</span>
          </div>

          <div class="fi-card-body">
            <!-- Institution Selection & Eligible Amount -->
            <div class="form-grid-2col">
              <div class="form-group">
                <label class="input-label" for="fi3_select">
                  <i class="fa-solid fa-building-columns"></i> Financial Institution Account
                </label>
                <select id="fi3_select" name="fi3_email" class="form-control-select">
                  <option value="fistu01@yopmail.com" selected>fistu01@yopmail.com</option>
                  <option value="fistu02@yopmail.com">fistu02@yopmail.com</option>
                  <option value="fistu03@yopmail.com">fistu03@yopmail.com</option>
                </select>
              </div>

              <div class="form-group">
                <label class="input-label">
                  <i class="fa-solid fa-money-bill-wave"></i> Eligible Loan Amount
                </label>
                <div class="amount-display-box">
                  <span class="currency-tag">RM</span>
                  <span class="amount-value">-</span>
                </div>
              </div>
            </div>

            <!-- Locked Remarks -->
            <div class="form-group full-width">
              <label class="input-label" for="fi3_remarks">
                <i class="fa-solid fa-comment-dots"></i> Remarks
                <span class="lock-tag"><i class="fa-solid fa-lock"></i> Financial Institution Only</span>
              </label>
              <textarea id="fi3_remarks" name="fi3_remarks" class="form-control-textarea" rows="3" placeholder="Remarks updated by financial institution will appear here..." readonly></textarea>
            </div>

            <!-- Contacted Person Details Section -->
            <div class="pic-section">
              <h4 class="pic-section-title">
                <i class="fa-solid fa-address-card"></i> Contacted Person Details
              </h4>

              <div class="form-grid-2col">
                <div class="form-group">
                  <label class="input-label" for="fi3_branch">Branch</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-code-branch field-icon"></i>
                    <input type="text" id="fi3_branch" name="fi3_branch" class="form-control-input" placeholder="Branch" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi3_pic_name">PIC Name</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-user field-icon"></i>
                    <input type="text" id="fi3_pic_name" name="fi3_pic_name" class="form-control-input" placeholder="PIC Name" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi3_pic_email">PIC Email</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-envelope field-icon"></i>
                    <input type="email" id="fi3_pic_email" name="fi3_pic_email" class="form-control-input" placeholder="PIC Email" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="input-label" for="fi3_pic_tel">PIC Tel No</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-phone field-icon"></i>
                    <input type="tel" id="fi3_pic_tel" name="fi3_pic_tel" class="form-control-input" placeholder="PIC Tel No" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bottom Save Action Bar -->
        <div class="form-save-action-bar">
          <div class="save-info">
            <i class="fa-solid fa-circle-info"></i>
            <span>All updates will be automatically synchronized with your project file.</span>
          </div>
          <button type="submit" class="btn-save-loan">
            <i class="fa-solid fa-floppy-disk"></i> Save Loan Details
          </button>
        </div>

      </form>

    </main>

  </div>

  <!-- JavaScript for Accordion Interactivity -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    document.getElementById('loanStatusForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Loan status details saved successfully!');
    });
  </script>

</body>
</html>
