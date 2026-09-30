<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crowd Innovator - Smart Tech Up</title>
  
  <!-- Font Awesome & Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="studeclaration_style.css" />
  <link rel="stylesheet" href="company_selfassessment_style.css" />

  <style>
    :root {
      --primary-blue: #1e3a8a;
      --accent-blue: #2563eb;
      --light-blue-bg: #f0f6ff;
      --border-color: #e2e8f0;
      --text-dark: #1e293b;
      --text-muted: #64748b;
    }

    /* Hero Banner Styling */
/* Force proper banner sizing and spacing */
.hero-banner {
  background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%) !important;
  border-radius: 16px !important;
  padding: 36px 40px !important;
  color: #ffffff !important;
  min-height: auto !important;
  display: block !important;
  position: relative !important;
  margin-bottom: 24px !important;
}

/* Force inner text elements to display clearly */
.hero-banner .hero-content {
  display: block !important;
  visibility: visible !important;
  opacity: 1 !important;
}

.hero-banner .hero-title {
  color: #ffffff !important;
  font-size: 2.1rem !important;
  font-weight: 800 !important;
  margin: 12px 0 6px 0 !important;
  display: block !important;
  line-height: 1.2 !important;
}

.hero-banner .hero-subtitle {
  color: #e2e8f0 !important;
  font-size: 1.1rem !important;
  font-weight: 500 !important;
  margin-bottom: 20px !important;
  display: block !important;
}

.hero-banner .definition-card {
  background: rgba(255, 255, 255, 0.15) !important;
  border-left: 4px solid #60a5fa !important;
  color: #ffffff !important;
  padding: 16px 20px !important;
  border-radius: 8px !important;
  font-size: 0.92rem !important;
  line-height: 1.6 !important;
  display: block !important;
}

    .hero-subtitle {
      font-size: 1.1rem;
      font-weight: 500;
      opacity: 0.9;
      margin-bottom: 20px;
    }

    /* Definition Box */
    .definition-card {
      background: rgba(255, 255, 255, 0.12);
      border-left: 4px solid #60a5fa;
      backdrop-filter: blur(4px);
      padding: 16px 20px;
      border-radius: 8px;
      font-size: 0.92rem;
      line-height: 1.6;
    }

    /* Quick Highlight Metrics */
    .metrics-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-bottom: 28px;
    }

    .metric-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      padding: 18px 20px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.03);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .metric-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.06);
    }

    .metric-icon {
      width: 46px;
      height: 46px;
      border-radius: 10px;
      background: var(--light-blue-bg);
      color: var(--accent-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      flex-shrink: 0;
    }

    .metric-label {
      font-size: 0.78rem;
      color: var(--text-muted);
      font-weight: 600;
      text-transform: uppercase;
    }

    .metric-value {
      font-size: 1.05rem;
      font-weight: 800;
      color: var(--text-dark);
    }

    /* Section Heading */
    .section-title-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .section-title-bar h3 {
      font-size: 1.2rem;
      font-weight: 800;
      color: var(--primary-blue);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    /* Criteria Cards Grid */
    .criteria-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 20px;
      margin-bottom: 32px;
    }

    .criteria-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 14px;
      padding: 22px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
      position: relative;
      transition: all 0.25 ease;
      display: flex;
      flex-direction: column;
    }

    .criteria-card:hover {
      border-color: #93c5fd;
      box-shadow: 0 8px 20px rgba(37, 99, 235, 0.08);
      transform: translateY(-3px);
    }

    .card-top {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 12px;
    }

    .card-num-badge {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--light-blue-bg);
      color: var(--accent-blue);
      font-weight: 800;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .card-icon {
      font-size: 1.15rem;
      color: var(--accent-blue);
    }

    .card-title {
      font-size: 0.98rem;
      font-weight: 700;
      color: var(--text-dark);
    }

    .card-desc {
      font-size: 0.88rem;
      color: #475569;
      line-height: 1.55;
      flex-grow: 1;
    }

    /* Action CTA Section */
    .cta-card {
      background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%);
      border: 1px solid #bfdbfe;
      border-radius: 14px;
      padding: 28px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.05);
    }

    .cta-text h4 {
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--primary-blue);
      margin: 0 0 4px 0;
    }

    .cta-text p {
      font-size: 0.88rem;
      color: var(--text-muted);
      margin: 0;
    }

    .cta-btn {
      background: var(--accent-blue);
      color: #ffffff;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      font-size: 0.9rem;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: background 0.2s ease, transform 0.2s ease;
      white-space: nowrap;
      text-decoration: none;
    }

    .cta-btn:hover {
      background: #1d4ed8;
      transform: translateY(-1px);
    }

    @media (max-width: 768px) {
      .hero-banner { padding: 24px; }
      .hero-title { font-size: 1.6rem; }
      .cta-card { flex-direction: column; align-items: flex-start; }
      .cta-btn { width: 100%; justify-content: center; }
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
            <span><i class="fa-solid fa-chart-pie"></i> Smart Tech Up</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem active"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_ci_application.php" class="nav-subitem"><i class="fa-solid fa-chart-line"></i> CI Application</a>
            <a href="company_ci_project.php" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> CI Project</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      
      <!-- Hero Banner -->
      <section class="hero-banner">
        <div class="hero-content">
            <span class="hero-badge"><i class="fa-solid fa-bolt"></i> CROWD INNOVATOR</span>
            <h1 class="hero-title">Welcome to Smart Tech Up</h1>
            <p class="hero-subtitle">Technological Partners Program</p>
            
            <div class="definition-card">
            <strong>Program Definition:</strong> SIRIM Technological Partners consist of system or solution technology providers involved in Automation and Industry 4.0 technologies, including SIRIM SUBs/SBUs.
            </div>
        </div>
        </section>

      <!-- Key Snapshot Metrics -->
      <div class="metrics-grid">
        <div class="metric-card">
          <div class="metric-icon"><i class="fa-solid fa-calendar-check"></i></div>
          <div>
            <div class="metric-label">Min. Operation</div>
            <div class="metric-value">2+ Years</div>
          </div>
        </div>

        <div class="metric-card">
          <div class="metric-icon"><i class="fa-solid fa-location-dot"></i></div>
          <div>
            <div class="metric-label">Locality</div>
            <div class="metric-value">Malaysia</div>
          </div>
        </div>

        <div class="metric-card">
          <div class="metric-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
          <div>
            <div class="metric-label">Financial Audit</div>
            <div class="metric-value">2 Years</div>
          </div>
        </div>

        <div class="metric-card">
          <div class="metric-icon"><i class="fa-solid fa-headset"></i></div>
          <div>
            <div class="metric-label">Support SLA</div>
            <div class="metric-value">24/7 Ready</div>
          </div>
        </div>
      </div>

      <!-- Section Title -->
      <div class="section-title-bar">
        <h3><i class="fa-solid fa-list-check"></i> Partner Qualification Criteria</h3>
      </div>

      <!-- Interactive Criteria Cards Grid -->
      <div class="criteria-grid">
        
        <!-- Card 1 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">i</span>
            <i class="fa-solid fa-clock-rotate-left card-icon"></i>
            <span class="card-title">Operational Tenure</span>
          </div>
          <div class="card-desc">At least 2 years in active operation.</div>
        </div>

        <!-- Card 2 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">ii</span>
            <i class="fa-solid fa-flag card-icon"></i>
            <span class="card-title">Malaysian Registration</span>
          </div>
          <div class="card-desc">Registered and actively operating in Malaysia.</div>
        </div>

        <!-- Card 3 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">iii</span>
            <i class="fa-solid fa-chart-line card-icon"></i>
            <span class="card-title">Financial Stability</span>
          </div>
          <div class="card-desc">Financial stability to support long-term commitments (Requires 2 years of Financial reports).</div>
        </div>

        <!-- Card 4 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">iv</span>
            <i class="fa-solid fa-code-branch card-icon"></i>
            <span class="card-title">Internal R&D Capability</span>
          </div>
          <div class="card-desc">Must possess internal development capability rather than operating solely as traders or agents for overseas solutions.</div>
        </div>

        <!-- Card 5 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">v</span>
            <i class="fa-solid fa-plug card-icon"></i>
            <span class="card-title">Compatibility & Interoperability</span>
          </div>
          <div class="card-desc">Ensure compatibility with existing systems and operate seamlessly across a variety of platforms and technologies.</div>
        </div>

        <!-- Card 6 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">vi</span>
            <i class="fa-solid fa-expand card-icon"></i>
            <span class="card-title">Scalability</span>
          </div>
          <div class="card-desc">Solutions must be scalable to accommodate future business growth and increased operational demand.</div>
        </div>

        <!-- Card 7 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">vii</span>
            <i class="fa-solid fa-industry card-icon"></i>
            <span class="card-title">Industry Experience</span>
          </div>
          <div class="card-desc">Preference for providers with proven industry experience who understand specific sector requirements and challenges.</div>
        </div>

        <!-- Card 8 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">viii</span>
            <i class="fa-solid fa-award card-icon"></i>
            <span class="card-title">Track Record</span>
          </div>
          <div class="card-desc">Demonstrated history supported by case studies, client testimonials, and verified references.</div>
        </div>

        <!-- Card 9 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">ix</span>
            <i class="fa-solid fa-microchip card-icon"></i>
            <span class="card-title">Innovation Leadership</span>
          </div>
          <div class="card-desc">Providers leading in technological innovation and keeping pace with Industry 4.0 advancements.</div>
        </div>

        <!-- Card 10 -->
        <div class="criteria-card">
          <div class="card-top">
            <span class="card-num-badge">x</span>
            <i class="fa-solid fa-sliders card-icon"></i>
            <span class="card-title">Customisation</span>
          </div>
          <div class="card-desc">Ability of the technology provider to tailor solutions to meet specific client requirements.</div>
        </div>

        <!-- Card 11 -->
        <div class="criteria-card" style="grid-column: span 1;">
          <div class="card-top">
            <span class="card-num-badge">xi</span>
            <i class="fa-solid fa-shield-heart card-icon"></i>
            <span class="card-title">Customer Support & SLAs</span>
          </div>
          <div class="card-desc">Signed Service Level Agreements (SLAs) with comprehensive customer support availability (24/7 when required).</div>
        </div>

      </div>

      <!-- Bottom Call To Action -->
      <div class="cta-card">
        <div class="cta-text">
          <h4>Ready to register as a Technological Partner?</h4>
          <p>Complete your CI application to unlock program collaboration opportunities.</p>
        </div>
        <a href="company_ci_application.php" class="cta-btn">
          <span>Apply Now</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

    </main>

  </div>

  <!-- JavaScript for Accordion Interactivity -->
  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }
  </script>

</body>
</html>
