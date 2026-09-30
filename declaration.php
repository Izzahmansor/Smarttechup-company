<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project Flow - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="studeclaration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />
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
          <span class="user-name">Hi, stuuser03@yopmail.com</span>
          <span class="user-role">Owner</span>
        </div>
        <i class="fa-solid fa-caret-down"></i>
      </div>
    </div>
  </header>

  <div class="app-layout">
    
    <!-- Left Collapsible Accordion Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Welcome Back,</div>
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
            <a href="declaration.php" class="nav-subitem active">Declaration</a>
            <a href="company_registration.php" class="nav-subitem">Company Information</a>
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
      
      <!-- Top Dynamic Flow Tracker -->
      <section class="flow-tracker-card">
  <div class="tracker-header">
    <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
    <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 1 of 6</span>
  </div>
  
  <div class="stepper-wrapper">
    <div class="step-item active">
      <div class="step-number">1</div>
      <div class="step-title">Declaration</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">2</div>
      <div class="step-title">Company Information</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">3</div>
      <div class="step-title">Self-Assessment</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">4</div>
      <div class="step-title">Result & Eligibility</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">5</div>
      <div class="step-title">Register Smart Tech Up</div>
    </div>
    <div class="step-connector"></div>
    
    <div class="step-item">
      <div class="step-number">6</div>
      <div class="step-title">Onsite Factory Assessment</div>
    </div>
  </div>
</section>

    <!-- Main Form Card Content -->
    <main class="declaration-card">
      
      <!-- Section 1 -->
      <section class="policy-block">
        <h2 class="policy-title">DECLARATION OF DATA PRIVACY</h2>
        <p class="policy-text">
          All information provided will be treated with strict confidentiality in accordance with the SIRIM's PDPA privacy policy. Please refer the policy <a href="#" class="policy-link">HERE</a> for more information. This site also uses SSL &amp; TLS encryption to ensure the data security and protection of content and information in this website.
        </p>
        
        <hr class="section-divider" />

        <p class="policy-text">
          SIRIM Berhad is committed to protecting the privacy, confidentiality and security of personal data. Your personal data will be collected and processed for the purposes of administering and delivering the STU/SFERE programme and related activities in accordance with applicable personal data protection laws and SIRIM's Personal Data Protection Policy.
        </p>
        <p class="policy-text">
          Please also read <a href="#" class="policy-link">HERE</a> for additional declaration of data privacy under the Smart Tech Up programme.
        </p>
      </section>

      <!-- Section 2 -->
      <section class="policy-block">
        <h2 class="policy-title">SIRIM's ANTI-BRIBERY POLICY</h2>
        <p class="policy-text">
          Please read the policy <a href="#" class="policy-link">HERE</a>.
        </p>
      </section>

      <!-- Section 3 -->
      <section class="policy-block">
        <h2 class="policy-title">DECLARATION OF DATA ACCURACY</h2>
        
        <form id="declarationForm" class="declaration-form">
          <label class="checkbox-container">
            <input type="checkbox" id="check1" onchange="toggleAgreeButton()" />
            <span class="checkbox-text">
              By proceeding with this application/self-assessment, I acknowledge that I have read and understood the SIRIM Personal Data Protection Policy/Privacy Notice and understand how my personal data may be collected, processed, used, stored and disclosed for the purposes stated above.
            </span>
          </label>

          <label class="checkbox-container">
            <input type="checkbox" id="check2" onchange="toggleAgreeButton()" />
            <span class="checkbox-text">
              I confirm that the personal data and information submitted by me are accurate, complete and, to the best of my knowledge, up to date. I understand that I may exercise applicable rights in relation to my personal data, including requesting access to or correction of my personal data, subject to applicable laws, SIRIM's policies and any applicable conditions or charges. SIRIM's published policy expressly provides for access and correction requests.
            </span>
          </label>

          <div class="action-container">
            <button type="submit" id="btnAgree" class="btn-agree" disabled>I Agree</button>
          </div>
        </form>
      </section>

    </main>

  </div>

    <!-- JavaScript for Accordion Interactivity -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function toggleAgreeButton() {
      const c1 = document.getElementById('check1').checked;
      const c2 = document.getElementById('check2').checked;
      const btn = document.getElementById('btnAgree');
      
      btn.disabled = !(c1 && c2);
    }

    document.addEventListener('DOMContentLoaded', function () {
  const checkboxes = document.querySelectorAll('.decl-check');
  const agreeBtn = document.getElementById('agreeBtn');
  const declarationForm = document.getElementById('declarationForm');

  // Check state whenever a box is toggled
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
      const allChecked = Array.from(checkboxes).every(cb => cb.checked);
      agreeBtn.disabled = !allChecked;
    });
  });

  // Handle Form Submission / Navigation to Step 2
  declarationForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Option A: If loading a new page via PHP
    window.location.href = 'companyregistration.php'; 

    // Option B: If using tab switching in a single-page app (SPA)
    // showStep(2); 
  });
});
  </script>

</body>
</html>