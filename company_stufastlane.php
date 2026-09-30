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

  <style>
    .btn-table-action {
      display: block;
      width: 100%;
      background-color: #ffffff;
      border: 1px solid #cbd5e1;
      color: #475569;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 0.78rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .btn-table-action:hover {
      background-color: #f1f5f9;
      border-color: #94a3b8;
      color: #0f172a;
    }

    .ci-row.selected-row {
      background-color: #eff6ff !important;
      border-left: 4px solid #2563eb;
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
            <a href="index.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
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
            <a href="company_ci_listing.php" class="nav-subitem active">CI Listing</a>
            <a href="company_flproject_implementation.php" class="nav-subitem">Project Implementation</a>
            <a href="company_flproject_completion.php" class="nav-subitem">Project Completion</a>
            <a href="company_flpost_project_audit.php" class="nav-subitem">Post Project Audit</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      
      <!-- Flow Tracker -->
      <section class="flow-tracker-card">
        <div class="tracker-header">
            <h2><i class="fa-solid fa-route"></i> STU Fast Lane</h2>
            <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 2 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
            <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Project Application</div>
            </div>
            <div class="step-connector completed"></div>
            
            <div class="step-item active">
            <div class="step-number">2</div>
            <div class="step-title">CI Listing</div>
            </div>
            <div class="step-connector"></div>
            
            <div class="step-item">
            <div class="step-number">3</div>
            <div class="step-title">Project Implementation</div>
            </div>
            <div class="step-connector"></div>
            
            <div class="step-item">
            <div class="step-number">4</div>
            <div class="step-title">Project Completion</div>
            </div>
            <div class="step-connector"></div>
            
            <div class="step-item">
            <div class="step-number">5</div>
            <div class="step-title">Post Project Audit</div>
            </div>
            <div class="step-connector"></div>
            
        
        </div>
        </section>

      <!-- Section: CI Listing Table -->
      <section class="form-section">
        <div class="section-header">
          <div class="section-icon"><i class="fa-solid fa-list-check"></i></div>
          <div>
            <h2>CI Listing</h2>
            <p>Select a Solution Integrator matched by AI based on OSFA assessment findings.</p>
          </div>
        </div>

        <div class="form-card" style="padding: 0; overflow-x: auto;">
          <table class="ci-listing-table" style="width: 100%; border-collapse: collapse; font-size: 0.85rem;">
            <thead>
              <tr style="border-bottom: 2px solid #e2e8f0; text-align: left; color: #64748b; background: #fafafa;">
                <th style="padding: 12px 16px;">No.</th>
                <th style="padding: 12px 16px;">CI Code</th>
                <th style="padding: 12px 16px;">MyEP Id</th>
                <th style="padding: 12px 16px;">Vendor Name,<br>Application Date</th>
                <th style="padding: 12px 16px;">Contact details</th>
                <th style="padding: 12px 16px;">Type of Entity</th>
                <th style="padding: 12px 16px;">Business Sector</th>
                <th style="padding: 12px 16px;">Pillar IR4.0</th>
                <th style="padding: 12px 16px; text-align: center;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Row 1 -->
              <tr style="border-bottom: 1px solid #f1f5f9; cursor: pointer;" onclick="selectCiRow(this, 'STU-CI-00001')" class="ci-row">
                <td style="padding: 16px;">1.</td>
                <td style="padding: 16px; font-weight: 600;">STU-CI-00001</td>
                <td style="padding: 16px;">12345</td>
                <td style="padding: 16px;">
                  <strong style="color: #1e293b;">SUNSET INNOVATIONS</strong><br>
                  <span style="color: #94a3b8; font-size: 0.8rem;">Application Date: 21/08/2026</span>
                </td>
                <td style="padding: 16px;">
                  <strong>Mr JOHN</strong><br>
                  <span style="color: #64748b;">cinnovator02@yopmail.com</span><br>
                  <span style="color: #64748b;">+6012345678</span>
                </td>
                <td style="padding: 16px;">Solution Provider</td>
                <td style="padding: 16px;">ERP</td>
                <td style="padding: 16px;">Advanced Material, Artificial Intelligence</td>
                <td style="padding: 16px; text-align: center;">
                  <button type="button" class="btn-table-action" onclick="event.stopPropagation(); showModal('info', 'SUNSET INNOVATIONS')"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                </td>
              </tr>

              <!-- Row 2 -->
              <tr style="border-bottom: 1px solid #f1f5f9; cursor: pointer;" onclick="selectCiRow(this, 'STU-CI-00002')" class="ci-row">
                <td style="padding: 16px;">2.</td>
                <td style="padding: 16px; font-weight: 600;">STU-CI-00002</td>
                <td style="padding: 16px;">123480</td>
                <td style="padding: 16px;">
                  <strong style="color: #1e293b;">TWILIGHT VENDOR SDN. BHD.</strong><br>
                  <span style="color: #94a3b8; font-size: 0.8rem;">Application Date: 21/08/2026</span>
                </td>
                <td style="padding: 16px;">
                  <strong>Mrs TWILIGHT</strong><br>
                  <span style="color: #64748b;">cinnovator01@yopmail.com</span><br>
                  <span style="color: #64748b;">123</span>
                </td>
                <td style="padding: 16px;">Training Provider, Solution Provider, Distributor, Consultant, Machine Manufacturer</td>
                <td style="padding: 16px;">ERP, MES, TRAINING</td>
                <td style="padding: 16px;">Advanced Automation, Advanced Material, Autonomous Robot, Artificial Intelligence, Cybersecurity, Simulation</td>
                <td style="padding: 16px; text-align: center;">
                  <button type="button" class="btn-table-action" onclick="event.stopPropagation(); showModal('info', 'TWILIGHT VENDOR SDN. BHD.')"><i class="fa-regular fa-file-lines"></i> Company Information</button>
                </td>
              </tr>
            </tbody>
          </table>

          <!-- Pagination Footer -->
          <div style="display: flex; justify-content: flex-end; align-items: center; gap: 12px; padding: 16px; background: #fff;">
            <button style="border: 1px solid #cbd5e1; background: #f8fafc; padding: 6px 10px; border-radius: 4px; cursor: pointer;"><i class="fa-solid fa-chevron-left"></i></button>
            <span style="font-size: 0.9rem; font-weight: 600; color: #3b82f6;">1</span>
            <button style="border: 1px solid #cbd5e1; background: #f8fafc; padding: 6px 10px; border-radius: 4px; cursor: pointer;"><i class="fa-solid fa-chevron-right"></i></button>
            <select style="border: 1px solid #cbd5e1; padding: 6px 10px; border-radius: 4px;">
              <option>15/page</option>
            </select>
          </div>
        </div>
      </section>

      <!-- Section: Risk Declaration -->
      <section id="proposalUploadSection" class="form-section" style="display: none;">
        <div class="section-header">
          <div class="section-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <div>
            <h2>Risk Declaration</h2>
            <p>Review terms and proceed with selected CI: <strong id="selectedCiNameText" style="color: #2563eb;">-</strong></p>
          </div>
        </div>

        <div class="form-card">
          <div class="form-card-title"><i class="fa-solid fa-shield-cat"></i> <span>Disclaimer & Risk Acknowledgement</span></div>
          
          <div style="background: #fffbebf8; border-left: 4px solid #f59e0b; padding: 15px; border-radius: 4px; margin-bottom: 20px;">
            <p style="color: #92400e; font-size: 0.9rem; margin: 0;">
              <strong>Terms & Conditions:</strong> By selecting this CI, the company agrees that all risks associated with project execution will be borne solely by the company.
            </p>
          </div>

          <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
              <input type="checkbox" id="riskAgreementCheck" style="margin-top: 3px;" onchange="toggleSubmitButton()">
              <span style="font-size: 0.9rem; color: #334155;">
                I declare that I have read, understood, and accept all risks, terms & conditions on behalf of the company.
              </span>
            </label>
          </div>

          <div class="wizard-nav-footer" style="margin-top: 25px;">
            <div></div>
            <button type="button" id="submitApplicationBtn" class="btn btn-next" disabled onclick="proceedToProjectProposal()">
              Proceed to Project Proposal <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </section>

    </main>

  </div>

  <!-- JavaScript for Interactivity -->
  <script>
    let selectedCiCode = null;

    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function selectCiRow(rowElement, ciCode) {
      document.querySelectorAll('.ci-row').forEach(row => row.classList.remove('selected-row'));
      rowElement.classList.add('selected-row');

      selectedCiCode = ciCode;
      
      const vendorName = rowElement.querySelector('td:nth-child(4) strong').textContent;
      document.getElementById('selectedCiNameText').textContent = vendorName;

      const uploadSection = document.getElementById('proposalUploadSection');
      uploadSection.style.display = 'block';
      uploadSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function showModal(type, companyName) {
      alert(`Opening ${type === 'info' ? 'Company Information' : 'DMT CI Screening'} for ${companyName}`);
    }

    function toggleSubmitButton() {
      const isChecked = document.getElementById('riskAgreementCheck').checked;
      document.getElementById('submitApplicationBtn').disabled = !isChecked;
    }

    function proceedToProjectProposal() {
      if (!selectedCiCode) {
        alert("Please select a Solution Integrator from the table first.");
        return;
      }
      // Redirect or load project proposal page
      window.location.href = 'project_proposal.php?ci=' + encodeURIComponent(selectedCiCode);
    }
  </script>

</body>
</html>
