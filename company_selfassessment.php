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
  
  <link rel="stylesheet" href="company_selfassessment_style.css" />

  <style>
    /* Indentation and visual tree connector styles for nested levels */
    .nested-group {
      display: none; /* Hidden by default until activated */
      margin-left: 24px;
      padding-left: 16px;
      border-left: 2px dashed #cbd5e1;
      margin-top: 16px;
      transition: all 0.3s ease-in-out;
    }

    .nested-group.active {
      display: block;
    }

    .nested-group .nested-group {
      margin-left: 28px;
      padding-left: 16px;
      border-left: 2px dashed #94a3b8;
    }

    .nested-group .nested-group .nested-group {
      margin-left: 28px;
      padding-left: 16px;
      border-left: 2px dashed #64748b;
    }

    /* Upload Section Styling */
    .upload-section {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-top: 16px;
      padding: 12px 16px;
      background-color: #f8fafc;
      border: 1px dashed #cbd5e1;
      border-radius: 8px;
      width: 100%;
    }

    .upload-section label {
      font-size: 0.875rem;
      font-weight: 600;
      color: #475569;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .upload-section input[type="file"] {
      font-size: 0.85rem;
      color: #334155;
      cursor: pointer;
    }

    .upload-section input[type="file"]::file-selector-button {
      background-color: #0f172a;
      color: #ffffff;
      border: none;
      padding: 6px 12px;
      border-radius: 6px;
      font-weight: 500;
      font-size: 0.8rem;
      margin-right: 10px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .upload-section input[type="file"]::file-selector-button:hover {
      background-color: #1e293b;
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
            <a href="company_selfassessment.php" class="nav-subitem active">Self-Assessment</a>
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
          <span class="step-badge"><i class="fa-solid fa-circle-dot"></i> Step 3 of 6</span>
        </div>
        
        <div class="stepper-wrapper">
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Declaration</div>
          </div>
          <div class="step-connector completed"></div>
          
          <div class="step-item completed">
            <div class="step-number"><i class="fa-solid fa-check"></i></div>
            <div class="step-title">Company Information</div>
          </div>
          <div class="step-connector active"></div>
          
          <div class="step-item active">
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
            <div class="step-title">Register Tech Up</div>
          </div>
          <div class="step-connector"></div>
          
          <div class="step-item">
            <div class="step-number">6</div>
            <div class="step-title">Onsite Assessment</div>
          </div>
        </div>
      </section>

      <!-- SECTION 05: SELF ASSESSMENT -->
      <!-- Updated form attributes: action, method, enctype -->
      <form id="projectFlowForm" action="company_selfassessment2.php" method="POST" enctype="multipart/form-data">
        <section class="form-section">
          <div class="section-header">
            <div class="section-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            <div>
              <h2>Self Assessment</h2>
              <p>Evaluate your company's readiness and digital maturity level.</p>
            </div>
          </div>

          <!-- Live Progress Bar Card -->
          <div class="assessment-progress-card">
            <div class="progress-info">
              <span class="progress-title"><i class="fa-solid fa-chart-line"></i> Assessment Progress</span>
              <span class="progress-percentage" id="progressPercentText">20% Completed</span>
            </div>
            <div class="progress-bar-container">
              <div class="progress-bar-fill" id="progressBarFill" style="width: 20%;"></div>
            </div>
            <p class="progress-subtext">Each completed question contributes 10% toward total completion (10 Questions Total).</p>
          </div>

          <div class="form-card">
            <div class="form-card-header"></div>

              <!-- QUESTION 1 -->
              <div class="question-container" style="margin-bottom: 32px;">
                <div class="question-header">
                  <span class="q-number">Q1</span>
                  <p class="question-title">
                    Does your company have a transformation strategy to become a smart factory?
                    <i class="fa-solid fa-circle-info field-help" title="Select your current strategy status to expand details"></i>
                  </p>
                </div>

                <!-- Level 1 Option Cards -->
                <div class="interactive-option-grid">
                  <label class="option-card" onclick="handleStrategyChange('No')">
                    <input type="radio" name="smartStrategy" value="No" required>
                    <div class="option-content">
                      <span class="radio-custom"></span>
                      <span class="option-text">No</span>
                    </div>
                  </label>

                  <label class="option-card" onclick="handleStrategyChange('Yes')">
                    <input type="radio" name="smartStrategy" value="Yes" required>
                    <div class="option-content">
                      <span class="radio-custom"></span>
                      <span class="option-text">Yes</span>
                    </div>
                  </label>
                </div>

                <!-- File Upload Field -->
                <div class="upload-section">
                  <label for="file_q1"><i class="fa-solid fa-paperclip"></i> Upload Supporting Evidence (PDF, PNG, JPG):</label>
                  <input type="file" name="attachments_q1" id="file_q1" accept=".pdf,.png,.jpg,.jpeg">
                </div>

                <!-- Level 2: Nested under 'Yes' -->
                <div id="nestedLevel1" class="nested-group animate-slide">
                  <div class="nested-content">
                    <span class="nested-tag">Implementation Status</span>
                    
                    <div class="interactive-option-grid vertical">
                      <label class="option-card" onclick="handleImplementationChange('Not Implemented')">
                        <input type="radio" name="strategyImplementation" value="Not Implemented">
                        <div class="option-content">
                          <span class="radio-custom"></span>
                          <span class="option-text">The strategy has <strong>NOT</strong> yet been implemented.</span>
                        </div>
                      </label>

                      <label class="option-card" onclick="handleImplementationChange('Implemented')">
                        <input type="radio" name="strategyImplementation" value="Implemented">
                        <div class="option-content">
                          <span class="radio-custom"></span>
                          <span class="option-text">The strategy <strong>has been implemented</strong>.</span>
                        </div>
                      </label>
                    </div>

                    <!-- Level 3: Nested under 'Implemented' -->
                    <div id="nestedLevel2" class="nested-group animate-slide">
                      <div class="nested-content">
                        <span class="nested-tag">Impact & Growth</span>

                        <div class="interactive-option-grid vertical">
                          <label class="option-card" onclick="handleGrowthChange('No Growth')">
                            <input type="radio" name="strategyGrowth" value="No Growth">
                            <div class="option-content">
                              <span class="radio-custom"></span>
                              <span class="option-text">The strategy is ongoing/just completed but has <strong>not yet resulted in growth</strong>.</span>
                            </div>
                          </label>

                          <label class="option-card" onclick="handleGrowthChange('Visible Growth')">
                            <input type="radio" name="strategyGrowth" value="Visible Growth">
                            <div class="option-content">
                              <span class="radio-custom"></span>
                              <span class="option-text">The implementation has shown <strong>visible growth</strong> in the company.</span>
                            </div>
                          </label>
                        </div>

                        <!-- Level 4: Under 'Visible Growth' -->
                        <div id="nestedLevel3" class="nested-group animate-slide">
                          <div class="nested-content">
                            <span class="nested-tag">Achieved Key Performance Indicators</span>

                            <div class="checkbox-cards-grid">
                              <label class="checkbox-card">
                                <input type="checkbox" name="growthMetrics[]" value="Production output">
                                <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                                <div class="checkbox-text">
                                  <i class="fa-solid fa-chart-line metric-icon"></i>
                                  <span>Production output has improved.</span>
                                </div>
                              </label>

                              <label class="checkbox-card">
                                <input type="checkbox" name="growthMetrics[]" value="Revenue">
                                <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                                <div class="checkbox-text">
                                  <i class="fa-solid fa-sack-dollar metric-icon"></i>
                                  <span>Revenue has improved.</span>
                                </div>
                              </label>

                              <label class="checkbox-card">
                                <input type="checkbox" name="growthMetrics[]" value="COGS">
                                <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                                <div class="checkbox-text">
                                  <i class="fa-solid fa-arrow-trend-down metric-icon"></i>
                                  <span>COGS has improved (reduced).</span>
                                </div>
                              </label>
                            </div>

                            <!-- Strategy Evaluation Sub-block -->
                            <div class="evaluation-card" style="margin-top: 16px;">
                              <div class="sub-question-title">
                                <i class="fa-solid fa-award"></i> The implemented strategy has succeeded
                              </div>

                              <div class="interactive-option-grid vertical">
                                <label class="option-card">
                                  <input type="radio" name="strategyReview" value="Not Reviewed">
                                  <div class="option-content">
                                    <span class="radio-custom"></span>
                                    <span class="option-text">The progress has not been reviewed.</span>
                                  </div>
                                </label>

                                <label class="option-card">
                                  <input type="radio" name="strategyReview" value="Reviewed & Planned">
                                  <div class="option-content">
                                    <span class="radio-custom"></span>
                                    <span class="option-text">The progress is reviewed and there is continuous planning for further improvement.</span>
                                  </div>
                                </label>
                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>

                  </div>
                </div>

              </div>

            <hr style="border: 0; border-top: 1px dashed #e2e8f0; margin: 24px 0;" />

            <!-- QUESTION 2 -->
            <div class="question-container">
              <div class="question-header">
                <span class="q-number">Q2</span>
                <p class="question-title">
                  Do you assess staff competency in relation to smart technologies?
                  <i class="fa-solid fa-circle-info field-help" title="Select whether staff competencies are regularly evaluated for smart tech capabilities"></i>
                </p>
              </div>

              <!-- Q2 Primary Options -->
              <div class="interactive-option-grid">
                <label class="option-card" onclick="handleCompetencyChange('Not Assessed')">
                  <input type="radio" name="staffCompetency" value="Not Assessed" required>
                  <div class="option-content">
                    <span class="radio-custom"></span>
                    <span class="option-text">Not Connected</span>
                  </div>
                </label>

                <label class="option-card" onclick="handleCompetencyChange('Assessed')">
                  <input type="radio" name="staffCompetency" value="Assessed" required>
                  <div class="option-content">
                    <span class="radio-custom"></span>
                    <span class="option-text">Yes</span>
                  </div>
                </label>
              </div>

              <!-- Q2 Upload Section -->
              <div class="upload-section">
                <label for="file_q2"><i class="fa-solid fa-paperclip"></i> Upload Supporting Evidence (PDF, PNG, JPG):</label>
                <input type="file" name="attachments_q2" id="file_q2" accept=".pdf,.png,.jpg,.jpeg">
              </div>

              <!-- Q2 Nested Options under 'Yes' -->
              <div id="q9NestedGroup" class="nested-group animate-slide">
                <div class="nested-content">
                  
                  <!-- Method of Assessment -->
                  <span class="nested-tag"><i class="fa-solid fa-clipboard-check"></i> Method of Assessment</span>
                  <div class="checkbox-cards-grid">
                    <label class="checkbox-card">
                      <input type="checkbox" name="assessmentMethods[]" value="Self and Peer Assessment">
                      <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                      <div class="checkbox-text">
                        <i class="fa-solid fa-users metric-icon"></i>
                        <span>Self and Peer Assessment</span>
                      </div>
                    </label>

                    <label class="checkbox-card">
                      <input type="checkbox" name="assessmentMethods[]" value="Competency Gap Analysis">
                      <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                      <div class="checkbox-text">
                        <i class="fa-solid fa-chart-simple metric-icon"></i>
                        <span>Competency Gap Analysis</span>
                      </div>
                    </label>

                    <label class="checkbox-card">
                      <input type="checkbox" name="assessmentMethods[]" value="Training Needs Analysis (TNA)">
                      <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                      <div class="checkbox-text">
                        <i class="fa-solid fa-user-graduate metric-icon"></i>
                        <span>Training Needs Analysis (TNA)</span>
                      </div>
                    </label>
                  </div>

                  <!-- Competency Enhancement Plan -->
                  <div class="nested-group active" style="margin-top: 16px;">
                    <span class="nested-tag"><i class="fa-solid fa-graduation-cap"></i> Competency Enhancement Plan</span>
                    <div class="checkbox-cards-grid">
                      <label class="checkbox-card">
                        <input type="checkbox" name="enhancementPlans[]" value="Learning and Development (L&D) Plan">
                        <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                        <div class="checkbox-text">
                          <i class="fa-solid fa-book-open-reader metric-icon"></i>
                          <span>Learning and Development (L&D) Plan</span>
                        </div>
                      </label>

                      <label class="checkbox-card">
                        <input type="checkbox" name="enhancementPlans[]" value="Evaluation of Training Effectiveness">
                        <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                        <div class="checkbox-text">
                          <i class="fa-solid fa-chart-line metric-icon"></i>
                          <span>Evaluation of Training Effectiveness</span>
                        </div>
                      </label>

                      <label class="checkbox-card">
                        <input type="checkbox" name="enhancementPlans[]" value="Continual Revision of L&D">
                        <div class="checkbox-box"><i class="fa-solid fa-check"></i></div>
                        <div class="checkbox-text">
                          <i class="fa-solid fa-arrows-rotate metric-icon"></i>
                          <span>Continual Revision of L&D</span>
                        </div>
                      </label>
                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </section>

        <!-- Bottom Actions Bar -->
        <div class="form-actions-bar">
          <button type="button" class="btn btn-secondary" onclick="goToPreviousStep()"><i class="fa-solid fa-arrow-left"></i> Back</button>
          <div style="display: flex; gap: 12px;">
            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-floppy-disk"></i> Save as Draft</button>
            <button type="submit" class="btn btn-primary">Next Question <i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
      </form>

    </main>
  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }

    function goToPreviousStep() {
      window.location.href = 'company_registration.php';
    }

    /* Q1 Dynamic Handlers */
    function handleStrategyChange(val) {
      const level1 = document.getElementById('nestedLevel1');
      if (val === 'Yes') {
        level1.classList.add('active');
      } else {
        level1.classList.remove('active');
        document.getElementById('nestedLevel2').classList.remove('active');
        document.getElementById('nestedLevel3').classList.remove('active');
        resetNestedFields(['strategyImplementation', 'strategyGrowth', 'growthMetrics[]', 'strategyReview']);
      }
    }

    function handleImplementationChange(val) {
      const level2 = document.getElementById('nestedLevel2');
      if (val === 'Implemented') {
        level2.classList.add('active');
      } else {
        level2.classList.remove('active');
        document.getElementById('nestedLevel3').classList.remove('active');
        resetNestedFields(['strategyGrowth', 'growthMetrics[]', 'strategyReview']);
      }
    }

    function handleGrowthChange(val) {
      const level3 = document.getElementById('nestedLevel3');
      if (val === 'Visible Growth') {
        level3.classList.add('active');
      } else {
        level3.classList.remove('active');
        resetNestedFields(['growthMetrics[]', 'strategyReview']);
      }
    }

    /* Q2 Dynamic Handlers */
    function handleCompetencyChange(val) {
      const group = document.getElementById('q2NestedGroup');
      if (val === 'Assessed') {
        group.classList.add('active');
      } else {
        group.classList.remove('active');
        resetNestedFields(['assessmentMethods[]', 'enhancementPlans[]']);
      }
    }

    function resetNestedFields(names) {
      names.forEach(name => {
        const inputs = document.querySelectorAll(`[name="${name}"]`);
        inputs.forEach(input => {
          input.checked = false;
        });
      });
    }
  </script>
</body>
</html>
