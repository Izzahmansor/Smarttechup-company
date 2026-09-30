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
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }

    /* SECTION HEADER */
    .self-assessment-header {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 24px;
    }

    .header-icon-box {
      width: 52px;
      height: 52px;
      background: #2563eb;
      color: #ffffff;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .header-text h2 {
      font-size: 1.35rem;
      font-weight: 800;
      color: #0f172a;
      margin: 0 0 2px 0;
    }

    .header-text p {
      font-size: 0.88rem;
      color: #64748b;
      margin: 0;
    }

    /* ASSESSMENT PROGRESS CARD */
    .assessment-progress-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 20px 24px;
      margin-bottom: 24px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
    }

    .progress-top-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }

    .progress-title-text {
      font-size: 0.95rem;
      font-weight: 700;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .progress-percentage-pill {
      background-color: #eff6ff;
      color: #2563eb;
      font-weight: 700;
      font-size: 0.85rem;
      padding: 4px 12px;
      border-radius: 20px;
    }

    .progress-track {
      height: 8px;
      background-color: #e2e8f0;
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 10px;
    }

    .progress-fill {
      height: 100%;
      background-color: #2563eb;
      border-radius: 10px;
      transition: width 0.4s ease;
    }

    .progress-caption {
      font-size: 0.8rem;
      color: #64748b;
      margin: 0;
    }

    /* QUESTION CARD CONTAINER */
    .question-card-container {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 28px 24px;
      margin-bottom: 24px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
    }

    .question-title-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .q-badge-pill {
      background-color: #eff6ff;
      color: #2563eb;
      font-weight: 700;
      font-size: 0.85rem;
      padding: 6px 14px;
      border-radius: 8px;
      flex-shrink: 0;
    }

    .question-text {
      font-size: 1.05rem;
      font-weight: 700;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-circle-icon {
      color: #94a3b8;
      font-size: 0.95rem;
      cursor: pointer;
      transition: color 0.2s ease;
    }

    .info-circle-icon:hover {
      color: #2563eb;
    }

    /* FULL-WIDTH OPTION ROWS */
    .option-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .full-width-option-row {
      display: flex;
      align-items: center;
      gap: 12px;
      background-color: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 14px 20px;
      cursor: pointer;
      transition: all 0.2s ease;
      user-select: none;
    }

    .full-width-option-row:hover {
      background-color: #f1f5f9;
      border-color: #cbd5e1;
    }

    .full-width-option-row input[type="radio"],
    .full-width-option-row input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
      cursor: pointer;
      flex-shrink: 0;
    }

    .full-width-option-row:has(input:checked) {
      border-color: #2563eb;
      background-color: #eff6ff;
    }

    .option-row-label {
      font-size: 0.92rem;
      font-weight: 600;
      color: #1e293b;
      display: flex;
      align-items: center;
      gap: 8px;
      width: 100%;
    }

    /* DYNAMIC NESTED CONTAINERS */
    .nested-group-box {
      display: none;
      margin-top: 14px;
      padding-left: 18px;
      border-left: 3px solid #2563eb;
    }

    .nested-group-box.active {
      display: block;
    }

    .sub-nested-group-box {
      display: none;
      margin-top: 12px;
      padding-left: 18px;
      border-left: 3px dashed #3b82f6;
    }

    .sub-nested-group-box.active {
      display: block;
    }

    .nested-title {
      font-size: 0.85rem;
      font-weight: 700;
      color: #475569;
      margin-bottom: 12px;
      display: block;
    }

    /* Q12 CHECKBOX SUB-SECTION HEADERS */
    .subsection-checkbox-card {
      display: flex;
      align-items: center;
      gap: 12px;
      background-color: #f1f5f9;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 12px 18px;
      margin-top: 16px;
      margin-bottom: 8px;
      cursor: pointer;
      user-select: none;
      transition: all 0.2s ease;
    }

    .subsection-checkbox-card:hover {
      background-color: #e2e8f0;
    }

    .subsection-checkbox-card input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
      cursor: pointer;
    }

    .subsection-checkbox-card:has(input:checked) {
      background-color: #dbeafe;
      border-color: #2563eb;
    }

    .subsection-title-text {
      font-size: 0.95rem;
      font-weight: 700;
      color: #0f172a;
    }

    .subsection-options-wrapper {
      display: none;
      padding-left: 12px;
      margin-bottom: 12px;
    }

    .subsection-options-wrapper.active {
      display: block;
    }

    /* Q13 SUB-SECTION STYLES */
    .sub-group-heading {
      font-size: 0.95rem;
      font-weight: 800;
      color: #1e1b4b;
      margin-top: 18px;
      margin-bottom: 8px;
    }

    .sub-group-subheading {
      font-size: 0.88rem;
      font-weight: 700;
      color: #1e1b4b;
      margin-top: 12px;
      margin-bottom: 6px;
    }

    .governance-wrapper {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 16px 20px;
      margin-top: 12px;
    }

    /* FILE UPLOAD ATTACHMENT BOX */
    .file-attachment-box {
      margin-top: 14px;
      padding: 12px 16px;
      background-color: #f8fafc;
      border: 1px dashed #cbd5e1;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .file-attachment-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #475569;
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
    }

    /* BOTTOM FORM ACTIONS */
    .form-actions-row {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 12px;
      margin-top: 24px;
    }

    .btn-secondary-custom {
      background-color: #ffffff;
      color: #475569;
      border: 1px solid #cbd5e1;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.88rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-secondary-custom:hover {
      background-color: #f1f5f9;
      color: #1e293b;
    }

    .btn-primary-custom {
      background-color: #2563eb;
      color: #ffffff;
      border: none;
      padding: 10px 24px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 0.88rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-primary-custom:hover {
      background-color: #1d4ed8;
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

      <!-- SECTION HEADER -->
      <div class="self-assessment-header">
        <div class="header-icon-box">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
        </div>
        <div class="header-text">
          <h2>Self Assessment</h2>
          <p>Evaluate your company's readiness and digital maturity level.</p>
        </div>
      </div>

      <!-- ASSESSMENT PROGRESS CARD -->
      <div class="assessment-progress-card">
        <div class="progress-top-row">
          <span class="progress-title-text"><i class="fa-solid fa-chart-line" style="color:#2563eb;"></i> Assessment Progress</span>
          <span class="progress-percentage-pill">80% Completed</span>
        </div>
        <div class="progress-track">
          <div class="progress-fill" style="width: 80%;"></div>
        </div>
        <p class="progress-caption">Each completed question contributes 10% toward total completion (10 Questions Total).</p>
      </div>

      <!-- FORM WORKSPACE -->
      <form id="projectFlowForm" method="POST" action="company_selfassessment4.php" enctype="multipart/form-data">

        <!-- QUESTION 9 CARD -->
        <div class="question-card-container">
          <div class="question-title-row">
            <span class="q-badge-pill">Q9</span>
            <span class="question-text">
              Are your machines connected to the network?
              <i class="fa-solid fa-circle-info info-circle-icon" title="Select whether your machines are networked and share data."></i>
            </span>
          </div>

          <div class="option-list">
            <label class="full-width-option-row">
              <input type="radio" name="machineConnected" value="Yes" onchange="handleQ9MainChange('Yes')" required>
              <span class="option-row-label">Yes</span>
            </label>

            <label class="full-width-option-row">
              <input type="radio" name="machineConnected" value="No" onchange="handleQ9MainChange('No')">
              <span class="option-row-label">No</span>
            </label>
          </div>

          <!-- File Upload Attachment -->
          <div class="file-attachment-box">
            <label class="file-attachment-label" for="file_q9">
              <i class="fa-solid fa-paperclip" style="color:#2563eb;"></i> Upload Supporting Evidence (PDF, PNG, JPG)
            </label>
            <input type="file" name="attachments_q9" id="file_q9" accept=".pdf,.png,.jpg,.jpeg">
          </div>

          <!-- Q9 Nested Primary Level Selection -->
          <div id="q9NestedGroup" class="nested-group-box">
            <span class="nested-title">Describe your machine connectivity level:</span>
            <div class="option-list">
              <label class="full-width-option-row">
                <input type="radio" name="q9_connectivity_level" value="physical_no_data" onchange="handleQ9LevelChange(this.value)">
                <span class="option-row-label">They are physically connected (e.g. conveyor belt) BUT no data exchange between the machine.</span>
              </label>

              <label class="full-width-option-row">
                <input type="radio" name="q9_connectivity_level" value="control_limited_data" onchange="handleQ9LevelChange(this.value)">
                <span class="option-row-label">They are connected via the machine control system. However, they have limited data exchange for specific tasks.</span>
              </label>

              <label class="full-width-option-row">
                <input type="radio" name="q9_connectivity_level" value="interoperability" onchange="handleQ9LevelChange(this.value)">
                <span class="option-row-label">The connection enables data interoperability with different platforms/protocols/controllers.</span>
              </label>
            </div>

            <!-- Sub-Nested Checkboxes (Appears ONLY when Option 3 is clicked) -->
            <div id="q9SubNestedGroup" class="sub-nested-group-box">
              <span class="nested-title">Select additional interoperability capabilities:</span>
              <div class="option-list">
                <label class="full-width-option-row">
                  <input type="checkbox" name="connectivityCharacteristics[]" value="realtime_exchange">
                  <span class="option-row-label">Data exchange occurs in real-time interaction and information exchange.</span>
                </label>

                <label class="full-width-option-row">
                  <input type="checkbox" name="connectivityCharacteristics[]" value="immediate_feedback">
                  <span class="option-row-label">Immediate feedback and decision-making.</span>
                </label>

                <label class="full-width-option-row">
                  <input type="checkbox" name="connectivityCharacteristics[]" value="cross_domain">
                  <span class="option-row-label">Cross-domain interaction (enterprise and facilities)</span>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- QUESTION 10 CARD -->
        <div class="question-card-container">
          <div class="question-title-row">
            <span class="q-badge-pill">Q10</span>
            <span class="question-text">
              Please describe the machine's control systems. (If you have a numerous number of machinery with various types of control systems, please choose the highest level.)
              <i class="fa-solid fa-circle-info info-circle-icon" title="Select your primary control system configuration."></i>
            </span>
          </div>

          <div class="option-list">
            <label class="full-width-option-row">
              <input type="radio" name="control_system_type" value="hard_wired">
              <span class="option-row-label">Hard-wired control system <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
            </label>

            <label class="full-width-option-row">
              <input type="radio" name="control_system_type" value="plc">
              <span class="option-row-label">PLC-based control system <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
            </label>

            <label class="full-width-option-row">
              <input type="radio" name="control_system_type" value="computer_based">
              <span class="option-row-label">Computer-based control system <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
            </label>
          </div>
        </div>

        <!-- QUESTION 11 CARD -->
        <div class="question-card-container">
          <div class="question-title-row">
            <span class="q-badge-pill">Q11</span>
            <span class="question-text">
              Can you describe their control systems capability?
              <i class="fa-solid fa-circle-info info-circle-icon"></i>
            </span>
          </div>

          <div class="option-list">
            <?php if (!empty($automationLevels)): ?>
              <?php foreach ($automationLevels as $key => $lvl): ?>
                <label class="full-width-option-row">
                  <input type="checkbox" name="automation_levels[]" value="<?= htmlspecialchars($lvl['title']) ?>" id="chk-auto-<?= $key ?>">
                  <span class="option-row-label"><?= htmlspecialchars($lvl['title']) ?></span>
                </label>
              <?php endforeach; ?>
            <?php else: ?>
              <label class="full-width-option-row">
                <input type="checkbox" name="control_capabilities[]" value="identify_notify">
                <span class="option-row-label">Identify and notify problems <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>

              <label class="full-width-option-row">
                <input type="checkbox" name="control_capabilities[]" value="predict_problems">
                <span class="option-row-label">Predict problems <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>

              <label class="full-width-option-row">
                <input type="checkbox" name="control_capabilities[]" value="self_optimize">
                <span class="option-row-label">Computer-based control system / Self-optimizing <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>
            <?php endif; ?>
          </div>
        </div>

        <!-- QUESTION 12 CARD -->
        <div class="question-card-container">
          <div class="question-title-row">
            <span class="q-badge-pill">Q12</span>
            <span class="question-text">
              Select the best features that describe your manufacturing capability to produce individualized products.
              <i class="fa-solid fa-circle-info info-circle-icon"></i>
            </span>
          </div>

          <!-- Section 1: Capability -->
          <label class="subsection-checkbox-card">
            <input type="checkbox" id="chk_q12_cap" onchange="toggleSubSection('chk_q12_cap', 'q12_cap_wrapper')">
            <span class="subsection-title-text">Capability</span>
          </label>
          <div id="q12_cap_wrapper" class="subsection-options-wrapper">
            <div class="option-list">
              <label class="full-width-option-row">
                <input type="radio" name="q12_capability" value="limited">
                <span class="option-row-label">Limited <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_capability" value="moderate">
                <span class="option-row-label">Pre-determined / moderate <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_capability" value="flexible">
                <span class="option-row-label">Flexible <i class="fa-solid fa-circle-info info-circle-icon"></i></span>
              </label>
            </div>
          </div>

          <!-- Section 2: Tools / Moulds Changing Mechanism -->
          <label class="subsection-checkbox-card">
            <input type="checkbox" id="chk_q12_tools" onchange="toggleSubSection('chk_q12_tools', 'q12_tools_wrapper')">
            <span class="subsection-title-text">Tools / Moulds Changing Mechanism</span>
          </label>
          <div id="q12_tools_wrapper" class="subsection-options-wrapper">
            <div class="option-list">
              <label class="full-width-option-row">
                <input type="radio" name="q12_tools" value="manual">
                <span class="option-row-label">Manual and time consuming</span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_tools" value="semi">
                <span class="option-row-label">Semi-automated and fast-changing</span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_tools" value="auto">
                <span class="option-row-label">Automatic and fast-changing</span>
              </label>
            </div>
          </div>

          <!-- Section 3: Lot Sizes -->
          <label class="subsection-checkbox-card">
            <input type="checkbox" id="chk_q12_lot" onchange="toggleSubSection('chk_q12_lot', 'q12_lot_wrapper')">
            <span class="subsection-title-text">Lot Sizes</span>
          </label>
          <div id="q12_lot_wrapper" class="subsection-options-wrapper">
            <div class="option-list">
              <label class="full-width-option-row">
                <input type="radio" name="q12_lot" value="fixed">
                <span class="option-row-label">Fixed MOQ</span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_lot" value="flexible">
                <span class="option-row-label">Flexible MOQ</span>
              </label>
            </div>
          </div>

          <!-- Section 4: Machine Setup -->
          <label class="subsection-checkbox-card">
            <input type="checkbox" id="chk_q12_setup" onchange="toggleSubSection('chk_q12_setup', 'q12_setup_wrapper')">
            <span class="subsection-title-text">Machine Setup</span>
          </label>
          <div id="q12_setup_wrapper" class="subsection-options-wrapper">
            <div class="option-list">
              <label class="full-width-option-row">
                <input type="radio" name="q12_setup" value="manual">
                <span class="option-row-label">Manual and time consuming</span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_setup" value="semi">
                <span class="option-row-label">Semi-automated and fast-changing</span>
              </label>
              <label class="full-width-option-row">
                <input type="radio" name="q12_setup" value="auto">
                <span class="option-row-label">Automatic and fast-changing</span>
              </label>
            </div>
          </div>
        </div>

        <!-- QUESTION 13 CARD -->
        <div class="question-card-container">
          <div class="question-title-row">
            <span class="q-badge-pill">Q13</span>
            <span class="question-text">
              Describe the cybersecurity initiatives in your company
              <i class="fa-solid fa-circle-info info-circle-icon"></i>
            </span>
          </div>

          <div class="option-list">
            <!-- Dedicated Personnel Section -->
            <div class="sub-group-heading">Dedicated Personnel</div>
            <label class="full-width-option-row">
              <input type="radio" id="q13_p_none" name="q13_personnel" value="none">
              <span class="option-row-label">No dedicated personnel.</span>
            </label>
            <label class="full-width-option-row">
              <input type="radio" id="q13_p_one" name="q13_personnel" value="one">
              <span class="option-row-label">One dedicated personnel.</span>
            </label>
            <label class="full-width-option-row">
              <input type="radio" id="q13_p_team" name="q13_personnel" value="team">
              <span class="option-row-label">Has a dedicated team.</span>
            </label>

            <!-- Resources & Security Tools Section -->
            <div class="sub-group-heading">Resources & Security Tools</div>
            <label class="full-width-option-row">
              <input type="checkbox" id="q13_res_pass" name="q13_resources[]" value="password">
              <span class="option-row-label">Password management</span>
            </label>
            <label class="full-width-option-row">
              <input type="checkbox" id="q13_res_ip" name="q13_resources[]" value="ip">
              <span class="option-row-label">IP Whitelisting</span>
            </label>
            <label class="full-width-option-row">
              <input type="checkbox" id="q13_res_fw" name="q13_resources[]" value="firewall">
              <span class="option-row-label">Firewall systems</span>
            </label>
            <label class="full-width-option-row">
              <input type="checkbox" id="q13_res_av" name="q13_resources[]" value="antivirus">
              <span class="option-row-label">Antivirus software</span>
            </label>

            <!-- Governance Section -->
            <div class="sub-group-heading">Governance</div>
            <div class="governance-wrapper">
              
              <!-- Awareness Program/Activities -->
              <div class="sub-group-subheading">Awareness Program/Activities</div>
              <div class="option-list">
                <label class="full-width-option-row">
                  <input type="radio" name="q13_awareness" value="Yes">
                  <span class="option-row-label">Yes</span>
                </label>
                <label class="full-width-option-row">
                  <input type="radio" name="q13_awareness" value="No">
                  <span class="option-row-label">No</span>
                </label>
              </div>

              <!-- Policies -->
              <div class="sub-group-subheading">Policies</div>
              <div class="option-list">
                <label class="full-width-option-row">
                  <input type="radio" name="q13_policies" value="Yes">
                  <span class="option-row-label">Yes</span>
                </label>
                <label class="full-width-option-row">
                  <input type="radio" name="q13_policies" value="No">
                  <span class="option-row-label">No</span>
                </label>
              </div>

              <!-- Risk Assessment -->
              <div class="sub-group-subheading">Risk Assessment</div>
              <div class="option-list">
                <label class="full-width-option-row">
                  <input type="radio" name="q13_risk" value="Yes">
                  <span class="option-row-label">Yes</span>
                </label>
                <label class="full-width-option-row">
                  <input type="radio" name="q13_risk" value="No">
                  <span class="option-row-label">No</span>
                </label>
              </div>

              <!-- Continuous Revision -->
              <div class="sub-group-subheading">Continuous Revision</div>
              <div class="option-list">
                <label class="full-width-option-row">
                  <input type="radio" name="q13_revision" value="No">
                  <span class="option-row-label">No</span>
                </label>
                <label class="full-width-option-row">
                  <input type="radio" name="q13_revision" value="Seldom">
                  <span class="option-row-label">Seldom</span>
                </label>
                <label class="full-width-option-row">
                  <input type="radio" name="q13_revision" value="Regular">
                  <span class="option-row-label">Regular</span>
                </label>
              </div>

            </div>
          </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions-row">
          <button type="button" class="btn-secondary-custom">Save as Draft</button>
          <button type="button" class="btn-secondary-custom" onclick="window.location.href='company_selfassessment3.php'">Back</button>
          <button type="submit" class="btn-primary-custom">Submit</button>
        </div>

      </form>
    </main>
  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    // Question 9 Main Toggle (Yes / No)
    function handleQ9MainChange(val) {
      const q9Group = document.getElementById('q9NestedGroup');
      if (val === 'Yes') {
        q9Group.classList.add('active');
      } else {
        q9Group.classList.remove('active');
        document.getElementById('q9SubNestedGroup').classList.remove('active');
      }
    }

    // Question 9 Level Toggle (Triggers Sub-Nested Checkboxes ONLY on 'interoperability')
    function handleQ9LevelChange(val) {
      const subNested = document.getElementById('q9SubNestedGroup');
      if (val === 'interoperability') {
        subNested.classList.add('active');
      } else {
        subNested.classList.remove('active');
      }
    }

    // Question 12 Sub-Section Accordion Checkboxes
    function toggleSubSection(checkboxId, wrapperId) {
      const chk = document.getElementById(checkboxId);
      const wrapper = document.getElementById(wrapperId);
      
      if (chk && wrapper) {
        if (chk.checked) {
          wrapper.classList.add('active');
        } else {
          wrapper.classList.remove('active');
        }
      }
    }
  </script>
</body>
</html>
