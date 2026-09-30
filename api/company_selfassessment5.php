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

    /* Radio & Checkbox Card Options */
    .options-group {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-top: 12px;
    }

    .radio-card-option {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      padding: 14px 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .radio-card-option:hover {
      background: #f1f5f9;
      border-color: #94a3b8;
    }

    .radio-card-option input[type="radio"] {
      margin-top: 3px;
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
      cursor: pointer;
    }

    .option-label {
      font-size: 0.92rem;
      font-weight: 600;
      color: #334155;
    }

    /* Sub-options / Nested Checkboxes */
    .sub-options-container {
      margin-left: 32px;
      margin-top: 10px;
      display: none;
      flex-direction: column;
      gap: 10px;
      padding-left: 16px;
      border-left: 2px dashed #bfdbfe;
    }

    .sub-options-container.active {
      display: flex;
    }

    .checkbox-card-inline {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
      font-size: 0.9rem;
      color: #475569;
    }

    .checkbox-card-inline input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: #2563eb;
      cursor: pointer;
    }

    /* Pyramid Diagram Layout */
    .pyramid-wrapper {
      margin: 20px 0;
      text-align: center;
      background: #f8fafc;
      padding: 20px;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
    }

    .pyramid-img {
      max-width: 100%;
      height: auto;
      max-height: 380px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .pyramid-caption {
      margin-top: 10px;
      font-size: 0.85rem;
      color: #64748b;
      font-weight: 600;
    }

    .automation-checklist {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 12px;
      margin-top: 16px;
    }

    .checklist-box {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      padding: 12px 16px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .checklist-box:hover {
      border-color: #2563eb;
      background-color: #eff6ff;
    }

    .checklist-box input[type="checkbox"] {
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
      cursor: pointer;
    }

    .field-help {
      color: #94a3b8;
      cursor: pointer;
      margin-left: 4px;
    }

    /* Inline Evidence File Upload Elements */
    .file-input-hidden {
      display: none !important;
    }

    .inline-upload-wrapper {
      margin-top: 12px;
      padding: 12px 16px;
      background: #f1f5f9;
      border: 1px dashed #94a3b8;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .btn-upload-sm {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background-color: #ffffff;
      color: #2563eb;
      border: 1px solid #2563eb;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      width: fit-content;
    }

    .btn-upload-sm:hover {
      background-color: #eff6ff;
    }

    .file-preview-inline-list {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .file-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #ffffff;
      border: 1px solid #cbd5e1;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.78rem;
      color: #334155;
    }

    .file-chip i.remove-file {
      cursor: pointer;
      color: #ef4444;
      font-size: 0.85rem;
      transition: color 0.2s ease;
    }

    .file-chip i.remove-file:hover {
      color: #dc2626;
    }

    /* Per-Automation Level Evidence Sub-block */
    .level-evidence-card {
      margin-top: 8px;
      display: none;
      padding: 10px 12px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 6px;
    }

    .level-evidence-card.active {
      display: block;
    }

    /* General Drag and Drop Dropzone */
    .upload-section-card {
      margin-top: 24px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 20px;
    }

    .upload-section-card h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .upload-section-card p {
      font-size: 0.85rem;
      color: #64748b;
      margin-bottom: 16px;
    }

    .dropzone-box {
      border: 2px dashed #93c5fd;
      background: #f8fafc;
      border-radius: 8px;
      padding: 24px;
      text-align: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .dropzone-box:hover, .dropzone-box.dragover {
      background: #eff6ff;
      border-color: #2563eb;
    }

    .dropzone-icon {
      font-size: 2.2rem;
      color: #2563eb;
      margin-bottom: 8px;
    }

    .dropzone-text {
      font-size: 0.9rem;
      font-weight: 600;
      color: #1e293b;
    }

    .dropzone-hint {
      font-size: 0.78rem;
      color: #64748b;
      margin-top: 4px;
    }

    .uploaded-files-container {
      margin-top: 14px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 10px;
    }

    .uploaded-file-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      padding: 10px 12px;
      border-radius: 6px;
    }

    .uploaded-file-info {
      display: flex;
      align-items: center;
      gap: 10px;
      overflow: hidden;
    }

    .uploaded-file-info i {
      font-size: 1.2rem;
      color: #2563eb;
      flex-shrink: 0;
    }

    .uploaded-file-details {
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .file-name {
      font-size: 0.82rem;
      font-weight: 600;
      color: #1e293b;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .file-size {
      font-size: 0.72rem;
      color: #64748b;
    }

    .btn-delete-file {
      background: transparent;
      border: none;
      color: #94a3b8;
      cursor: pointer;
      padding: 4px;
      font-size: 0.9rem;
      transition: color 0.2s ease;
    }

    .btn-delete-file:hover {
      color: #ef4444;
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
      <form id="projectFlowForm" method="POST" action="company_selfassessment7.php" enctype="multipart/form-data" onsubmit="event.preventDefault(); goToNextQuestion();">
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
              <span class="progress-percentage" id="progressPercentText">60% Completed</span>
            </div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" id="progressBarFill" style="width: 60%;"></div>
            </div>
            <p class="progress-subtext">Each completed question contributes 10% toward total completion (10 Questions Total).</p>
          </div>

          <div class="form-card">
            
            <!-- QUESTION 6 -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q6</span>
                <p class="question-title">
                  How is your production/manufacturing process performed?
                  <i class="fa-solid fa-circle-info field-help" title="Select your primary manufacturing process setup and upload supporting machinery documentation."></i>
                </p>
              </div>

              <div class="options-group">
                <!-- Option 1 -->
                <label class="radio-card-option">
                  <input type="radio" name="process_performed" value="manual" onchange="handleProcessChange(this.value)">
                  <span class="option-label">Performed manually <i class="fa-solid fa-circle-info field-help"></i></span>
                </label>

                <!-- Option 2 -->
                <label class="radio-card-option">
                  <input type="radio" name="process_performed" value="semi_automatic" onchange="handleProcessChange(this.value)">
                  <span class="option-label">Using dedicated semi-automatic machines <i class="fa-solid fa-circle-info field-help"></i></span>
                </label>

                <!-- Option 3 -->
                <div>
                  <label class="radio-card-option">
                    <input type="radio" name="process_performed" value="automatic" onchange="handleProcessChange(this.value)">
                    <span class="option-label">Using dedicated automatic machines <i class="fa-solid fa-circle-info field-help"></i></span>
                  </label>

                  <!-- Nested Sub-options for Option 3 -->
                  <div class="sub-options-container" id="autoSubOptions">
                    <label class="checkbox-card-inline">
                      <input type="checkbox" name="auto_features[]" value="Pre-Programmed machine setting" onchange="updateProgress()">
                      <span>Pre-Programmed machine setting.</span>
                    </label>
                    <label class="checkbox-card-inline">
                      <input type="checkbox" name="auto_features[]" value="Machines are capable of reconfiguration" onchange="updateProgress()">
                      <span>Machines are capable of reconfiguration.</span>
                    </label>
                    <label class="checkbox-card-inline">
                      <input type="checkbox" name="auto_features[]" value="Mould/tools are easy for changeover" onchange="updateProgress()">
                      <span>Mould/tools are easy for changeover (e.g. less time consumption, dedicated tools for changeovers, less dependent on humans, etc.)</span>
                    </label>
                    <label class="checkbox-card-inline">
                      <input type="checkbox" name="auto_features[]" value="Autonomous decision making" onchange="updateProgress()">
                      <span>Autonomous decision making.</span>
                    </label>
                    <label class="checkbox-card-inline">
                      <input type="checkbox" name="auto_features[]" value="Self-adaptive" onchange="updateProgress()">
                      <span>Self-adaptive.</span>
                    </label>
                  </div>
                </div>

                <!-- Process Evidence Upload Box -->
                <div class="inline-upload-wrapper">
                  <span style="font-size: 0.85rem; font-weight: 600; color: #1e293b;">
                    <i class="fa-solid fa-paperclip"></i> Supporting Process Proof / Machinery Specifications (Optional)
                  </span>
                  <input type="file" name="process_evidence[]" id="processEvidenceInput" class="file-input-hidden" multiple accept=".pdf,.png,.jpg,.jpeg,.docx" onchange="handleProcessFileUpload(this)">
                  <label for="processEvidenceInput" class="btn-upload-sm">
                    <i class="fa-solid fa-cloud-arrow-up"></i> Upload Machinery Spec / Process Flowchart
                  </label>
                  <div id="processFileList" class="file-preview-inline-list"></div>
                </div>
              </div>
            </div>

            <!-- QUESTION 7 -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q7</span>
                <p class="question-title">
                  Choose the level of automation currently implemented in your factory (refer to Figure 1 below)
                </p>
              </div>

              <!-- Pyramid Diagram -->
              <div class="pyramid-wrapper">
                <img src="automation_pyramid.png" alt="Level of Automation Pyramid" class="pyramid-img" onerror="this.src='https://via.placeholder.com/600x320?text=Level+of+Automation+Pyramid';" />
                <div class="pyramid-caption">Figure 1: Level of Automation</div>
              </div>

              <!-- Checkboxes & Per-Level Uploads for Automation Levels -->
              <?php
              $automationLevels = [
                'sensors' => ['title' => 'Sensors and Signals', 'hint' => 'e.g., Sensor datasheets, wiring schematics, pinout diagrams'],
                'plc'     => ['title' => 'PLC', 'hint' => 'e.g., PLC ladder logic, hardware specs, I/O mapping list'],
                'scada'   => ['title' => 'SCADA/HMI', 'hint' => 'e.g., HMI screenshots, SCADA architecture diagrams'],
                'mes'     => ['title' => 'MES', 'hint' => 'e.g., MES production dashboard, work order tracking screens'],
                'erp'     => ['title' => 'ERP', 'hint' => 'e.g., ERP module screenshots (SAP, Oracle, Odoo), integration flowcharts']
              ];
              ?>

              <div class="automation-checklist">
                <?php foreach ($automationLevels as $key =>$lvl): ?>
                  <div>
                    <label class="checklist-box">
                      <input type="checkbox" name="automation_levels[]" value="<?= $lvl['title'] ?>" id="chk-auto-<?= $key ?>" onchange="toggleLevelEvidence('<?= $key ?>')">
                      <span class="option-label"><?= $lvl['title'] ?></span>
                    </label>

                    <!-- Hidden Evidence Upload Sub-card -->
                    <div class="level-evidence-card" id="card-evidence-<?= $key ?>">
                      <div style="font-size: 0.78rem; color: #475569; margin-bottom: 6px;">
                        <i class="fa-solid fa-circle-info"></i> Attach proof for <?= $lvl['title'] ?> (<?=$lvl['hint'] ?>)
                      </div>
                      <input type="file" name="evidence_<?= $key ?>[]" id="file-auto-<?= $key ?>" class="file-input-hidden" multiple accept=".pdf,.png,.jpg,.jpeg,.docx,.zip" onchange="handleLevelFileUpload(this, '<?= $key ?>')">
                      <label for="file-auto-<?= $key ?>" class="btn-upload-sm">
                        <i class="fa-solid fa-paperclip"></i> Upload Evidence
                      </label>
                      <div id="file-list-<?= $key ?>" class="file-preview-inline-list" style="margin-top: 6px;"></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <!-- General Supporting Automation Dropzone -->
              <div class="upload-section-card">
                <h3><i class="fa-solid fa-folder-open"></i> Overall Automation & Network Architecture Documents</h3>
                <p>Upload system integration blueprints, network topology diagrams, or vendor technical proposals.</p>

                <div class="dropzone-box" id="generalDropzone" onclick="document.getElementById('generalFileInput').click()">
                  <i class="fa-solid fa-cloud-arrow-up dropzone-icon"></i>
                  <div class="dropzone-text">Click or drag & drop files here to upload</div>
                  <div class="dropzone-hint">Supports PDF, PNG, JPG, JPEG, DOCX, ZIP (Up to 10MB each)</div>
                  <input type="file" id="generalFileInput" name="general_automation_docs[]" class="file-input-hidden" multiple accept=".pdf,.png,.jpg,.jpeg,.doc,.docx,.zip" onchange="handleGeneralFileUpload(this.files)">
                </div>

                <div class="uploaded-files-container" id="generalFilesList"></div>
              </div>

            </div>

          </div>

          <!-- Bottom Actions Bar -->
          <div class="form-actions-bar">
            <button type="button" class="btn btn-secondary" onclick="goToPreviousStep()"><i class="fa-solid fa-arrow-left"></i> Back</button>
            <div style="display: flex; gap: 12px;">
              <button type="button" class="btn btn-secondary"><i class="fa-solid fa-floppy-disk"></i> Save as Draft</button>
              <button type="submit" class="btn btn-primary">Next Question <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </section>
      </form>

    </main>
  </div>

  <!-- JavaScript Handlers -->
  <script>
    let processFilesStore = [];
    const levelFileStores = {};
    let generalFilesStore = [];

    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function goToPreviousStep() {
      window.location.href = 'company_selfassessment4.php';
    }

    function goToNextQuestion() {
      window.location.href = 'company_selfassessment6.php';
    }

    /* Handler for Question 6 Nested Options */
    function handleProcessChange(value) {
      const autoSubOptions = document.getElementById('autoSubOptions');
      if (value === 'automatic') {
        autoSubOptions.classList.add('active');
      } else {
        autoSubOptions.classList.remove('active');
        const checkboxes = autoSubOptions.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(chk => chk.checked = false);
      }
      updateProgress();
    }

    /* Q6 Process Evidence File Upload Handler */
    function handleProcessFileUpload(input) {
      Array.from(input.files).forEach(file => {
        if (file.size > 10 * 1024 * 1024) {
          alert(`File "${file.name}" exceeds the 10MB limit.`);
          return;
        }
        processFilesStore.push(file);
      });
      renderProcessFiles();
    }

    function renderProcessFiles() {
      const container = document.getElementById('processFileList');
      if (!container) return;
      container.innerHTML = '';

      processFilesStore.forEach((file, index) => {
        const chip = document.createElement('div');
        chip.className = 'file-chip';
        chip.innerHTML = `
          <i class="fa-solid fa-file-lines"></i>
          <span>${file.name}</span>
          <i class="fa-solid fa-xmark remove-file" title="Remove" onclick="removeProcessFile(${index})"></i>
        `;
        container.appendChild(chip);
      });
    }

    function removeProcessFile(index) {
      processFilesStore.splice(index, 1);
      renderProcessFiles();
    }

    /* Q7 Per-Level Toggle & Evidence Upload Handlers */
    function toggleLevelEvidence(key) {
      const chk = document.getElementById(`chk-auto-${key}`);
      const card = document.getElementById(`card-evidence-${key}`);
      
      if (chk.checked) {
        card.classList.add('active');
      } else {
        card.classList.remove('active');
        delete levelFileStores[key];
        renderLevelFiles(key);
      }
      updateProgress();
    }

    function handleLevelFileUpload(input, key) {
      if (!levelFileStores[key]) levelFileStores[key] = [];

      Array.from(input.files).forEach(file => {
        if (file.size > 10 * 1024 * 1024) {
          alert(`File "${file.name}" exceeds the 10MB limit.`);
          return;
        }
        levelFileStores[key].push(file);
      });

      renderLevelFiles(key);
    }

    function renderLevelFiles(key) {
      const container = document.getElementById(`file-list-${key}`);
      if (!container) return;

      container.innerHTML = '';
      const files = levelFileStores[key] || [];

      files.forEach((file, index) => {
        const chip = document.createElement('div');
        chip.className = 'file-chip';
        chip.innerHTML = `
          <i class="fa-solid fa-file-lines"></i>
          <span>${file.name}</span>
          <i class="fa-solid fa-xmark remove-file" title="Remove" onclick="removeLevelFile('${key}', ${index})"></i>
        `;
        container.appendChild(chip);
      });
    }

    function removeLevelFile(key, index) {
      if (levelFileStores[key]) {
        levelFileStores[key].splice(index, 1);
        renderLevelFiles(key);
      }
    }

    /* General Drag & Drop File Upload Handler */
    function handleGeneralFileUpload(files) {
      Array.from(files).forEach(file => {
        if (file.size > 10 * 1024 * 1024) {
          alert(`File "${file.name}" exceeds the 10MB limit.`);
          return;
        }
        generalFilesStore.push(file);
      });
      renderGeneralFiles();
    }

    function renderGeneralFiles() {
      const container = document.getElementById('generalFilesList');
      if (!container) return;

      container.innerHTML = '';
      generalFilesStore.forEach((file, index) => {
        const card = document.createElement('div');
        card.className = 'uploaded-file-card';
        card.innerHTML = `
          <div class="uploaded-file-info">
            <i class="${getFileIconClass(file.name)}"></i>
            <div class="uploaded-file-details">
              <span class="file-name">${file.name}</span>
              <span class="file-size">${(file.size / (1024 * 1024)).toFixed(2)} MB</span>
            </div>
          </div>
          <button type="button" class="btn-delete-file" onclick="removeGeneralFile(${index})" title="Delete File">
            <i class="fa-solid fa-trash-can"></i>
          </button>
        `;
        container.appendChild(card);
      });
    }

    function removeGeneralFile(index) {
      generalFilesStore.splice(index, 1);
      renderGeneralFiles();
    }

    function getFileIconClass(filename) {
      const ext = filename.split('.').pop().toLowerCase();
      switch (ext) {
        case 'pdf': return 'fa-solid fa-file-pdf';
        case 'png':
        case 'jpg':
        case 'jpeg': return 'fa-solid fa-file-image';
        case 'doc':
        case 'docx': return 'fa-solid fa-file-word';
        case 'zip': return 'fa-solid fa-file-zipper';
        default: return 'fa-solid fa-file';
      }
    }

    /* Setup Dropzone Drag & Drop Listeners */
    const dropzone = document.getElementById('generalDropzone');
    if (dropzone) {
      ['dragenter', 'dragover'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
          e.preventDefault();
          e.stopPropagation();
          dropzone.classList.add('dragover');
        }, false);
      });

      ['dragleave', 'drop'].forEach(eventName => {
        dropzone.addEventListener(eventName, (e) => {
          e.preventDefault();
          e.stopPropagation();
          dropzone.classList.remove('dragover');
        }, false);
      });

      dropzone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        if (dt && dt.files.length) {
          handleGeneralFileUpload(dt.files);
        }
      });
    }

    /* Dynamic Assessment Progress Calculation */
    function updateProgress() {
      const baseProgress = 50; // Progress through Q1-Q5
      let q6Score = 0;
      let q7Score = 0;

      const q6Selected = document.querySelector('input[name="process_performed"]:checked');
      if (q6Selected) q6Score = 10;

      const q7Checked = document.querySelectorAll('input[name="automation_levels[]"]:checked');
      if (q7Checked.length > 0) q7Score = 10;

      const totalCalculated = baseProgress + q6Score + q7Score;
      
      const progressBar = document.getElementById('progressBarFill');
      const progressText = document.getElementById('progressPercentText');
      
      if (progressBar) progressBar.style.width = totalCalculated + '%';
      if (progressText) progressText.textContent = totalCalculated + '% Completed';
    }
  </script>
</body>
</html>
