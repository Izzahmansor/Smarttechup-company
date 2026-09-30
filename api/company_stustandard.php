<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Technical Proposal & RFP - Company View</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="companyregistration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />

  <style>
    /* View-Only Readonly & Disabled Inputs Styling */
    input[disabled], textarea[disabled], select[disabled], input[readonly], textarea[readonly] {
      background-color: #f8fafc !important;
      color: #334155 !important;
      border: 1px solid #cbd5e1 !important;
      cursor: not-allowed;
      opacity: 1 !important; /* Retains clarity */
    }

    .compliance-checkbox[disabled], .timeline-chk[disabled] {
      cursor: not-allowed;
      accent-color: #2563eb;
    }

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

    .view-badge {
      background-color: #e0f2fe;
      color: #0369a1;
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 0.825rem;
      font-weight: 700;
      text-transform: uppercase;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .btn-ci-proceed {
      background-color: #16a34a;
      color: #ffffff !important;
      padding: 10px 18px;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 700;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 2px 4px rgba(22, 163, 74, 0.2);
      transition: all 0.2s ease;
      border: none;
      cursor: pointer;
    }

    .btn-ci-proceed:hover {
      background-color: #15803d;
      box-shadow: 0 4px 6px rgba(22, 163, 74, 0.3);
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
            <a href="#" class="nav-subitem active">Technical Proposal & RFP</a>
            <a href="company_ciselection.php" class="nav-subitem">CI Selection</a>
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
            <div class="step-title">Project Application</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item active">
            <div class="step-number">2</div>
            <div class="step-title">Technical Proposal</div>
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

      <form id="technicalRfpFormView">
        
        <!-- PAGE 1: SECTION A -->
        <div class="section-page active-page" id="page-1">
          <section class="form-section">
            
            <!-- Upper Section Action Bar with CI Selection Button -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
              <div class="section-header" style="margin-bottom: 0;">
                <div class="section-icon"><i class="fa-solid fa-building"></i></div>
                <div>
                  <span class="section-number">Section A (Page 1 of 9)</span>
                  <h2>Company Information</h2>
                  <p>Basic organization profile, factory location, and primary contact details.</p>
                </div>
              </div>

              <!-- Added Button at Upper Part of Company Info -->
              <a href="company_ciselection.php" class="btn-ci-proceed">
                Proceed to CI Selection <i class="fa-solid fa-circle-arrow-right"></i>
              </a>
            </div>

            <div class="form-card">
              <div class="form-card-title"><i class="fa-solid fa-id-card"></i> <span>Company Profile</span></div>
              <div class="form-row">
                <div class="form-group"><label>Company Name</label><input type="text" name="companyName" value="Sheng Wang Industries Sdn Bhd" disabled></div>
                <div class="form-group"><label>Year of Establishment</label><input type="text" name="yearEstablishment" value="2014" disabled></div>
              </div>
              <div class="form-group"><label>Company Address</label><textarea name="companyAddress" rows="2" disabled>8, Jalan Suria 1, Kampung Sinar Harapan, 81500 Pekan Nanas, Johor Bahru, Johor.</textarea></div>
              <div class="form-group"><label>Factory Address</label><textarea name="factoryAddress" rows="2" disabled>Same as above</textarea></div>
              <div class="form-row">
                <div class="form-group"><label>Sector</label><input type="text" name="sector" value="Manufacturing (Plastic Furniture)" disabled></div>
                <div class="form-group"><label>Production Focus</label><input type="text" name="productionFocus" value="Plastic Chairs and Tables" disabled></div>
              </div>
              <div class="form-row">
                <div class="form-group"><label>On-site Smart Factory Assessment Rating</label><input type="text" name="osfaRating" value="39% (Newcomer)" disabled></div>
                <div class="form-group"><label>Location of Project Implementation</label><input type="text" name="implementationLocation" value="Factory site" disabled></div>
              </div>

              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-address-book"></i> <span>Contact Information</span></div>
              <div class="form-row">
                <div class="form-group"><label>Contact Person & Position</label><input type="text" name="contactPerson" value="Low Zhao Jing, Manager" disabled></div>
                <div class="form-group"><label>Telephone & Fax</label><input type="text" name="telFax" value="07-6992602" disabled></div>
              </div>
              <div class="form-row">
                <div class="form-group"><label>Mobile Number</label><input type="text" name="mobileNumber" value="017-843 5505" disabled></div>
                <div class="form-group"><label>Email Address</label><input type="email" name="emailAddress" value="brucelow@shengwangind.com" disabled></div>
              </div>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <div></div>
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
                  </tr>
                </thead>
                <tbody id="painPointsBody">
                  <tr>
                    <td class="text-center row-num">1</td>
                    <td><input type="text" class="table-input" value="Manual production data monitoring and lack of real-time insights" disabled></td>
                    <td><input type="text" class="table-input" value="Estimated RM 280,000 annually due to downtime, inefficiency, and delayed response time" disabled></td>
                    <td><input type="text" class="table-input text-right" value="280,000.00" disabled></td>
                  </tr>
                  <tr>
                    <td class="text-center row-num">2</td>
                    <td><input type="text" class="table-input" value="Manual inventory and warehouse tracking system" disabled></td>
                    <td><input type="text" class="table-input" value="Estimated RM 240,000 annually due to errors, stock misplacement, and order inaccuracies" disabled></td>
                    <td><input type="text" class="table-input text-right" value="240,000.00" disabled></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="3" class="text-right"><strong>Total Losses in RM</strong></td>
                    <td><input type="text" id="totalPainLosses" class="table-input text-right" style="font-weight:700;" value="520,000.00" disabled></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(1)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <button type="button" class="btn btn-next" onclick="goToPage(3)">Next: Section C <i class="fa-solid fa-arrow-right"></i></button>
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
              <div class="form-group"><label>Project Title</label><input type="text" value="Smart Manufacturing Execution System (MES) & Warehouse Integration" disabled></div>
              <div class="form-group"><label>Project Background</label><textarea rows="2" disabled>Modernizing plastic injection operations via IoT monitoring and digital WMS.</textarea></div>
              <div class="form-group"><label>Project Overview</label><textarea rows="2" disabled>Hardware deployment across 18 operational units and mobile app integration.</textarea></div>
              <div class="form-group"><label>Project Objectives</label><textarea rows="2" disabled>1. Achieve real-time visibility. 2. Reduce downtime by 80%.</textarea></div>

              <!-- Cost Breakdown Table -->
              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-calculator"></i> <span>Project Costing</span></div>
              <table class="costing-table" id="costingTable">
                <thead>
                  <tr>
                    <th>CATEGORY</th><th>ITEM DESCRIPTION</th><th style="width: 80px;">QTY</th><th style="width: 120px;">UNIT COST</th><th style="width: 130px;">TOTAL (RM)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="category-header-row"><td colspan="5">Hardware</td></tr>
                  <tr>
                    <td>Hardware</td><td><input type="text" class="table-input" value="IoT Sensors" disabled></td>
                    <td><input type="text" class="table-input text-center" value="18" disabled></td>
                    <td><input type="text" class="table-input text-right" value="9,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="162,000.00" disabled></td>
                  </tr>
                  <tr class="subtotal-row"><td colspan="4">Hardware Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="162,000.00" disabled></td></tr>
                  
                  <tr class="category-header-row"><td colspan="5">Software</td></tr>
                  <tr>
                    <td>Software</td><td><input type="text" class="table-input" value="MES Software License" disabled></td>
                    <td><input type="text" class="table-input text-center" value="1" disabled></td>
                    <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
                  </tr>
                  <tr class="subtotal-row"><td colspan="4">Software Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="200,000.00" disabled></td></tr>
                </tbody>
                <tfoot>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Project Value (A)</td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="362,000.00" disabled></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Grant to be received (B)</td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="181,000.00" disabled></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Company contribution, C = (A-B)</td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="181,000.00" disabled></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total OSFA fee payment (Rebate), (D)</td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="8,000.00" disabled></td>
                  </tr>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total balance of the company contribution, E = (C-D)</td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="173,000.00" disabled></td>
                  </tr>
                </tfoot>
              </table>

              <!-- Payment Milestone Section -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-list-check"></i> <span>Payment Milestone</span>
              </div>

              <table class="costing-table">
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="text" class="table-input" value="Milestone 1" disabled></td>
                    <td><input type="text" class="table-input" value="1st month" disabled></td>
                    <td><textarea class="table-input" rows="3" disabled>M 1.1 : Design & Consultancy&#10;Register project&#10;Issue PO / SST to Crowd Innovator&#10;M 1.2 : Training Programme 1&#10;M 1.3 : Training Programme 2</textarea></td>
                    <td><input type="text" class="table-input text-center" value="30" disabled></td>
                    <td><input type="text" class="table-input text-right" value="150,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="142,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="8,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="300,000.00" disabled></td>
                    </tr>
                    <tr>
                    <td><input type="text" class="table-input" value="Milestone 2" disabled></td>
                    <td><input type="text" class="table-input" value="2nd month - 4th month" disabled></td>
                    <td><textarea class="table-input" rows="3" disabled>M 2.1 : System Development&#10;M 2.2 : Automation Engineering Works&#10;M 2.3 : Factory Acceptance Test</textarea></td>
                    <td><input type="text" class="table-input text-center" value="30" disabled></td>
                    <td><input type="text" class="table-input text-right" value="150,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="150,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="0.00" disabled></td>
                    <td><input type="text" class="table-input text-right" value="300,000.00" disabled></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="summary-highlight">
                    <td colspan="3" class="text-right"><strong>Grand Amount (RM)</strong></td>
                    <td><input type="text" class="table-input text-center" style="font-weight:800;" value="100%" disabled></td>
                    <td><input type="text" class="table-input text-right" style="font-weight:800;" value="500,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" style="font-weight:800;" value="492,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" style="font-weight:800;" value="8,000.00" disabled></td>
                    <td><input type="text" class="table-input text-right" style="font-weight:800;" value="1,000,000.00" disabled></td>
                    </tr>
                </tfoot>
              </table>

              <!-- Proposed Smart Technologies Table -->
              <div class="form-card-title" style="margin-top: 30px;">
                <i class="fa-solid fa-microchip"></i> <span>Proposed Smart Technologies</span>
              </div>
              <table class="costing-table">
                <thead>
                    <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 180px;">Industry 4.0 Pillar</th>
                    <th style="width: 220px;">Smart Technology</th>
                    <th>Function & Relevance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td class="text-center">1</td>
                    <td><input type="text" class="table-input" value="Internet of Things (IoT)" disabled></td>
                    <td><input type="text" class="table-input" value="Industrial IoT sensors on injection moulding machines" disabled></td>
                    <td><textarea class="table-input" rows="2" disabled>Real-time monitoring of temperature, pressure, cycle time; enables data capture from legacy machinery</textarea></td>
                    </tr>
                    <tr>
                    <td class="text-center">2</td>
                    <td><input type="text" class="table-input" value="Cyber-Physical Systems" disabled></td>
                    <td><input type="text" class="table-input" value="IIoT-ready PLCs and MES-controlled equipment" disabled></td>
                    <td><textarea class="table-input" rows="2" disabled>Enables machine-to-system feedback loop for autonomous product handling and smart scheduling</textarea></td>
                    </tr>
                </tbody>
              </table>

            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(2)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <button type="button" class="btn btn-next" onclick="goToPage(4)">Next: Section D <i class="fa-solid fa-arrow-right"></i></button>
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

            <div class="form-card">
              <div class="form-card-title">
                  <i class="fa-solid fa-diagram-project"></i> <span>Section D – Scope of Work</span>
              </div>

              <!-- Project Table Section -->
              <table class="costing-table">
                  <thead>
                  <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th style="width: 200px;">Project Title</th>
                      <th style="width: 180px;">Relevance (Pain Point)</th>
                      <th>Key Activities / Deliverables</th>
                      <th style="width: 140px;" class="text-right">Cost (RM)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="Real-Time Production Monitoring with MES" disabled></td>
                      <td><input type="text" class="table-input" value="Pain Point 1: Manual production data" disabled></td>
                      <td>
                      <textarea class="table-input" rows="4" disabled>- Deploy IoT sensors on 18 injection moulding machines
- Deploy local edge devices and data gateways
- Integrate MES software with sensors
- Create dashboard for real-time KPI display
- Enable predictive maintenance capabilities</textarea>
                      </td>
                      <td><input type="text" class="table-input text-right" value="600,000.00" disabled></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr class="summary-highlight">
                      <td colspan="4" class="text-right"><strong>Total Project Cost (RM)</strong></td>
                      <td><input type="text" class="table-input text-right" style="font-weight:800;" value="920,000.00" disabled></td>
                  </tr>
                  </tfoot>
              </table>

              <!-- Training Table Section -->
              <div style="margin-top: 25px;">
                  <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 12px;">Training Scope</h4>
              </div>

              <table class="costing-table">
                  <thead>
                  <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th style="width: 200px;">Training Title</th>
                      <th style="width: 160px;">Target Audience</th>
                      <th style="width: 110px;">Duration</th>
                      <th>Objective / Deliverables</th>
                      <th style="width: 140px;" class="text-right">Cost (RM)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="Industry 4.0 Leadership Programme" disabled></td>
                      <td><input type="text" class="table-input" value="Management" disabled></td>
                      <td><input type="text" class="table-input" value="2 Days" disabled></td>
                      <td><textarea class="table-input" rows="2" disabled>Equip decision-makers with strategic understanding of Smart Manufacturing transformation</textarea></td>
                      <td><input type="text" class="table-input text-right" value="10,000.00" disabled></td>
                  </tr>
                  </tbody>
              </table>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(3)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <button type="button" class="btn btn-next" onclick="goToPage(5)">Next: Section E <i class="fa-solid fa-arrow-right"></i></button>
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
                <p>Technical specification, total users, infrastructure requirements, hardware requirements.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-group" style="margin-bottom: 20px;">
                <label>Project Name:</label>
                <input type="text" class="form-control" value="Real-Time Production Monitoring and Smart Warehouse Integration for Sheng Wang Industries Sdn Bhd" disabled>
              </div>

              <table class="costing-table" id="specificationsTable">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">NO.</th>
                    <th style="width: 450px;">SIRIM BERHAD TECHNICAL REQUIREMENTS</th>
                    <th style="width: 120px;" class="text-center">CRITICAL CRITERIA</th>
                    <th style="width: 140px;" class="text-center">MANDATORY ATTACHMENT?</th>
                    <th style="width: 140px;" class="text-center">MANDATORY REMARKS?</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1.</td>
                    <td>
                      <div class="spec-title" style="font-weight:700;">OBJECTIVE/PURPOSE</div>
                      <textarea class="table-input" rows="3" disabled>To supply and commission a real-time production monitoring system (MES) with IoT sensor integration and WMS for smart inventory management</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" disabled></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" disabled></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" disabled></td>
                  </tr>
                  <tr>
                    <td class="text-center">2.</td>
                    <td>
                      <div class="spec-title" style="font-weight:700;">QUANTITY REQUIRED</div>
                      <textarea class="table-input" rows="6" disabled>2.1 Eighteen (18) units of IoT sensor kit to be integrated with existing machines.
2.2 Eighteen (18) units of Programmable Logic Controller (PLC) modules.
2.3 Five (5) units of edge devices.
2.4 One (1) unit of MES license.
2.5 One (1) unit WMS license.</textarea>
                    </td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" checked disabled></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" disabled></td>
                    <td class="text-center"><input type="checkbox" class="compliance-checkbox" disabled></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(4)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn btn-next" onclick="goToPage(6)">Next: Section F <i class="fa-solid fa-arrow-right"></i></button>
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
                <p>Training programmes designed to build internal capabilities.</p>
              </div>
            </div>

            <div class="form-card" style="margin-bottom: 24px;">
              <h3 style="margin-bottom: 15px; font-size: 1.1rem; color: #1e293b;">Training Overview</h3>
              <table class="costing-table">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 220px;">Programme</th>
                    <th style="width: 45%;">Objectives</th>
                    <th>Benefits</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td><input type="text" class="table-input" value="Industry 4.0 Leadership Programme" disabled></td>
                    <td><textarea class="table-input" rows="3" disabled>- Empower senior management with strategic knowledge on Industry 4.0
- Align transformation efforts with business goals</textarea></td>
                    <td><textarea class="table-input" rows="3" disabled>- Stronger decision-making capacity
- Leadership alignment for successful implementation</textarea></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="form-card">
              <h3 style="margin-bottom: 15px; font-size: 1.1rem; color: #1e293b;">Training Outcomes</h3>
              <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                <span style="font-weight: bold;">•</span>
                <input type="text" class="form-control" value="A digitally literate management team equipped to drive smart factory initiatives." disabled>
              </div>
              <div class="outcome-row" style="display: flex; gap: 10px; margin-bottom: 10px; align-items: center;">
                <span style="font-weight: bold;">•</span>
                <input type="text" class="form-control" value="Enhanced internal capacity to manage MES and WMS systems post-implementation." disabled>
              </div>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(5)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn btn-next" onclick="goToPage(7)">Next: Section G <i class="fa-solid fa-arrow-right"></i></button>
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
                <p>Specific compliance details and trainer qualifications.</p>
              </div>
            </div>

            <div class="form-card">
              <table class="costing-table">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;">No</th>
                    <th style="width: 28%;">Specification</th>
                    <th style="width: 32%;">Supporting Document from Vendor</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td><input type="text" class="table-input" value="Industry 4.0 Leadership Programme" disabled></td>
                    <td><input type="text" class="table-input" value="Training syllabus, Trainer CV, HRD Corp cert" disabled></td>
                    <td><textarea class="table-input" rows="2" disabled>Must include case studies on smart factory implementation in Malaysia</textarea></td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td><input type="text" class="table-input" value="ESG Awareness & Compliance Training" disabled></td>
                    <td><input type="text" class="table-input" value="Training outline, Environmental compliance module" disabled></td>
                    <td><textarea class="table-input" rows="2" disabled>Must cover ESG pillars, SDGs, and Malaysian regulatory expectations</textarea></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(6)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn btn-next" onclick="goToPage(8)">Next: Section H <i class="fa-solid fa-arrow-right"></i></button>
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
                <p>Applicant legal verification and formal confirmation.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title"><i class="fa-solid fa-user-check"></i> <span>Authorized Representative Details</span></div>
              
              <div class="form-row">
                <div class="form-group">
                  <label>Authorized Representative Name</label>
                  <input type="text" value="Low Zhao Jing" disabled>
                </div>
                <div class="form-group">
                  <label>Designation / Position</label>
                  <input type="text" value="Manager" disabled>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label>Official Email Address</label>
                  <input type="email" value="brucelow@shengwangind.com" disabled>
                </div>
                <div class="form-group">
                  <label>Date of Declaration</label>
                  <input type="text" value="2026-09-17" disabled>
                </div>
              </div>

              <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-stamp"></i> <span>Verification & Authorization Artifacts</span></div>
              <div class="form-row">
                <div class="form-group">
                  <label>Digital Signature</label>
                  <input type="text" value="[Signature On File / Verified]" disabled>
                </div>
                <div class="form-group">
                  <label>Company Stamp / Seal</label>
                  <input type="text" value="[Company Seal Uploaded]" disabled>
                </div>
              </div>
            </div>
          </section>

          <div class="wizard-nav-footer">
            <button type="button" class="btn btn-draft" onclick="goToPage(7)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            <button type="button" class="btn btn-next" onclick="goToPage(9)">Next: Section I <i class="fa-solid fa-arrow-right"></i></button>
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
                <p>Candidate vendor types, required smart technologies, and qualification criteria.</p>
              </div>
            </div>

            <div class="form-card">
              <div class="form-card-title">
                <i class="fa-solid fa-list-check"></i> <span>Vendor Requirements & Qualifications Matrix</span>
              </div>

              <table class="costing-table">
                <thead>
                  <tr>
                    <th style="width: 50px;" class="text-center">No</th>
                    <th style="width: 200px;">Vendor Type</th>
                    <th style="width: 220px;">Relevant Smart Technology</th>
                    <th>Requirements & Qualifications</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">1</td>
                    <td><input type="text" class="table-input" value="System Integrator" disabled></td>
                    <td><input type="text" class="table-input" value="MES, IoT, WMS Integration" disabled></td>
                    <td><textarea class="table-input" rows="3" disabled>- Minimum completed projects in MES/WMS integration
- Experience in manufacturing sector
- Must provide 12-month post-installation support</textarea></td>
                  </tr>
                  <tr>
                    <td class="text-center">2</td>
                    <td><input type="text" class="table-input" value="IoT Hardware Vendor" disabled></td>
                    <td><input type="text" class="table-input" value="Industrial sensors, edge devices, PLC gateways" disabled></td>
                    <td><textarea class="table-input" rows="3" disabled>- Devices must be compatible with MES platform
- Must meet industrial standards (IP-rated, EMC-compliant)</textarea></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Footer for Page 9 with End Badge AND Proceed Button -->
            <div class="wizard-nav-footer">
              <button type="button" class="btn btn-draft" onclick="goToPage(8)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              
              <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                <span class="view-badge"><i class="fa-solid fa-check-double"></i> End of Proposal Details</span>
                <a href="company_ciselection.php" class="btn-ci-proceed">
                  Proceed to CI Selection <i class="fa-solid fa-circle-arrow-right"></i>
                </a>
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

      // Hide all sections and show the target section
      document.querySelectorAll('.section-page').forEach(page => page.classList.remove('active-page'));
      const targetPage = document.getElementById('page-' + pageNum);
      targetPage.classList.add('active-page');
      
      currentPage = pageNum;
      
      // Safely update progress bar if the function exists
      if (typeof updateProgressBar === 'function') {
        updateProgressBar();
      }

      // Scroll smoothly to the top of the section title
      targetPage.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function updateProgressBar() {
      const percentage = Math.round((currentPage / totalPages) * 100);
      const progressFill = document.getElementById('progressFillBar');
      const progressText = document.getElementById('progressPercentageText');

      if (progressFill) progressFill.style.width = percentage + '%';
      if (progressText) progressText.textContent = percentage + '% Viewed';

      for (let i = 1; i <= totalPages; i++) {
        const tab = document.getElementById('tab-' + i);
        const badge = document.getElementById('badge-' + i);

        if (tab && badge) {
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
    }

    function toggleAccordion(button) {
      const item = button.closest('.accordion-item');
      if (item) item.classList.toggle('open');
    }
  </script>
</body>
</html>
