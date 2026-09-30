<?php 
  $page_title = "Crowd Innovator Applications";
  include 'dmt_navbar.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>

  <!-- Google Fonts & Font Awesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Export Libraries (SheetJS & html2pdf) -->
  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

  <style>
    :root {
      --bg-page: #f8fafc;
      --surface: #ffffff;
      --surface-subtle: #f1f5f9;
      --border: #e2e8f0;
      --border-focus: #6366f1;
      
      --text-main: #0f172a;
      --text-muted: #64748b;
      --text-light: #94a3b8;
      
      --primary: #4f46e5;
      --primary-hover: #4338ca;
      --primary-light: #eef2ff;
      --primary-border: #c7d2fe;
      
      --success: #059669;
      --success-light: #ecfdf5;
      --success-border: #a7f3d0;
      
      --warning: #d97706;
      --warning-light: #fffbeb;
      --warning-border: #fde68a;

      --danger: #e11d48;
      --danger-light: #fff1f2;
      --danger-border: #fecdd3;

      --shadow-xs: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow-sm: 0 1px 3px 0 rgba(15, 23, 42, 0.08), 0 1px 2px -1px rgba(15, 23, 42, 0.08);
      --shadow-md: 0 4px 6px -1px rgba(15, 23, 42, 0.08), 0 2px 4px -2px rgba(15, 23, 42, 0.05);
      --shadow-lg: 0 10px 15px -3px rgba(15, 23, 42, 0.08), 0 4px 6px -4px rgba(15, 23, 42, 0.04);
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 16px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
    
    body { 
      background-color: var(--bg-page); 
      color: var(--text-main); 
      padding: 28px 32px;
      line-height: 1.5;
      overflow-x: hidden;
    }

    .main-wrapper { 
      width: 100%; 
      max-width: 1400px; 
      margin: 0 auto; 
    }

    /* Top Bar Header */
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 24px;
    }

    .header-title h1 {
      font-size: 26px;
      font-weight: 800;
      color: var(--text-main);
      letter-spacing: -0.6px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .header-title p {
      font-size: 14px;
      color: var(--text-muted);
      margin-top: 4px;
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .counter-card {
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 8px 18px;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-sm);
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .counter-card .icon-wrap {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      background: var(--primary-light);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }
    .counter-card .info { display: flex; flex-direction: column; }
    .counter-card .lbl { font-size: 11px; font-weight: 700; color: var(--text-muted); letter-spacing: 0.5px; text-transform: uppercase; }
    .counter-card .val { font-size: 18px; font-weight: 800; color: var(--text-main); line-height: 1.2; }

    /* Buttons */
    .btn-exp {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 18px;
      border-radius: var(--radius-md);
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      border: 1px solid var(--border);
      background: var(--surface);
      transition: all 0.2s ease;
      box-shadow: var(--shadow-sm);
    }
    .btn-exp:hover { transform: translateY(-1px); box-shadow: var(--shadow-md); }
    .btn-excel { color: #166534; border-color: #bbf7d0; background: #f0fdf4; }
    .btn-excel:hover { background: #dcfce7; }
    .btn-pdf { color: #991b1b; border-color: #fecaca; background: #fef2f2; }
    .btn-pdf:hover { background: #fee2e2; }

    /* Filter Bar */
    .filter-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 16px 20px;
      margin-bottom: 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      box-shadow: var(--shadow-sm);
    }

    .search-box {
      position: relative;
      flex: 1;
      min-width: 280px;
    }
    .search-box i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 14px;
    }
    .search-box input {
      width: 100%;
      padding: 10px 14px 10px 40px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      font-size: 13.5px;
      outline: none;
      background: var(--bg-page);
      transition: all 0.2s;
    }
    .search-box input:focus {
      background: var(--surface);
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
    }

    .filter-actions { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }

    .segmented-tabs {
      display: flex;
      background: var(--surface-subtle);
      padding: 4px;
      border-radius: var(--radius-sm);
      gap: 2px;
      border: 1px solid var(--border);
    }
    .tab-item {
      border: none;
      background: transparent;
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 12.5px;
      font-weight: 600;
      color: var(--text-muted);
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .tab-item:hover { color: var(--text-main); }
    .tab-item.active { background: var(--surface); color: var(--primary); box-shadow: var(--shadow-xs); }

    .select-dropdown {
      padding: 8px 14px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      background: var(--bg-page);
      font-size: 13px;
      color: var(--text-main);
      font-weight: 500;
      outline: none;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .select-dropdown:focus { border-color: var(--primary); background: var(--surface); }

    .btn-reset {
      background: transparent;
      border: none;
      color: var(--text-muted);
      font-size: 12.5px;
      font-weight: 600;
      cursor: pointer;
      padding: 8px 12px;
      border-radius: var(--radius-sm);
      transition: all 0.2s;
    }
    .btn-reset:hover { background: var(--surface-subtle); color: var(--danger); }

    /* Live Counter Sub-bar */
    .results-summary {
      font-size: 13px;
      color: var(--text-muted);
      margin-bottom: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 4px;
    }
    .results-summary strong { color: var(--text-main); }

    /* Application Cards Layout */
    .app-cards-container {
      display: flex;
      flex-direction: flex-col;
      flex-direction: column;
      gap: 16px;
      width: 100%;
    }

    .app-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 20px;
      box-shadow: var(--shadow-sm);
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      width: 100%;
      position: relative;
    }
    .app-card:hover {
      border-color: var(--primary-border);
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    /* Card Header */
    .app-card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border);
      margin-bottom: 16px;
    }

    .company-identity { display: flex; align-items: center; gap: 14px; }
    .company-avatar {
      width: 46px;
      height: 46px;
      border-radius: var(--radius-md);
      background: linear-gradient(135deg, var(--primary-light), #e0e7ff);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 15px;
      border: 1px solid var(--primary-border);
      flex-shrink: 0;
    }

    .company-title { font-size: 16px; font-weight: 700; color: var(--text-main); letter-spacing: -0.2px; }
    .company-meta { 
      font-size: 12.5px; 
      color: var(--text-muted); 
      display: flex; 
      align-items: center;
      flex-wrap: wrap;
      gap: 10px; 
      margin-top: 3px; 
    }
    .company-meta span { display: inline-flex; align-items: center; gap: 5px; }

    .card-actions-top { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

    /* Badge Pills */
    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 12px;
      border-radius: 30px;
      font-size: 11.5px;
      font-weight: 700;
      letter-spacing: 0.2px;
    }
    .status-badge.unreviewed { 
      background: var(--danger-light); 
      color: var(--danger); 
      border: 1px solid var(--danger-border); 
    }
    .status-badge.reviewed { 
      background: var(--success-light); 
      color: var(--success); 
      border: 1px solid var(--success-border); 
    }

    /* Card Body Grid Layout */
    .app-card-body {
      display: grid;
      grid-template-columns: 1.1fr 1.1fr 1.4fr;
      gap: 20px;
    }

    @media (max-width: 992px) {
      .app-card-body { grid-template-columns: 1fr; gap: 16px; }
    }

    .info-block {
      background: var(--bg-page);
      border: 1px solid rgba(226, 232, 240, 0.7);
      border-radius: var(--radius-md);
      padding: 14px;
    }

    .info-block-title {
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      color: var(--text-muted);
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .info-text { font-size: 13px; color: var(--text-main); line-height: 1.5; }

    .badge-cloud { display: flex; flex-wrap: wrap; gap: 6px; }
    .pill-tag {
      background: #e2e8f0;
      color: #334155;
      padding: 3px 9px;
      border-radius: 6px;
      font-size: 11.5px;
      font-weight: 600;
    }
    .pill-tag.entity {
      background: #e0e7ff;
      color: #3730a3;
      border: 1px solid #c7d2fe;
    }

    /* Modern Buttons */
    .btn-act {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 8px 14px;
      border-radius: var(--radius-sm);
      font-size: 12.5px;
      font-weight: 600;
      border: 1px solid var(--border);
      background: var(--surface);
      color: var(--text-main);
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .btn-act:hover { background: var(--surface-subtle); border-color: #cbd5e1; }
    .btn-act.primary { 
      background: var(--primary); 
      color: #ffffff; 
      border: 1px solid var(--primary); 
    }
    .btn-act.primary:hover { background: var(--primary-hover); border-color: var(--primary-hover); }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 48px 20px;
      background: var(--surface);
      border: 1px dashed var(--border);
      border-radius: var(--radius-lg);
      display: none;
    }
    .empty-state i { font-size: 42px; color: var(--text-light); margin-bottom: 12px; }
    .empty-state h3 { font-size: 16px; font-weight: 700; color: var(--text-main); }
    .empty-state p { font-size: 13px; color: var(--text-muted); margin-top: 4px; }

    /* Modal Overlay */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.55);
      backdrop-filter: blur(5px);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      padding: 20px;
      opacity: 0;
      transition: opacity 0.25s ease;
    }
    .modal-overlay.active { 
      display: flex; 
      opacity: 1;
    }

    .modal-box {
      background: var(--surface);
      border-radius: var(--radius-lg);
      width: 100%;
      max-width: 880px;
      max-height: 90vh;
      display: flex;
      flex-direction: column;
      box-shadow: var(--shadow-lg);
      transform: scale(0.96);
      transition: transform 0.25s ease;
      overflow: hidden;
    }
    .modal-overlay.active .modal-box {
      transform: scale(1);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 28px;
      border-bottom: 1px solid var(--border);
      background: #fafafa;
    }

    .modal-header h3 { font-size: 18px; font-weight: 800; color: var(--text-main); }
    .modal-header p { font-size: 12.5px; color: var(--text-muted); margin-top: 2px; }
    
    .close-modal { 
      background: var(--surface-subtle); 
      border: 1px solid var(--border); 
      width: 32px; 
      height: 32px; 
      border-radius: 50%; 
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-muted);
      transition: all 0.2s;
    }
    .close-modal:hover { background: #e2e8f0; color: var(--text-main); }

    .modal-body {
      padding: 28px;
      overflow-y: auto;
      flex: 1;
    }

    .modal-section-title {
      font-size: 13px;
      font-weight: 800;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 14px;
      padding-bottom: 6px;
      border-bottom: 2px solid var(--primary-light);
    }

    .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .form-full { grid-column: span 2; }

    @media (max-width: 640px) {
      .form-grid { grid-template-columns: 1fr; }
      .form-full { grid-column: span 1; }
    }

    .field-label { 
      font-size: 12.5px; 
      font-weight: 700; 
      color: var(--text-main); 
      margin-bottom: 6px; 
      display: block; 
    }

    .form-control {
      width: 100%;
      padding: 10px 14px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      font-size: 13px;
      background: #f8fafc;
      color: var(--text-main);
      outline: none;
      transition: all 0.2s;
    }
    .form-control:focus {
      background: var(--surface);
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
    }
    .form-control[readonly] {
      background: #f1f5f9;
      color: #334155;
      cursor: not-allowed;
    }

    /* Checkbox & Radio Tiles */
    .check-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
      padding: 14px;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      background: #f8fafc;
    }
    @media (max-width: 500px) {
      .check-grid { grid-template-columns: 1fr; }
    }
    .check-item { 
      display: flex; 
      align-items: center; 
      gap: 10px; 
      font-size: 13px; 
      color: var(--text-main);
      font-weight: 500;
      cursor: pointer;
    }
    .check-item input[type="checkbox"], 
    .check-item input[type="radio"] { 
      accent-color: var(--primary); 
      width: 16px; 
      height: 16px; 
      cursor: pointer;
    }

    /* Notice Box */
    .notice-card {
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      border-radius: var(--radius-md);
      padding: 14px;
      margin: 16px 0;
      display: flex;
      gap: 12px;
      align-items: flex-start;
    }
    .notice-card i { color: #2563eb; font-size: 16px; margin-top: 2px; }
    .notice-card p { font-size: 12.5px; color: #1e40af; line-height: 1.5; font-weight: 500; }

    /* Documents Attachment Container */
    .doc-group { display: flex; flex-direction: column; gap: 8px; }
    .doc-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 14px;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      color: var(--primary);
      font-weight: 600;
      font-size: 12.5px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .doc-item:hover { 
      background: var(--primary-light); 
      border-color: var(--primary-border); 
    }
    .doc-item span { display: flex; align-items: center; gap: 10px; }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      padding: 16px 28px;
      background: #fafafa;
      border-top: 1px solid var(--border);
    }
  </style>
</head>
<body>

<div class="main-wrapper">

  <!-- Top Header Area -->
  <div class="top-bar">
    <div class="header-title">
      <h1><i class="fa-solid fa-shapes" style="color: var(--primary);"></i> Crowd Innovator Applications</h1>
      <p>Kelola, tapis, dan semak permohonan pendaftaran inovator industri</p>
    </div>

    <div class="header-right">
      <div class="counter-card">
        <div class="icon-wrap"><i class="fa-solid fa-users"></i></div>
        <div class="info">
          <span class="lbl">Registered</span>
          <span class="val">170</span>
        </div>
      </div>
      <button class="btn-exp btn-excel" onclick="exportToExcel()"><i class="fa-solid fa-file-excel"></i> Export Excel</button>
      <button class="btn-exp btn-pdf" onclick="exportToPDF()"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
    </div>
  </div>

  <!-- Filter Toolbar -->
  <div class="filter-card">
    <div class="search-box">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" id="searchInput" placeholder="Search for company, e-mel, or MyEP ID..." onkeyup="filterCards()">
    </div>

    <div class="filter-actions">
      <div class="segmented-tabs">
        <button class="tab-item active" onclick="setTab('ALL', this)">All</button>
        <button class="tab-item" onclick="setTab('Reviewed', this)">Reviewed</button>
        <button class="tab-item" onclick="setTab('Not Reviewed', this)">Not Reviewed</button>
      </div>

      <select id="entitySelect" class="select-dropdown" onchange="filterCards()">
        <option value="ALL">All Entity Types</option>
        <option value="Solution Provider">Solution Provider</option>
        <option value="Training Provider">Training Provider</option>
        <option value="Consultant">Consultant</option>
        <option value="Distributor">Distributor</option>
      </select>

      <button class="btn-reset" onclick="resetFilters()"><i class="fa-solid fa-rotate-right"></i> Reset</button>
    </div>
  </div>

  <!-- Results Summary Counter -->
  <div class="results-summary">
    <span>Showing <strong id="visibleCount">2</strong> of <strong>2</strong> applications</span>
  </div>

  <!-- Empty State Banner -->
  <div class="empty-state" id="emptyState">
    <i class="fa-solid fa-folder-open"></i>
    <h3>No results found</h3>
    <p>Please insert other keywords</p>
  </div>

  <!-- Responsive Card Container -->
  <div class="app-cards-container" id="exportArea">

    <!-- Card 1 -->
    <div class="app-card" data-status="Not Reviewed" data-entity="Solution Provider" data-search="irnow sdn bhd simon irnowsndbhd">
      <div class="app-card-header">
        <div class="company-identity">
          <div class="company-avatar">IR</div>
          <div>
            <div class="company-title">1. IRNOW SDN BHD</div>
            <div class="company-meta">
              <span><i class="fa-regular fa-calendar"></i> 28/09/2026</span>
              <span>•</span>
              <span><strong>MyEP ID:</strong> IRNOWSNDBHD</span>
              <span>•</span>
              <span><strong>CI Code:</strong> -</span>
            </div>
          </div>
        </div>

        <div class="card-actions-top">
          <span class="status-badge unreviewed"><i class="fa-solid fa-circle" style="font-size: 8px;"></i> Not Reviewed</span>
          <button class="btn-act" onclick="openModal('modalInfo1')"><i class="fa-regular fa-file-lines"></i> View Profile</button>
          <button class="btn-act primary" onclick="openModal('modalScreening1')"><i class="fa-solid fa-clipboard-check"></i> DMT Screening</button>
        </div>
      </div>

      <div class="app-card-body">
        <div class="info-block">
          <div class="info-block-title"><i class="fa-regular fa-id-card"></i> Contact Details</div>
          <div class="info-text">
            <strong>Mr SIMON KARL HUBERT BACKHAUS</strong><br>
            <span style="color: var(--primary); font-weight: 500;">simon@irnow.com.my</span><br>
            <span style="color: var(--text-muted);">0162953834</span>
          </div>
        </div>

        <div class="info-block">
          <div class="info-block-title"><i class="fa-solid fa-layer-group"></i> Entity & Pillars</div>
          <div style="margin-bottom: 8px;"><span class="pill-tag entity">Solution Provider</span></div>
          <div class="badge-cloud">
            <span class="pill-tag">Advanced Automation</span>
            <span class="pill-tag">AI</span>
            <span class="pill-tag">IIoT</span>
            <span class="pill-tag">System Integration</span>
            <span class="pill-tag">Simulation</span>
          </div>
        </div>

        <div class="info-block">
          <div class="info-block-title"><i class="fa-solid fa-briefcase"></i> Business Sector & Offering</div>
          <div class="info-text" style="color: #334155;">
            AUTOMATIC VISUAL INSPECTION (AVI) SYSTEMS AND REAL-TIME INDUSTRIAL INTERNET OF THINGS (IIOT) SYSTEMS WITH DATA ANALYTICS CAPABILITIES
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="app-card" data-status="Not Reviewed" data-entity="Training Provider, Solution Provider, Consultant" data-search="yen premium coach consulting sdn bhd steve yenpremium">
      <div class="app-card-header">
        <div class="company-identity">
          <div class="company-avatar">YP</div>
          <div>
            <div class="company-title">2. YEN PREMIUM COACH CONSULTING SDN BHD</div>
            <div class="company-meta">
              <span><i class="fa-regular fa-calendar"></i> 25/09/2026</span>
              <span>•</span>
              <span><strong>MyEP ID:</strong> YENPREMIUM</span>
              <span>•</span>
              <span><strong>CI Code:</strong> -</span>
            </div>
          </div>
        </div>

        <div class="card-actions-top">
          <span class="status-badge unreviewed"><i class="fa-solid fa-circle" style="font-size: 8px;"></i> Not Reviewed</span>
          <button class="btn-act" onclick="openModal('modalInfo1')"><i class="fa-regular fa-file-lines"></i> View Profile</button>
          <button class="btn-act primary" onclick="openModal('modalScreening1')"><i class="fa-solid fa-clipboard-check"></i> DMT Screening</button>
        </div>
      </div>

      <div class="app-card-body">
        <div class="info-block">
          <div class="info-block-title"><i class="fa-regular fa-id-card"></i> Contact Details</div>
          <div class="info-text">
            <strong>Mr STEVE LIM</strong><br>
            <span style="color: var(--primary); font-weight: 500;">steve@yen.com.my</span><br>
            <span style="color: var(--text-muted);">0123000943</span>
          </div>
        </div>

        <div class="info-block">
          <div class="info-block-title"><i class="fa-solid fa-layer-group"></i> Entity & Pillars</div>
          <div class="badge-cloud" style="margin-bottom: 8px;">
            <span class="pill-tag entity">Training Provider</span>
            <span class="pill-tag entity">Solution Provider</span>
            <span class="pill-tag entity">Consultant</span>
          </div>
          <div class="badge-cloud">
            <span class="pill-tag">Advanced Automation</span>
            <span class="pill-tag">AI</span>
            <span class="pill-tag">Cloud Computing</span>
            <span class="pill-tag">Cybersecurity</span>
          </div>
        </div>

        <div class="info-block">
          <div class="info-block-title"><i class="fa-solid fa-briefcase"></i> Business Sector & Offering</div>
          <div class="info-text" style="color: #334155;">
            PLANT LAYOUT, FACTORY AUTOMATION, ROBOTIC SYSTEM, WAREHOUSE MANAGEMENT SYSTEM, SMART GREENHOUSE, ERP...
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Modal 1: Company Profile (Full 17 Questions) -->
  <div class="modal-overlay" id="modalInfo1">
    <div class="modal-box">
      <div class="modal-header">
        <div>
          <h3>Crowd Innovator Application Details</h3>
          <p>Vendor Information Profile</p>
        </div>
        <button type="button" class="close-modal" onclick="closeModal('modalInfo1')"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="modal-body">
        <form class="form-grid">

          <div class="form-full">
            <label class="field-label">1. Vendor Name</label>
            <input type="text" class="form-control" value="IRNOW SDN BHD" readonly>
          </div>

          <div class="form-full">
            <label class="field-label">2. Registration No.</label>
            <input type="text" class="form-control" value="202101032314" readonly>
          </div>

          <div class="form-full">
            <label class="field-label">3. Type of Entity</label>
            <div class="check-grid">
              <label class="check-item"><input type="checkbox" disabled> Training Provider</label>
              <label class="check-item"><input type="checkbox" checked disabled> Solution Provider</label>
              <label class="check-item"><input type="checkbox" disabled> Distributor</label>
              <label class="check-item"><input type="checkbox" disabled> Consultant</label>
              <label class="check-item"><input type="checkbox" disabled> Machine Manufacturer</label>
              <label class="check-item"><input type="checkbox" disabled> Software Provider</label>
            </div>
          </div>

          <div class="form-full">
            <label class="field-label">4. Business Sector & Product Offering</label>
            <input type="text" class="form-control" value="AUTOMATIC VISUAL INSPECTION (AVI) SYSTEMS AND REAL-TIME IIOT SYSTEMS" readonly>
          </div>

          <div>
            <label class="field-label">5. Business Address</label>
            <input type="text" class="form-control" value="B-04-13, SEKI SERI PERDANA..." readonly>
          </div>

          <div>
            <label class="field-label">6. Business Address State</label>
            <input type="text" class="form-control" value="Selangor" readonly>
          </div>

          <div>
            <label class="field-label">7. Registration Address</label>
            <input type="text" class="form-control" value="Lot A, Address A, Petaling Jaya 47800" readonly>
          </div>

          <div>
            <label class="field-label">8. Registration Address State</label>
            <input type="text" class="form-control" value="Selangor" readonly>
          </div>

          <div>
            <label class="field-label">9. MSIC Code</label>
            <input type="text" class="form-control" value="0005" readonly>
          </div>

          <div>
            <label class="field-label">10. Contact Person</label>
            <input type="text" class="form-control" value="SIMON KARL HUBERT BACKHAUS" readonly>
          </div>

          <div>
            <label class="field-label">Position</label>
            <input type="text" class="form-control" value="MANAGER" readonly>
          </div>

          <div>
            <label class="field-label">Email</label>
            <input type="text" class="form-control" value="cinnovator@yopmail.com" readonly>
          </div>

          <div class="form-full">
            <label class="field-label">11. Mobile / Phone</label>
            <input type="text" class="form-control" value="0162953834" readonly>
          </div>


          <div class="form-full">
            <label class="field-label">12. Registered in MyEP SIRIM</label>
            <div class="check-grid">
              <label class="check-item"><input type="radio" name="myep" disabled> Yes</label>
              <label class="check-item"><input type="radio" name="myep" checked disabled> No</label>
            </div>

            <div class="notice-card">
              <i class="fa-solid fa-circle-info"></i>
              <p>Please visit the official website for MyEP registration. For enquiries or technical assistance, contact <strong>MYEP@sirim.my</strong> or call Pn Fazlin Afifah / Pn Noraini at <strong>03 55446226</strong>.</p>
            </div>
          </div>

          <div class="form-full">
            <label class="field-label">13. Pillar IR4.0 Applicable</label>
            <div class="check-grid">
              <label class="check-item"><input type="checkbox" disabled> Advanced Automation</label>
              <label class="check-item"><input type="checkbox" checked disabled> Advanced Material</label>
              <label class="check-item"><input type="checkbox" disabled> Artificial Intelligence</label>
              <label class="check-item"><input type="checkbox" disabled> Augmented Reality</label>
              <label class="check-item"><input type="checkbox" disabled> Autonomous Robot</label>
              <label class="check-item"><input type="checkbox" disabled> Big Data</label>
              <label class="check-item"><input type="checkbox" disabled> Cloud Computing</label>
              <label class="check-item"><input type="checkbox" disabled> Cybersecurity</label>
              <label class="check-item"><input type="checkbox" disabled> IoT</label>
              <label class="check-item"><input type="checkbox" disabled> Simulation</label>
              <label class="check-item"><input type="checkbox" disabled> Services</label>
              <label class="check-item"><input type="checkbox" disabled> System Integration</label>
            </div>
          </div>

          <div>
            <label class="field-label">14. Years of Operation</label>
            <input type="text" class="form-control" value="10" readonly>
          </div>

          <div>
            <label class="field-label">15. Malaysian Ownership (%)</label>
            <input type="text" class="form-control" value="100%" readonly>
          </div>

          <div class="form-full">
            <label class="field-label">16. Financial Reports (Past 3 Years)</label>
            <div class="doc-group">
              <a href="#" class="doc-item">
                <span><i class="fa-regular fa-file-pdf"></i> Audited report FY2023.pdf</span>
                <i class="fa-solid fa-download"></i>
              </a>
              <a href="#" class="doc-item">
                <span><i class="fa-regular fa-file-pdf"></i> 20241024 AFS (31 March 2024)_compressed.pdf</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>

          <div class="form-full">
            <label class="field-label">17. Track Records & Certificates</label>
            <div class="doc-group">
              <a href="#" class="doc-item">
                <span><i class="fa-regular fa-file-pdf"></i> Certificate of Incorporation cto.pdf</span>
                <i class="fa-solid fa-download"></i>
              </a>
              <a href="#" class="doc-item">
                <span><i class="fa-regular fa-file-pdf"></i> Case Study AVI.pdf</span>
                <i class="fa-solid fa-download"></i>
              </a>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn-act" onclick="closeModal('modalInfo1')">Close</button>
      </div>
    </div>
  </div>

  <!-- Modal 2: Screening Form -->
  <div class="modal-overlay" id="modalScreening1">
    <div class="modal-box">
      <div class="modal-header">
        <div>
          <h3>DMT CI Screening & Evaluation</h3>
          <p>Company: <strong>IRNOW SDN BHD</strong></p>
        </div>
        <button type="button" class="close-modal" onclick="closeModal('modalScreening1')"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="modal-body">
        <form class="form-grid" id="screeningForm1">
          <div class="form-full">
            <label class="field-label">1. Review Status</label>
            <div class="check-grid">
              <label class="check-item"><input type="radio" name="rev" value="Reviewed"> Reviewed</label>
              <label class="check-item"><input type="radio" name="rev" value="Not Reviewed" checked> Not Reviewed</label>
            </div>
          </div>

          <div class="form-full">
            <label class="field-label">2. MyEP ID</label>
            <input type="text" class="form-control" value="IRNOWSNDBHD">
          </div>

          <div>
            <label class="field-label">3. Technical Scoring</label>
            <input type="number" class="form-control" placeholder="0 - 100" min="0" max="100">
          </div>

          <div>
            <label class="field-label">4. Training Scoring</label>
            <input type="number" class="form-control" placeholder="0 - 100" min="0" max="100">
          </div>

          <div class="form-full">
            <label class="field-label">5. Remarks</label>
            <textarea class="form-control" rows="3" placeholder=""></textarea>
          </div>

          <div class="form-full">
            <label class="field-label">6. Registered SST</label>
            <div class="check-grid">
              <label class="check-item"><input type="radio" name="sst" value="true"> Yes</label>
              <label class="check-item"><input type="radio" name="sst" value="false" checked> No</label>
            </div>
          </div>

          <div class="form-full">
            <label class="field-label">7. Screening Documents</label>
            <div style="display: flex; gap: 10px; align-items: center;">
              <input type="file" class="form-control" style="background: white;">
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn-act" onclick="closeModal('modalScreening1')">Cancel</button>
        <button type="button" class="btn-act primary" onclick="closeModal('modalScreening1')"><i class="fa-solid fa-floppy-disk"></i> Update Review</button>
      </div>
    </div>
  </div>

</div>

<script>
  function openModal(id) { 
    const modal = document.getElementById(id);
    modal.classList.add('active'); 
    document.body.style.overflow = 'hidden';
  }

  function closeModal(id) { 
    const modal = document.getElementById(id);
    modal.classList.remove('active'); 
    document.body.style.overflow = 'auto';
  }

  // Close modal when clicking on overlay backdrop
  document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        closeModal(overlay.id);
      }
    });
  });

  // Close modal on Escape key press
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      document.querySelectorAll('.modal-overlay.active').forEach(modal => {
        closeModal(modal.id);
      });
    }
  });

  let activeTab = 'ALL';
  function setTab(tab, el) {
    document.querySelectorAll('.tab-item').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    activeTab = tab;
    filterCards();
  }

  function filterCards() {
    const query = document.getElementById('searchInput').value.toLowerCase().trim();
    const entity = document.getElementById('entitySelect').value;
    const cards = document.querySelectorAll('.app-card');
    let visibleCount = 0;

    cards.forEach(card => {
      const searchData = (card.dataset.search || '') + ' ' + card.innerText;
      const matchSearch = searchData.toLowerCase().includes(query);
      const matchEntity = (entity === 'ALL' || card.dataset.entity.includes(entity));
      const matchStatus = (activeTab === 'ALL' || card.dataset.status === activeTab);

      if (matchSearch && matchEntity && matchStatus) {
        card.style.display = 'block';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    document.getElementById('visibleCount').innerText = visibleCount;
    document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
  }

  function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('entitySelect').value = 'ALL';
    const firstTab = document.querySelector('.tab-item');
    setTab('ALL', firstTab);
  }

  function exportToExcel() {
    const tableData = [
      ["No", "Vendor Name", "Application Date", "MyEP ID", "Contact", "Entity Type", "Status"],
      ["1", "IRNOW SDN BHD", "28/09/2026", "IRNOWSNDBHD", "SIMON KARL HUBERT BACKHAUS", "Solution Provider", "Not Reviewed"],
      ["2", "YEN PREMIUM COACH CONSULTING SDN BHD", "25/09/2026", "YENPREMIUM", "STEVE LIM", "Training Provider, Solution Provider", "Not Reviewed"]
    ];
    const ws = XLSX.utils.aoa_to_sheet(tableData);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Applications");
    XLSX.writeFile(wb, "Crowd_Innovator_Applications.xlsx");
  }

  function exportToPDF() {
    const element = document.getElementById('exportArea');
    html2pdf().set({
      margin: [0.3, 0.3],
      filename: 'Crowd_Innovator_Applications.pdf',
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    }).from(element).save();
  }
</script>

</body>
</html>