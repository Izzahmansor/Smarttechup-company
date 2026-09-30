<?php 
  $page_title = "OSFA Dashboard - Smart Tech Up";
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
    --accent-amber: #f59e0b;
    --accent-amber-light: #fffbebf;
    --accent-purple: #8b5cf6;
    --accent-purple-light: #f3e8ff;
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
    transition: transform 0.2s ease;
  }

  .kpi-card:hover {
    transform: translateY(-2px);
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

  .kpi-content {
    display: flex;
    flex-direction: column;
  }

  .kpi-title {
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-secondary);
  }

  .kpi-value {
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--text-primary);
    line-height: 1.1;
  }

  /* Icon Theme Colors */
  .icon-blue { background: var(--primary-blue-light); color: var(--primary-blue); }
  .icon-emerald { background: var(--accent-emerald-light); color: var(--accent-emerald); }
  .icon-amber { background: var(--accent-amber-light); color: var(--accent-amber); }
  .icon-purple { background: var(--accent-purple-light); color: var(--accent-purple); }

  /* Recognition Levels Strip */
  .recognition-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 32px;
    box-shadow: var(--shadow-sm);
  }

  .recognition-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
    margin-top: 14px;
  }

  .level-pill {
    background: #f8fafc;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 14px;
    text-align: center;
    transition: all 0.2s ease;
  }

  .level-pill.active {
    background: var(--primary-blue-light);
    border-color: var(--primary-blue);
  }

  .level-name {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--text-secondary);
    margin-bottom: 4px;
  }

  .level-count {
    font-size: 1.4rem;
    font-weight: 800;
    color: var(--text-primary);
  }

  .level-pill.active .level-name { color: var(--primary-blue); }
  .level-pill.active .level-count { color: var(--primary-blue); }

  /* Profiles & Overview Section */
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
    min-height: 200px;
  }

  /* Dimension Assessment Matrix Section */
  .dimension-section {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 24px;
    box-shadow: var(--shadow-sm);
  }

  /* Interactive Dimension Tabs */
  .dim-tabs {
    display: flex;
    gap: 12px;
    border-bottom: 1px solid var(--border-color);
    margin-bottom: 24px;
  }

  .dim-tab-btn {
    padding: 12px 20px;
    background: none;
    border: none;
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text-secondary);
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .dim-tab-btn.active {
    color: var(--primary-blue);
    border-bottom-color: var(--primary-blue);
  }

  .dim-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }

  .dim-card {
    background: #f8fafc;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 18px;
    text-align: center;
  }

  .dim-card h4 {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 12px 0;
  }

  .dim-chart-box {
    position: relative;
    height: 180px;
  }

  /* Responsive Adjustments */
  @media (max-width: 1200px) {
    .kpi-grid { grid-template-columns: repeat(2, 1fr); }
    .recognition-grid { grid-template-columns: repeat(3, 1fr); }
    .charts-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 768px) {
    .kpi-grid { grid-template-columns: 1fr; }
    .recognition-grid { grid-template-columns: repeat(2, 1fr); }
    .dim-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="dashboard-container">

  <!-- Header -->
  <div class="dashboard-header">
    <div>
      <h1>OSFA Assessment Dashboard</h1>
      <p>Overview of OSFA reports, factory recognition levels, and technical maturity indexes.</p>
    </div>
    <div class="as-of-badge">
      <i class="fa-regular fa-calendar-check me-1"></i> As of 21st Sep 2026
    </div>
  </div>

  <!-- Key OSFA Workflow Metrics -->
  <div class="section-title">
    <i class="fa-solid fa-list-check"></i> OSFA Report Pipeline
  </div>

  <div class="kpi-grid">
    <div class="kpi-card">
      <div class="kpi-icon icon-blue"><i class="fa-solid fa-clipboard-check"></i></div>
      <div class="kpi-content">
        <span class="kpi-title">Total OSFA Conducted</span>
        <span class="kpi-value">1</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-amber"><i class="fa-solid fa-file-arrow-up"></i></div>
      <div class="kpi-content">
        <span class="kpi-title">Reports Submitted</span>
        <span class="kpi-value">3</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-purple"><i class="fa-solid fa-paper-plane"></i></div>
      <div class="kpi-content">
        <span class="kpi-title">Reports Released</span>
        <span class="kpi-value">3</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-icon icon-emerald"><i class="fa-solid fa-circle-check"></i></div>
      <div class="kpi-content">
        <span class="kpi-title">Reports Accepted</span>
        <span class="kpi-value">3</span>
      </div>
    </div>
  </div>

  <!-- Smart Factory Recognition Level -->
  <div class="recognition-card">
    <div class="section-title" style="margin-bottom: 0;">
      <i class="fa-solid fa-award"></i> Smart Factory Recognition Level
    </div>
    <div class="recognition-grid">
      <div class="level-pill">
        <div class="level-name">Platinum</div>
        <div class="level-count">0</div>
      </div>
      <div class="level-pill">
        <div class="level-name">Gold</div>
        <div class="level-count">0</div>
      </div>
      <div class="level-pill">
        <div class="level-name">Silver</div>
        <div class="level-count">0</div>
      </div>
      <div class="level-pill active">
        <div class="level-name">Newcomer</div>
        <div class="level-count">1</div>
      </div>
      <div class="level-pill">
        <div class="level-name">Conventional</div>
        <div class="level-count">0</div>
      </div>
    </div>
  </div>

  <!-- Company Profiles & Readiness Summary -->
  <div class="section-title">
    <i class="fa-solid fa-chart-pie"></i> Applicant Profiles & Readiness
  </div>

  <div class="charts-grid">
    <!-- Chart 1: Company Profile -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>Company Type & Size</h3>
      </div>
      <div class="chart-body">
        <canvas id="profileChart"></canvas>
      </div>
    </div>

    <!-- Chart 2: Self Assessment & Profiling -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>Profiling & SA Status</h3>
      </div>
      <div class="chart-body">
        <canvas id="saProfileChart"></canvas>
      </div>
    </div>

    <!-- Chart 3: Location -->
    <div class="chart-card">
      <div class="chart-header">
        <h3>Geographical Distribution</h3>
      </div>
      <div class="chart-body">
        <canvas id="stateChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Detailed Dimension Assessment (Shop Floor, Facility, Enterprise) -->
  <div class="section-title">
    <i class="fa-solid fa-layer-group"></i> Smart Industry Readiness Index (SIRI) Dimensions
  </div>

  <div class="dimension-section">
    <!-- Interactive Tabs to switch between Shop Floor, Facility, and Enterprise -->
    <div class="dim-tabs">
      <button class="dim-tab-btn active" onclick="switchDim('shopfloor')">
        <i class="fa-solid fa-industry"></i> Shop Floor
      </button>
      <button class="dim-tab-btn" onclick="switchDim('facility')">
        <i class="fa-solid fa-building-user"></i> Facility
      </button>
      <button class="dim-tab-btn" onclick="switchDim('enterprise')">
        <i class="fa-solid fa-sitemap"></i> Enterprise
      </button>
    </div>

    <!-- Dimension Charts Matrix -->
    <div class="dim-grid">
      <!-- Automation Card -->
      <div class="dim-card">
        <h4>Automation Score</h4>
        <div class="dim-chart-box">
          <canvas id="automationChart"></canvas>
        </div>
      </div>

      <!-- Intelligence Card -->
      <div class="dim-card">
        <h4>Intelligence Score</h4>
        <div class="dim-chart-box">
          <canvas id="intelligenceChart"></canvas>
        </div>
      </div>

      <!-- Connectivity Card -->
      <div class="dim-card">
        <h4>Connectivity Score</h4>
        <div class="dim-chart-box">
          <canvas id="connectivityChart"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  // Data Structure for Dimensions
  const dimensionData = {
    shopfloor: {
      automation: [0, 1, 0, 0, 0],   // Levels 0 to 4
      intelligence: [0, 1, 0, 0, 0],
      connectivity: [0, 1, 0, 0, 0]
    },
    facility: {
      automation: [0, 0, 0, 1, 0],
      intelligence: [0, 0, 0, 1, 0],
      connectivity: [0, 0, 0, 1, 0]
    },
    enterprise: {
      automation: [0, 1, 0, 0, 0],
      intelligence: [0, 0, 0, 1, 0],
      connectivity: [0, 0, 0, 1, 0]
    }
  };

  let autoChart, intelChart, connChart;

  function createDoughnutChart(canvasId, data, color) {
    return new Chart(document.getElementById(canvasId), {
      type: 'doughnut',
      data: {
        labels: ['Level 0', 'Level 1', 'Level 2', 'Level 3', 'Level 4'],
        datasets: [{
          data: data,
          backgroundColor: [color, '#e2e8f0', '#cbd5e1', '#94a3b8', '#64748b']
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'bottom', labels: { boxWidth: 12 } }
        }
      }
    });
  }

  function updateDimensionCharts(dimKey) {
    const data = dimensionData[dimKey];
    
    autoChart.data.datasets[0].data = data.automation;
    autoChart.update();

    intelChart.data.datasets[0].data = data.intelligence;
    intelChart.update();

    connChart.data.datasets[0].data = data.connectivity;
    connChart.update();
  }

  function switchDim(dimKey) {
    document.querySelectorAll('.dim-tab-btn').forEach(btn => btn.classList.remove('active'));
    event.currentTarget.classList.add('active');
    updateDimensionCharts(dimKey);
  }

  document.addEventListener('DOMContentLoaded', () => {
    // Company Profile Chart
    new Chart(document.getElementById('profileChart'), {
      type: 'doughnut',
      data: {
        labels: ['Manufacturing (1)', 'Micro Size (1)'],
        datasets: [{
          data: [1, 1],
          backgroundColor: ['#2563eb', '#ec4899']
        }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });

    // SA Profile Chart
    new Chart(document.getElementById('saProfileChart'), {
      type: 'doughnut',
      data: {
        labels: ['SA Pass (1)', 'Newcomer Profile (1)'],
        datasets: [{
          data: [1, 1],
          backgroundColor: ['#10b981', '#f59e0b']
        }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });

    // State Chart
    new Chart(document.getElementById('stateChart'), {
      type: 'bar',
      data: {
        labels: ['WP Labuan / Sarawak'],
        datasets: [{
          label: 'Companies',
          data: [1],
          backgroundColor: '#8b5cf6',
          borderRadius: 6
        }]
      },
      options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
    });

    // Initialize Dimension Charts
    autoChart = createDoughnutChart('automationChart', dimensionData.shopfloor.automation, '#1e3a8a');
    intelChart = createDoughnutChart('intelligenceChart', dimensionData.shopfloor.intelligence, '#d97706');
    connChart = createDoughnutChart('connectivityChart', dimensionData.shopfloor.connectivity, '#1e3a8a');
  });
</script>

<?php include 'dmt_footer.php'; ?>