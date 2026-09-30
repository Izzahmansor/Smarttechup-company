<?php 
  $page_title = "Onsite Assessment";
  include 'dmt_navbar.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>

  <!-- Google Fonts & Font Awesome -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Export Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/pptxgenjs@3.12.0/dist/pptxgen.bundle.js"></script>

  <style>
    :root {
      --bg-page: #f8fafc;
      --surface: #ffffff;
      --border: #e2e8f0;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --primary: #2b4c7e;
      --primary-hover: #1e3a5f;
      --success: #10b981;
      --success-light: #ecfdf5;
      --danger: #f43f5e;
      --danger-light: #fef2f2;
      --warning: #f59e0b;
      --warning-light: #fffbe2;
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
      --shadow-md: 0 4px 12px rgba(15, 23, 42, 0.08);
      --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }

    body { 
      background-color: var(--bg-page); 
      color: var(--text-main); 
      padding: 24px 32px;
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
      gap: 16px;
      margin-bottom: 24px;
    }

    .header-title h1 {
      font-size: 26px;
      font-weight: 800;
      color: #1e293b;
      letter-spacing: -0.5px;
    }

    .header-right-actions {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .counter-display {
      font-size: 15px;
      font-weight: 600;
      color: #334155;
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 8px 16px;
      border-radius: 10px;
      box-shadow: var(--shadow-sm);
    }
    .counter-display span {
      font-size: 20px;
      font-weight: 800;
      color: var(--primary);
      margin-left: 4px;
    }

    /* Export Buttons Group */
    .btn-exp {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 16px;
      border-radius: 10px;
      font-size: 12.5px;
      font-weight: 600;
      cursor: pointer;
      border: 1px solid var(--border);
      background: var(--surface);
      transition: all 0.2s;
      box-shadow: var(--shadow-sm);
    }
    .btn-exp:hover { transform: translateY(-1px); box-shadow: var(--shadow-md); }
    .btn-excel { color: #15803d; border-color: #bbf7d0; background: #f0fdf4; }
    .btn-pdf { color: #b91c1c; border-color: #fecaca; background: #fef2f2; }
    .btn-pptx { color: #c2410c; border-color: #ffedd5; background: #fff7ed; }

    /* Filters Toolbar */
    .filter-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 16px;
      margin-bottom: 20px;
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
      max-width: 400px;
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
      padding: 9.5px 14px 9.5px 40px;
      border-radius: 8px;
      border: 1px solid var(--border);
      font-size: 13px;
      outline: none;
      background: #ffffff;
      transition: all 0.2s;
    }
    .search-box input:focus {
      border-color: #3182ce;
      box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
    }

    .filter-dropdown-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .filter-dropdown-wrapper label {
      font-size: 12.5px;
      font-weight: 700;
      color: var(--text-muted);
    }

    .select-dropdown {
      padding: 9.5px 14px;
      border-radius: 8px;
      border: 1px solid var(--border);
      background: #ffffff;
      font-size: 13px;
      color: var(--text-main);
      font-weight: 600;
      outline: none;
      cursor: pointer;
      min-width: 220px;
      transition: all 0.2s;
    }

    /* Cards List */
    .data-list-container {
      display: flex;
      flex-direction: column;
      gap: 12px;
      width: 100%;
      margin-bottom: 24px;
    }

    .data-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 18px 20px;
      box-shadow: var(--shadow-sm);
      display: grid;
      grid-template-columns: 40px 1.5fr 1fr 1.5fr 1fr 120px;
      align-items: center;
      gap: 16px;
      transition: all 0.2s;
    }
    .data-card:hover {
      border-color: #cbd5e1;
      box-shadow: var(--shadow-md);
    }

    @media (max-width: 992px) {
      .data-card { grid-template-columns: 1fr 1fr; }
    }

    .card-no { font-weight: 700; color: var(--text-muted); font-size: 13px; }
    .company-title { font-size: 14.5px; font-weight: 700; color: var(--text-main); }
    .company-sub { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

    .lbl-title {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 4px;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 10px;
      border-radius: 6px;
      font-size: 11.5px;
      font-weight: 700;
    }
    .status-badge.passed { background: var(--success-light); color: var(--success); border: 1px solid #a7f3d0; }
    .status-badge.failed { background: var(--danger-light); color: var(--danger); border: 1px solid #fecaca; }
    .status-badge.pending { background: var(--warning-light); color: var(--warning); border: 1px solid #fef3c7; }
    .status-badge.blue { background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }

    .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 600;
      border: 1px solid var(--border);
      background: var(--surface);
      color: var(--text-main);
      cursor: pointer;
      transition: all 0.2s;
    }
    .btn-action:hover { background: #f8fafc; border-color: #cbd5e1; }
    .btn-action.primary { background: var(--primary); color: #fff; border: none; }
    .btn-action.primary:hover { background: var(--primary-hover); }

    /* Pagination Bar */
    .pagination-bar {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 12px;
      background: var(--surface);
      padding: 12px 18px;
      border-radius: 12px;
      border: 1px solid var(--border);
    }

    .page-btn {
      width: 32px;
      height: 32px;
      border-radius: 6px;
      border: 1px solid var(--border);
      background: var(--surface);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 13px;
      color: var(--text-main);
    }
    .page-btn.active {
      background: #eff6ff;
      color: #2563eb;
      font-weight: 700;
      border-color: #bfdbfe;
    }

    .page-select {
      padding: 6px 10px;
      border-radius: 6px;
      border: 1px solid var(--border);
      font-size: 12.5px;
      outline: none;
      background: #ffffff;
    }

    /* ========================================================= */
    /* MODAL STYLING */
    /* ========================================================= */
    .modal-overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(15, 23, 42, 0.55);
      backdrop-filter: blur(4px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: all 0.25s ease-in-out;
      padding: 20px;
    }

    .modal-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .modal-container {
      background: var(--surface);
      width: 100%;
      max-width: 720px;
      border-radius: 16px;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      overflow: hidden;
      transform: translateY(15px) scale(0.98);
      transition: all 0.25s ease-in-out;
    }

    .modal-overlay.active .modal-container {
      transform: translateY(0) scale(1);
    }

    .modal-header {
      padding: 20px 24px;
      background: #f8fafc;
      border-bottom: 1px solid var(--border);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .modal-header h3 {
      font-size: 18px;
      font-weight: 700;
      color: #0f172a;
    }

    .modal-header p {
      font-size: 12.5px;
      color: var(--text-muted);
      margin-top: 2px;
    }

    .btn-close-modal {
      background: transparent;
      border: none;
      font-size: 18px;
      color: var(--text-muted);
      cursor: pointer;
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
    }
    .btn-close-modal:hover { background: #e2e8f0; color: #0f172a; }

    .modal-body {
      padding: 24px;
      max-height: 75vh;
      overflow-y: auto;
    }

    /* Modal Sections */
    .modal-section-title {
      font-size: 12px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: var(--text-muted);
      margin-bottom: 12px;
    }

    .info-summary-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 12px;
      background: #f8fafc;
      padding: 14px;
      border-radius: 10px;
      border: 1px solid var(--border);
      margin-bottom: 20px;
    }

    .info-item {
      display: flex;
      flex-direction: column;
    }
    .info-item .lbl { font-size: 11px; color: var(--text-muted); font-weight: 600; }
    .info-item .val { font-size: 13.5px; font-weight: 700; color: var(--text-main); margin-top: 2px; }

    /* Assessor Cards inside Modal */
    .assessor-card-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 20px;
    }

    .assessor-item-card {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 14px;
      border-radius: 12px;
      border: 1px solid var(--border);
      background: #ffffff;
      transition: border-color 0.2s;
    }
    .assessor-item-card:hover { border-color: #cbd5e1; }

    .avatar-circle {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #ebf8ff;
      color: #2b6cb0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 16px;
      flex-shrink: 0;
    }

    .assessor-details { flex: 1; }
    .assessor-name { font-size: 14px; font-weight: 700; color: var(--text-main); }
    .assessor-role { font-size: 12px; color: #2563eb; font-weight: 600; }
    .assessor-meta { font-size: 11.5px; color: var(--text-muted); margin-top: 3px; display: flex; gap: 12px; }

    .modal-footer {
      padding: 16px 24px;
      background: #f8fafc;
      border-top: 1px solid var(--border);
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }
  </style>
</head>
<body>

<div class="main-wrapper">

  <!-- Header Section -->
  <div class="top-bar">
    <div class="header-title">
      <h1>Onsite Assessment</h1>
    </div>

    <div class="header-right-actions">
      <div class="counter-display">
        Companies Assigned: <span id="assignedCount">3</span>
      </div>
      
      <!-- Export Buttons -->
      <button class="btn-exp btn-excel" onclick="exportToExcel()"><i class="fa-solid fa-file-excel"></i> Export Excel</button>
      <button class="btn-exp btn-pdf" onclick="exportToPDF()"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
      <button class="btn-exp btn-pptx" onclick="exportToPPTX()"><i class="fa-solid fa-file-powerpoint"></i> Export PPTX</button>
    </div>
  </div>

  <!-- Filter & Search Toolbar -->
  <div class="filter-card">
    <div class="search-box">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" id="searchInput" placeholder="Search Company..." onkeyup="filterCards()">
    </div>

    <div class="filter-dropdown-wrapper">
      <label for="statusFilter"><i class="fa-solid fa-filter"></i> Filter Status:</label>
      <select id="statusFilter" class="select-dropdown" onchange="filterCards()">
        <option value="ALL">All Statuses</option>
        <option value="SA Passed">SA Passed</option>
        <option value="SA Failed">SA Failed</option>
        <option value="OSFA Conducted">OSFA Conducted</option>
        <option value="OSFA Report Submitted">OSFA Report Submitted</option>
        <option value="OSFA Report Released">OSFA Report Released</option>
      </select>
    </div>
  </div>

  <!-- Data List Area -->
  <div class="data-list-container" id="exportArea">

    <!-- Card 1 -->
    <div class="data-card" data-company-id="1" data-sa="SA Passed" data-onsite="OSFA Conducted" data-search="irnow sdn bhd">
      <div class="card-no">1.</div>
      <div>
        <div class="company-title">IRNOW SDN BHD</div>
        <div class="company-sub">ID: IRNOWSNDBHD</div>
      </div>
      <div>
        <div class="lbl-title">SA Status</div>
        <span class="status-badge passed"><i class="fa-solid fa-check"></i> SA Passed</span>
      </div>
      <div>
        <div class="lbl-title">Assessors & OSFA Date</div>
        <div class="assessor-info" style="font-size:12.5px; font-weight:600;">Dr. Ahmad Zaki & Eng. Sarah</div>
        <div style="font-size:11.5px; color:var(--text-muted);">Date: 15/10/2026</div>
      </div>
      <div>
        <div class="lbl-title">Onsite Status</div>
        <span class="status-badge blue">OSFA Conducted</span>
      </div>
      <div style="text-align: right;">
        <button class="btn-action primary" onclick="openAssessorModal(1)"><i class="fa-regular fa-eye"></i> View</button>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="data-card" data-company-id="2" data-sa="SA Passed" data-onsite="OSFA Report Submitted" data-search="yen premium coach consulting sdn bhd">
      <div class="card-no">2.</div>
      <div>
        <div class="company-title">YEN PREMIUM COACH CONSULTING SDN BHD</div>
        <div class="company-sub">ID: YENPREMIUM</div>
      </div>
      <div>
        <div class="lbl-title">SA Status</div>
        <span class="status-badge passed"><i class="fa-solid fa-check"></i> SA Passed</span>
      </div>
      <div>
        <div class="lbl-title">Assessors & OSFA Date</div>
        <div class="assessor-info" style="font-size:12.5px; font-weight:600;">Prof. Tan Wei Ming</div>
        <div style="font-size:11.5px; color:var(--text-muted);">Date: 18/10/2026</div>
      </div>
      <div>
        <div class="lbl-title">Onsite Status</div>
        <span class="status-badge blue">OSFA Report Submitted</span>
      </div>
      <div style="text-align: right;">
        <button class="btn-action primary" onclick="openAssessorModal(2)"><i class="fa-regular fa-eye"></i> View</button>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="data-card" data-company-id="3" data-sa="SA Failed" data-onsite="Pending" data-search="tech global solutions sdn bhd">
      <div class="card-no">3.</div>
      <div>
        <div class="company-title">TECH GLOBAL SOLUTIONS SDN BHD</div>
        <div class="company-sub">ID: TECHGLOBAL</div>
      </div>
      <div>
        <div class="lbl-title">SA Status</div>
        <span class="status-badge failed"><i class="fa-solid fa-xmark"></i> SA Failed</span>
      </div>
      <div>
        <div class="lbl-title">Assessors & OSFA Date</div>
        <div class="assessor-info" style="font-size:12.5px; font-weight:600;">Unassigned</div>
        <div style="font-size:11.5px; color:var(--text-muted);">-</div>
      </div>
      <div>
        <div class="lbl-title">Onsite Status</div>
        <span class="status-badge pending">Pending</span>
      </div>
      <div style="text-align: right;">
        <button class="btn-action" onclick="openAssessorModal(3)"><i class="fa-regular fa-eye"></i> View</button>
      </div>
    </div>

  </div>

  <!-- Pagination Bar -->
  <div class="pagination-bar">
    <button class="page-btn"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="page-btn active">1</button>
    <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
    
    <select class="page-select">
      <option value="15">15/page</option>
      <option value="30">30/page</option>
      <option value="50">50/page</option>
    </select>
  </div>

</div>

<!-- ========================================================= -->
<!-- ASSESSORS DETAILS MODAL -->
<!-- ========================================================= -->
<div class="modal-overlay" id="assessorModal" onclick="closeModalOnOverlay(event)">
  <div class="modal-container">
    
    <!-- Modal Header -->
    <div class="modal-header">
      <div>
        <h3 id="mCompanyName">Company Name</h3>
        <p id="mCompanyId">Company ID: -</p>
      </div>
      <button class="btn-close-modal" onclick="closeAssessorModal()"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">
      
      <!-- Session Details Summary -->
      <div class="modal-section-title">Assessment Summary</div>
      <div class="info-summary-grid">
        <div class="info-item">
          <span class="lbl">SA Status</span>
          <span class="val" id="mSaStatus">-</span>
        </div>
        <div class="info-item">
          <span class="lbl">OSFA Status</span>
          <span class="val" id="mOnsiteStatus">-</span>
        </div>
        <div class="info-item">
          <span class="lbl">OSFA Scheduled Date</span>
          <span class="val" id="mOsfaDate">-</span>
        </div>
        <div class="info-item">
          <span class="lbl">Venue / Mode</span>
          <span class="val" id="mVenue">Onsite Visit</span>
        </div>
      </div>

      <!-- Assigned Assessors List -->
      <div class="modal-section-title">Assigned Assessor Team</div>
      <div class="assessor-card-list" id="mAssessorsList">
        <!-- Dynamic Assessor Items Rendered Here -->
      </div>

      <!-- Assessment Notes -->
      <div class="modal-section-title">Assessment Notes / Instructions</div>
      <p style="font-size: 12.5px; color: var(--text-muted); background: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid var(--border);" id="mNotes">
        No additional notes provided.
      </p>

    </div>

    <!-- Modal Footer -->
    <div class="modal-footer">
      <button class="btn-action" onclick="closeAssessorModal()">Close</button>
      <button class="btn-action primary"><i class="fa-solid fa-print"></i> Print Assessor Slip</button>
    </div>

  </div>
</div>

<script>
  // Company & Assessor Database Mock
  const companyData = {
    1: {
      name: "IRNOW SDN BHD",
      code: "ID: IRNOWSNDBHD",
      saStatus: "SA Passed",
      onsiteStatus: "OSFA Conducted",
      date: "15/10/2026",
      venue: "Onsite Visit (Headquarters)",
      notes: "Assessor team successfully performed field inspection on October 15, 2026. Document compliance verified.",
      assessors: [
        {
          name: "Dr. Ahmad Zaki Bin Hassan",
          initials: "AZ",
          role: "Lead Assessor",
          expertise: "IT Systems & Cybersecurity",
          email: "ahmad.zaki@evaluators.org",
          phone: "+6012-345 6789"
        },
        {
          name: "Eng. Sarah Lee",
          initials: "SL",
          role: "Technical Assessor",
          expertise: "Cloud Architecture & Software Quality",
          email: "sarah.lee@evaluators.org",
          phone: "+6016-987 6543"
        }
      ]
    },
    2: {
      name: "YEN PREMIUM COACH CONSULTING SDN BHD",
      code: "ID: YENPREMIUM",
      saStatus: "SA Passed",
      onsiteStatus: "OSFA Report Submitted",
      date: "18/10/2026",
      venue: "Hybrid / Onsite Review",
      notes: "OSFA evaluation completed. Draft report submitted to panel for final verification.",
      assessors: [
        {
          name: "Prof. Tan Wei Ming",
          initials: "TM",
          role: "Lead Assessor",
          expertise: "Business Process & Innovation Frameworks",
          email: "tan.weiming@evaluators.org",
          phone: "+6013-112 2334"
        }
      ]
    },
    3: {
      name: "TECH GLOBAL SOLUTIONS SDN BHD",
      code: "ID: TECHGLOBAL",
      saStatus: "SA Failed",
      onsiteStatus: "Pending",
      date: "Unassigned",
      venue: "N/A",
      notes: "Applicant failed Self Assessment (SA) requirements. OSFA phase on hold.",
      assessors: []
    }
  };

  // Open Modal Function
  function openAssessorModal(companyId) {
    const data = companyData[companyId];
    if (!data) return;

    document.getElementById('mCompanyName').innerText = data.name;
    document.getElementById('mCompanyId').innerText = data.code;
    document.getElementById('mSaStatus').innerText = data.saStatus;
    document.getElementById('mOnsiteStatus').innerText = data.onsiteStatus;
    document.getElementById('mOsfaDate').innerText = data.date;
    document.getElementById('mVenue').innerText = data.venue;
    document.getElementById('mNotes').innerText = data.notes;

    const listContainer = document.getElementById('mAssessorsList');
    listContainer.innerHTML = '';

    if (data.assessors.length === 0) {
      listContainer.innerHTML = `
        <div style="text-align: center; padding: 20px; color: var(--text-muted); font-size: 13px; background: #f8fafc; border-radius: 8px; border: 1px dashed var(--border);">
          <i class="fa-solid fa-user-slash" style="font-size: 24px; margin-bottom: 8px; color: #cbd5e1;"></i>
          <p>No assessors currently assigned to this company.</p>
        </div>
      `;
    } else {
      data.assessors.forEach(a => {
        const itemHtml = `
          <div class="assessor-item-card">
            <div class="avatar-circle">${a.initials}</div>
            <div class="assessor-details">
              <div class="assessor-name">${a.name}</div>
              <div class="assessor-role">${a.role} &bull; <span style="color: var(--text-muted); font-weight: normal;">${a.expertise}</span></div>
              <div class="assessor-meta">
                <span><i class="fa-regular fa-envelope"></i> ${a.email}</span>
                <span><i class="fa-solid fa-phone"></i> ${a.phone}</span>
              </div>
            </div>
          </div>
        `;
        listContainer.innerHTML += itemHtml;
      });
    }

    document.getElementById('assessorModal').classList.add('active');
  }

  function closeAssessorModal() {
    document.getElementById('assessorModal').classList.remove('active');
  }

  function closeModalOnOverlay(e) {
    if (e.target.classList.contains('modal-overlay')) {
      closeAssessorModal();
    }
  }

  // Search & Filter Functions
  function filterCards() {
    const query = document.getElementById('searchInput').value.toLowerCase();
    const filterValue = document.getElementById('statusFilter').value;
    const cards = document.querySelectorAll('.data-card');
    let visibleCount = 0;

    cards.forEach(card => {
      const matchSearch = card.dataset.search.toLowerCase().includes(query) || card.innerText.toLowerCase().includes(query);
      
      let matchFilter = false;
      if (filterValue === 'ALL') {
        matchFilter = true;
      } else if (filterValue === card.dataset.sa || filterValue === card.dataset.onsite) {
        matchFilter = true;
      }

      if (matchSearch && matchFilter) {
        card.style.display = 'grid';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    document.getElementById('assignedCount').innerText = visibleCount;
  }

  // Export Functions
  function exportToExcel() {
    const tableData = [["No.", "Company Name", "SA Status", "Assessors & OSFA Date", "Onsite Status"]];
    document.querySelectorAll('.data-card').forEach((card, index) => {
      if (card.style.display !== 'none') {
        const company = card.querySelector('.company-title').innerText;
        const saStatus = card.querySelector('.status-badge').innerText;
        const assessor = card.querySelector('.assessor-info').innerText;
        const onsiteStatus = card.querySelectorAll('.status-badge')[1] ? card.querySelectorAll('.status-badge')[1].innerText : '-';
        tableData.push([index + 1, company, saStatus, assessor, onsiteStatus]);
      }
    });
    const ws = XLSX.utils.aoa_to_sheet(tableData);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Onsite_Assessments");
    XLSX.writeFile(wb, "Onsite_Assessment_Report.xlsx");
  }

  function exportToPDF() {
    const element = document.getElementById('exportArea');
    const opt = {
      margin: 0.3,
      filename: 'Onsite_Assessment_Report.pdf',
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
    };
    html2pdf().set(opt).from(element).save();
  }

  function exportToPPTX() {
    let pptx = new PptxGenJS();
    let slide = pptx.addSlide();
    slide.addText("Onsite Assessment Report", { x: 0.5, y: 0.4, fontSize: 22, bold: true, color: "1E293B" });

    let rows = [[
      { text: "No.", options: { bold: true, fill: "2B4C7E", color: "FFFFFF" } },
      { text: "Company Name", options: { bold: true, fill: "2B4C7E", color: "FFFFFF" } },
      { text: "SA Status", options: { bold: true, fill: "2B4C7E", color: "FFFFFF" } },
      { text: "Assessors", options: { bold: true, fill: "2B4C7E", color: "FFFFFF" } },
      { text: "Onsite Status", options: { bold: true, fill: "2B4C7E", color: "FFFFFF" } }
    ]];

    document.querySelectorAll('.data-card').forEach((card, index) => {
      if (card.style.display !== 'none') {
        const company = card.querySelector('.company-title').innerText;
        const saStatus = card.querySelector('.status-badge').innerText;
        const assessor = card.querySelector('.assessor-info').innerText;
        const onsiteStatus = card.querySelectorAll('.status-badge')[1] ? card.querySelectorAll('.status-badge')[1].innerText : '-';
        rows.push([(index + 1).toString(), company, saStatus, assessor, onsiteStatus]);
      }
    });

    slide.addTable(rows, { x: 0.5, y: 1.2, w: 9.0, fontSize: 11, border: { pt: "1", color: "E2E8F0" } });
    pptx.writeFile({ fileName: "Onsite_Assessment_Report.pptx" });
  }
</script>

</body>
</html>