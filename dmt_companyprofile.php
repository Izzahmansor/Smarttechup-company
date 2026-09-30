<?php 
  $page_title = "Company Registration & Application Dashboard";
  include 'dmt_navbar.php'; 
?>

<!-- FontAwesome & Google Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  :root {
    --bg-main: #f8fafc;
    --card-bg: #ffffff;
    --text-primary: #0f172a;
    --text-secondary: #475569;
    --text-muted: #94a3b8;
    --border-color: #e2e8f0;
    --primary-blue: #2563eb;
    --primary-blue-light: #eff6ff;
    --accent-emerald: #10b981;
    --accent-emerald-light: #ecfdf5;
    --accent-rose: #f43f5e;
    --accent-rose-light: #fff1f2;
    --accent-amber: #f59e0b;
    --accent-amber-light: #fffbebf;
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
  }

  body {
    background-color: var(--bg-main);
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--text-primary);
  }

  .dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 32px 24px;
  }

  /* Header Section */
  .dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 28px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border-color);
  }

  .dashboard-header h1 {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0 0 6px 0;
    letter-spacing: -0.02em;
  }

  .dashboard-header p {
    margin: 0;
    color: var(--text-secondary);
    font-size: 0.9rem;
  }

  .as-of-badge {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--text-secondary);
    box-shadow: var(--shadow-sm);
  }

  /* Section Titles */
  .section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-title i {
    color: var(--primary-blue);
  }

  /* KPI Grid */
  .kpi-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
    margin-bottom: 32px;
  }

  .kpi-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 14px;
    padding: 20px;
    box-shadow: var(--shadow-sm);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }

  .kpi-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
  }

  .kpi-title {
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-secondary);
    line-height: 1.3;
  }

  .kpi-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
  }

  .kpi-value {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text-primary);
    line-height: 1;
    margin-bottom: 8px;
  }

  .kpi-subtext {
    font-size: 0.75rem;
    color: var(--text-muted);
    font-weight: 500;
  }

  /* Icon Theme Colors */
  .icon-blue { background: var(--primary-blue-light); color: var(--primary-blue); }
  .icon-emerald { background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .icon-rose { background: var(--accent-rose-light); color: var(--accent-rose); }
  .icon-amber { background: #fffbebf; color: var(--accent-amber); }
  .icon-indigo { background: #eef2ff; color: #4f46e5; }

  /* Charts Layout Grid */
  .charts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 32px;
  }

  .chart-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 20px;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
  }

  .chart-header {
    margin-bottom: 16px;
  }

  .chart-header h3 {
    font-size: 0.98rem;
    font-weight: 700;
    margin: 0;
    color: var(--text-primary);
  }

  .chart-body {
    position: relative;
    flex-grow: 1;
    min-height: 220px;
  }

  /* Table Container Card */
  .table-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 24px;
    box-shadow: var(--shadow-sm);
  }

  /* Filter Controls */
  .filter-bar {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .search-input {
    flex-grow: 1;
    min-width: 240px;
    position: relative;
  }

  .search-input i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
  }

  .search-input input {
    width: 100%;
    padding: 10px 14px 10px 40px;
    border-radius: 10px;
    border: 1px solid var(--border-color);
    font-size: 0.88rem;
    outline: none;
    transition: border-color 0.2s ease;
  }

  .search-input input:focus {
    border-color: var(--primary-blue);
  }

  .filter-select {
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid var(--border-color);
    font-size: 0.88rem;
    background-color: #fff;
    color: var(--text-secondary);
    outline: none;
    cursor: pointer;
  }

  /* Table Tabs */
  .table-tabs {
    display: flex;
    gap: 8px;
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 16px;
  }

  .tab-btn {
    padding: 10px 18px;
    background: none;
    border: none;
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--text-secondary);
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .tab-btn.active {
    color: var(--primary-blue);
    border-bottom-color: var(--primary-blue);
  }

  .badge-count {
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 700;
  }

  .badge-pass { background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .badge-fail { background: var(--accent-rose-light); color: var(--accent-rose); }

  /* Data Table Styling */
  .custom-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.88rem;
  }

  .custom-table th {
    background: #f8fafc;
    padding: 12px 16px;
    font-weight: 700;
    color: var(--text-secondary);
    border-bottom: 1px solid var(--border-color);
  }

  .custom-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
  }

  .custom-table tbody tr:hover {
    background-color: #f8fafc;
  }

  .company-name {
    font-weight: 700;
    color: var(--text-primary);
  }

  .company-address {
    font-size: 0.78rem;
    color: var(--text-muted);
  }

  /* Status Chips */
  .status-chip {
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 4px;
  }

  .chip-success { background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .chip-danger { background: var(--accent-rose-light); color: var(--accent-rose); }
  .chip-info { background: var(--primary-blue-light); color: var(--primary-blue); }

  /* Responsive Adjustments */
  @media (max-width: 1200px) {
    .kpi-grid { grid-template-columns: repeat(3, 1fr); }
    .charts-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 768px) {
    .kpi-grid { grid-template-columns: repeat(1, 1fr); }
    .charts-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="dashboard-container">

  <!-- Header -->
  <div class="dashboard-header">
    <div>
      <h1>Company Registration & Application</h1>
      <p>Overview of portal submissions, assessment distributions, and applicant profiles.</p>
    </div>
    <div class="as-of-badge">
      <i class="fa-regular fa-calendar-check me-1"></i> As of 21st Sep 2026
    </div>
  </div>

  <!-- Key Metrics (KPIs) -->
  <div class="section-title">
    <i class="fa-solid fa-chart-line"></i> Key Performance Metrics
  </div>

  <div class="kpi-grid">
    <!-- Registered -->
    <div class="kpi-card">
      <div class="kpi-header">
        <span class="kpi-title">STU Registered</span>
        <div class="kpi-icon icon-blue"><i class="fa-solid fa-building"></i></div>
      </div>
      <div class="kpi-value">32</div>
      <div class="kpi-subtext">Total Portal Accounts</div>
    </div>

    <!-- Self-Assessment Passed -->
    <div class="kpi-card">
      <div class="kpi-header">
        <span class="kpi-title">Assessment Conducted</span>
        <div class="kpi-icon icon-emerald"><i class="fa-solid fa-file-signature"></i></div>
      </div>
      <div class="kpi-value">7</div>
      <div class="kpi-subtext">5 Passed / 2 Failed</div>
    </div>

    <!-- Not Conducted -->
    <div class="kpi-card">
      <div class="kpi-header">
        <span class="kpi-title">Assessment Pending</span>
        <div class="kpi-icon icon-rose"><i class="fa-solid fa-clock-rotate-left"></i></div>
      </div>
      <div class="kpi-value">25</div>
      <div class="kpi-subtext">Not Yet Submitted</div>
    </div>

    <!-- OSFA Paid -->
    <div class="kpi-card">
      <div class="kpi-header">
        <span class="kpi-title">OSFA Paid</span>
        <div class="kpi-icon icon-amber"><i class="fa-solid fa-credit-card"></i></div>
      </div>
      <div class="kpi-value">3</div>
      <div class="kpi-subtext">Completed Payments</div>
    </div>

    <!-- Projects Initiated -->
    <div class="kpi-card">
      <div class="kpi-header">
        <span class="kpi-title">Projects Initiated</span>
        <div class="kpi-icon icon-indigo"><i class="fa-solid fa-diagram-project"></i></div>
      </div>
      <div class="kpi-value">3</div>
      <div class="kpi-subtext">Active Implementations</div>
    </div>
  </div>

  <!-- Charts Breakdown -->
  <div class="section-title">
    <i class="fa-solid fa-chart-pie"></i> Profile Distributions
  </div>

  <div class="charts-grid">
    <!-- Chart 1: Profile Breakdown -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>Company Type & Size</h3>
      </div>
      <div class="chart-body">
        <canvas id="typeSizeChart"></canvas>
      </div>
    </div>

    <!-- Chart 2: Sector Breakdown -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>By Sector (Manufacturing)</h3>
      </div>
      <div class="chart-body">
        <canvas id="sectorChart"></canvas>
      </div>
    </div>

    <!-- Chart 3: Location Breakdown -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>Geographical Distribution</h3>
      </div>
      <div class="chart-body">
        <canvas id="locationChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Detailed Applications Table -->
  <div class="section-title">
    <i class="fa-solid fa-list-check"></i> Registered Companies List
  </div>

  <div class="table-card">
    
    <!-- Filter Toolbar -->
    <div class="filter-bar">
      <div class="search-input">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="searchInput" placeholder="Search by company name...">
      </div>
      <select class="filter-select" id="stateFilter">
        <option value="">All States</option>
        <option value="Kuala Lumpur">Kuala Lumpur</option>
        <option value="Selangor">Selangor</option>
        <option value="Johor">Johor</option>
      </select>
      <select class="filter-select" id="typeFilter">
        <option value="">All Types</option>
        <option value="Manufacturing">Manufacturing</option>
        <option value="Manufacturing Related Services">Manufacturing Related Services</option>
      </select>
    </div>

    <!-- Tabs -->
    <div class="table-tabs">
      <button class="tab-btn active" onclick="switchTab('pass')">
        <i class="fa-solid fa-circle-check text-success"></i> Passed Applicants 
        <span class="badge-count badge-pass">5</span>
      </button>
      <button class="tab-btn" onclick="switchTab('fail')">
        <i class="fa-solid fa-circle-xmark text-danger"></i> Failed Applicants 
        <span class="badge-count badge-fail">2</span>
      </button>
    </div>

    <!-- Table Container -->
    <div style="overflow-x: auto;">
      <table class="custom-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Company Name</th>
            <th>Submission Date</th>
            <th>Sector / Type</th>
            <th>Revenue</th>
            <th>SA Status</th>
            <th>DMU / NDA Status</th>
          </tr>
        </thead>
        <tbody id="companyTableBody">
          <!-- Rows rendered by JavaScript -->
        </tbody>
      </table>
    </div>

  </div>

</div>

<script>
  // Dataset definitions
  const passedCompanies = [
    { no: 1, name: '01 STUUSER PRODUCTS SDN BHD', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '27/07/2026', type: 'Manufacturing', sector: 'Wood, Paper & Furniture', revenue: 'RM 150k', saStatus: 'PASSED (51%)', dmuStatus: 'SCREENED', nda: 'AGREE', payment: 'PAID' },
    { no: 2, name: 'STUUSER07 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '19/08/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'PASSED (50%)', dmuStatus: 'SCREENED', nda: 'NOT AGREE', payment: 'NOT PAID' },
    { no: 3, name: 'STUUSER06 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '27/07/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'PASSED (50%)', dmuStatus: 'SCREENED', nda: 'AGREE', payment: 'PAID' },
    { no: 4, name: 'STUUSER05 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '27/07/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'PASSED (50%)', dmuStatus: 'SCREENED', nda: 'AGREE', payment: 'PAID' },
    { no: 5, name: 'STUUSER04 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '27/07/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'PASSED (50%)', dmuStatus: 'SCREENED', nda: 'AGREE', payment: 'NOT PAID' }
  ];

  const failedCompanies = [
    { no: 1, name: 'AURA 1 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '17/09/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'FAILED (0%)', dmuStatus: 'NOT SCREENED', nda: 'AGREE', payment: 'NOT PAID' },
    { no: 2, name: 'STUREACTUSER01 COMPANY', address: '123, Jalan 1, Taman 1, Kuala Lumpur', date: '19/08/2026', type: 'Manufacturing', sector: 'Automotive', revenue: 'RM 150k', saStatus: 'FAILED (30%)', dmuStatus: 'SCREENED', nda: 'AGREE', payment: 'PAID' }
  ];

  let currentTab = 'pass';

  function renderTable() {
    const data = currentTab === 'pass' ? passedCompanies : failedCompanies;
    const tbody = document.getElementById('companyTableBody');
    tbody.innerHTML = '';

    data.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.no}</td>
        <td>
          <div class="company-name">${item.name}</div>
          <div class="company-address">${item.address}</div>
        </td>
        <td>${item.date}</td>
        <td>
          <div>${item.type}</div>
          <small class="text-muted">${item.sector}</small>
        </td>
        <td>${item.revenue}</td>
        <td>
          <span class="status-chip ${currentTab === 'pass' ? 'chip-success' : 'chip-danger'}">
            ${item.saStatus}
          </span>
        </td>
        <td>
          <div class="status-chip chip-info mb-1">${item.dmuStatus}</div>
          <div class="text-sub">NDA: <strong>${item.nda}</strong> | ${item.payment}</div>
        </td>
      `;
      tbody.appendChild(row);
    });
  }

  function switchTab(tab) {
    currentTab = tab;
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.currentTarget.classList.add('active');
    renderTable();
  }

  // Initialize Data Table & Charts
  document.addEventListener('DOMContentLoaded', () => {
    renderTable();

    // Chart 1: Doughnut for Company Type/Size
    new Chart(document.getElementById('typeSizeChart'), {
      type: 'doughnut',
      data: {
        labels: ['Small (4)', 'Micro (3)', 'Manufacturing (7)'],
        datasets: [{
          data: [4, 3, 7],
          backgroundColor: ['#3b82f6', '#ec4899', '#10b981']
        }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });

    // Chart 2: Bar for Sectors
    new Chart(document.getElementById('sectorChart'), {
      type: 'bar',
      data: {
        labels: ['Automotive', 'Plastic'],
        datasets: [{
          label: 'Companies',
          data: [6, 1],
          backgroundColor: '#f59e0b',
          borderRadius: 6
        }]
      },
      options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
    });

    // Chart 3: Bar for States
    new Chart(document.getElementById('locationChart'), {
      type: 'bar',
      data: {
        labels: ['WP Kuala Lumpur', 'Selangor'],
        datasets: [{
          label: 'Companies',
          data: [4, 3],
          backgroundColor: '#6366f1',
          borderRadius: 6
        }]
      },
      options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
    });
  });
</script>

<?php include 'dmt_footer.php'; ?>