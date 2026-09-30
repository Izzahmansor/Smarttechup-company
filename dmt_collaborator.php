<?php 
  $page_title = "Collaborator Dashboard - Smart Tech Up";
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
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.06), 0 2px 4px -1px rgba(0,0,0,0.04);
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

  /* KPI Summary Grid */
  .kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 28px;
  }

  .kpi-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 14px;
    padding: 20px;
    box-shadow: var(--shadow-sm);
    display: flex;
    align-items: center;
    gap: 16px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
  }

  .kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
  }

  .kpi-info h4 {
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--text-secondary);
    margin: 0 0 4px 0;
    letter-spacing: 0.03em;
  }

  .kpi-info .kpi-num {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0;
    line-height: 1;
  }

  .kpi-info .kpi-subtext {
    font-size: 0.75rem;
    color: var(--text-muted);
    margin-top: 4px;
  }

  /* Section Titles */
  .section-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--text-primary);
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .section-title i {
    color: var(--primary-blue);
  }

  /* Charts Grid (2x2 Grid Layout) */
  .charts-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
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
    margin-bottom: 16px;
  }

  .chart-card-header h3 {
    font-size: 0.98rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
  }

  .chart-wrapper {
    position: relative;
    flex-grow: 1;
    min-height: 280px;
  }

  /* Workload & Unassigned Tables Section */
  .tables-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 20px;
    margin-bottom: 32px;
  }

  .table-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 20px 24px;
    box-shadow: var(--shadow-sm);
  }

  .custom-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.85rem;
    text-align: left;
  }

  .custom-table th {
    background: #f8fafc;
    padding: 10px 12px;
    font-weight: 700;
    color: var(--text-secondary);
    border-bottom: 1px solid var(--border-color);
  }

  .custom-table td {
    padding: 12px;
    border-bottom: 1px solid var(--border-color);
    vertical-align: middle;
  }

  /* Badges & Status Indicators */
  .badge-capacity {
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 0.72rem;
    font-weight: 700;
    display: inline-block;
  }

  .badge-ok { background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .badge-warning { background: var(--accent-amber-light); color: var(--accent-amber); }
  .badge-danger { background: var(--accent-rose-light); color: var(--accent-rose); }

  .progress-bar-bg {
    background: #e2e8f0;
    height: 6px;
    border-radius: 3px;
    overflow: hidden;
    width: 100px;
  }

  .progress-bar-fill {
    height: 100%;
    border-radius: 3px;
  }

  /* Icon Color Helper Themes */
  .icon-blue { background: var(--primary-blue-light); color: var(--primary-blue); }
  .icon-purple { background: var(--accent-purple-light); color: var(--accent-purple); }
  .icon-amber { background: var(--accent-amber-light); color: var(--accent-amber); }
  .icon-emerald { background: var(--accent-emerald-light); color: var(--accent-emerald); }

  @media (max-width: 1200px) {
    .kpi-grid { grid-template-columns: repeat(2, 1fr); }
    .charts-grid, .tables-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="dashboard-container">

  <!-- Dashboard Header -->
  <div class="dashboard-header">
    <div class="header-title-area">
      <h1><i class="fa-solid fa-users-gear text-primary"></i> Collaborator Dashboard</h1>
      <p>External Assessor & Project Manager Workload, Expertise, and Assignment Allocation</p>
    </div>
    <div>
      <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
        <i class="fa-solid fa-shield-halved text-primary me-1"></i> DMT & Director Portal
      </span>
    </div>
  </div>

  <!-- KPI Overview -->
  <div class="kpi-grid">
    <div class="kpi-card">
      <div class="kpi-icon icon-blue"><i class="fa-solid fa-user-check"></i></div>
      <div class="kpi-info">
        <h4>No. of Assessors</h4>
        <div class="kpi-num">37</div>
        <div class="kpi-subtext">Excludes DMT Internal Staff</div>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-purple"><i class="fa-solid fa-user-tie"></i></div>
      <div class="kpi-info">
        <h4>No. of Project Managers</h4>
        <div class="kpi-num">47</div>
        <div class="kpi-subtext">Excludes DMT Internal Staff</div>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-amber"><i class="fa-solid fa-user-clock"></i></div>
      <div class="kpi-info">
        <h4>Unassigned Assessors</h4>
        <div class="kpi-num">12</div>
        <div class="kpi-subtext">Ready for OSFA / Project Allocation</div>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-emerald"><i class="fa-solid fa-briefcase"></i></div>
      <div class="kpi-info">
        <h4>Active OSFA Assignments</h4>
        <div class="kpi-num">84</div>
        <div class="kpi-subtext">Across all active collaborators</div>
      </div>
    </div>
  </div>

  <!-- Capacity & Allocation Workload Section -->
  <div class="section-title">
    <i class="fa-solid fa-sliders"></i> Workload & Capacity Tracking (Avoid Over/Under Assignment)
  </div>

  <div class="tables-grid">
    <!-- Capacity Monitor -->
    <div class="table-card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h6 font-weight-bold mb-0">Collaborator Workload Allocation (OSFA & Projects)</h3>
        <small class="text-muted">Max capacity tracking</small>
      </div>

      <div class="table-responsive">
        <table class="custom-table">
          <thead>
            <tr>
              <th>Collaborator Name</th>
              <th>Role</th>
              <th>Assigned OSFA</th>
              <th>Assigned Projects</th>
              <th>Max Capacity</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Dr. Ahmad Razif</strong></td>
              <td><span class="badge bg-light text-dark">Assessor</span></td>
              <td>4</td>
              <td>2</td>
              <td>5 / 5</td>
              <td><span class="badge-capacity badge-warning">Near Max</span></td>
            </tr>
            <tr>
              <td><strong>Ir. Haslan Fadli</strong></td>
              <td><span class="badge bg-light text-dark">Project Manager</span></td>
              <td>2</td>
              <td>1</td>
              <td>3 / 5</td>
              <td><span class="badge-capacity badge-ok">Balanced</span></td>
            </tr>
            <tr>
              <td><strong>Dr. Siti Musalihah</strong></td>
              <td><span class="badge bg-light text-dark">Assessor / PM</span></td>
              <td>5</td>
              <td>3</td>
              <td>8 / 5</td>
              <td><span class="badge-capacity badge-danger">Over Capacity</span></td>
            </tr>
            <tr>
              <td><strong>Rafidah Binti Ali</strong></td>
              <td><span class="badge bg-light text-dark">Assessor</span></td>
              <td>1</td>
              <td>0</td>
              <td>1 / 5</td>
              <td><span class="badge-capacity badge-ok">Under Assigned</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Unassigned Collaborators List -->
    <div class="table-card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h6 font-weight-bold mb-0">Unassigned Collaborators</h3>
        <span class="badge bg-primary">12 Available</span>
      </div>

      <div class="table-responsive">
        <table class="custom-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Ahmad Nazri San</strong></td>
              <td><small class="text-muted">Assessor</small></td>
              <td><button class="btn btn-xs btn-outline-primary py-1 px-2">Assign</button></td>
            </tr>
            <tr>
              <td><strong>Saimi Bin Sapar</strong></td>
              <td><small class="text-muted">Project Manager</small></td>
              <td><button class="btn btn-xs btn-outline-primary py-1 px-2">Assign</button></td>
            </tr>
            <tr>
              <td><strong>Khairul Bin Mohd</strong></td>
              <td><small class="text-muted">Assessor</small></td>
              <td><button class="btn btn-xs btn-outline-primary py-1 px-2">Assign</button></td>
            </tr>
            <tr>
              <td><strong>Nor Azura Binti Mohamad</strong></td>
              <td><small class="text-muted">Project Manager</small></td>
              <td><button class="btn btn-xs btn-outline-primary py-1 px-2">Assign</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Expertise & Smart Technology Charts Grid -->
  <div class="section-title">
    <i class="fa-solid fa-chart-bar"></i> Collaborator Expertise & Smart Technology Distribution
  </div>

  <div class="charts-grid">
    <!-- Chart 1: Assessor Expertise -->
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Assessor's Expertise</h3>
      </div>
      <div class="chart-wrapper">
        <canvas id="assessorExpertiseChart"></canvas>
      </div>
    </div>

    <!-- Chart 2: Assessor Smart Technology -->
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Assessor's Smart Technology</h3>
      </div>
      <div class="chart-wrapper">
        <canvas id="assessorTechChart"></canvas>
      </div>
    </div>

    <!-- Chart 3: PM Expertise -->
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Project Manager's Expertise</h3>
      </div>
      <div class="chart-wrapper">
        <canvas id="pmExpertiseChart"></canvas>
      </div>
    </div>

    <!-- Chart 4: PM Smart Technology -->
    <div class="chart-card">
      <div class="chart-card-header">
        <h3>Project Manager's Smart Technology</h3>
      </div>
      <div class="chart-wrapper">
        <canvas id="pmTechChart"></canvas>
      </div>
    </div>
  </div>

</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    Chart.defaults.font.family = "'Plus Jakarta Sans', sans-serif";
    Chart.defaults.color = '#475569';

    const colorPalette = [
      '#2563eb', '#3b82f6', '#60a5fa', '#93c5fd', '#a7f3d0', 
      '#6ee7b7', '#34d399', '#10b981', '#f59e0b', '#fbbf24', 
      '#f43f5e', '#8b5cf6', '#c084fc', '#e879f9'
    ];

    const barOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        x: { grid: { display: false }, ticks: { font: { size: 10 } } },
        y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { precision: 0 } }
      }
    };

    // 1. Assessor's Expertise Chart
    new Chart(document.getElementById('assessorExpertiseChart'), {
      type: 'bar',
      data: {
        labels: ['Adv. Automation', 'Mechanical Eng.', 'Electrical Eng.', 'Intelligent Sys.', 'Material Eng.', 'Software Eng.'],
        datasets: [{
          data: [10, 8, 8, 5, 4, 3],
          backgroundColor: colorPalette,
          borderRadius: 6
        }]
      },
      options: barOptions
    });

    // 2. Assessor's Smart Tech Chart
    new Chart(document.getElementById('assessorTechChart'), {
      type: 'bar',
      data: {
        labels: ['System Integration', 'IoT', 'HMI', 'AI', 'Cyber-Physical', 'Sustainable Mfg.'],
        datasets: [{
          data: [28, 8, 5, 3, 3, 3],
          backgroundColor: colorPalette,
          borderRadius: 6
        }]
      },
      options: barOptions
    });

    // 3. PM Expertise Chart
    new Chart(document.getElementById('pmExpertiseChart'), {
      type: 'bar',
      data: {
        labels: ['Adv. Automation', 'Mechanical Eng.', 'Intelligent Sys.', 'Software Eng.', 'Process Eng.', 'Lean Management'],
        datasets: [{
          data: [9, 7, 7, 5, 2, 2],
          backgroundColor: colorPalette,
          borderRadius: 6
        }]
      },
      options: barOptions
    });

    // 4. PM Smart Tech Chart
    new Chart(document.getElementById('pmTechChart'), {
      type: 'bar',
      data: {
        labels: ['System Integration', 'IoT', 'HMI', 'AI', 'Cyber-Physical', 'Autonomous Robot'],
        datasets: [{
          data: [26, 6, 4, 3, 3, 2],
          backgroundColor: colorPalette,
          borderRadius: 6
        }]
      },
      options: barOptions
    });
  });
</script>

<?php include 'dmt_footer.php'; ?>