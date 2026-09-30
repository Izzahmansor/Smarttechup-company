<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Onsite Assessment - Smart Tech Up</title>
  
  <!-- Font Awesome Icons & Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="onsite_assessment_style.css" />
</head>
<body>

  <!-- Top Dark Header Bar -->
  <header class="app-header">
    <div class="header-left">
      <img src="miti-sirim-logo.png" alt="MITI & SIRIM Logo" class="header-logo" />
    </div>
    <div class="header-right">
      <div class="user-menu">
        <i class="fa-solid fa-user-circle user-avatar"></i>
        <span class="user-email">izzahmansor909@gmail.com</span>
        <i class="fa-solid fa-caret-down"></i>
      </div>
    </div>
  </header>

  <!-- Main Container -->
  <div class="dashboard-container">

    <!-- Sidebar Navigation -->
    <aside class="sidebar">
      <div class="user-profile-summary">
        <p class="greeting">Hi,</p>
        <p class="user-name-full">izzahmansor909@gmail.com</p>
        <p class="user-handle">izzahmansor909@gm</p>
        <span class="role-badge">SIRIM DMT</span>
      </div>

      <nav class="sidebar-nav">
        <!-- Dashboard Category -->
        <div class="nav-section">
          <div class="section-title">
            <span>Dashboard</span>
            <i class="fa-solid fa-chevron-up"></i>
          </div>
          <ul class="nav-menu">
            <li><a href="#">Main</a></li>
            <li><a href="#">Company Profile and Self A...</a></li>
            <li><a href="#">OSFA</a></li>
            <li><a href="#">Project</a></li>
            <li><a href="#">Operational Dashboard</a></li>
            <li><a href="#">KPI Dashboard</a></li>
            <li><a href="#">Collaborator</a></li>
            <li><a href="#">Reporting</a></li>
          </ul>
        </div>

        <!-- Smart Tech Up Category -->
        <div class="nav-section">
          <div class="section-title">
            <span>Smart Tech Up</span>
            <i class="fa-solid fa-chevron-up"></i>
          </div>
          <ul class="nav-menu">
            <li><a href="#" class="active">01 DMT OSFA</a></li>
            <li><a href="#">02 DMT CI</a></li>
            <li><a href="#">03 DMT Project</a></li>
            <li><a href="#">04 DMT Bidding List</a></li>
            <li><a href="#">05 TEC Secretariat</a></li>
            <li><a href="#">06 Approval Committee Pro...</a></li>
            <li><a href="#">Self-Assessment Simulation</a></li>
            <li><a href="#">Training Provider List</a></li>
          </ul>
        </div>

        <!-- Payment Category -->
        <div class="nav-section">
          <div class="section-title">
            <span>Payment</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

        <!-- Register Category -->
        <div class="nav-section">
          <div class="section-title">
            <span>Register</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>

        <!-- User View -->
        <div class="nav-section">
          <ul class="nav-menu single">
            <li><a href="#">User View</a></li>
          </ul>
        </div>
      </nav>
    </aside>

    <!-- Content Workspace -->
    <main class="main-content">
      
      <!-- Sub Breadcrumb Bar -->
      <div class="sub-header">
        <button class="toggle-btn"><i class="fa-solid fa-bars"></i></button>
        <a href="#" class="btn-overview"><i class="fa-solid fa-chevron-left"></i> Overview</a>
        <span class="breadcrumb-title">Smart Tech Up</span>
      </div>

      <!-- Main Onsite Assessment Panel -->
      <div class="content-body">
        
        <div class="panel-header">
          <h1 class="page-title">Onsite Assessment</h1>
          <div class="stat-group">
            <div class="stat-item">Registered Companies: <span class="count-number">340</span></div>
            <div class="stat-item">Companies Passed SA: <span class="count-number green">182</span></div>
            <div class="stat-item">Companies Failed SA: <span class="count-number red">158</span></div>
          </div>
        </div>

        <!-- Toolbar Section: Search & Specific Filters Left, Export Right -->
        <div class="controls-toolbar">
          
          <!-- Left Stack: Search Input with Status Filters Below -->
          <div class="left-controls-group">
            <div class="intelligent-search-box">
              <i class="fa-solid fa-magnifying-glass search-icon"></i>
              <input type="text" placeholder="Search by company name, SSM, assessors..." />
            </div>

            <div class="filter-dropdowns">
              <select class="filter-select">
                <option value="">Filter SA Status (All)</option>
                <option value="passed">SA Passed</option>
                <option value="failed">SA Failed</option>
              </select>

              <select class="filter-select">
                <option value="">Filter Status (All)</option>
                <option value="nda_agreed">NDA Agreed</option>
                <option value="nda_not_agreed">NDA Not Agreed Yet</option>
                <option value="osfa_interested">OSFA Interested</option>
                <option value="fee_paid">OSFA Fee Paid</option>
                <option value="conducted">OSFA Conducted</option>
                <option value="report_submitted">OSFA Report Submitted</option>
                <option value="report_released">OSFA Report Released</option>
              </select>
            </div>
          </div>

          <!-- Right Action: Export Options -->
          <div class="export-actions">
            <span class="export-label">Export:</span>
            <button class="btn-export pdf" title="Export to PDF"><i class="fa-solid fa-file-pdf"></i> PDF</button>
            <button class="btn-export excel" title="Export to Excel"><i class="fa-solid fa-file-excel"></i> Excel</button>
            <button class="btn-export ppt" title="Export to PPT"><i class="fa-solid fa-file-powerpoint"></i> PPT</button>
          </div>

        </div>

        <!-- Data Table (Sortable Headers) -->
        <div class="table-container">
          <table class="assessment-table">
            <thead>
              <tr>
                <th style="width: 4%;">No.</th>
                <th style="width: 26%; cursor: pointer;" class="sortable-th">
                  Company Name <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 14%; cursor: pointer;" class="sortable-th">
                  SA Status <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 18%; cursor: pointer;" class="sortable-th">
                  Status <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 16%; cursor: pointer;" class="sortable-th">
                  Assessors & OSFA Date <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 10%;">Loan</th>
                <th style="width: 12%; text-align: right;">Actions</th>
              </tr>
            </thead>
            <tbody>
              
              <!-- Row 1 -->
              <tr>
                <td>1.</td>
                <td>
                  <strong class="company-name">TS PREMIX SDN. BHD.</strong>
                  <div class="sub-meta">SA: 08/09/2026</div>
                  <div class="sub-meta">NDA: -</div>
                  <div class="sub-meta">PAY: -</div>
                </td>
                <td>
                  <span class="status-pass">PASSED (42%)</span>
                  <div class="sub-meta text-red">NOT SCREENED</div>
                </td>
                <td>
                  <div class="text-red-sm">TERMS NOT YET AGREE</div>
                  <div class="sub-meta">NDA NOT NEEDED</div>
                  <div class="sub-meta font-bold">NOT PAID</div>
                </td>
                <td>-</td>
                <td>
                  <strong class="loan-title">FI Application Submission:</strong>
                  <div class="sub-meta">Pending</div>
                  <div class="sub-meta">-</div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action btn-blue"><i class="fa-solid fa-clipboard-check"></i> Technical Screening</button>
                </td>
              </tr>

              <!-- Row 2 -->
              <tr>
                <td>2.</td>
                <td>
                  <strong class="company-name">BANLOONG MANUFACTURING SDN BHD</strong>
                  <div class="sub-meta">SA: 28/08/2026</div>
                  <div class="sub-meta">NDA: -</div>
                  <div class="sub-meta">PAY: -</div>
                </td>
                <td>
                  <span class="status-fail">FAILED (25%)</span>
                  <div class="sub-meta text-orange">INTEREST PENDING</div>
                  <div class="sub-meta text-red">NOT SCREENED</div>
                </td>
                <td>
                  <div class="text-red-sm">TERMS NOT YET AGREE</div>
                  <div class="sub-meta">NDA NOT NEEDED</div>
                  <div class="sub-meta font-bold">NOT PAID</div>
                </td>
                <td>-</td>
                <td>
                  <strong class="loan-title">FI Application Submission:</strong>
                  <div class="sub-meta">Pending</div>
                  <div class="sub-meta">-</div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action btn-blue"><i class="fa-solid fa-clipboard-check"></i> Technical Screening</button>
                </td>
              </tr>

              <!-- Row 3 -->
              <tr>
                <td>3.</td>
                <td>
                  <strong class="company-name">HWA TAI FOOD INDUSTRIES (SABAH) SDN. BHD.</strong>
                  <div class="sub-meta">SA: 28/08/2026</div>
                  <div class="sub-meta">NDA: -</div>
                  <div class="sub-meta">PAY: -</div>
                </td>
                <td>
                  <span class="status-fail">FAILED (14%)</span>
                  <div class="sub-meta text-teal">OSFA INTERESTED</div>
                  <div class="sub-meta text-red">NOT SCREENED</div>
                </td>
                <td>
                  <div class="text-red-sm">TERMS NOT YET AGREE</div>
                  <div class="sub-meta">NDA NOT NEEDED</div>
                  <div class="sub-meta font-bold">NOT PAID</div>
                </td>
                <td>-</td>
                <td>
                  <strong class="loan-title">FI Application Submission:</strong>
                  <div class="sub-meta">Pending</div>
                  <div class="sub-meta">-</div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action btn-blue"><i class="fa-solid fa-clipboard-check"></i> Technical Screening</button>
                </td>
              </tr>

              <!-- Row 4 -->
              <tr>
                <td>4.</td>
                <td>
                  <strong class="company-name">METHOD ENTERPRISE SDN BHD</strong>
                  <div class="sub-meta">SA: 28/08/2026</div>
                </td>
                <td>
                  <span class="status-fail">FAILED (28%)</span>
                  <div class="sub-meta text-orange">INTEREST PENDING</div>
                </td>
                <td>
                  <div class="text-red-sm">TERMS NOT YET AGREE</div>
                </td>
                <td>-</td>
                <td>
                  <strong class="loan-title">FI Application Submission:</strong>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </main>

  </div>

  <!-- Floating Action Sync Button -->
  <div class="floating-btn">
    <i class="fa-solid fa-rotate"></i>
  </div>

</body>
</html>