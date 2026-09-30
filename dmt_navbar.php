<?php
// Fallback setup for page detection & accordion highlighting
if (!isset($current_page)) {
    $current_page = basename($_SERVER['PHP_SELF']);
}

// Category Page Arrays (Updated with exact file links used in navbar)
if (!isset($cat_dashboard_pages)) {
    $cat_dashboard_pages = [
        'dmt_stupage.php', 
        'dmt_companyprofile.php', 
        'dmt_osfadashboard.php', 
        'dmt_projectdashboard.php', 
        'dmt_operationaldashboard.php', 
        'dmt_kpidashboard.php', 
        'dmt_collaborator.php', 
        'dmt_reporting.php',
        // Legacy file references
        'main.php', 
        'company_profile_self_assessment.php', 
        'osfa.php', 
        'dashboard_project.php', 
        'operational_dashboard.php', 
        'kpi_dashboard.php', 
        'collaborator.php', 
        'reporting.php'
    ];
}
if (!isset($cat_smart_tech_up_pages)) {
    $cat_smart_tech_up_pages = [
        'dmt_osfa.php', 
        'assessor_osfa.php', 
        'dmt_ci.php', 
        'dmt_project.php', 
        'dmt_bidding_list.php', 
        'pm_project.php', 
        'tec_secretariat.php', 
        'approval_committee_project.php', 
        'self_assessment_simulation.php', 
        'training_provider_list.php'
    ];
}
if (!isset($cat_payment_pages)) {
    $cat_payment_pages = ['eghl_logs.php'];
}
if (!isset($cat_profile_pages)) {
    $cat_profile_pages = ['edit_sirim_profile.php'];
}
if (!isset($cat_register_pages)) {
    $cat_register_pages = [
        'register_department_section.php', 
        'register_sirim_staffs.php', 
        'registered_users_non_sirim.php', 
        'landing_page_files.php', 
        'register_dashboard_registration.php', 
        'test_dashboard.php', 
        'test_dashboard_2.php', 
        'settings_fi_requirements.php', 
        'deadline_holidays.php'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Smart Tech Up'; ?></title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="studeclaration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />

  <style>
    /* Accordion Toggle Display Styles */
    .accordion-item .accordion-content {
      display: none;
    }
    /* Accordion Display Styles */
    .accordion-content {
      display: none;
      flex-direction: column;
      width: 100%;
    }

    .accordion-item.open .accordion-content {
      display: flex; /* Displays items as flex column when open */
    }

    .accordion-header .arrow-icon {
      transition: transform 0.2s ease;
    }

    .accordion-item.open .arrow-icon {
      transform: rotate(180deg);
    }

    /* Self-Contained Dropdown Styling */
    .header-right {
      position: relative;
      display: flex;
      align-items: center;
    }

    .user-dropdown-container {
      position: relative;
      display: inline-block;
    }

    .user-dropdown-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #ffffff;
      cursor: pointer;
      padding: 6px 14px;
      border-radius: 8px;
      transition: all 0.2s ease;
    }

    .user-dropdown-btn:hover {
      background: rgba(255, 255, 255, 0.18);
    }

    .user-avatar {
      width: 32px;
      height: 32px;
      background-color: #2563eb;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 14px;
    }

    .user-info {
      display: flex;
      flex-direction: column;
      text-align: right;
    }

    .user-name {
      font-weight: 600;
      font-size: 13px;
      color: #ffffff;
      line-height: 1.2;
    }

    .user-role {
      font-size: 11px;
      color: #94a3b8;
    }

    /* Fixed Dropdown Menu Positioning & Formatting */
    .user-dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: calc(100% + 8px);
      background-color: #ffffff;
      min-width: 190px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      overflow: hidden;
      z-index: 9999;
    }

    .user-dropdown-menu.show {
      display: block;
    }

    .dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 16px;
      color: #334155 !important;
      text-decoration: none !important;
      font-size: 14px;
      font-weight: 500;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .dropdown-item i {
      font-size: 15px;
      width: 18px;
      text-align: center;
    }

    .dropdown-item:hover {
      background-color: #f1f5f9;
      color: #0f172a !important;
    }

    .dropdown-item.text-danger {
      color: #dc2626 !important;
    }

    .dropdown-item.text-danger:hover {
      background-color: #fef2f2;
      color: #b91c1c !important;
    }

    .dropdown-divider {
      height: 1px;
      background-color: #e2e8f0;
      margin: 0;
    }
    .nav-subitem {
  display: flex !important;
  align-items: center;
  gap: 10px;
  width: 100%;
  white-space: normal; /* Allows multi-line text if long */
  box-sizing: border-box;
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
      <!-- Top-Right User Profile Dropdown -->
      <div class="user-dropdown-container">
        <button type="button" class="user-dropdown-btn" onclick="toggleUserMenu(event)">
          <span class="user-avatar"><i class="fa-solid fa-user"></i></span>
          <div class="user-info">
            <span class="user-name">Hi, stusuper@yopmail.com</span>
            <span class="user-role">SIRIM DMT & Asr. & PM.</span>
          </div>
          <i class="fa-solid fa-caret-down"></i>
        </button>

        <!-- Dropdown Menu Options -->
        <div class="user-dropdown-menu" id="userDropdownMenu">
          <a href="edit_sirim_profile.php" class="dropdown-item">
            <i class="fa-solid fa-user-pen" style="color: #2563eb;"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item text-danger">
            <i class="fa-solid fa-right-from-bracket"></i> Log Out
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="app-layout">
    
    <!-- Left Collapsible Accordion Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Hi, stusuper</div>
        <div class="sidebar-user-email">stusuper@yopmail.com</div>
        <span class="sidebar-user-badge"><i class="fa-solid fa-shield-halved"></i> SIRIM DMT & Asr. & PM.</span>
      </div>

      <div class="sidebar-menu">
<!-- Homepage -->
        <a href="dmt_landingpage.php" class="nav-subitem standalone-item <?php echo ($current_page == 'dmt_landingpage.php') ? 'active' : ''; ?>" style="margin-bottom: 8px;">
          <i class="fa-solid fa-house"></i> Homepage
        </a>

        <!-- Dashboard -->
        <div class="accordion-item <?php echo in_array($current_page, $cat_dashboard_pages) ? 'open' : ''; ?>">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Dashboard</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="dmt_stupage.php" class="nav-subitem <?php echo ($current_page == 'dmt_stupage.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-house"></i> Main
            </a>
            <a href="dmt_companyprofile.php" class="nav-subitem <?php echo ($current_page == 'dmt_companyprofile.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-building"></i> Company Profile and Self Assessment
            </a>
            <a href="dmt_osfadashboard.php" class="nav-subitem <?php echo ($current_page == 'dmt_osfadashboard.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-clipboard-check"></i> OSFA
            </a>
            <a href="dmt_projectdashboard.php" class="nav-subitem <?php echo ($current_page == 'dmt_projectdashboard.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-diagram-project"></i> Project
            </a>
            <a href="dmt_operationaldashboard.php" class="nav-subitem <?php echo ($current_page == 'dmt_operationaldashboard.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-sliders"></i> Operational Dashboard
            </a>
            <a href="dmt_kpidashboard.php" class="nav-subitem <?php echo ($current_page == 'dmt_kpidashboard.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-chart-line"></i> KPI Dashboard
            </a>
            <a href="dmt_collaborator.php" class="nav-subitem <?php echo ($current_page == 'dmt_collaborator.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-users"></i> Collaborator
            </a>
            <a href="dmt_reporting.php" class="nav-subitem <?php echo ($current_page == 'dmt_reporting.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-file-invoice"></i> Reporting
            </a>
          </div>
        </div>

        <!-- Smart Tech Up -->
        <div class="accordion-item <?php echo in_array($current_page, $cat_smart_tech_up_pages) ? 'open' : ''; ?>">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-microchip"></i> Smart Tech Up</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="dmt_osfa.php" class="nav-subitem <?php echo ($current_page == 'dmt_osfa.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-folder-open"></i> 01 DMT OSFA
            </a>
            <a href="dmt_assessor_osfa.php" class="nav-subitem <?php echo ($current_page == 'assessor_osfa.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-user-check"></i> 01 Assessor OSFA
            </a>
            <a href="dmt_ci.php" class="nav-subitem <?php echo ($current_page == 'dmt_ci.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-handshake"></i> 02 DMT CI
            </a>
            <a href="dmt_stu_project.php" class="nav-subitem <?php echo ($current_page == 'dmt_project.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-bars-progress"></i> 03 DMT Project
            </a>
            <a href="dmt_bidding_list.php" class="nav-subitem <?php echo ($current_page == 'dmt_bidding_list.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-gavel"></i> 04 DMT Bidding List
            </a>
            <a href="pm_project.php" class="nav-subitem <?php echo ($current_page == 'pm_project.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-list-check"></i> 03 PM Project
            </a>
            <a href="tec_secretariat.php" class="nav-subitem <?php echo ($current_page == 'tec_secretariat.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-user-gear"></i> 05 TEC Secretariat
            </a>
            <a href="approval_committee_project.php" class="nav-subitem <?php echo ($current_page == 'approval_committee_project.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-stamp"></i> 06 Approval Committee Project
            </a>
            <a href="self_assessment_simulation.php" class="nav-subitem <?php echo ($current_page == 'self_assessment_simulation.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-vial"></i> Self-Assessment Simulation
            </a>
            <a href="training_provider_list.php" class="nav-subitem <?php echo ($current_page == 'training_provider_list.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-chalkboard-user"></i> Training Provider List
            </a>
          </div>
        </div>

        <!-- Payment -->
        <div class="accordion-item <?php echo in_array($current_page, $cat_payment_pages) ? 'open' : ''; ?>">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-credit-card"></i> Payment</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="eghl_logs.php" class="nav-subitem <?php echo ($current_page == 'eghl_logs.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-receipt"></i> eGHL Logs
            </a>
          </div>
        </div>

        <!-- Register -->
        <div class="accordion-item <?php echo in_array($current_page, $cat_register_pages) ? 'open' : ''; ?>">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-id-card"></i> Register</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="register_department_section.php" class="nav-subitem <?php echo ($current_page == 'register_department_section.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-sitemap"></i> Register Department/Section
            </a>
            <a href="register_sirim_staffs.php" class="nav-subitem <?php echo ($current_page == 'register_sirim_staffs.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-user-plus"></i> Register SIRIM Staffs
            </a>
            <a href="registered_users_non_sirim.php" class="nav-subitem <?php echo ($current_page == 'registered_users_non_sirim.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-users-gear"></i> Registered Users (non-SIRIM)
            </a>
            <a href="landing_page_files.php" class="nav-subitem <?php echo ($current_page == 'landing_page_files.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-file-code"></i> Landing Page Files
            </a>
            <a href="register_dashboard_registration.php" class="nav-subitem <?php echo ($current_page == 'register_dashboard_registration.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-chart-line"></i> Register Dashboard Registration
            </a>
            <a href="test_dashboard.php" class="nav-subitem <?php echo ($current_page == 'test_dashboard.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-vial-circle-check"></i> Test Dashboard
            </a>
            <a href="test_dashboard_2.php" class="nav-subitem <?php echo ($current_page == 'test_dashboard_2.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-vial-circle-check"></i> Test Dashboard 2
            </a>
            <a href="settings_fi_requirements.php" class="nav-subitem <?php echo ($current_page == 'settings_fi_requirements.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-sliders"></i> Settings FI Requirements
            </a>
            <a href="deadline_holidays.php" class="nav-subitem <?php echo ($current_page == 'deadline_holidays.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-calendar-xmark"></i> Deadline Holidays
            </a>
          </div>
        </div>

        <!-- Standalone Links -->
        <a href="user_view.php" class="nav-subitem standalone-item <?php echo ($current_page == 'user_view.php') ? 'active' : ''; ?>">
          <i class="fa-solid fa-eye"></i> User View
        </a>
        <a href="user_manuals.php" class="nav-subitem standalone-item <?php echo ($current_page == 'user_manuals.php') ? 'active' : ''; ?>">
          <i class="fa-solid fa-book-open"></i> User Manuals
        </a>

      </div>
    </aside>

    <script>
      function toggleAccordion(headerElement) {
        const currentItem = headerElement.closest('.accordion-item');
        const allItems = document.querySelectorAll('.accordion-item');

        // Close all other accordions
        allItems.forEach(item => {
          if (item !== currentItem) {
            item.classList.remove('open');
          }
        });

        // Toggle clicked accordion item
        currentItem.classList.toggle('open');
      }

      function toggleUserMenu(event) {
        event.stopPropagation();
        const menu = document.getElementById('userDropdownMenu');
        menu.classList.toggle('show');
      }

      document.addEventListener('click', function(event) {
        const menu = document.getElementById('userDropdownMenu');
        if (menu && menu.classList.contains('show')) {
          menu.classList.remove('show');
        }
      });
    </script>

    <!-- Main Content Workspace Begins -->
    <main class="main-content">