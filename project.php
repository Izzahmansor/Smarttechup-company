<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project List - Smart Tech Up</title>
  
  <!-- Font Awesome Icons & Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="project_style.css" />
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
            <li><a href="#">01 DMT OSFA</a></li>
            <li><a href="#">02 DMT CI</a></li>
            <li><a href="#" class="active">03 DMT Project</a></li>
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

      <!-- Main Project Panel -->
      <div class="content-body">
        
        <div class="panel-header">
          <h1 class="page-title">Project List</h1>
          <div class="stat-count">
            Companies Applied for Projects: <span class="count-number">70</span>
          </div>
        </div>

        <!-- Toolbar Section: Search & Filters Left, Export Right -->
        <div class="controls-toolbar">
          
          <!-- Left Stack: Search Input with Filters Below -->
          <div class="left-controls-group">
            <div class="intelligent-search-box">
              <i class="fa-solid fa-magnifying-glass search-icon"></i>
              <input type="text" placeholder="Search by company profile, SSM, status, assessor..." />
            </div>

            <div class="filter-dropdowns">
              <select class="filter-select">
                <option value="">Filter Subprogram (All)</option>
                <option value="stu">STU</option>
                <option value="fast-lane">STU Fast Lane</option>
                <option value="ppp">STU PPP</option>
              </select>

              <select class="filter-select">
                <option value="">Filter Status (All)</option>
                <option value="submitted">Proposal Submitted</option>
                <option value="released">Proposal Released</option>
                <option value="accepted">Proposal Accepted</option>
                <option value="withdrawn">Withdrawn</option>
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
          <table class="project-table">
            <thead>
              <tr>
                <th style="width: 4%;">No.</th>
                <th style="width: 18%; cursor: pointer;" class="sortable-th">
                  Company Name <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 12%; cursor: pointer;" class="sortable-th">
                  Subprogram <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 10%; cursor: pointer;" class="sortable-th">
                  Project's Status <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 16%; cursor: pointer;" class="sortable-th">
                  Project's Title <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 26%; cursor: pointer;" class="sortable-th">
                  Technical Proposal and RFP Status <i class="fa-solid fa-sort sort-icon"></i>
                </th>
                <th style="width: 14%; text-align: right;">Actions</th>
              </tr>
            </thead>
            <tbody>
              
              <!-- Row 1 -->
              <tr>
                <td>1.</td>
                <td>
                  <strong class="company-name">HISTOTECH ENGINEERING SDN BHD</strong>
                  <div class="sub-meta">OSFA Accepted: 02/08/2026</div>
                  <div class="sub-meta">Apply Project: 02/08/2026</div>
                </td>
                <td>
                  <span class="subprogram-badge stu">STU</span>
                </td>
                <td>
                  <span class="badge-status accepted">ACCEPTED</span>
                  <div class="sub-meta mt-1">02/08/2026</div>
                </td>
                <td>-</td>
                <td>
                  <div class="rfp-details">
                    <div class="assigned-person"><i class="fa-solid fa-user"></i> HASLAN FADLI BIN AHMAD MARZUKI</div>
                    <div class="date-log">ASSIGNED: 03/08/2026</div>
                    <div class="date-log">ACCEPTED: 04/08/2026</div>
                    
                    <div class="status-alert danger mt-2">
                      Technical Proposal and RFP Uploaded:
                      <div>- DELAYED</div>
                    </div>
                    
                    <div class="status-alert alert-text mt-1">
                      Technical Proposal and RFP Submitted:
                      <div>-</div>
                    </div>

                    <div class="status-alert alert-text mt-1">
                      Technical Proposal and RFP Released to Company:
                      <div>-</div>
                    </div>

                    <div class="status-alert alert-text mt-1">
                      Technical Proposal and RFP Accepted by Company:
                      <div>-</div>
                    </div>

                    <button class="btn-toggle-rfp">
                      <i class="fa-solid fa-chevron-up"></i> View Technical Proposal and RFP
                    </button>
                  </div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action"><i class="fa-regular fa-eye"></i> View OSFA Report</button>
                  <button class="btn-action"><i class="fa-regular fa-eye"></i> View PM</button>
                </td>
              </tr>

              <!-- Row 2 -->
              <tr>
                <td>2.</td>
                <td>
                  <strong class="company-name">WILRON PRODUCTS SDN BHD</strong>
                  <div class="sub-meta">OSFA Accepted: 24/07/2026</div>
                </td>
                <td>
                  <span class="subprogram-badge fast-lane">STU Fast Lane</span>
                </td>
                <td>
                  <span class="badge-status accepted">ACCEPTED</span>
                </td>
                <td>
                  <strong class="project-title-text">SMART AUTOMATED RAW MATERIAL</strong>
                </td>
                <td>
                  <div class="rfp-details">
                    <div class="assigned-person"><i class="fa-solid fa-user"></i> Ir. Ts. LUQMAAN BIN AHMAD ZAIDI</div>
                    <div class="date-log">ASSIGNED: 24/07/2026</div>
                    <div class="date-log">ACCEPTED: 24/07/2026</div>

                    <div class="status-alert info mt-2">
                      Technical Proposal and RFP Uploaded:
                      <div class="date-log">25/07/2026</div>
                    </div>

                    <div class="status-alert alert-text mt-1">
                      Technical Proposal and RFP Submitted:
                    </div>
                  </div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action"><i class="fa-regular fa-eye"></i> View OSFA Report</button>
                </td>
              </tr>

              <!-- Row 3 Example -->
              <tr>
                <td>3.</td>
                <td>
                  <strong class="company-name">TECHNO PRECISION SDN BHD</strong>
                  <div class="sub-meta">OSFA Accepted: 15/07/2026</div>
                </td>
                <td>
                  <span class="subprogram-badge ppp">STU PPP</span>
                </td>
                <td>
                  <span class="badge-status accepted">ACCEPTED</span>
                </td>
                <td>
                  <strong class="project-title-text">IOT FACTORY AUTOMATION SYSTEM</strong>
                </td>
                <td>
                  <div class="rfp-details">
                    <div class="assigned-person"><i class="fa-solid fa-user"></i> NOR MANISAH BINTI MOHAMAD</div>
                    <div class="date-log">ASSIGNED: 16/07/2026</div>
                    <div class="date-log">ACCEPTED: 17/07/2026</div>
                  </div>
                </td>
                <td class="actions-cell">
                  <button class="btn-action"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                  <button class="btn-action"><i class="fa-regular fa-eye"></i> View OSFA Report</button>
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