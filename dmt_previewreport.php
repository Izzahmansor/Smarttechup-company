<?php 
  $page_title = "DMT OSFA - Interactive Executive Assessment Report";
  include 'dmt_navbar.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart Factory OSFA Assessment Report</title>
  
  <!-- UI Icons, Fonts & Charting Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-dark: #0f172a;
      --accent-blue: #2563eb;
      --accent-hover: #1d4ed8;
      --accent-soft: #eff6ff;
      --success-green: #059669;
      --warning-amber: #d97706;
      --danger-rose: #e11d48;
      --bg-slate: #f8fafc;
      --card-bg: #ffffff;
      --border-color: #e2e8f0;
      --text-dark: #1e293b;
      --text-muted: #64748b;
      --radius-lg: 12px;
      --radius-md: 8px;
    }

    * { box-sizing: border-box; }

    body {
      font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
      background-color: var(--bg-slate);
      color: var(--text-dark);
      margin: 0;
      padding-bottom: 60px;
    }

    /* Floating Top Command Toolbar */
    .sticky-toolbar {
      position: sticky;
      top: 0;
      z-index: 900;
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--border-color);
      padding: 12px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    }

    .toolbar-brand {
      font-weight: 800;
      font-size: 15px;
      color: var(--primary-dark);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .badge-status {
      background: #ecfdf5;
      color: var(--success-green);
      border: 1px solid #a7f3d0;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .btn {
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: 1px solid transparent;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .btn-primary { background: var(--accent-blue); color: #fff; }
    .btn-primary:hover { background: var(--accent-hover); box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25); }
    .btn-danger { background: var(--danger-rose); color: #fff; }
    .btn-danger:hover { background: #be123c; }
    .btn-outline { background: #fff; color: var(--text-dark); border-color: var(--border-color); }
    .btn-outline:hover { background: var(--bg-slate); }
    .btn-sm { padding: 5px 10px; font-size: 11px; }

    /* Single Column Main Layout */
    .layout-container {
      max-width: 1200px;
      margin: 28px auto;
      padding: 0 24px;
    }

    .report-main-card {
      background: var(--card-bg);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 40px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.03);
    }

    .section-title {
      font-size: 16px;
      font-weight: 800;
      color: var(--primary-dark);
      margin-top: 36px;
      margin-bottom: 18px;
      padding-bottom: 10px;
      border-bottom: 2px solid #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .section-title .title-text {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* ==========================================
       ENHANCED SECTION 1: COMPANY INFO STYLES
       ========================================== */
    .company-hero-card {
      background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 24px;
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }

    .company-avatar {
      width: 64px;
      height: 64px;
      border-radius: 14px;
      background: var(--accent-soft);
      color: var(--accent-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      border: 1px solid #bfdbfe;
      flex-shrink: 0;
    }

    .company-main-details { flex-grow: 1; }

    .company-header-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 10px;
      flex-wrap: wrap;
    }

    .company-name {
      margin: 0;
      font-size: 20px;
      font-weight: 800;
      color: var(--primary-dark);
      letter-spacing: -0.3px;
    }

    .company-badge {
      background: #e0f2fe;
      color: #0369a1;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .company-meta-pills {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      font-size: 12px;
    }

    .meta-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #ffffff;
      padding: 6px 12px;
      border-radius: 6px;
      border: 1px solid var(--border-color);
      color: var(--text-dark);
    }

    .meta-pill strong { color: var(--text-muted); font-weight: 600; }
    .meta-pill a { color: var(--accent-blue); text-decoration: none; font-weight: 700; }
    .meta-pill a:hover { text-decoration: underline; }

    .company-info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .info-group-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      overflow: hidden;
    }

    .group-header {
      background: #f8fafc;
      padding: 12px 18px;
      font-size: 13px;
      font-weight: 800;
      color: var(--primary-dark);
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .group-header i { color: var(--accent-blue); }

    .info-list {
      padding: 14px 18px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 12px;
      padding-bottom: 8px;
      border-bottom: 1px dashed #f1f5f9;
    }

    .info-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .info-item.vertical {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .info-label {
      color: var(--text-muted);
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-label i {
      width: 14px;
      color: #94a3b8;
    }

    .info-value {
      font-weight: 700;
      color: var(--text-dark);
      text-align: right;
    }

    .info-value-box {
      width: 100%;
      background: var(--bg-slate);
      padding: 10px 12px;
      border-radius: 6px;
      border: 1px solid var(--border-color);
      font-size: 12px;
      font-weight: 600;
      color: var(--text-dark);
      line-height: 1.4;
    }

    /* Section 2: Executive Dashboard Cards */
    .summary-grid {
      display: grid;
      grid-template-columns: 240px 1fr;
      gap: 20px;
      margin-top: 15px;
    }

    .total-marks-card {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
      color: #fff;
      border-radius: var(--radius-lg);
      padding: 24px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
    }

    .total-marks-card .title { font-size: 11px; text-transform: uppercase; font-weight: 700; opacity: 0.8; letter-spacing: 0.5px; }
    .total-marks-card .score { font-size: 42px; font-weight: 900; margin: 6px 0; color: #60a5fa; }
    .total-marks-card .level { font-size: 12px; font-weight: 700; background: rgba(255,255,255,0.15); padding: 4px 14px; border-radius: 20px; backdrop-filter: blur(4px); }

    .stat-cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }

    .stat-card {
      border: 1px solid var(--border-color);
      border-radius: var(--radius-md);
      padding: 14px;
      text-align: center;
      background: var(--bg-slate);
      transition: transform 0.2s ease;
    }

    .stat-card:hover { transform: translateY(-2px); }
    .stat-card .lbl { font-size: 10px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; }
    .stat-card .num { font-size: 22px; font-weight: 800; color: var(--primary-dark); margin-top: 4px; }

    /* Section 3: OSFA Visual Findings Grid & Tabs */
    .osfa-controls-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      gap: 16px;
      flex-wrap: wrap;
    }

    .osfa-tabs {
      display: flex;
      gap: 8px;
      background: #f1f5f9;
      padding: 4px;
      border-radius: 8px;
    }

    .tab-btn {
      padding: 8px 16px;
      border: none;
      background: transparent;
      font-size: 12px;
      font-weight: 700;
      color: var(--text-muted);
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s;
    }

    .tab-btn.active {
      background: #ffffff;
      color: var(--accent-blue);
      box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }

    .search-input-box {
      position: relative;
      width: 250px;
    }

    .search-input-box input {
      width: 100%;
      padding: 8px 12px 8px 34px;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      font-size: 12px;
      outline: none;
    }

    .search-input-box i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 12px;
    }

    .findings-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 16px;
    }

    .finding-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-md);
      padding: 16px;
      transition: all 0.2s ease;
      position: relative;
    }

    .finding-card:hover {
      border-color: var(--accent-blue);
      box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    }

    .finding-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .finding-tag {
      font-size: 10px;
      font-weight: 800;
      text-transform: uppercase;
      padding: 3px 8px;
      border-radius: 4px;
      letter-spacing: 0.5px;
    }

    .tag-people { background: #ffe4e6; color: #9f1239; }
    .tag-process { background: #fef3c7; color: #92400e; }
    .tag-tech { background: #dbeafe; color: #1e40af; }

    .status-pill {
      font-size: 10px;
      font-weight: 700;
      padding: 2px 8px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .status-pill.pass { background: #f0fdf4; color: var(--success-green); border: 1px solid #bbf7d0; }
    .status-pill.warn { background: #fffbebf; color: var(--warning-amber); border: 1px solid #fef08a; }

    .finding-title {
      font-size: 12px;
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 6px;
    }

    .finding-body {
      background: #f8fafc;
      border-radius: 6px;
      padding: 10px;
      font-size: 12px;
      color: var(--text-dark);
      line-height: 1.5;
      border-left: 3px solid var(--border-color);
    }

    .finding-card[data-shift="people"] .finding-body { border-left-color: #e11d48; }
    .finding-card[data-shift="process"] .finding-body { border-left-color: #d97706; }
    .finding-card[data-shift="tech"] .finding-body { border-left-color: #2563eb; }

    /* Document Cards */
    .doc-preview-card {
      background: #f8fafc;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 16px;
      margin-top: 14px;
      display: flex;
      align-items: center;
      gap: 16px;
      transition: border-color 0.2s;
    }

    .doc-preview-card:hover { border-color: var(--accent-blue); }

    .doc-thumbnail {
      width: 65px;
      height: 75px;
      background: #ffffff;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      flex-shrink: 0;
    }

    .doc-info { flex-grow: 1; }
    .doc-info .title { font-size: 13px; font-weight: 700; color: var(--primary-dark); margin-bottom: 2px; }
    .doc-info .meta { font-size: 11px; color: var(--text-muted); margin-bottom: 8px; }

    /* Section 6: Radar Chart & Shift Breakdown Box */
    .radar-analytics-container {
      display: grid;
      grid-template-columns: 1fr 280px;
      gap: 24px;
      align-items: center;
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 24px;
    }

    .radar-chart-box {
      position: relative;
      width: 100%;
      max-width: 480px;
      margin: 0 auto;
    }

    .shift-breakdown-card {
      background: #f8fafc;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 20px;
    }

    .shift-breakdown-card .title {
      font-size: 14px;
      font-weight: 800;
      color: var(--primary-dark);
      margin-bottom: 16px;
    }

    .shift-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px dashed #e2e8f0;
      font-size: 13px;
    }

    .shift-row:last-child { border-bottom: none; }
    .shift-row .lbl { font-weight: 600; color: var(--text-dark); }
    .shift-row .val { font-weight: 800; }

    /* Tables */
    .data-table-readonly {
      width: 100%;
      border-collapse: collapse;
      font-size: 12px;
      margin-bottom: 12px;
    }

    .data-table-readonly th {
      background: #f8fafc;
      padding: 10px 12px;
      text-align: left;
      font-weight: 700;
      color: var(--text-muted);
      border: 1px solid #e2e8f0;
    }

    .data-table-readonly td {
      padding: 10px 12px;
      border: 1px solid #e2e8f0;
      background: #ffffff;
    }

    .table-totals {
      text-align: right;
      font-size: 13px;
      font-weight: 800;
      color: var(--primary-dark);
      margin-top: 8px;
    }

    /* Investment Distribution Progress Bar */
    .investment-bar-container {
      background: #f8fafc;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 20px;
      margin-top: 24px;
    }

    .progress-stacked {
      display: flex;
      height: 14px;
      border-radius: 7px;
      overflow: hidden;
      background: #e2e8f0;
      margin: 12px 0;
    }

    .progress-segment { height: 100%; transition: width 0.5s ease; }

    .textarea-box {
      width: 100%;
      min-height: 80px;
      padding: 12px;
      border: 1px solid var(--border-color);
      border-radius: var(--radius-md);
      font-size: 12px;
      font-family: inherit;
      resize: vertical;
    }

    /* Interactive Lightbox Modal */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(15, 23, 42, 0.75);
      backdrop-filter: blur(4px);
      z-index: 2000;
      justify-content: center;
      align-items: center;
    }

    .modal-card {
      background: #fff;
      border-radius: var(--radius-lg);
      width: 90%;
      max-width: 800px;
      padding: 24px;
      position: relative;
    }

    .modal-close-btn {
      position: absolute;
      top: 16px;
      right: 16px;
      font-size: 18px;
      cursor: pointer;
      color: var(--text-muted);
    }

    @media print {
      .sticky-toolbar, .btn, .osfa-controls-wrapper { display: none !important; }
      .layout-container { max-width: 100% !important; margin: 0 !important; padding: 0 !important; }
      .report-main-card { border: none !important; box-shadow: none !important; padding: 0 !important; }
      body { background: #fff !important; }
    }

    @media (max-width: 768px) {
      .company-info-grid { grid-template-columns: 1fr; }
      .company-hero-card { flex-direction: column; align-items: flex-start; }
    }
  </style>
</head>
<body>

<!-- Sticky Header Command Bar -->
<div class="sticky-toolbar">
  <div class="toolbar-brand">
    <i class="fa-solid fa-chart-diagram" style="color:var(--accent-blue);"></i>
    <span>DMT OSFA Assessment Report</span>
    <span class="badge-status"><i class="fa-solid fa-circle-check"></i> Audit Finalized</span>
  </div>
  <div style="display:flex; gap:10px;">
    <a href="dmt_osfa.php" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to OSFA</a>
    <button class="btn btn-primary" onclick="window.print()"><i class="fa-solid fa-file-pdf"></i> Export To PDF</button>
    <button class="btn btn-danger"><i class="fa-solid fa-lock-open"></i> Unrelease Report</button>
  </div>
</div>

<div class="layout-container">
  <main class="report-main-card">

    <!-- 1. Enhanced Company Information -->
    <section id="sec1">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-building" style="color:var(--accent-blue);"></i> 1. Company Information</div>
      </div>

      <!-- Hero Profile Banner -->
      <div class="company-hero-card">
        <div class="company-avatar">
          <i class="fa-solid fa-industry"></i>
        </div>
        <div class="company-main-details">
          <div class="company-header-row">
            <h2 class="company-name">BOGA MAJU SDN BHD</h2>
            <span class="company-badge"><i class="fa-solid fa-calendar-days"></i> Est. 2024</span>
          </div>
          <div class="company-meta-pills">
            <span class="meta-pill"><strong>Main Product:</strong> Product 1</span>
            <span class="meta-pill"><strong>Employees:</strong> 10 Staff</span>
            <span class="meta-pill"><strong>Annual Revenue:</strong> -</span>
            <span class="meta-pill"><strong>Website:</strong> <a href="https://www.google.com" target="_blank">https://www.google.com</a></span>
          </div>
        </div>
      </div>

      <!-- Detail Grid Cards -->
      <div class="company-info-grid">
        <!-- Card 1: Key Contact Person -->
        <div class="info-group-card">
          <div class="group-header">
            <i class="fa-solid fa-id-card"></i>
            <span>Primary Contact Person</span>
          </div>
          <div class="info-list">
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-user"></i> Contact Person</span>
              <span class="info-value">JOHN DOE</span>
            </div>
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-briefcase"></i> Position</span>
              <span class="info-value">CEO</span>
            </div>
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-mobile-screen-button"></i> Mobile Phone</span>
              <span class="info-value">0123456789</span>
            </div>
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-phone"></i> Telephone</span>
              <span class="info-value">0123456789</span>
            </div>
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-fax"></i> Fax</span>
              <span class="info-value">0123456789</span>
            </div>
            <div class="info-item">
              <span class="info-label"><i class="fa-solid fa-envelope"></i> Email</span>
              <span class="info-value" style="word-break: break-all;">statustestusertest02@yopmail.com</span>
            </div>
          </div>
        </div>

        <!-- Card 2: Locations & Facilities -->
        <div class="info-group-card">
          <div class="group-header">
            <i class="fa-solid fa-location-dot"></i>
            <span>Locations & Facilities</span>
          </div>
          <div class="info-list">
            <div class="info-item vertical">
              <span class="info-label"><i class="fa-solid fa-building-user"></i> Registered Company Address</span>
              <div class="info-value-box">
                123, Jalan 1, Taman 1, 12345 Kuala Lumpur
              </div>
            </div>
            <div class="info-item vertical">
              <span class="info-label"><i class="fa-solid fa-warehouse"></i> Operating Factory Address</span>
              <div class="info-value-box">
                123, Jalan 1, Taman 1, 12345 Kuala Lumpur
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 2. Executive Dashboard Summary -->
    <section id="sec2">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-chart-line" style="color:var(--accent-blue);"></i> 2. Overall Assessment Summary</div>
      </div>
      <div class="summary-grid">
        <div class="total-marks-card">
          <div class="title">Total Maturity Score</div>
          <div class="score">95 %</div>
          <div class="level"><i class="fa-solid fa-trophy"></i> Leader Status</div>
        </div>

        <div class="stat-cards-grid">
          <div class="stat-card"><div class="lbl">Highlights</div><div class="num">0</div></div>
          <div class="stat-card"><div class="lbl">Recommendations</div><div class="num" style="color:var(--accent-blue);">1</div></div>
          <div class="stat-card"><div class="lbl">Areas of Improvement</div><div class="num">0</div></div>
          <div class="stat-card"><div class="lbl">Pain Points</div><div class="num" style="color:var(--danger-rose);">1</div></div>
          <div class="stat-card"><div class="lbl">Proposed Solutions</div><div class="num">0</div></div>
          <div class="stat-card"><div class="lbl">POC Target Cost</div><div class="num" style="color:var(--success-green);">RM 12.2k</div></div>
        </div>
      </div>
    </section>

    <!-- 3. OSFA Findings Section -->
    <section id="sec3">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-clipboard-list" style="color:var(--accent-blue);"></i> 3. Onsite Assessment Findings</div>
      </div>

      <div class="osfa-controls-wrapper">
        <div class="osfa-tabs">
          <button class="tab-btn active" onclick="switchShift('all', this)"><i class="fa-solid fa-border-all"></i> All Shifts</button>
          <button class="tab-btn" onclick="switchShift('people', this)"><i class="fa-solid fa-users"></i> People</button>
          <button class="tab-btn" onclick="switchShift('process', this)"><i class="fa-solid fa-gears"></i> Process</button>
          <button class="tab-btn" onclick="switchShift('tech', this)"><i class="fa-solid fa-microchip"></i> Technology</button>
        </div>

        <div class="search-input-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" id="findingSearch" onkeyup="filterCards()" placeholder="Search assessment findings...">
        </div>
      </div>

      <!-- Findings Visual Card Grid -->
      <div class="findings-grid" id="findingsGrid">
        <!-- People Cards -->
        <div class="finding-card" data-shift="people">
          <div class="finding-header">
            <span class="finding-tag tag-people">People</span>
            <span class="status-pill warn"><i class="fa-solid fa-triangle-exclamation"></i> Action</span>
          </div>
          <div class="finding-title">Q1.1 Workforce Skill Assessment</div>
          <div class="finding-body">sdasda</div>
        </div>

        <div class="finding-card" data-shift="people">
          <div class="finding-header">
            <span class="finding-tag tag-people">People</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q1.2 Digital Readiness</div>
          <div class="finding-body">dsadadasdsas</div>
        </div>

        <div class="finding-card" data-shift="people">
          <div class="finding-header">
            <span class="finding-tag tag-people">People</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q1.3 SOP Alignment</div>
          <div class="finding-body">Staff demonstrates clear understanding of standard operation procedures.</div>
        </div>

        <!-- Process Cards -->
        <div class="finding-card" data-shift="process">
          <div class="finding-header">
            <span class="finding-tag tag-process">Process</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q2.1 Workflow Automation</div>
          <div class="finding-body">sadad</div>
        </div>

        <div class="finding-card" data-shift="process">
          <div class="finding-header">
            <span class="finding-tag tag-process">Process</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q2.2 Quality Assurance Protocols</div>
          <div class="finding-body">dsadaddas</div>
        </div>

        <div class="finding-card" data-shift="process">
          <div class="finding-header">
            <span class="finding-tag tag-process">Process</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q2.3 Supply Chain Traceability</div>
          <div class="finding-body">dsadadsadsad</div>
        </div>

        <!-- Technology Cards -->
        <div class="finding-card" data-shift="tech">
          <div class="finding-header">
            <span class="finding-tag tag-tech">Technology</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q3.1 IoT Sensor Coverage</div>
          <div class="finding-body">dsdadadasds</div>
        </div>

        <div class="finding-card" data-shift="tech">
          <div class="finding-header">
            <span class="finding-tag tag-tech">Technology</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q3.2 ERP Integration Level</div>
          <div class="finding-body">dsadaddas</div>
        </div>

        <div class="finding-card" data-shift="tech">
          <div class="finding-header">
            <span class="finding-tag tag-tech">Technology</span>
            <span class="status-pill pass"><i class="fa-solid fa-check"></i> Passed</span>
          </div>
          <div class="finding-title">Q3.3 Predictive Maintenance Analytics</div>
          <div class="finding-body">hiahhia</div>
        </div>
      </div>
    </section>

    <!-- 4. Framework View -->
    <section id="sec4">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-sitemap" style="color:var(--accent-blue);"></i> 4. Framework Architecture</div>
      </div>
      <div style="border: 1px dashed var(--border-color); border-radius: var(--radius-lg); padding: 32px; text-align: center; background: #fafafa;">
        <i class="fa-solid fa-house-laptop" style="font-size: 38px; color: var(--accent-blue); margin-bottom: 8px;"></i>
        <div style="font-weight: 700; font-size: 13px;">Smart Factory Strategy Framework View</div>
        <span style="font-size: 11px; color: var(--text-muted);">Integrated House Framework View (People, Process, Technology)</span>
      </div>
    </section>

    <!-- 5. Recommendations -->
    <section id="sec5">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-lightbulb" style="color:var(--accent-blue);"></i> 5. Recommendations</div>
      </div>
      <p style="font-size:12px; color:var(--text-muted); margin-bottom:12px;">Strategic recommendation document and implementation roadmap:</p>

      <div class="doc-preview-card">
        <div class="doc-thumbnail" style="color:var(--danger-rose);">
          <i class="fa-solid fa-file-pdf" style="font-size: 26px;"></i>
          <span style="font-size: 9px; font-weight: 800; margin-top: 4px;">PDF</span>
        </div>
        <div class="doc-info">
          <div class="title">OSFA_Recommendations_Roadmap_2024.pdf</div>
          <div class="meta">Uploaded Document • 2.4 MB • Strategic Implementation Plan</div>
          <div style="display:flex; gap:8px;">
            <button class="btn btn-outline btn-sm" onclick="openPreviewModal('OSFA Recommendations Roadmap', 'OSFA_Recommendations_Roadmap_2024.pdf')"><i class="fa-solid fa-eye"></i> Quick Preview</button>
            <a href="downloads/OSFA_Recommendations_Roadmap_2024.pdf" download class="btn btn-primary btn-sm"><i class="fa-solid fa-download"></i> Download Document</a>
          </div>
        </div>
      </div>
    </section>

    <!-- 6. Results Summary Analytics -->
    <section id="sec6">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-chart-pie" style="color:var(--accent-blue);"></i> 6. Results Summary Analytics</div>
      </div>

      <div class="radar-analytics-container">
        <!-- Radar Chart Side -->
        <div class="radar-chart-box">
          <canvas id="osfaRadarChart"></canvas>
        </div>

        <!-- Shift Breakdown Card Side -->
        <div class="shift-breakdown-card">
          <div class="title">Shift Breakdown</div>
          <div class="shift-row">
            <span class="lbl">People</span>
            <span class="val" style="color: #9f1239;">14%</span>
          </div>
          <div class="shift-row">
            <span class="lbl">Process</span>
            <span class="val" style="color: #d97706;">21%</span>
          </div>
          <div class="shift-row">
            <span class="lbl">Technology</span>
            <span class="val" style="color: #2563eb;">60%</span>
          </div>
        </div>
      </div>
    </section>

    <!-- 7. POC Identification -->
    <section id="sec7">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-flask" style="color:var(--accent-blue);"></i> 7. POC / Project Identification</div>
      </div>
      <table class="data-table-readonly">
        <thead>
          <tr>
            <th style="width:35px;">#</th>
            <th>Pain Points</th>
            <th>Projects</th>
            <th style="text-align:right; width:160px;">Estimated Costing (RM)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>sadsadadsa</td>
            <td>dsadadsada12</td>
            <td style="text-align:right; font-weight:700;">12,223.00</td>
          </tr>
        </tbody>
      </table>
      <div class="table-totals">Estimated POC Costing: <strong>RM 12,223.00</strong></div>

      <div class="doc-preview-card">
        <div class="doc-thumbnail" style="color:var(--accent-blue);">
          <i class="fa-solid fa-file-lines" style="font-size: 26px;"></i>
          <span style="font-size: 9px; font-weight: 800; margin-top: 4px;">BROCHURE</span>
        </div>
        <div class="doc-info">
          <div class="title">POC_Solution_Technical_Brochure.pdf</div>
          <div class="meta">Uploaded POC Attachment • 1.8 MB • Read-Only Reference</div>
          <div style="display:flex; gap:8px;">
            <button class="btn btn-outline btn-sm" onclick="openPreviewModal('POC Solution Brochure', 'POC_Solution_Technical_Brochure.pdf')"><i class="fa-solid fa-eye"></i> Quick Preview</button>
            <a href="downloads/POC_Solution_Technical_Brochure.pdf" download class="btn btn-outline btn-sm"><i class="fa-solid fa-download"></i> Download POC Brochure</a>
          </div>
        </div>
      </div>
    </section>

    <!-- 8. Projects Costing -->
    <section id="sec8">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-diagram-project" style="color:var(--accent-blue);"></i> 8. Projects & Costing</div>
      </div>
      <table class="data-table-readonly">
        <thead>
          <tr>
            <th style="width:35px;">#</th>
            <th>Projects</th>
            <th>Description / Details</th>
            <th>Implementation Area</th>
            <th>Impact</th>
            <th>Technology</th>
            <th style="text-align:right; width:130px;">Costing (RM)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Smart Industrial Sensor Grid</td>
            <td>Real-time line telemetry and automated fault notifications.</td>
            <td>Factory Assembly Line 1</td>
            <td>15% OEE Boost</td>
            <td>IoT Cloud telemetry</td>
            <td style="text-align:right; font-weight:700;">25,000.00</td>
          </tr>
        </tbody>
      </table>
      <div class="table-totals">Project Total Costing: <strong>RM 25,000.00</strong></div>
    </section>

    <!-- 9. Training Costing -->
    <section id="sec9">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-graduation-cap" style="color:var(--accent-blue);"></i> 9. Training & Development Costing</div>
      </div>
      <table class="data-table-readonly">
        <thead>
          <tr>
            <th style="width:35px;">#</th>
            <th>Training Module</th>
            <th>Objective</th>
            <th>Duration</th>
            <th>Audience</th>
            <th style="text-align:right; width:130px;">Costing (RM)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Industry 4.0 Staff Enablement Program</td>
            <td>Hands-on operator training on predictive telemetry dashboards.</td>
            <td>3 Days</td>
            <td>Engineers & Operators</td>
            <td style="text-align:right; font-weight:700;">5,500.00</td>
          </tr>
        </tbody>
      </table>
      <div class="table-totals">Training Total Costing: <strong>RM 5,500.00</strong></div>

      <!-- Proportional Investment Distribution Bar -->
      <div class="investment-bar-container">
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span style="font-size:12px; font-weight:800; color:var(--primary-dark);">Investment Breakdown (RM 42,723.00 Total)</span>
          <span style="font-size:11px; font-weight:700; color:var(--accent-blue);">100% Allocated</span>
        </div>
        <div class="progress-stacked">
          <div class="progress-segment" style="width:28.6%; background:var(--accent-blue);" title="POC: RM 12,223 (28.6%)"></div>
          <div class="progress-segment" style="width:58.5%; background:var(--success-green);" title="Project: RM 25,000 (58.5%)"></div>
          <div class="progress-segment" style="width:12.9%; background:var(--warning-amber);" title="Training: RM 5,500 (12.9%)"></div>
        </div>
        <div style="display:flex; gap:20px; font-size:11px; font-weight:700;">
          <span style="color:var(--accent-blue);"><i class="fa-solid fa-square"></i> POC (28.6%)</span>
          <span style="color:var(--success-green);"><i class="fa-solid fa-square"></i> Projects (58.5%)</span>
          <span style="color:var(--warning-amber);"><i class="fa-solid fa-square"></i> Training (12.9%)</span>
        </div>
      </div>
    </section>

    <!-- 10. Assessor Remarks -->
    <section id="sec10" style="margin-top: 30px;">
      <div class="section-title">
        <div class="title-text"><i class="fa-solid fa-pen-to-square" style="color:var(--accent-blue);"></i> 10. DMT Assessor Final Sign-Off</div>
      </div>
      <textarea class="textarea-box" placeholder="Official remarks from DMT assessors..."></textarea>
    </section>

  </main>
</div>

<!-- Lightbox Modal -->
<div class="modal-overlay" id="previewModal">
  <div class="modal-card">
    <span class="modal-close-btn" onclick="closePreviewModal()">&times;</span>
    <h3 id="modalDocTitle" style="margin-top:0; font-size:16px; color:var(--primary-dark);">Document Preview</h3>
    <div style="border: 1px dashed var(--border-color); border-radius: 8px; padding: 50px; text-align: center; background: #f8fafc;">
      <i class="fa-solid fa-file-pdf" style="font-size: 48px; color: var(--danger-rose); margin-bottom: 12px;"></i>
      <div style="font-size: 13px; font-weight: 700; color: var(--text-dark);" id="modalDocFileName">Document_Preview.pdf</div>
      <p style="font-size: 11px; color: var(--text-muted); margin-top: 4px;">PDF Lightbox Viewer Preview Mode</p>
    </div>
  </div>
</div>

<script>
  // Tab Switcher for OSFA Findings
  let currentShift = 'all';

  function switchShift(shift, btnElement) {
    currentShift = shift;
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    btnElement.classList.add('active');
    filterCards();
  }

  // Combined Search & Shift Filter for OSFA Finding Cards
  function filterCards() {
    let query = document.getElementById('findingSearch').value.toLowerCase();
    let cards = document.querySelectorAll('.finding-card');

    cards.forEach(card => {
      let matchesShift = (currentShift === 'all' || card.dataset.shift === currentShift);
      let matchesSearch = card.innerText.toLowerCase().includes(query);

      if (matchesShift && matchesSearch) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Modal Handlers
  function openPreviewModal(title, fileName) {
    document.getElementById('modalDocTitle').innerText = title;
    document.getElementById('modalDocFileName').innerText = fileName;
    document.getElementById('previewModal').style.display = 'flex';
  }

  function closePreviewModal() {
    document.getElementById('previewModal').style.display = 'none';
  }

  // Render Radar Chart matching the design
  document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('osfaRadarChart').getContext('2d');
    new Chart(ctx, {
      type: 'radar',
      data: {
        labels: ['People Capability', 'Process Efficiency', 'Technology Adoption', 'Governance', 'Integration'],
        datasets: [
          {
            label: 'Current Company Level',
            data: [35, 45, 68, 48, 52],
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37, 99, 235, 0.25)',
            borderWidth: 2.5,
            pointBackgroundColor: '#2563eb',
            pointRadius: 4
          },
          {
            label: 'Industry Benchmark',
            data: [50, 58, 40, 35, 42],
            borderColor: '#94a3b8',
            borderDash: [4, 4],
            backgroundColor: 'transparent',
            borderWidth: 2,
            pointBackgroundColor: '#94a3b8',
            pointRadius: 3
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              usePointStyle: true,
              font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' },
              padding: 16
            }
          }
        },
        scales: {
          r: {
            min: 0,
            max: 100,
            ticks: { stepSize: 20, font: { size: 10 } },
            pointLabels: {
              font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' },
              color: '#475569'
            },
            grid: { color: '#e2e8f0' }
          }
        }
      }
    });
  });
</script>

</body>
</html>