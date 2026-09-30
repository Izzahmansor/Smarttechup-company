<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CI Project - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="studeclaration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />

<style>
  :root {
    --primary-blue: #1e3a8a;
    --accent-blue: #2563eb;
    --text-dark: #0f172a;
    --text-muted: #64748b;
    --border-color: #e2e8f0;
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f8fafc;
    color: var(--text-dark);
    margin: 0;
    padding: 0;
  }

  .main-content {
    padding: 32px 40px;
    width: 100%;
    box-sizing: border-box;
    background: transparent !important;
    box-shadow: none !important;
  }

  /* Page Header & Actions */
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
  }

  .bidding-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    letter-spacing: -0.02em;
  }

  .bidding-subtitle {
    font-size: 0.95rem;
    color: #64748b;
    margin-top: 4px;
  }

  /* KPI Summary Cards Bar */
  .kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
    margin-bottom: 32px;
  }

  .kpi-card {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
  }

  .kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
  }

  .kpi-icon.blue { background: #eff6ff; color: #2563eb; }
  .kpi-icon.green { background: #f0fdf4; color: #16a34a; }
  .kpi-icon.amber { background: #fffbeb; color: #d97706; }
  .kpi-icon.purple { background: #faf5ff; color: #9333ea; }

  .kpi-info .kpi-value {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.2;
  }

  .kpi-info .kpi-label {
    font-size: 0.825rem;
    color: #64748b;
    font-weight: 500;
  }

  /* Toolbar Controls (Search & Filters) */
  .controls-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 20px;
  }

  .search-box {
    position: relative;
    width: 280px;
  }

  .search-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.9rem;
  }

  .search-input {
    width: 100%;
    padding: 9px 12px 9px 38px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    font-size: 0.88rem;
    color: var(--text-dark);
    outline: none;
    box-sizing: border-box;
    background: #ffffff;
    transition: all 0.2s ease;
  }

  .search-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
  }

  .filter-pills {
    display: flex;
    gap: 8px;
    align-items: center;
  }

  .filter-pill {
    padding: 7px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #475569;
    transition: all 0.2s ease;
  }

  .filter-pill.active {
    background: #2563eb;
    color: #ffffff;
    border-color: #2563eb;
  }

  .filter-pill:hover:not(.active) {
    background: #f1f5f9;
  }

  /* Interactive Data Table */
  .table-responsive {
    width: 100%;
    background: #ffffff;
    border-radius: 10px;
    border: 1px solid #cbd5e1;
    overflow: hidden;
  }

  .bidding-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
  }

  .bidding-table th {
    padding: 14px 16px;
    font-size: 0.825rem;
    font-weight: 700;
    color: #475569;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    background: #f8fafc;
    border-bottom: 1px solid #cbd5e1;
  }

  .bidding-table tbody tr {
    transition: background-color 0.15s ease;
    border-bottom: 1px solid #e2e8f0;
  }

  .bidding-table tbody tr:last-child {
    border-bottom: none;
  }

  .bidding-table tbody tr:hover {
    background-color: #f8fafc;
  }

  .bidding-table td {
    padding: 16px;
    font-size: 0.88rem;
    color: var(--text-dark);
    vertical-align: middle;
  }

  /* Formatting Row Elements */
  .date-meta {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .date-meta .start-date {
    font-weight: 600;
    color: #1e293b;
  }

  .date-meta .close-date {
    font-size: 0.8rem;
    color: #e11d48;
    font-weight: 500;
  }

  .rfp-code {
    font-family: monospace;
    font-weight: 600;
    color: #0f172a;
    background: #f1f5f9;
    padding: 3px 8px;
    border-radius: 4px;
    display: inline-block;
  }

  .project-title {
    font-weight: 600;
    color: #0f172a;
  }

  .project-subtitle {
    font-size: 0.8rem;
    color: #64748b;
    margin-top: 2px;
  }

  /* Status Badges */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.775rem;
    font-weight: 600;
  }

  .status-badge.open { background: #dcfce7; color: #15803d; }
  .status-badge.closing { background: #fef3c7; color: #b45309; }
  .status-badge.review { background: #e0e7ff; color: #4338ca; }
  .status-badge.closed { background: #f1f5f9; color: #64748b; }

  .status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
  }

  .status-badge.open .status-dot { background: #16a34a; }
  .status-badge.closing .status-dot { background: #d97706; }
  .status-badge.review .status-dot { background: #4f46e5; }
  .status-badge.closed .status-dot { background: #94a3b8; }

  /* Action Buttons */
  .btn-action {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.825rem;
    font-weight: 600;
    cursor: pointer;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #334155;
    transition: all 0.2s ease;
  }

  .btn-action:hover {
    border-color: #2563eb;
    color: #2563eb;
    background: #eff6ff;
  }

  /* Pagination Bar */
  .pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
  }

  .pagination-info {
    font-size: 0.85rem;
    color: #64748b;
  }

  .pagination-controls {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .page-btn {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    color: #475569;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .page-btn:hover:not(:disabled) {
    border-color: #2563eb;
    color: #2563eb;
  }

  .page-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .page-number {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 700;
    background: #2563eb;
    color: #ffffff;
    border-radius: 6px;
  }

  .page-select-dropdown {
    padding: 6px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.85rem;
    color: #334155;
    background: #ffffff;
    cursor: pointer;
    outline: none;
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
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Smart Tech Up</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_ci_application.php" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> CI Application</a>
            <a href="company_ci_project.php" class="nav-subitem active"><i class="fa-solid fa-file-contract"></i> CI Project</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      
      <!-- Page Title & Overview -->
      <div class="page-header">
        <div>
          <h1 class="bidding-title">Bidding Titles & RFPs</h1>
          <div class="bidding-subtitle">Explore and participate in active technological innovation projects.</div>
        </div>
      </div>

      <!-- KPI Summary Cards -->
      <div class="kpi-grid">
        <div class="kpi-card">
          <div class="kpi-icon blue"><i class="fa-solid fa-folder-open"></i></div>
          <div class="kpi-info">
            <div class="kpi-value">12</div>
            <div class="kpi-label">Total Biddings</div>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-icon green"><i class="fa-solid fa-circle-check"></i></div>
          <div class="kpi-info">
            <div class="kpi-value">4</div>
            <div class="kpi-label">Active Open Bids</div>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-icon amber"><i class="fa-solid fa-clock"></i></div>
          <div class="kpi-info">
            <div class="kpi-value">2</div>
            <div class="kpi-label">Closing Soon</div>
          </div>
        </div>
        <div class="kpi-card">
          <div class="kpi-icon purple"><i class="fa-solid fa-paper-plane"></i></div>
          <div class="kpi-info">
            <div class="kpi-value">3</div>
            <div class="kpi-label">Submitted Bids</div>
          </div>
        </div>
      </div>

      <!-- Controls: Search & Category Filters -->
      <div class="controls-bar">
        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" class="search-input" placeholder="Search RFP title or number..." />
        </div>
        
        <div class="filter-pills">
          <div class="filter-pill active">All</div>
          <div class="filter-pill">Active</div>
          <div class="filter-pill">Closing Soon</div>
          <div class="filter-pill">Under Review</div>
          <div class="filter-pill">Closed</div>
        </div>
      </div>

      <!-- Bidding Data Table -->
      <div class="table-responsive">
        <table class="bidding-table">
          <thead>
            <tr>
              <th style="width: 5%;">No.</th>
              <th style="width: 22%;">Bidding Window</th>
              <th style="width: 15%;">RFP No.</th>
              <th style="width: 32%;">Project Title & Details</th>
              <th style="width: 14%;">Status</th>
              <th style="width: 12%;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample Data Rows for Demonstration -->
            <tr>
              <td>1</td>
              <td>
                <div class="date-meta">
                  <span class="start-date">10 Sep 2026</span>
                  <span class="close-date"><i class="fa-regular fa-clock"></i> Closes 30 Sep 2026</span>
                </div>
              </td>
              <td><span class="rfp-code">RFP-2026-089</span></td>
              <td>
                <div class="project-title">Smart Factory Automation & Robotics Integration</div>
                <div class="project-subtitle">Category: Industrial IoT & Robotics</div>
              </td>
              <td>
                <span class="status-badge open">
                  <span class="status-dot"></span> Active
                </span>
              </td>
              <td>
                <button class="btn-action"><i class="fa-solid fa-eye"></i> View</button>
              </td>
            </tr>

            <tr>
              <td>2</td>
              <td>
                <div class="date-meta">
                  <span class="start-date">01 Sep 2026</span>
                  <span class="close-date"><i class="fa-regular fa-clock"></i> Closes 22 Sep 2026</span>
                </div>
              </td>
              <td><span class="rfp-code">RFP-2026-074</span></td>
              <td>
                <div class="project-title">AI-Driven Quality Inspection System</div>
                <div class="project-subtitle">Category: Machine Vision AI</div>
              </td>
              <td>
                <span class="status-badge closing">
                  <span class="status-dot"></span> Closing Soon
                </span>
              </td>
              <td>
                <button class="btn-action"><i class="fa-solid fa-eye"></i> View</button>
              </td>
            </tr>

            <tr>
              <td>3</td>
              <td>
                <div class="date-meta">
                  <span class="start-date">15 Aug 2026</span>
                  <span class="close-date">Closed 10 Sep 2026</span>
                </div>
              </td>
              <td><span class="rfp-code">RFP-2026-052</span></td>
              <td>
                <div class="project-title">Cloud ERP System Upgrade & Migration</div>
                <div class="project-subtitle">Category: Enterprise Software</div>
              </td>
              <td>
                <span class="status-badge review">
                  <span class="status-dot"></span> Under Review
                </span>
              </td>
              <td>
                <button class="btn-action"><i class="fa-solid fa-eye"></i> View</button>
              </td>
            </tr>

            <tr>
              <td>4</td>
              <td>
                <div class="date-meta">
                  <span class="start-date">01 Aug 2026</span>
                  <span class="close-date">Closed 31 Aug 2026</span>
                </div>
              </td>
              <td><span class="rfp-code">RFP-2026-031</span></td>
              <td>
                <div class="project-title">Green Energy Optimization Monitoring</div>
                <div class="project-subtitle">Category: Clean Tech & Energy</div>
              </td>
              <td>
                <span class="status-badge closed">
                  <span class="status-dot"></span> Closed
                </span>
              </td>
              <td>
                <button class="btn-action"><i class="fa-solid fa-eye"></i> View</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination Controls -->
      <div class="pagination-wrapper">
        <div class="pagination-info">Showing 1 to 4 of 12 entries</div>
        <div class="pagination-controls">
          <button class="page-btn" disabled><i class="fa-solid fa-chevron-left"></i></button>
          <span class="page-number">1</span>
          <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
          <select class="page-select-dropdown">
            <option value="15">15/page</option>
            <option value="30">30/page</option>
            <option value="50">50/page</option>
          </select>
        </div>
      </div>

    </main>

  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    // Toggle active state on filter pills
    document.querySelectorAll('.filter-pill').forEach(pill => {
      pill.addEventListener('click', function() {
        document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>

</body>
</html>