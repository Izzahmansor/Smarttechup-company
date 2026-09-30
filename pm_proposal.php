<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Technical Proposal & RFP - Full Step 2 Wizard</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="companyregistration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />

  <style>
    /* Wizard & Dynamic Progress Bar */
    .proposal-progress-card {
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 24px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .progress-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }

    .progress-header h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #1f2937;
      margin: 0;
    }

    .progress-percentage {
      font-weight: 700;
      color: #2563eb;
      font-size: 0.95rem;
    }

    .progress-track {
      width: 100%;
      height: 10px;
      background-color: #e5e7eb;
      border-radius: 999px;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .progress-fill {
      height: 100%;
      width: 11.11%;
      background: linear-gradient(90deg, #2563eb, #3b82f6);
      border-radius: 999px;
      transition: width 0.4s ease-in-out;
    }

    /* Scrollable Tabs for Sections A - I */
    .wizard-steps-tabs {
      display: flex;
      gap: 10px;
      overflow-x: auto;
      padding-top: 15px;
      padding-bottom: 5px;
      border-top: 1px solid #f3f4f6;
    }

    .wizard-steps-tabs::-webkit-scrollbar {
      height: 6px;
    }

    .wizard-steps-tabs::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }

    .wizard-tab {
      flex: 0 0 auto;
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;
      border-radius: 8px;
      background: #f9fafb;
      border: 1px solid #e5e7eb;
      color: #6b7280;
      font-size: 0.825rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      white-space: nowrap;
    }

    .wizard-tab.active {
      background: #eff6ff;
      border-color: #3b82f6;
      color: #1d4ed8;
    }

    .wizard-tab.completed {
      background: #f0fdf4;
      border-color: #86efac;
      color: #15803d;
    }

    .tab-badge {
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: #e5e7eb;
      color: #4b5563;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
    }

    .wizard-tab.active .tab-badge {
      background: #2563eb;
      color: #ffffff;
    }

    .wizard-tab.completed .tab-badge {
      background: #16a34a;
      color: #ffffff;
    }

    .section-page {
      display: none;
    }

    .section-page.active-page {
      display: block;
    }

    /* Table Styling */
    .costing-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .costing-table th, .costing-table td {
      border: 1px solid #d1d5db;
      padding: 10px;
      text-align: left;
    }

    .costing-table th {
      background-color: #f3f4f6;
      font-weight: 700;
      color: #1f2937;
    }

    .category-header-row td {
      background-color: #f8fafc;
      font-weight: 700;
      color: #1e293b;
      border-top: 2px solid #cbd5e1;
    }

    .subtotal-row td {
      background-color: #f1f5f9;
      font-weight: 700;
      text-align: right;
    }

    .summary-highlight td {
      background-color: #dcfce7;
      font-weight: 800;
      color: #166534;
    }

    .table-input {
      width: 100%;
      padding: 6px 8px;
      border: 1px solid #cbd5e1;
      border-radius: 4px;
      font-size: 0.875rem;
      box-sizing: border-box;
    }

    .btn-add-row {
      background-color: #eff6ff;
      color: #2563eb;
      border: 1px dashed #2563eb;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 600;
      font-size: 0.8rem;
      margin-top: 8px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .btn-remove-row {
      background-color: #fef2f2;
      color: #dc2626;
      border: 1px solid #fca5a5;
      padding: 4px 8px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.75rem;
    }

    .text-right { text-align: right; }
    .text-center { text-align: center; }

    .wizard-nav-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 25px;
      padding-top: 20px;
      border-top: 1px solid #e5e7eb;
    }

    .checkbox-group {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-top: 12px;
    }

    .checkbox-group input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-top: 2px;
    }

    #specificationsTable {
      table-layout: fixed;
      width: 100%;
    }

    #specificationsTable td textarea.table-input {
      width: 100%;
      box-sizing: border-box;
      resize: vertical;
    }
  </style>
</head>
<body>

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
    
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Welcome Back,</div>
        <div class="sidebar-user-email">stuuser03@yopmail.com</div>
        <span class="sidebar-user-badge"><i class="fa-solid fa-shield-halved"></i> Owner</span>
      </div>

      <div class="sidebar-menu">
        <div class="accordion-item">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Dashboard</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="#" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> Loan Status</a>
            <a href="#" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> NDA Agreement</a>
          </div>
        </div>

        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-diagram-project"></i> 02 Project Flow</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="project_application.php" class="nav-subitem">Project Application</a>
            <a href="technical_proposal_rfp.php" class="nav-subitem active">Technical Proposal & RFP</a>
            <a href="#" class="nav-subitem">CI Selection</a>
            <a href="#" class="nav-subitem">Project Implementation</a>
            <a href="#" class="nav-subitem">Project Completion</a>
            <a href="#" class="nav-subitem">Post Project Audit</a>
          </div>
        </div>
      </div>
    </aside>

    <main class="main-content">
      
      <!-- Flow Tracker -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
          <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 2 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Declaration</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item active">
            <div class="step-number">2</div>
            <div class="step-title">Technical Proposal & RFP</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item"><div class="step-number">3</div><div class="step-title">CI Selection</div></div>
          <div class="step-connector"></div>
          <div class="step-item"><div class="step-number">4</div><div class="step-title">Project Implementation</div></div>
          <div class="step-connector"></div>
          <div class="step-item"><div class="step-number">5</div><div class="step-title">Project Completion</div></div>
          <div class="step-connector"></div>
          <div class="step-item"><div class="step-number">6</div><div class="step-title">Post Project Audit</div></div>
        </div>
      </section>

      <!-- Step 2 Proposal Internal Progress Bar -->
      <div class="proposal-progress-card">
        <div class="progress-header">
          <h3><i class="fa-solid fa-tasks"></i> Step 2 RFP Proposal Progress</h3>
          <span class="progress-percentage" id="progressPercentageText">11% Completed</span>
        </div>
        
        <div class="progress-track">
          <div class="progress-fill" id="progressFillBar"></div>
        </div>

        <div class="wizard-steps-tabs">
          <div class="wizard-tab active" id="tab-1" onclick="goToPage(1)"><span class="tab-badge" id="badge-1">1</span> Sec A: Company Info</div>
          <div class="wizard-tab" id="tab-2" onclick="goToPage(2)"><span class="tab-badge" id="badge-2">2</span> Sec B: Pain Points</div>
          <div class="wizard-tab" id="tab-3" onclick="goToPage(3)"><span class="tab-badge" id="badge-3">3</span> Sec C: Project Info</div>
          <div class="wizard-tab" id="tab-4" onclick="goToPage(4)"><span class="tab-badge" id="badge-4">4</span> Sec D: Scope of Work</div>
          <div class="wizard-tab" id="tab-5" onclick="goToPage(5)"><span class="tab-badge" id="badge-5">5</span> Sec E: Technical Specs</div>
          <div class="wizard-tab" id="tab-6" onclick="goToPage(6)"><span class="tab-badge" id="badge-6">6</span> Sec F: Training Overview</div>
          <div class="wizard-tab" id="tab-7" onclick="goToPage(7)"><span class="tab-badge" id="badge-7">7</span> Sec G: Training Tech Req</div>
          <div class="wizard-tab" id="tab-8" onclick="goToPage(8)"><span class="tab-badge" id="badge-8">8</span> Sec H: Declaration</div>
          <div class="wizard-tab" id="tab-9" onclick="goToPage(9)"><span class="tab-badge" id="badge-9">9</span> Sec I: Vendor Requirements</div>
        </div>
      </div>

      <form id="technicalRfpForm" onsubmit="event.preventDefault(); submitProposal();">
        
        <!-- PAGE 1: SECTION A -->
        <div class="section-page active-page" id="page-1">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-building"></i></div>
              <div>
                <span class="section-number">Section A (Page 1 of 9)</span>
                <h2>Company Information</h2>
                <p>Basic organization profile, factory location, and primary contact details.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title"><i class="fa-solid fa-id-card"></i> <span>Company Profile</span></div>
              <div class="form-row">
                <div class="form-group required"><label>Company Name</label><input type="text" name="companyName" value="Sheng Wang Industries Sdn Bhd" required></div>
                <div class="form-group required"><label>Year of Establishment</label><input type="text" name="yearEstablishment" value="2014" required></div>
              </div>
              <div class="form-group required"><label>Company Address</label><textarea name="companyAddress" rows="2" required>8, Jalan Suria 1, Kampung Sinar Harapan, 81500 Pekan Nanas, Johor Bahru, Johor.</textarea></div>
              <div class="form-group required"><label>Factory Address</label><textarea name="factoryAddress" rows="2" required>Same as above</textarea></div>
              <div class="form-row">
                <div class="form-group required"><label>Sector</label><input type="text" name="sector" value="Manufacturing (Plastic Furniture)" required></div>
                <div class="form-group required"><label>Production Focus</label><input type="text" name="productionFocus" value="Plastic Chairs and Tables" required></div>
              </div>
              <div class="form-row">
                <div class="form-group required"><label>On-site Smart Factory Assessment Rating</label><input type="text" name="osfaRating" value="39% (Newcomer)" required></div>
                <div class="form-group required"><label>Location of Project Implementation</label><input type="text" name="implementationLocation" value="Factory site" required></div>
              </div>

              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-address-book"></i> <span>Contact Information</span></div>
              <div class="form-row">
                <div class="form-group required"><label>Contact Person & Position</label><input type="text" name="contactPerson" value="Low Zhao Jing, Manager" required></div>
                <div class="form-group required"><label>Telephone & Fax</label><input type="text" name="telFax" value="07-6992602" required></div>
              </div>
              <div class="form-row">
                <div class="form-group required"><label>Mobile Number</label><input type="text" name="mobileNumber" value="017-843 5505" required></div>
                <div class="form-group required"><label>Email Address</label><input type="email" name="emailAddress" value="brucelow@shengwangind.com" required></div>
              </div>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
            <button type="button" class="btn btn-next" onclick="goToPage(2)">Next: Section B <i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>

        <!-- PAGE 2: SECTION B -->
        <div class="section-page" id="page-2">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
              <div>
                <span class="section-number">Section B (Page 2 of 9)</span>
                <h2>Pain Points / Problem Statement</h2>
                <p>Identify operational bottlenecks and itemize financial loss projections.</p>
              </div>
            </div>

            <div class="form-card">
              <table class="costing-table" id="painPointsTable">
                <thead>
                  <tr>
                    <th style="width: 50px;">No.</th>
                    <th>Pain Points</th>
                    <th>Current Impact & Financial Loss Projections</th>
                    <th style="width: 160px;">Annual Loss (RM)</th>
                    <th style="width: 50px;">Action</th>
                  </tr>
                </thead>
                <tbody id="painPointsBody">
                  <tr>
                    <td class="text-center row-num">1</td>
                    <td><input type="text" class="table-input" name="painPointText[]" value="Manual production data monitoring and lack of real-time insights" required></td>
                    <td><input type="text" class="table-input" name="painPointImpact[]" value="Estimated RM 280,000 annually due to downtime, inefficiency, and delayed response time" required></td>
                    <td><input type="number" class="table-input pain-loss-val text-right" name="painPointLoss[]" value="280000" oninput="calculatePainPointTotal()" required></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeRow(this, 'painPoint')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td class="text-center row-num">2</td>
                    <td><input type="text" class="table-input" name="painPointText[]" value="Manual inventory and warehouse tracking system" required></td>
                    <td><input type="text" class="table-input" name="painPointImpact[]" value="Estimated RM 240,000 annually due to errors, stock misplacement, and order inaccuracies" required></td>
                    <td><input type="number" class="table-input pain-loss-val text-right" name="painPointLoss[]" value="240000" oninput="calculatePainPointTotal()" required></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeRow(this, 'painPoint')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-right"><strong>Total Losses in RM</strong></td>
                    <td><input type="text" id="totalPainLosses" class="table-input text-right" style="font-weight:700;" value="520,000.00" readonly></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
              <button type="button" class="btn-add-row" onclick="addPainPointRow()"><i class="fa-solid fa-plus"></i> Add Pain Point Row</button>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(1)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <div>
              <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
              <button type="button" class="btn btn-next" onclick="goToPage(3)">Next: Section C <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </div>

        <!-- PAGE 3: SECTION C -->
        <div class="section-page" id="page-3">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-diagram-project"></i></div>
              <div>
                <span class="section-number">Section C (Page 3 of 9)</span>
                <h2>Project Information</h2>
                <p>Project background, scope overview, strategic objectives, structured costing breakdown, and implementation plan.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title"><i class="fa-solid fa-file-lines"></i> <span>Project Background, Overview & Objectives</span></div>
              <div class="form-group required"><label>Project Title</label><input type="text" name="projectTitle" value="Smart Manufacturing Execution System (MES) & Warehouse Integration" required></div>
              <div class="form-group required"><label>Project Background</label><textarea name="projectBackground" rows="2" required>Modernizing plastic injection operations via IoT monitoring and digital WMS.</textarea></div>
              <div class="form-group required"><label>Project Overview</label><textarea name="projectOverview" rows="2" required>Hardware deployment across 18 operational units and mobile app integration.</textarea></div>
              <div class="form-group required"><label>Project Objectives</label><textarea name="projectObjectives" rows="2" required>1. Achieve real-time visibility. 2. Reduce downtime by 80%.</textarea></div>

              <!-- Cost Breakdown Table -->
              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-calculator"></i> <span>Project Costing</span></div>
              <table class="costing-table" id="costingTable">
                <thead>
                  <tr>
                    <th>CATEGORY</th><th>ITEM DESCRIPTION</th><th style="width: 80px;">QTY</th><th style="width: 120px;">UNIT COST</th><th style="width: 130px;">TOTAL (RM)</th><th style="width: 40px;"></th>
                  </tr>
                </thead>
                <tbody id="cat-Hardware">
                  <tr class="category-header-row"><td colspan="5">Hardware</td><td class="text-center"><button type="button" class="btn-add-row" onclick="addCostRow('Hardware')"><i class="fa-solid fa-plus"></i></button></td></tr>
                  <tr>
                    <td>Hardware</td><td><input type="text" class="table-input" value="IoT Sensors" name="hw_desc[]"></td>
                    <td><input type="number" class="table-input text-center cost-qty" value="18" oninput="recalculateCostTable()"></td>
                    <td><input type="number" class="table-input text-right cost-unit" value="9000" oninput="recalculateCostTable()"></td>
                    <td><input type="number" class="table-input text-right cost-row-total" value="162000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeCostRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr class="subtotal-row"><td colspan="4">Hardware Subtotal</td><td><input type="text" id="subtotalHardware" class="table-input text-right" style="font-weight:700;" value="162,000.00" readonly></td><td></td></tr>
                </tbody>
                <tbody id="cat-Software">
                  <tr class="category-header-row"><td colspan="5">Software</td><td class="text-center"><button type="button" class="btn-add-row" onclick="addCostRow('Software')"><i class="fa-solid fa-plus"></i></button></td></tr>
                  <tr>
                    <td>Software</td><td><input type="text" class="table-input" value="MES Software License" name="sw_desc[]"></td>
                    <td><input type="number" class="table-input text-center cost-qty" value="1" oninput="recalculateCostTable()"></td>
                    <td><input type="number" class="table-input text-right cost-unit" value="200000" oninput="recalculateCostTable()"></td>
                    <td><input type="number" class="table-input text-right cost-row-total" value="200000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeCostRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr class="subtotal-row"><td colspan="4">Software Subtotal</td><td><input type="text" id="subtotalSoftware" class="table-input text-right" style="font-weight:700;" value="200,000.00" readonly></td><td></td></tr>
                </tbody>
                <tbody id="cat-Implementation">
                  <tr class="category-header-row"><td colspan="5">Implementation</td><td class="text-center"><button type="button" class="btn-add-row" onclick="addCostRow('Implementation')"><i class="fa-solid fa-plus"></i></button></td></tr>
                  <tr class="subtotal-row"><td colspan="4">Implementation Subtotal</td><td><input type="text" id="subtotalImplementation" class="table-input text-right" style="font-weight:700;" value="0.00" readonly></td><td></td></tr>
                </tbody>
                <tbody id="cat-Training">
                  <tr class="category-header-row"><td colspan="5">Training</td><td class="text-center"><button type="button" class="btn-add-row" onclick="addCostRow('Training')"><i class="fa-solid fa-plus"></i></button></td></tr>
                  <tr class="subtotal-row"><td colspan="4">Training Subtotal</td><td><input type="text" id="subtotalTraining" class="table-input text-right" style="font-weight:700;" value="0.00" readonly></td><td></td></tr>
                </tbody>
                <tfoot>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Project Value (A)</td>
                      <td><input type="text" id="totalProjectValueA" class="table-input text-right" style="font-weight:800;" value="362,000.00" readonly></td>
                      <td></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Grant to be received (B)</td>
                      <td><input type="text" id="totalGrantB" class="table-input text-right" style="font-weight:800;" value="181,000.00" readonly></td>
                      <td></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Company contribution, C = (A-B)</td>
                      <td><input type="text" id="companyContribC" class="table-input text-right" style="font-weight:800;" value="181,000.00" readonly></td>
                      <td></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total OSFA fee payment (Rebate), (D)</td>
                      <td><input type="number" id="totalOsfaRebateD" class="table-input text-right" style="font-weight:800;" value="8000" oninput="recalculateCostTable()"></td>
                      <td></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total balance of the company contribution, E = (C-D)</td>
                      <td><input type="text" id="companyContribE" class="table-input text-right" style="font-weight:800;" value="173,000.00" readonly></td>
                      <td></td>
                  </tr>
                </tfoot>
              </table>

              <!-- Payment Milestone Section -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-list-check"></i> <span>Payment Milestone</span>
              </div>

              <table class="costing-table" id="milestoneTable">
                <thead>
                    <tr>
                    <th style="width: 110px;">MILESTONE</th>
                    <th style="width: 120px;">TIMELINE</th>
                    <th>DESCRIPTION</th>
                    <th style="width: 60px;">%</th>
                    <th style="width: 120px;">GRANT AMOUNT (RM)</th>
                    <th style="width: 130px;">COMPANY CONTRIBUTION (RM)</th>
                    <th style="width: 110px;">REBATE (RM)</th>
                    <th style="width: 130px;">TOTAL PROJECT VALUE (RM)</th>
                    <th style="width: 40px;"></th>
                    </tr>
                </thead>
                <tbody id="milestoneBody">
                    <tr>
                    <td><input type="text" class="table-input" name="ms_name[]" value="Milestone 1"></td>
                    <td><input type="text" class="table-input" name="ms_timeline[]" value="1st month"></td>
                    <td>
                        <textarea class="table-input" name="ms_desc[]" rows="3">M 1.1 : Design & Consultancy&#10;Register project&#10;Issue PO / SST to Crowd Innovator&#10;M 1.2 : Training Programme 1&#10;M 1.3 : Training Programme 2</textarea>
                    </td>
                    <td><input type="number" class="table-input text-center ms-pct" name="ms_pct[]" value="30" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-grant" name="ms_grant[]" value="150000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-contrib" name="ms_contrib[]" value="142000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-rebate" name="ms_rebate[]" value="8000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-total" name="ms_total[]" value="300000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeMilestoneRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td><input type="text" class="table-input" name="ms_name[]" value="Milestone 2"></td>
                    <td><input type="text" class="table-input" name="ms_timeline[]" value="2nd month - 4th month"></td>
                    <td>
                        <textarea class="table-input" name="ms_desc[]" rows="3">M 2.1 : System Development&#10;M 2.2 : Automation Engineering Works&#10;M 2.3 : Factory Acceptance Test</textarea>
                    </td>
                    <td><input type="number" class="table-input text-center ms-pct" name="ms_pct[]" value="30" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-grant" name="ms_grant[]" value="150000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-contrib" name="ms_contrib[]" value="150000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-rebate" name="ms_rebate[]" value="0" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-total" name="ms_total[]" value="300000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeMilestoneRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td><input type="text" class="table-input" name="ms_name[]" value="Milestone 3"></td>
                    <td><input type="text" class="table-input" name="ms_timeline[]" value="5th month - 7th month"></td>
                    <td>
                        <textarea class="table-input" name="ms_desc[]" rows="3">M 3.1 : Delivery&#10;M 3.2 : Installation Testing & Commissioning&#10;M 3.3 : User Acceptance Test</textarea>
                    </td>
                    <td><input type="number" class="table-input text-center ms-pct" name="ms_pct[]" value="35" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-grant" name="ms_grant[]" value="175000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-contrib" name="ms_contrib[]" value="175000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-rebate" name="ms_rebate[]" value="0" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-total" name="ms_total[]" value="350000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeMilestoneRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td><input type="text" class="table-input" name="ms_name[]" value="Milestone 4"></td>
                    <td><input type="text" class="table-input" name="ms_timeline[]" value="8th month"></td>
                    <td>
                        <textarea class="table-input" name="ms_desc[]" rows="2">M 4.1 : User Training, Final Report & Handover&#10;Report preparation</textarea>
                    </td>
                    <td><input type="number" class="table-input text-center ms-pct" name="ms_pct[]" value="5" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-grant" name="ms_grant[]" value="25000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-contrib" name="ms_contrib[]" value="25000" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-rebate" name="ms_rebate[]" value="0" oninput="recalculateMilestones()"></td>
                    <td><input type="number" class="table-input text-right ms-total" name="ms_total[]" value="50000" readonly></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeMilestoneRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="summary-highlight">
                    <td colspan="3" class="text-right"><strong>Grand Amount (RM)</strong></td>
                    <td><input type="text" id="grandMilestonePct" class="table-input text-center" style="font-weight:800;" value="100%" readonly></td>
                    <td><input type="text" id="grandMilestoneGrant" class="table-input text-right" style="font-weight:800;" value="500,000.00" readonly></td>
                    <td><input type="text" id="grandMilestoneContrib" class="table-input text-right" style="font-weight:800;" value="492,000.00" readonly></td>
                    <td><input type="text" id="grandMilestoneRebate" class="table-input text-right" style="font-weight:800;" value="8,000.00" readonly></td>
                    <td><input type="text" id="grandMilestoneTotal" class="table-input text-right" style="font-weight:800;" value="1,000,000.00" readonly></td>
                    <td></td>
                    </tr>
                </tfoot>
              </table>
              <button type="button" class="btn-add-row" onclick="addMilestoneRow()"><i class="fa-solid fa-plus"></i> Add Milestone Row</button>

              <!-- Implementation Phases Table -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-bars-staggered"></i> <span>Implementation Phases</span>
              </div>

              <table class="costing-table" id="implPhasesTable">
                <thead>
                  <tr>
                    <th style="width: 80px;" class="text-center">PHASE</th>
                    <th>DESCRIPTION</th>
                    <th style="width: 150px;">DURATION</th>
                    <th style="width: 40px;"></th>
                  </tr>
                </thead>
                <tbody id="implPhasesBody">
                  <tr>
                    <td class="text-center phase-num">1</td>
                    <td><textarea class="table-input" name="phase_desc[]" rows="2">Planning & Vendor Engagement: Define technical requirements, finalise vendors, confirm implementation roadmap, and baseline KPIs.</textarea></td>
                    <td><input type="text" class="table-input" name="phase_duration[]" value="1 Month"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'implPhasesBody', 'phase-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td class="text-center phase-num">2</td>
                    <td><textarea class="table-input" name="phase_desc[]" rows="2">System Development & Procurement: Customise MES and WMS systems, develop integration logic, and procure IoT hardware and edge devices.</textarea></td>
                    <td><input type="text" class="table-input" name="phase_duration[]" value="3 Months"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'implPhasesBody', 'phase-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td class="text-center phase-num">3</td>
                    <td><textarea class="table-input" name="phase_desc[]" rows="3">Installation, Integration & Testing: Install sensors and devices on machinery, configure WMS barcode devices, conduct integration testing and pre-commissioning trials.</textarea></td>
                    <td><input type="text" class="table-input" name="phase_duration[]" value="3 Months"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'implPhasesBody', 'phase-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td class="text-center phase-num">4</td>
                    <td><textarea class="table-input" name="phase_desc[]" rows="3">User Training, Final Report & Handover: Execute training programmes, validate system performance against KPIs, document procedures, and formally hand over the solution.</textarea></td>
                    <td><input type="text" class="table-input" name="phase_duration[]" value="1 Month"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'implPhasesBody', 'phase-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="btn-add-row" onclick="addImplPhaseRow()"><i class="fa-solid fa-plus"></i> Add Phase Row</button>

              <!-- Timeline (Gantt Chart) Table -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-calendar-days"></i> <span>Timeline</span>
              </div>

              <table class="costing-table" id="timelineTable">
                <thead>
                  <tr>
                    <th style="width: 120px;">MILESTONE</th>
                    <th>DESCRIPTION</th>
                    <th style="width: 35px;" class="text-center">1</th>
                    <th style="width: 35px;" class="text-center">2</th>
                    <th style="width: 35px;" class="text-center">3</th>
                    <th style="width: 35px;" class="text-center">4</th>
                    <th style="width: 35px;" class="text-center">5</th>
                    <th style="width: 35px;" class="text-center">6</th>
                    <th style="width: 35px;" class="text-center">7</th>
                    <th style="width: 35px;" class="text-center">8</th>
                    <th style="width: 40px;"></th>
                  </tr>
                </thead>
                <tbody id="timelineBody">
                  <tr>
                    <td><input type="text" class="table-input" name="tl_ms_name[]" value="Milestone 1"></td>
                    <td><textarea class="table-input" name="tl_ms_desc[]" rows="3">M 1.1 : Design & Consultancy&#10;  Register project&#10;  Issue PO / SST to Crowd Innovator&#10;M 1.2 : Training Programme 1&#10;M 1.3 : Training Programme 2</textarea></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'timelineBody')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="table-input" name="tl_ms_name[]" value="Milestone 2"></td>
                    <td><textarea class="table-input" name="tl_ms_desc[]" rows="3">M 2.1 : System Development&#10;M 2.2 : Automation Engineering Works&#10;M 2.3 : Factory Acceptance Test</textarea></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'timelineBody')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="table-input" name="tl_ms_name[]" value="Milestone 3"></td>
                    <td><textarea class="table-input" name="tl_ms_desc[]" rows="3">M 3.1 : Delivery&#10;M 3.2 : Installation Testing & Commissioning&#10;M 3.3 : User Acceptance Test</textarea></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'timelineBody')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                    <td><input type="text" class="table-input" name="tl_ms_name[]" value="Milestone 4"></td>
                    <td><textarea class="table-input" name="tl_ms_desc[]" rows="2">M 4.1 : User Training, Final Report & Handover&#10;Report preparation</textarea></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
                    <td class="text-center"><input type="checkbox" class="timeline-chk" checked></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'timelineBody')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                </tbody>
              </table>
              <button type="button" class="btn-add-row" onclick="addTimelineRow()"><i class="fa-solid fa-plus"></i> Add Timeline Row</button>

              <!-- Proposed Smart Technologies Table -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-microchip"></i> <span>Proposed Smart Technologies</span>
              </div>
              <p style="font-size: 0.85rem; color: #4b5563; margin-bottom: 12px;">
                This Smart Tech Up initiative leverages an integrated suite of smart manufacturing technologies in line with Industry 4.0 pillars.
              </p>

              <table class="costing-table" id="smartTechTable">
                <thead>
                    <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 180px;">Industry 4.0 Pillar</th>
                    <th style="width: 220px;">Smart Technology</th>
                    <th>Function & Relevance</th>
                    <th style="width: 40px;"></th>
                    </tr>
                </thead>
                <tbody id="smartTechBody">
                    <tr>
                    <td class="text-center tech-num">1</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Internet of Things (IoT)"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="Industrial IoT sensors on injection moulding machines"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Real-time monitoring of temperature, pressure, cycle time; enables data capture from legacy machinery</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">2</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Cyber-Physical Systems"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="IIoT-ready PLCs and MES-controlled equipment"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Enables machine-to-system feedback loop for autonomous product handling and smart scheduling</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">3</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="System Integration"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="MES–WMS–Accounting (Million, SQL Payroll) integration"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Automates data flow across production, inventory, and payroll—reduces human error and improves traceability</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">4</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Big Data & Analytics"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="KPI dashboard with trend analysis and anomaly detection"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Provides predictive alerts, supports quality control, and enables continuous improvement</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">5</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Cloud Computing"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="Cloud storage via dedicated Google Sheets & Microsoft platforms"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Ensures secure backup, mobile access to production data, and easy stakeholder collaboration</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">6</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Autonomous Systems"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="Conveyor-integrated robotic systems"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Eliminates manual product transfer, supports lights-out operations in packaging and post-moulding stations</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">7</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Simulation & Visualisation"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="MES visual dashboards, live production modelling"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Visualises bottlenecks and efficiency levels, enabling quick interventions and better resource allocation</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                    <td class="text-center tech-num">8</td>
                    <td><input type="text" class="table-input" name="tech_pillar[]" value="Artificial Intelligence (future-ready)"></td>
                    <td><input type="text" class="table-input" name="tech_name[]" value="Ready AI modules for future predictive maintenance and defect detection (scalable integration)"></td>
                    <td><textarea class="table-input" name="tech_func[]" rows="2">Prepares the digital ecosystem for future AI-based decision-making</textarea></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                </tbody>
              </table>
              <button type="button" class="btn-add-row" onclick="addSmartTechRow()"><i class="fa-solid fa-plus"></i> Add Technology Row</button>

            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(2)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <div>
              <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
              <button type="button" class="btn btn-next" onclick="goToPage(4)">Next: Section D <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </div>

        <!-- PAGE 4: SECTION D -->
        <div class="section-page" id="page-4">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-diagram-project"></i></div>
              <div>
                <span class="section-number">Section D (Page 4 of 9)</span>
                <h2>Scope of Work</h2>
                <p>Overall description of project deliverables and comprehensive training scope.</p>
              </div>
            </div>

            <div class="form-card" id="section-d">
              <div class="form-card-title">
                  <i class="fa-solid fa-diagram-project"></i> <span>Section D – Scope of Work</span>
              </div>

              <!-- Project Table Section -->
              <div style="margin-top: 15px;">
                  <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 4px;">Project</h4>
                  <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 12px;">Overall description of project</p>
              </div>

              <table class="costing-table" id="scopeProjectTable">
                  <thead>
                  <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th style="width: 200px;">Project Title</th>
                      <th style="width: 180px;">Relevance (Pain Point)</th>
                      <th>Key Activities / Deliverables</th>
                      <th style="width: 140px;" class="text-right">Cost (RM)</th>
                      <th style="width: 40px;"></th>
                  </tr>
                  </thead>
                  <tbody id="scopeProjectBody">
                  <tr>
                      <td class="text-center project-num">1</td>
                      <td><input type="text" class="table-input" name="proj_title[]" value="Real-Time Production Monitoring with MES"></td>
                      <td><input type="text" class="table-input" name="proj_relevance[]" value="Pain Point 1: Manual production data"></td>
                      <td>
                      <textarea class="table-input" name="proj_deliverables[]" rows="4">- Deploy IoT sensors on 18 injection moulding machines
- Deploy local edge devices and data gateways
- Integrate MES software with sensors
- Create dashboard for real-time KPI display
- Enable predictive maintenance capabilities</textarea>
                      </td>
                      <td><input type="number" class="table-input text-right scope-proj-cost" name="proj_cost[]" value="600000" oninput="recalculateScopeD()"></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeProjectBody', 'project-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                      <td class="text-center project-num">2</td>
                      <td><input type="text" class="table-input" name="proj_title[]" value="Smart Warehouse Inventory System with WMS"></td>
                      <td><input type="text" class="table-input" name="proj_relevance[]" value="Pain Point 2: Manual inventory tracking"></td>
                      <td>
                      <textarea class="table-input" name="proj_deliverables[]" rows="4">- Deploy QR code tagging system for raw materials and finished goods
- Install handheld terminals and scanners
- Integrate WMS with future MES platform
- Enable real-time inventory tracking and audit trails
- Paperless operation and automated reporting</textarea>
                      </td>
                      <td><input type="number" class="table-input text-right scope-proj-cost" name="proj_cost[]" value="320000" oninput="recalculateScopeD()"></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeProjectBody', 'project-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right"><strong>Total Project Cost (RM)</strong></td>
                      <td><input type="text" id="totalScopeProjectCost" class="table-input text-right" style="font-weight:800;" value="920,000.00" readonly></td>
                      <td></td>
                  </tr>
                  </tfoot>
              </table>
              <button type="button" class="btn-add-row" onclick="addScopeProjectRow()"><i class="fa-solid fa-plus"></i> Add Project Row</button>

              <hr style="margin: 35px 0; border: 0; border-top: 1px solid #e2e8f0;">

              <!-- Training Table Section -->
              <div style="margin-top: 15px;">
                  <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 12px;">Training</h4>
              </div>

              <table class="costing-table" id="scopeTrainingTable">
                  <thead>
                  <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th style="width: 200px;">Training Title</th>
                      <th style="width: 160px;">Target Audience</th>
                      <th style="width: 110px;">Duration</th>
                      <th>Objective / Deliverables</th>
                      <th style="width: 140px;" class="text-right">Cost (RM)</th>
                      <th style="width: 40px;"></th>
                  </tr>
                  </thead>
                  <tbody id="scopeTrainingBody">
                  <tr>
                      <td class="text-center training-num">1</td>
                      <td><input type="text" class="table-input" name="train_title[]" value="Industry 4.0 Leadership Programme"></td>
                      <td><input type="text" class="table-input" name="train_target[]" value="Management"></td>
                      <td><input type="text" class="table-input" name="train_duration[]" value="2 Days"></td>
                      <td><textarea class="table-input" name="train_objective[]" rows="2">Equip decision-makers with strategic understanding of Smart Manufacturing transformation</textarea></td>
                      <td><input type="number" class="table-input text-right scope-train-cost" name="train_cost[]" value="10000" oninput="recalculateScopeD()"></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeTrainingBody', 'training-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  <tr>
                      <td class="text-center training-num">2</td>
                      <td><input type="text" class="table-input" name="train_title[]" value="ESG Awareness & Compliance Training"></td>
                      <td><input type="text" class="table-input" name="train_target[]" value="Selected Employees"></td>
                      <td><input type="text" class="table-input" name="train_duration[]" value="2 Days"></td>
                      <td><textarea class="table-input" name="train_objective[]" rows="2">Build awareness on sustainable practices and compliance reporting</textarea></td>
                      <td><input type="number" class="table-input text-right scope-train-cost" name="train_cost[]" value="15000" oninput="recalculateScopeD()"></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeTrainingBody', 'training-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr class="summary-highlight">
                      <td colspan="5" class="text-right"><strong>Total Training Cost (RM)</strong></td>
                      <td><input type="text" id="totalScopeTrainingCost" class="table-input text-right" style="font-weight:800;" value="25,000.00" readonly></td>
                      <td></td>
                  </tr>
                  <tr class="summary-highlight" style="background-color: #f1f5f9;">
                      <td colspan="5" class="text-right"><strong>Overall Scope of Work Total (RM)</strong></td>
                      <td><input type="text" id="overallScopeTotal" class="table-input text-right" style="font-weight:800; color: #0f766e;" value="945,000.00" readonly></td>
                      <td></td>
                  </tr>
                  </tfoot>
              </table>
              <button type="button" class="btn-add-row" onclick="addScopeTrainingRow()"><i class="fa-solid fa-plus"></i> Add Training Row</button>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(3)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <div>
              <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
              <button type="button" class="btn btn-next" onclick="goToPage(5)">Next: Section E <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </div>

        <!-- PAGE 5: SECTION E -->
        <div class="section-page" id="page-5">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-file-signature"></i></div>
              <div>
                <span class="section-number">Section E (Page 5 of 9)</span>
                <h2>Specification</h2>
                <p><strong>Description:</strong> Technical specification, total users, infrastructure requirements, hardware requirements, etc</p>
                <p class="form-help-text" style="margin-top: 4px; font-style: italic;">
                  (please refer to folder Reference Guide on Technology and Solution). This listing is non-exhaustive. PM is free to add additional specification where necessary
                </p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-group required" style="margin-bottom: 20px;">
                <label>Project Name:</label>
                <input type="text" class="form-control" name="project_name" value="Real-Time Production Monitoring and Smart Warehouse Integration for Sheng Wang Industries Sdn Bhd" required>
              </div>

              <table class="costing-table" id="specificationsTable" style="table-layout: fixed; width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">NO.</th>
                    <th style="width: 450px;">SIRIM BERHAD TECHNICAL REQUIREMENTS</th>
                    <th style="width: 120px;" class="text-center">CRITICAL CRITERIA (√)</th>
                    <th style="width: 140px;" class="text-center">MANDATORY ATTACHMENT? (√)</th>
                    <th style="width: 140px;" class="text-center">MANDATORY REMARKS? (√)</th>
                    <th style="width: 50px;"></th>
                  </tr>
                </thead>
                <tbody id="specificationsBody">
                  <!-- Item 1: OBJECTIVE/PURPOSE -->
                  <tr>
                    <td class="text-center spec-num">1.</td>
                    <td>
                      <div class="spec-title">OBJECTIVE/PURPOSE</div>
                      <textarea class="table-input" name="spec_description[]" rows="4">To supply and commission a real-time production monitoring system (MES) with IoT sensor integration and WMS for smart inventory management</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 2: QUANTITY REQUIRED -->
                  <tr>
                    <td class="text-center spec-num">2.</td>
                    <td>
                      <div class="spec-title">QUANTITY REQUIRED</div>
                      <textarea class="table-input" name="spec_description[]" rows="10">One complete (1) unit of a customised real-time Manufacturing Execution System (MES) with IoT sensors integration and Warehouse Management System (WMS) for smart inventory management. The complete unit/system shall consist of the following:

2.1 Eighteen (18) units of IoT sensor kit to be integrated with the existing machines.
2.2 Eighteen (18) units of Programmable Logic Controller (PLC) modules.
2.3 Five (5) units of edge devices.
2.4 One (1) unit of MES license.
2.5 One (1) unit WMS license.
2.6 Ten (10) units of mobile scanner licences.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1" checked></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 3: TECHNICAL SPECIFICATIONS -->
                  <tr>
                    <td class="text-center spec-num">3.</td>
                    <td>
                      <div class="spec-title">TECHNICAL SPECIFICATIONS</div>
                      <textarea class="table-input" name="spec_description[]" rows="12">3.1 The customised real-time Manufacturing Execution System (MES) with IoT sensors integration and Warehouse Management System (WMS) for smart inventory management shall have the following specifications:
  3.1.1 The system shall be equipped with IoT Sensors for capturing machine data specifically for machine status, temperature, cycle time.
  3.1.2 The system shall be equipped with multi-sensor modules designed to capture machine operational data in real-time, including:
  • Machine status (ON/OFF)
  • Cycle time
  • Temperature
  • Vibration
  3.1.3 The system shall be equipped with PLC Gateways with Ethernet and IoT ready.
  3.1.4 The system shall be equipped with Edge Device: Industrial-grade, local processing.
  3.1.5 The system shall be equipped with MES: Server-based.
  3.1.6 The system shall be equipped with WMS specifically QR code compatible.
  3.1.7 The safety features of the system shall include emergency stops and overload protection.
  3.1.8 As-built technical and design drawings shall be provided to support equipment verification, installation, and integration with the overall system at the end of the project.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1" checked></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 4: POWER SUPPLY -->
                  <tr>
                    <td class="text-center spec-num">4.</td>
                    <td>
                      <div class="spec-title">POWER SUPPLY</div>
                      <textarea class="table-input" name="spec_description[]" rows="6">The tenderer shall follow standard nominal voltages as specified in MS IEC 60038: 2006 – IEC Standard voltages as the required power supply to the equipment such as 400 V with the range of ±10 % at frequency 50Hz ± 1%. In the event the equipment requirement does not comply to the standard voltages, the tenderer shall note and include in the tender, equipment as such the conditions can be adhered to.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 5: OPTIONAL ACCESSORIES -->
                  <tr>
                    <td class="text-center spec-num">5.</td>
                    <td>
                      <div class="spec-title">OPTIONAL ACCESSORIES</div>
                      <textarea class="table-input" name="spec_description[]" rows="3">The tenderer shall list and quote the optional accessories for the Supplies.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 6: SPARE PARTS -->
                  <tr>
                    <td class="text-center spec-num">6.</td>
                    <td>
                      <div class="spec-title">SPARE PARTS</div>
                      <textarea class="table-input" name="spec_description[]" rows="4">6.1 The tenderer shall list and quote the spare parts for the Supplies.
6.2 The availability period of the spare part shall be at least 10 years.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 7: MANUALS -->
                  <tr>
                    <td class="text-center spec-num">7.</td>
                    <td>
                      <div class="spec-title">MANUALS</div>
                      <textarea class="table-input" name="spec_description[]" rows="8">At least two (2) original copies of manuals in English as stated below shall be provided :-

7.1 Operating and Installation Manual.
7.2 Servicing and Maintenance Manual including calibration procedures and recommended frequencies for calibration.

The manuals provided shall include details of electrical, electronic, hydraulic, chemical, liquid and pneumatic circuits where applicable, with identification and specifications or circuit components and spare parts to facilitate repairs, servicing and maintenance.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 8: DELIVERY PERIOD -->
                  <tr>
                    <td class="text-center spec-num">8.</td>
                    <td>
                      <div class="spec-title">DELIVERY PERIOD</div>
                      <textarea class="table-input" name="spec_description[]" rows="6">8.1 The tenderer shall supply, install, commission and test-run the Supplies at 8, Jalan Suria 1, Kampung Sinar Harapan, 81500 Pekan Nanas, Johor Bahru, Johor, within three (3) months from the date of the purchase order.

8.2 The delivery period shall include calibration requirements, certificate of fitness and related regulatory requirements, transportation from the country of origin to SIRIM Berhad via air, sea or land and other necessary requirements stipulated in the specifications.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 9: INSTALLATION, TESTING AND COMMISSIONING -->
                  <tr>
                    <td class="text-center spec-num">9.</td>
                    <td>
                      <div class="spec-title">INSTALLATION, TESTING AND COMMISSIONING</div>
                      <textarea class="table-input" name="spec_description[]" rows="10">9.1 The tenderer shall be responsible for the installation, commissioning and test-run of the Supplies to the satisfaction of SIRIM Berhad before final acceptance.

9.2 The tenderer shall make necessary arrangement with Department of Occupational Safety and Health Malaysia (DOSH) for initial inspection upon commissioning of hoisting machine, unfired pressure vessel and fired pressure vessel.

9.3 The tenderer shall submit the work schedule for the installation, commissioning and test-run of the Supplies.

9.4 The tenderer to include offer for Factory Acceptance Test (if yes, please fill in schedule of price under section D6-Optional).

9.5 All costs on installation, commissioning and test run of the Supplies shall be borne by the tenderer.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 10: TRAINING -->
                  <tr>
                    <td class="text-center spec-num">10.</td>
                    <td>
                      <div class="spec-title">TRAINING</div>
                      <textarea class="table-input" name="spec_description[]" rows="8">The tenderer shall appoint suitably qualified personnel authorised by the principal to provide on-site training on:-

10.1 Operation and handling of the Supplies.
10.2 Routine and preventive maintenance including storage of the Supplies to SIRIM Berhad's staff during and immediately after the installation.
10.3 To provide qualified and competent personnel authorized by the principal to perform on-site training and supported by relevant evidence to indicate that the personnel is qualified and competent such as trainer's profile, training modules, duration, no. of participants, etc.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 11: GUARANTEE/WARRANTY -->
                  <tr>
                    <td class="text-center spec-num">11.</td>
                    <td>
                      <div class="spec-title">GUARANTEE/WARRANTY</div>
                      <textarea class="table-input" name="spec_description[]" rows="6">11.1 The Supplies shall be a brand new unit/system and guaranteed against manufacturing defects for a period of at least two calendar years from the date of final acceptance.

11.2 An authorisation letter and warranty from the principal shall be provided by the tenderer mentioning support and capabilities to supply the equipment if awarded.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 12: MAINTENANCE -->
                  <tr>
                    <td class="text-center spec-num">12.</td>
                    <td>
                      <div class="spec-title">MAINTENANCE</div>
                      <textarea class="table-input" name="spec_description[]" rows="6">12.1 The tenderer shall provide maintenance with the Supplies delivered during the warranty period.

12.2 List of components that required for maintenance services and the detail costs.

12.3 The tenderer to include offer maintenance service after expiration of the initial warranty period for 3 years (if yes, please fill in schedule of price under section D5).</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>

                  <!-- Item 13: AFTER SALES AND SUPPORT SERVICE -->
                  <tr>
                    <td class="text-center spec-num">13.</td>
                    <td>
                      <div class="spec-title">AFTER SALES AND SUPPORT SERVICE</div>
                      <textarea class="table-input" name="spec_description[]" rows="3">To responsible for sales support service for a period of at least ten (10) calendar years from the date of final acceptance and supported by the principal.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
                    <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn-add-row" onclick="addSpecificationRow()" style="margin-top: 15px;">
                <i class="fa-solid fa-plus"></i> Add Specification Row
              </button>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(4)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <div>
                <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
                <button type="button" class="btn btn-next" onclick="goToPage(6)">Next: Section F <i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
          </section>
        </div>

        <!-- PAGE 6: SECTION F -->
        <div class="section-page" id="page-6">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-graduation-cap"></i></div>
              <div>
                <span class="section-number">Section F (Page 6 of 9)</span>
                <h2>Training Overview & Outcomes</h2>
                <p><strong>Description:</strong> The training programmes are strategically designed to build internal capabilities necessary to sustain digital transformation and comply with emerging sustainability and governance expectations.</p>
              </div>
            </div>

            <!-- Section F.1: Training Overview Table -->
            <div class="form-card" style="margin-bottom: 24px;">
              <h3 style="margin-bottom: 15px; font-size: 1.1rem; color: #1e293b;">Training Overview</h3>
              <table class="costing-table" id="trainingOverviewTable" style="table-layout: fixed; width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 220px;">Programme</th>
                    <th style="width: 45%;">Objectives</th>
                    <th>Benefits</th>
                    <th style="width: 50px;"></th>
                  </tr>
                </thead>
                <tbody id="trainingOverviewBody">
                  <tr>
                    <td class="text-center training-num">1</td>
                    <td>
                      <input type="text" class="table-input" name="programme_name[]" value="Industry 4.0 Leadership Programme" style="font-weight: 600;">
                    </td>
                    <td>
                      <textarea class="table-input" name="programme_objectives[]" rows="4">- Empower senior management with strategic knowledge on Industry 4.0
- Align transformation efforts with business goals</textarea>
                    </td>
                    <td>
                      <textarea class="table-input" name="programme_benefits[]" rows="4">- Stronger decision-making capacity
- Leadership alignment for successful implementation</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'trainingOverviewBody', 'training-num')"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center training-num">2</td>
                    <td>
                      <input type="text" class="table-input" name="programme_name[]" value="ESG Awareness & Compliance Training" style="font-weight: 600;">
                    </td>
                    <td>
                      <textarea class="table-input" name="programme_objectives[]" rows="4">- Build awareness on Environmental, Social & Governance principles
- Enhance company ESG reporting and culture</textarea>
                    </td>
                    <td>
                      <textarea class="table-input" name="programme_benefits[]" rows="4">- Supports sustainable practices
- Improves audit readiness and supply chain compliance</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'trainingOverviewBody', 'training-num')"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn-add-row" onclick="addTrainingRow()" style="margin-top: 15px;">
                <i class="fa-solid fa-plus"></i> Add Programme Row
              </button>
            </div>

            <!-- Section F.2: Training Outcomes -->
            <div class="form-card">
              <h3 style="margin-bottom: 15px; font-size: 1.1rem; color: #1e293b;">Training Outcomes</h3>
              
              <div id="outcomesContainer">
                <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                  <span style="font-weight: bold;">•</span>
                  <input type="text" class="form-control" name="training_outcomes[]" value="A digitally literate management team equipped to drive smart factory initiatives.">
                  <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                </div>

                <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                  <span style="font-weight: bold;">•</span>
                  <input type="text" class="form-control" name="training_outcomes[]" value="A workforce familiar with ESG practices and digital tools required for smart manufacturing.">
                  <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                </div>

                <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                  <span style="font-weight: bold;">•</span>
                  <input type="text" class="form-control" name="training_outcomes[]" value="Enhanced internal capacity to manage MES and WMS systems post-implementation.">
                  <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                </div>

                <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                  <span style="font-weight: bold;">•</span>
                  <input type="text" class="form-control" name="training_outcomes[]" value="Readiness to meet regulatory and customer expectations for sustainability and traceability.">
                  <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>

              <button type="button" class="btn-add-row" onclick="addOutcomeRow()" style="margin-top: 15px;">
                <i class="fa-solid fa-plus"></i> Add Outcome
              </button>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(5)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <div>
                <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
                <button type="button" class="btn btn-next" onclick="goToPage(7)">Next: Section G <i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
          </section>
        </div>

        <!-- PAGE 7: SECTION G -->
        <div class="section-page" id="page-7">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-sliders"></i></div>
              <div>
                <span class="section-number">Section G (Page 7 of 9)</span>
                <h2>Training Technical Requirements</h2>
                <p>Specific compliance details, trainer qualifications, and administrative technical requirements.</p>
              </div>
            </div>

            <div class="form-card">
              <!-- Editable Specifications Table -->
              <div class="table-responsive" style="margin-bottom: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                  <h4 style="margin: 0; font-weight: 700; color: #1e293b;">Training Specifications & Requirements</h4>
                </div>
                
                <table class="costing-table" id="trainingSpecTable">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">No</th>
                      <th style="width: 28%;">Specification</th>
                      <th style="width: 32%;">Supporting Document from Vendor</th>
                      <th>Remarks</th>
                      <th class="text-center" style="width: 50px;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="trainingSpecBody">
                    <tr>
                      <td class="text-center spec-num">1</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Industry 4.0 Leadership Programme" style="font-weight: 600;"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Training syllabus, Trainer CV, HRD Corp cert"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Must include case studies on smart factory implementation in Malaysia</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">2</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="ESG Awareness & Compliance Training" style="font-weight: 600;"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Training outline, Environmental compliance module"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Must cover ESG pillars, SDGs, and Malaysian regulatory expectations</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">3</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Delivery Mode"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Online/Onsite (Hybrid recommended)"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Must be interactive and include pre/post assessments</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">4</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Language"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Bahasa Malaysia / English"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">To ensure inclusivity for all employee levels</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">5</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Certification of Participation"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Yes"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Required for HRD Corp compliance and audit records</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">6</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Minimum Trainer Credentials"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Min. 5 years relevant experience"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Must include experience in manufacturing and/or sustainability</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td class="text-center spec-num">7</td>
                      <td><input type="text" class="table-input" name="spec_title[]" value="Evaluation Mechanism"></td>
                      <td><input type="text" class="table-input" name="spec_doc[]" value="Pre-test, Post-test, Feedback Form"></td>
                      <td><textarea class="table-input" name="spec_remarks[]" rows="2">Used to measure knowledge gain and session effectiveness</textarea></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                  </tbody>
                </table>
                <button type="button" class="btn-add-row" onclick="addTrainingSpecRow()" style="margin-top: 10px;">
                  <i class="fa-solid fa-plus"></i> Add Specification Row
                </button>
              </div>
            </div>

            <!-- Table 2: Additional Technical Requirements Table -->
            <div class="form-card">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                  <h4 style="margin: 0; font-weight: 700; color: #1e293b;">Additional Technical Requirements</h4>
              </div>

              <div class="table-responsive">
                  <table class="costing-table" id="techReqTable">
                  <thead>
                      <tr>
                      <th class="text-center" style="width: 50px;">No.</th>
                      <th><input type="text" class="table-input" value="Technical Requirements" style="font-weight:700;"></th>
                      <th><input type="text" class="table-input" value="Supporting Document from Vendor" style="font-weight:700;"></th>
                      <th><input type="text" class="table-input" value="Remarks" style="font-weight:700;"></th>
                      <th class="text-center" style="width: 60px;">Action</th>
                      </tr>
                  </thead>
                  <tbody id="techReqBody">
                      <tr>
                      <td class="text-center req-num">1</td>
                      <td><input type="text" class="table-input" name="tech_req[]" value="HRD Corp Claimable Status"></td>
                      <td><input type="text" class="table-input" name="tech_doc[]" value="Grant Approval Letter / HRD Corp Course ID"></td>
                      <td><input type="text" class="table-input" name="tech_remarks[]" value="Must be registered under HRD Corp SBL-Khas scheme"></td>
                      <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'techReqBody', 'req-num')"><i class="fa-solid fa-trash"></i></button></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
              <button type="button" class="btn-add-row" onclick="addTechReqRow()" style="margin-top: 12px;">
                  <i class="fa-solid fa-plus"></i> Add Technical Requirement Row
              </button>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(6)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <div>
                  <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
                  <button type="button" class="btn btn-next" onclick="goToPage(8)">Next: Section H <i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
          </section>
        </div>

        <!-- PAGE 8: SECTION H -->
        <div class="section-page" id="page-8">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-file-signature"></i></div>
              <div>
                <span class="section-number">Section H (Page 8 of 9)</span>
                <h2>Declaration</h2>
                <p>Applicant legal verification, compliance acknowledgments, and formal confirmation of project data.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title"><i class="fa-solid fa-user-check"></i> <span>Authorized Representative Details</span></div>
              
              <div class="form-row">
                <div class="form-group required">
                  <label>Authorized Representative Name</label>
                  <input type="text" name="declarantName" value="Low Zhao Jing" required>
                </div>
                <div class="form-group required">
                  <label>Designation / Position</label>
                  <input type="text" name="declarantPosition" value="Manager" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group required">
                  <label>NRIC / Passport Number</label>
                  <input type="text" name="declarantIC" value="880512-01-5431" required>
                </div>
                <div class="form-group required">
                  <label>Mobile Contact</label>
                  <input type="text" name="declarantPhone" value="017-843 5505" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group required">
                  <label>Official Email Address</label>
                  <input type="email" name="declarantEmail" value="brucelow@shengwangind.com" required>
                </div>
                <div class="form-group required">
                  <label>Date of Declaration</label>
                  <input type="date" name="declarationDate" value="2026-09-17" required>
                </div>
              </div>

              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-stamp"></i> <span>Verification & Authorization Artifacts</span></div>
              
              <div class="form-row">
                <div class="form-group required">
                  <label>Digital Signature (Image File)</label>
                  <input type="file" class="form-control" name="digital_signature" accept="image/*,.pdf" required>
                </div>
                <div class="form-group required">
                  <label>Company Stamp / Seal Upload</label>
                  <input type="file" class="form-control" name="company_stamp" accept="image/*,.pdf" required>
                </div>
              </div>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(7)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <div>
              <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
              <button type="button" class="btn btn-next" onclick="goToPage(9)">Next: Section I <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </div>

        <!-- PAGE 9: SECTION I -->
        <div class="section-page" id="page-9">
          <section class="form-section">
            <div class="section-header">
              <div class="section-icon"><i class="fa-solid fa-handshake"></i></div>
              <div>
                <span class="section-number">Section I (Page 9 of 9)</span>
                <h2>Vendor Requirements</h2>
                <p>Specify candidate vendor types, required smart technologies, and minimum qualification criteria for project implementation.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title">
                <i class="fa-solid fa-list-check"></i> <span>Vendor Requirements & Qualifications Matrix</span>
              </div>

              <table class="costing-table" id="vendorTable" style="table-layout: fixed; width: 100%;">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 200px;">Vendor Type</th>
                    <th style="width: 220px;">Relevant Smart Technology</th>
                    <th>Requirements & Qualifications</th>
                    <th style="width: 50px;" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody id="vendorBody">
                  <tr>
                    <td class="text-center vendor-no">1</td>
                    <td>
                      <input type="text" class="table-input" name="vendorType[]" value="System Integrator" placeholder="e.g. Solution Provider">
                    </td>
                    <td>
                      <input type="text" class="table-input" name="vendorTech[]" value="MES, IoT, WMS Integration" placeholder="e.g. MES, IoT">
                    </td>
                    <td>
                      <textarea class="table-input" name="vendorReqs[]" rows="3" placeholder="Specify vendor qualifications...">- Minimum completed projects in MES/WMS integration
- Experience in manufacturing sector (preferably plastics)
- Must provide 12-month post-installation support
- Local presence preferred</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center vendor-no">2</td>
                    <td>
                      <input type="text" class="table-input" name="vendorType[]" value="IoT Hardware Vendor" placeholder="e.g. Hardware Provider">
                    </td>
                    <td>
                      <input type="text" class="table-input" name="vendorTech[]" value="Industrial sensors, edge devices, PLC gateways" placeholder="e.g. Edge Devices">
                    </td>
                    <td>
                      <textarea class="table-input" name="vendorReqs[]" rows="3" placeholder="Specify vendor qualifications...">- Devices must be compatible with MES platform
- Devices must meet industrial standards (IP-rated, EMC-compliant)
- Vendor must supply calibration & documentation</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center vendor-no">3</td>
                    <td>
                      <input type="text" class="table-input" name="vendorType[]" value="Software Provider" placeholder="e.g. Software Vendor">
                    </td>
                    <td>
                      <input type="text" class="table-input" name="vendorTech[]" value="MES, WMS, analytics dashboard" placeholder="e.g. Analytics Engine">
                    </td>
                    <td>
                      <textarea class="table-input" name="vendorReqs[]" rows="3" placeholder="Specify vendor qualifications...">- Proven software deployed in at least 5 manufacturing sites
- Scalability for future AI module integration
- Local user training and manuals required</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center vendor-no">4</td>
                    <td>
                      <input type="text" class="table-input" name="vendorType[]" value="Training Provider" placeholder="e.g. Upskilling Provider">
                    </td>
                    <td>
                      <input type="text" class="table-input" name="vendorTech[]" value="Industry 4.0, ESG, Digital Upskilling" placeholder="e.g. Digital Skills">
                    </td>
                    <td>
                      <textarea class="table-input" name="vendorReqs[]" rows="3" placeholder="Specify vendor qualifications...">- HRD Corp registered
- Trainers with at least 5 years of industry experience
- Programme must include assessments and hands-on case studies</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center vendor-no">5</td>
                    <td>
                      <input type="text" class="table-input" name="vendorType[]" value="Cybersecurity Consultant" placeholder="e.g. Security Consultant">
                    </td>
                    <td>
                      <input type="text" class="table-input" name="vendorTech[]" value="Network protection, system hardening" placeholder="e.g. OT Security">
                    </td>
                    <td>
                      <textarea class="table-input" name="vendorReqs[]" rows="3" placeholder="Specify vendor qualifications...">- Optional: For future enhancement of MES/WMS security
- Experience in industrial OT cybersecurity preferred</textarea>
                    </td>
                    <td class="text-center">
                      <button type="button" class="btn-remove-row" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn-add-row" onclick="addVendorRow()" style="margin-top: 15px;">
                <i class="fa-solid fa-plus"></i> Add Vendor Row
              </button>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(8)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <div>
                <button type="button" class="btn btn-draft" onclick="saveDraft()">Save Draft</button>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane"></i> Submit Application</button>
              </div>
            </div>
          </section>
        </div>
      </form>
    </main>
  </div>

  <script>
    let currentPage = 1;
    const totalPages = 9;

    function goToPage(pageNum) {
      if (pageNum < 1 || pageNum > totalPages) return;

      document.querySelectorAll('.section-page').forEach(page => page.classList.remove('active-page'));
      document.getElementById('page-' + pageNum).classList.add('active-page');
      
      currentPage = pageNum;
      updateProgressBar();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function updateProgressBar() {
      const percentage = Math.round((currentPage / totalPages) * 100);
      document.getElementById('progressFillBar').style.width = percentage + '%';
      document.getElementById('progressPercentageText').textContent = percentage + '% Completed';

      for (let i = 1; i <= totalPages; i++) {
        const tab = document.getElementById('tab-' + i);
        const badge = document.getElementById('badge-' + i);

        tab.classList.remove('active', 'completed');
        
        if (i === currentPage) {
          tab.classList.add('active');
          badge.innerHTML = i;
          tab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        } else if (i < currentPage) {
          tab.classList.add('completed');
          badge.innerHTML = '<i class="fa-solid fa-check"></i>';
        } else {
          badge.innerHTML = i;
        }
      }
    }

    function toggleAccordion(button) {
      const item = button.closest('.accordion-item');
      if (item) item.classList.toggle('open');
    }

    function formatCurrency(val) {
      return val.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function renumberTable(containerId, numClass) {
      const rows = document.querySelectorAll(`#${containerId} tr`);
      rows.forEach((row, index) => {
        const numCell = row.querySelector(`.${numClass}`);
        if (numCell) {
          numCell.textContent = (index + 1) + (numClass === 'spec-num' ? '.' : '');
        }
      });
    }

    /* Section B Calculations */
    function addPainPointRow() {
      const tbody = document.getElementById('painPointsBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center row-num"></td>
        <td><input type="text" class="table-input" name="painPointText[]" placeholder="Enter pain point..." required></td>
        <td><input type="text" class="table-input" name="painPointImpact[]" placeholder="Impact..." required></td>
        <td><input type="number" class="table-input pain-loss-val text-right" name="painPointLoss[]" value="0" oninput="calculatePainPointTotal()" required></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeRow(this, 'painPoint')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('painPointsBody', 'row-num');
    }

    function calculatePainPointTotal() {
      const inputs = document.querySelectorAll('.pain-loss-val');
      let sum = 0;
      inputs.forEach(inp => sum += (parseFloat(inp.value) || 0));
      document.getElementById('totalPainLosses').value = formatCurrency(sum);
    }

    /* Section C Calculations & Dynamic Rows */
    function addCostRow(category) {
      const tbody = document.getElementById('cat-' + category);
      const subtotalRow = tbody.querySelector('.subtotal-row');
      let prefix = category.substring(0, 3).toLowerCase();
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${category}</td>
        <td><input type="text" class="table-input" placeholder="Item description..." name="${prefix}_desc[]"></td>
        <td><input type="number" class="table-input text-center cost-qty" value="1" oninput="recalculateCostTable()"></td>
        <td><input type="number" class="table-input text-right cost-unit" value="0" oninput="recalculateCostTable()"></td>
        <td><input type="number" class="table-input text-right cost-row-total" value="0" readonly></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeCostRow(this)"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.insertBefore(tr, subtotalRow);
      recalculateCostTable();
    }

    function removeCostRow(btn) {
      btn.closest('tr').remove();
      recalculateCostTable();
    }

    function recalculateCostTable() {
      ['Hardware', 'Software', 'Implementation', 'Training'].forEach(cat => {
        const tbody = document.getElementById('cat-' + cat);
        let catSubtotal = 0;
        const rows = tbody.querySelectorAll('tr:not(.category-header-row):not(.subtotal-row)');
        rows.forEach(r => {
          const qty = parseFloat(r.querySelector('.cost-qty')?.value) || 0;
          const unit = parseFloat(r.querySelector('.cost-unit')?.value) || 0;
          const total = qty * unit;
          const totalInp = r.querySelector('.cost-row-total');
          if (totalInp) totalInp.value = total;
          catSubtotal += total;
        });
        const subEl = document.getElementById('subtotal' + cat);
        if (subEl) subEl.value = formatCurrency(catSubtotal);
      });

      let totalA = 0;
      ['Hardware', 'Software', 'Implementation', 'Training'].forEach(cat => {
        const subEl = document.getElementById('subtotal' + cat);
        if (subEl) totalA += parseFloat(subEl.value.replace(/,/g, '')) || 0;
      });

      const grantB = totalA * 0.5;
      const contribC = totalA - grantB;
      const rebateD = parseFloat(document.getElementById('totalOsfaRebateD').value) || 0;
      const contribE = contribC - rebateD;

      document.getElementById('totalProjectValueA').value = formatCurrency(totalA);
      document.getElementById('totalGrantB').value = formatCurrency(grantB);
      document.getElementById('companyContribC').value = formatCurrency(contribC);
      document.getElementById('companyContribE').value = formatCurrency(contribE);
    }

    function addMilestoneRow() {
      const tbody = document.getElementById('milestoneBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="text" class="table-input" name="ms_name[]" value="Milestone ${tbody.children.length + 1}"></td>
        <td><input type="text" class="table-input" name="ms_timeline[]" placeholder="Timeline..."></td>
        <td><textarea class="table-input" name="ms_desc[]" rows="2" placeholder="Description..."></textarea></td>
        <td><input type="number" class="table-input text-center ms-pct" name="ms_pct[]" value="0" oninput="recalculateMilestones()"></td>
        <td><input type="number" class="table-input text-right ms-grant" name="ms_grant[]" value="0" oninput="recalculateMilestones()"></td>
        <td><input type="number" class="table-input text-right ms-contrib" name="ms_contrib[]" value="0" oninput="recalculateMilestones()"></td>
        <td><input type="number" class="table-input text-right ms-rebate" name="ms_rebate[]" value="0" oninput="recalculateMilestones()"></td>
        <td><input type="number" class="table-input text-right ms-total" name="ms_total[]" value="0" readonly></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeMilestoneRow(this)"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      recalculateMilestones();
    }

    function removeMilestoneRow(btn) {
      btn.closest('tr').remove();
      recalculateMilestones();
    }

    function recalculateMilestones() {
      let totPct = 0, totGrant = 0, totContrib = 0, totRebate = 0, totVal = 0;
      const rows = document.querySelectorAll('#milestoneBody tr');
      rows.forEach(r => {
        const pct = parseFloat(r.querySelector('.ms-pct')?.value) || 0;
        const grant = parseFloat(r.querySelector('.ms-grant')?.value) || 0;
        const contrib = parseFloat(r.querySelector('.ms-contrib')?.value) || 0;
        const rebate = parseFloat(r.querySelector('.ms-rebate')?.value) || 0;
        const rowTotal = grant + contrib + rebate;
        const totalInp = r.querySelector('.ms-total');
        if (totalInp) totalInp.value = rowTotal;

        totPct += pct;
        totGrant += grant;
        totContrib += contrib;
        totRebate += rebate;
        totVal += rowTotal;
      });

      document.getElementById('grandMilestonePct').value = totPct + '%';
      document.getElementById('grandMilestoneGrant').value = formatCurrency(totGrant);
      document.getElementById('grandMilestoneContrib').value = formatCurrency(totContrib);
      document.getElementById('grandMilestoneRebate').value = formatCurrency(totRebate);
      document.getElementById('grandMilestoneTotal').value = formatCurrency(totVal);
    }

    function addImplPhaseRow() {
      const tbody = document.getElementById('implPhasesBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center phase-num"></td>
        <td><textarea class="table-input" name="phase_desc[]" rows="2" placeholder="Phase description..."></textarea></td>
        <td><input type="text" class="table-input" name="phase_duration[]" placeholder="Duration..."></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'implPhasesBody', 'phase-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('implPhasesBody', 'phase-num');
    }

    function addTimelineRow() {
      const tbody = document.getElementById('timelineBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><input type="text" class="table-input" name="tl_ms_name[]" value="Milestone ${tbody.children.length + 1}"></td>
        <td><textarea class="table-input" name="tl_ms_desc[]" rows="2" placeholder="Description..."></textarea></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><input type="checkbox" class="timeline-chk"></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'timelineBody')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
    }

    function addSmartTechRow() {
      const tbody = document.getElementById('smartTechBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center tech-num"></td>
        <td><input type="text" class="table-input" name="tech_pillar[]" placeholder="Pillar..."></td>
        <td><input type="text" class="table-input" name="tech_name[]" placeholder="Technology name..."></td>
        <td><textarea class="table-input" name="tech_func[]" rows="2" placeholder="Function & relevance..."></textarea></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'smartTechBody', 'tech-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('smartTechBody', 'tech-num');
    }

    /* Section D Calculations & Dynamic Rows */
    function addScopeProjectRow() {
      const tbody = document.getElementById('scopeProjectBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center project-num"></td>
        <td><input type="text" class="table-input" name="proj_title[]" placeholder="Project Title..."></td>
        <td><input type="text" class="table-input" name="proj_relevance[]" placeholder="Relevance..."></td>
        <td><textarea class="table-input" name="proj_deliverables[]" rows="3" placeholder="Deliverables..."></textarea></td>
        <td><input type="number" class="table-input text-right scope-proj-cost" name="proj_cost[]" value="0" oninput="recalculateScopeD()"></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeProjectBody', 'project-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('scopeProjectBody', 'project-num');
      recalculateScopeD();
    }

    function addScopeTrainingRow() {
      const tbody = document.getElementById('scopeTrainingBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center training-num"></td>
        <td><input type="text" class="table-input" name="train_title[]" placeholder="Training Title..."></td>
        <td><input type="text" class="table-input" name="train_target[]" placeholder="Target Audience..."></td>
        <td><input type="text" class="table-input" name="train_duration[]" placeholder="Duration..."></td>
        <td><textarea class="table-input" name="train_objective[]" rows="2" placeholder="Objective..."></textarea></td>
        <td><input type="number" class="table-input text-right scope-train-cost" name="train_cost[]" value="0" oninput="recalculateScopeD()"></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeScopeRow(this, 'scopeTrainingBody', 'training-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('scopeTrainingBody', 'training-num');
      recalculateScopeD();
    }

    function removeScopeRow(btn, bodyId, numClass) {
      btn.closest('tr').remove();
      renumberTable(bodyId, numClass);
      recalculateScopeD();
    }

    function recalculateScopeD() {
      let projSum = 0;
      document.querySelectorAll('.scope-proj-cost').forEach(i => projSum += (parseFloat(i.value) || 0));
      document.getElementById('totalScopeProjectCost').value = formatCurrency(projSum);

      let trainSum = 0;
      document.querySelectorAll('.scope-train-cost').forEach(i => trainSum += (parseFloat(i.value) || 0));
      document.getElementById('totalScopeTrainingCost').value = formatCurrency(trainSum);

      document.getElementById('overallScopeTotal').value = formatCurrency(projSum + trainSum);
    }

    /* Section E Dynamic Rows */
    function addSpecificationRow() {
      const tbody = document.getElementById('specificationsBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center spec-num"></td>
        <td>
          <div class="spec-title">NEW SPECIFICATION</div>
          <textarea class="table-input" name="spec_description[]" rows="3" placeholder="Enter specification details..."></textarea>
        </td>
        <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="critical_criteria[]" value="1"></td>
        <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_attachment[]" value="1"></td>
        <td class="text-center"><input type="checkbox" class="compliance-checkbox" name="mandatory_remarks[]" value="1"></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'specificationsBody', 'spec-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('specificationsBody', 'spec-num');
    }

    /* Section F Dynamic Rows */
    function addTrainingRow() {
      const tbody = document.getElementById('trainingOverviewBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center training-num"></td>
        <td><input type="text" class="table-input" name="programme_name[]" placeholder="Programme Name..." style="font-weight: 600;"></td>
        <td><textarea class="table-input" name="programme_objectives[]" rows="3" placeholder="Objectives..."></textarea></td>
        <td><textarea class="table-input" name="programme_benefits[]" rows="3" placeholder="Benefits..."></textarea></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'trainingOverviewBody', 'training-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('trainingOverviewBody', 'training-num');
    }

    function addOutcomeRow() {
      const container = document.getElementById('outcomesContainer');
      const div = document.createElement('div');
      div.className = 'outcome-row';
      div.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px; align-items: center;';
      div.innerHTML = `
        <span style="font-weight: bold;">•</span>
        <input type="text" class="form-control" name="training_outcomes[]" placeholder="Enter outcome...">
        <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
      `;
      container.appendChild(div);
    }

    /* Section G Dynamic Rows */
    function addTrainingSpecRow() {
      const tbody = document.getElementById('trainingSpecBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center spec-num"></td>
        <td><input type="text" class="table-input" name="spec_title[]" placeholder="Specification..." style="font-weight: 600;"></td>
        <td><input type="text" class="table-input" name="spec_doc[]" placeholder="Supporting document..."></td>
        <td><textarea class="table-input" name="spec_remarks[]" rows="2" placeholder="Remarks..."></textarea></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeTrainingSpecRow(this)"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('trainingSpecBody', 'spec-num');
    }

    function removeTrainingSpecRow(btn) {
      btn.closest('tr').remove();
      renumberTable('trainingSpecBody', 'spec-num');
    }

    function addTechReqRow() {
      const tbody = document.getElementById('techReqBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center req-num"></td>
        <td><input type="text" class="table-input" name="tech_req[]" placeholder="Technical requirement..."></td>
        <td><input type="text" class="table-input" name="tech_doc[]" placeholder="Supporting document..."></td>
        <td><input type="text" class="table-input" name="tech_remarks[]" placeholder="Remarks..."></td>
        <td class="text-center"><button type="button" class="btn-remove-row" onclick="removeDynamicRow(this, 'techReqBody', 'req-num')"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('techReqBody', 'req-num');
    }

    /* Section I Dynamic Rows */
    function addVendorRow() {
      const tbody = document.getElementById('vendorBody');
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td class="text-center vendor-no"></td>
        <td><input type="text" class="form-control" name="vendorType[]" placeholder="Vendor Type"></td>
        <td><input type="text" class="form-control" name="vendorTech[]" placeholder="Smart Technology"></td>
        <td><textarea class="form-control" name="vendorReqs[]" rows="3" placeholder="Qualifications..."></textarea></td>
        <td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeVendorRow(this)"><i class="fa-solid fa-trash"></i></button></td>
      `;
      tbody.appendChild(tr);
      renumberTable('vendorBody', 'vendor-no');
    }

    function removeVendorRow(btn) {
      btn.closest('tr').remove();
      renumberTable('vendorBody', 'vendor-no');
    }

    /* General Helpers */
    function removeRow(btn, type) {
      const tr = btn.closest('tr');
      tr.remove();
      if (type === 'painPoint') {
        renumberTable('painPointsBody', 'row-num');
        calculatePainPointTotal();
      }
    }

    function removeDynamicRow(btn, tbodyId, numClass) {
      btn.closest('tr').remove();
      if (tbodyId && numClass) {
        renumberTable(tbodyId, numClass);
      }
    }

    function saveDraft() {
      alert('Draft saved successfully!');
    }

    function submitProposal() {
      alert('Application submitted successfully!');
    }
  </script>
</body>
</html>