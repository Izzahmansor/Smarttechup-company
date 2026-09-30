<?php 
  $page_title = "Project Dashboard";
  include 'dmt_navbar.php'; 
?>

<!-- FontAwesome & Google Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

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
    --accent-amber-light: #fffbeb;
    --accent-purple: #8b5cf6;
    --accent-purple-light: #f3e8ff;
    --accent-indigo: #6366f1;
    --accent-indigo-light: #e0e7ff;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.06), 0 2px 4px -1px rgba(0, 0, 0, 0.04);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
  }

  body {
    background-color: var(--bg-main);
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: var(--text-primary);
  }

  .dashboard-container {
    max-width: 1440px;
    margin: 0 auto;
    padding: 28px 24px 48px;
  }

  /* Executive Header Bar */
  .dashboard-header {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 28px;
    box-shadow: var(--shadow-sm);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
  }

  .header-title-area h1 {
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    letter-spacing: -0.025em;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .header-title-area p {
    margin: 0;
    color: var(--text-secondary);
    font-size: 0.875rem;
  }

  .header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .as-of-badge {
    background: #f1f5f9;
    border: 1px solid var(--border-color);
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 0.8125rem;
    font-weight: 600;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .btn-refresh {
    background: var(--primary-blue-light);
    color: var(--primary-blue);
    border: 1px solid rgba(37, 99, 235, 0.2);
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 0.8125rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .btn-refresh:hover {
    background: var(--primary-blue);
    color: #ffffff;
  }

  /* Section Title Standard */
  .section-title-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
  }

  .section-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-title i {
    color: var(--primary-blue);
  }

  /* Funnel / Lifecycle Process Flow */
  .funnel-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 12px;
    margin-bottom: 32px;
    position: relative;
  }

  .funnel-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 14px;
    padding: 18px 12px;
    box-shadow: var(--shadow-sm);
    text-align: center;
    position: relative;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
  }

  .funnel-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--card-accent, var(--primary-blue));
  }

  .funnel-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
  }

  .funnel-step-number {
    font-size: 0.6875rem;
    font-weight: 800;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 8px;
  }

  .funnel-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    margin: 0 auto 10px auto;
  }

  .funnel-title {
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--text-secondary);
    min-height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1.25;
  }

  .funnel-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-top: 6px;
    letter-spacing: -0.02em;
  }

  /* Icon Theme Helpers */
  .theme-blue { --card-accent: var(--primary-blue); background: var(--primary-blue-light); color: var(--primary-blue); }
  .theme-emerald { --card-accent: var(--accent-emerald); background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .theme-amber { --card-accent: var(--accent-amber); background: var(--accent-amber-light); color: var(--accent-amber); }
  .theme-purple { --card-accent: var(--accent-purple); background: var(--accent-purple-light); color: var(--accent-purple); }
  .theme-indigo { --card-accent: var(--accent-indigo); background: var(--accent-indigo-light); color: var(--accent-indigo); }
  .theme-rose { --card-accent: var(--accent-rose); background: var(--accent-rose-light); color: var(--accent-rose); }

  /* Charts Section */
  .charts-row-top {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 24px;
  }

  .charts-row-bottom {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 20px;
    margin-bottom: 32px;
  }

  .chart-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: var(--shadow-sm);
    display: flex;
    flex-direction: column;
  }

  .chart-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
  }

  .chart-card-header h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
  }

  .chart-card-header span {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--text-muted);
  }

  .chart-wrapper {
    position: relative;
    flex-grow: 1;
    min-height: 260px;
  }

  /* Table Container */
  .table-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 24px;
    box-shadow: var(--shadow-sm);
  }

  .table-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    gap: 16px;
    flex-wrap: wrap;
  }

  .search-box {
    position: relative;
    min-width: 320px;
  }

  .search-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 0.9rem;
  }

  .search-box input {
    width: 100%;
    padding: 10px 14px 10px 40px;
    border-radius: 10px;
    border: 1px solid var(--border-color);
    font-size: 0.875rem;
    outline: none;
    background-color: var(--bg-main);
    transition: all 0.2s ease;
  }

  .search-box input:focus {
    background-color: #ffffff;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
  }

  .table-responsive {
    overflow-x: auto;
    border-radius: 10px;
    border: 1px solid var(--border-color);
  }

  .custom-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.875rem;
  }

  .custom-table th {
    background: #f8fafc;
    padding: 14px 16px;
    font-weight: 700;
    color: var(--text-secondary);
    border-bottom: 1px solid var(--border-color);
    white-space: nowrap;
  }

  .custom-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
    color: var(--text-primary);
  }

  .custom-table tbody tr:last-child td {
    border-bottom: none;
  }

  .custom-table tbody tr:hover {
    background-color: #f8fafc;
  }

  .company-cell {
    font-weight: 700;
    color: var(--text-primary);
  }

  .pm-cell {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .pm-name {
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.85rem;
  }

  /* Enhanced Status Badges */
  .badge-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    width: fit-content;
  }

  .badge-status-accepted {
    background: var(--accent-emerald-light);
    color: #047857;
    border: 1px solid rgba(16, 185, 129, 0.2);
  }

  .badge-status-pending {
    background: var(--accent-amber-light);
    color: #b45309;
    border: 1px solid rgba(245, 158, 11, 0.2);
  }

  .badge-status-pm-assign {
    background: var(--accent-rose-light);
    color: #be123c;
    border: 1px solid rgba(244, 63, 94, 0.2);
  }

  .date-chip {
    font-family: monospace;
    font-size: 0.82rem;
    color: var(--text-secondary);
    background: #f1f5f9;
    padding: 3px 8px;
    border-radius: 6px;
    display: inline-block;
  }

  .pagination-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid var(--border-color);
    font-size: 0.825rem;
    color: var(--text-secondary);
  }

  /* Responsive Adjustments */
  @media (max-width: 1200px) {
    .funnel-grid { grid-template-columns: repeat(4, 1fr); }
    .charts-row-top, .charts-row-bottom { grid-template-columns: 1fr; }
  }

  @media (max-width: 768px) {
    .funnel-grid { grid-template-columns: repeat(2, 1fr); }
    .dashboard-header { flex-direction: column; align-items: flex-start; }
    .search-box { min-width: 100%; }
  }
</style>

<div class="dashboard-container">

  <!-- Executive Header -->
  <div class="dashboard-header">
    <div class="header-title-area">
      <h1><i class="fa-solid fa-chart-line text-primary"></i> Project Dashboard</h1>
      <p>Real-time tracking of project initiations, RFP technical proposals, and vendor selection workflows.</p>
    </div>
    <div class="header-actions">
      <div class="as-of-badge">
        <i class="fa-regular fa-clock"></i> As of <?php echo date('jS M Y'); ?>
      </div>
      <button class="btn-refresh" onclick="location.reload();">
        <i class="fa-solid fa-rotate-right"></i> Refresh Data
      </button>
    </div>
  </div>

  <!-- Funnel Stage Lifecycle -->
  <div class="section-title-bar">
    <div class="section-title">
      <i class="fa-solid fa-filter"></i> Project Lifecycle Funnel
    </div>
  </div>

  <div class="funnel-grid">
    <div class="funnel-card">
      <div class="funnel-step-number">Step 01</div>
      <div class="funnel-icon theme-blue"><i class="fa-solid fa-folder-plus"></i></div>
      <div class="funnel-title">Projects Initiated</div>
      <div class="funnel-value">70</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 02</div>
      <div class="funnel-icon theme-emerald"><i class="fa-solid fa-file-contract"></i></div>
      <div class="funnel-title">Tech Proposal Submitted</div>
      <div class="funnel-value">58</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 03</div>
      <div class="funnel-icon theme-purple"><i class="fa-solid fa-paper-plane"></i></div>
      <div class="funnel-title">Invitations Sent</div>
      <div class="funnel-value">66</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 04</div>
      <div class="funnel-icon theme-amber"><i class="fa-solid fa-gavel"></i></div>
      <div class="funnel-title">Open Bidding</div>
      <div class="funnel-value">66</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 05</div>
      <div class="funnel-icon theme-indigo"><i class="fa-solid fa-user-check"></i></div>
      <div class="funnel-title">CI Selection (TEC)</div>
      <div class="funnel-value">0</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 06</div>
      <div class="funnel-icon theme-rose"><i class="fa-solid fa-users-gear"></i></div>
      <div class="funnel-title">Approval Committee</div>
      <div class="funnel-value">0</div>
    </div>

    <div class="funnel-card">
      <div class="funnel-step-number">Step 07</div>
      <div class="funnel-icon theme-emerald"><i class="fa-solid fa-file-invoice-dollar"></i></div>
      <div class="funnel-title">PO Issued</div>
      <div class="funnel-value">0</div>
    </div>
  </div>

  <!-- Visual Distributions & Charts -->
  <div class="section-title-bar">
    <div class="section-title">
      <i class="fa-solid fa-chart-pie"></i> Company Profiles & Sector Breakdown
    </div>
  </div>

  <!-- Top Chart Row: Type & Size Doughnuts -->
  <div class="charts-row-top">
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Company Profile: By Type</h3>
        <span>Total: 70</span>
      </div>
      <div class="chart-wrapper">
        <canvas id="typeDoughnutChart"></canvas>
      </div>
    </div>

    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Company Profile: By Size</h3>
        <span>Total: 69</span>
      </div>
      <div class="chart-wrapper">
        <canvas id="sizeDoughnutChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Bottom Chart Row: Sector & State Bars -->
  <div class="charts-row-bottom">
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>By Sector (Manufacturing)</h3>
        <span>Top Categories</span>
      </div>
      <div class="chart-wrapper">
        <canvas id="sectorBarChart"></canvas>
      </div>
    </div>

    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Geographical Distribution (By State)</h3>
        <span>State Overview</span>
      </div>
      <div class="chart-wrapper">
        <canvas id="stateBarChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Proposal Preparation Data Table -->
  <div class="section-title-bar">
    <div class="section-title">
      <i class="fa-solid fa-list-check"></i> Proposal Preparation
    </div>
  </div>

  <div class="table-card">
    <div class="table-toolbar">
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="tableSearchInput" placeholder="Search company, manager, or status..." onkeyup="filterProposalTable()">
      </div>
      <div>
        <span class="badge-status badge-status-accepted"><i class="fa-solid fa-circle"></i> Active Projects Listed</span>
      </div>
    </div>

    <div class="table-responsive">
      <table class="custom-table" id="proposalTable">
        <thead>
          <tr>
            <th style="width: 50px;">No.</th>
            <th>Company Name</th>
            <th>Project Manager</th>
            <th style="width: 140px;">Date Project Initiated</th>
            <th style="width: 140px;">Date Project Accepted</th>
            <th style="width: 160px;">Date Tech Proposal Due</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td class="company-cell">HISTOTECH ENGINEERING SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">Ir. HASLAN FADLI BIN AHMAD MARZUKI</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">03/08/2026</span></td>
            <td><span class="date-chip">04/08/2026</span></td>
            <td><span class="date-chip">03/09/2026</span></td>
          </tr>
          <tr>
            <td>2</td>
            <td class="company-cell">WILRON PRODUCTS SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">Ir. Ts. LUQMAN BIN AHMAD ZAIDI</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">24/07/2026</span></td>
            <td><span class="date-chip">24/07/2026</span></td>
            <td><span class="date-chip">21/08/2026</span></td>
          </tr>
          <tr>
            <td>3</td>
            <td class="company-cell">THP MEDICAL SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">Dr. MOHD RAZIP ABDULLAH</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">13/07/2026</span></td>
            <td><span class="date-chip">23/07/2026</span></td>
            <td><span class="date-chip">20/08/2026</span></td>
          </tr>
          <tr>
            <td>4</td>
            <td class="company-cell">HERCULES SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">UNASSIGNED</span>
                <span class="badge-status badge-status-pm-assign"><i class="fa-solid fa-triangle-exclamation"></i> PENDING PM ASSIGN</span>
              </div>
            </td>
            <td><span class="date-chip">11/07/2026</span></td>
            <td><span class="text-muted">-</span></td>
            <td><span class="text-muted">-</span></td>
          </tr>
          <tr>
            <td>5</td>
            <td class="company-cell">PURE OCEAN RESOURCES SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">KAIROL ASMAR BIN ABU BAKAR</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">29/06/2026</span></td>
            <td><span class="date-chip">29/06/2026</span></td>
            <td><span class="date-chip">27/07/2026</span></td>
          </tr>
          <tr>
            <td>6</td>
            <td class="company-cell">SHJ AUTO SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">Dr. SITI MUSALIHAH BINTI MD IBRAHIM</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">25/05/2026</span></td>
            <td><span class="date-chip">25/05/2026</span></td>
            <td><span class="date-chip">25/06/2026</span></td>
          </tr>
          <tr>
            <td>7</td>
            <td class="company-cell">FRUIT UNITED SDN BHD</td>
            <td>
              <div class="pm-cell">
                <span class="pm-name">RAFIDAH BINTI ALI</span>
                <span class="badge-status badge-status-accepted"><i class="fa-solid fa-check"></i> ACCEPTED</span>
              </div>
            </td>
            <td><span class="date-chip">05/05/2026</span></td>
            <td><span class="date-chip">06/05/2026</span></td>
            <td><span class="date-chip">05/06/2026</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="pagination-bar">
      <div>Showing 1 to 7 of 70 entries</div>
      <div style="display: flex; gap: 6px;">
        <button class="btn btn-sm btn-outline-secondary" disabled>Previous</button>
        <button class="btn btn-sm btn-primary">1</button>
        <button class="btn btn-sm btn-outline-secondary">2</button>
        <button class="btn btn-sm btn-outline-secondary">3</button>
        <button class="btn btn-sm btn-outline-secondary">Next</button>
      </div>
    </div>
  </div>

</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Shared Chart Options
    Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
    Chart.defaults.color = '#475569';

    // 1. Company Type Doughnut
    new Chart(document.getElementById('typeDoughnutChart'), {
      type: 'doughnut',
      data: {
        labels: ['Manufacturing (68)', 'Manufacturing Related Services (2)'],
        datasets: [{
          data: [68, 2],
          backgroundColor: ['#2563eb', '#38bdf8'],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: {
          legend: {
            position: 'bottom',
            labels: { boxWidth: 12, padding: 16, font: { weight: '600', size: 12 } }
          }
        }
      }
    });

    // 2. Company Size Doughnut
    new Chart(document.getElementById('sizeDoughnutChart'), {
      type: 'doughnut',
      data: {
        labels: ['Medium (29)', 'Small (29)', 'Micro (8)', 'Mid-Tier (3)'],
        datasets: [{
          data: [29, 29, 8, 3],
          backgroundColor: ['#8b5cf6', '#ec4899', '#f59e0b', '#10b981'],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: {
          legend: {
            position: 'bottom',
            labels: { boxWidth: 12, padding: 16, font: { weight: '600', size: 12 } }
          }
        }
      }
    });

    // 3. Sector Breakdown Bar Chart
    new Chart(document.getElementById('sectorBarChart'), {
      type: 'bar',
      data: {
        labels: ['Food Processing', 'Machinery & Equip.', 'Electrical & Elect.', 'Automotive', 'Medical Devices', 'Plastic', 'Metals'],
        datasets: [{
          label: 'Companies',
          data: [18, 14, 11, 9, 8, 6, 4],
          backgroundColor: '#3b82f6',
          borderRadius: 6,
          maxBarThickness: 32
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { grid: { display: false } },
          y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { precision: 0 } }
        }
      }
    });

    // 4. State Distribution Bar Chart
    new Chart(document.getElementById('stateBarChart'), {
      type: 'bar',
      data: {
        labels: ['Selangor', 'Johor', 'Pulau Pinang', 'Perak', 'Kedah', 'WP KL'],
        datasets: [{
          label: 'Companies',
          data: [20, 16, 11, 9, 6, 5],
          backgroundColor: '#10b981',
          borderRadius: 6,
          maxBarThickness: 32
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: { grid: { display: false } },
          y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { precision: 0 } }
        }
      }
    });
  });

  // Search Filter Script
  function filterProposalTable() {
    const input = document.getElementById('tableSearchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('proposalTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
      let rowMatch = false;
      const tdList = tr[i].getElementsByTagName('td');
      for (let j = 0; j < tdList.length; j++) {
        if (tdList[j]) {
          const txtValue = tdList[j].textContent || tdList[j].innerText;
          if (txtValue.toLowerCase().indexOf(filter) > -1) {
            rowMatch = true;
            break;
          }
        }
      }
      tr[i].style.display = rowMatch ? '' : 'none';
    }
  }
</script>

<?php include 'dmt_footer.php'; ?>