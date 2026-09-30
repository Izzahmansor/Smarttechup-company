<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Company Registration - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    /* ==========================================================================
       Global Reset & Variable Design System
       ========================================================================== */
    :root {
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --primary-light: #eff6ff;
      --primary-border: #bfdbfe;
      --dark-navy: #0b132b;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --border-color: #e2e8f0;
      --bg-surface: #ffffff;
      --bg-app: #f8fafc;
      --radius-lg: 16px;
      --radius-md: 10px;
      --radius-sm: 6px;
      --shadow-sm: 0 2px 6px rgba(15, 23, 42, 0.04);
      --shadow-md: 0 4px 20px rgba(15, 23, 42, 0.06);
      --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    html, body {
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background-color: var(--bg-app);
      color: var(--text-main);
    }

    /* ==========================================================================
       1. Fixed Navigation Header
       ========================================================================== */
    .app-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      height: 64px;
      background-color: var(--dark-navy);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 28px;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    .header-left {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .header-logo {
      height: 38px;
      object-fit: contain;
    }

    .user-dropdown {
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      padding: 6px 14px;
      border-radius: var(--radius-md);
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: var(--transition);
    }

    .user-dropdown:hover {
      background-color: rgba(255, 255, 255, 0.15);
    }

    .user-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      color: #ffffff;
      box-shadow: 0 2px 6px rgba(37, 99, 235, 0.4);
    }

    .user-info {
      display: flex;
      flex-direction: column;
      font-size: 12px;
    }

    .user-name {
      font-weight: 600;
      color: #f8fafc;
    }

    .user-role {
      color: #94a3b8;
      font-size: 11px;
    }

    /* ==========================================================================
       2. Main Layout Container
       ========================================================================== */
    .app-layout {
      display: flex;
      margin-top: 64px;
      height: calc(100vh - 64px);
      width: 100%;
      overflow: hidden;
    }

    /* ==========================================================================
       3. Collapsible Sidebar
       ========================================================================== */
    .sidebar {
      width: 270px;
      background-color: var(--bg-surface);
      border-right: 1px solid var(--border-color);
      padding: 20px 16px;
      flex-shrink: 0;
      height: 100%;
      overflow-y: auto;
    }

    .sidebar-user-card {
      padding: 14px;
      border-radius: var(--radius-md);
      background: linear-gradient(135deg, #f8fafc, #f1f5f9);
      border: 1px solid var(--border-color);
      margin-bottom: 20px;
    }

    .sidebar-user-greeting {
      font-size: 11px;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .sidebar-user-email {
      font-size: 13px;
      font-weight: 700;
      color: var(--text-main);
      word-break: break-all;
      margin: 2px 0 6px;
    }

    .sidebar-user-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 11px;
      font-weight: 600;
      padding: 3px 10px;
      background-color: var(--primary-light);
      color: var(--primary);
      border-radius: 20px;
    }

    /* Accordion Menu */
    .sidebar-menu {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .accordion-item {
      border-radius: var(--radius-md);
      overflow: hidden;
    }

    .accordion-header {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 11px 14px;
      background: none;
      border: none;
      font-weight: 600;
      font-size: 13.5px;
      color: #334155;
      cursor: pointer;
      border-radius: var(--radius-md);
      transition: var(--transition);
    }

    .accordion-header:hover {
      background-color: #f1f5f9;
      color: var(--primary);
    }

    .accordion-header span i {
      margin-right: 10px;
      width: 16px;
      color: var(--text-muted);
    }

    .accordion-header:hover span i {
      color: var(--primary);
    }

    .arrow-icon {
      font-size: 11px;
      transition: transform 0.3s ease;
    }

    .accordion-item.open .arrow-icon {
      transform: rotate(180deg);
    }

    .accordion-content {
      display: none;
      flex-direction: column;
      padding-left: 14px;
      gap: 3px;
      margin-top: 4px;
    }

    .accordion-item.open .accordion-content {
      display: flex;
    }

    .nav-subitem {
      padding: 9px 12px;
      text-decoration: none;
      font-size: 13px;
      color: var(--text-muted);
      border-radius: var(--radius-sm);
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-subitem:hover {
      background-color: #f1f5f9;
      color: var(--text-main);
    }

    .nav-subitem.active {
      background-color: var(--primary-light);
      color: var(--primary);
      font-weight: 700;
    }

    /* ==========================================================================
       4. Main Workspace & Flow Tracker Card
       ========================================================================== */
    .main-content {
      flex: 1;
      padding: 24px 32px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      height: 100%;
      overflow-y: auto;
    }

    .flow-tracker-card {
      background: var(--bg-surface);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 20px 28px;
      box-shadow: var(--shadow-md);
    }

    .tracker-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .tracker-header h2 {
      font-size: 16px;
      font-weight: 800;
      color: var(--text-main);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .tracker-header h2 i {
      color: var(--primary);
    }

    .step-badge {
      font-size: 12px;
      background: var(--primary-light);
      color: var(--primary);
      padding: 5px 12px;
      border-radius: 20px;
      font-weight: 700;
      border: 1px solid var(--primary-border);
    }

    .stepper-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .step-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      flex: 1;
      position: relative;
    }

    .step-number {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #f1f5f9;
      border: 2px solid #cbd5e1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: 700;
      color: var(--text-muted);
      margin-bottom: 8px;
      transition: var(--transition);
      z-index: 2;
    }

    .step-item.completed .step-number {
      background: #10b981;
      border-color: #10b981;
      color: #ffffff;
    }

    .step-item.active .step-number {
      background: var(--primary);
      border-color: var(--primary);
      color: #ffffff;
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2);
    }

    .step-title {
      font-size: 12px;
      color: var(--text-muted);
      font-weight: 600;
    }

    .step-item.active .step-title {
      color: var(--primary);
      font-weight: 800;
    }

    .step-connector {
      flex: 1;
      height: 3px;
      background: #e2e8f0;
      margin: 0 -10px 22px;
      z-index: 1;
    }

    .step-connector.completed {
      background: #10b981;
    }

    /* ==========================================================================
       5. Form Sections & Visual Cards
       ========================================================================== */
    .form-section {
      margin-bottom: 32px;
    }

    .section-header {
      display: flex;
      align-items: flex-start;
      gap: 16px;
      margin-bottom: 20px;
    }

    .section-icon {
      width: 48px;
      height: 48px;
      min-width: 48px;
      border-radius: 14px;
      background: linear-gradient(135deg, var(--primary-light), #dbeafe);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      box-shadow: 0 2px 8px rgba(37, 99, 235, 0.12);
    }

    .section-number {
      display: block;
      font-size: 11px;
      font-weight: 800;
      color: var(--primary);
      letter-spacing: 1.2px;
      text-transform: uppercase;
      margin-bottom: 2px;
    }

    .section-header h2 {
      font-size: 21px;
      font-weight: 800;
      color: var(--text-main);
      margin-bottom: 4px;
    }

    .section-header p {
      font-size: 13.5px;
      color: var(--text-muted);
      line-height: 1.5;
    }

    .form-card {
      background: var(--bg-surface);
      border: 1px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 26px;
      margin-bottom: 20px;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
    }

    .form-card:hover {
      border-color: #cbd5e1;
    }

    .form-card-title {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 15px;
      font-weight: 800;
      color: var(--text-main);
      padding-bottom: 16px;
      margin-bottom: 22px;
      border-bottom: 1px solid #f1f5f9;
    }

    .form-card-title i {
      color: var(--primary);
      font-size: 16px;
    }

    .form-group {
      margin-bottom: 22px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-size: 13px;
      font-weight: 700;
      color: #334155;
    }

    .form-group.required label::after {
      content: " *";
      color: #ef4444;
    }

    .optional {
      font-weight: 400;
      color: #94a3b8;
    }

    .field-help {
      font-size: 11.5px;
      color: var(--text-muted);
      font-weight: 500;
      margin-left: 6px;
    }

    .field-help i {
      color: var(--primary);
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="tel"],
    input[type="url"],
    textarea,
    select,
    .text-input {
      width: 100%;
      background: #ffffff;
      border: 1.5px solid #cbd5e1;
      border-radius: var(--radius-md);
      padding: 12px 14px;
      font-size: 13.5px;
      color: var(--text-main);
      transition: var(--transition);
    }

    textarea {
      resize: vertical;
    }

    input::placeholder,
    textarea::placeholder {
      color: #a1aab8;
    }

    input:focus,
    textarea:focus,
    select:focus,
    .text-input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .input-prefix {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-prefix span {
      position: absolute;
      left: 14px;
      font-weight: 700;
      color: var(--text-muted);
      font-size: 13px;
    }

    .input-prefix input {
      padding-left: 42px;
    }

    /* Address Toggle Box */
    .address-toggle {
      background: #f8fafc;
      border: 1.5px dashed var(--border-color);
      border-radius: var(--radius-md);
      padding: 14px 18px;
      margin-bottom: 20px;
    }

    .toggle-option {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      cursor: pointer;
    }

    .toggle-text strong {
      display: block;
      font-size: 13.5px;
      color: var(--text-main);
    }

    .toggle-text small {
      font-size: 12px;
      color: var(--text-muted);
    }

    .location-notice {
      display: flex;
      gap: 14px;
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      border-radius: var(--radius-md);
      padding: 16px;
      margin-top: 20px;
    }

    .notice-icon {
      color: var(--primary);
      font-size: 18px;
      margin-top: 2px;
    }

    .location-notice strong {
      font-size: 13px;
      color: #1e40af;
      display: block;
      margin-bottom: 4px;
    }

    .location-notice p {
      font-size: 12px;
      color: #1e3a8a;
      line-height: 1.5;
    }

    /* ==========================================================================
       6. ENHANCED INDUSTRY SECTOR SELECTION (DYNAMIC INTERACTIVE CARDS)
       ========================================================================== */
    .category-selection-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 24px;
    }

    .category-card {
      position: relative;
      background: #ffffff;
      border: 2px solid var(--border-color);
      border-radius: var(--radius-lg);
      padding: 20px;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: flex-start;
      gap: 16px;
      user-select: none;
    }

    .category-card input[type="radio"] {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .category-card:hover {
      border-color: #93c5fd;
      background-color: #f8fafc;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
    }

    .category-card.selected {
      border-color: var(--primary);
      background-color: var(--primary-light);
      box-shadow: 0 4px 16px rgba(37, 99, 235, 0.12);
    }

    .category-card-icon {
      width: 44px;
      height: 44px;
      min-width: 44px;
      border-radius: 12px;
      background: #f1f5f9;
      color: var(--text-muted);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      transition: var(--transition);
    }

    .category-card.selected .category-card-icon {
      background: var(--primary);
      color: #ffffff;
    }

    .category-card-body h3 {
      font-size: 15px;
      font-weight: 800;
      color: var(--text-main);
      margin-bottom: 4px;
    }

    .category-card.selected .category-card-body h3 {
      color: var(--primary);
    }

    .category-card-body p {
      font-size: 12px;
      color: var(--text-muted);
      line-height: 1.4;
    }

    .category-check-badge {
      position: absolute;
      top: 16px;
      right: 16px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      border: 2px solid #cbd5e1;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      color: #ffffff;
      transition: var(--transition);
    }

    .category-card.selected .category-check-badge {
      background: var(--primary);
      border-color: var(--primary);
    }

    /* Dynamic Industry Sector Accordion Cards */
    .industry-section {
      display: none;
      animation: fadeInSlide 0.35s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .industry-section.active {
      display: block;
    }

    @keyframes fadeInSlide {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .sector-prompt-box {
      text-align: center;
      padding: 30px;
      border: 2px dashed var(--border-color);
      border-radius: var(--radius-lg);
      background-color: #f8fafc;
      color: var(--text-muted);
      font-size: 13.5px;
    }

    .sector-prompt-box i {
      font-size: 28px;
      color: #94a3b8;
      margin-bottom: 8px;
      display: block;
    }

    .instruction-text {
      font-size: 13px;
      font-weight: 700;
      color: #334155;
      margin-bottom: 14px;
    }

    /* Sector Checkboxes Tile Grid */
    .sector-checkbox-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 12px;
    }

    .checkbox-tile-card {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 13px 16px;
      background: #ffffff;
      border: 1.5px solid var(--border-color);
      border-radius: var(--radius-md);
      cursor: pointer;
      transition: var(--transition);
      user-select: none;
    }

    .checkbox-tile-card input[type="checkbox"] {
      width: 18px;
      height: 18px;
      margin-top: 2px;
      accent-color: var(--primary);
      cursor: pointer;
    }

    .checkbox-tile-card span {
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      line-height: 1.4;
    }

    .checkbox-tile-card:hover {
      border-color: #cbd5e1;
      background-color: #f8fafc;
    }

    .checkbox-tile-card:has(input[type="checkbox"]:checked) {
      border-color: var(--primary);
      background-color: var(--primary-light);
    }

    .checkbox-tile-card:has(input[type="checkbox"]:checked) span {
      color: var(--primary);
      font-weight: 700;
    }

    /* ==========================================================================
       7. Questionnaire & Interactive Pills
       ========================================================================== */
    .question-block {
      padding-bottom: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid #f1f5f9;
    }

    .question-block:last-child {
      border-bottom: none;
      padding-bottom: 0;
      margin-bottom: 0;
    }

    .question-label {
      font-size: 14px;
      font-weight: 700;
      color: var(--text-main);
      margin-bottom: 12px;
      display: block;
    }

    .radio-pill-group {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .radio-pill {
      position: relative;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 9px 22px;
      background-color: #f8fafc;
      border: 1.5px solid #cbd5e1;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 700;
      color: #475569;
      cursor: pointer;
      transition: var(--transition);
      user-select: none;
    }

    .radio-pill input[type="radio"] {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .radio-pill:hover {
      border-color: #94a3b8;
      background-color: #f1f5f9;
    }

    .radio-pill:has(input[type="radio"]:checked) {
      border-color: var(--primary);
      background-color: var(--primary-light);
      color: var(--primary);
      box-shadow: 0 2px 8px rgba(37, 99, 235, 0.12);
    }

    /* Production Capacity Gauge Box */
    .production-inputs-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .capacity-display-wrapper {
      margin-top: 18px;
      text-align: center;
      padding: 16px;
      background-color: #f8fafc;
      border-radius: var(--radius-md);
      border: 1.5px solid var(--border-color);
    }

    .capacity-number {
      font-size: 28px;
      font-weight: 800;
      color: var(--primary);
    }

    .capacity-number.invalid {
      color: #ef4444;
    }

    .capacity-subtitle {
      font-size: 11px;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .capacity-error {
      color: #ef4444;
      font-size: 12px;
      margin-top: 6px;
      font-weight: 700;
    }

    /* File List Preview */
    .file-item {
      font-size: 12.5px;
      color: var(--primary);
      background: var(--primary-light);
      padding: 6px 12px;
      border-radius: 6px;
      margin-top: 6px;
      display: inline-block;
      margin-right: 8px;
      font-weight: 600;
    }

    /* Conditional Field Helper */
    .conditional-field,
    .conditional-input-group {
      display: none;
    }

    .conditional-field.show,
    .conditional-input-group.show {
      display: block;
    }

    /* ==========================================================================
       8. Footer Actions & Responsiveness
       ========================================================================== */
    .button-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
      border-top: 1px solid var(--border-color);
      padding-top: 22px;
      margin-top: 22px;
    }

    .btn {
      padding: 12px 26px;
      border: none;
      border-radius: var(--radius-md);
      cursor: pointer;
      font-size: 14px;
      font-weight: 700;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-draft {
      background: #ffffff;
      color: #475569;
      border: 1.5px solid #cbd5e1;
    }

    .btn-draft:hover {
      background: #f1f5f9;
      color: var(--text-main);
    }

    .btn-next {
      background: var(--primary);
      color: #ffffff;
      margin-left: auto;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .btn-next:hover {
      background: var(--primary-hover);
      box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    @media (max-width: 850px) {
      .form-row,
      .category-selection-grid,
      .production-inputs-grid {
        grid-template-columns: 1fr;
      }

      .button-container {
        flex-direction: column;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
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
          <span class="user-name">stuuser03@yopmail.com</span>
          <span class="user-role">Owner Account</span>
        </div>
        <i class="fa-solid fa-caret-down" style="color: #94a3b8; font-size: 12px;"></i>
      </div>
    </div>
  </header>

  <div class="app-layout">
    
    <!-- Left Collapsible Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Welcome Back</div>
        <div class="sidebar-user-email">stuuser03@yopmail.com</div>
        <span class="sidebar-user-badge"><i class="fa-solid fa-shield-halved"></i> Owner</span>
      </div>

      <div class="sidebar-menu">
        <!-- Category 1: Dashboard -->
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Dashboard</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_loanstatus.php" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> Loan Status</a>
            <a href="company_nda_agreement.php" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> NDA Agreement</a>
          </div>
        </div>

        <!-- Category 2: 01 Application & OSFA -->
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-folder-open"></i> 01 Application & OSFA</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="declaration.php" class="nav-subitem">Declaration</a>
            <a href="company_registration.php" class="nav-subitem active">Company Information</a>
            <a href="company_selfassessment.php" class="nav-subitem">Self-Assessment</a>
            <a href="company_selfassessment_results.php" class="nav-subitem">Results & Eligibility</a>
            <a href="register_tech_up.php" class="nav-subitem">Register Smart Tech Up</a>
            <a href="company_onsite_assessment.php" class="nav-subitem">Onsite Assessment</a>
          </div>
        </div>

        <!-- Category 3: 02 Project Flow -->
        <div class="accordion-item">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-diagram-project"></i> 02 Project Flow</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="company_project_application.php" class="nav-subitem">Project Application</a>
            <a href="#" class="nav-subitem">Technical Proposal & RFP</a>
            <a href="#" class="nav-subitem">CI Selection</a>
            <a href="#" class="nav-subitem">Project Implementation</a>
            <a href="#" class="nav-subitem">Project Completion</a>
            <a href="#" class="nav-subitem">Post Project Audit</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      
      <!-- Stepper Flow Tracker -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
          <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 2 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Declaration</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item active">
            <div class="step-number">2</div>
            <div class="step-title">Company Info</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">3</div>
            <div class="step-title">Self-Assessment</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">4</div>
            <div class="step-title">Eligibility</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">5</div>
            <div class="step-title">Smart Tech Up</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">OSFA Onsite</div>
          </div>
        </div>
      </section>

      <form id="projectFlowForm" onsubmit="event.preventDefault(); goToNextStep();">
        
        <!-- SECTION 1: COMPANY INFORMATION -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-building"></i></div>
            <div>
              <span class="section-number">01</span>
              <h2>Company Information</h2>
              <p>Provide details about your company and official implementation location.</p>
            </div>
          </div>

          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-circle-info"></i>
              <span>Company & Location Details</span>
            </div>

            <div class="form-group">
              <label for="companyName">Company Name</label>
              <input type="text" id="companyName" name="companyName" placeholder="Enter your registered company name">
            </div>

            <div class="form-group required">
              <label for="companyAddress">Company Address</label>
              <textarea id="companyAddress" name="companyAddress" rows="3" placeholder="Enter company's registered address" required></textarea>
            </div>

            <div class="address-toggle">
              <label class="toggle-option">
                <input type="checkbox" id="differentFactoryAddress" onchange="toggleFactoryAddress()">
                <span class="toggle-text">
                  <strong>Factory address is different</strong>
                  <small>Check this box if factory operations are located elsewhere.</small>
                </span>
              </label>
            </div>

            <div class="conditional-field" id="factoryAddressGroup" style="margin-bottom: 20px;">
              <div class="form-group required">
                <label for="factoryAddress">Factory Location Address</label>
                <textarea id="factoryAddress" name="factoryAddress" rows="3" placeholder="Enter operational factory address"></textarea>
              </div>
            </div>

            <div class="location-notice">
              <div class="notice-icon"><i class="fa-solid fa-location-dot"></i></div>
              <div>
                <strong>Official OSFA Implementation Location</strong>
                <p>This location is hereby designated as the official site for OSFA implementation. Any relocation post-evaluation is strictly prohibited.</p>
              </div>
            </div>
          </div>

          <!-- Registration & Tax Card -->
          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-file-lines"></i>
              <span>Registration & Tax Information</span>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="yearEstablished">Year Of Establishment</label>
                <input type="number" id="yearEstablished" name="yearEstablished" min="1800" max="2100" placeholder="e.g. 2015">
              </div>
              <div class="form-group required">
                <label for="rocNumber">ROC Number</label>
                <input type="text" id="rocNumber" name="rocNumber" placeholder="Enter ROC number" required>
              </div>
            </div>

            <div class="form-group">
              <label for="tin">
                Tax Identification No. (TIN)
                <span class="field-help"><i class="fa-solid fa-circle-question"></i> Refer to LHDN/IRBM portal</span>
              </label>
              <input type="text" id="tin" name="tin" placeholder="Enter TIN">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="serviceTaxNo">Service Tax No. <span class="optional">(if applicable)</span></label>
                <input type="text" id="serviceTaxNo" name="serviceTaxNo" placeholder="Enter service tax number">
              </div>
              <div class="form-group">
                <label for="salesTaxNo">Sales Tax No. <span class="optional">(if applicable)</span></label>
                <input type="text" id="salesTaxNo" name="salesTaxNo" placeholder="Enter sales tax number">
              </div>
            </div>

            <div class="form-group required">
              <label for="msicCode">MSIC Code</label>
              <input type="text" id="msicCode" name="msicCode" placeholder="Enter MSIC code" required>
            </div>
          </div>
        </section>

        <!-- SECTION 2: CONTACT PERSON & DECLARATION -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-user-tie"></i></div>
            <div>
              <span class="section-number">02</span>
              <h2>Contact Person & Readiness Declarations</h2>
              <p>Provide contact details and answers regarding company structure and readiness.</p>
            </div>
          </div>

          <!-- Primary Contact -->
          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-address-card"></i>
              <span>Primary Contact Details (Primary PIC)</span>
            </div>

            <div class="form-group">
              <label for="salutation">Salutation</label>
              <select id="salutation" name="salutation">
                <option value="">Please Select</option>
                <option value="Mr">Mr.</option>
                <option value="Mrs">Mrs.</option>
                <option value="Ms">Ms.</option>
                <option value="Dr">Dr.</option>
                <option value="Prof">Prof.</option>
              </select>
            </div>

            <div class="form-group required">
              <label for="contactName">Name</label>
              <input type="text" id="contactName" name="contactName" placeholder="Enter primary PIC's full name" required>
            </div>

            <div class="form-group">
              <label for="position">Position</label>
              <input type="text" id="position" name="position" placeholder="e.g. Managing Director">
            </div>

            <div class="form-row">
              <div class="form-group required">
                <label for="mobilePhone">Mobile Phone</label>
                <input type="tel" id="mobilePhone" name="mobilePhone" placeholder="+60 12-345 6789" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@company.com">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group required">
                <label for="telephone">Telephone</label>
                <input type="tel" id="telephone" name="telephone" placeholder="Enter telephone number" required>
              </div>
              <div class="form-group">
                <label for="website">Company's Website</label>
                <input type="url" id="website" name="website" placeholder="https://www.company.com">
              </div>
            </div>

            <div class="form-group required">
              <label for="revenue">Estimated Average Annual Revenue (RM)</label>
              <div class="input-prefix">
                <span>RM</span>
                <input type="number" id="revenue" name="revenue" min="0" step="0.01" placeholder="0.00" required>
              </div>
            </div>
          </div>

          <!-- Secondary Contact -->
          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-user-plus"></i>
              <span>Additional Contact Person (Secondary PIC)</span>
            </div>

            <div class="form-group">
              <label for="addSalutation">Salutation</label>
              <select id="addSalutation" name="addSalutation">
                <option value="">Please Select</option>
                <option value="Mr">Mr.</option>
                <option value="Mrs">Mrs.</option>
                <option value="Ms">Ms.</option>
                <option value="Dr">Dr.</option>
                <option value="Prof">Prof.</option>
              </select>
            </div>

            <div class="form-group">
              <label for="addContactName">Name</label>
              <input type="text" id="addContactName" name="addContactName" placeholder="Enter secondary PIC's full name">
            </div>

            <div class="form-group">
              <label for="addPosition">Position</label>
              <input type="text" id="addPosition" name="addPosition" placeholder="e.g. Operations Manager">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="addMobilePhone">Mobile Phone</label>
                <input type="tel" id="addMobilePhone" name="addMobilePhone" placeholder="+60 12-345 6789">
              </div>
              <div class="form-group">
                <label for="addEmail">Email</label>
                <input type="email" id="addEmail" name="addEmail" placeholder="secondary.pic@company.com">
              </div>
            </div>

            <div class="form-group">
              <label for="addTelephone">Telephone</label>
              <input type="tel" id="addTelephone" name="addTelephone" placeholder="Enter telephone number">
            </div>
          </div>

          <!-- Questionnaire -->
          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-clipboard-question"></i>
              <span>Funding & Readiness Questionnaire</span>
            </div>

            <!-- Q1 -->
            <div class="question-block">
              <label class="question-label">1. Is your company part or a subsidiary of a KLSE-Listed (main board) entity? *</label>
              <div class="radio-pill-group">
                <label class="radio-pill"><input type="radio" name="klseListed" value="Yes" required> <span>Yes</span></label>
                <label class="radio-pill"><input type="radio" name="klseListed" value="No" required> <span>No</span></label>
              </div>
            </div>

            <!-- Q2 -->
            <div class="question-block">
              <label class="question-label">2. Source of funding (Company's Contribution): *</label>
              <div class="sector-checkbox-grid">
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="fundingSource[]" value="Self-funded">
                  <span>Self-funded (funding available)</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="fundingSource[]" value="Loan by 8 FI">
                  <span>Loan &rarr; by 8 Financial Institutions</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="fundingSource[]" value="Loan outside">
                  <span>Loan &rarr; outside sources</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="fundingSource[]" value="Others" id="fundingOtherCheck" onchange="toggleFundingOther()">
                  <span>Others (please specify)</span>
                </label>
              </div>
              <div class="conditional-input-group" id="fundingOtherGroup" style="margin-top: 12px;">
                <input type="text" id="fundingOtherSpecify" name="fundingOtherSpecify" class="text-input" placeholder="Specify other funding sources...">
              </div>
            </div>

            <!-- Q3 -->
            <div class="question-block">
              <label class="question-label">3. Have you identified a project? *</label>
              <div class="radio-pill-group">
                <label class="radio-pill"><input type="radio" name="identifiedProject" value="Yes" required> <span>Yes</span></label>
                <label class="radio-pill"><input type="radio" name="identifiedProject" value="No" required> <span>No</span></label>
              </div>
            </div>

            <!-- Q4 -->
            <div class="question-block">
              <label class="question-label">4. Have you conducted Readiness Assessment (RA)?</label>
              <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
                <div class="radio-pill-group">
                  <label class="radio-pill"><input type="radio" name="conductedRA" value="Yes" onchange="toggleRaRating()"> <span>Yes</span></label>
                  <label class="radio-pill"><input type="radio" name="conductedRA" value="No" onchange="toggleRaRating()"> <span>No</span></label>
                </div>
                <div id="raRatingGroup" style="display: none; flex: 1; min-width: 220px;">
                  <input type="text" id="raRating" name="raRating" class="text-input" placeholder="Enter RA Rating score...">
                </div>
              </div>
            </div>

            <!-- Q5 -->
            <div class="question-block">
              <label class="question-label">5. Have you received tech-related funding (e.g., Intervention Fund / IF)?</label>
              <div class="radio-pill-group">
                <label class="radio-pill"><input type="radio" name="receivedFunding" value="Yes" onchange="toggleFunding()"> <span>Yes</span></label>
                <label class="radio-pill"><input type="radio" name="receivedFunding" value="No" onchange="toggleFunding()"> <span>No</span></label>
              </div>
              <div class="conditional-field" id="fundingNameGroup" style="margin-top: 12px;">
                <input type="text" id="fundingName" name="fundingName" class="text-input" placeholder="Specify funding details...">
              </div>
            </div>

            <!-- Q6 -->
            <div class="question-block">
              <label class="question-label">6. Do you have a preferred CI for the project?</label>
              <div class="radio-pill-group">
                <label class="radio-pill"><input type="radio" name="hasPreferredCi" value="Yes" onchange="togglePreferredCi()"> <span>Yes</span></label>
                <label class="radio-pill"><input type="radio" name="hasPreferredCi" value="No" onchange="togglePreferredCi()"> <span>No</span></label>
              </div>

              <div class="conditional-field" id="preferredCiGroup" style="margin-top: 14px;">
                <label for="ciNameInput" style="font-size: 13px; font-weight: 700; color: #475569; display: block; margin-bottom: 6px;">Preferred CI Name</label>
                <input 
                  type="text" 
                  id="ciNameInput" 
                  name="ciName" 
                  class="text-input"
                  list="approvedCiList" 
                  placeholder="Type or select CI name..." 
                  oninput="checkCiApproval()"
                  autocomplete="off"
                >
                <datalist id="approvedCiList">
                  <option value="SIRIM Tech Venture Sdn Bhd">
                  <option value="Smart Automation Solutions Corp">
                  <option value="Apex Industrial Robotics">
                  <option value="Cybernetics Engineering Services">
                  <option value="NextGen Manufacturing Consult">
                </datalist>

                <div id="ciStatusMessage" style="margin-top: 8px; font-size: 13px; font-weight: 600;"></div>
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 3: INDUSTRY SECTOR (DYNAMIC REVEAL CARDS) -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-layer-group"></i></div>
            <div>
              <span class="section-number">03</span>
              <h2>Industry Sector Selection</h2>
              <p>Choose your primary industry category below to reveal specific sector checkboxes.</p>
            </div>
          </div>

          <div class="form-card">
            <!-- Interactive Industry Choice Cards -->
            <div class="category-selection-grid">
              <!-- Choice 1: Services -->
              <label class="category-card" id="cardServices" onclick="switchIndustryCategory('services')">
                <input type="radio" name="industryCategory" value="services">
                <div class="category-card-icon">
                  <i class="fa-solid fa-gears"></i>
                </div>
                <div class="category-card-body">
                  <h3>Manufacturing Related Services</h3>
                  <p>Inspection, testing, ICT integration, logistics, maintenance & support services.</p>
                </div>
                <div class="category-check-badge">
                  <i class="fa-solid fa-check"></i>
                </div>
              </label>

              <!-- Choice 2: Manufacturing -->
              <label class="category-card" id="cardManufacturing" onclick="switchIndustryCategory('manufacturing')">
                <input type="radio" name="industryCategory" value="manufacturing">
                <div class="category-card-icon">
                  <i class="fa-solid fa-industry"></i>
                </div>
                <div class="category-card-body">
                  <h3>Manufacturing</h3>
                  <p>Aerospace, Automotive, Chemical, E&E, Medical Devices, Rubber, Plastics, etc.</p>
                </div>
                <div class="category-check-badge">
                  <i class="fa-solid fa-check"></i>
                </div>
              </label>
            </div>

            <!-- Initial Prompt State (when neither selected) -->
            <div id="sectorPrompt" class="sector-prompt-box">
              <i class="fa-solid fa-hand-pointer"></i>
              Please click on <strong>Manufacturing</strong> or <strong>Manufacturing Related Services</strong> above to display relevant sectors.
            </div>

            <!-- Revealed Checkbox Container 1: Services -->
            <div id="servicesSection" class="industry-section">
              <p class="instruction-text"><i class="fa-solid fa-square-check" style="color: var(--primary);"></i> Select all applicable service sectors (at least 1 required):</p>
              <div class="sector-checkbox-grid">
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Inspection, testing and quality control">
                  <span>Inspection, testing & quality control of raw materials/products</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Calibration of equipment">
                  <span>Calibration of equipment</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="ICT related services">
                  <span>ICT services (system integration, CAM services)</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Industrial training services">
                  <span>Industrial training services</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Logistics services">
                  <span>Logistics services</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Electronic manufacturing services">
                  <span>Electronic manufacturing services</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Manufacturing support services">
                  <span>Manufacturing support services (castings, forgings, machining)</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Gas and radiation sterilization">
                  <span>Gas and radiation sterilization</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Maintenance and repair">
                  <span>Maintenance, repair and overhaul (MRO) of machinery</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Environmental management services">
                  <span>Environmental management & waste management consultancy</span>
                </label>
                <label class="checkbox-tile-card">
                  <input type="checkbox" name="servicesSector[]" value="Others" id="servicesOtherCheck" onchange="toggleServicesOther()">
                  <span>Others (please specify)</span>
                </label>
              </div>

              <div class="conditional-input-group" id="servicesOtherGroup" style="margin-top: 14px;">
                <label for="servicesOther" style="font-size: 13px; font-weight: 700; color: #475569;">State your service sector</label>
                <input type="text" id="servicesOther" name="servicesOther" class="text-input" placeholder="Enter custom service sector...">
              </div>
            </div>

            <!-- Revealed Checkbox Container 2: Manufacturing -->
            <div id="manufacturingSection" class="industry-section">
              <p class="instruction-text"><i class="fa-solid fa-square-check" style="color: var(--primary);"></i> Select all applicable manufacturing sectors (at least 1 required):</p>
              <div class="sector-checkbox-grid">
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Aerospace"> <span>Aerospace</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Automotive"> <span>Automotive</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Chemical"> <span>Chemical</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Digital and IOT"> <span>Digital and IoT</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Electrical and Electronics"> <span>Electrical & Electronics</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Food Processing"> <span>Food Processing</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Global Services"> <span>Global & Professional Services</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Halal"> <span>Halal Industry</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Machinery and equipment"> <span>Machinery & Equipment</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Medical Devices"> <span>Medical Devices</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Metal"> <span>Metal Industry</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Petroleum and Petrochemicals"> <span>Petroleum & Petrochemicals</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Plastic"> <span>Plastics</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Rail"> <span>Rail Technology</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Rubber-based products"> <span>Rubber-based Products</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Shipbuilding and ship repair"> <span>Shipbuilding & Marine</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Textile, Apparel and Footwear"> <span>Textile, Apparel & Footwear</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Wood, Paper and Furniture"> <span>Wood, Paper & Furniture</span></label>
                <label class="checkbox-tile-card"><input type="checkbox" name="manufacturingSector[]" value="Others" id="mfgOtherCheck" onchange="toggleMfgOther()"> <span>Others (please specify)</span></label>
              </div>

              <div class="conditional-input-group" id="mfgOtherGroup" style="margin-top: 14px;">
                <label for="mfgOther" style="font-size: 13px; font-weight: 700; color: #475569;">State your manufacturing sector</label>
                <input type="text" id="mfgOther" name="mfgOther" class="text-input" placeholder="Enter custom manufacturing sector...">
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 4: PRODUCT DETAILS -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-box-open"></i></div>
            <div>
              <span class="section-number">04</span>
              <h2>Product Details</h2>
              <p>Specify details regarding your primary product offerings.</p>
            </div>
          </div>

          <div class="form-card">
            <div class="form-card-title">
              <i class="fa-solid fa-tag"></i>
              <span>Main Product Profile</span>
            </div>

            <div class="form-group required">
              <label for="productName">Main Product Name</label>
              <input type="text" id="productName" name="productName" placeholder="Enter full product name" required>
            </div>

            <div class="form-group required">
              <label for="productDescription">Product Description</label>
              <textarea id="productDescription" name="productDescription" rows="4" placeholder="Provide a detailed description of product specification and features..." required></textarea>
            </div>
          </div>
        </section>

        <!-- SECTION 5: PRODUCTION TYPE -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-sliders"></i></div>
            <div>
              <span class="section-number">05</span>
              <h2>Production Type</h2>
              <p>Select all applicable operational production methods.</p>
            </div>
          </div>

          <div class="form-card">
            <div class="sector-checkbox-grid">
              <label class="checkbox-tile-card">
                <input type="checkbox" name="productionType[]" value="One-off production">
                <span>One-off production</span>
              </label>
              <label class="checkbox-tile-card">
                <input type="checkbox" name="productionType[]" value="Batch production">
                <span>Batch production</span>
              </label>
              <label class="checkbox-tile-card">
                <input type="checkbox" name="productionType[]" value="Mass production">
                <span>Mass production</span>
              </label>
            </div>
          </div>
        </section>

        <!-- SECTION 6: PRODUCTION FOCUS -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-chart-pie"></i></div>
            <div>
              <span class="section-number">06</span>
              <h2>Production Focus Split</h2>
              <p>Specify percentages for Make-To-Order vs Own Product Lines (Must equal 100%).</p>
            </div>
          </div>

          <div class="form-card">
            <div class="production-inputs-grid">
              <div class="form-group">
                <label for="makeToOrder">Make-To-Order (%) *</label>
                <input type="number" id="makeToOrder" name="makeToOrder" class="text-input" value="50" min="0" max="100" oninput="calculateProductionCapacity()">
              </div>
              <div class="form-group">
                <label for="ownProductLines">Own Product Lines (%) *</label>
                <input type="number" id="ownProductLines" name="ownProductLines" class="text-input" value="50" min="0" max="100" oninput="calculateProductionCapacity()">
              </div>
            </div>

            <div class="capacity-display-wrapper">
              <div class="capacity-number" id="capacityTotal">100%</div>
              <div class="capacity-subtitle">Total Production Capacity</div>
              <div class="capacity-error" id="capacityError" style="display: none;">
                <i class="fa-solid fa-circle-exclamation"></i> Total capacity must equal exactly 100%
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 7: WORKFORCE & CONNECTIVITY -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-network-wired"></i></div>
            <div>
              <span class="section-number">07</span>
              <h2>Workforce & Infrastructure</h2>
              <p>Detail your employee size and site internet readiness.</p>
            </div>
          </div>

          <div class="form-card">
            <div class="form-group">
              <label for="totalEmployees">Total Number of Employees</label>
              <input type="number" id="totalEmployees" name="totalEmployees" min="0" placeholder="e.g. 50">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="isp">Internet Service Provider (ISP)</label>
                <select id="isp" name="isp">
                  <option value="">Please Select Provider</option>
                  <option value="Maxis">Maxis</option>
                  <option value="TM">TM</option>
                  <option value="Digi">Digi</option>
                  <option value="Celcom">Celcom</option>
                  <option value="U Mobile">U Mobile</option>
                  <option value="TIME dotCom">TIME dotCom</option>
                </select>
              </div>

              <div class="form-group">
                <label for="bandwidth">Bandwidth Speed (Mbps)</label>
                <input type="number" id="bandwidth" name="bandwidth" min="0" step="0.01" placeholder="e.g. 100">
              </div>
            </div>
          </div>
        </section>

        <!-- SECTION 8: SUPPORTING DOCUMENTS -->
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-paperclip"></i></div>
            <div>
              <span class="section-number">08</span>
              <h2>Supporting Documentation</h2>
              <p>Upload official documentation to support your application.</p>
            </div>
          </div>

          <div class="form-card">
            <div class="form-group">
              <label for="documents">Upload Files <span class="optional">(SSM Certificate, Manufacturing License, etc.)</span></label>
              <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" onchange="handleFileUpload(this)">
              <div id="fileList" style="margin-top: 10px;"></div>
            </div>

            <!-- Action Buttons -->
            <div class="button-container">
              <button type="button" class="btn btn-draft" onclick="saveDraft()"><i class="fa-regular fa-floppy-disk"></i> Save Draft</button>
              <button type="submit" class="btn btn-next">Next Step <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </section>

      </form>
    </main>
  </div>

  <script>
    const APPROVED_CI_LIST = [
      "SIRIM Tech Venture Sdn Bhd",
      "Smart Automation Solutions Corp",
      "Apex Industrial Robotics",
      "Cybernetics Engineering Services",
      "NextGen Manufacturing Consult"
    ];

    function toggleAccordion(button) {
      const item = button.closest('.accordion-item');
      if (item) item.classList.toggle('open');
    }

    function toggleFactoryAddress() {
      const checkbox = document.getElementById('differentFactoryAddress');
      const factoryGroup = document.getElementById('factoryAddressGroup');
      const factoryAddress = document.getElementById('factoryAddress');

      if (checkbox.checked) {
        factoryGroup.classList.add('show');
        factoryAddress.required = true;
      } else {
        factoryGroup.classList.remove('show');
        factoryAddress.required = false;
        factoryAddress.value = '';
      }
    }

    /* Dynamic Switch for Industry Sector Category */
    function switchIndustryCategory(category) {
      const cardServices = document.getElementById('cardServices');
      const cardManufacturing = document.getElementById('cardManufacturing');
      const promptBox = document.getElementById('sectorPrompt');
      const servicesSec = document.getElementById('servicesSection');
      const mfgSec = document.getElementById('manufacturingSection');

      // Hide prompt box once selection is made
      if (promptBox) promptBox.style.display = 'none';

      if (category === 'services') {
        // Highlight active card
        cardServices.classList.add('selected');
        cardManufacturing.classList.remove('selected');
        cardServices.querySelector('input[type="radio"]').checked = true;

        // Show services checkboxes, hide manufacturing
        servicesSec.classList.add('active');
        mfgSec.classList.remove('active');
      } else if (category === 'manufacturing') {
        // Highlight active card
        cardManufacturing.classList.add('selected');
        cardServices.classList.remove('selected');
        cardManufacturing.querySelector('input[type="radio"]').checked = true;

        // Show manufacturing checkboxes, hide services
        mfgSec.classList.add('active');
        servicesSec.classList.remove('active');
      }
    }

    function toggleServicesOther() {
      const check = document.getElementById('servicesOtherCheck');
      const group = document.getElementById('servicesOtherGroup');
      const input = document.getElementById('servicesOther');

      if (check.checked) {
        group.classList.add('show');
        input.required = true;
      } else {
        group.classList.remove('show');
        input.required = false;
        input.value = '';
      }
    }

    function toggleMfgOther() {
      const check = document.getElementById('mfgOtherCheck');
      const group = document.getElementById('mfgOtherGroup');
      const input = document.getElementById('mfgOther');

      if (check.checked) {
        group.classList.add('show');
        input.required = true;
      } else {
        group.classList.remove('show');
        input.required = false;
        input.value = '';
      }
    }

    function calculateProductionCapacity() {
      const mto = parseFloat(document.getElementById('makeToOrder').value) || 0;
      const opl = parseFloat(document.getElementById('ownProductLines').value) || 0;
      const total = mto + opl;

      const totalDisplay = document.getElementById('capacityTotal');
      const errorDisplay = document.getElementById('capacityError');

      totalDisplay.textContent = total + '%';

      if (total === 100) {
        totalDisplay.classList.remove('invalid');
        errorDisplay.style.display = 'none';
        return true;
      } else {
        totalDisplay.classList.add('invalid');
        errorDisplay.style.display = 'block';
        return false;
      }
    }

    function toggleFunding() {
      const yesRadio = document.querySelector('input[name="receivedFunding"][value="Yes"]');
      const fundingGroup = document.getElementById('fundingNameGroup');
      const fundingInput = document.getElementById('fundingName');

      if (yesRadio && yesRadio.checked) {
        fundingGroup.classList.add('show');
        fundingInput.required = true;
      } else {
        fundingGroup.classList.remove('show');
        fundingInput.required = false;
        fundingInput.value = '';
      }
    }

    function toggleFundingOther() {
      const check = document.getElementById('fundingOtherCheck');
      const group = document.getElementById('fundingOtherGroup');
      const input = document.getElementById('fundingOtherSpecify');

      if (check.checked) {
        group.classList.add('show');
        input.required = true;
      } else {
        group.classList.remove('show');
        input.required = false;
        input.value = '';
      }
    }

    function toggleRaRating() {
      const yesRadio = document.querySelector('input[name="conductedRA"][value="Yes"]');
      const group = document.getElementById('raRatingGroup');
      const input = document.getElementById('raRating');

      if (yesRadio && yesRadio.checked) {
        group.style.display = 'block';
        input.required = true;
      } else {
        group.style.display = 'none';
        input.required = false;
        input.value = '';
      }
    }

    function togglePreferredCi() {
      const yesRadio = document.querySelector('input[name="hasPreferredCi"][value="Yes"]');
      const group = document.getElementById('preferredCiGroup');
      const input = document.getElementById('ciNameInput');

      if (yesRadio && yesRadio.checked) {
        group.classList.add('show');
        input.required = true;
      } else {
        group.classList.remove('show');
        input.required = false;
        input.value = '';
        document.getElementById('ciStatusMessage').innerHTML = '';
      }
    }

    function checkCiApproval() {
      const val = document.getElementById('ciNameInput').value.trim();
      const msgDiv = document.getElementById('ciStatusMessage');

      if (!val) {
        msgDiv.innerHTML = '';
        return;
      }

      const isApproved = APPROVED_CI_LIST.some(ci => ci.toLowerCase() === val.toLowerCase());

      if (isApproved) {
        msgDiv.style.color = '#10b981';
        msgDiv.innerHTML = '<i class="fa-solid fa-circle-check"></i> Your preferred CI is on the approved list.';
      } else {
        msgDiv.style.color = '#ef4444';
        msgDiv.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Your preferred CI is not yet registered on the portal.';
      }
    }

    function validateIndustry() {
      const category = document.querySelector('input[name="industryCategory"]:checked');
      if (!category) {
        alert('Please select an Industry Category (Manufacturing or Manufacturing Related Services).');
        return false;
      }

      if (category.value === 'services') {
        const checkedServices = document.querySelectorAll('input[name="servicesSector[]"]:checked');
        if (checkedServices.length === 0) {
          alert('Please select at least 1 box under Manufacturing Related Services.');
          return false;
        }
      } else if (category.value === 'manufacturing') {
        const checkedMfg = document.querySelectorAll('input[name="manufacturingSector[]"]:checked');
        if (checkedMfg.length === 0) {
          alert('Please select at least 1 box under Manufacturing.');
          return false;
        }
      }

      return true;
    }

    function handleFileUpload(input) {
      const listContainer = document.getElementById('fileList');
      listContainer.innerHTML = '';
      Array.from(input.files).forEach(file => {
        const item = document.createElement('span');
        item.className = 'file-item';
        item.innerHTML = `<i class="fa-solid fa-paperclip"></i> ${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
        listContainer.appendChild(item);
      });
    }

    function saveDraft() {
      alert('Draft saved successfully!');
    }

    function goToNextStep() {
      if (!validateIndustry()) return;
      if (!calculateProductionCapacity()) {
        alert('Production Focus capacity must total exactly 100%.');
        return;
      }
      alert('Form validated and submitted successfully! Proceeding to Step 3.');
    }

    document.addEventListener('DOMContentLoaded', function () {
      toggleFactoryAddress();
      toggleFunding();
      togglePreferredCi();
      calculateProductionCapacity();
    });
  </script>
</body>
</html>
