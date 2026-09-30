<?php 
  $page_title = "Project Dashboard";
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
      --border-hover: #cbd5e1;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --primary: #1e1b4b;
      --primary-blue: #2563eb;
      --primary-blue-hover: #1d4ed8;
      --primary-gradient: linear-gradient(135deg, #1e1b4b 0%, #2563eb 100%);
      --accent-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      --shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05);
      --shadow-md: 0 4px 14px rgba(15, 23, 42, 0.06);
      --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 16px;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }

    body { 
      background-color: var(--bg-page); 
      color: var(--text-main); 
      padding: 24px 32px;
      overflow-x: hidden;
      min-height: 100vh;
    }

    .main-wrapper { 
      width: 100%; 
      max-width: 1450px; 
      margin: 0 auto; 
    }

    /* View Switcher */
    .view-section { display: none; }
    .view-section.active { display: block; }

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
      font-size: 28px;
      font-weight: 800;
      color: var(--primary);
      letter-spacing: -0.5px;
    }

    .header-right-actions {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-wrap: wrap;
    }

    .counter-display {
      font-size: 13.5px;
      font-weight: 600;
      color: #334155;
      background: var(--surface);
      border: 1px solid var(--border);
      padding: 8px 16px;
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-sm);
    }
    .counter-display span {
      font-size: 20px;
      font-weight: 800;
      color: var(--primary-blue);
      margin-left: 6px;
    }

    /* Export Buttons */
    .btn-exp {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 9px 16px;
      border-radius: var(--radius-md);
      font-size: 12.5px;
      font-weight: 600;
      cursor: pointer;
      border: 1px solid var(--border);
      background: var(--surface);
      transition: all 0.2s ease;
      box-shadow: var(--shadow-sm);
    }
    .btn-exp:hover { transform: translateY(-1px); box-shadow: var(--shadow-md); }
    .btn-excel { color: #15803d; border-color: #bbf7d0; background: #f0fdf4; }
    .btn-pdf { color: #b91c1c; border-color: #fecaca; background: #fef2f2; }
    .btn-pptx { color: #c2410c; border-color: #ffedd5; background: #fff7ed; }

    /* Filter Card */
    .filter-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 16px 20px;
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
      max-width: 420px;
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
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      font-size: 13px;
      outline: none;
      background: #ffffff;
      transition: all 0.2s ease;
    }
    .search-box input:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .select-dropdown {
      padding: 10px 14px;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      background: #ffffff;
      font-size: 13px;
      color: var(--text-main);
      font-weight: 600;
      outline: none;
      cursor: pointer;
      min-width: 220px;
    }

    /* Table Structure */
    .table-container {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 24px;
      box-shadow: var(--shadow-sm);
      margin-bottom: 20px;
    }

    .table-header-row {
      display: grid;
      grid-template-columns: 40px 2.2fr 1.2fr 2fr 2.5fr 1.8fr;
      padding-bottom: 14px;
      border-bottom: 2px solid var(--border);
      font-size: 12px;
      font-weight: 800;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      align-items: center;
      gap: 16px;
    }

    .project-card-list {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-top: 16px;
    }

    .project-row {
      display: grid;
      grid-template-columns: 40px 2.2fr 1.2fr 2fr 2.5fr 1.8fr;
      align-items: start;
      gap: 16px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
    }
    .project-row:last-child { border-bottom: none; padding-bottom: 0; }

    .row-no { font-weight: 700; color: var(--text-muted); font-size: 13px; }
    .company-name { font-size: 14px; font-weight: 800; color: var(--text-main); text-transform: uppercase; }
    .project-title { font-size: 13px; font-weight: 700; color: #1e3a8a; text-transform: uppercase; line-height: 1.4; }
    .meta-text { font-size: 11.5px; color: var(--text-muted); margin-top: 3px; line-height: 1.4; }
    
    .status-tag {
      display: inline-block;
      font-size: 11px;
      font-weight: 800;
      color: #047857;
      background: #ecfdf5;
      border: 1px solid #a7f3d0;
      padding: 3px 10px;
      border-radius: 20px;
      letter-spacing: 0.3px;
    }

    .pm-assigned {
      font-size: 12.5px;
      font-weight: 800;
      color: var(--text-main);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .status-timeline-group {
      margin-top: 10px;
      display: flex;
      flex-direction: column;
      gap: 5px;
      background: #f8fafc;
      padding: 10px 12px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
    }
    .rfp-step-lbl { font-size: 11px; color: var(--text-main); font-weight: 600; }
    .rfp-step-val { font-size: 11px; color: var(--text-muted); font-weight: 500; display: inline-block; }

    .btn-pill-rfp {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      border-radius: 20px;
      border: 1px solid #10b981;
      color: #047857;
      background: #ecfdf5;
      font-size: 11.5px;
      font-weight: 700;
      cursor: pointer;
      margin-top: 10px;
      transition: all 0.2s ease;
    }
    .btn-pill-rfp:hover { background: #d1fae5; transform: translateY(-1px); }

    .action-btn-stack {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 6px;
    }

    .btn-action-outline {
      display: inline-flex;
      align-items: center;
      justify-content: flex-start;
      gap: 8px;
      width: 100%;
      max-width: 210px;
      padding: 7px 12px;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border);
      background: #ffffff;
      color: #334155;
      font-size: 11.5px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: var(--shadow-sm);
    }
    .btn-action-outline:hover { background: #f8fafc; border-color: var(--border-hover); color: var(--text-main); }

    .btn-action-bidding { background: #10b981 !important; color: #ffffff !important; border-color: #059669 !important; }
    .btn-action-bidding:hover { background: #059669 !important; }

    .btn-action-payment { background: var(--primary-blue) !important; color: #ffffff !important; border-color: #1d4ed8 !important; }
    .btn-action-payment:hover { background: var(--primary-blue-hover) !important; }

    /* Back Link Button */
    .back-nav-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--surface);
      border: 1px solid var(--border);
      color: #334155;
      padding: 9px 18px;
      border-radius: var(--radius-md);
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      box-shadow: var(--shadow-sm);
      margin-bottom: 20px;
    }
    .back-nav-btn:hover {
      background: #ffffff;
      border-color: var(--border-hover);
      color: var(--primary-blue);
      transform: translateX(-3px);
    }

    /* Executive Cards */
    .executive-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-md);
      overflow: hidden;
      margin-bottom: 24px;
    }

    /* Executive Hero Header */
    .hero-header-banner {
      background: var(--primary-gradient);
      color: #ffffff;
      padding: 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 20px;
      position: relative;
    }

    .hero-left-info {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .hero-avatar-circle {
      width: 72px;
      height: 72px;
      border-radius: var(--radius-md);
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      border: 2px solid rgba(255, 255, 255, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      font-weight: 800;
      color: #ffffff;
      box-shadow: var(--shadow-sm);
    }

    .hero-text-details h2 {
      font-size: 22px;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -0.3px;
      margin-bottom: 6px;
    }

    .hero-badges-group {
      display: flex;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    .hero-badge-pill {
      background: rgba(255, 255, 255, 0.18);
      border: 1px solid rgba(255, 255, 255, 0.25);
      color: #ffffff;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* Top Highlight Stat Grid */
    .hero-stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      padding: 20px 32px;
      background: #f8fafc;
      border-bottom: 1px solid var(--border);
    }

    .stat-highlight-card {
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 14px 18px;
      display: flex;
      align-items: center;
      gap: 14px;
      box-shadow: var(--shadow-sm);
    }

    .stat-icon-wrapper {
      width: 44px;
      height: 44px;
      border-radius: var(--radius-sm);
      background: #eff6ff;
      color: var(--primary-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }

    .stat-text-box span.lbl {
      font-size: 11px;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.4px;
      display: block;
    }

    .stat-text-box span.val {
      font-size: 15px;
      font-weight: 800;
      color: var(--text-main);
    }

    /* Content Body Layout */
    .executive-body { padding: 32px; }

    .section-block { margin-bottom: 28px; }

    .section-title-bar {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 18px;
      padding-bottom: 8px;
      border-bottom: 2px solid #f1f5f9;
    }
    .section-title-bar i { font-size: 18px; color: var(--primary-blue); }
    .section-title-bar h3 { font-size: 16px; font-weight: 800; color: var(--primary); }

    /* Key-Value Tile Grid */
    .tile-grid-2 { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 16px; }
    .tile-grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 16px; }
    .tile-grid-1 { display: grid; grid-template-columns: 1fr; gap: 16px; }

    .info-tile {
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 14px 18px;
      transition: all 0.2s ease;
    }
    .info-tile:hover {
      border-color: var(--border-hover);
      box-shadow: var(--shadow-sm);
    }

    .info-tile label {
      font-size: 11px;
      font-weight: 800;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.4px;
      display: block;
      margin-bottom: 6px;
    }

    .info-tile .tile-data {
      font-size: 14px;
      font-weight: 700;
      color: var(--text-main);
      line-height: 1.5;
      word-break: break-word;
    }

    .clean-data-input {
      width: 100%;
      background: transparent;
      border: none;
      font-size: 14px;
      font-weight: 700;
      color: var(--text-main);
      outline: none;
      pointer-events: none;
    }

    /* Contact Details Highlight Box */
    .contact-card-highlight {
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 20px;
    }

    .contact-card-header {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 16px;
    }

    .contact-avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: var(--primary-blue);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 18px;
    }

    /* Expertise Tags & Pills */
    .tag-cloud {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .tag-pill {
      background: #f1f5f9;
      border: 1px solid var(--border);
      color: #1e293b;
      padding: 7px 14px;
      border-radius: var(--radius-sm);
      font-size: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }
    .tag-pill i { color: var(--primary-blue); }
    .tag-pill:hover { background: #e2e8f0; }

    /* Attached Document Card */
    .doc-file-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 12px 16px;
      margin-bottom: 10px;
      transition: all 0.2s ease;
    }
    .doc-file-card:hover { border-color: #bfdbfe; background: #eff6ff; }

    /* Remarks Custom Textarea Box */
    .remarks-input-box {
      width: 100%;
      padding: 14px 16px;
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text-main);
      outline: none;
      transition: all 0.2s ease;
      resize: vertical;
    }
    .remarks-input-box:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }

    /* Action Toolbar Footer */
    .action-bar-footer {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 12px;
      margin-top: 28px;
      padding-top: 20px;
      border-top: 1px solid var(--border);
    }

    .btn-save-draft {
      background: var(--primary-blue);
      color: #ffffff;
      border: none;
      padding: 10px 24px;
      border-radius: var(--radius-md);
      font-weight: 700;
      font-size: 13.5px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
    }
    .btn-save-draft:hover { background: var(--primary-blue-hover); transform: translateY(-1px); }

    .btn-cancel-action {
      background: #ffffff;
      border: 1px solid var(--border);
      color: #475569;
      padding: 10px 22px;
      border-radius: var(--radius-md);
      font-weight: 700;
      font-size: 13.5px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .btn-cancel-action:hover { background: #f1f5f9; color: var(--text-main); }

    /* Floating Action Button */
    .floating-refresh-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background: var(--primary-blue);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      box-shadow: var(--shadow-lg);
      cursor: pointer;
      border: none;
      transition: all 0.2s ease;
      z-index: 100;
    }
    .floating-refresh-btn:hover { transform: rotate(90deg) scale(1.05); background: var(--primary-blue-hover); }

    /* Generic Modal Overlay */
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
    .modal-overlay.active { opacity: 1; visibility: visible; }

    .modal-container {
      background: var(--surface);
      width: 100%;
      max-width: 650px;
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      overflow: hidden;
    }

    .modal-header {
      padding: 18px 24px;
      background: #f8fafc;
      border-bottom: 1px solid var(--border);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .modal-header h3 { font-size: 17px; font-weight: 700; color: var(--text-main); }

    .btn-close-modal {
      background: transparent;
      border: none;
      font-size: 18px;
      color: var(--text-muted);
      cursor: pointer;
      width: 32px;
      height: 32px;
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .btn-close-modal:hover { background: #e2e8f0; color: var(--text-main); }

    .modal-body { padding: 20px 24px; max-height: 70vh; overflow-y: auto; font-size: 13.5px; line-height: 1.6; }
    .modal-footer { padding: 14px 24px; background: #f8fafc; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; }

    /* Section Page Toggle Rules for Technical RFP View */
    .section-page { display: none; }
    .section-page.active-page { display: block; }

    /* Progress Tracker & Tab Styles */
    .proposal-progress-card {
      background: #f8fafc;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 20px;
      margin-bottom: 24px;
    }

    .progress-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }
    .progress-header h3 { font-size: 15px; font-weight: 800; color: var(--primary); }
    .progress-percentage { font-size: 13px; font-weight: 700; color: var(--primary-blue); }

    .progress-track {
      width: 100%;
      height: 8px;
      background-color: #e2e8f0;
      border-radius: 4px;
      overflow: hidden;
      margin-bottom: 18px;
    }

    .progress-fill {
      height: 100%;
      background-color: var(--primary-blue);
      transition: width 0.3s ease;
    }

    .wizard-steps-tabs {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 6px;
    }

    .wizard-tab {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;
      border-radius: 20px;
      border: 1px solid var(--border);
      background: #ffffff;
      font-size: 12px;
      font-weight: 700;
      color: var(--text-muted);
      cursor: pointer;
      white-space: nowrap;
      transition: all 0.2s ease;
    }

    .wizard-tab.active {
      background: var(--primary-blue);
      color: #ffffff;
      border-color: var(--primary-blue);
    }

    .wizard-tab.completed {
      background: #f0fdf4;
      color: #16a34a;
      border-color: #bbf7d0;
    }

    .tab-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: rgba(0,0,0,0.06);
      font-size: 11px;
    }

    /* Form Section Header Layout */
    .section-header {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      margin-bottom: 20px;
    }

    .section-icon {
      width: 48px;
      height: 48px;
      border-radius: var(--radius-md);
      background: #eff6ff;
      color: var(--primary-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }

    .section-number {
      font-size: 12px;
      font-weight: 800;
      color: var(--primary-blue);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .section-header h2 {
      font-size: 20px;
      font-weight: 800;
      color: var(--primary);
      margin: 2px 0 4px 0;
    }

    .section-header p {
      font-size: 13px;
      color: var(--text-muted);
    }

    .form-card {
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 24px;
      box-shadow: var(--shadow-sm);
    }

    .form-card-title {
      font-size: 14px;
      font-weight: 800;
      color: var(--primary);
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 16px;
      padding-bottom: 8px;
      border-bottom: 1px solid #f1f5f9;
    }

    /* Wizard Navigation Footer */
    .wizard-nav-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 24px;
      padding-top: 16px;
      border-top: 1px solid var(--border);
    }

    .btn-next, .btn-draft {
      padding: 9px 18px;
      border-radius: var(--radius-md);
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      border: 1px solid var(--border);
      background: #ffffff;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }

    .btn-next {
      background: var(--primary-blue);
      color: #ffffff;
      border-color: var(--primary-blue);
    }
    .btn-next:hover { background: var(--primary-blue-hover); }
    .btn-draft:hover { background: #f8fafc; border-color: var(--border-hover); }

    .view-badge {
      font-size: 12px;
      font-weight: 700;
      color: #059669;
      background: #ecfdf5;
      padding: 6px 14px;
      border-radius: 20px;
      border: 1px solid #a7f3d0;
    }

    /* Tables in RFP Page */
    .costing-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin-top: 10px;
      font-size: 12.5px;
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      overflow: hidden;
    }
    .costing-table th, .costing-table td {
      border-bottom: 1px solid var(--border);
      border-right: 1px solid var(--border);
      padding: 10px 14px;
    }
    .costing-table th:last-child, .costing-table td:last-child { border-right: none; }
    .costing-table tr:last-child td { border-bottom: none; }
    .costing-table th {
      background-color: #f8fafc;
      color: var(--text-muted);
      font-weight: 800;
      text-transform: uppercase;
      font-size: 11px;
      letter-spacing: 0.4px;
    }
    .table-input {
      width: 100%;
      border: none;
      background: transparent;
      outline: none;
      color: var(--text-main);
      font-size: 13px;
      font-weight: 600;
    }
    .category-header-row td {
      background-color: #f1f5f9;
      font-weight: 800;
      color: var(--primary);
    }
    .subtotal-row td {
      background-color: #f8fafc;
      font-weight: 700;
    }
    .summary-highlight td { background-color: #eff6ff; }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; font-size: 12px; font-weight: 800; color: var(--text-muted); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.4px; }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      font-size: 13.5px;
      font-weight: 600;
      color: var(--text-main);
      background: #ffffff;
    }
    .form-group input:disabled, .form-group textarea:disabled {
      background: #f8fafc;
      color: #334155;
    }
    .form-row { display: flex; gap: 16px; }
    .form-row .form-group { flex: 1; }

    /* Front Page Cover Specific Styling */
    .cover-page-card {
      background: #ffffff;
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 48px;
      box-shadow: var(--shadow-md);
      position: relative;
      overflow: hidden;
      margin-bottom: 24px;
    }
    .cover-top-accent {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 8px;
      background: var(--primary-gradient);
    }
    .cover-header-flex {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #f1f5f9;
      padding-bottom: 20px;
      margin-bottom: 32px;
    }
    .cover-logo-badge {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-size: 18px;
      font-weight: 800;
      color: var(--primary);
    }
    .cover-status-badge {
      background: #eff6ff;
      color: #1d4ed8;
      border: 1px solid #bfdbfe;
      font-size: 11px;
      font-weight: 800;
      padding: 6px 14px;
      border-radius: 20px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    .cover-hero-title-box {
      text-align: center;
      margin: 40px 0 48px 0;
      padding: 0 20px;
    }
    .cover-tagline {
      font-size: 12.5px;
      font-weight: 800;
      color: var(--primary-blue);
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 12px;
    }
    .cover-main-title {
      font-size: 32px;
      font-weight: 800;
      color: var(--primary);
      line-height: 1.3;
      max-width: 900px;
      margin: 0 auto 20px auto;
      letter-spacing: -0.5px;
    }
    .cover-sub-title {
      font-size: 15px;
      font-weight: 600;
      color: var(--text-muted);
      max-width: 750px;
      margin: 0 auto;
      line-height: 1.6;
    }
    .cover-meta-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      background: #f8fafc;
      padding: 28px;
      border-radius: var(--radius-md);
      border: 1px solid var(--border);
      margin-top: 32px;
    }
    .cover-meta-item label {
      font-size: 11px;
      font-weight: 800;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      display: block;
      margin-bottom: 6px;
    }
    .cover-meta-item p {
      font-size: 14.5px;
      font-weight: 800;
      color: var(--text-main);
    }
    .cover-footer-stamp {
      display: flex;
      justify-content: space-between;
      align-items: flex-end;
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px dashed var(--border);
      font-size: 12px;
      color: var(--text-muted);
      font-weight: 600;
    }

    @media (max-width: 1024px) {
      .table-header-row, .project-row {
        grid-template-columns: 1fr;
        gap: 12px;
      }
      .table-header-row { display: none; }
      .action-btn-stack { align-items: stretch; }
      .btn-action-outline { max-width: 100%; }
    }
  </style>
</head>
<body>

<div class="main-wrapper">

  <!-- ================= LIST VIEW SECTION ================= -->
  <div id="list-view" class="view-section active">
    <!-- Header -->
    <div class="top-bar">
      <div class="header-title">
        <h1>Project Dashboard</h1>
      </div>

      <div class="header-right-actions">
        <div class="counter-display">
          Companies Applied: <span id="projectCount">2</span>
        </div>
        
        <!-- Export Buttons -->
        <button class="btn-exp btn-excel" onclick="exportToExcel()"><i class="fa-solid fa-file-excel"></i> Excel</button>
        <button class="btn-exp btn-pdf" onclick="exportToPDF()"><i class="fa-solid fa-file-pdf"></i> PDF</button>
        <button class="btn-exp btn-pptx" onclick="exportToPPTX()"><i class="fa-solid fa-file-powerpoint"></i> PPTX</button>
      </div>
    </div>

    <!-- Search & Filter Options -->
    <div class="filter-card">
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="searchInput" placeholder="Search Company or Project Title..." onkeyup="filterProjects()">
      </div>

      <div class="filter-dropdown-wrapper" style="display:flex; align-items:center; gap:10px;">
        <label for="statusFilter" style="font-size:12.5px; font-weight:700; color:var(--text-muted);"><i class="fa-solid fa-filter"></i> Status:</label>
        <select id="statusFilter" class="select-dropdown" onchange="filterProjects()">
          <option value="ALL">All Statuses</option>
          <option value="ACCEPTED">Proposal Accepted</option>
          <option value="SUBMITTED">Proposal Submitted</option>
          <option value="RELEASED">Proposal Released</option>
          <option value="WITHDRAWN">Withdrawn</option>
        </select>
      </div>
    </div>

    <!-- Table Container -->
    <div class="table-container" id="exportArea">
      
      <div class="table-header-row">
        <div>No.</div>
        <div>Company Name</div>
        <div>Project Status</div>
        <div>Project Title</div>
        <div>Technical RFP Status</div>
        <div style="text-align: right;">Actions</div>
      </div>

      <div class="project-card-list">

        <!-- Row 1: BOOGA MAJU SDN BHD -->
        <div class="project-row" data-status="ACCEPTED" data-search="booga maju sdn bhd automated production monitoring and quality control system">
          <div class="row-no">1.</div>
          <div>
            <div class="company-name">BOOGA MAJU SDN BHD</div>
            <div class="meta-text"><i class="fa-regular fa-calendar-check"></i> OSFA Accepted: 24/09/2026</div>
            <div class="meta-text"><i class="fa-regular fa-clock"></i> Apply Project: 28/09/2026</div>
          </div>
          <div>
            <span class="status-tag">ACCEPTED</span>
            <div class="meta-text">28/09/2026</div>
          </div>
          <div>
            <div class="project-title">BOOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM</div>
          </div>
          <div>
            <div class="pm-assigned"><i class="fa-solid fa-user-gear"></i> ASSESSOR AND PM 1</div>
            <div class="meta-text">ASSIGNED: 28/09/2026 | ACCEPTED: 28/09/2026</div>

            <div class="status-timeline-group">
              <div>
                <span class="rfp-step-lbl">Uploaded:</span>
                <span class="rfp-step-val">28/09/2026</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Submitted:</span>
                <span class="rfp-step-val">28/09/2026</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Released to Company:</span>
                <span class="rfp-step-val">28/09/2026</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Accepted by Company:</span>
                <span class="rfp-step-val">28/09/2026</span>
              </div>
            </div>

            <button class="btn-pill-rfp" onclick="showRfpPage('BOOGA MAJU SDN BHD')">
              <i class="fa-solid fa-folder-open"></i> View Proposal & RFP
            </button>
          </div>
          
          <!-- 6 Action Buttons -->
          <div class="action-btn-stack">
            <button class="btn-action-outline" onclick="loadCompanyInfo('BOOGA MAJU SDN BHD')">
              <i class="fa-regular fa-building"></i> Company Information
            </button>
            <button class="btn-action-outline" onclick="openModal('OSFA Report', 'OSFA Report Status: Verified<br>Date: 24/09/2026<br>Score: 92.0%')">
              <i class="fa-regular fa-file-chart-column"></i> View OSFA Report
            </button>
            <button class="btn-action-outline" onclick="loadPMInfo('BOOGA MAJU SDN BHD')">
              <i class="fa-regular fa-user"></i> View PM
            </button>
            <button class="btn-action-outline" onclick="showRfpPage('BOOGA MAJU SDN BHD')">
              <i class="fa-regular fa-file-lines"></i> Technical & RFP
            </button>
            <button class="btn-action-outline btn-action-bidding" onclick="openModal('Open Bidding', 'Initiating Open Bidding process for BOOGA MAJU SDN BHD...')">
              <i class="fa-solid fa-gavel"></i> Open Bidding
            </button>
            <button class="btn-action-outline btn-action-payment" onclick="openModal('Review CI Payment', 'Reviewing CI Payment status for BOOGA MAJU SDN BHD.')">
              <i class="fa-regular fa-credit-card"></i> Review CI Payment
            </button>
          </div>
        </div>

        <!-- Row 2: HISTOTECH ENGINEERING SDN BHD -->
        <div class="project-row" data-status="ACCEPTED" data-search="histotech engineering sdn bhd">
          <div class="row-no">2.</div>
          <div>
            <div class="company-name">HISTOTECH ENGINEERING SDN BHD</div>
            <div class="meta-text"><i class="fa-regular fa-calendar-check"></i> OSFA Accepted: 02/08/2026</div>
            <div class="meta-text"><i class="fa-regular fa-clock"></i> Apply Project: 02/08/2026</div>
          </div>
          <div>
            <span class="status-tag">ACCEPTED</span>
            <div class="meta-text">02/08/2026</div>
          </div>
          <div>
            <span style="color: var(--text-muted);">-</span>
          </div>
          <div>
            <div class="pm-assigned"><i class="fa-solid fa-user-gear"></i> HASLAN FADLI BIN AHMAD MARZUKI</div>
            <div class="meta-text">ASSIGNED: 03/08/2026 | ACCEPTED: 04/08/2026</div>

            <div class="status-timeline-group">
              <div>
                <span class="rfp-step-lbl">Uploaded:</span>
                <span class="rfp-step-val" style="color: #ef4444; font-weight: 700;">- DELAYED</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Submitted:</span>
                <span class="rfp-step-val">-</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Released to Company:</span>
                <span class="rfp-step-val">-</span>
              </div>
              <div>
                <span class="rfp-step-lbl">Accepted by Company:</span>
                <span class="rfp-step-val">-</span>
              </div>
            </div>

            <button class="btn-pill-rfp" onclick="showRfpPage('HISTOTECH ENGINEERING SDN BHD')">
              <i class="fa-solid fa-folder-open"></i> View Proposal & RFP
            </button>
          </div>

          <!-- 6 Action Buttons -->
          <div class="action-btn-stack">
            <button class="btn-action-outline" onclick="loadCompanyInfo('HISTOTECH ENGINEERING SDN BHD')">
              <i class="fa-regular fa-building"></i> Company Information
            </button>
            <button class="btn-action-outline" onclick="openModal('OSFA Report', 'OSFA Report Status: Verified<br>Date: 02/08/2026<br>Score: 88.5%')">
              <i class="fa-regular fa-file-chart-column"></i> View OSFA Report
            </button>
            <button class="btn-action-outline" onclick="loadPMInfo('HISTOTECH ENGINEERING SDN BHD')">
              <i class="fa-regular fa-user"></i> View PM
            </button>
            <button class="btn-action-outline" onclick="showRfpPage('HISTOTECH ENGINEERING SDN BHD')">
              <i class="fa-regular fa-file-lines"></i> Technical & RFP
            </button>
            <button class="btn-action-outline btn-action-bidding" onclick="openModal('Open Bidding', 'Initiating Open Bidding process for HISTOTECH ENGINEERING SDN BHD...')">
              <i class="fa-solid fa-gavel"></i> Open Bidding
            </button>
            <button class="btn-action-outline btn-action-payment" onclick="openModal('Review CI Payment', 'Reviewing CI Payment status for HISTOTECH ENGINEERING SDN BHD.')">
              <i class="fa-regular fa-credit-card"></i> Review CI Payment
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>


  <!-- ================= COMPANY INFORMATION VIEW ================= -->
  <div id="company-info-view" class="view-section">
    <button class="back-nav-btn" onclick="showView('list-view')">
      <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </button>

    <div class="executive-card">
      <div class="hero-header-banner">
        <div class="hero-left-info">
          <div class="hero-avatar-circle" id="ci_hero_avatar">CI</div>
          <div class="hero-text-details">
            <h2 id="ci_hero_company_title">HISTOTECH ENGINEERING SDN BHD</h2>
            <div class="hero-badges-group">
              <span class="hero-badge-pill"><i class="fa-solid fa-fingerprint"></i> ROC: <span id="ci_hero_roc">1234567890</span></span>
              <span class="hero-badge-pill" style="background:#10b981; border-color:#059669;"><i class="fa-solid fa-circle-check"></i> OSFA Verified</span>
            </div>
          </div>
        </div>
      </div>

      <div class="hero-stats-grid">
        <div class="stat-highlight-card">
          <div class="stat-icon-wrapper"><i class="fa-solid fa-calendar-check"></i></div>
          <div class="stat-text-box">
            <span class="lbl">Established</span>
            <span class="val" id="ci_hero_year">2015</span>
          </div>
        </div>
        <div class="stat-highlight-card">
          <div class="stat-icon-wrapper" style="background:#f0fdf4; color:#16a34a;"><i class="fa-solid fa-chart-line"></i></div>
          <div class="stat-text-box">
            <span class="lbl">Est. Revenue</span>
            <span class="val" id="ci_hero_revenue">RM 5,000,000</span>
          </div>
        </div>
        <div class="stat-highlight-card">
          <div class="stat-icon-wrapper" style="background:#fef3c7; color:#d97706;"><i class="fa-solid fa-users"></i></div>
          <div class="stat-text-box">
            <span class="lbl">Total Employees</span>
            <span class="val" id="ci_hero_employees">85 Staff</span>
          </div>
        </div>
        <div class="stat-highlight-card">
          <div class="stat-icon-wrapper" style="background:#f3e8ff; color:#9333ea;"><i class="fa-solid fa-wifi"></i></div>
          <div class="stat-text-box">
            <span class="lbl">Bandwidth</span>
            <span class="val" id="ci_hero_isp">500 Mbps</span>
          </div>
        </div>
      </div>

      <div class="executive-body">
        
        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-building"></i>
            <h3>01. Company Profile & Registration Details</h3>
          </div>
          <div class="tile-grid-1" style="margin-bottom: 16px;">
            <div class="info-tile">
              <label>Company Legal Name</label>
              <input type="text" id="ci_company_name" class="clean-data-input" value="HISTOTECH ENGINEERING SDN BHD" readonly />
            </div>
            <div class="info-tile">
              <label>Official Registered Address</label>
              <input type="text" id="ci_company_address" class="clean-data-input" value="123, Jalan 1, Taman 1, 12345 Kuala Lumpur" readonly />
            </div>
            <div class="info-tile">
              <label>Factory Address (OSFA Implementation Site)</label>
              <input type="text" id="ci_factory_address" class="clean-data-input" value="123, Jalan 1, Taman 1, 12345 Kuala Lumpur" readonly />
            </div>
          </div>

          <div class="tile-grid-3">
            <div class="info-tile"><label>Year of Establishment</label><input type="text" id="ci_year_est" class="clean-data-input" value="2015" readonly /></div>
            <div class="info-tile"><label>ROC Number</label><input type="text" id="ci_roc_num" class="clean-data-input" value="1234567890" readonly /></div>
            <div class="info-tile"><label>Tax Identification No. (TIN)</label><input type="text" id="ci_tin_num" class="clean-data-input" value="C258941030" readonly /></div>
            <div class="info-tile"><label>MSIC Code</label><input type="text" id="ci_msic_code" class="clean-data-input" value="28199" readonly /></div>
            <div class="info-tile"><label>Service Tax No.</label><input type="text" id="ci_service_tax" class="clean-data-input" value="W10-1808-32000054" readonly /></div>
            <div class="info-tile"><label>Sales Tax No.</label><input type="text" id="ci_sales_tax" class="clean-data-input" value="A01-1808-31029883" readonly /></div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-address-card"></i>
            <h3>02. Key Contact Person Details</h3>
          </div>
          <div class="contact-card-highlight">
            <div class="contact-card-header">
              <div class="contact-avatar" id="ci_contact_avatar"><i class="fa-solid fa-user-tie"></i></div>
              <div>
                <input type="text" id="ci_contact_name" class="clean-data-input" style="font-size: 16px;" value="Mr. John Doe" readonly />
                <input type="text" id="ci_position" class="clean-data-input" style="color: #64748b; font-size: 12.5px;" value="Managing Director" readonly />
              </div>
            </div>
            <div class="tile-grid-3">
              <div class="info-tile"><label><i class="fa-solid fa-mobile-screen"></i> Mobile Phone</label><input type="text" id="ci_mobile" class="clean-data-input" value="+60 12-345 6789" readonly /></div>
              <div class="info-tile"><label><i class="fa-regular fa-envelope"></i> Email Address</label><input type="text" id="ci_email" class="clean-data-input" value="johndoe@company.com" readonly /></div>
              <div class="info-tile"><label><i class="fa-solid fa-phone"></i> Office Telephone</label><input type="text" id="ci_telephone" class="clean-data-input" value="+60 3-8000 1234" readonly /></div>
              <div class="info-tile"><label><i class="fa-solid fa-globe"></i> Website</label><input type="text" id="ci_website" class="clean-data-input" value="https://www.company.com" readonly /></div>
              <div class="info-tile"><label><i class="fa-solid fa-coins"></i> Annual Revenue</label><input type="text" id="ci_revenue" class="clean-data-input" value="RM 5,000,000.00" readonly /></div>
              <div class="info-tile"><label><i class="fa-solid fa-hand-holding-dollar"></i> Previous Grant Received</label><input type="text" id="ci_grants" class="clean-data-input" value="Yes (Intervention Fund)" readonly /></div>
            </div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-industry"></i>
            <h3>03. Industry Sector & Focus Areas</h3>
          </div>
          <div class="tile-grid-2">
            <div class="info-tile">
              <label>Primary Industry Category</label>
              <input type="text" id="ci_industry" class="clean-data-input" value="Machinery and equipment, Electrical and Electronics" readonly />
            </div>
            <div class="info-tile">
              <label>Selected Sub-Sectors</label>
              <div class="tag-cloud" id="ci_subsectors">
                <span class="tag-pill"><i class="fa-solid fa-check"></i> Electrical and Electronics</span>
                <span class="tag-pill"><i class="fa-solid fa-check"></i> Machinery and equipment</span>
              </div>
            </div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-boxes-stacked"></i>
            <h3>04. Product & Manufacturing Operations</h3>
          </div>
          <div class="tile-grid-1" style="margin-bottom: 16px;">
            <div class="info-tile">
              <label>Main Product Name</label>
              <input type="text" id="ci_product_name" class="clean-data-input" value="Industrial Engineering Precision Parts" readonly />
            </div>
            <div class="info-tile">
              <label>Product Overview & Description</label>
              <textarea id="ci_product_desc" class="clean-data-input" style="height:auto; font-weight:600;" rows="2" readonly>Precision engineered metal components for industrial production equipment.</textarea>
            </div>
          </div>
          <div class="tile-grid-2">
            <div class="info-tile">
              <label>Production Mode</label>
              <div class="tag-cloud" id="ci_production_type">
                <span class="tag-pill"><i class="fa-solid fa-gear"></i> Batch production</span>
                <span class="tag-pill"><i class="fa-solid fa-gear"></i> Mass production</span>
              </div>
            </div>
            <div class="info-tile">
              <label>Capacity Allocation</label>
              <input type="text" id="ci_capacity_focus" class="clean-data-input" value="Make-To-Order: 50% | Own product lines: 50%" readonly />
            </div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-network-wired"></i>
            <h3>05. Infrastructure & Documents</h3>
          </div>
          <div class="tile-grid-2" style="margin-bottom: 20px;">
            <div class="info-tile"><label>Total Staff Count</label><input type="text" id="ci_employees" class="clean-data-input" value="85" readonly /></div>
            <div class="info-tile"><label>ISP & Bandwidth</label><input type="text" id="ci_isp" class="clean-data-input" value="TM - 500 Mbps" readonly /></div>
          </div>

          <div class="info-tile">
            <label style="margin-bottom:12px;"><i class="fa-solid fa-folder-open"></i> Verified Registration Attachments</label>
            <div id="ci_documents">
              <div class="doc-file-card">
                <span style="font-weight:700; font-size:13px; color:#1e293b;"><i class="fa-solid fa-file-pdf" style="color:#ef4444; margin-right:8px;"></i> SSM_Registration_Certificate.pdf</span>
                <span style="font-size:11.5px; color:#64748b; font-weight:600;">1.2 MB</span>
              </div>
              <div class="doc-file-card">
                <span style="font-weight:700; font-size:13px; color:#1e293b;"><i class="fa-solid fa-file-pdf" style="color:#ef4444; margin-right:8px;"></i> Manufacturing_License_2026.pdf</span>
                <span style="font-size:11.5px; color:#64748b; font-weight:600;">850 KB</span>
              </div>
            </div>
          </div>
        </div>

        <div class="action-bar-footer">
          <button class="btn-cancel-action" onclick="showView('list-view')">Close View</button>
        </div>

      </div>
    </div>
  </div>


  <!-- ================= VIEW PROJECT MANAGER SECTION ================= -->
  <div id="pm-info-view" class="view-section">
    <button class="back-nav-btn" onclick="showView('list-view')">
      <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </button>

    <div class="executive-card">
      <div class="hero-header-banner" style="background: var(--accent-gradient);">
        <div class="hero-left-info">
          <div class="hero-avatar-circle" id="pm_avatar_initials" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);">HF</div>
          <div class="hero-text-details">
            <h2 id="pm_profile_fullname">HASLAN FADLI BIN AHMAD MARZUKI</h2>
            <div class="hero-badges-group">
              <span class="hero-badge-pill"><i class="fa-solid fa-shield-halved"></i> Role: Assessor & PM</span>
              <span class="hero-badge-pill" style="background:#2563eb;"><i class="fa-solid fa-circle-check"></i> Assigned Lead</span>
            </div>
          </div>
        </div>
      </div>

      <div class="executive-body">

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-building-user"></i>
            <h3>Assigned Company Details</h3>
          </div>
          <div class="tile-grid-2">
            <div class="info-tile">
              <label>Target Company</label>
              <input type="text" id="pm_view_company_name" class="clean-data-input" value="HISTOTECH ENGINEERING SDN BHD" readonly />
            </div>
            <div class="info-tile">
              <label>Company Industry Sector</label>
              <input type="text" id="pm_view_company_sector" class="clean-data-input" value="Machinery and equipment, Electrical and Electronics, Medical Devices, Metal" readonly />
            </div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-solid fa-id-card-clip"></i>
            <h3>Project Manager Credentials & Contact Info</h3>
          </div>
          
          <div class="tile-grid-1" style="margin-bottom:16px;">
            <div class="info-tile">
              <label>Full Assigned Name</label>
              <input type="text" id="pm_view_pm_name" class="clean-data-input" value="HASLAN FADLI BIN AHMAD MARZUKI" readonly />
            </div>
          </div>

          <div class="tile-grid-2" style="margin-bottom:20px;">
            <div class="info-tile">
              <label><i class="fa-regular fa-envelope"></i> Email Contact</label>
              <span class="tile-data" id="pm_profile_email">haslan@sirim.my</span>
            </div>
            <div class="info-tile">
              <label><i class="fa-solid fa-phone"></i> Phone Contact</label>
              <span class="tile-data" id="pm_profile_phone">0124099297</span>
            </div>
            <div class="info-tile">
              <label><i class="fa-solid fa-sitemap"></i> Department</label>
              <span class="tile-data" id="pm_profile_dept">SMART MANUFACTURING CENTRE</span>
            </div>
            <div class="info-tile">
              <label><i class="fa-solid fa-layer-group"></i> Section / Unit</label>
              <span class="tile-data" id="pm_profile_section">-</span>
            </div>
          </div>

          <div class="info-tile">
            <label style="margin-bottom: 12px;"><i class="fa-solid fa-award"></i> Professional Certifications & Skill Matrix</label>
            <div class="tag-cloud" id="pm_expertise_container">
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Engineering Material</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Processing and Characterisation</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Lean Manufacturing Practitioner</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Practitioner, Industry 4.0 Consultant</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Technology Audit Auditor</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> Ind4WRD Readiness Assessment Assessor</span>
              <span class="tag-pill"><i class="fa-solid fa-certificate"></i> SIRIM-Industry Innovation Model Fund (SIIMF)</span>
            </div>
          </div>
        </div>

        <div class="section-block">
          <div class="section-title-bar">
            <i class="fa-regular fa-comment-dots"></i>
            <h3>Assessor Remarks & Project Notes</h3>
          </div>
          <textarea id="pm_view_remarks" class="remarks-input-box" rows="4" placeholder="Enter remarks...">OSFA Assessor as well</textarea>
        </div>

        <div class="action-bar-footer">
          <button class="btn-cancel-action" onclick="showView('list-view')">Cancel</button>
          <button class="btn-save-draft" onclick="savePmDraft()"><i class="fa-solid fa-floppy-disk"></i> Save Draft</button>
        </div>

      </div>
    </div>
  </div>


  <!-- ================= TECHNICAL PROPOSAL & RFP DETAILS FULL PAGE VIEW ================= -->
  <div id="rfp-info-view" class="view-section">
    <button class="back-nav-btn" onclick="showView('list-view')">
      <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </button>

    <div class="executive-card">
      
      <div class="hero-header-banner" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
        <div class="hero-left-info">
          <div class="hero-avatar-circle" style="background: rgba(255, 255, 255, 0.12);"><i class="fa-solid fa-file-lines"></i></div>
          <div class="hero-text-details">
            <h2 id="rfp_hero_company">Technical & RFP Proposal Details</h2>
            <div class="hero-badges-group">
              <span class="hero-badge-pill"><i class="fa-solid fa-layer-group"></i> Front Page & Sections A to I</span>
              <span class="hero-badge-pill" style="background:#10b981; border-color:#059669;"><i class="fa-solid fa-check"></i> Active Proposal</span>
            </div>
          </div>
        </div>
      </div>

      <div class="executive-body">

        <!-- Progress Tracker Bar -->
        <div class="proposal-progress-card">
          <div class="progress-header">
            <h3><i class="fa-solid fa-bars-staggered"></i> Proposal Sections</h3>
            <span class="progress-percentage" id="progressPercentageText">10% Viewed</span>
          </div>
          <div class="progress-track">
            <div class="progress-fill" id="progressFillBar" style="width: 10%;"></div>
          </div>
          
          <!-- Wizard Navigation Tabs -->
          <div class="wizard-steps-tabs">
            <button type="button" class="wizard-tab active" id="tab-0" onclick="goToPage(0)">
              <span class="tab-badge" id="badge-0"><i class="fa-solid fa-star"></i></span> Cover
            </button>
            <button type="button" class="wizard-tab" id="tab-1" onclick="goToPage(1)">
              <span class="tab-badge" id="badge-1">1</span> Sec A: Company
            </button>
            <button type="button" class="wizard-tab" id="tab-2" onclick="goToPage(2)">
              <span class="tab-badge" id="badge-2">2</span> Sec B: Pain Points
            </button>
            <button type="button" class="wizard-tab" id="tab-3" onclick="goToPage(3)">
              <span class="tab-badge" id="badge-3">3</span> Sec C: Project Info
            </button>
            <button type="button" class="wizard-tab" id="tab-4" onclick="goToPage(4)">
              <span class="tab-badge" id="badge-4">4</span> Sec D: Scope
            </button>
            <button type="button" class="wizard-tab" id="tab-5" onclick="goToPage(5)">
              <span class="tab-badge" id="badge-5">5</span> Sec E: Specs
            </button>
            <button type="button" class="wizard-tab" id="tab-6" onclick="goToPage(6)">
              <span class="tab-badge" id="badge-6">6</span> Sec F: Training
            </button>
            <button type="button" class="wizard-tab" id="tab-7" onclick="goToPage(7)">
              <span class="tab-badge" id="badge-7">7</span> Sec G: Tech Specs
            </button>
            <button type="button" class="wizard-tab" id="tab-8" onclick="goToPage(8)">
              <span class="tab-badge" id="badge-8">8</span> Sec H: Declaration
            </button>
            <button type="button" class="wizard-tab" id="tab-9" onclick="goToPage(9)">
              <span class="tab-badge" id="badge-9">9</span> Sec I: Vendors
            </button>
          </div>
        </div>

        <form id="technicalRfpFormView">
          
          <!-- PAGE 0: COVER -->
          <div class="section-page active-page" id="page-0">
            <div class="cover-page-card">
              <div class="cover-top-accent"></div>
              
              <div class="cover-header-flex">
                <div class="cover-logo-badge">
                  <i class="fa-solid fa-microchip" style="color:var(--primary-blue); font-size:26px;"></i>
                  <span>SIRIM SMART MANUFACTURING PROGRAMME</span>
                </div>
                <span class="cover-status-badge"><i class="fa-solid fa-lock"></i> Official Proposal Document</span>
              </div>

              <div class="cover-hero-title-box">
                <div class="cover-tagline">TECHNICAL PROPOSAL & REQUEST FOR PROPOSAL (RFP)</div>
                <h1 class="cover-main-title" id="cover_display_title">BOOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM</h1>
                <p class="cover-sub-title">A comprehensive technical solution proposal for industry 4.0 assessment, smart vision inspection, sensor telemetry integration, and operational workflow digitalization.</p>
              </div>

              <div class="cover-meta-grid">
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-building"></i> Applicant Company Name</label>
                  <p id="cover_display_company">BOOGA MAJU SDN BHD</p>
                </div>
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-hashtag"></i> Proposal Reference Code</label>
                  <p id="cover_display_ref">RFP-2026-BM-0091</p>
                </div>
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-calendar-day"></i> Submission Date</label>
                  <p id="cover_display_date">28/09/2026</p>
                </div>
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-user-shield"></i> Lead Assessor & Project Manager</label>
                  <p id="cover_display_pm">ASSESSOR AND PM 1</p>
                </div>
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-coins"></i> Total Proposed Project Value</label>
                  <p id="cover_display_cost">RM 362,000.00</p>
                </div>
                <div class="cover-meta-item">
                  <label><i class="fa-solid fa-location-dot"></i> Implementation Facility Site</label>
                  <p id="cover_display_location">Pasir Gudang Plant, Johor</p>
                </div>
              </div>

              <div class="cover-footer-stamp">
                <div><i class="fa-solid fa-shield-halved"></i> Verified under SIRIM Industry Innovation Framework</div>
                <div>Document Version: 1.0 (Final Released)</div>
              </div>
            </div>

            <div class="wizard-nav-footer">
              <div></div>
              <button type="button" class="btn-next" onclick="goToPage(1)">Next: Section A <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 1: SECTION A -->
          <div class="section-page" id="page-1">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-building"></i></div>
                <div>
                  <span class="section-number">Section A (Page 1 of 9)</span>
                  <h2>Company Information</h2>
                  <p>Basic organization profile, factory location, and primary contact details.</p>
                </div>
              </div>

              <div class="form-card">
                <div class="form-card-title"><i class="fa-solid fa-id-card"></i> <span>Company Profile</span></div>
                <div class="form-row">
                  <div class="form-group"><label>Company Name</label><input type="text" id="rfp_company_name_input" value="BOOGA MAJU SDN BHD" disabled></div>
                  <div class="form-group"><label>Year of Establishment</label><input type="text" id="rfp_year_est" value="2016" disabled></div>
                </div>
                <div class="form-group"><label>Company Address</label><textarea id="rfp_company_address" rows="2" disabled>Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor</textarea></div>
                <div class="form-group"><label>Factory Address</label><textarea id="rfp_factory_address" rows="2" disabled>Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor</textarea></div>
                <div class="form-row">
                  <div class="form-group"><label>Sector</label><input type="text" id="rfp_sector" value="Automated Systems & Electronics" disabled></div>
                  <div class="form-group"><label>Production Focus</label><input type="text" id="rfp_production_focus" value="Automated Production Monitoring & Quality Control" disabled></div>
                </div>
                <div class="form-row">
                  <div class="form-group"><label>Smart Factory Assessment Rating</label><input type="text" id="rfp_assessment_rating" value="85% (Advanced)" disabled></div>
                  <div class="form-group"><label>Project Implementation Site</label><input type="text" id="rfp_location" value="Pasir Gudang Plant" disabled></div>
                </div>

                <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-address-book"></i> <span>Contact Information</span></div>
                <div class="form-row">
                  <div class="form-group"><label>Contact Person & Position</label><input type="text" id="rfp_contact_person" value="En. Ahmad Zulkifli, Technical Director" disabled></div>
                  <div class="form-group"><label>Telephone & Fax</label><input type="text" id="rfp_telephone" value="07-251 9800" disabled></div>
                </div>
                <div class="form-row">
                  <div class="form-group"><label>Mobile Number</label><input type="text" id="rfp_mobile" value="019-876 5432" disabled></div>
                  <div class="form-group"><label>Email Address</label><input type="email" id="rfp_email" value="zulkifli@boogamaju.com" disabled></div>
                </div>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(0)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(2)">Next: Section B <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 2: SECTION B -->
          <div class="section-page" id="page-2">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div>
                  <span class="section-number">Section B (Page 2 of 9)</span>
                  <h2>Pain Points / Problem Statement</h2>
                  <p>Identify operational bottlenecks and itemize financial loss projections.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;">No.</th>
                      <th>Pain Points</th>
                      <th>Current Impact & Financial Loss Projections</th>
                      <th style="width: 160px;">Annual Loss (RM)</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_pain_points_tbody">
                    <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="Manual production data monitoring and lack of real-time insights" disabled></td>
                      <td><input type="text" class="table-input" value="Estimated RM 280,000 annually due to downtime, inefficiency, and delayed response time" disabled></td>
                      <td><input type="text" class="table-input text-right" value="280,000.00" disabled></td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td><input type="text" class="table-input" value="Manual inventory and warehouse tracking system" disabled></td>
                      <td><input type="text" class="table-input" value="Estimated RM 240,000 annually due to errors, stock misplacement, and order inaccuracies" disabled></td>
                      <td><input type="text" class="table-input text-right" value="240,000.00" disabled></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right"><strong>Total Losses in RM</strong></td>
                      <td><input type="text" id="rfp_total_loss" class="table-input text-right" style="font-weight:800;" value="520,000.00" disabled></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(1)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(3)">Next: Section C <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 3: SECTION C -->
          <div class="section-page" id="page-3">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-diagram-project"></i></div>
                <div>
                  <span class="section-number">Section C (Page 3 of 9)</span>
                  <h2>Project Information</h2>
                  <p>Project background, scope overview, strategic objectives, and costing breakdown.</p>
                </div>
              </div>

              <div class="form-card">
                <div class="form-card-title"><i class="fa-solid fa-file-lines"></i> <span>Project Overview</span></div>
                <div class="form-group"><label>Project Title</label><input type="text" id="rfp_project_title" value="BOOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM" disabled></div>
                <div class="form-group"><label>Project Background</label><textarea id="rfp_project_bg" rows="2" disabled>Deploying automated AI quality vision systems and IoT sensor network for automated inspection and monitoring.</textarea></div>
                <div class="form-group"><label>Project Overview</label><textarea id="rfp_project_overview" rows="2" disabled>End-to-end integration of automated sensors, quality monitoring software, and centralized reporting portal.</textarea></div>
                <div class="form-group"><label>Project Objectives</label><textarea id="rfp_project_obj" rows="2" disabled>1. Eliminate manual QA bottlenecks. 2. Real-time production tracking with 99.5% accuracy.</textarea></div>

                <div class="form-card-title" style="margin-top: 25px;"><i class="fa-solid fa-calculator"></i> <span>Project Costing</span></div>
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th>CATEGORY</th><th>ITEM DESCRIPTION</th><th style="width: 80px;">QTY</th><th style="width: 120px;">UNIT COST</th><th style="width: 130px;">TOTAL (RM)</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_costing_tbody">
                    <tr class="category-header-row"><td colspan="5">Hardware</td></tr>
                    <tr>
                      <td>Hardware</td><td><input type="text" class="table-input" value="IoT Quality Sensors & Edge AI Nodes" disabled></td>
                      <td><input type="text" class="table-input text-center" value="18" disabled></td>
                      <td><input type="text" class="table-input text-right" value="9,000.00" disabled></td>
                      <td><input type="text" class="table-input text-right" value="162,000.00" disabled></td>
                    </tr>
                    <tr class="subtotal-row"><td colspan="4">Hardware Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="162,000.00" disabled></td></tr>
                    
                    <tr class="category-header-row"><td colspan="5">Software</td></tr>
                    <tr>
                      <td>Software</td><td><input type="text" class="table-input" value="Quality Control MES License" disabled></td>
                      <td><input type="text" class="table-input text-center" value="1" disabled></td>
                      <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
                      <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
                    </tr>
                    <tr class="subtotal-row"><td colspan="4">Software Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="200,000.00" disabled></td></tr>
                  </tbody>
                  <tfoot>
                    <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Project Value (A)</td>
                      <td><input type="text" id="rfp_total_val" class="table-input text-right" style="font-weight:800;" value="362,000.00" disabled></td>
                    </tr>
                    <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Grant to be received (B)</td>
                      <td><input type="text" id="rfp_grant_val" class="table-input text-right" style="font-weight:800;" value="181,000.00" disabled></td>
                    </tr>
                    <tr class="summary-highlight">
                      <td colspan="4" class="text-right">Total Company contribution, C = (A-B)</td>
                      <td><input type="text" id="rfp_company_contrib" class="table-input text-right" style="font-weight:800;" value="181,000.00" disabled></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(2)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(4)">Next: Section D <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 4: SECTION D -->
          <div class="section-page" id="page-4">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-list-check"></i></div>
                <div>
                  <span class="section-number">Section D (Page 4 of 9)</span>
                  <h2>Scope of Work</h2>
                  <p>Overall description of project deliverables and implementation tasks.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th style="width: 200px;">Project Title</th>
                      <th style="width: 180px;">Relevance (Pain Point)</th>
                      <th>Key Activities / Deliverables</th>
                      <th style="width: 140px;" class="text-right">Cost (RM)</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_scope_tbody">
                    <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="Automated Quality Inspection & MES Integration" disabled></td>
                      <td><input type="text" class="table-input" value="Pain Point 1: Manual monitoring" disabled></td>
                      <td><textarea class="table-input" rows="3" disabled>- Deploy AI cameras & IoT sensors across assembly lines&#10;- Deploy local edge gateways for telemetry data</textarea></td>
                      <td><input type="text" class="table-input text-right" value="362,000.00" disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(3)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(5)">Next: Section E <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 5: SECTION E -->
          <div class="section-page" id="page-5">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-sliders"></i></div>
                <div>
                  <span class="section-number">Section E (Page 5 of 9)</span>
                  <h2>Specification</h2>
                  <p>Technical specification and infrastructure compliance requirements.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;" class="text-center">NO.</th>
                      <th>SIRIM BERHAD TECHNICAL REQUIREMENTS</th>
                      <th style="width: 100px;" class="text-center">CRITICAL</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_specs_tbody">
                    <tr>
                      <td class="text-center">1.</td>
                      <td><textarea class="table-input" rows="2" disabled>Supply and commission real-time production monitoring system with AI quality control integration</textarea></td>
                      <td class="text-center"><input type="checkbox" checked disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(4)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(6)">Next: Section F <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 6: SECTION F -->
          <div class="section-page" id="page-6">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <div>
                  <span class="section-number">Section F (Page 6 of 9)</span>
                  <h2>Training Overview & Outcomes</h2>
                  <p>Training programmes designed to build internal operational capabilities.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th>Programme</th>
                      <th>Objectives</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_training_tbody">
                    <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="Industry 4.0 & AI Quality Control Certification" disabled></td>
                      <td><textarea class="table-input" rows="2" disabled>Train technical staff and line supervisors in operating AI quality monitoring dashboard</textarea></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(5)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(7)">Next: Section G <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 7: SECTION G -->
          <div class="section-page" id="page-7">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-file-certificate"></i></div>
                <div>
                  <span class="section-number">Section G (Page 7 of 9)</span>
                  <h2>Training Technical Requirements</h2>
                  <p>Specific compliance details and trainer qualification prerequisites.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">No</th>
                      <th>Specification</th>
                      <th>Supporting Document</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_training_specs_tbody">
                    <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="AI Machine Vision & Smart Factory Modules" disabled></td>
                      <td><input type="text" class="table-input" value="Syllabus, Certified Trainer CV, HRD Corp Accreditation" disabled></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(6)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(8)">Next: Section H <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 8: SECTION H -->
          <div class="section-page" id="page-8">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-file-signature"></i></div>
                <div>
                  <span class="section-number">Section H (Page 8 of 9)</span>
                  <h2>Declaration</h2>
                  <p>Applicant legal verification and formal confirmation.</p>
                </div>
              </div>

              <div class="form-card">
                <div class="form-row">
                  <div class="form-group"><label>Authorized Representative Name</label><input type="text" id="rfp_decl_name" value="En. Ahmad Zulkifli" disabled></div>
                  <div class="form-group"><label>Designation / Position</label><input type="text" id="rfp_decl_position" value="Technical Director" disabled></div>
                </div>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(7)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <button type="button" class="btn-next" onclick="goToPage(9)">Next: Section I <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>

          <!-- PAGE 9: SECTION I -->
          <div class="section-page" id="page-9">
            <section class="form-section">
              <div class="section-header">
                <div class="section-icon"><i class="fa-solid fa-handshake"></i></div>
                <div>
                  <span class="section-number">Section I (Page 9 of 9)</span>
                  <h2>Vendor Requirements</h2>
                  <p>Candidate vendor types, required technologies, and qualification criteria.</p>
                </div>
              </div>

              <div class="form-card">
                <table class="costing-table">
                  <thead>
                    <tr>
                      <th style="width: 50px;" class="text-center">No</th>
                      <th>Vendor Type</th>
                      <th>Requirements & Qualifications</th>
                    </tr>
                  </thead>
                  <tbody id="rfp_vendor_tbody">
                    <tr>
                      <td class="text-center">1</td>
                      <td><input type="text" class="table-input" value="System Integrator & Automation Specialist" disabled></td>
                      <td><textarea class="table-input" rows="2" disabled>Proven deployment record in AI vision inspection & smart factory IoT systems</textarea></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <div class="wizard-nav-footer">
              <button type="button" class="btn-draft" onclick="goToPage(8)"><i class="fa-solid fa-arrow-left"></i> Previous</button>
              <span class="view-badge"><i class="fa-solid fa-check-double"></i> End of Proposal Details</span>
            </div>
          </div>

        </form>

        <div class="action-bar-footer">
          <button class="btn-cancel-action" onclick="showView('list-view')">Back to Dashboard</button>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- Floating Refresh Button -->
<button class="floating-refresh-btn" onclick="location.reload()" title="Refresh Page">
  <i class="fa-solid fa-rotate-right"></i>
</button>

<!-- Generic Modal -->
<div class="modal-overlay" id="genericModal" onclick="closeModalOnOverlay(event)">
  <div class="modal-container">
    <div class="modal-header">
      <h3 id="mModalTitle">Modal Title</h3>
      <button class="btn-close-modal" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal-body" id="mModalBody">
      Modal content goes here.
    </div>
    <div class="modal-footer">
      <button class="btn-cancel-action" style="padding: 6px 16px; font-size: 12.5px;" onclick="closeModal()">Close</button>
    </div>
  </div>
</div>

<script>
  // View Switcher Function
  function showView(viewId) {
    document.querySelectorAll('.view-section').forEach(view => {
      view.classList.remove('active');
    });
    const target = document.getElementById(viewId);
    if (target) {
      target.classList.add('active');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }

  // Wizard Navigation
  function goToPage(pageNum) {
    document.querySelectorAll('.section-page').forEach(page => {
      page.classList.remove('active-page');
    });
    const targetPage = document.getElementById(`page-${pageNum}`);
    if (targetPage) {
      targetPage.classList.add('active-page');
    }

    document.querySelectorAll('.wizard-tab').forEach((tab, idx) => {
      tab.classList.remove('active');
      if (idx < pageNum) {
        tab.classList.add('completed');
      } else {
        tab.classList.remove('completed');
      }
    });

    const activeTab = document.getElementById(`tab-${pageNum}`);
    if (activeTab) {
      activeTab.classList.add('active');
    }

    const percentage = Math.round(((pageNum + 1) / 10) * 100);
    const fillBar = document.getElementById('progressFillBar');
    const textBar = document.getElementById('progressPercentageText');
    if (fillBar && textBar) {
      fillBar.style.width = `${percentage}%`;
      textBar.innerText = pageNum === 0 ? `Cover Page (${percentage}%)` : `Page ${pageNum} of 9 (${percentage}%)`;
    }

    window.scrollTo({ top: 120, behavior: 'smooth' });
  }

  // Show RFP View & Populate Data
  function showRfpPage(companyName) {
    if (companyName) {
      document.getElementById('rfp_hero_company').innerText = `Technical & RFP Proposal Details - ${companyName}`;
      loadRfpData(companyName);
    }
    goToPage(0);
    showView('rfp-info-view');
  }

  // Filter Dashboard Projects
  function filterProjects() {
    const searchVal = document.getElementById('searchInput').value.toLowerCase();
    const statusVal = document.getElementById('statusFilter').value;
    const projectRows = document.querySelectorAll('.project-row');
    let visibleCount = 0;

    projectRows.forEach(row => {
      const rowSearch = (row.getAttribute('data-search') || '').toLowerCase();
      const rowStatus = row.getAttribute('data-status') || '';

      const matchesSearch = rowSearch.includes(searchVal);
      const matchesStatus = (statusVal === 'ALL' || rowStatus === statusVal);

      if (matchesSearch && matchesStatus) {
        row.style.display = 'grid';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    document.getElementById('projectCount').innerText = visibleCount;
  }

  // Load Company Information View
  function loadCompanyInfo(companyName) {
    if (companyName === 'HISTOTECH ENGINEERING SDN BHD') {
      document.getElementById('ci_hero_avatar').innerText = "HE";
      document.getElementById('ci_hero_company_title').innerText = "HISTOTECH ENGINEERING SDN BHD";
      document.getElementById('ci_hero_roc').innerText = "1234567890";
      document.getElementById('ci_hero_year').innerText = "2015";
      document.getElementById('ci_hero_revenue').innerText = "RM 5,000,000";
      document.getElementById('ci_hero_employees').innerText = "85 Staff";
      document.getElementById('ci_hero_isp').innerText = "500 Mbps";

      document.getElementById('ci_company_name').value = "HISTOTECH ENGINEERING SDN BHD";
      document.getElementById('ci_company_address').value = "123, Jalan 1, Taman 1, 12345 Kuala Lumpur";
      document.getElementById('ci_factory_address').value = "123, Jalan 1, Taman 1, 12345 Kuala Lumpur";
      document.getElementById('ci_year_est').value = "2015";
      document.getElementById('ci_roc_num').value = "1234567890";
      document.getElementById('ci_tin_num').value = "C258941030";
      document.getElementById('ci_msic_code').value = "28199";
      document.getElementById('ci_service_tax').value = "W10-1808-32000054";
      document.getElementById('ci_sales_tax').value = "A01-1808-31029883";

      document.getElementById('ci_contact_name').value = "Mr. John Doe";
      document.getElementById('ci_position').value = "Managing Director";
      document.getElementById('ci_mobile').value = "+60 12-345 6789";
      document.getElementById('ci_email').value = "johndoe@company.com";
      document.getElementById('ci_telephone').value = "+60 3-8000 1234";
      document.getElementById('ci_website').value = "https://www.company.com";
      document.getElementById('ci_revenue').value = "RM 5,000,000.00";
      document.getElementById('ci_grants').value = "Yes (Intervention Fund)";

      document.getElementById('ci_industry').value = "Machinery and equipment, Electrical and Electronics";
      document.getElementById('ci_product_name').value = "Industrial Engineering Precision Parts";
      document.getElementById('ci_product_desc').value = "Precision engineered metal components for industrial production equipment.";
      document.getElementById('ci_employees').value = "85";
      document.getElementById('ci_isp').value = "TM - 500 Mbps";

    } else {
      document.getElementById('ci_hero_avatar').innerText = "BM";
      document.getElementById('ci_hero_company_title').innerText = "BOOGA MAJU SDN BHD";
      document.getElementById('ci_hero_roc').innerText = "201601098765";
      document.getElementById('ci_hero_year').innerText = "2016";
      document.getElementById('ci_hero_revenue').innerText = "RM 8,500,000";
      document.getElementById('ci_hero_employees').innerText = "120 Staff";
      document.getElementById('ci_hero_isp').innerText = "1 Gbps";

      document.getElementById('ci_company_name').value = "BOOGA MAJU SDN BHD";
      document.getElementById('ci_company_address').value = "Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor";
      document.getElementById('ci_factory_address').value = "Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor";
      document.getElementById('ci_year_est').value = "2016";
      document.getElementById('ci_roc_num').value = "201601098765";
      document.getElementById('ci_tin_num').value = "C892104910";
      document.getElementById('ci_msic_code').value = "26100";
      document.getElementById('ci_service_tax').value = "J01-1902-42100092";
      document.getElementById('ci_sales_tax').value = "B02-1902-38190011";

      document.getElementById('ci_contact_name').value = "En. Ahmad Zulkifli";
      document.getElementById('ci_position').value = "Technical Director";
      document.getElementById('ci_mobile').value = "+60 19-876 5432";
      document.getElementById('ci_email').value = "zulkifli@boogamaju.com";
      document.getElementById('ci_telephone').value = "+60 7-251 9800";
      document.getElementById('ci_website').value = "https://www.boogamaju.com";
      document.getElementById('ci_revenue').value = "RM 8,500,000.00";
      document.getElementById('ci_grants').value = "None";

      document.getElementById('ci_industry').value = "Automated Systems & Electronics Manufacturing";
      document.getElementById('ci_product_name').value = "Automated Production Monitoring & Quality Systems";
      document.getElementById('ci_product_desc').value = "End-to-end industrial automation and smart vision quality control systems.";
      document.getElementById('ci_employees').value = "120";
      document.getElementById('ci_isp').value = "TIME - 1 Gbps";
    }

    showView('company-info-view');
  }

  // Load PM Information View
  function loadPMInfo(companyName) {
    if (companyName === 'HISTOTECH ENGINEERING SDN BHD') {
      document.getElementById('pm_avatar_initials').innerText = "HF";
      document.getElementById('pm_profile_fullname').innerText = "HASLAN FADLI BIN AHMAD MARZUKI";
      document.getElementById('pm_view_company_name').value = "HISTOTECH ENGINEERING SDN BHD";
      document.getElementById('pm_view_company_sector').value = "Machinery and equipment, Electrical and Electronics";
      document.getElementById('pm_view_pm_name').value = "HASLAN FADLI BIN AHMAD MARZUKI";
      document.getElementById('pm_profile_email').innerText = "haslan@sirim.my";
      document.getElementById('pm_profile_phone').innerText = "0124099297";
      document.getElementById('pm_profile_dept').innerText = "SMART MANUFACTURING CENTRE";
      document.getElementById('pm_profile_section').innerText = "INDUSTRIAL AUTOMATION UNIT";
      document.getElementById('pm_view_remarks').value = "OSFA Assessor as well. Technical evaluation initiated.";
    } else {
      document.getElementById('pm_avatar_initials').innerText = "PM1";
      document.getElementById('pm_profile_fullname').innerText = "ASSESSOR AND PM 1";
      document.getElementById('pm_view_company_name').value = "BOOGA MAJU SDN BHD";
      document.getElementById('pm_view_company_sector').value = "Automated Systems & Electronics";
      document.getElementById('pm_view_pm_name').value = "ASSESSOR AND PM 1";
      document.getElementById('pm_profile_email').innerText = "pm1@sirim.my";
      document.getElementById('pm_profile_phone').innerText = "013-9876543";
      document.getElementById('pm_profile_dept').innerText = "INDUSTRIAL AUTOMATION UNIT";
      document.getElementById('pm_profile_section').innerText = "ADVANCED VISION SYSTEMS";
      document.getElementById('pm_view_remarks').value = "Assessor and Project Manager 1 lead assignment for Booga Maju.";
    }

    showView('pm-info-view');
  }

  // Save PM Draft Action
  function savePmDraft() {
    openModal('Draft Saved', 'Project Manager details and assessor notes have been updated successfully.');
  }

  // Modal Display Functions
  function openModal(title, bodyContent) {
    document.getElementById('mModalTitle').innerText = title;
    document.getElementById('mModalBody').innerHTML = bodyContent;
    document.getElementById('genericModal').classList.add('active');
  }

  function closeModal() {
    document.getElementById('genericModal').classList.remove('active');
  }

  function closeModalOnOverlay(e) {
    if (e.target.classList.contains('modal-overlay')) {
      closeModal();
    }
  }

  // Export Functions
  function exportToExcel() {
    const table = document.getElementById('exportArea');
    const wb = XLSX.utils.table_to_book(table, { sheet: "Dashboard" });
    XLSX.writeFile(wb, "Project_Dashboard.xlsx");
  }

  function exportToPDF() {
    const element = document.getElementById('exportArea');
    const opt = {
      margin:       0.5,
      filename:     'Project_Dashboard.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
    };
    html2pdf().set(opt).from(element).save();
  }

  function exportToPPTX() {
    const pptx = new PptxGenJS();
    const slide = pptx.addSlide();
    slide.addText("Project Dashboard Summary", { x: 0.5, y: 0.5, fontSize: 24, bold: true, color: '1E1B4B' });
    slide.addText("Total Companies Applied: 2\n1. BOOGA MAJU SDN BHD - ACCEPTED\n2. HISTOTECH ENGINEERING SDN BHD - ACCEPTED", { x: 0.5, y: 1.5, fontSize: 14, color: '334155' });
    pptx.writeFile({ fileName: 'Project_Dashboard.pptx' });
  }

  // Load RFP Dynamic Data
  function loadRfpData(companyName) {
    if (companyName === 'HISTOTECH ENGINEERING SDN BHD') {
      document.getElementById('cover_display_title').innerText = "HISTOTECH - PRECISION PARTS PRODUCTION LINE AUTOMATION & DIGITALIZATION";
      document.getElementById('cover_display_company').innerText = "HISTOTECH ENGINEERING SDN BHD";
      document.getElementById('cover_display_ref').innerText = "RFP-2026-HE-0142";
      document.getElementById('cover_display_date').innerText = "02/08/2026";
      document.getElementById('cover_display_pm').innerText = "HASLAN FADLI BIN AHMAD MARZUKI";
      document.getElementById('cover_display_cost').innerText = "RM 300,000.00";
      document.getElementById('cover_display_location').innerText = "Kuala Lumpur Factory Plant";

      document.getElementById('rfp_company_name_input').value = "HISTOTECH ENGINEERING SDN BHD";
      document.getElementById('rfp_year_est').value = "2015";
      document.getElementById('rfp_company_address').value = "123, Jalan 1, Taman 1, 12345 Kuala Lumpur";
      document.getElementById('rfp_factory_address').value = "123, Jalan 1, Taman 1, 12345 Kuala Lumpur";
      document.getElementById('rfp_sector').value = "Machinery & Electrical Electronics";
      document.getElementById('rfp_production_focus').value = "Industrial Engineering Precision Parts";
      document.getElementById('rfp_assessment_rating').value = "62% (Intermediate)";
      document.getElementById('rfp_location').value = "Kuala Lumpur Factory Plant";
      document.getElementById('rfp_contact_person').value = "Mr. John Doe, Managing Director";
      document.getElementById('rfp_telephone').value = "03-8000 1234";
      document.getElementById('rfp_mobile').value = "012-345 6789";
      document.getElementById('rfp_email').value = "johndoe@company.com";

      document.getElementById('rfp_pain_points_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Manual machinery tracking & component defect bottlenecks" disabled></td>
          <td><input type="text" class="table-input" value="Estimated RM 310,000 yearly due to idle time & scrap production" disabled></td>
          <td><input type="text" class="table-input text-right" value="310,000.00" disabled></td>
        </tr>
      `;
      document.getElementById('rfp_total_loss').value = "310,000.00";

      document.getElementById('rfp_project_title').value = "HISTOTECH - PRECISION PARTS PRODUCTION LINE AUTOMATION & DIGITALIZATION";
      document.getElementById('rfp_project_bg').value = "Upgrading precision manufacturing lines with smart sensors and connected diagnostic systems.";
      document.getElementById('rfp_project_overview').value = "Comprehensive deployment of IoT telemetry for machine tools, line tracking, and maintenance analytics.";
      document.getElementById('rfp_project_obj').value = "1. Automate precision part quality check. 2. Reduce unplanned downtime by 70%.";

      document.getElementById('rfp_costing_tbody').innerHTML = `
        <tr class="category-header-row"><td colspan="5">Hardware</td></tr>
        <tr>
          <td>Hardware</td><td><input type="text" class="table-input" value="Machine Telemetry Sensors & Gateways" disabled></td>
          <td><input type="text" class="table-input text-center" value="12" disabled></td>
          <td><input type="text" class="table-input text-right" value="10,000.00" disabled></td>
          <td><input type="text" class="table-input text-right" value="120,000.00" disabled></td>
        </tr>
        <tr class="subtotal-row"><td colspan="4">Hardware Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="120,000.00" disabled></td></tr>
        <tr class="category-header-row"><td colspan="5">Software</td></tr>
        <tr>
          <td>Software</td><td><input type="text" class="table-input" value="Precision Analytics Software License" disabled></td>
          <td><input type="text" class="table-input text-center" value="1" disabled></td>
          <td><input type="text" class="table-input text-right" value="180,000.00" disabled></td>
          <td><input type="text" class="table-input text-right" value="180,000.00" disabled></td>
        </tr>
        <tr class="subtotal-row"><td colspan="4">Software Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="180,000.00" disabled></td></tr>
      `;
      document.getElementById('rfp_total_val').value = "300,000.00";
      document.getElementById('rfp_grant_val').value = "150,000.00";
      document.getElementById('rfp_company_contrib').value = "150,000.00";

      document.getElementById('rfp_scope_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Precision Line Telemetry & Maintenance Gateway" disabled></td>
          <td><input type="text" class="table-input" value="Pain Point 1: Machine tracking" disabled></td>
          <td><textarea class="table-input" rows="3" disabled>- Install machine tool telemetry hardware&#10;- Configure diagnostic software platform</textarea></td>
          <td><input type="text" class="table-input text-right" value="300,000.00" disabled></td>
        </tr>
      `;

      document.getElementById('rfp_specs_tbody').innerHTML = `
        <tr>
          <td class="text-center">1.</td>
          <td><textarea class="table-input" rows="2" disabled>Supply and commission automated CNC & precision parts inspection suite</textarea></td>
          <td class="text-center"><input type="checkbox" checked disabled></td>
        </tr>
      `;

      document.getElementById('rfp_training_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Precision Machinery Telemetry & Maintenance Training" disabled></td>
          <td><textarea class="table-input" rows="2" disabled>Train technicians on operational analytics and machine diagnostic tools</textarea></td>
        </tr>
      `;

      document.getElementById('rfp_training_specs_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Smart Tooling & Predictive Maintenance Modules" disabled></td>
          <td><input type="text" class="table-input" value="Syllabus, Certified Trainer Resume" disabled></td>
        </tr>
      `;

      document.getElementById('rfp_decl_name').value = "Mr. John Doe";
      document.getElementById('rfp_decl_position').value = "Managing Director";

      document.getElementById('rfp_vendor_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Precision Machinery & Automation Specialist" disabled></td>
          <td><textarea class="table-input" rows="2" disabled>Proven deployment record in CNC machining telemetry & industrial IoT systems</textarea></td>
        </tr>
      `;

    } else {
      document.getElementById('cover_display_title').innerText = "BOOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM";
      document.getElementById('cover_display_company').innerText = "BOOGA MAJU SDN BHD";
      document.getElementById('cover_display_ref').innerText = "RFP-2026-BM-0091";
      document.getElementById('cover_display_date').innerText = "28/09/2026";
      document.getElementById('cover_display_pm').innerText = "ASSESSOR AND PM 1";
      document.getElementById('cover_display_cost').innerText = "RM 362,000.00";
      document.getElementById('cover_display_location').innerText = "Pasir Gudang Plant, Johor";

      document.getElementById('rfp_company_name_input').value = "BOOGA MAJU SDN BHD";
      document.getElementById('rfp_year_est').value = "2016";
      document.getElementById('rfp_company_address').value = "Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor";
      document.getElementById('rfp_factory_address').value = "Lot 45, Kawasan Perindustrian Pasir Gudang, 81700 Pasir Gudang, Johor";
      document.getElementById('rfp_sector').value = "Automated Systems & Electronics";
      document.getElementById('rfp_production_focus').value = "Automated Production Monitoring & Quality Control";
      document.getElementById('rfp_assessment_rating').value = "85% (Advanced)";
      document.getElementById('rfp_location').value = "Pasir Gudang Plant";
      document.getElementById('rfp_contact_person').value = "En. Ahmad Zulkifli, Technical Director";
      document.getElementById('rfp_telephone').value = "07-251 9800";
      document.getElementById('rfp_mobile').value = "019-876 5432";
      document.getElementById('rfp_email').value = "zulkifli@boogamaju.com";

      document.getElementById('rfp_pain_points_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Manual production data monitoring and lack of real-time insights" disabled></td>
          <td><input type="text" class="table-input" value="Estimated RM 280,000 annually due to downtime, inefficiency, and delayed response time" disabled></td>
          <td><input type="text" class="table-input text-right" value="280,000.00" disabled></td>
        </tr>
        <tr>
          <td class="text-center">2</td>
          <td><input type="text" class="table-input" value="Manual inventory and warehouse tracking system" disabled></td>
          <td><input type="text" class="table-input" value="Estimated RM 240,000 annually due to errors, stock misplacement, and order inaccuracies" disabled></td>
          <td><input type="text" class="table-input text-right" value="240,000.00" disabled></td>
        </tr>
      `;
      document.getElementById('rfp_total_loss').value = "520,000.00";

      document.getElementById('rfp_project_title').value = "BOOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM";
      document.getElementById('rfp_project_bg').value = "Deploying automated AI quality vision systems and IoT sensor network for automated inspection and monitoring.";
      document.getElementById('rfp_project_overview').value = "End-to-end integration of automated sensors, quality monitoring software, and centralized reporting portal.";
      document.getElementById('rfp_project_obj').value = "1. Eliminate manual QA bottlenecks. 2. Real-time production tracking with 99.5% accuracy.";

      document.getElementById('rfp_costing_tbody').innerHTML = `
        <tr class="category-header-row"><td colspan="5">Hardware</td></tr>
        <tr>
          <td>Hardware</td><td><input type="text" class="table-input" value="IoT Quality Sensors & Edge AI Nodes" disabled></td>
          <td><input type="text" class="table-input text-center" value="18" disabled></td>
          <td><input type="text" class="table-input text-right" value="9,000.00" disabled></td>
          <td><input type="text" class="table-input text-right" value="162,000.00" disabled></td>
        </tr>
        <tr class="subtotal-row"><td colspan="4">Hardware Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="162,000.00" disabled></td></tr>
        <tr class="category-header-row"><td colspan="5">Software</td></tr>
        <tr>
          <td>Software</td><td><input type="text" class="table-input" value="Quality Control MES License" disabled></td>
          <td><input type="text" class="table-input text-center" value="1" disabled></td>
          <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
          <td><input type="text" class="table-input text-right" value="200,000.00" disabled></td>
        </tr>
        <tr class="subtotal-row"><td colspan="4">Software Subtotal</td><td><input type="text" class="table-input text-right" style="font-weight:700;" value="200,000.00" disabled></td></tr>
      `;
      document.getElementById('rfp_total_val').value = "362,000.00";
      document.getElementById('rfp_grant_val').value = "181,000.00";
      document.getElementById('rfp_company_contrib').value = "181,000.00";

      document.getElementById('rfp_scope_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Automated Quality Inspection & MES Integration" disabled></td>
          <td><input type="text" class="table-input" value="Pain Point 1: Manual monitoring" disabled></td>
          <td><textarea class="table-input" rows="3" disabled>- Deploy AI cameras & IoT sensors across assembly lines&#10;- Deploy local edge gateways for telemetry data</textarea></td>
          <td><input type="text" class="table-input text-right" value="362,000.00" disabled></td>
        </tr>
      `;

      document.getElementById('rfp_specs_tbody').innerHTML = `
        <tr>
          <td class="text-center">1.</td>
          <td><textarea class="table-input" rows="2" disabled>Supply and commission real-time production monitoring system with AI quality control integration</textarea></td>
          <td class="text-center"><input type="checkbox" checked disabled></td>
        </tr>
      `;

      document.getElementById('rfp_training_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="Industry 4.0 & AI Quality Control Certification" disabled></td>
          <td><textarea class="table-input" rows="2" disabled>Train technical staff and line supervisors in operating AI quality monitoring dashboard</textarea></td>
        </tr>
      `;

      document.getElementById('rfp_training_specs_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="AI Machine Vision & Smart Factory Modules" disabled></td>
          <td><input type="text" class="table-input" value="Syllabus, Certified Trainer CV, HRD Corp Accreditation" disabled></td>
        </tr>
      `;

      document.getElementById('rfp_decl_name').value = "En. Ahmad Zulkifli";
      document.getElementById('rfp_decl_position').value = "Technical Director";

      document.getElementById('rfp_vendor_tbody').innerHTML = `
        <tr>
          <td class="text-center">1</td>
          <td><input type="text" class="table-input" value="System Integrator & Automation Specialist" disabled></td>
          <td><textarea class="table-input" rows="2" disabled>Proven deployment record in AI vision inspection & smart factory IoT systems</textarea></td>
        </tr>
      `;
    }
  }
</script>

</body>
</html>