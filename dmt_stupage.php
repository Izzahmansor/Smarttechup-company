<?php 
  $page_title = "Process Flow - Smart Tech Up";
  include 'dmt_navbar.php'; 
?>

<style>
  :root {
    --bg-page: #f8fafc;
    --card-bg: #ffffff;
    --border-subtle: #e2e8f0;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --primary-indigo: #4f46e5;
    --primary-indigo-light: #eef2ff;
    --accent-emerald: #10b981;
    --accent-amber: #f59e0b;
  }

  .flow-wrapper {
    max-width: 1380px;
    margin: 5px auto;
    padding: 5px;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  /* Header Banner */
  .hero-banner {
    background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
    border-radius: 16px;
    padding: 24px 32px;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 10px 25px -5px rgba(49, 46, 129, 0.25);
    margin-bottom: 32px;
  }

  .hero-info h1 {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0 0 6px 0;
    display: flex;
    align-items: center;
    gap: 12px;
    letter-spacing: -0.02em;
  }

  .hero-info p {
    margin: 0;
    color: #c7d2fe;
    font-size: 0.9rem;
  }

  /* 4-Column Phase Grid */
  .phase-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    position: relative;
  }

  /* Phase Column Container */
  .phase-column {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid var(--border-subtle);
    padding: 18px;
    box-shadow: 0 4px 15px -3px rgba(0, 0, 0, 0.03);
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .phase-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-bottom: 12px;
    border-bottom: 2px solid #f1f5f9;
  }

  .phase-title {
    font-size: 0.92rem;
    font-weight: 700;
    color: var(--text-main);
    display: flex;
    align-items: center;
    gap: 6px;
  }

  /* Modular Step Cards */
  .step-card {
    background: #f8fafc;
    border: 1px solid var(--border-subtle);
    border-radius: 12px;
    padding: 14px;
    position: relative;
    transition: all 0.2s ease;
  }

  .step-card:hover {
    background: #ffffff;
    border-color: var(--primary-indigo);
    box-shadow: 0 8px 20px -4px rgba(79, 70, 229, 0.12);
    transform: translateY(-2px);
  }

  .step-top {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
  }

  .step-badge {
    width: 28px;
    height: 28px;
    border-radius: 8px;
    background: var(--primary-indigo-light);
    color: var(--primary-indigo);
    font-weight: 800;
    font-size: 0.78rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .step-name {
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-main);
    line-height: 1.25;
  }

  .step-status-box {
    display: flex;
    flex-direction: column;
    gap: 4px;
    font-size: 0.78rem;
    padding-top: 8px;
    border-top: 1px dashed #e2e8f0;
  }

  .text-sub { color: #64748b; font-size: 0.75rem; }

  .amount-highlight {
    font-weight: 800;
    color: var(--primary-indigo);
    font-size: 0.88rem;
  }

  .chip-group {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
  }

  .chip-pass {
    background: #dcfce7;
    color: #15803d;
    padding: 2px 6px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.7rem;
  }

  .chip-fail {
    background: #ffe4e6;
    color: #be123c;
    padding: 2px 6px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.7rem;
  }

  .chip-pending {
    background: #f1f5f9;
    color: #475569;
    padding: 2px 6px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.7rem;
  }

  @media (max-width: 1200px) {
    .phase-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 768px) {
    .phase-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="flow-wrapper">

  <!-- Header -->
  <div class="hero-banner">
    <div class="hero-info">
      <h1>
        <i class="fa-solid fa-route" style="color: #818cf8;"></i>
        Smart Tech Up Execution Pipeline
      </h1>
      <p>Process flow and structure from initial portal registration to post-project audit.</p>
    </div>
  </div>

  <!-- 4-Phase Complete 12-Step Grid -->
  <div class="phase-grid">

    <!-- PHASE 1: REGISTRATION & INITIATION -->
    <div class="phase-column">
      <div class="phase-header">
        <div class="phase-title">
          <i class="fa-solid fa-user-plus" style="color: #10b981;"></i>
          Phase 1: Registration
        </div>
      </div>

      <!-- Step 01 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">01</div>
          <div class="step-name">Registration in the Smart Tech Up Portal</div>
        </div>
        <div class="step-status-box">
          <span class="text-sub">32 Total Registration</span>
          <span class="text-sub">Go To Company Profiling and Registration Page</span>
        </div>
      </div>

      <!-- Step 02 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">02</div>
          <div class="step-name">Self-Assessment</div>
        </div>
        <div class="step-status-box">
          <span class="text-sub">7 Conducted</span>
          <div class="chip-group">
            <span class="chip-pass">5 Pass</span>
            <span class="chip-fail">2 Fail</span>
            <span class="chip-pending">25 Not Submitted</span>
          </div>
        </div>
      </div>

      <!-- Step 03 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">03</div>
          <div class="step-name">OSFA Initiation</div>
        </div>
        <div class="step-status-box">
          <span class="text-sub">1 Conducted OSFA</span>
          <span class="text-sub">Go To Paid but Pending</span>
        </div>
      </div>
    </div>

    <!-- PHASE 2: OSFA ASSESSMENT & REPORTS -->
    <div class="phase-column">
      <div class="phase-header">
        <div class="phase-title">
          <i class="fa-solid fa-file-shield" style="color: #f59e0b;"></i>
          Phase 2: Assessment
        </div>
      </div>

      <!-- Step 04 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">04</div>
          <div class="step-name">Project Initiation</div>
        </div>
        <div class="step-status-box">
          <span class="text-sub">3 Projects Initiated</span>
        </div>
      </div>

      <!-- Step 05 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">05</div>
          <div class="step-name">OSFA Reports</div>
        </div>
        <div class="step-status-box">
          <span class="text-sub">3 Submitted Report</span>
        </div>
      </div>

      <!-- Step 06 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">06</div>
          <div class="step-name">OSFA Implementation</div>
        </div>
        <div class="step-status-box">
          <div class="chip-group">
            <span class="chip-pass">1 Pass</span>
            <span class="chip-fail">2 Fail</span>
          </div>
        </div>
      </div>
    </div>

    <!-- PHASE 3: APPROVAL & EXECUTION -->
    <div class="phase-column">
      <div class="phase-header">
        <div class="phase-title">
          <i class="fa-solid fa-sack-dollar" style="color: #6366f1;"></i>
          Phase 3: Approval
        </div>
      </div>

      <!-- Step 07 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">07</div>
          <div class="step-name">Pre-Approved Amount</div>
        </div>
        <div class="step-status-box">
          <span class="amount-highlight">RM 1,500,000</span>
        </div>
      </div>

      <!-- Step 08 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">08</div>
          <div class="step-name">Project Approval</div>
        </div>
      </div>

      <!-- Step 09 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">09</div>
          <div class="step-name">Project Implementation</div>
        </div>
      </div>
    </div>

    <!-- PHASE 4: AUDIT & COMPLETION -->
    <div class="phase-column">
      <div class="phase-header">
        <div class="phase-title">
          <i class="fa-solid fa-chart-line" style="color: #64748b;"></i>
          Phase 4: Completion
        </div>
      </div>

      <!-- Step 10 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">10</div>
          <div class="step-name">Post Project Audit / Impact Study</div>
        </div>
      </div>

      <!-- Step 11 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">11</div>
          <div class="step-name">Project Completion</div>
        </div>
      </div>

      <!-- Step 12 -->
      <div class="step-card">
        <div class="step-top">
          <div class="step-badge">12</div>
          <div class="step-name">Project Status</div>
        </div>
      </div>
    </div>

  </div>

</div>

<?php include 'dmt_footer.php'; ?>