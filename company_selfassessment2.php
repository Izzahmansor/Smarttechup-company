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
    /* Indentation and visual tree connector styles for nested levels */
    .nested-group {
      margin-left: 24px;
      padding-left: 16px;
      border-left: 2px dashed #cbd5e1;
      margin-top: 16px;
      transition: all 0.3s ease-in-out;
    }

    .nested-group .nested-group {
      margin-left: 28px;
      padding-left: 16px;
      border-left: 2px dashed #94a3b8;
    }

    .nested-group .nested-group .nested-group {
      margin-left: 28px;
      padding-left: 16px;
      border-left: 2px dashed #64748b;
    }

    /* File Upload Dropzone Styles */
    .upload-wrapper {
      margin-top: 16px;
      background: #f8fafc;
      border: 1px dashed #cbd5e1;
      border-radius: 8px;
      padding: 16px;
      transition: all 0.2s ease-in-out;
    }

    .upload-wrapper:hover, .upload-wrapper.drag-over {
      border-color: #2563eb;
      background-color: #eff6ff;
    }

    .upload-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .upload-title {
      font-size: 0.85rem;
      font-weight: 600;
      color: #334155;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .upload-hint {
      font-size: 0.75rem;
      color: #64748b;
    }

    .dropzone-box {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 16px;
      background: #ffffff;
      border: 1px dashed #94a3b8;
      border-radius: 6px;
      cursor: pointer;
      text-align: center;
      transition: background 0.2s;
    }

    .dropzone-box:hover {
      background: #f1f5f9;
    }

    .dropzone-box i {
      font-size: 1.5rem;
      color: #3b82f6;
      margin-bottom: 6px;
    }

    .dropzone-text {
      font-size: 0.825rem;
      color: #475569;
    }

    .dropzone-text span {
      color: #2563eb;
      font-weight: 600;
      text-decoration: underline;
    }

    .file-input-hidden {
      display: none;
    }

    /* File Preview List */
    .file-preview-list {
      margin-top: 10px;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .file-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #ffffff;
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #e2e8f0;
      font-size: 0.8rem;
    }

    .file-info {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #1e293b;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .file-info i {
      color: #64748b;
    }

    .file-size {
      color: #94a3b8;
      font-size: 0.75rem;
      margin-left: 6px;
    }

    .remove-file-btn {
      background: transparent;
      border: none;
      color: #ef4444;
      cursor: pointer;
      font-size: 0.9rem;
      padding: 2px 6px;
      border-radius: 4px;
      transition: background 0.2s;
    }

    .remove-file-btn:hover {
      background: #fee2e2;
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
      <form id="projectFlowForm" enctype="multipart/form-data" onsubmit="event.preventDefault(); goToNextQuestion();">
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
              <span class="progress-percentage" id="progressPercentText">0% Completed</span>
            </div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" id="progressBarFill" style="width: 0%;"></div>
            </div>
            <p class="progress-subtext">Each completed question contributes 10% toward total completion (10 Questions Total).</p>
          </div>

          <div class="form-card">
            <div class="form-card-header">
            </div>

            <!-- QUESTION 3 -->
            <div class="question-container" style="margin-top: 32px;">
              <div class="question-header">
                <span class="q-number">Q3</span>
                <p class="question-title">
                  How do you manage (i.e. information dissemination, task delegation, data recording, status updating etc.) the following operations?
                  <i class="fa-solid fa-circle-info field-help" title="Select the operational maturity level and attach supporting evidence for each section below"></i>
                </p>
              </div>

              <!-- SUB-QUESTION A -->
              <div class="nested-group animate-slide active">
                <div class="nested-content">
                  <span class="nested-tag">
                    <i class="fa-solid fa-industry"></i> A. Production planning and scheduling (e.g. production order, job order or manufacturing order, etc.)
                  </span>
                  <div class="interactive-option-grid vertical">
                    <label class="option-card">
                      <input type="radio" name="opsProductionPlanning" value="Managed manually using paper forms." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Managed manually using paper forms.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsProductionPlanning" value="Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsProductionPlanning" value="Integrated software systems that help manage and coordinate these processes." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Integrated software systems that help manage and coordinate these processes.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsProductionPlanning" value="Most processes are automated, with real-time data tracking and minimal manual intervention." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Most processes are automated, with real-time data tracking and minimal manual intervention.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsProductionPlanning" value="Fully autonomous, using advanced AI and machine learning for optimization and management." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Fully autonomous, using advanced AI and machine learning for optimization and management.</span>
                      </div>
                    </label>
                  </div>

                  <!-- Upload Feature for Sub-Question A -->
                  <div class="upload-wrapper">
                    <div class="upload-header">
                      <span class="upload-title"><i class="fa-solid fa-paperclip"></i> Attach Supporting Evidence (Optional)</span>
                      <span class="upload-hint">PDF, PNG, JPG, XLSX (Max 10MB)</span>
                    </div>
                    <div class="dropzone-box" onclick="triggerFileInput('fileInputA')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputA', 'fileListA')">
                      <i class="fa-solid fa-cloud-arrow-up"></i>
                      <div class="dropzone-text">Drag and drop files here or <span>Browse</span></div>
                      <input type="file" id="fileInputA" name="docsProductionPlanning[]" multiple class="file-input-hidden" accept=".pdf,.png,.jpg,.jpeg,.xlsx,.csv" onchange="handleFileSelect(event, 'fileListA')">
                    </div>
                    <div class="file-preview-list" id="fileListA"></div>
                  </div>
                </div>
              </div>

              <!-- SUB-QUESTION B -->
              <div class="nested-group animate-slide active">
                <div class="nested-content">
                  <span class="nested-tag">
                    <i class="fa-solid fa-boxes-stacked"></i> B. Inventory management (e.g. raw material, work-in-progress (WIP) and finished goods (FG))
                  </span>
                  <div class="interactive-option-grid vertical">
                    <label class="option-card">
                      <input type="radio" name="opsInventoryManagement" value="Managed manually using paper forms." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Managed manually using paper forms.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsInventoryManagement" value="Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsInventoryManagement" value="Integrated software systems that help manage and coordinate these processes." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Integrated software systems that help manage and coordinate these processes.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsInventoryManagement" value="Most processes are automated, with real-time data tracking and minimal manual intervention." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Most processes are automated, with real-time data tracking and minimal manual intervention.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsInventoryManagement" value="Fully autonomous, using advanced AI and machine learning for optimization and management." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Fully autonomous, using advanced AI and machine learning for optimization and management.</span>
                      </div>
                    </label>
                  </div>

                  <!-- Upload Feature for Sub-Question B -->
                  <div class="upload-wrapper">
                    <div class="upload-header">
                      <span class="upload-title"><i class="fa-solid fa-paperclip"></i> Attach Supporting Evidence (Optional)</span>
                      <span class="upload-hint">PDF, PNG, JPG, XLSX (Max 10MB)</span>
                    </div>
                    <div class="dropzone-box" onclick="triggerFileInput('fileInputB')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputB', 'fileListB')">
                      <i class="fa-solid fa-cloud-arrow-up"></i>
                      <div class="dropzone-text">Drag and drop files here or <span>Browse</span></div>
                      <input type="file" id="fileInputB" name="docsInventoryManagement[]" multiple class="file-input-hidden" accept=".pdf,.png,.jpg,.jpeg,.xlsx,.csv" onchange="handleFileSelect(event, 'fileListB')">
                    </div>
                    <div class="file-preview-list" id="fileListB"></div>
                  </div>
                </div>
              </div>

              <!-- SUB-QUESTION C -->
              <div class="nested-group animate-slide active">
                <div class="nested-content">
                  <span class="nested-tag">
                    <i class="fa-solid fa-microscope"></i> C. Quality control and assurance (e.g. data for good parts, rejected parts, waste, quality assurance testing, inspection results, etc.)
                  </span>
                  <div class="interactive-option-grid vertical">
                    <label class="option-card">
                      <input type="radio" name="opsQualityControl" value="Managed manually using paper forms." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Managed manually using paper forms.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsQualityControl" value="Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsQualityControl" value="Integrated software systems that help manage and coordinate these processes." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Integrated software systems that help manage and coordinate these processes.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsQualityControl" value="Most processes are automated, with real-time data tracking and minimal manual intervention." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Most processes are automated, with real-time data tracking and minimal manual intervention.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsQualityControl" value="Fully autonomous, using advanced AI and machine learning for optimization and management." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Fully autonomous, using advanced AI and machine learning for optimization and management.</span>
                      </div>
                    </label>
                  </div>

                  <!-- Upload Feature for Sub-Question C -->
                  <div class="upload-wrapper">
                    <div class="upload-header">
                      <span class="upload-title"><i class="fa-solid fa-paperclip"></i> Attach Supporting Evidence (Optional)</span>
                      <span class="upload-hint">PDF, PNG, JPG, XLSX (Max 10MB)</span>
                    </div>
                    <div class="dropzone-box" onclick="triggerFileInput('fileInputC')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputC', 'fileListC')">
                      <i class="fa-solid fa-cloud-arrow-up"></i>
                      <div class="dropzone-text">Drag and drop files here or <span>Browse</span></div>
                      <input type="file" id="fileInputC" name="docsQualityControl[]" multiple class="file-input-hidden" accept=".pdf,.png,.jpg,.jpeg,.xlsx,.csv" onchange="handleFileSelect(event, 'fileListC')">
                    </div>
                    <div class="file-preview-list" id="fileListC"></div>
                  </div>
                </div>
              </div>

              <!-- SUB-QUESTION D -->
              <div class="nested-group animate-slide active">
                <div class="nested-content">
                  <span class="nested-tag">
                    <i class="fa-solid fa-gauge-high"></i> D. Performance management* (e.g. OEE, On-time-delivery, production volume, capacity utilisation, etc.)
                  </span>
                  <div class="interactive-option-grid vertical">
                    <label class="option-card">
                      <input type="radio" name="opsPerformanceManagement" value="Managed manually using paper forms." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Managed manually using paper forms.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsPerformanceManagement" value="Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsPerformanceManagement" value="Integrated software systems that help manage and coordinate these processes." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Integrated software systems that help manage and coordinate these processes.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsPerformanceManagement" value="Most processes are automated, with real-time data tracking and minimal manual intervention." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Most processes are automated, with real-time data tracking and minimal manual intervention.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsPerformanceManagement" value="Fully autonomous, using advanced AI and machine learning for optimization and management." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Fully autonomous, using advanced AI and machine learning for optimization and management.</span>
                      </div>
                    </label>
                  </div>

                  <!-- Upload Feature for Sub-Question D -->
                  <div class="upload-wrapper">
                    <div class="upload-header">
                      <span class="upload-title"><i class="fa-solid fa-paperclip"></i> Attach Supporting Evidence (Optional)</span>
                      <span class="upload-hint">PDF, PNG, JPG, XLSX (Max 10MB)</span>
                    </div>
                    <div class="dropzone-box" onclick="triggerFileInput('fileInputD')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputD', 'fileListD')">
                      <i class="fa-solid fa-cloud-arrow-up"></i>
                      <div class="dropzone-text">Drag and drop files here or <span>Browse</span></div>
                      <input type="file" id="fileInputD" name="docsPerformanceManagement[]" multiple class="file-input-hidden" accept=".pdf,.png,.jpg,.jpeg,.xlsx,.csv" onchange="handleFileSelect(event, 'fileListD')">
                    </div>
                    <div class="file-preview-list" id="fileListD"></div>
                  </div>
                </div>
              </div>

              <!-- SUB-QUESTION E -->
              <div class="nested-group animate-slide active">
                <div class="nested-content">
                  <span class="nested-tag">
                    <i class="fa-solid fa-truck-ramp-box"></i> E. Supply chain management (e.g. communication with suppliers, sub-contractors, customers, etc.)
                  </span>
                  <div class="interactive-option-grid vertical">
                    <label class="option-card">
                      <input type="radio" name="opsSupplyChainManagement" value="Supply chain management is not defined" onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Supply chain management is not defined</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsSupplyChainManagement" value="Managed manually using paper forms." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Managed manually using paper forms.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsSupplyChainManagement" value="Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes, involving significant manual work.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsSupplyChainManagement" value="Integrated software systems that help manage and coordinate these processes." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Integrated software systems that help manage and coordinate these processes.</span>
                      </div>
                    </label>
                    <label class="option-card">
                      <input type="radio" name="opsSupplyChainManagement" value="Most processes are automated, with real-time data tracking and minimal manual intervention." onchange="updateProgress()">
                      <div class="option-content">
                        <span class="radio-custom"></span>
                        <span class="option-text">Most processes are automated, with real-time data tracking and minimal manual intervention.</span>
                      </div>
                    </label>
                  </div>

                  <!-- Upload Feature for Sub-Question E -->
                  <div class="upload-wrapper">
                    <div class="upload-header">
                      <span class="upload-title"><i class="fa-solid fa-paperclip"></i> Attach Supporting Evidence (Optional)</span>
                      <span class="upload-hint">PDF, PNG, JPG, XLSX (Max 10MB)</span>
                    </div>
                    <div class="dropzone-box" onclick="triggerFileInput('fileInputE')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputE', 'fileListE')">
                      <i class="fa-solid fa-cloud-arrow-up"></i>
                      <div class="dropzone-text">Drag and drop files here or <span>Browse</span></div>
                      <input type="file" id="fileInputE" name="docsSupplyChainManagement[]" multiple class="file-input-hidden" accept=".pdf,.png,.jpg,.jpeg,.xlsx,.csv" onchange="handleFileSelect(event, 'fileListE')">
                    </div>
                    <div class="file-preview-list" id="fileListE"></div>
                  </div>
                </div>
              </div>

              <!-- General Assessment Overview Supporting Documents -->
              <div class="upload-wrapper" style="margin-top: 24px; border-color: #3b82f6; background-color: #f0f9ff;">
                <div class="upload-header">
                  <span class="upload-title" style="color: #1e40af;"><i class="fa-solid fa-folder-plus"></i> General Supporting Documents / Certificates for Question 3</span>
                  <span class="upload-hint">PDF, DOCX, ZIP, PNG (Max 20MB)</span>
                </div>
                <div class="dropzone-box" onclick="triggerFileInput('fileInputGeneral')" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleFileDrop(event, 'fileInputGeneral', 'fileListGeneral')">
                  <i class="fa-solid fa-file-arrow-up"></i>
                  <div class="dropzone-text">Drag and drop overall files or <span>Browse files</span></div>
                  <input type="file" id="fileInputGeneral" name="generalDocsQ3[]" multiple class="file-input-hidden" accept=".pdf,.docx,.zip,.png,.jpg" onchange="handleFileSelect(event, 'fileListGeneral')">
                </div>
                <div class="file-preview-list" id="fileListGeneral"></div>
              </div>

              <!-- Bottom Actions Bar -->
              <div class="form-actions-bar" style="margin-top: 32px;">
                <button type="button" class="btn btn-secondary" onclick="goToPreviousStep()"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <div style="display: flex; gap: 12px;">
                  <button type="button" class="btn btn-secondary"><i class="fa-solid fa-floppy-disk"></i> Save as Draft</button>
                  <button type="submit" class="btn btn-primary">Next Question <i class="fa-solid fa-arrow-right"></i></button>
                </div>
              </div>

            </div>
          </div>
        </section>
      </form>
    </main>
  </div>

  <!-- Javascript -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function goToPreviousStep() {
      window.location.href = 'company_selfassessment.php';
    }

    function goToNextQuestion() {
      window.location.href = 'company_selfassessment3.php';
    }

    /* Live Progress Bar Calculator */
    function updateProgress() {
      const form = document.getElementById('projectFlowForm');
      const radioGroups = ['opsProductionPlanning', 'opsInventoryManagement', 'opsQualityControl', 'opsPerformanceManagement', 'opsSupplyChainManagement'];
      let answeredCount = 0;

      radioGroups.forEach(groupName => {
        if (form.querySelector(`input[name="${groupName}"]:checked`)) {
          answeredCount++;
        }
      });

      // Calculate percentage based on 5 sub-questions (each worth 20% of Q3 or overall scale)
      const percent = Math.round((answeredCount / radioGroups.length) * 100);
      
      const progressBar = document.getElementById('progressBarFill');
      const progressText = document.getElementById('progressPercentText');
      
      if (progressBar) progressBar.style.width = percent + '%';
      if (progressText) progressText.textContent = percent + '% Completed';
    }

    /* File Upload Logic */
    const uploadedFilesStore = {};

    function triggerFileInput(inputId) {
      document.getElementById(inputId).click();
    }

    function handleDragOver(e) {
      e.preventDefault();
      e.currentTarget.classList.add('drag-over');
    }

    function handleDragLeave(e) {
      e.currentTarget.classList.remove('drag-over');
    }

    function handleFileDrop(e, inputId, listId) {
      e.preventDefault();
      e.currentTarget.classList.remove('drag-over');
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        processFiles(files, listId, inputId);
      }
    }

    function handleFileSelect(e, listId) {
      const files = e.target.files;
      if (files.length > 0) {
        processFiles(files, listId, e.target.id);
      }
    }

    function processFiles(files, listId, inputId) {
      if (!uploadedFilesStore[listId]) {
        uploadedFilesStore[listId] = [];
      }

      Array.from(files).forEach(file => {
        // Prevent exact duplicates
        if (!uploadedFilesStore[listId].some(f => f.name === file.name && f.size === file.size)) {
          uploadedFilesStore[listId].push(file);
        }
      });

      renderFileList(listId);
    }

    function renderFileList(listId) {
      const container = document.getElementById(listId);
      container.innerHTML = '';

      if (!uploadedFilesStore[listId] || uploadedFilesStore[listId].length === 0) {
        return;
      }

      uploadedFilesStore[listId].forEach((file, index) => {
        const item = document.createElement('div');
        item.className = 'file-item';
        
        const sizeKB = (file.size / 1024).toFixed(1);
        const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
        const displaySize = file.size > 1048576 ? `${sizeMB} MB` : `${sizeKB} KB`;

        item.innerHTML = `
          <div class="file-info">
            <i class="fa-solid fa-paperclip"></i>
            <span>${file.name}</span>
            <span class="file-size">(${displaySize})</span>
          </div>
          <button type="button" class="remove-file-btn" onclick="removeFile('${listId}', ${index})">
            <i class="fa-solid fa-xmark"></i>
          </button>
        `;
        container.appendChild(item);
      });
    }

    function removeFile(listId, index) {
      if (uploadedFilesStore[listId]) {
        uploadedFilesStore[listId].splice(index, 1);
        renderFileList(listId);
      }
    }

    /* Handler Reset Utilities */
    function resetNestedFields(names) {
      names.forEach(name => {
        const inputs = document.querySelectorAll(`[name="${name}"]`);
        inputs.forEach(input => {
          input.checked = false;
        });
      });
      updateProgress();
    }
  </script>
</body>
</html>