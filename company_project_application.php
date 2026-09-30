<?php
// company_project_application.php

session_start();


// 2. Process Form Submission (POST) directly in the same file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formAction    = filter_input(INPUT_POST, 'form_action', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'submit';
    $applyInterest = filter_input(INPUT_POST, 'apply_interest', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'interested';
    $projectTrack  = filter_input(INPUT_POST, 'project_track', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
    $agreedClause  = isset($_POST['chkAgreeClause']) ? true : false;

    if ($formAction === 'save_draft') {
        // Save draft state into session
        $_SESSION['project_application_draft'] = [
            'apply_interest' => $applyInterest,
            'project_track'  => $projectTrack,
            'updated_at'     => date('Y-m-d H:i:s')
        ];
        $flashMessage = "Draft saved successfully!";
        $flashType    = "success";
    } else {
        // Full Application Confirmation
        if ($applyInterest === 'interested') {
            if (empty($projectTrack)) {
                $flashMessage = "Please select an application track before proceeding.";
                $flashType    = "error";
            } elseif (!$agreedClause) {
                $flashMessage = "You must read and agree to the declaration clauses before submitting.";
                $flashType    = "error";
            } else {
                // Save finalized application payload
                $_SESSION['project_application'] = [
                    'user_email'     => $userEmail,
                    'apply_interest' => 'interested',
                    'project_track'  => $projectTrack,
                    'agreed_terms'   => true,
                    'pdf_generated'  => true,
                    'email_sent'     => true,
                    'submitted_at'   => date('Y-m-d H:i:s')
                ];

                // Redirect based on selected track
                switch ($projectTrack) {
                    case 'stu_standard':
                        header('Location: company_stustandard.php');
                        exit();
                    case 'stu_fast_lane':
                        header('Location: company_stufastlane.php');
                        exit();
                    case 'stu_ppp':
                        header('Location: company_stuppp.php');
                        exit();
                    default:
                        $flashMessage = "Application submitted successfully! Confirmation PDF sent to " . htmlspecialchars($userEmail);
                        $flashType    = "success";
                }
            }
        } else {
            // Record non-participation decision
            $_SESSION['project_application'] = [
                'user_email'     => $userEmail,
                'apply_interest' => 'not_interested',
                'submitted_at'   => date('Y-m-d H:i:s')
            ];
            $flashMessage = "Your response ('Not Interested to apply') has been recorded.";
            $flashType    = "info";
        }
    }
}

// Prefill from draft or existing session if present
$draft = $_SESSION['project_application_draft'] ?? [];
$savedInterest = $draft['apply_interest'] ?? 'interested';
$savedTrack    = $draft['project_track'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>02 Project Flow - Smart Tech Up</title>
  
  <!-- Font Awesome Icons & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- External Stylesheets -->
  <link rel="stylesheet" href="company_selfassessment_style.css" />
  <link rel="stylesheet" href="company_project_application_style.css" />

  <style>
    .alert-banner {
      padding: 14px 18px;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.9rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
    .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
    .alert-info { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }

    .declaration-section {
      margin-top: 28px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 28px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .declaration-title-box {
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 16px;
      margin-bottom: 20px;
    }

    .declaration-title-box h3 {
      font-size: 1.15rem;
      font-weight: 700;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .interest-toggle-group {
      display: flex;
      gap: 16px;
      margin-bottom: 24px;
    }

    .interest-card {
      flex: 1;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 14px 18px;
      border: 2px solid #e2e8f0;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s ease;
      background: #f8fafc;
    }

    .interest-card:hover {
      border-color: #cbd5e1;
      background: #ffffff;
    }

    .interest-card.active {
      border-color: #2563eb;
      background: #eff6ff;
    }

    .interest-card input[type="radio"] {
      width: 18px;
      height: 18px;
      accent-color: #2563eb;
    }

    .interest-card-label {
      font-size: 0.92rem;
      font-weight: 600;
      color: #1e293b;
    }

    .notice-banner {
      background: #fffbebfb;
      border: 1px solid #fde68a;
      border-radius: 8px;
      padding: 12px 16px;
      font-size: 0.85rem;
      color: #b45309;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .clauses-container {
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      padding: 20px 24px;
      max-height: 280px;
      overflow-y: auto;
      font-size: 0.88rem;
      color: #334155;
      line-height: 1.6;
      margin-bottom: 20px;
      user-select: none; /* View-only: prevents modification */
    }

    .clauses-header-info {
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 12px;
      padding-bottom: 8px;
      border-bottom: 1px solid #e2e8f0;
    }

    .clauses-list {
      padding-left: 20px;
      margin: 0;
    }

    .clauses-list li {
      margin-bottom: 10px;
    }

    .doc-resources-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #f1f5f9;
      padding: 12px 18px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .doc-links-group {
      display: flex;
      gap: 16px;
    }

    .doc-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.82rem;
      font-weight: 600;
      color: #2563eb;
      text-decoration: none;
      transition: color 0.2s;
    }

    .doc-link:hover {
      color: #1d4ed8;
      text-decoration: underline;
    }

    .checkbox-confirm-box {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 14px;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      margin-bottom: 24px;
    }

    .checkbox-confirm-box input[type="checkbox"] {
      width: 20px;
      height: 20px;
      margin-top: 2px;
      accent-color: #2563eb;
      cursor: pointer;
    }

    .checkbox-confirm-box label {
      font-size: 0.88rem;
      font-weight: 600;
      color: #0f172a;
      cursor: pointer;
      line-height: 1.4;
    }

    .declaration-actions {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
    }

    .btn-secondary-draft {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      color: #334155;
      padding: 11px 22px;
      border-radius: 6px;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
    }

    .btn-secondary-draft:hover {
      background: #f8fafc;
      border-color: #94a3b8;
    }

    .btn-confirm-submit {
      background: #2563eb;
      border: none;
      color: #ffffff;
      padding: 11px 24px;
      border-radius: 6px;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
      box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
    }

    .btn-confirm-submit:hover:not(:disabled) {
      background: #1d4ed8;
      box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
    }

    .btn-confirm-submit:disabled {
      background: #94a3b8;
      cursor: not-allowed;
      box-shadow: none;
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
          <span class="user-name">Hi, <?php echo htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="user-role">Owner</span>
        </div>
        <i class="fa-solid fa-caret-down"></i>
      </div>
    </div>
  </header>

  <div class="app-layout">
    
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-user-card">
        <div class="sidebar-user-greeting">Welcome Back,</div>
        <div class="sidebar-user-email"><?php echo htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8'); ?></div>
        <span class="sidebar-user-badge"><i class="fa-solid fa-shield-halved"></i> Owner</span>
      </div>

      <div class="sidebar-menu">
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Dashboard</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="index.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_loanstatus.php" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> Loan Status</a>
            <a href="company_nda_agreement.php" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> NDA Agreement</a>
          </div>
        </div>

        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-folder-open"></i> 01 Application & OSFA</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="declaration.php" class="nav-subitem">Declaration</a>
            <a href="company_registration.php" class="nav-subitem">Company Information</a>
            <a href="company_selfassessment.php" class="nav-subitem">Self-Assessment</a>
            <a href="company_selfassessment_results.php" class="nav-subitem">Results & Eligibility</a>
            <a href="register_tech_up.php" class="nav-subitem">Register Smart Tech Up</a>
            <a href="onsite_assessment.php" class="nav-subitem">Onsite Assessment</a>
          </div>
        </div>

        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-diagram-project"></i> 02 Project Flow</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="company_project_application.php" class="nav-subitem active">Project Application</a>
            <a href="#" class="nav-subitem">Technical Proposal & RFP</a>
            <a href="#" class="nav-subitem">CI Selection</a>
            <a href="#" class="nav-subitem">Project Implementation</a>
            <a href="#" class="nav-subitem">Project Completion</a>
            <a href="#" class="nav-subitem">Post Project Audit</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Workspace -->
    <main class="main-content">
      
      <!-- Flow Tracker -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
          <h2><i class="fa-solid fa-route"></i> Application Process Flow</h2>
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 1 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item active">
            <div class="step-number">1</div>
            <div class="step-title">Project Application</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">2</div>
            <div class="step-title">Technical Proposal & RFP</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">3</div>
            <div class="step-title">CI Selection</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">4</div>
            <div class="step-title">Project Implementation</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">5</div>
            <div class="step-title">Project Completion</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">Post Project Audit</div>
          </div>
        </div>
      </section>

      <!-- Status Notification Flash Message -->
      <?php if (!empty($flashMessage)): ?>
        <div class="alert-banner alert-<?php echo $flashType; ?>">
          <i class="fa-solid <?php echo $flashType === 'success' ? 'fa-circle-check' : ($flashType === 'error' ? 'fa-circle-xmark' : 'fa-circle-info'); ?>"></i>
          <span><?php echo htmlspecialchars($flashMessage, ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
      <?php endif; ?>

      <!-- Track Selection Panel -->
      <section class="content-card selection-panel">
        <div class="panel-header-wrapper">
          <div>
            <h3 class="panel-title">
              <i class="fa-solid fa-sliders title-icon"></i> Select Your Application Track
            </h3>
            <p class="panel-subtitle">Review available program tracks and choose the pathway matching your organization's goals.</p>
          </div>
          <span class="track-guide-badge"><i class="fa-solid fa-circle-info"></i> Compare Tracks</span>
        </div>
        
        <!-- Form submits directly to this exact file -->
        <form id="projectApplicationForm" action="company_project_application.php" method="POST">
          <input type="hidden" name="form_action" id="formActionInput" value="submit" />

          <div class="options-grid-3col">
            
            <!-- Track 1: Standard STU -->
            <label class="track-card">
              <input type="radio" name="project_track" value="stu_standard" <?php echo $savedTrack === 'stu_standard' ? 'checked' : ''; ?> />
              <div class="card-inner">
                <div class="card-header-row">
                  <div class="track-icon-wrapper icon-blue">
                    <i class="fa-solid fa-cubes"></i>
                  </div>
                  <span class="track-tag tag-blue">Standard Route</span>
                </div>
                
                <h4 class="track-title">STU Standard</h4>
                <p class="track-desc">Standard structured roadmap following the core evaluation and implementation milestones.</p>
                
                <div class="track-stats">
                  <div class="stat-item"><i class="fa-regular fa-clock"></i> 10 - 12 Months SLA</div>
                  <div class="stat-item"><i class="fa-solid fa-layer-group"></i> Full Evaluation</div>
                </div>

                <ul class="track-perks">
                  <li><i class="fa-solid fa-check-circle"></i> Standard grant matching eligibility</li>
                  <li><i class="fa-solid fa-check-circle"></i> Comprehensive technical review</li>
                  <li><i class="fa-solid fa-check-circle"></i> Flexible CI partner selection</li>
                </ul>

                <div class="card-footer-action">
                  <span class="selection-status"><i class="fa-solid fa-circle-dot"></i> Select Track</span>
                  <span class="check-badge"><i class="fa-solid fa-check"></i></span>
                </div>
              </div>
            </label>

            <!-- Track 2: STU Fast Lane -->
            <label class="track-card highlight-card">
              <input type="radio" name="project_track" value="stu_fast_lane" <?php echo $savedTrack === 'stu_fast_lane' ? 'checked' : ''; ?> />
              <div class="card-inner">
                <div class="recommended-ribbon"><i class="fa-solid fa-star"></i> Most Popular</div>
                
                <div class="card-header-row">
                  <div class="track-icon-wrapper icon-amber">
                    <i class="fa-solid fa-bolt-lightning"></i>
                  </div>
                  <span class="track-tag tag-amber">Prioritized</span>
                </div>
                
                <h4 class="track-title">STU Fast Lane</h4>
                <p class="track-desc">Accelerated processing channel designed for high-readiness applicants with existing audit data.</p>
                
                <div class="track-stats">
                  <div class="stat-item"><i class="fa-regular fa-clock"></i> 5-8 Months SLA</div>
                  <div class="stat-item"><i class="fa-solid fa-gauge-high"></i> Fast-Tracked</div>
                </div>

                <ul class="track-perks">
                  <li><i class="fa-solid fa-check-circle"></i> Express technical vetting</li>
                  <li><i class="fa-solid fa-check-circle"></i> Priority auditor assignment</li>
                  <li><i class="fa-solid fa-check-circle"></i> Expedited grant clearance</li>
                </ul>

                <div class="card-footer-action">
                  <span class="selection-status"><i class="fa-solid fa-circle-dot"></i> Select Track</span>
                  <span class="check-badge"><i class="fa-solid fa-check"></i></span>
                </div>
              </div>
            </label>

            <!-- Track 3: STU PPP -->
            <label class="track-card">
              <input type="radio" name="project_track" value="stu_ppp" <?php echo $savedTrack === 'stu_ppp' ? 'checked' : ''; ?> />
              <div class="card-inner">
                <div class="card-header-row">
                  <div class="track-icon-wrapper icon-purple">
                    <i class="fa-solid fa-handshake-angle"></i>
                  </div>
                  <span class="track-tag tag-purple">Partnership</span>
                </div>
                
                <h4 class="track-title">STU PPP</h4>
                <p class="track-desc">Public-Private Partnership track customized for collaborative ecosystem initiatives.</p>
                
                <div class="track-stats">
                  <div class="stat-item"><i class="fa-regular fa-clock"></i> Custom SLA</div>
                  <div class="stat-item"><i class="fa-solid fa-building-user"></i> Enterprise</div>
                </div>

                <ul class="track-perks">
                  <li><i class="fa-solid fa-check-circle"></i> Co-funded development support</li>
                  <li><i class="fa-solid fa-check-circle"></i> Dedicated project manager</li>
                  <li><i class="fa-solid fa-check-circle"></i> Custom milestone tracking</li>
                </ul>

                <div class="card-footer-action">
                  <span class="selection-status"><i class="fa-solid fa-circle-dot"></i> Select Track</span>
                  <span class="check-badge"><i class="fa-solid fa-check"></i></span>
                </div>
              </div>
            </label>

          </div>

          <!-- Formal Project Declaration Container -->
          <div class="declaration-section">
            <div class="declaration-title-box">
              <h3><i class="fa-solid fa-file-signature" style="color: #2563eb;"></i> Formal Project Declaration & Intent</h3>
            </div>

            <!-- Participation Toggle -->
            <label style="font-size: 0.88rem; font-weight: 700; color: #0f172a; margin-bottom: 8px; display: block;">
              Would you be interested to apply for Project under Smart Tech Up Program?
            </label>
            
            <div class="interest-toggle-group">
              <label class="interest-card <?php echo $savedInterest === 'interested' ? 'active' : ''; ?>" id="cardInterested">
                <input type="radio" name="apply_interest" value="interested" <?php echo $savedInterest === 'interested' ? 'checked' : ''; ?> onchange="handleInterestChange(this)">
                <span class="interest-card-label">Interested to apply for Project</span>
              </label>
              
              <label class="interest-card <?php echo $savedInterest === 'not_interested' ? 'active' : ''; ?>" id="cardNotInterested">
                <input type="radio" name="apply_interest" value="not_interested" <?php echo $savedInterest === 'not_interested' ? 'checked' : ''; ?> onchange="handleInterestChange(this)">
                <span class="interest-card-label">Not interested to apply for Project</span>
              </label>
            </div>

            <div class="notice-banner">
              <i class="fa-solid fa-triangle-exclamation"></i>
              <span>Your company has <strong>10 days</strong> to apply for project. Should you fail to do so in 10 days, please be informed that SIRIM will assume that you are not interested to proceed.</span>
            </div>

            <!-- Documents & Guidelines -->
            <div class="doc-resources-bar">
              <span style="font-size: 0.85rem; font-weight: 700; color: #334155;">
                <i class="fa-solid fa-book-bookmark" style="color: #2563eb; margin-right: 6px;"></i> Reference Documents
              </span>
              <div class="doc-links-group">
                <a href="#" onclick="alert('Viewing Smart Tech Up Guidelines PDF'); return false;" class="doc-link">
                  <i class="fa-solid fa-file-pdf"></i> View Smart Tech Up Guidelines
                </a>
                <a href="#" onclick="alert('Viewing Agreement Clauses (View-Only)'); return false;" class="doc-link">
                  <i class="fa-solid fa-shield-halved"></i> View Standard Agreement Clauses (Read-Only)
                </a>
              </div>
            </div>

            <!-- View-Only Unalterable Clauses Container -->
            <div class="clauses-container">
              <div class="clauses-header-info">
                By clicking Confirm, I, on behalf of my company, hereby declare and confirm that:
              </div>
              <ol class="clauses-list">
                <li>The information provided in this application and registration, including all attachments, is true and correct to the best of my knowledge; and</li>
                <li>The company have read, understood and agreed to abide by the latest version of the Smart Tech Up Guidelines; and</li>
                <li>The company have full legal right and authority to enter into this declaration/application; and</li>
                <li>The company is conducting businesses and operations in compliance with all applicable laws, regulations and directives of governmental authorities having the force of law; and</li>
                <li>The company will give full commitment in the preparation of the proposal and will assist the project manager until the proposal is presented to the Approval Committee; and</li>
                <li>The company agrees to cover the proposal preparation cost if it decides not to proceed with the project after the proposal is developed; and</li>
                <li>The company undertakes to commit to the payment of the project cost as part of the company's commitment in the stipulated timeframe after approval of the proposal by the Approval Committee; and</li>
                <li>The company will pay the project management fee (based on project value) as part of our commitment in this program; and</li>
                <li>The company, from time to time, will assist the project leader in the delivery of the project until its completion; and</li>
                <li>The company hereby acknowledges and agrees that all information contained in the proposal paper is final. No amendments or modifications that may affect the objectives or implementation shall be permitted; and</li>
                <li>If any such representations and/or warranties above mentioned are found to have been incorrect in any material respect, SIRIM shall have the right to reject this application or terminate any agreement that has been signed between us.</li>
              </ol>
            </div>

            <!-- Terms Confirmation Checkbox -->
            <div class="checkbox-confirm-box">
              <input type="checkbox" id="chkAgreeClause" name="chkAgreeClause" onchange="toggleSubmitButton()" />
              <label for="chkAgreeClause">
                By proceeding, the company acknowledges that it has read, understood, and agreed to the unalterable terms of this declaration.
              </label>
            </div>

            <!-- Submission Actions -->
            <div class="declaration-actions">
              <button type="button" class="btn-secondary-draft" onclick="submitDraft()">
                <i class="fa-regular fa-floppy-disk"></i> Save As Draft
              </button>
              <button type="submit" id="btnConfirmSubmit" class="btn-confirm-submit" disabled>
                <i class="fa-solid fa-paper-plane"></i> Confirm & Submit Application
              </button>
            </div>
          </div>

        </form>
      </section>

    </main>

  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function handleInterestChange(radio) {
      const cardInterested = document.getElementById('cardInterested');
      const cardNotInterested = document.getElementById('cardNotInterested');
      const chkAgreeClause = document.getElementById('chkAgreeClause');

      if (radio.value === 'interested') {
        cardInterested.classList.add('active');
        cardNotInterested.classList.remove('active');
        chkAgreeClause.disabled = false;
      } else {
        cardNotInterested.classList.add('active');
        cardInterested.classList.remove('active');
        chkAgreeClause.checked = false;
        chkAgreeClause.disabled = true;
      }
      toggleSubmitButton();
    }

    function toggleSubmitButton() {
      const chkAgreeClause = document.getElementById('chkAgreeClause');
      const btnConfirmSubmit = document.getElementById('btnConfirmSubmit');
      const applyInterest = document.querySelector('input[name="apply_interest"]:checked').value;

      if (applyInterest === 'not_interested') {
        btnConfirmSubmit.disabled = false;
        btnConfirmSubmit.innerHTML = '<i class="fa-solid fa-xmark"></i> Submit Non-Participation';
      } else {
        btnConfirmSubmit.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Confirm & Submit Application';
        btnConfirmSubmit.disabled = !chkAgreeClause.checked;
      }
    }

    function submitDraft() {
      document.getElementById('formActionInput').value = 'save_draft';
      document.getElementById('projectApplicationForm').submit();
    }

    // Front-end validation before self-posting
    document.getElementById('projectApplicationForm').addEventListener('submit', function(e) {
      const formAction = document.getElementById('formActionInput').value;
      if (formAction === 'save_draft') return;

      const selectedTrack = document.querySelector('input[name="project_track"]:checked');
      const applyInterest = document.querySelector('input[name="apply_interest"]:checked').value;

      if (applyInterest === 'interested' && !selectedTrack) {
        e.preventDefault();
        alert("Please select an application track before confirming.");
      }
    });
  </script>

</body>
</html>
