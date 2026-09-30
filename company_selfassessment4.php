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
    /* Scale Legend Styling */
    .matrix-legend {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 10px;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      padding: 14px 18px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.85rem;
      color: #475569;
    }

    .legend-item {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .legend-badge {
      background-color: #2563eb;
      color: #ffffff;
      font-weight: 700;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      flex-shrink: 0;
    }

    /* Matrix Table Layout */
    .table-responsive {
      width: 100%;
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      background-color: #ffffff;
    }

    .matrix-table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-size: 0.9rem;
    }

    .matrix-table th {
      background-color: #f1f5f9;
      color: #1e293b;
      padding: 12px 16px;
      font-weight: 700;
      border-bottom: 2px solid #cbd5e1;
      white-space: nowrap;
    }

    .matrix-table th.col-rating {
      text-align: center;
      width: 55px;
    }

    /* Row Groups & Collapsible Rows */
    .system-header-row {
      background-color: #f8fafc;
      cursor: pointer;
      border-top: 2px solid #cbd5e1;
      transition: background-color 0.2s ease;
    }

    .system-header-row:hover {
      background-color: #f1f5f9;
    }

    .system-header-row.active-row {
      background-color: #eff6ff;
    }

    .system-header-row td {
      padding: 12px 16px;
    }

    /* Hidden evaluation rows by default */
    .eval-row {
      display: none;
    }

    /* Shown state when checked */
    .eval-row.show-row {
      display: table-row;
      background-color: #ffffff;
    }

    .eval-row td {
      padding: 10px 16px;
      border-bottom: 1px dashed #e2e8f0;
      color: #334155;
    }

    .eval-row.border-bottom td {
      border-bottom: 2px solid #cbd5e1;
    }

    .dim-label {
      font-weight: 600;
      color: #1e293b;
      padding-left: 28px !important;
      white-space: nowrap;
    }

    .radio-cell {
      text-align: center;
    }

    .radio-cell input[type="radio"] {
      width: 18px;
      height: 18px;
      cursor: pointer;
      accent-color: #2563eb;
    }

    .checkbox-card-inline {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
    }

    .checkbox-card-inline input {
      display: none;
    }

    .checkbox-box {
      width: 20px;
      height: 20px;
      border: 2px solid #94a3b8;
      border-radius: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      background: #ffffff;
      transition: all 0.2s ease;
    }

    .checkbox-card-inline input:checked + .checkbox-box {
      background-color: #2563eb;
      border-color: #2563eb;
    }

    .checkbox-card-inline input:checked + .checkbox-box i {
      display: block;
    }

    .checkbox-box i {
      display: none;
      font-size: 0.75rem;
    }

    .system-title {
      font-weight: 700;
      color: #0f172a;
      font-size: 0.95rem;
    }

    .section-instruction {
      font-size: 0.88rem;
      color: #475569;
      margin-top: 8px;
      margin-bottom: 16px;
    }

    /* File Upload Inline Styling */
    .file-input-hidden {
      display: none !important;
    }

    .btn-upload-sm {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background-color: #f1f5f9;
      color: #2563eb;
      border: 1px dashed #2563eb;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-upload-sm:hover {
      background-color: #eff6ff;
      border-style: solid;
    }

    .file-preview-inline-list {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 8px;
    }

    .file-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #f1f5f9;
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

    /* Supporting Documents Dropzone Container */
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
      <form id="projectFlowForm" method="POST" action="company_selfassessment6.php" enctype="multipart/form-data" onsubmit="event.preventDefault(); goToNextQuestion();">
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
              <span class="progress-percentage" id="progressPercentText">40% Completed</span>
            </div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" id="progressBarFill" style="width: 40%;"></div>
            </div>
            <p class="progress-subtext">Each completed question contributes 10% toward total completion (10 Questions Total).</p>
          </div>

          <div class="form-card">
            
            <!-- QUESTION 5 MATRIX (FACILITY ASSETS) -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q5</span>
                <p class="question-title">
                  From the following list of facility assets, choose at least one system that is currently in use that supports the shop floor production/manufacturing tasks, evaluate its maturity level (1 to 5), and attach supporting evidence.
                  <i class="fa-solid fa-circle-info field-help" title="Check a facility asset to reveal its evaluation rating scales and document upload options."></i>
                </p>
              </div>

              <p class="section-instruction">
                <i class="fa-solid fa-circle-check" style="color: #2563eb;"></i> Select at least one facility asset system to display its evaluation levels and upload supporting proof.
              </p>

              <!-- Scale Rating Legend -->
              <div class="matrix-legend">
                <div class="legend-item"><span class="legend-badge">1</span> Manual / Standalone / Basic</div>
                <div class="legend-item"><span class="legend-badge">2</span> Computer-Assisted / Networked</div>
                <div class="legend-item"><span class="legend-badge">3</span> Automated / Integrated / Alerting</div>
                <div class="legend-item"><span class="legend-badge">4</span> Configurable / Real-time / Predictive</div>
                <div class="legend-item"><span class="legend-badge">5</span> Fully Flexible / Unified / Autonomous</div>
              </div>

              <!-- Matrix Table Form Structure -->
              <div class="table-responsive">
                <table class="matrix-table">
                  <thead>
                    <tr>
                      <th style="width: 35%;">Facility Assets</th>
                      <th style="width: 25%;">Evaluation Category</th>
                      <th class="col-rating">1</th>
                      <th class="col-rating">2</th>
                      <th class="col-rating">3</th>
                      <th class="col-rating">4</th>
                      <th class="col-rating">5</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $facilityAssets = [
                      'air_compressor'    => ['title' => 'Air Compressor System', 'icon' => 'fa-wind', 'prefix' => 'ac'],
                      'boiler'            => ['title' => 'Boiler System', 'icon' => 'fa-fire-burner', 'prefix' => 'boiler'],
                      'machine_cooling'   => ['title' => 'Machine Cooling System', 'icon' => 'fa-snowflake', 'prefix' => 'cool'],
                      'hvac'              => ['title' => 'HVAC System', 'icon' => 'fa-fan', 'prefix' => 'hvac'],
                      'lighting'          => ['title' => 'Lighting System', 'icon' => 'fa-lightbulb', 'prefix' => 'light'],
                      'security'          => ['title' => 'Security System', 'icon' => 'fa-shield-halved', 'prefix' => 'sec'],
                      'fire_suppression'  => ['title' => 'Fire Suppression System', 'icon' => 'fa-fire-extinguisher', 'prefix' => 'fire'],
                      'water_mgmt'        => ['title' => 'Water Management System', 'icon' => 'fa-droplet', 'prefix' => 'water'],
                      'power_supply'      => ['title' => 'Power Supply System', 'icon' => 'fa-bolt', 'prefix' => 'pwr'],
                      'waste_mgmt'        => ['title' => 'Waste Management System', 'icon' => 'fa-trash-can', 'prefix' => 'waste'],
                      'backup_gen'        => ['title' => 'Backup Generators', 'icon' => 'fa-charging-station', 'prefix' => 'gen'],
                      'lifting_hoisting'  => ['title' => 'Lifting / Hoisting Devices and System', 'icon' => 'fa-elevator', 'prefix' => 'hoist'],
                      'material_transfer' => ['title' => 'Material Transfer / Handling System', 'icon' => 'fa-dolly', 'prefix' => 'mats'],
                      'bms'               => ['title' => 'Facility Monitoring Systems / Building Management System (BMS)', 'icon' => 'fa-building-user', 'prefix' => 'bms'],
                    ];

                    $dimensions = [
                      'automation'   => ['label' => 'Level of Automation', 'icon' => 'fa-robot'],
                      'connectivity' => ['label' => 'Level of Connectivity', 'icon' => 'fa-network-wired'],
                      'intelligence' => ['label' => 'Level of Intelligence', 'icon' => 'fa-brain']
                    ];

                    foreach ($facilityAssets as $id =>$asset):
                    ?>
                      <!-- Asset Main Header Row -->
                      <tr class="system-header-row" id="header-<?= $id ?>" onclick="toggleSystemRow('<?= $id ?>')">
                        <td colspan="7">
                          <label class="checkbox-card-inline" onclick="event.stopPropagation()">
                            <input type="checkbox" name="facility_assets[]" value="<?= $asset['title'] ?>" id="chk-<?= $id ?>" onchange="handleSystemRowToggle('<?= $id ?>')">
                            <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                            <span class="system-title"><i class="fa-solid <?= $asset['icon'] ?>"></i> <?= $asset['title'] ?></span>
                          </label>
                        </td>
                      </tr>

                      <!-- Sub-rows (Evaluation Dimensions) -->
                      <?php 
                      foreach ($dimensions as$dimKey => $dim):$inputName = $asset['prefix'] . '_' .$dimKey;
                      ?>
                        <tr class="eval-row row-<?= $id ?>">
                          <td class="dim-label"><i class="fa-solid <?= $dim['icon'] ?>"></i> <?= $dim['label'] ?></td>
                          <td>Maturity Level</td>
                          <?php for ($v = 1; $v <= 5; $v++): ?>
                            <td class="radio-cell">
                              <input type="radio" name="<?= $inputName ?>" value="<?= $v ?>" onchange="updateMatrixProgress()">
                            </td>
                          <?php endfor; ?>
                        </tr>
                      <?php endforeach; ?>

                      <!-- Asset Evidence File Upload Sub-row -->
                      <tr class="eval-row row-<?= $id ?> border-bottom">
                        <td class="dim-label"><i class="fa-solid fa-paperclip"></i> Asset Proof</td>
                        <td colspan="6">
                          <div class="file-upload-inline">
                            <input type="file" name="evidence_<?= $id ?>[]" id="file-<?= $id ?>" class="file-input-hidden" multiple accept=".pdf,.png,.jpg,.jpeg,.doc,.docx,.zip" onchange="handleSystemFileUpload(this, '<?= $id ?>')">
                            <label for="file-<?= $id ?>" class="btn-upload-sm">
                              <i class="fa-solid fa-cloud-arrow-up"></i> Upload Spec Sheet / Maintenance Log / Proof
                            </label>
                            <span style="font-size: 0.75rem; color: #64748b; margin-left: 8px;">(PDF, PNG, JPG, DOCX - Max 5MB)</span>
                            <div id="file-list-<?= $id ?>" class="file-preview-inline-list"></div>
                          </div>
                        </td>
                      </tr>

                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>

              <!-- General Supporting Documents Dropzone Section -->
              <div class="upload-section-card">
                <h3><i class="fa-solid fa-folder-open"></i> Additional Facility Layouts & Equipment Certificates</h3>
                <p>Upload shop floor layouts, single-line electrical diagrams (SLD), machine maintenance logs, or ISO facility certificates to back up your assessment.</p>

                <div class="dropzone-box" id="generalDropzone" onclick="document.getElementById('generalFileInput').click()">
                  <i class="fa-solid fa-cloud-arrow-up dropzone-icon"></i>
                  <div class="dropzone-text">Click or drag & drop files here to upload</div>
                  <div class="dropzone-hint">Supports PDF, PNG, JPG, JPEG, DOCX, ZIP (Up to 10MB each)</div>
                  <input type="file" id="generalFileInput" name="general_documents[]" class="file-input-hidden" multiple accept=".pdf,.png,.jpg,.jpeg,.doc,.docx,.zip" onchange="handleGeneralFileUpload(this.files)">
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
    const systemFileStores = {};
    let generalFilesStore = [];

    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function goToPreviousStep() {
      window.location.href = 'company_selfassessment3.php';
    }

    function goToNextQuestion() {
      window.location.href = 'company_selfassessment5.php';
    }

    /* Facility Asset Row Matrix Toggle Handler (Show/Hide) */
    function handleSystemRowToggle(systemId) {
      const chk = document.getElementById(`chk-${systemId}`);
      const headerRow = document.getElementById(`header-${systemId}`);
      const subRows = document.querySelectorAll(`.row-${systemId}`);

      if (chk.checked) {
        headerRow.classList.add('active-row');
        subRows.forEach(row => row.classList.add('show-row'));
      } else {
        headerRow.classList.remove('active-row');
        subRows.forEach(row => {
          row.classList.remove('show-row');
          // Reset checked radio inputs when unchecked
          const radios = row.querySelectorAll('input[type="radio"]');
          radios.forEach(radio => radio.checked = false);
        });
        // Clear system files
        delete systemFileStores[systemId];
        renderSystemFiles(systemId);
      }
      updateMatrixProgress();
    }

    function toggleSystemRow(systemId) {
      const chk = document.getElementById(`chk-${systemId}`);
      chk.checked = !chk.checked;
      handleSystemRowToggle(systemId);
    }

    /* Handle Inline File Upload for Specific Facility Assets */
    function handleSystemFileUpload(input, systemId) {
      if (!systemFileStores[systemId]) {
        systemFileStores[systemId] = [];
      }

      Array.from(input.files).forEach(file => {
        if (file.size > 5 * 1024 * 1024) {
          alert(`File "${file.name}" exceeds the 5MB limit.`);
          return;
        }
        systemFileStores[systemId].push(file);
      });

      renderSystemFiles(systemId);
    }

    function renderSystemFiles(systemId) {
      const container = document.getElementById(`file-list-${systemId}`);
      if (!container) return;

      container.innerHTML = '';
      const files = systemFileStores[systemId] || [];

      files.forEach((file, index) => {
        const chip = document.createElement('div');
        chip.className = 'file-chip';
        chip.innerHTML = `
          <i class="fa-solid fa-file-lines"></i>
          <span>${file.name}</span>
          <i class="fa-solid fa-xmark remove-file" title="Remove" onclick="removeSystemFile('${systemId}', ${index})"></i>
        `;
        container.appendChild(chip);
      });
    }

    function removeSystemFile(systemId, index) {
      if (systemFileStores[systemId]) {
        systemFileStores[systemId].splice(index, 1);
        renderSystemFiles(systemId);
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

    /* Setup Drag & Drop Listeners */
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

    /* Dynamic Matrix Progress Calculation for Question 5 */
    function updateMatrixProgress() {
      const checkedSystems = document.querySelectorAll('input[name="facility_assets[]"]:checked');
      const baseProgress = 40; // Base progress for completing Q1-Q4
      let completedEvaluations = 0;

      checkedSystems.forEach(sysCheckbox => {
        const sysId = sysCheckbox.id.replace('chk-', '');
        const rows = document.querySelectorAll(`.row-${sysId}`);
        
        rows.forEach(row => {
          const selectedRadio = row.querySelector('input[type="radio"]:checked');
          if (selectedRadio) {
            completedEvaluations++;
          }
        });
      });

      let q5Progress = 0;
      if (checkedSystems.length > 0) {
        const totalRequiredRatings = checkedSystems.length * 3;
        q5Progress = Math.round((completedEvaluations / totalRequiredRatings) * 10);
      }

      const totalCalculated = Math.min(100, baseProgress + q5Progress);
      
      const progressBar = document.getElementById('progressBarFill');
      const progressText = document.getElementById('progressPercentText');
      
      if (progressBar) progressBar.style.width = totalCalculated + '%';
      if (progressText) progressText.textContent = totalCalculated + '% Completed';
    }
  </script>
</body>
</html>
