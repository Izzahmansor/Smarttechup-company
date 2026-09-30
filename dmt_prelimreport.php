<?php 
  $page_title = "01 DMT OSFA - Assessor & PM Admin Panel";
  include 'dmt_navbar.php'; 
?>

<style>
  :root {
    --primary: #1e3a8a;
    --primary-light: #eff6ff;
    --primary-border: #bfdbfe;
    --primary-hover: #1d4ed8;
    
    --assessor: #881337;
    --assessor-light: #fff1f2;
    --assessor-border: #fecdd3;
    --assessor-hover: #9f1239;

    --text-main: #0f172a;
    --text-muted: #64748b;
    --text-light: #94a3b8;
    
    --bg-main: #f8fafc;
    --card-bg: #ffffff;
    --border-color: #e2e8f0;
    
    --radius-sm: 6px;
    --radius-md: 10px;
    --radius-lg: 16px;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.05);
  }

  body {
    background-color: var(--bg-main);
    color: var(--text-main);
  }

  .prelim-wrapper {
    max-width: 1280px;
    margin: 0 auto;
    padding: 24px 16px;
  }

  .back-btn-link {
    cursor: pointer;
    text-decoration: none;
    color: var(--text-muted);
    font-weight: 600;
    font-size: 13px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    transition: color 0.2s ease;
  }

  .back-btn-link:hover {
    color: var(--primary);
  }

  /* PRELIMINARY FINDINGS CARD HEADER */
  .preview-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 32px;
    box-shadow: var(--shadow-md);
  }

  .prelim-page-header {
    text-align: center;
    margin-bottom: 28px;
  }

  .prelim-page-header h2 {
    color: var(--text-main);
    font-size: 26px;
    font-weight: 800;
    letter-spacing: -0.02em;
    margin-bottom: 12px;
  }

  .prelim-meta-tags {
    display: flex;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
  }

  .meta-pill {
    background: #f1f5f9;
    border: 1px solid var(--border-color);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-muted);
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .meta-pill strong {
    color: var(--text-main);
  }

  /* STEP NAVIGATION */
  .prelim-navigation {
    display: flex;
    justify-content: center;
    gap: 6px;
    flex-wrap: wrap;
    margin: 24px 0 32px 0;
    padding: 8px;
    background: #f1f5f9;
    border-radius: 12px;
  }

  .prelim-nav-btn {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    border: 1px solid transparent;
    background: transparent;
    color: var(--text-muted);
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    transition: all 0.2s ease;
  }

  .prelim-nav-btn:hover {
    background: #ffffff;
    color: var(--text-main);
    border-color: var(--border-color);
  }

  .prelim-nav-btn.active {
    background: #ffffff;
    color: var(--primary);
    border-color: var(--border-color);
    box-shadow: var(--shadow-sm);
  }

  /* SIDE-BY-SIDE PANELS */
  .prelim-comparison {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
  }

  @media (max-width: 900px) {
    .prelim-comparison {
      grid-template-columns: 1fr;
    }
  }

  .prelim-panel {
    border: 1px solid var(--border-color);
    background: #ffffff;
    border-radius: var(--radius-md);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: var(--shadow-sm);
  }

  .prelim-panel-header {
    padding: 12px 20px;
    font-size: 13px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid var(--border-color);
  }

  .prelim-panel-header.company-side {
    background: var(--primary-light);
    color: var(--primary);
    border-bottom-color: var(--primary-border);
  }

  .prelim-panel-header.assessor-side {
    background: var(--assessor-light);
    color: var(--assessor);
    border-bottom-color: var(--assessor-border);
  }

  .prelim-panel-body {
    padding: 24px;
    flex-grow: 1;
  }

  /* FORM & QUESTIONNAIRE STYLING */
  .qa-block {
    font-size: 13px;
    line-height: 1.6;
  }

  .qa-title {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 20px;
    color: var(--text-main);
    line-height: 1.4;
  }

  .qa-group {
    margin-bottom: 16px;
  }

  .qa-subhead {
    font-weight: 700;
    font-size: 13px;
    margin: 16px 0 10px 0;
    padding-bottom: 4px;
    border-bottom: 1px dashed var(--border-color);
  }

  .company-side .qa-subhead { color: var(--primary); }
  .assessor-side .qa-subhead { color: var(--assessor); }

  .qa-option {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 6px 10px;
    border-radius: var(--radius-sm);
    margin-bottom: 4px;
    color: var(--text-light);
    transition: background 0.15s ease, color 0.15s ease;
  }

  .qa-option.selected {
    font-weight: 600;
  }

  .company-side .qa-option.selected {
    color: var(--primary);
    background: var(--primary-light);
  }

  .assessor-side .qa-option.selected {
    color: var(--assessor);
    background: var(--assessor-light);
  }

  /* CONTROLS (RADIO & CHECKBOX) */
  .qa-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    height: 16px;
    margin-top: 2px;
    flex-shrink: 0;
  }

  .radio-circle {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    border: 2px solid #cbd5e1;
    box-sizing: border-box;
    transition: all 0.2s;
  }

  .qa-option.selected .radio-circle {
    border-width: 5px;
  }

  .company-side .qa-option.selected .radio-circle { border-color: var(--primary); }
  .assessor-side .qa-option.selected .radio-circle { border-color: var(--assessor); }

  .checkbox-square {
    width: 15px;
    height: 15px;
    border-radius: 4px;
    border: 1.5px solid #cbd5e1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    transition: all 0.2s;
  }

  .company-side .qa-option.selected .checkbox-square {
    background: var(--primary);
    border-color: var(--primary);
    color: #ffffff;
  }

  .assessor-side .qa-option.selected .checkbox-square {
    background: var(--assessor);
    border-color: var(--assessor);
    color: #ffffff;
  }

  /* INDENTATION LEVELS */
  .indent-level-1 { margin-left: 16px; }
  .indent-level-2 { margin-left: 32px; }
  .indent-level-3 { margin-left: 48px; }
  .indent-level-4 { margin-left: 64px; }

  /* REMARKS & ATTACHMENTS */
  .prelim-remarks {
    margin-top: 28px;
    background: #f8fafc;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-md);
    padding: 18px;
  }

  .prelim-remarks label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: var(--text-main);
    text-transform: uppercase;
    letter-spacing: 0.04em;
    margin-bottom: 8px;
  }

  .remarks-textarea {
    width: 100%;
    min-height: 80px;
    padding: 12px;
    background: #ffffff;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-sm);
    font-size: 13px;
    color: var(--text-main);
    box-sizing: border-box;
    resize: vertical;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .remarks-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px var(--primary-light);
  }

  .prelim-attachment {
    margin-top: 20px;
    border: 1px dashed var(--border-color);
    border-radius: var(--radius-sm);
    padding: 12px 16px;
    background: #fafafa;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .prelim-attachment a {
    text-decoration: none;
    color: var(--primary);
    font-weight: 600;
  }

  .prelim-attachment a:hover {
    text-decoration: underline;
  }

  /* MATRIX TABLES */
  .qa-matrix-legend {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    background: #f8fafc;
    padding: 10px 14px;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-sm);
    margin-bottom: 16px;
    font-size: 11px;
  }

  .qa-matrix-legend-item {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .qa-matrix-badge {
    background: var(--primary);
    color: #ffffff;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 700;
  }

  .assessor-side .qa-matrix-badge {
    background: var(--assessor);
  }

  .qa-matrix-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 12px;
    margin-top: 10px;
    border: 1px solid var(--border-color);
    border-radius: var(--radius-sm);
    overflow: hidden;
  }

  .qa-matrix-table th, 
  .qa-matrix-table td {
    border-bottom: 1px solid var(--border-color);
    border-right: 1px solid var(--border-color);
    padding: 8px 10px;
    vertical-align: middle;
  }

  .qa-matrix-table th:last-child,
  .qa-matrix-table td:last-child {
    border-right: none;
  }

  .qa-matrix-table tr:last-child td {
    border-bottom: none;
  }

  .qa-matrix-table th {
    background: #f8fafc;
    font-weight: 700;
    color: var(--text-main);
    font-size: 11px;
  }

  .qa-matrix-table th.center-col, 
  .qa-matrix-table td.center-col {
    text-align: center;
    width: 36px;
  }

  .qa-matrix-system-header {
    background: #f1f5f9;
    font-weight: 700;
  }

  .qa-matrix-subhead-row {
    background: #f8fafc;
    font-weight: 700;
    font-size: 12px;
    padding: 10px;
  }

  .company-side .qa-matrix-subhead-row { color: var(--primary); }
  .assessor-side .qa-matrix-subhead-row { color: var(--assessor); }

  .qa-matrix-sublabel {
    font-size: 11px;
    color: var(--text-muted);
    padding-left: 16px;
  }

  .qa-matrix-proof-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    color: var(--primary);
    background: var(--primary-light);
    border: 1px dashed var(--primary-border);
    padding: 4px 8px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 600;
  }

  /* BUTTONS */
  .action-bar {
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .btn-action {
    background: #ffffff;
    border: 1px solid var(--border-color);
    padding: 10px 18px;
    border-radius: var(--radius-sm);
    font-size: 13px;
    font-weight: 600;
    color: var(--text-main);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
  }

  .btn-action:hover {
    background: #f8fafc;
    border-color: var(--text-light);
  }

  .btn-action.btn-primary-action {
    background: var(--primary);
    color: #ffffff;
    border-color: var(--primary);
  }

  .btn-action.btn-primary-action:hover {
    background: var(--primary-hover);
    border-color: var(--primary-hover);
  }
</style>

<!-- VIEW 5: PRELIMINARY REPORT VIEW -->
<div id="prelim-view" class="view-section active">
  <div class="view-header-bar">
    <a onclick="showView('list-view')" class="back-btn-link">
      <i class="fa-solid fa-arrow-left"></i> Back to DMT OSFA
    </a>
  </div>

  <div class="preview-card" style="background:#fff; border:1px solid var(--border-color); border-radius:var(--radius); padding:24px;">
    <div class="prelim-page-header">
      <h2>PRELIMINARY FINDINGS</h2>
      <div class="prelim-subtitle">COMPANY NAME : AURA 1 COMPANY</div>
      <div class="prelim-subtitle">LEAD ASSESSOR : ASSESSOR 1</div>
    </div>

    <!-- 13 Step Question Selector Navigation -->
    <div class="prelim-navigation">
      <?php for ($i = 1; $i <= 13; $i++): ?>
        <button class="prelim-nav-btn <?= $i === 1 ? 'active' : '' ?>" onclick="showPrelimQuestion(<?= $i ?>)"><?= $i ?></button>
      <?php endfor; ?>
    </div>

    <div id="prelim-pages-container">
      <div class="prelim-question-page" id="prelim-q-container">
        
        <div class="prelim-comparison">
          <!-- Left Panel: Self-Assessment Submitted Answer -->
          <div class="prelim-panel">
            <div class="prelim-panel-header company-side">
              <i class="fa-solid fa-building-user"></i> Company's Answers
            </div>
            <div class="prelim-panel-body company-side">
              <div class="qa-block" id="prelim-company-ans">
                <!-- Dynamically Populated Form Layout -->
              </div>
              <div class="prelim-attachment" id="prelim-attachment-box">
                <i class="fa-solid fa-paperclip"></i> <a href="#" id="prelim-attachment-link">Uploaded Evidence Document.pdf</a>
              </div>
            </div>
          </div>

          <!-- Right Panel: Onsite Assessor Verification & Findings -->
          <div class="prelim-panel">
            <div class="prelim-panel-header assessor-side">
              <i class="fa-solid fa-clipboard-check"></i> Assessor's Onsite Findings
            </div>
            <div class="prelim-panel-body assessor-side">
              <div class="qa-block" id="prelim-assessor-finding">
                <!-- Dynamically Populated Form Layout -->
              </div>
            </div>
          </div>
        </div>

        <!-- Remarks Section -->
        <div class="prelim-remarks">
          <label id="prelim-remarks-label">Q1 Assessor Remarks</label>
          <textarea class="remarks-textarea" id="prelim-remarks-input" placeholder="Enter specific assessor remarks for this question..."></textarea>
        </div>
      </div>
    </div>

    <!-- AFTER -->
    <div style="margin-top:24px; display:flex; justify-content:space-between;">
    <button class="btn-action" onclick="showView('list-view')" style="width:120px; justify-content:center;">Back to List</button>
    <button class="btn-action btn-primary-action" onclick="window.location.href='dmt_previewreport.php';" style="width:140px; justify-content:center;">Preview Report</button>
    </div>
  </div>
</div>

<script>
  let currentPrelimQuestion = 1;

  // Render Helper Function to generate radio / checkbox HTML structures
  function renderQAOption(type, label, selected = false, indentLevel = 0) {
    const indentClass = indentLevel > 0 ? `indent-level-${indentLevel}` : '';
    let iconHtml = '';
    
    if (type === 'radio') {
      iconHtml = `<span class="qa-icon"><span class="radio-circle"></span></span>`;
    } else if (type === 'checkbox') {
      iconHtml = `<span class="qa-icon"><span class="checkbox-square">${selected ? '<i class="fa-solid fa-check"></i>' : ''}</span></span>`;
    }

    return `
      <div class="qa-option ${selected ? 'selected' : ''} ${indentClass}">
        ${iconHtml}
        <span>${label}</span>
      </div>
    `;
  }

  // Render Helper Function to generate Matrix Question tables (Q5, Q6)
  function renderMatrixQA(dataObj, items) {
    let html = '';

    // Render Scale Legend
    if (dataObj.scales && dataObj.scales.length) {
      html += `<div class="qa-matrix-legend">`;
      dataObj.scales.forEach((scale, idx) => {
        html += `<div class="qa-matrix-legend-item"><span class="qa-matrix-badge">${idx + 1}</span> <span>${scale}</span></div>`;
      });
      html += `</div>`;
    }

    // Render Table Header
    html += `<table class="qa-matrix-table">`;
    html += `<thead><tr>`;
    html += `<th>${dataObj.headerLabel || 'System / Asset'}</th>`;
    for (let i = 1; i <= 5; i++) {
      html += `<th class="center-col">${i}</th>`;
    }
    html += `</tr></thead><tbody>`;

    // Render Table Body
    items.forEach(item => {
      if (item.type === 'subhead') {
        html += `<tr><td colspan="6" class="qa-matrix-subhead-row">${item.label}</td></tr>`;
      } else if (item.name) {
        if (item.selected) {
          html += `<tr class="qa-matrix-system-header">`;
          html += `<td colspan="6">`;
          html += `<div><strong>${item.name}</strong></div>`;
          if (item.proof) {
            html += `<div style="margin-top: 4px;"><a href="#" class="qa-matrix-proof-btn"><i class="fa-solid fa-paperclip"></i> ${item.proof}</a></div>`;
          }
          html += `</td></tr>`;

          if (item.categories && item.categories.length) {
            item.categories.forEach(cat => {
              html += `<tr>`;
              html += `<td class="qa-matrix-sublabel">${cat.label}</td>`;
              for (let i = 1; i <= 5; i++) {
                const isSelected = (cat.val === i);
                html += `<td class="center-col">`;
                html += `<div class="qa-option ${isSelected ? 'selected' : ''}" style="justify-content:center; margin-bottom:0;">`;
                html += `<span class="qa-icon"><span class="radio-circle"></span></span>`;
                html += `</div>`;
                html += `</td>`;
              }
              html += `</tr>`;
            });
          }
        } else {
          html += `<tr class="qa-matrix-system-header" style="opacity: 0.6;">`;
          html += `<td colspan="6">${item.name} <span style="font-weight:normal; font-size:11px; color:#94a3b8;">(Not Selected)</span></td>`;
          html += `</tr>`;
        }
      }
    });

    html += `</tbody></table>`;
    return html;
  }

  // Structured dataset mapping structured forms to company answers and assessor findings
  const prelimData = {
    1: {
      title: "Question 1: Does your company have a transformation strategy to become a smart factory? <i class='fa-solid fa-circle-info' style='font-size:12px;'></i>",
      attachment: "Q1_Transformation_Strategy_Doc.pdf",
      company: [
        { type: 'radio', label: 'No', selected: false },
        { type: 'radio', label: 'Yes', selected: true },
        { type: 'radio', label: 'The strategy has NOT yet been implemented.', selected: false, indent: 1 },
        { type: 'radio', label: 'The strategy has been implemented.', selected: true, indent: 1 },
        { type: 'radio', label: 'The strategy is ongoing/just completed but has not yet resulted in any growth for the company.', selected: false, indent: 2 },
        { type: 'radio', label: 'The implementation has shown visible growth in the company.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Production output has improved.', selected: true, indent: 3 },
        { type: 'checkbox', label: 'Revenue has improved.', selected: true, indent: 3 },
        { type: 'checkbox', label: 'COGS has improved (reduced).', selected: true, indent: 3 },
        { type: 'subhead', label: 'The implemented strategy has succeeded', indent: 4 },
        { type: 'radio', label: 'The progress has not been reviewed.', selected: false, indent: 4 },
        { type: 'radio', label: 'The progress is reviewed and there is continuous planning for further improvement.', selected: true, indent: 4 }
      ],
      assessor: [
        { type: 'radio', label: 'No', selected: false },
        { type: 'radio', label: 'Yes', selected: true },
        { type: 'radio', label: 'The strategy has NOT yet been implemented.', selected: false, indent: 1 },
        { type: 'radio', label: 'The strategy has been implemented.', selected: true, indent: 1 },
        { type: 'radio', label: 'The strategy is ongoing/just completed but has not yet resulted in any growth for the company.', selected: false, indent: 2 },
        { type: 'radio', label: 'The implementation has shown visible growth in the company.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Production output has improved.', selected: true, indent: 3 },
        { type: 'checkbox', label: 'Revenue has improved.', selected: true, indent: 3 },
        { type: 'checkbox', label: 'COGS has improved (reduced).', selected: true, indent: 3 },
        { type: 'subhead', label: 'The implemented strategy has succeeded', indent: 4 },
        { type: 'radio', label: 'The progress has not been reviewed.', selected: false, indent: 4 },
        { type: 'radio', label: 'The progress is reviewed and there is continuous planning for further improvement.', selected: true, indent: 4 },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Verified against strategy documentation and KPI tracking reports."
    },
    2: {
      title: "Question 2: Why is the transformation strategy not developed?",
      attachment: null,
      company: [
        { type: 'radio', label: 'The top management is unfamiliar with the technology trend', selected: true },
        { type: 'radio', label: 'The top management understand the technology trend but still adopt a wait-and-see approach to see the success among their peers', selected: false }
      ],
      assessor: [
        { type: 'radio', label: 'The top management is unfamiliar with the technology trend', selected: false },
        { type: 'radio', label: 'The top management understand the technology trend but still adopt a wait-and-see approach to see the success among their peers', selected: true },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Management requires further exposure and structured training on Industry 4.0 trends."
    },
    3: {
      title: "Question 3: Do you assess staff competency in relation to smart technologies?",
      attachment: "Staff_Competency_Framework.pdf",
      company: [
        { type: 'radio', label: 'Not Assessed', selected: false },
        { type: 'radio', label: 'Assessed', selected: true },
        { type: 'subhead', label: 'Method of Assessment', indent: 1 },
        { type: 'checkbox', label: 'Self and Peer Assessment', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Competency Gap Analysis', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Training Needs Analysis (TNA)', selected: true, indent: 1 },
        { type: 'subhead', label: 'Competency Enhancement Plan', indent: 1 },
        { type: 'checkbox', label: 'Learning and Development (L&D) Plan', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Evaluation of Training Effectiveness', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Continual Revision of L&D', selected: true, indent: 1 }
      ],
      assessor: [
        { type: 'radio', label: 'Not Assessed', selected: false },
        { type: 'radio', label: 'Assessed', selected: true },
        { type: 'subhead', label: 'Method of Assessment', indent: 1 },
        { type: 'checkbox', label: 'Self and Peer Assessment', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Competency Gap Analysis', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Training Needs Analysis (TNA)', selected: true, indent: 1 },
        { type: 'subhead', label: 'Competency Enhancement Plan', indent: 1 },
        { type: 'checkbox', label: 'Learning and Development (L&D) Plan', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Evaluation of Training Effectiveness', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Continual Revision of L&D', selected: true, indent: 1 },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Full alignment between self-assessment and physical records."
    },
    4: {
      title: "Question 4: How do you manage (i.e. information dissemination, task delegation, data recording, status updating etc.) the following operational aspects?",
      attachment: "Operations_SOP.pdf",
      company: [
        { type: 'subhead', label: 'A. Production planning and scheduling (e.g. production order, job order or manufacturing order, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Fully autonomous, using advanced AI and machine learning for optimization and management', selected: false, indent: 2 },
        { type: 'subhead', label: 'B. Inventory Management (e.g. raw material, work-in-progress (WIP) and finished goods (FG))', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Fully autonomous, using advanced AI and machine learning for optimization and management', selected: false, indent: 2 },
        { type: 'subhead', label: 'C. Quality control and assurance (e.g. data for good parts, rejected parts, waste, quality assurance testing, inspection results, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Fully autonomous, using advanced AI and machine learning for optimization and management', selected: false, indent: 2 },
        { type: 'subhead', label: 'D. Plant Maintenance (e.g. equipment logbook, preventive maintenance schedule, breakdown logs, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Fully autonomous, using advanced AI and machine learning for optimization and management', selected: false, indent: 2 },
        { type: 'subhead', label: 'E. Supply chain management (e.g. communication with suppliers, sub-contractors, customers, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 }
      ],
      assessor: [
        { type: 'subhead', label: 'A. Production planning and scheduling (e.g. production order, job order or manufacturing order, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 },
        { type: 'subhead', label: 'B. Inventory Management (e.g. raw material, work-in-progress (WIP) and finished goods (FG))', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 },
        { type: 'subhead', label: 'C. Quality control and assurance (e.g. data for good parts, rejected parts, waste, quality assurance testing, inspection results, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 },
        { type: 'subhead', label: 'D. Plant Maintenance (e.g. equipment logbook, preventive maintenance schedule, breakdown logs, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 },
        { type: 'subhead', label: 'E. Supply chain management (e.g. communication with suppliers, sub-contractors, customers, etc.)', indent: 1 },
        { type: 'radio', label: 'Managed manually using paper forms', selected: false, indent: 2 },
        { type: 'radio', label: 'Use simple/basic digital tools or spreadsheets for certain processes, involving signification manual work', selected: false, indent: 2 },
        { type: 'radio', label: 'Integrated software system that help manage and coordinate these processes.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most processes are automated, with real-time data tracking and minimal manual intervention.', selected: false, indent: 2 },
        { type: 'radio', label: 'Most process are automated, with real-time data tracking and minimal manual intervention', selected: false, indent: 2 },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Full alignment between self-assessment and physical records."
    },
    5: {
      type: 'matrix',
      headerLabel: "Available IT Systems",
      title: "Question 5: From the following IT systems, select all that are available in your company, evaluate their maturity scale (1 to 5), and attach supporting evidence/licenses.",
      attachment: null,
      scales: [
        "Manual / Standalone / Basic",
        "Computer-Assisted / Networked",
        "Automated / Integrated / Alerting",
        "Configurable / Real-time / Predictive",
        "Fully Flexible / Unified / Autonomous"
      ],
      company: [
        {
          name: "HR System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 1 },
            { label: "Level of Connectivity", val: 2 },
            { label: "Level of Intelligence", val: 1 }
          ],
          proof: "HR_System_License.pdf"
        },
        {
          name: "Accounting System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 3 },
            { label: "Level of Connectivity", val: 1 },
            { label: "Level of Intelligence", val: 2 }
          ],
          proof: "Accounting_Software_Proof.pdf"
        },
        {
          name: "CRM (Customer Relationship Management)",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 3 },
            { label: "Level of Connectivity", val: 1 },
            { label: "Level of Intelligence", val: 2 }
          ],
          proof: "CRM_License_2024.pdf"
        },
        { name: "ERP (Enterprise Resource Planning)", selected: false },
        { name: "SCM (Supply Chain Management)", selected: false },
        { name: "Quality Control Management System", selected: false },
        { name: "Inventory Management System", selected: false },
        { name: "Payroll Management System", selected: false },
        { name: "Performance Management System)", selected: false },
        { name: "Document Management System (DMS)", selected: false },
        { name: "Business Intelligence (BI) System", selected: false },
        { name: "Financial Management System", selected: false },
        { name: "Project Management System", selected: false }
      ],
      assessor: [
        {
          name: "HR System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 1 },
            { label: "Level of Connectivity", val: 2 },
            { label: "Level of Intelligence", val: 1 }
          ],
          proof: "HR_System_License.pdf"
        },
        {
          name: "Accounting System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 3 },
            { label: "Level of Connectivity", val: 1 },
            { label: "Level of Intelligence", val: 2 }
          ],
          proof: "Accounting_Software_Proof.pdf"
        },
        {
          name: "CRM (Customer Relationship Management)",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 3 },
            { label: "Level of Connectivity", val: 1 },
            { label: "Level of Intelligence", val: 2 }
          ],
          proof: "CRM_License_2024.pdf"
        },
        { name: "ERP (Enterprise Resource Planning)", selected: false },
        { name: "SCM (Supply Chain Management)", selected: false },
        { name: "Quality Control Management System", selected: false },
        { name: "Inventory Management System", selected: false },
        { name: "Payroll Management System", selected: false },
        { name: "Performance Management System)", selected: false },
        { name: "Document Management System (DMS)", selected: false },
        { name: "Business Intelligence (BI) System", selected: false },
        { name: "Financial Management System", selected: false },
        { name: "Project Management System", selected: false },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Verified against uploaded software licenses and onsite audit."
    },
    6: {
      type: 'matrix',
      headerLabel: "Facility Assets",
      title: "Question 6: From the following list of facility assets, choose at least one system that is currently in use that supports the shop floor production/manufacturing tasks, evaluate its maturity level (1 to 5), and attach supporting evidence.",
      attachment: null,
      scales: [
        "Manual / Standalone / Basic",
        "Computer-Assisted / Networked",
        "Automated / Integrated / Alerting",
        "Configurable / Real-time / Predictive",
        "Fully Flexible / Unified / Autonomous"
      ],
      company: [
        {
          name: "Air Compressor System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 1 },
            { label: "Level of Connectivity", val: 2 },
            { label: "Level of Intelligence", val: 3 }
          ],
          proof: "Air_Compressor_Spec_Sheet.pdf"
        },
        { name: "Boiler System", selected: false },
        { name: "Machine Cooling System", selected: false },
        { name: "HVAC System", selected: false },
        { name: "Lighting System", selected: false },
        { name: "Security System", selected: false },
        { name: "Fire Suppression System", selected: false },
        { name: "Water Management System", selected: false },
        { name: "Power Supply System", selected: false },
        { name: "Waste Management System", selected: false },
        { name: "Backup Generators", selected: false },
        { name: "Lifting/Hoisting Devices and System", selected: false },
        { name: "Material Transfer/Handling System", selected: false },
        { name: "Facility Monitoring Systems/Building Management System (BMS)", selected: false }
      ],
      assessor: [
        {
          name: "Air Compressor System",
          selected: true,
          categories: [
            { label: "Level of Automation", val: 1 },
            { label: "Level of Connectivity", val: 2 },
            { label: "Level of Intelligence", val: 3 }
          ],
          proof: "Air_Compressor_Spec_Sheet.pdf"
        },
        { name: "Boiler System", selected: false },
        { name: "Machine Cooling System", selected: false },
        { name: "HVAC System", selected: false },
        { name: "Lighting System", selected: false },
        { name: "Security System", selected: false },
        { name: "Fire Suppression System", selected: false },
        { name: "Water Management System", selected: false },
        { name: "Power Supply System", selected: false },
        { name: "Waste Management System", selected: false },
        { name: "Backup Generators", selected: false },
        { name: "Lifting/Hoisting Devices and System", selected: false },
        { name: "Material Transfer/Handling System", selected: false },
        { name: "Facility Monitoring Systems/Building Management System (BMS)", selected: false },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Facility assets evaluated and verified."
    },
    7: {
      title: "Question 7: How is your production/manufacturing process performed? <i class='fa-solid fa-circle-info' style='font-size:12px;'></i>",
      attachment: "Production_Process_Flow.pdf",
      company: [
        { type: 'radio', label: 'Performed manually', selected: false },
        { type: 'radio', label: 'Using dedicated semi-automatic machines', selected: true },
        { type: 'checkbox', label: 'Pre-programmed machine setting.', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Machines are capable of reconfiguration.', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Mould/tools are easy for changeover (e.g. less time consumption, dedicated tools for changeovers, less dependent on humans, etc.)', selected: true, indent: 1 },
        { type: 'radio', label: 'Using dedicated automatic machines', selected: false }
      ],
      assessor: [
        { type: 'radio', label: 'Performed manually', selected: false },
        { type: 'radio', label: 'Using dedicated semi-automatic machines', selected: false },
        { type: 'radio', label: 'Using dedicated automatic machines', selected: true },
        { type: 'checkbox', label: 'Pre-programmed machine setting.', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Machines are capable of reconfiguration.', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Mould/tools are easy for changeover (e.g. less time consumption, dedicated tools for changeovers, less dependent on humans, etc.)', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Autonomous decision making.', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Self-adaptive.', selected: true, indent: 1 },
        { type: 'subhead', label: 'Assessment Details' },
        { type: 'subhead', label: 'vbincqwncin j   ' }
      ],
      remarks: "Onsite evaluation confirms process uses dedicated automatic machines with self-adaptive and autonomous decision-making capabilities."
    },
    8: {
      title: "Question 8: Choose the level of automation currently implemented in your factory (refer to Figure 1 below)",
      diagram: "path/to/automation_pyramid.png",
      attachment: null,
      company: [
        { type: 'checkbox', label: 'Sensors and Signals', selected: true },
        { type: 'checkbox', label: 'PLC', selected: true },
        { type: 'checkbox', label: 'SCADA/HMI', selected: true },
        { type: 'checkbox', label: 'MES', selected: false },
        { type: 'checkbox', label: 'ERP', selected: false }
      ],
      assessor: [
        { type: 'checkbox', label: 'Sensors and Signals', selected: true },
        { type: 'checkbox', label: 'PLC', selected: true },
        { type: 'checkbox', label: 'SCADA/HMI', selected: true },
        { type: 'checkbox', label: 'MES', selected: true },
        { type: 'checkbox', label: 'ERP', selected: false },
        { type: 'subhead', label: 'Assessment Details' },
        { type: 'subhead', label: 'vbincqwncin j   ' }
      ],
      remarks: "Onsite inspection confirmed implementation up to MES level across active production lines."
    },
    9: {
      title: "Question 9: Are your machines connected to the network? <i class='fa-solid fa-circle-info' style='font-size:12px;'></i>",
      attachment: "Network_Topology_Diagram.pdf",
      company: [
        { type: 'radio', label: 'Yes', selected: true },
        { type: 'radio', label: 'No', selected: false },
        { type: 'subhead', label: 'Describe your machine connectivity level:' },
        { type: 'radio', label: 'They are physically connected (e.g. conveyor belt) BUT no data exchange between the machine.', selected: false, indent: 1 },
        { type: 'radio', label: 'They are connected via the machine control system. However, they have limited data exchange for specific tasks.', selected: false, indent: 1 },
        { type: 'radio', label: 'The connection enables data interoperability with different platforms/protocols/controllers.', selected: true, indent: 1 },
        { type: 'subhead', label: 'Select additional interoperability capabilities:' },
        { type: 'checkbox', label: 'Data exchange occurs in real-time interaction and information exchange.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Immediate feedback and decision-making.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Cross-domain interaction (enterprise and facilities)', selected: false, indent: 2 }
      ],
      assessor: [
        { type: 'radio', label: 'Yes', selected: true },
        { type: 'radio', label: 'No', selected: false },
        { type: 'subhead', label: 'Describe your machine connectivity level:' },
        { type: 'radio', label: 'They are physically connected (e.g. conveyor belt) BUT no data exchange between the machine.', selected: false, indent: 1 },
        { type: 'radio', label: 'They are connected via the machine control system. However, they have limited data exchange for specific tasks.', selected: false, indent: 1 },
        { type: 'radio', label: 'The connection enables data interoperability with different platforms/protocols/controllers.', selected: true, indent: 1 },
        { type: 'subhead', label: 'Select additional interoperability capabilities:' },
        { type: 'checkbox', label: 'Data exchange occurs in real-time interaction and information exchange.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Immediate feedback and decision-making.', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Cross-domain interaction (enterprise and facilities)', selected: true, indent: 2 },
        { type: 'subhead', label: 'Assessment Details' },
        { type: 'subhead', label: 'vbincqwncin j   ' }
      ],
      remarks: "Verified machine network integration supporting real-time data exchange and cross-domain interaction."
    },
    10: {
      title: "Question 10: Please describe the machine's control systems. (If you have a numerous number of machinery with various types of control systems, please choose the highest level.)",
      attachment: null,
      company: [
        { type: 'radio', label: 'Hard-wired control system', selected: true },
        { type: 'radio', label: 'PLC-based control system', selected: false },
        { type: 'radio', label: 'Computer-based control system', selected: false }
      ],
      assessor: [
        { type: 'radio', label: 'Hard-wired control system', selected: true },
        { type: 'radio', label: 'PLC-based control system', selected: false },
        { type: 'radio', label: 'Computer-based control system', selected: false },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Management requires further exposure and structured training on Industry 4.0 trends."
    },
    11: {
      title: "Question 11: Can you describe their control systems capability?",
      company: [
        { type: 'checkbox', label: 'Identify and notify problems', selected: true },
        { type: 'checkbox', label: 'Predict problems', selected: false },
        { type: 'checkbox', label: 'Computer-based control system/Self-optimizing', selected: false }
      ],
      assessor: [
        { type: 'checkbox', label: 'Identify and notify problems', selected: true },
        { type: 'checkbox', label: 'Predict problems', selected: false },
        { type: 'checkbox', label: 'Computer-based control system/Self-optimizing', selected: false },
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Management requires further exposure and structured training on Industry 4.0 trends."
    },
    12: {
      title: "Question 12: Select the best features that describe your manufacturing capability to produce individualized products. <i class='fa-solid fa-circle-info' style='font-size:12px;'></i>",
      attachment: "Individualized_Production_Report.pdf",
      company: [
        { type: 'checkbox', label: 'Capability', selected: true },
        { type: 'radio', label: 'Limited', selected: false, indent: 1 },
        { type: 'radio', label: 'Pre-determined / moderate', selected: true, indent: 1 },
        { type: 'radio', label: 'Flexible', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Tools / Moulds Changing Mechanism', selected: true },
        { type: 'radio', label: 'Manual and time consuming', selected: true, indent: 1 },
        { type: 'radio', label: 'Semi-automated and fast-changing', selected: false, indent: 1 },
        { type: 'radio', label: 'Automatic and fast-changing', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Lot Sizes', selected: true },
        { type: 'radio', label: 'Fixed MOQ', selected: false, indent: 1 },
        { type: 'radio', label: 'Flexible MOQ', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Machine Setup', selected: true },
        { type: 'radio', label: 'Manual and time consuming', selected: true, indent: 1 },
        { type: 'radio', label: 'Semi-automated and fast-changing', selected: false, indent: 1 },
        { type: 'radio', label: 'Automatic and fast-changing', selected: false, indent: 1 }
      ],
      assessor: [
        { type: 'checkbox', label: 'Capability', selected: true },
        { type: 'radio', label: 'Limited', selected: false, indent: 1 },
        { type: 'radio', label: 'Pre-determined / moderate', selected: true, indent: 1 },
        { type: 'radio', label: 'Flexible', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Tools / Moulds Changing Mechanism', selected: true },
        { type: 'radio', label: 'Manual and time consuming', selected: true, indent: 1 },
        { type: 'radio', label: 'Semi-automated and fast-changing', selected: false, indent: 1 },
        { type: 'radio', label: 'Automatic and fast-changing', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Lot Sizes', selected: true },
        { type: 'radio', label: 'Fixed MOQ', selected: false, indent: 1 },
        { type: 'radio', label: 'Flexible MOQ', selected: true, indent: 1 },
        { type: 'checkbox', label: 'Machine Setup', selected: true },
        { type: 'radio', label: 'Manual and time consuming', selected: true, indent: 1 },
        { type: 'radio', label: 'Semi-automated and fast-changing', selected: false, indent: 1 },
        { type: 'radio', label: 'Automatic and fast-changing', selected: false, indent: 1 },
        { type: 'subhead', label: 'Assessment Details' },
        { type: 'subhead', label: 'vbincqwncin j   ' }
      ],
      remarks: "Verified production setup and tool changing mechanisms during shop floor inspection."
    },
    13: {
      title: "Question 13: Describe the cybersecurity initiatives in your company",
      attachment: "cybersecurity.pdf",
      company: [
        { type: 'subhead', label: 'Dedicated Personnel' },
        { type: 'radio', label: 'No dedicated personnel', selected: true,  indent: 1  },
        { type: 'radio', label: 'One dedicated personnel', selected: false, indent: 2 },
        { type: 'radio', label: 'Has a dedicated team.', selected: true, indent: 2 },
        { type: 'subhead', label: 'Resource & Security Tools', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Password management', selected: true, indent: 2 },
        { type: 'checkbox', label: 'IP Whitelisting', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Firewall systems', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Antivirus software', selected: true, indent: 2 },
        { type: 'subhead', label: 'Governance', indent: 1 },
        { type: 'subhead', label: 'Awareness Program/Activities', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Policies', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Risk Assessment', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Continuous Revision', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'radio', label: 'Seldom', selected : false, indent:3}
      ],
      assessor: [
        { type: 'subhead', label: 'Dedicated Personnel' },
        { type: 'radio', label: 'No dedicated personnel', selected: true,  indent: 1  },
        { type: 'radio', label: 'One dedicated personnel', selected: false, indent: 2 },
        { type: 'radio', label: 'Has a dedicated team.', selected: true, indent: 2 },
        { type: 'subhead', label: 'Resource & Security Tools', selected: false, indent: 1 },
        { type: 'checkbox', label: 'Password management', selected: true, indent: 2 },
        { type: 'checkbox', label: 'IP Whitelisting', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Firewall systems', selected: true, indent: 2 },
        { type: 'checkbox', label: 'Antivirus software', selected: true, indent: 2 },
        { type: 'subhead', label: 'Governance', indent: 1 },
        { type: 'subhead', label: 'Awareness Program/Activities', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Policies', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Risk Assessment', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'subhead', label: 'Continuous Revision', selected: false, indent: 2 },
        { type: 'radio', label: 'Yes', selected: true, indent: 3 },
        { type: 'radio', label: 'No', selected: false, indent:3 },
        { type: 'radio', label: 'Seldom', selected : false, indent:3},
        { type: 'subhead', label: 'Assessment Details'},
        { type: 'subhead', label: 'vbincqwncin j   '}
      ],
      remarks: "Preliminary assessment complete."
    }
  };

  // Build QA Content supporting both standard and matrix layout formats as well as question diagrams
  function buildQAContent(dataObj, items) {
    let html = `<div class="qa-title">${dataObj.title}</div>`;

    // Render diagram image embedded directly in question body if specified
    if (dataObj.diagram) {
      html += `
        <div style="text-align: center; margin: 14px 0; padding: 16px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
          <img src="automation_pyramid.png" alt="Figure 1: Level of Automation" style="max-width: 100%; max-height: 280px; object-fit: contain;" />
          <div style="font-size: 11px; color: #64748b; font-weight: 600; margin-top: 8px;">Figure 1: Level of Automation</div>
        </div>
      `;
    }

    if (dataObj.type === 'matrix') {
      html += renderMatrixQA(dataObj, items);
    } else {
      items.forEach(item => {
        if (item.type === 'subhead') {
          const indentClass = item.indent ? `indent-level-${item.indent}` : '';
          html += `<div class="qa-subhead ${indentClass}">${item.label}</div>`;
        } else {
          html += renderQAOption(item.type, item.label, item.selected, item.indent || 0);
        }
      });
    }
    return html;
  }

  function showPrelimQuestion(qNum) {
    currentPrelimQuestion = qNum;
    
    document.querySelectorAll('.prelim-nav-btn').forEach(btn => {
      btn.classList.remove('active');
      if (parseInt(btn.textContent.trim()) === qNum) {
        btn.classList.add('active');
      }
    });

    const data = prelimData[qNum] || prelimData[1];
    
    document.getElementById('prelim-company-ans').innerHTML = buildQAContent(data, data.company);
    document.getElementById('prelim-assessor-finding').innerHTML = buildQAContent(data, data.assessor);
    document.getElementById('prelim-remarks-label').textContent = `Q${qNum} Assessor Remarks`;
    document.getElementById('prelim-remarks-input').value = data.remarks || '';

    // Handle dynamic attachments
    const attachBox = document.getElementById('prelim-attachment-box');
    const attachLink = document.getElementById('prelim-attachment-link');
    if (data.attachment) {
      attachBox.style.display = 'block';
      attachLink.textContent = data.attachment;
    } else {
      attachBox.style.display = 'none';
    }
  }

  function showView(viewId) {
    document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
    const target = document.getElementById(viewId);
    if (target) {
      target.classList.add('active');
      window.scrollTo(0, 0);
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    showPrelimQuestion(1);

    // Save remarks edits back into dataset as user types
    const remarksInput = document.getElementById('prelim-remarks-input');
    if (remarksInput) {
      remarksInput.addEventListener('input', (e) => {
        if (prelimData[currentPrelimQuestion]) {
          prelimData[currentPrelimQuestion].remarks = e.target.value;
        }
      });
    }
  });
</script>