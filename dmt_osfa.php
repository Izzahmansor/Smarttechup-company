<?php 
  $page_title = "01 DMT OSFA - Assessor & PM Admin Panel";
  include 'dmt_navbar.php'; 
?>

<style>
  :root {
    --primary: #1e3a8a;
    --primary-hover: #1d4ed8;
    --accent-blue: #2563eb;
    --bg-main: #f1f5f9;
    --card-bg: #ffffff;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --border-color: #cbd5e1;
    --success: #16a34a;
    --danger: #dc2626;
    --warning: #d97706;
    --radius: 8px;
  }

  /* Main Container Card matching reference image style */
  .onsite-card-header {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 24px 28px;
    margin-bottom: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
  }

  .onsite-title-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 24px;
  }

  .onsite-title {
    font-size: 26px;
    font-weight: 700;
    color: #1e3a8a;
    margin: 0;
  }

  .onsite-stats-group {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 4px;
  }

  .onsite-stat-item {
    font-size: 14px;
    color: #64748b;
    font-weight: 500;
  }

  .onsite-stat-item strong {
    font-size: 18px;
    font-weight: 800;
    margin-left: 6px;
  }

  .stat-blue { color: #1e3a8a; }
  .stat-green { color: #16a34a; }
  .stat-red { color: #dc2626; }

  /* Controls Row: Search, Dropdowns, Export */
  .onsite-controls-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
  }

  .search-and-filters {
    display: flex;
    flex-direction: column;
    gap: 10px;
    flex: 1;
    max-width: 520px;
  }

  .search-input-box {
    position: relative;
    width: 100%;
  }

  .search-input-box input {
    width: 100%;
    padding: 10px 14px 10px 38px;
    border: 1px solid #e2e8f0;
    background-color: #f8fafc;
    border-radius: 8px;
    font-size: 13px;
    color: #334155;
    outline: none;
    transition: all 0.2s ease;
  }

  .search-input-box input:focus {
    border-color: #2563eb;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
  }

  .search-input-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
  }

  .dropdown-filters {
    display: flex;
    gap: 10px;
  }

  .filter-select {
    padding: 8px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background-color: #ffffff;
    font-size: 12px;
    color: #334155;
    outline: none;
    cursor: pointer;
    min-width: 170px;
  }

  .filter-select:focus {
    border-color: #2563eb;
  }

  .export-group {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .export-label {
    font-size: 13px;
    font-weight: 500;
    color: #64748b;
  }

  .btn-export {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    background: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .btn-export-pdf { border: 1px solid #fca5a5; color: #dc2626; }
  .btn-export-pdf:hover { background: #fef2f2; }

  .btn-export-excel { border: 1px solid #86efac; color: #16a34a; }
  .btn-export-excel:hover { background: #f0fdf4; }

  .btn-export-ppt { border: 1px solid #fed7aa; color: #ea580c; }
  .btn-export-ppt:hover { background: #fff7ed; }

  /* View Header Bar */
  .view-header-bar {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 12px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
  }

  .back-btn-link {
    color: #2563eb;
    text-decoration: none;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
  }

  /* Table Styling */
  .data-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    overflow-x: auto;
  }

  .custom-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
  }

  .custom-table th {
    background: #f8fafc;
    padding: 12px 14px;
    font-weight: 700;
    color: var(--text-muted);
    border-bottom: 1px solid var(--border-color);
    white-space: nowrap;
    font-size: 12px;
  }

  .sort-icon {
    margin-left: 4px;
    color: #94a3b8;
    font-size: 11px;
  }

  .custom-table td {
    padding: 14px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: top;
    font-size: 12px;
  }

  /* Badges */
  .badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    margin-bottom: 4px;
  }

  .badge-success { background: #dcfce7; color: #15803d; }
  .badge-danger { background: #fee2e2; color: #b91c1c; }
  .badge-info { background: #e0f2fe; color: #0369a1; }
  .badge-warning { background: #fef3c7; color: #b45309; }

  /* Action Stack */
  .action-stack {
    display: flex;
    flex-direction: column;
    gap: 6px;
    width: 160px;
  }

  .btn-action {
    background: #ffffff;
    border: 1px solid var(--border-color);
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    color: var(--text-main);
    cursor: pointer;
    text-align: left;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s;
  }

  .btn-action:hover {
    background: #f1f5f9;
    border-color: var(--accent-blue);
    color: var(--accent-blue);
  }

  .btn-action.btn-primary-action {
    background: var(--primary);
    color: #ffffff;
    border-color: var(--primary);
    font-weight: 700;
  }

  .btn-action.btn-primary-action:hover {
    background: var(--primary-hover);
  }

  /* Views control */
  .view-section { display: none; }
  .view-section.active { display: block; }

  /* Steps 1-14 Circle Selector */
  .steps-pagination-wrapper, .steps-circle-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 10px 0 24px 0;
  }

  .steps-circle-container {
    flex-direction: row;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
  }

  .steps-row {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 8px;
  }

  .step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .step-circle:hover {
    border-color: #1e3a8a;
    color: #1e3a8a;
  }

  .step-circle.active {
    background: #1e3a8a;
    color: #ffffff;
    border-color: #1e3a8a;
    box-shadow: 0 2px 4px rgba(30, 58, 138, 0.2);
  }

  /* Dynamic Self Assessment Styles */
  .question-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
  }

  .q-number {
    background: #1e3a8a;
    color: #ffffff;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 12px;
  }

  .interactive-option-grid {
    display: flex;
    gap: 12px;
    margin-bottom: 12px;
  }

  .interactive-option-grid.vertical {
    flex-direction: column;
  }

  .option-card {
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    padding: 10px 14px;
    cursor: not-allowed;
    display: flex;
    align-items: center;
    background: #f8fafc;
    transition: all 0.2s ease;
  }

  .option-content {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .field-help {
    color: #94a3b8;
    cursor: pointer;
    margin-left: 6px;
  }

  .radio-custom {
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 2px solid #cbd5e1;
    display: inline-block;
  }

  .nested-group {
    display: none;
    margin-left: 20px;
    padding-left: 14px;
    border-left: 2px dashed #cbd5e1;
    margin-top: 12px;
  }

  .nested-group.active {
    display: block;
  }

  .nested-group.animate-slide {
    transition: all 0.3s ease-in-out;
  }

  .nested-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    color: #1e3a8a;
    text-transform: uppercase;
    margin-bottom: 10px;
  }

  .checkbox-cards-grid {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .checkbox-card {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    background: #ffffff;
    cursor: not-allowed;
  }

  .checkbox-text {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .metric-icon {
    color: #1e3a8a;
  }

  /* Question 6 & 7 Additional Styles */
  .options-group {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 16px;
  }

  .radio-card-option {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    cursor: not-allowed;
    transition: all 0.2s ease;
  }

  .sub-options-container {
    display: none;
    margin-top: 12px;
    margin-left: 24px;
    padding-left: 12px;
    border-left: 2px dashed #cbd5e1;
    flex-direction: column;
    gap: 8px;
  }

  .sub-options-container.active {
    display: flex;
  }

  .pyramid-wrapper {
    text-align: center;
    margin: 20px 0;
  }

  .pyramid-img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    border: 1px solid #cbd5e1;
  }

  .pyramid-caption {
    font-size: 12px;
    color: #64748b;
    margin-top: 8px;
    font-weight: 600;
  }

  .automation-checklist {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 12px;
    margin-top: 16px;
  }

  .checklist-box {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    cursor: not-allowed;
    transition: all 0.2s ease;
  }

  /* Step 8 Custom Styles */
  .upload-box-inline {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #ffffff;
    border: 1px dashed #cbd5e1;
    border-radius: 6px;
    padding: 10px 14px;
    margin: 14px 0 16px 0;
    font-size: 13px;
    color: #475569;
  }

  .upload-box-inline label {
    font-weight: 600;
    color: #1e3a8a;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .file-input-btn {
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 4px;
    border: 1px solid #cbd5e1;
    background: #f1f5f9;
    cursor: not-allowed;
  }

  /* Question Matrix Table & Legend Styles */
  .section-instruction {
    font-size: 13px;
    color: #475569;
    margin-bottom: 14px;
    font-weight: 500;
  }

  .matrix-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    background: #f8fafc;
    padding: 12px 16px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    margin-bottom: 16px;
  }

  .legend-item {
    font-size: 12px;
    color: #334155;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
  }

  .legend-badge {
    background: #1e3a8a;
    color: #ffffff;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 700;
  }

  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }

  .matrix-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
  }

  .matrix-table th {
    background: #f1f5f9;
    color: #1e3a8a;
    padding: 10px 12px;
    font-weight: 700;
    border-bottom: 2px solid #cbd5e1;
    text-align: left;
  }

  .matrix-table th.col-rating {
    text-align: center;
    width: 6%;
  }

  .matrix-table td {
    padding: 10px 12px;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
  }

  .system-header-row {
    background: #f8fafc;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .checkbox-card-inline {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: not-allowed;
    user-select: none;
  }

  .checkbox-card-inline input[type="checkbox"] {
    width: 16px;
    height: 16px;
    cursor: not-allowed;
    accent-color: #2563eb;
  }

  .system-title {
    font-weight: 700;
    color: #0f172a;
    font-size: 13px;
  }

  .eval-row {
    display: none;
    background: #ffffff;
  }

  .eval-row.show-row, .eval-row.active {
    display: table-row;
  }

  .system-header-row.active-row {
    background: #e0f2fe;
  }

  .eval-row.border-bottom {
    border-bottom: 2px solid #cbd5e1;
  }

  .dim-label {
    padding-left: 28px !important;
    color: #334155;
    font-weight: 600;
  }

  .radio-cell {
    text-align: center;
  }

  .radio-cell input[type="radio"] {
    cursor: not-allowed;
    accent-color: #2563eb;
    width: 15px;
    height: 15px;
  }

  /* Donut Chart Simulation */
  .donut-chart-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px 0 30px 0;
    position: relative;
  }

  .donut-chart {
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: conic-gradient(
      #8b0000 0% 60%,
      #d97706 60% 86%,
      #1e3a8a 86% 100%
    );
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .donut-hole {
    width: 140px;
    height: 140px;
    background: #ffffff;
    border-radius: 50%;
  }

  .chart-label {
    position: absolute;
    font-size: 13px;
    font-weight: 700;
  }

  .label-tech { left: -70px; top: 50%; transform: translateY(-50%); color: #8b0000; }
  .label-process { right: -60px; top: 50%; transform: translateY(-50%); color: #d97706; }
  .label-people { top: 15px; right: 25px; color: #1e3a8a; }

  .rating-box { text-align: center; margin-top: 24px; }
  .rating-box .title { font-size: 13px; font-weight: 700; color: #1e3a8a; }
  .rating-box .score { font-size: 22px; font-weight: 800; color: #0f172a; margin: 6px 0 2px 0; }
  .rating-box .subtext { font-size: 12px; font-weight: 700; color: #1e3a8a; }

  .rating-desc {
    text-align: center;
    font-size: 12px;
    color: #475569;
    max-width: 650px;
    margin: 16px auto 30px auto;
  }

  /* Factors Scores List */
  .factors-block { max-width: 650px; margin: 0 auto 30px auto; }
  .factors-title { font-size: 13px; font-weight: 700; color: #1e3a8a; margin-bottom: 12px; }
  .factor-row { display: flex; justify-content: space-between; padding: 6px 0; font-size: 12px; color: #334155; font-weight: 600; }

  /* Recommendations Bullet Box */
  .recommendations-box { max-width: 750px; margin: 0 auto 30px auto; font-size: 12px; color: #334155; line-height: 1.6; }
  .recommendations-box p { margin-bottom: 12px; }

  /* Remarks Input Box */
  .remarks-block { max-width: 750px; margin: 20px auto 10px auto; }
  .remarks-block label { display: block; font-size: 12px; font-weight: 700; color: #1e3a8a; margin-bottom: 6px; }
  .remarks-textarea { width: 100%; min-height: 50px; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 12px; outline: none; resize: vertical; background: #ffffff; }
  .confirmed-text { font-size: 12px; font-weight: 700; color: #0f172a; margin-top: 12px; }

  /* Self Assessment Question View Card */
  .sa-question-card {
    max-width: 800px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 24px;
  }

  .sa-option-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 24px; }
  .sa-option-label { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #334155; cursor: pointer; }

  /* View-Only Option Controls Overrides */
  .step-container input[type="radio"], 
  .step-container input[type="checkbox"],
  .step-container input[type="file"] {
    pointer-events: none;
  }

  /* Dual Grid Layout */
  .dual-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    background: var(--card-bg);
    padding: 20px;
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
  }

  .column-title {
    font-size: 14px;
    font-weight: 800;
    color: var(--primary);
    margin-bottom: 12px;
    padding-bottom: 6px;
    border-bottom: 2px solid #e2e8f0;
  }

  .question-card {
    background: #f8fafc;
    border: 1px solid var(--border-color);
    padding: 16px;
    border-radius: 6px;
    margin-bottom: 16px;
  }

  .question-title { font-weight: 700; margin-bottom: 8px; }
  .option-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 12px; }

  .textarea-box {
    width: 100%;
    min-height: 70px;
    padding: 8px;
    border: 1px solid var(--border-color);
    border-radius: 4px;
    font-size: 12px;
    outline: none;
  }

  /* Report Tabs Bar */
  .report-tabs-bar {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }

  .report-tab-btn {
    padding: 10px 24px;
    background: #e2e8f0;
    color: #334155;
    border-radius: 20px;
    font-weight: 700;
    font-size: 12px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    border: none;
    transition: all 0.2s ease;
  }

  .report-tab-btn.active {
    background: var(--primary);
    color: #ffffff;
  }

  /* Preview Section Card */
  .preview-card {
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 24px;
    margin-bottom: 20px;
  }

  .score-badge-circle {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: #1e293b;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px auto;
  }

  .score-badge-circle .num { font-size: 28px; font-weight: 800; }

  .highlights-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
    gap: 12px;
    text-align: center;
    margin-bottom: 24px;
  }

  .highlight-box {
    background: #f1f5f9;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    padding: 12px;
  }

  .highlight-box .val { font-size: 20px; font-weight: 800; color: var(--primary); }

  .bottom-nav-btns {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  /* Company Info Styling */
  .info-form-section { margin-bottom: 24px; }
  .info-section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid #e2e8f0;
  }
  .info-section-header i { font-size: 18px; color: var(--primary); }
  .info-section-header h3 { margin: 0; font-size: 16px; color: var(--primary); font-weight: 700; }
  .info-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .info-grid-1 { display: grid; grid-template-columns: 1fr; gap: 16px; }
  .info-field-group { display: flex; flex-direction: column; gap: 6px; }
  .info-field-group label { font-size: 12px; font-weight: 700; color: #334155; }
  .info-field-group input, .info-field-group textarea {
    background-color: #f8fafc;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    padding: 8px 12px;
    font-size: 12px;
    color: #0f172a;
  }
  .info-list-box {
    background: #f8fafc;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    padding: 12px;
  }
  .info-list-box ul { margin: 0; padding-left: 20px; font-size: 12px; color: #334155; }

  /* Photo Gallery Grid for Attendance View */
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
    margin-top: 16px;
  }

  .gallery-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  }

  .gallery-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
  }

  .gallery-card-body {
    padding: 12px;
  }

  .gallery-card-title {
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 4px;
  }

  .gallery-card-meta {
    font-size: 11px;
    color: #64748b;
  }

  .report-tab-pane {
    display: none;
  }

  .report-tab-pane.active {
    display: block;
  }

  /* PRELIMINARY FINDINGS */
  .prelim-page-header {
    text-align: center;
    margin-bottom: 25px;
  }

  .prelim-page-header h2 {
    color: #1e3a8a;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 6px;
  }

  .prelim-subtitle {
    font-size: 12px;
    color: #64748b;
    font-weight: 600;
  }

  .prelim-navigation {
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
    margin: 20px 0;
  }

  .prelim-nav-btn {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: 1px solid #cbd5e1;
    background: #fff;
    cursor: pointer;
    font-size: 12px;
    font-weight: 700;
  }

  .prelim-nav-btn.active {
    background: #1e3a8a;
    color: white;
    border-color: #1e3a8a;
  }

  .prelim-comparison {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }

  .prelim-panel {
    border: 1px solid #dbe3ee;
    background: white;
    border-radius: 8px;
    min-height: 300px;
  }

  .prelim-panel-header {
    background: #f8fafc;
    border-bottom: 1px solid #dbe3ee;
    padding: 10px 15px;
    font-size: 13px;
    font-weight: 700;
  }

  .prelim-panel-body {
    padding: 20px;
  }

  .prelim-remarks {
    margin-top: 20px;
  }

  .prelim-remarks label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 6px;
  }

  .prelim-attachment {
    margin-top: 15px;
    border: 1px dashed #94a3b8;
    border-radius: 6px;
    padding: 12px;
    background: #f8fafc;
  }

  .prelim-attachment a {
    text-decoration: none;
    color: #2563eb;
  }

  .prelim-question-title {
    font-size: 16px;
    font-weight: 700;
    color: #1e3a8a;
    margin-bottom: 18px;
  }

  .prelim-footer {
    margin-top: 20px;
  }

  .prelim-hidden {
    display: none;
  }
</style>

<!-- VIEW 1: MAIN OSFA LIST TABLE VIEW -->
<div id="list-view" class="view-section active">
  <div class="onsite-card-header">
    <div class="onsite-title-row">
      <h1 class="onsite-title">Onsite Assessment</h1>
      <div class="onsite-stats-group">
        <div class="onsite-stat-item">Registered Companies: <strong class="stat-blue">340</strong></div>
        <div class="onsite-stat-item">Companies Passed SA: <strong class="stat-green">182</strong></div>
        <div class="onsite-stat-item">Companies Failed SA: <strong class="stat-red">158</strong></div>
      </div>
    </div>

    <div class="onsite-controls-row">
      <div class="search-and-filters">
        <div class="search-input-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search by company name, SSM, assessors..." />
        </div>
        
        <div class="dropdown-filters">
          <select class="filter-select">
            <option value="">Filter SA Status (All)</option>
            <option value="passed">SA Passed</option>
            <option value="failed">SA Failed</option>
          </select>

          <select class="filter-select">
            <option value="">Filter Status (All)</option>
            <option value="nda_agreed">NDA Agreed</option>
            <option value="nda_not_agreed">NDA Not Agreed Yet</option>
            <option value="osfa_interested">OSFA Interested</option>
            <option value="osfa_fee_paid">OSFA Fee Paid</option>
            <option value="osfa_conducted">OSFA Conducted</option>
            <option value="osfa_report_submitted">OSFA Report Submitted</option>
            <option value="osfa_report_released">OSFA Report Released</option>
          </select>
        </div>
      </div>

      <div class="export-group">
        <span class="export-label">Export:</span>
        <button type="button" class="btn-export btn-export-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</button>
        <button type="button" class="btn-export btn-export-excel"><i class="fa-solid fa-file-excel"></i> Excel</button>
        <button type="button" class="btn-export btn-export-ppt"><i class="fa-solid fa-file-powerpoint"></i> PPT</button>
      </div>
    </div>
  </div>

  <div class="data-card">
    <table class="custom-table">
      <thead>
        <tr>
          <th style="width: 40px;">No.</th>
          <th>Company Name <i class="fa-solid fa-sort sort-icon"></i></th>
          <th>SA Status <i class="fa-solid fa-sort sort-icon"></i></th>
          <th>Status <i class="fa-solid fa-sort sort-icon"></i></th>
          <th>Assessors & OSFA Date <i class="fa-solid fa-sort sort-icon"></i></th>
          <th>Loan</th>
          <th style="width: 170px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>
          <td>
            <strong>AURA 1 COMPANY</strong><br>
            <span style="color:var(--text-muted); font-size:11px;">SA: 17/09/2026 | NDA: 17/09/2026</span>
          </td>
          <td>
            <span class="badge badge-danger">FAILED (0%)</span><br>
            <small style="color:var(--text-muted); font-weight:700;">OSFA INTERESTED</small>
          </td>
          <td>
            <span class="badge badge-success">TERMS AGREE</span><br>
            <small style="color:var(--text-muted); font-weight:700;">NDA NOT NEEDED / PAID</small>
          </td>
          <td>
            <div style="font-size:11px;">
              <strong>ASSESSOR AND PM 1:</strong> ACCEPTED<br>
              <strong>OSFA Visit Date:</strong> 21/09/2026 - 22/09/2026<br>
              <strong>OSFA Report Submitted:</strong> 21/09/2026
            </div>
          </td>
          <td>
            <span class="badge badge-info">SUBMITTED</span><br>
            <small style="color:var(--text-muted); font-weight:700;">FI Application Applied</small>
          </td>
          <td>
            <div class="action-stack">
              <button class="btn-action" onclick="showView('company-info-view')"><i class="fa-regular fa-file-lines"></i> Company Information</button>
              <button class="btn-action" onclick="showView('tech-screening-view')"><i class="fa-solid fa-sliders"></i> Technical Screening</button>
              <button class="btn-action" onclick="showView('attendance-view')"><i class="fa-regular fa-image"></i> View Pic & Attendance</button>
              <a href="dmt_prelimreport.php" class="btn-action btn-primary-action" style="text-decoration: none;"><i class="fa-solid fa-clipboard-list"></i> Prelim Report</a>
              <a href="dmt_previewreport.php" class="btn-action btn-primary-action" style="text-decoration: none;"><i class="fa-solid fa-chart-pie"></i> Preview Report</a>
          </td>
        </tr>
        <tr>
          <td>2.</td>
          <td>
            <strong>STUREACTUSER01 COMPANY</strong><br>
            <span style="color:var(--text-muted); font-size:11px;">SA: 19/08/2026 | NDA: 19/08/2026</span>
          </td>
          <td>
            <span class="badge badge-danger">FAILED (30%)</span><br>
            <small style="color:var(--text-muted); font-weight:700;">OSFA INTERESTED</small>
          </td>
          <td>
            <span class="badge badge-success">TERMS AGREE</span><br>
            <small style="color:var(--text-muted); font-weight:700;">PAID</small>
          </td>
          <td>
            <div style="font-size:11px;">
              <strong>OSFA Visit Date:</strong> 21/08/2026 - 28/08/2026<br>
              <strong>OSFA Report Finalised:</strong> 21/08/2026
            </div>
          </td>
          <td>
            <span class="badge badge-info">SUBMITTED</span><br>
            <small style="color:var(--text-muted); font-weight:700;">Loan Not Applied</small>
          </td>
          <td>
            <div class="action-stack">
              <button class="btn-action" onclick="showView('company-info-view')"><i class="fa-regular fa-file-lines"></i> Company Information</button>
              <button class="btn-action" onclick="showView('tech-screening-view')"><i class="fa-solid fa-sliders"></i> Technical Screening</button>
              <button class="btn-action" onclick="showView('attendance-view')"><i class="fa-regular fa-image"></i> View Pic & Attendance</button>
              <button class="btn-action btn-primary-action" onclick="showView('prelim-view')"><i class="fa-solid fa-clipboard-list"></i> Prelim Report</button>
              <button class="btn-action btn-primary-action" onclick="showView('preview-view')"><i class="fa-solid fa-chart-pie"></i> Preview Report</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- VIEW 2: COMPANY INFORMATION VIEW -->
<div id="company-info-view" class="view-section">
  <div class="view-header-bar">
  </div>

  <div class="preview-card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom: 2px solid #e2e8f0; padding-bottom:12px;">
      <h2 style="margin:0; color:var(--primary); font-size:20px;"><i class="fa-solid fa-building"></i> Company Registration Details</h2>
      <button class="btn-action btn-primary-action" onclick="showView('list-view')" style="width:auto; padding:8px 16px;"><i class="fa-solid fa-arrow-left"></i> Back to List</button>
    </div>
    
    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-circle-info"></i>
        <h3>01. Company Information & Location</h3>
      </div>
      <div class="info-grid-1" style="margin-bottom:12px;">
        <div class="info-field-group">
          <label>Company Name</label>
          <input type="text" value="AURA 1 COMPANY" readonly />
        </div>
        <div class="info-field-group">
          <label>Company Address</label>
          <textarea rows="3" readonly>123, Jalan 1, Taman 1, 12345 Kuala Lumpur</textarea>
        </div>
        <div class="info-field-group">
          <label>Factory Address (Designated OSFA Implementation Location)</label>
          <textarea rows="3" readonly>123, Jalan 1, Taman 1, 12345 Kuala Lumpur</textarea>
        </div>
      </div>

      <div class="info-grid-2">
        <div class="info-field-group">
          <label>Year Of Establishment</label>
          <input type="text" value="2015" readonly />
        </div>
        <div class="info-field-group">
          <label>ROC Number</label>
          <input type="text" value="1234567890" readonly />
        </div>
        <div class="info-field-group">
          <label>Tax Identification No. (TIN)</label>
          <input type="text" value="C258941030" readonly />
        </div>
        <div class="info-field-group">
          <label>MSIC Code</label>
          <input type="text" value="28199" readonly />
        </div>
        <div class="info-field-group">
          <label>Service Tax No.</label>
          <input type="text" value="W10-1808-32000054" readonly />
        </div>
        <div class="info-field-group">
          <label>Sales Tax No.</label>
          <input type="text" value="A01-1808-31029883" readonly />
        </div>
      </div>
    </div>

    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-user-tie"></i>
        <h3>02. Contact Person Details</h3>
      </div>
      <div class="info-grid-2">
        <div class="info-field-group">
          <label>Salutation & Name</label>
          <input type="text" value="Mr. John Doe" readonly />
        </div>
        <div class="info-field-group">
          <label>Position</label>
          <input type="text" value="Managing Director" readonly />
        </div>
        <div class="info-field-group">
          <label>Mobile Phone</label>
          <input type="text" value="+60 12-345 6789" readonly />
        </div>
        <div class="info-field-group">
          <label>Email Address</label>
          <input type="text" value="johndoe@aura1.com" readonly />
        </div>
        <div class="info-field-group">
          <label>Telephone</label>
          <input type="text" value="+60 3-8000 1234" readonly />
        </div>
        <div class="info-field-group">
          <label>Company Website</label>
          <input type="text" value="https://www.aura1.com" readonly />
        </div>
        <div class="info-field-group">
          <label>Estimated Average Annual Revenue (RM)</label>
          <input type="text" value="RM 5,000,000.00" readonly />
        </div>
        <div class="info-field-group">
          <label>Previously Received Tech Funding / Grants</label>
          <input type="text" value="Yes (Intervention Fund)" readonly />
        </div>
      </div>
    </div>

    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-layer-group"></i>
        <h3>03. Industry Sector</h3>
      </div>
      <div class="info-grid-2">
        <div class="info-field-group">
          <label>Industry Category</label>
          <input type="text" value="Manufacturing" readonly />
        </div>
        <div class="info-field-group">
          <label>Selected Sub-Sectors</label>
          <div class="info-list-box">
            <ul>
              <li>Electrical and Electronics</li>
              <li>Machinery and equipment</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-box-open"></i>
        <h3>04. Product Details & Production Profile</h3>
      </div>
      <div class="info-grid-1" style="margin-bottom:12px;">
        <div class="info-field-group">
          <label>Main Product Name</label>
          <input type="text" value="Industrial Automation Controller Board" readonly />
        </div>
        <div class="info-field-group">
          <label>Product Description</label>
          <textarea rows="3" readonly>High-precision control unit used for smart factory assembly lines and robotic arms.</textarea>
        </div>
      </div>
      <div class="info-grid-2">
        <div class="info-field-group">
          <label>Production Type</label>
          <div class="info-list-box">
            <ul>
              <li>Batch production</li>
              <li>Mass production</li>
            </ul>
          </div>
        </div>
        <div class="info-field-group">
          <label>Production Capacity Focus (%)</label>
          <input type="text" value="Make-To-Order: 50% | Own product lines: 50%" readonly />
        </div>
      </div>
    </div>

    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-network-wired"></i>
        <h3>05. Workforce & Infrastructure</h3>
      </div>
      <div class="info-grid-2">
        <div class="info-field-group">
          <label>Total Number of Employees</label>
          <input type="text" value="85" readonly />
        </div>
        <div class="info-field-group">
          <label>Internet Service Provider (ISP) & Bandwidth</label>
          <input type="text" value="TM - 500 Mbps" readonly />
        </div>
      </div>
    </div>

    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-paperclip"></i>
        <h3>06. Attached Supporting Documents</h3>
      </div>
      <div class="info-list-box">
        <ul>
          <li><i class="fa-solid fa-file-pdf" style="color:var(--danger);"></i> SSM_Registration_Certificate.pdf (1.2 MB)</li>
          <li><i class="fa-solid fa-file-pdf" style="color:var(--danger);"></i> Manufacturing_License_2026.pdf (850 KB)</li>
        </ul>
      </div>
    </div>

    <div style="margin-top:24px; display:flex; justify-content:flex-end;">
      <button class="btn-action btn-primary-action" onclick="showView('list-view')" style="width:120px; justify-content:center;">Close View</button>
    </div>
  </div>
</div>

<!-- VIEW 3: TECHNICAL SCREENING VIEW -->
<div id="tech-screening-view" class="view-section">
  <div class="preview-card" style="box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
    
    <div class="ts-top-header" style="display:flex; justify-content:space-between; margin-bottom:16px;">
      <a onclick="showView('list-view')" class="back-btn-link" style="font-size:13px; color:#2563eb;">
        <i class="fa-solid fa-angle-left"></i> Back to DMT OSFA
      </a>
      <button type="button" class="btn-action btn-primary-action" style="width:auto; padding:8px 16px; border-radius:6px; font-weight:600;"><i class="fa-solid fa-file-pdf"></i> Export To PDF</button>
    </div>

    <div class="steps-pagination-wrapper">
      <div class="steps-row">
        <div class="step-circle" onclick="switchTechStep(1)">1</div>
        <div class="step-circle" onclick="switchTechStep(2)">2</div>
        <div class="step-circle" onclick="switchTechStep(3)">3</div>
        <div class="step-circle" onclick="switchTechStep(4)">4</div>
        <div class="step-circle" onclick="switchTechStep(5)">5</div>
        <div class="step-circle" onclick="switchTechStep(6)">6</div>
        <div class="step-circle" onclick="switchTechStep(7)">7</div>
        <div class="step-circle" onclick="switchTechStep(8)">8</div>
        <div class="step-circle" onclick="switchTechStep(9)">9</div>
      </div>
      <div class="steps-row">
        <div class="step-circle" onclick="switchTechStep(10)">10</div>
        <div class="step-circle" onclick="switchTechStep(11)">11</div>
        <div class="step-circle" onclick="switchTechStep(12)">12</div>
        <div class="step-circle" onclick="switchTechStep(13)">13</div>
        <div class="step-circle active" onclick="switchTechStep(14)">14</div>
      </div>
    </div>

    <!-- STEP 14 CONTENT: SUMMARY AND RECOMMENDATIONS -->
    <div id="tech-step-14-content" class="tech-step-pane">
      <div class="ts-title-main" style="text-align:center;">
        <h2>DETAILED SUMMARY AND RECOMMENDATIONS</h2>
        <p>AURA 1 COMPANY</p>
      </div>

      <div class="donut-chart-container">
        <div class="donut-chart">
          <div class="donut-hole"></div>
          <span class="chart-label label-tech">Technology <strong>60%</strong></span>
          <span class="chart-label label-process"><strong>26%</strong> Process</span>
          <span class="chart-label label-people">People <strong>14%</strong></span>
        </div>

        <div class="rating-box">
          <div class="title">Your overall self-assessment rating is</div>
          <div class="score">0%</div>
          <div class="subtext">Conventional</div>
        </div>
      </div>

      <div class="rating-desc">
        Operation remains "as is" with no intention or initiative to embark on Industry 4.0 initiative.
      </div>

      <div class="factors-block">
        <div class="factors-title">Your readiness scores in the three shift factors for are as follows:</div>
        <div class="factor-row">
          <span>PEOPLE</span>
          <span>0%</span>
        </div>
        <div class="factor-row">
          <span>PROCESS</span>
          <span>0%</span>
        </div>
        <div class="factor-row">
          <span>TECHNOLOGY</span>
          <span>0%</span>
        </div>
      </div>

      <div class="recommendations-box">
        <p>The company shall introduce basic awareness programs about Industry 4.0 and organise specific training on the Fourth Industrial Revolution for the management. Start by exploring small automation projects and benchmarking competitors to initiate strategic transformation discussions.</p>
        <p>Start by utilising basic digital tools to manage, monitor and track the production processes and their performance (e.g., computerised spreadsheets, simple databases). Establish a roadmap for digitization focusing on basic data collection.</p>
        <p>Initiate foundational automation processes. Deploy digital solutions to streamline operations. Establish seamless system connectivity for enhanced integration and efficiency.</p>
      </div>

      <div class="remarks-block">
        <label>Overall Screening Remarks</label>
        <textarea class="remarks-textarea">I have screened, pls proceed</textarea>
        <div class="confirmed-text">Confirmed By: stusuper@yopmail.com</div>
      </div>

      <div style="display:flex; justify-content:flex-end; max-width:750px; margin:20px auto 0 auto;">
        <button type="button" class="btn-action" onclick="switchTechStep(13)" style="padding:8px 24px; border-radius:6px;">Back</button>
      </div>
    </div>

    <!-- DYNAMIC STEPS 1-13 (SELF ASSESSMENT QUESTIONS - VIEW ONLY WITH INDIVIDUAL REMARKS) -->
    <div id="tech-step-questions-content" class="tech-step-pane" style="display:none;">
      <h2 style="font-size:18px; font-weight:700; color:#1e3a8a; margin-bottom:20px;">Self Assessment (View-Only)</h2>
      
      <div class="sa-question-card">
        <div class="question-header" id="main-q-header">
          <span class="q-number" id="sa-q-number">Q1</span>
          <p class="question-title" id="sa-q-text">
            Does your company have a transformation strategy to become a smart factory?
          </p>
        </div>

        <!-- Step 1 Interactive Nested Layout (View-Only) -->
        <div id="step-1-nested-container" class="step-container" style="display:none;">
          <div class="interactive-option-grid">
            <label class="option-card">
              <input type="radio" name="smartStrategy" value="No" disabled checked>
              <div class="option-content"><span class="option-text">No</span></div>
            </label>
            <label class="option-card">
              <input type="radio" name="smartStrategy" value="Yes" disabled>
              <div class="option-content"><span class="option-text">Yes</span></div>
            </label>
          </div>

          <div id="nestedLevel1" class="nested-group">
            <span class="nested-tag">Implementation Status</span>
            <div class="interactive-option-grid vertical">
              <label class="option-card">
                <input type="radio" name="strategyImplementation" value="Not Implemented" disabled>
                <div class="option-content"><span class="option-text">The strategy has <strong>NOT</strong> yet been implemented.</span></div>
              </label>
              <label class="option-card">
                <input type="radio" name="strategyImplementation" value="Implemented" disabled>
                <div class="option-content"><span class="option-text">The strategy <strong>has been implemented</strong>.</span></div>
              </label>
            </div>

            <div id="nestedLevel2" class="nested-group">
              <span class="nested-tag">Impact & Growth</span>
              <div class="interactive-option-grid vertical">
                <label class="option-card">
                  <input type="radio" name="strategyGrowth" value="No Growth" disabled>
                  <div class="option-content"><span class="option-text">The strategy is ongoing/just completed but has <strong>not yet resulted in growth</strong>.</span></div>
                </label>
                <label class="option-card">
                  <input type="radio" name="strategyGrowth" value="Visible Growth" disabled>
                  <div class="option-content"><span class="option-text">The implementation has shown <strong>visible growth</strong> in the company.</span></div>
                </label>
              </div>

              <div id="nestedLevel3" class="nested-group">
                <span class="nested-tag">Achieved Key Performance Indicators</span>
                <div class="checkbox-cards-grid">
                  <label class="checkbox-card">
                    <input type="checkbox" name="growthMetrics[]" value="Production output" disabled>
                    <span>Production output has improved.</span>
                  </label>
                  <label class="checkbox-card">
                    <input type="checkbox" name="growthMetrics[]" value="Revenue" disabled>
                    <span>Revenue has improved.</span>
                  </label>
                  <label class="checkbox-card">
                    <input type="checkbox" name="growthMetrics[]" value="COGS" disabled>
                    <span>COGS has improved (reduced).</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Individual Remarks for Step 1 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 1</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q1...">Strategy planning required before embarking on digitization.</textarea>
          </div>
        </div>

        <!-- Step 2 Interactive Competency Layout (View-Only) -->
        <div id="step-2-nested-container" class="step-container" style="display:none;">
          <div class="interactive-option-grid">
            <label class="option-card">
              <input type="radio" name="staffCompetency" value="Not Assessed" disabled checked>
              <div class="option-content">
                <span class="radio-custom"></span>
                <span class="option-text">Not Assessed</span>
              </div>
            </label>

            <label class="option-card">
              <input type="radio" name="staffCompetency" value="Assessed" disabled>
              <div class="option-content">
                <span class="radio-custom"></span>
                <span class="option-text">Assessed</span>
              </div>
            </label>
          </div>

          <div id="q2NestedGroup" class="nested-group animate-slide">
            <div class="nested-content">
              <span class="nested-tag"><i class="fa-solid fa-clipboard-check"></i> Method of Assessment</span>
              <div class="checkbox-cards-grid">
                <label class="checkbox-card">
                  <input type="checkbox" name="assessmentMethods[]" value="Self and Peer Assessment" disabled>
                  <div class="checkbox-text">
                    <i class="fa-solid fa-users metric-icon"></i>
                    <span>Self and Peer Assessment</span>
                  </div>
                </label>

                <label class="checkbox-card">
                  <input type="checkbox" name="assessmentMethods[]" value="Competency Gap Analysis" disabled>
                  <div class="checkbox-text">
                    <i class="fa-solid fa-chart-simple metric-icon"></i>
                    <span>Competency Gap Analysis</span>
                  </div>
                </label>

                <label class="checkbox-card">
                  <input type="checkbox" name="assessmentMethods[]" value="Training Needs Analysis (TNA)" disabled>
                  <div class="checkbox-text">
                    <i class="fa-solid fa-user-graduate metric-icon"></i>
                    <span>Training Needs Analysis (TNA)</span>
                  </div>
                </label>
              </div>

              <div class="nested-group animate-slide active" style="margin-top: 16px; display:block;">
                <span class="nested-tag"><i class="fa-solid fa-graduation-cap"></i> Competency Enhancement Plan</span>
                <div class="checkbox-cards-grid">
                  <label class="checkbox-card">
                    <input type="checkbox" name="enhancementPlans[]" value="Learning and Development (L&D) Plan" disabled>
                    <div class="checkbox-text">
                      <i class="fa-solid fa-book-open-reader metric-icon"></i>
                      <span>Learning and Development (L&D) Plan</span>
                    </div>
                  </label>

                  <label class="checkbox-card">
                    <input type="checkbox" name="enhancementPlans[]" value="Evaluation of Training Effectiveness" disabled>
                    <div class="checkbox-text">
                      <i class="fa-solid fa-chart-line metric-icon"></i>
                      <span>Evaluation of Training Effectiveness</span>
                    </div>
                  </label>

                  <label class="checkbox-card">
                    <input type="checkbox" name="enhancementPlans[]" value="Continual Revision of L&D" disabled>
                    <div class="checkbox-text">
                      <i class="fa-solid fa-arrows-rotate metric-icon"></i>
                      <span>Continual Revision of L&D</span>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Individual Remarks for Step 2 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 2</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q2...">Recommend implementing Training Needs Analysis (TNA) for workforce development.</textarea>
          </div>
        </div>

        <!-- Step 3 Interactive Operational Maturity Layout (View-Only) -->
        <div id="step-3-nested-container" class="step-container" style="display:none;">
          <!-- SUB-QUESTION A -->
          <div class="nested-group animate-slide active" style="margin-left:0; border-left:none;">
            <div class="nested-content">
              <span class="nested-tag">
                <i class="fa-solid fa-industry"></i> A. Production planning and scheduling
              </span>
              <div class="interactive-option-grid vertical">
                <label class="option-card"><input type="radio" name="opsProductionPlanning" value="1" disabled checked> <span class="option-text">Managed manually using paper forms.</span></label>
                <label class="option-card"><input type="radio" name="opsProductionPlanning" value="2" disabled> <span class="option-text">Use simple/basic digital tools or spreadsheets for certain processes.</span></label>
                <label class="option-card"><input type="radio" name="opsProductionPlanning" value="3" disabled> <span class="option-text">Integrated software systems that help manage and coordinate processes.</span></label>
                <label class="option-card"><input type="radio" name="opsProductionPlanning" value="4" disabled> <span class="option-text">Most processes are automated with real-time tracking.</span></label>
                <label class="option-card"><input type="radio" name="opsProductionPlanning" value="5" disabled> <span class="option-text">Fully autonomous, using AI and machine learning.</span></label>
              </div>
            </div>
          </div>

          <!-- SUB-QUESTION B -->
          <div class="nested-group animate-slide active" style="margin-left:0; border-left:none;">
            <div class="nested-content">
              <span class="nested-tag">
                <i class="fa-solid fa-boxes-stacked"></i> B. Inventory management
              </span>
              <div class="interactive-option-grid vertical">
                <label class="option-card"><input type="radio" name="opsInventoryManagement" value="1" disabled checked> <span class="option-text">Managed manually using paper forms.</span></label>
                <label class="option-card"><input type="radio" name="opsInventoryManagement" value="2" disabled> <span class="option-text">Use simple/basic digital tools or spreadsheets.</span></label>
                <label class="option-card"><input type="radio" name="opsInventoryManagement" value="3" disabled> <span class="option-text">Integrated software systems.</span></label>
                <label class="option-card"><input type="radio" name="opsInventoryManagement" value="4" disabled> <span class="option-text">Automated real-time data tracking.</span></label>
                <label class="option-card"><input type="radio" name="opsInventoryManagement" value="5" disabled> <span class="option-text">Fully autonomous.</span></label>
              </div>
            </div>
          </div>

          <!-- Individual Remarks for Step 3 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 3</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q3...">Current operations heavily dependent on manual record keeping.</textarea>
          </div>
        </div>

        <!-- Step 4 Interactive IT Systems Matrix Layout (View-Only) -->
        <div id="step-4-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="matrix-legend">
              <div class="legend-item"><span class="legend-badge">1</span> Manual / Standalone / Basic</div>
              <div class="legend-item"><span class="legend-badge">2</span> Computer-Assisted / Networked</div>
              <div class="legend-item"><span class="legend-badge">3</span> Automated / Integrated / Alerting</div>
              <div class="legend-item"><span class="legend-badge">4</span> Configurable / Real-time / Predictive</div>
              <div class="legend-item"><span class="legend-badge">5</span> Fully Flexible / Unified / Autonomous</div>
            </div>

            <div class="table-responsive">
              <table class="matrix-table">
                <thead>
                  <tr>
                    <th style="width: 35%;">Available IT Systems</th>
                    <th style="width: 25%;">Evaluation Category</th>
                    <th class="col-rating">1</th>
                    <th class="col-rating">2</th>
                    <th class="col-rating">3</th>
                    <th class="col-rating">4</th>
                    <th class="col-rating">5</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $systems = [
                    'hr' => ['title' => 'HR System', 'icon' => 'fa-users-gear', 'prefix' => 'hr'],
                    'accounting' => ['title' => 'Accounting System', 'icon' => 'fa-calculator', 'prefix' => 'acc'],
                    'crm' => ['title' => 'CRM (Customer Relationship Management)', 'icon' => 'fa-handshake', 'prefix' => 'crm'],
                    'erp' => ['title' => 'ERP (Enterprise Resource Planning)', 'icon' => 'fa-sitemap', 'prefix' => 'erp'],
                    'scm' => ['title' => 'SCM (Supply Chain Management)', 'icon' => 'fa-truck-ramp-box', 'prefix' => 'scm'],
                    'qc' => ['title' => 'Quality Control Management System', 'icon' => 'fa-microscope', 'prefix' => 'qc'],
                  ];

                  $dimensions = [
                    'automation' => ['label' => 'Automation', 'icon' => 'fa-robot'],
                    'connectivity' => ['label' => 'Connectivity', 'icon' => 'fa-network-wired'],
                    'intelligence' => ['label' => 'Intelligence', 'icon' => 'fa-brain']
                  ];

                  foreach ($systems as $id => $sys):
                  ?>
                    <tr class="system-header-row active-row" id="header-<?= $id ?>">
                      <td colspan="7">
                        <label class="checkbox-card-inline">
                          <input type="checkbox" name="it_systems[]" value="<?= $sys['title'] ?>" id="chk-<?= $id ?>" disabled>
                          <span class="system-title"><i class="fa-solid <?= $sys['icon'] ?>"></i> <?= $sys['title'] ?></span>
                        </label>
                      </td>
                    </tr>

                    <?php 
                    $dimCount = 0;
                    foreach ($dimensions as $dimKey => $dim): 
                      $dimCount++;
                      $isLast = ($dimCount === 3);
                      $inputName = $sys['prefix'] . '_' . $dimKey;
                    ?>
                      <tr class="eval-row show-row row-<?= $id ?> <?= $isLast ? 'border-bottom' : '' ?>">
                        <td class="dim-label"><i class="fa-solid <?= $dim['icon'] ?>"></i> <?= $dim['label'] ?></td>
                        <td>Level of <?= $dim['label'] ?></td>
                        <?php for ($v = 1; $v <= 5; $v++): ?>
                          <td class="radio-cell">
                            <input type="radio" name="<?= $inputName ?>" value="<?= $v ?>" disabled <?= $v === 1 ? 'checked' : '' ?>>
                          </td>
                        <?php endfor; ?>
                      </tr>
                    <?php endforeach; ?>

                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Individual Remarks for Step 4 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 4</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q4...">Standalone accounting module used; ERP module integration recommended.</textarea>
          </div>
        </div>

        <!-- Step 5 Interactive Facility Assets Matrix Layout (View-Only) -->
        <div id="step-5-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="matrix-legend">
              <div class="legend-item"><span class="legend-badge">1</span> Manual / Standalone / Basic</div>
              <div class="legend-item"><span class="legend-badge">2</span> Computer-Assisted / Networked</div>
              <div class="legend-item"><span class="legend-badge">3</span> Automated / Integrated / Alerting</div>
              <div class="legend-item"><span class="legend-badge">4</span> Configurable / Real-time / Predictive</div>
              <div class="legend-item"><span class="legend-badge">5</span> Fully Flexible / Unified / Autonomous</div>
            </div>

            <div class="table-responsive">
              <table class="matrix-table">
                <thead>
                  <tr>
                    <th style="width: 35%;">Facility Assets</th>
                    <th style="width: 25%;">Evaluation Category</th>
                    <th class="col-rating">1</th>
                    <th class="col-rating">2</th>
                    <th class="col-rating">3</th>
                    <th class="col-rating">4</th>
                    <th class="col-rating">5</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $facilityAssets = [
                    'air_compressor' => ['title' => 'Air Compressor System', 'icon' => 'fa-wind', 'prefix' => 'ac'],
                    'boiler' => ['title' => 'Boiler System', 'icon' => 'fa-fire-burner', 'prefix' => 'boiler'],
                  ];

                  foreach ($facilityAssets as $id => $asset):
                  ?>
                    <tr class="system-header-row active-row" id="header-<?= $id ?>">
                      <td colspan="7">
                        <label class="checkbox-card-inline">
                          <input type="checkbox" name="facility_assets[]" value="<?= $asset['title'] ?>" id="chk-<?= $id ?>" disabled>
                          <span class="system-title"><i class="fa-solid <?= $asset['icon'] ?>"></i> <?= $asset['title'] ?></span>
                        </label>
                      </td>
                    </tr>

                    <?php 
                    $dimCount = 0;
                    foreach ($dimensions as $dimKey => $dim): 
                      $dimCount++;
                      $isLast = ($dimCount === 3);
                      $inputName = $asset['prefix'] . '_' . $dimKey;
                    ?>
                      <tr class="eval-row show-row row-<?= $id ?> <?= $isLast ? 'border-bottom' : '' ?>">
                        <td class="dim-label"><i class="fa-solid <?= $dim['icon'] ?>"></i> <?= $dim['label'] ?></td>
                        <td>Maturity Level</td>
                        <?php for ($v = 1; $v <= 5; $v++): ?>
                          <td class="radio-cell">
                            <input type="radio" name="<?= $inputName ?>" value="<?= $v ?>" disabled <?= $v === 1 ? 'checked' : '' ?>>
                          </td>
                        <?php endfor; ?>
                      </tr>
                    <?php endforeach; ?>

                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Individual Remarks for Step 5 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 5</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q5...">Basic maintenance logs present; IoT energy sensors suggested.</textarea>
          </div>
        </div>

        <!-- Step 6 Interactive Process Layout (View-Only) -->
        <div id="step-6-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="options-group">
              <label class="radio-card-option">
                <input type="radio" name="process_performed" value="manual" disabled checked>
                <span class="option-label">Performed manually <i class="fa-solid fa-circle-info field-help"></i></span>
              </label>

              <label class="radio-card-option">
                <input type="radio" name="process_performed" value="semi_automatic" disabled>
                <span class="option-label">Using dedicated semi-automatic machines <i class="fa-solid fa-circle-info field-help"></i></span>
              </label>

              <div>
                <label class="radio-card-option">
                  <input type="radio" name="process_performed" value="automatic" disabled>
                  <span class="option-label">Using dedicated automatic machines <i class="fa-solid fa-circle-info field-help"></i></span>
                </label>

                <div class="sub-options-container" id="autoSubOptions">
                  <label class="checkbox-card-inline">
                    <input type="checkbox" name="auto_features[]" value="Pre-Programmed machine setting" disabled>
                    <span>Pre-Programmed machine setting.</span>
                  </label>
                  <label class="checkbox-card-inline">
                    <input type="checkbox" name="auto_features[]" value="Machines are capable of reconfiguration" disabled>
                    <span>Machines are capable of reconfiguration.</span>
                  </label>
                  <label class="checkbox-card-inline">
                    <input type="checkbox" name="auto_features[]" value="Autonomous decision making" disabled>
                    <span>Autonomous decision making.</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Individual Remarks for Step 6 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 6</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q6...">Assembly line processes require automation interventions.</textarea>
          </div>
        </div>

        <!-- Step 7 Interactive Automation Level Layout (View-Only) -->
        <div id="step-7-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="pyramid-wrapper">
              <img src="automation_pyramid.png" alt="Level of Automation Pyramid" class="pyramid-img" onerror="this.src='https://via.placeholder.com/600x320?text=Level+of+Automation+Pyramid';" />
              <div class="pyramid-caption">Figure 1: Level of Automation</div>
            </div>

            <div class="automation-checklist">
              <label class="checklist-box">
                <input type="checkbox" name="automation_levels[]" value="Sensors and Signals" disabled>
                <span class="option-label">Sensors and Signals</span>
              </label>
              <label class="checklist-box">
                <input type="checkbox" name="automation_levels[]" value="PLC" disabled>
                <span class="option-label">PLC</span>
              </label>
              <label class="checklist-box">
                <input type="checkbox" name="automation_levels[]" value="SCADA/HMI" disabled>
                <span class="option-label">SCADA/HMI</span>
              </label>
            </div>
          </div>

          <!-- Individual Remarks for Step 7 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 7</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q7...">Field devices are un-networked; PLC upgrading planned.</textarea>
          </div>
        </div>

        <!-- Step 8 Interactive Machine Network Connectivity Layout (View-Only) -->
        <div id="step-8-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <label class="option-card">
                <input type="radio" name="step8_connected" value="Yes" disabled>
                <div class="option-content"><span class="option-text">Yes</span></div>
              </label>
              <label class="option-card">
                <input type="radio" name="step8_connected" value="No" disabled checked>
                <div class="option-content"><span class="option-text">No</span></div>
              </label>
            </div>

            <div class="upload-box-inline">
              <label><i class="fa-solid fa-paperclip"></i> Upload Supporting Evidence (PDF, PNG, JPG)</label>
              <input type="file" class="file-input-btn" accept=".pdf,.png,.jpg,.jpeg" disabled>
            </div>

            <div id="step8-nested-level1" class="nested-group animate-slide">
              <span class="nested-tag">Describe your machine connectivity level:</span>
              <div class="interactive-option-grid vertical">
                <label class="option-card">
                  <input type="radio" name="step8_connectivity_level" value="physical" disabled>
                  <div class="option-content">
                    <span class="option-text">They are physically connected BUT no data exchange.</span>
                  </div>
                </label>
                <label class="option-card">
                  <input type="radio" name="step8_connectivity_level" value="control" disabled>
                  <div class="option-content">
                    <span class="option-text">Connected via machine control system.</span>
                  </div>
                </label>
                <label class="option-card">
                  <input type="radio" name="step8_connectivity_level" value="interoperable" disabled>
                  <div class="option-content">
                    <span class="option-text">Enables data interoperability with different platforms.</span>
                  </div>
                </label>
              </div>

              <div id="step8-nested-level2" class="nested-group animate-slide">
                <span class="nested-tag">Select additional interoperability capabilities:</span>
                <div class="checkbox-cards-grid">
                  <label class="checkbox-card">
                    <input type="checkbox" name="step8_interop_capabilities[]" value="Real-time interaction" disabled>
                    <span>Data exchange occurs in real-time interaction.</span>
                  </label>
                  <label class="checkbox-card">
                    <input type="checkbox" name="step8_interop_capabilities[]" value="Immediate feedback" disabled>
                    <span>Immediate feedback and decision-making.</span>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Individual Remarks for Step 8 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 8</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q8...">No machine network integration currently installed.</textarea>
          </div>
        </div>

        <!-- Step 9 Interactive Data Collection & Analysis Layout (View-Only) -->
        <div id="step-9-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step9_data_collection" value="Hard-wired" disabled checked> <span class="option-text">Hard-wired control system</span></label>
              <label class="option-card"><input type="radio" name="step9_data_collection" value="PLC" disabled> <span class="option-text">PLC-based control system</span></label>
              <label class="option-card"><input type="radio" name="step9_data_collection" value="Computer" disabled> <span class="option-text">Computer-based control system</span></label>
            </div>
          </div>

          <!-- Individual Remarks for Step 9 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 9</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q9...">Data collection is manual; upgrade to automated logging is required.</textarea>
          </div>
        </div>

        <!-- Step 10 Interactive Control Systems Capability Layout (View-Only) -->
        <div id="step-10-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="checkbox" name="step10_data_collection[]" value="Identify and notify problems" disabled> <span class="option-text">Identify and notify problems</span></label>
              <label class="option-card"><input type="checkbox" name="step10_data_collection[]" value="Predict problems" disabled> <span class="option-text">Predict problems</span></label>
              <label class="option-card"><input type="checkbox" name="step10_data_collection[]" value="Independently execute solutions" disabled> <span class="option-text">Independently execute solutions</span></label>
            </div>
          </div>

          <!-- Individual Remarks for Step 10 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 10</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q10...">Control system lacks predictive capability.</textarea>
          </div>
        </div>

        <!-- Step 11 Interactive Factory Customization Layout (View-Only) -->
        <div id="step-11-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <!-- Main Option 1 -->
              <div class="option-wrapper">
                <label class="option-card">
                  <input type="checkbox" name="step11_customization" value="mass_production" disabled>
                  <div class="option-content"><span class="option-text">Capability</span></div>
                </label>
                <div id="step11-nested-level1" class="nested-group animate-slide">
                  <div class="checkbox-cards-grid">
                    <label class="checkbox-card"><input type="checkbox" name="step11_capability_features[]" value="limited" disabled> <span>Limited</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_capability_features[]" value="predetermined_moderate" disabled> <span>Pre-determined/moderate</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_capability_features[]" value="flexible" disabled> <span>Flexible</span></label>
                  </div>
                </div>
              </div>

              <!-- Main Option 2 -->
              <div class="option-wrapper">
                <label class="option-card">
                  <input type="checkbox" name="step11_customization" value="tools_moulds" disabled>
                  <div class="option-content"><span class="option-text">Tools/Moulds Changing Mechanism</span></div>
                </label>
                <div id="step11-nested-level2" class="nested-group animate-slide">
                  <div class="checkbox-cards-grid">
                    <label class="checkbox-card"><input type="checkbox" name="step11_tools_features[]" value="manual_time_consuming" disabled> <span>Manual and time consuming</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_tools_features[]" value="semi_automated_fast" disabled> <span>Semi-automated and fast changing</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_tools_features[]" value="automatic_fast" disabled> <span>Automatic and fast changing</span></label>
                  </div>
                </div>
              </div>

              <!-- Main Option 3 -->
              <div class="option-wrapper">
                <label class="option-card">
                  <input type="checkbox" name="step11_customization" value="lot_sizes" disabled>
                  <div class="option-content"><span class="option-text">Lot Sizes</span></div>
                </label>
                <div id="step11-nested-level3" class="nested-group animate-slide">
                  <div class="checkbox-cards-grid">
                    <label class="checkbox-card"><input type="checkbox" name="step11_lotsize_features[]" value="fixed_moq" disabled> <span>Fixed MOQ</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_lotsize_features[]" value="flexible_moq" disabled> <span>Flexible MOQ</span></label>
                  </div>
                </div>
              </div>

              <!-- Main Option 4 -->
              <div class="option-wrapper">
                <label class="option-card">
                  <input type="checkbox" name="step11_customization" value="machine_setup" disabled>
                  <div class="option-content"><span class="option-text">Machine Setup</span></div>
                </label>
                <div id="step11-nested-level4" class="nested-group animate-slide">
                  <div class="checkbox-cards-grid">
                    <label class="checkbox-card"><input type="checkbox" name="step11_setup_features[]" value="manual_time_consuming" disabled> <span>Manual and time consuming</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_setup_features[]" value="semi_automated_fast" disabled> <span>Semi-automated and fast changing</span></label>
                    <label class="checkbox-card"><input type="checkbox" name="step11_setup_features[]" value="automatic_fast" disabled> <span>Automatic and fast changing</span></label>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Individual Remarks for Step 11 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 11</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q11...">Setup changes are largely manual.</textarea>
          </div>
        </div>

        <!-- Step 12 Interactive Cybersecurity Layout (View-Only) -->
        <div id="step-12-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="checkbox" name="step12_cybersecurity[]" value="No dedicated personnel" disabled checked> <span class="option-text">No dedicated personnel</span></label>
              <label class="option-card"><input type="checkbox" name="step12_cybersecurity[]" value="One dedicated personnel" disabled> <span class="option-text">One dedicated personnel</span></label>
              <label class="option-card"><input type="checkbox" name="step12_cybersecurity[]" value="Has a dedicated team" disabled> <span class="option-text">Has a dedicated team</span></label>
            </div>
          </div>

          <div class="question-container">
            <hr><h3 class="question-subtitle">Governance</h3>
            <h5>Awareness Program/Activities</h5>
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step12_awareness" value="Yes" disabled> <span class="option-text">Yes</span></label>
              <label class="option-card"><input type="radio" name="step12_awareness" value="No" disabled checked> <span class="option-text">No</span></label>
            </div>

            <h5>Policies</h5>
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step12_policies" value="Yes" disabled> <span class="option-text">Yes</span></label>
              <label class="option-card"><input type="radio" name="step12_policies" value="No" disabled checked> <span class="option-text">No</span></label>
            </div>

            <h5>Risk Assessment</h5>
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step12_risk" value="Yes" disabled> <span class="option-text">Yes</span></label>
              <label class="option-card"><input type="radio" name="step12_risk" value="No" disabled checked> <span class="option-text">No</span></label>
            </div>

            <h5>Continuous Revision</h5>
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step12_revision" value="No" disabled checked> <span class="option-text">No</span></label>
              <label class="option-card"><input type="radio" name="step12_revision" value="Seldom" disabled> <span class="option-text">Seldom</span></label>
              <label class="option-card"><input type="radio" name="step12_revision" value="Regularly" disabled> <span class="option-text">Regularly</span></label>
            </div>

            <h5>Resources</h5>
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="checkbox" name="step12_resources[]" value="Password Management" disabled checked> <span class="option-text">Password Management</span></label>
              <label class="option-card"><input type="checkbox" name="step12_resources[]" value="IP Whitelisting" disabled> <span class="option-text">IP Whitelisting</span></label>
              <label class="option-card"><input type="checkbox" name="step12_resources[]" value="Firewall systems" disabled> <span class="option-text">Firewall systems</span></label>
              <label class="option-card"><input type="checkbox" name="step12_resources[]" value="Antivirus software" disabled checked> <span class="option-text">Antivirus software</span></label>
              <label class="option-card"><input type="checkbox" name="step12_resources[]" value="Cybersecurity Intrusion Detection Systems" disabled> <span class="option-text">Cybersecurity Intrusion Detection Systems</span></label>
            </div>

          </div>

          <!-- Individual Remarks for Step 12 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 12</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q12...">Standard commercial antivirus in use; IT security policy baseline needed.</textarea>
          </div>
        </div>

        <!-- Step 13 Interactive Additional Comments Layout (View-Only) -->
        <div id="step-13-nested-container" class="step-container" style="display:none;">
          <div class="question-container">
            <div class="interactive-option-grid vertical">
              <label class="option-card"><input type="radio" name="step13_comments" value="No additional comments" disabled checked> <span class="option-text">No additional comments</span></label>
              <label class="option-card"><input type="radio" name="step13_comments" value="Provided in details" disabled> <span class="option-text">Provided in details</span></label>
            </div>
          </div>

          <!-- Individual Remarks for Step 13 -->
          <div class="remarks-block">
            <label>Assessor Remarks for Question 13</label>
            <textarea class="remarks-textarea" placeholder="Enter specific remarks for Q13...">Preliminary screening completed without blockers.</textarea>
          </div>
        </div>

        <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:20px;">
          <button type="button" class="btn-action" id="sa-prev-btn" onclick="prevTechQuestion()" style="padding:8px 24px;">Back</button>
          <button type="button" class="btn-action btn-primary-action" id="sa-next-btn" onclick="nextTechQuestion()" style="padding:8px 24px;">Next</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- VIEW 4: ATTENDANCE & PIC VIEW -->
<div id="attendance-view" class="view-section">
  <div class="view-header-bar">
    <a onclick="showView('list-view')" class="back-btn-link">
      <i class="fa-solid fa-arrow-left"></i> Back to DMT OSFA
    </a>
    <div style="font-weight: 700; color: var(--text-muted); font-size:12px;">
      <i class="fa-solid fa-camera"></i> Onsite Audit Attendance & Visual Evidence
    </div>
  </div>

  <div class="preview-card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom: 2px solid #e2e8f0; padding-bottom:12px;">
      <div>
        <h2 style="margin:0; color:var(--primary); font-size:20px;"><i class="fa-solid fa-users-viewfinder"></i> Onsite Visit PIC & Attendance Record</h2>
        <span style="font-size:12px; color:var(--text-muted);">AURA 1 COMPANY | Audit Date: 21/09/2026 - 22/09/2026</span>
      </div>
      <button class="btn-action btn-primary-action" onclick="showView('list-view')" style="width:auto; padding:8px 16px;"><i class="fa-solid fa-arrow-left"></i> Back to List</button>
    </div>

    <!-- Attendance Log Table -->
    <div class="info-form-section">
      <div class="info-section-header">
        <i class="fa-solid fa-clipboard-user"></i>
        <h3>Attending Stakeholders & Representatives</h3>
      </div>
      
      <div class="table-responsive">
        <table class="matrix-table" style="font-size:12px;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Role / Position</th>
              <th>Organization / Entity</th>
              <th>Contact Number</th>
              <th>Check-in Time</th>
              <th>Verification Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><strong>Mr. John Doe</strong></td>
              <td>Managing Director</td>
              <td>AURA 1 COMPANY</td>
              <td>+60 12-345 6789</td>
              <td>21/09/2026 09:15 AM</td>
              <td><span class="badge badge-success">Verified Onsite</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td><strong>En. Ahmad Razak</strong></td>
              <td>Lead Technical Assessor</td>
              <td>DMT Assessor Panel</td>
              <td>+60 19-876 5432</td>
              <td>21/09/2026 09:00 AM</td>
              <td><span class="badge badge-success">Verified Onsite</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td><strong>Ms. Sarah Lee</strong></td>
              <td>Project Manager Admin</td>
              <td>OSFA Secretariat</td>
              <td>+60 13-222 1100</td>
              <td>21/09/2026 09:00 AM</td>
              <td><span class="badge badge-success">Verified Onsite</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Photo Evidence Gallery -->
    <div class="info-form-section" style="margin-top:24px;">
      <div class="info-section-header">
        <i class="fa-solid fa-images"></i>
        <h3>Audit Visit Visual Evidence & GPS Check-in Photos</h3>
      </div>

      <div class="gallery-grid">
        <div class="gallery-card">
          <img src="https://images.pexels.com/photos/7192957/pexels-photo-7192957.jpeg" alt="Factory Entrance">
          <div class="gallery-card-body">
            <div class="gallery-card-title">1. Facility Entrance & Signboard</div>
            <div class="gallery-card-meta"><i class="fa-solid fa-location-dot"></i> KL Premises | 21/09/2026 09:10 AM</div>
          </div>
        </div>

        <div class="gallery-card">
          <img src="https://images.pexels.com/photos/5668495/pexels-photo-5668495.jpeg" alt="Opening Meeting">
          <div class="gallery-card-body">
            <div class="gallery-card-title">2. Opening Audit Briefing</div>
            <div class="gallery-card-meta"><i class="fa-solid fa-users"></i> Boardroom | 21/09/2026 09:30 AM</div>
          </div>
        </div>

        <div class="gallery-card">
          <img src="https://images.pexels.com/photos/34221993/pexels-photo-34221993.jpeg" alt="Factory Floor Inspection">
          <div class="gallery-card-body">
            <div class="gallery-card-title">3. Production Line Inspection</div>
            <div class="gallery-card-meta"><i class="fa-solid fa-industry"></i> Shop Floor 1 | 21/09/2026 11:15 AM</div>
          </div>
        </div>

        <div class="gallery-card">
          <img src="https://images.pexels.com/photos/7433847/pexels-photo-7433847.jpeg" alt="Closing Meeting">
          <div class="gallery-card-body">
            <div class="gallery-card-title">4. Audit Wrap-up & Sign-off</div>
            <div class="gallery-card-meta"><i class="fa-solid fa-pen-fancy"></i> Meeting Room | 22/09/2026 04:30 PM</div>
          </div>
        </div>
      </div>
    </div>

    <div style="margin-top:24px; display:flex; justify-content:flex-end;">
      <button class="btn-action btn-primary-action" onclick="showView('list-view')" style="width:120px; justify-content:center;">Close View</button>
    </div>
  </div>
</div>

<script>
  let currentTechStep = 14;
  let currentPrelimQuestion = 1;

  const questionTitles = {
    1: "Does your company have a transformation strategy to become a smart factory?",
    2: "Has your company assessed workforce competency for Industry 4.0?",
    3: "How mature are your production planning and inventory management processes?",
    4: "Which IT systems are currently implemented and what is their maturity level?",
    5: "What is the maturity level of your facility assets (e.g., Air Compressor, Boiler)?",
    6: "How are your manufacturing processes performed?",
    7: "What is the current level of automation on your shop floor?",
    8: "Are your machines connected via a network for data exchange?",
    9: "What type of control systems and data collection mechanism do you utilize?",
    10: "What capabilities do your control systems possess regarding problem detection?",
    11: "What is your factory's capability regarding product customization and setup times?",
    12: "What cybersecurity measures and governance policies are currently in place?",
    13: "Are there any additional operational comments or notes from company leadership?"
  };

  function showView(viewId) {
    document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
    const target = document.getElementById(viewId);
    if (target) {
      target.classList.add('active');
      window.scrollTo(0, 0);
    }
  }

  function switchTechStep(step) {
    currentTechStep = step;
    
    document.querySelectorAll('.steps-circle-container .step-circle, .steps-pagination-wrapper .step-circle').forEach(circle => {
      circle.classList.remove('active');
      if (parseInt(circle.textContent.trim()) === step) {
        circle.classList.add('active');
      }
    });

    const step14Pane = document.getElementById('tech-step-14-content');
    const questionsPane = document.getElementById('tech-step-questions-content');

    if (step === 14) {
      step14Pane.style.display = 'block';
      questionsPane.style.display = 'none';
    } else {
      step14Pane.style.display = 'none';
      questionsPane.style.display = 'block';

      document.getElementById('sa-q-number').textContent = `Q${step}`;
      document.getElementById('sa-q-text').textContent = questionTitles[step] || '';

      for (let i = 1; i <= 13; i++) {
        const container = document.getElementById(`step-${i}-nested-container`);
        if (container) container.style.display = 'none';
      }

      const activeContainer = document.getElementById(`step-${step}-nested-container`);
      if (activeContainer) activeContainer.style.display = 'block';
    }
  }

  function nextTechQuestion() {
    if (currentTechStep < 14) {
      switchTechStep(currentTechStep + 1);
    }
  }

  function prevTechQuestion() {
    if (currentTechStep > 1) {
      switchTechStep(currentTechStep - 1);
    }
  }

  function showPrelimQuestion(qNum) {
    currentPrelimQuestion = qNum;
    
    document.querySelectorAll('.prelim-nav-btn').forEach(btn => {
      btn.classList.remove('active');
      if (parseInt(btn.textContent.trim()) === qNum) {
        btn.classList.add('active');
      }
    });

    const data = prelimData[qNum];
    if (data) {
      document.getElementById('prelim-full-question').textContent = data.question;
      document.getElementById('prelim-company-ans').innerHTML = data.companyAns;
      document.getElementById('prelim-assessor-finding').innerHTML = data.assessorFinding;
      document.getElementById('prelim-remarks-label').textContent = `Q${qNum} Assessor Remarks`;
      document.getElementById('prelim-remarks-input').value = data.remarks;
    }
  }

  function switchReportTab(tabId) {
    document.querySelectorAll('.report-tab-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.report-tab-pane').forEach(pane => pane.classList.remove('active'));

    const activeBtn = Array.from(document.querySelectorAll('.report-tab-btn')).find(b => b.getAttribute('onclick').includes(tabId));
    if (activeBtn) activeBtn.classList.add('active');

    const targetPane = document.getElementById(tabId);
    if (targetPane) targetPane.classList.add('active');
  }

  document.addEventListener('DOMContentLoaded', () => {
    showPrelimQuestion(1);
  });
</script>