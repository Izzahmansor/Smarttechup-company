<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crowd Innovator Application - Smart Tech Up</title>
  
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
    --border-color: #cbd5e1;
    --text-dark: #1e293b;
    --text-muted: #64748b;
    --input-bg: #ffffff;
    --required-red: #ef4444;
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f8fafc;
    color: var(--text-dark);
    margin: 0;
    padding: 0;
  }

  /* Main Form Container Elevation */
  .form-container {
    background: #ffffff;
    border-radius: 16px;
    padding: 40px 48px;
    box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.05), 0 4px 12px -2px rgba(0, 0, 0, 0.02);
    border: 1px solid #e2e8f0;
    max-width: 1000px;
    margin: 30px auto 50px auto;
  }

  .form-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--primary-blue);
    margin-top: 0;
    margin-bottom: 30px;
    padding-bottom: 18px;
    border-bottom: 2px dashed #e2e8f0;
    letter-spacing: -0.02em;
  }

  /* Form Fields & Interactive Inputs */
  .form-group {
    margin-bottom: 26px;
  }

  .form-label {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
    display: block;
  }

  .required-star {
    color: var(--required-red);
    margin-right: 4px;
  }

  .sub-label {
    font-size: 0.83rem;
    color: var(--text-muted);
    margin-top: -4px;
    margin-bottom: 12px;
    font-style: italic;
  }

  .form-control {
    width: 100%;
    padding: 12px 16px;
    font-size: 0.95rem;
    border: 1.5px solid var(--border-color);
    border-radius: 10px;
    background-color: var(--input-bg);
    box-sizing: border-box;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    color: var(--text-dark);
    font-family: inherit;
  }

  .form-control:hover {
    border-color: #94a3b8;
  }

  .form-control:focus {
    outline: none;
    border-color: var(--accent-blue);
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    background-color: #ffffff;
  }

  .form-control::placeholder {
    color: #94a3b8;
  }

  /* Grid Layout Ratios */
  .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr; /* 1:1 ratio */
    gap: 24px;
  }

  .form-row-2-1 {
    display: grid;
    grid-template-columns: 2fr 1fr; /* 2:1 ratio */
    gap: 24px;
  }

  .form-row-1-2 {
    display: grid;
    grid-template-columns: 1fr 2fr; /* 1:2 ratio */
    gap: 24px;
  }

  /* Modern Card-Style 2-Column Checkbox Grid */
  .checkbox-group {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-top: 10px;
  }

  .checkbox-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 0.92rem;
    font-weight: 500;
    color: #334155;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
  }

  .checkbox-item:hover {
    background: var(--light-blue-bg);
    border-color: #bfdbfe;
    color: var(--primary-blue);
  }

  .checkbox-item input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--accent-blue);
    border-radius: 4px;
  }

  /* Radio Group Pills */
  .radio-group {
    display: flex;
    gap: 16px;
    margin-top: 10px;
  }

  .radio-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 20px;
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-size: 0.92rem;
    font-weight: 600;
    color: #334155;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .radio-item:hover {
    border-color: #bfdbfe;
    background: var(--light-blue-bg);
  }

  .radio-item input[type="radio"] {
    width: 18px;
    height: 18px;
    accent-color: var(--accent-blue);
  }

  /* Section Subtitle Card */
  .section-subtitle {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--primary-blue);
    margin: 36px 0 20px 0;
    padding: 12px 16px;
    background: var(--light-blue-bg);
    border-left: 4px solid var(--accent-blue);
    border-radius: 0 8px 8px 0;
  }

  /* Enhanced Info Banner */
  .info-note {
    font-size: 0.88rem;
    color: #475569;
    line-height: 1.6;
    margin: 12px 0 0 0;
    padding: 12px 16px;
    background: #f1f5f9;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
  }

  .info-note a {
    color: var(--accent-blue);
    font-weight: 600;
    text-decoration: underline;
  }

  /* Modern Dropzone-Style Upload Button */
  .btn-upload {
    background-color: #ffffff;
    border: 2px dashed #cbd5e1;
    color: var(--accent-blue);
    padding: 14px 24px;
    border-radius: 10px;
    font-size: 0.92rem;
    font-weight: 700;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.2s ease;
  }

  .btn-upload:hover {
    background-color: var(--light-blue-bg);
    border-color: var(--accent-blue);
    transform: translateY(-1px);
  }

  /* Actions Bar Styling */
  .form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 16px;
    margin-top: 40px;
    padding-top: 24px;
    border-top: 1px solid #e2e8f0;
  }

  .btn-draft {
    background-color: #ffffff;
    border: 1.5px solid var(--border-color);
    color: var(--text-dark);
    padding: 12px 28px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .btn-draft:hover {
    background-color: #f8fafc;
    border-color: #94a3b8;
  }

  .btn-submit {
    background-color: #e2e8f0;
    color: #94a3b8;
    border: none;
    padding: 12px 32px;
    border-radius: 10px;
    font-weight: 700;
    font-size: 0.95rem;
    cursor: not-allowed;
    transition: all 0.2s ease;
  }

  .btn-submit.active {
    background-color: var(--accent-blue);
    color: #ffffff;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
  }

  .btn-submit.active:hover {
    background-color: #1d4ed8;
    transform: translateY(-1px);
  }

  @media (max-width: 768px) {
    .form-row, .form-row-2-1, .form-row-1-2, .checkbox-group {
      grid-template-columns: 1fr;
    }
    .form-container {
      padding: 24px 20px;
      margin: 15px;
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
        <div class="accordion-item open">
          <button type="button" class="accordion-header" onclick="toggleAccordion(this)">
            <span><i class="fa-solid fa-chart-pie"></i> Smart Tech Up</span>
            <i class="fa-solid fa-chevron-down arrow-icon"></i>
          </button>
          <div class="accordion-content">
            <a href="landing.php" class="nav-subitem"><i class="fa-solid fa-house"></i> Home</a>
            <a href="company_ci_application.php" class="nav-subitem active"><i class="fa-solid fa-chart-line"></i> CI Application</a>
            <a href="company_ci_project.php" class="nav-subitem"><i class="fa-solid fa-file-contract"></i> CI Project</a>
          </div>
        </div>
      </div>
    </aside>

    <!-- Main Content Workspace -->
    <main class="main-content">
      <div class="form-container">
        <h2 class="form-title">Crowd Innovator Application</h2>

        <form action="" method="POST" enctype="multipart/form-data">
          
          <!-- 1 & 2. Vendor Name & Registration No. (2:1 Ratio) -->
          <div class="form-row-2-1">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 1. Vendor Name</label>
              <input type="text" class="form-control" name="vendor_name" value="stuuser04@yopmail.com" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 2. Registration No.</label>
              <input type="text" class="form-control" name="registration_no" placeholder="e.g 2019010232345 (new format)" required />
            </div>
          </div>

          <!-- 3. Type of Entity (2-Column Checkboxes) -->
          <div class="form-group">
            <label class="form-label"><span class="required-star">*</span> 3. Type of Entity</label>
            <div class="sub-label">* Please check at least 1 box</div>
            <div class="checkbox-group">
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Training Provider"> Training Provider</label>
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Solution Provider"> Solution Provider</label>
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Distributor"> Distributor</label>
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Consultant"> Consultant</label>
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Machine Manufacturer"> Machine Manufacturer</label>
              <label class="checkbox-item"><input type="checkbox" name="entity_type[]" value="Software Provider"> Software Provider</label>
            </div>
          </div>

          <!-- 4. Business Sector and Product Offering -->
          <div class="form-group">
            <label class="form-label"><span class="required-star">*</span> 4. Business Sector and Product Offering</label>
            <input type="text" class="form-control" name="business_sector" placeholder="e.g Provision of Information Technology and Information System, ERP, MES, Robotic System Integrator, etc" required />
          </div>

          <!-- 5 & 6. Business Address & State (1:1 Ratio) -->
          <div class="form-row">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 5. Business Address</label>
              <input type="text" class="form-control" name="business_address" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 6. Business Address State</label>
              <select class="form-control" name="business_address_state" required>
                <option value="" disabled selected>Select</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Penang">Penang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
                <option value="W.P. Labuan">W.P. Labuan</option>
                <option value="W.P. Putrajaya">W.P. Putrajaya</option>
              </select>
            </div>
          </div>

          <!-- 7 & 8. Registration Address & State (1:1 Ratio) -->
          <div class="form-row">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 7. Registration Address</label>
              <input type="text" class="form-control" name="registration_address" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 8. Registration Address State</label>
              <select class="form-control" name="registration_address_state" required>
                <option value="" disabled selected>Select</option>
                <option value="Johor">Johor</option>
                <option value="Kedah">Kedah</option>
                <option value="Kelantan">Kelantan</option>
                <option value="Melaka">Melaka</option>
                <option value="Negeri Sembilan">Negeri Sembilan</option>
                <option value="Pahang">Pahang</option>
                <option value="Penang">Penang</option>
                <option value="Perak">Perak</option>
                <option value="Perlis">Perlis</option>
                <option value="Sabah">Sabah</option>
                <option value="Sarawak">Sarawak</option>
                <option value="Selangor">Selangor</option>
                <option value="Terengganu">Terengganu</option>
                <option value="W.P. Kuala Lumpur">W.P. Kuala Lumpur</option>
                <option value="W.P. Labuan">W.P. Labuan</option>
                <option value="W.P. Putrajaya">W.P. Putrajaya</option>
              </select>
            </div>
          </div>

          <!-- 9. MSIC Code -->
          <div class="form-group">
            <label class="form-label"><span class="required-star">*</span> 9. MSIC Code</label>
            <input type="text" class="form-control" name="msic_code" required />
          </div>

          <!-- 10. Contact Person Section -->
          <div class="section-subtitle">10. Contact Person</div>

          <!-- Salutations & Name (1:2 Ratio) -->
          <div class="form-row-1-2">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> Salutations</label>
              <select class="form-control" name="salutation" required>
                <option value="" disabled selected>Select</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
                <option value="Dr.">Dr.</option>
                <option value="Ir.">Ir.</option>
                <option value="Dato'">Dato'</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> Name</label>
              <input type="text" class="form-control" name="contact_name" required />
            </div>
          </div>

          <!-- Position & Mobile Phone (2:1 Ratio) -->
          <div class="form-row-2-1">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> Position</label>
              <input type="text" class="form-control" name="contact_position" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> Mobile Phone</label>
              <input type="text" class="form-control" name="contact_mobile" required />
            </div>
          </div>

          <!-- Email & 11. Telephone (2:1 Ratio) -->
          <div class="form-row-2-1">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> Email</label>
              <input type="email" class="form-control" name="contact_email" value="stuuser04@yopmail.com" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 11. Telephone</label>
              <input type="text" class="form-control" name="telephone" required />
            </div>
          </div>

          <!-- 12. Registered in MyEP SIRIM? -->
          <div class="form-group">
            <label class="form-label"><span class="required-star">*</span> 12. Registered in MyEP SIRIM?</label>
            <div class="radio-group">
              <label class="radio-item"><input type="radio" name="myep_registered" value="Yes"> Yes</label>
              <label class="radio-item"><input type="radio" name="myep_registered" value="No"> No</label>
            </div>
            <div class="info-note">
              Please go to this <a href="#" target="_blank">website</a> for MyEP registration OR Should you have any enquiries and require support related to the MyEP registration, please email MYEP@sirim.my or call Pn Fazlin Afifah @ Pn Noraini at 03 55446226.
            </div>
          </div>

          <!-- 13. Pillar IR4.0 (2-Column Checkboxes) -->
          <div class="form-group">
            <label class="form-label"><span class="required-star">*</span> 13. Pillar IR4.0 (please check whichever applicable)</label>
            <div class="checkbox-group">
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Advanced Automation"> Advanced Automation</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Advanced Material"> Advanced Material</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Artificial Intelligence"> Artificial Intelligence</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Augmented Reality"> Augmented Reality</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Autonomous Robot"> Autonomous Robot</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Big Data"> Big Data</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Cloud Computing"> Cloud Computing</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="IoT"> IoT</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Services"> Services</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Simulation"> Simulation</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="Additive"> Additive</label>
              <label class="checkbox-item"><input type="checkbox" name="ir4_pillar[]" value="System Integration"> System Integration</label>
            </div>
          </div>

          <!-- 14 & 15. Years of Operation & Malaysian Ownership (1:1 Ratio) -->
          <div class="form-row">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 14. Years of operation</label>
              <input type="text" class="form-control" name="years_operation" placeholder="e.g 5 (in numbers)" required />
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 15. Malaysian ownership (in %)</label>
              <input type="text" class="form-control" name="malaysian_ownership" placeholder="e.g 5-10 (in numbers)" required />
            </div>
          </div>

          <!-- 16 & 17. Financial Reports & Company Profiles (1:1 Ratio) -->
          <div class="form-row">
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 16. Financial Reports (past 3 years) (multiple file uploads are allowed).</label>
              <div>
                <label class="btn-upload">
                  <i class="fa-solid fa-plus"></i> Upload
                  <input type="file" name="financial_reports[]" multiple hidden />
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label"><span class="required-star">*</span> 17. Company Profiles, SSM Cert, MOF Cert, Track Records, Previous Experiences/Products/Projects (multiple file uploads are allowed).</label>
              <div>
                <label class="btn-upload">
                  <i class="fa-solid fa-plus"></i> Upload
                  <input type="file" name="company_docs[]" multiple hidden />
                </label>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="form-actions">
            <button type="button" class="btn-draft">Save As Draft</button>
            <button type="submit" class="btn-submit">Submit</button>
          </div>

        </form>
      </div>
    </main>

  </div>

  <script>
    function toggleAccordion(button) {
      const parent = button.parentElement;
      parent.classList.toggle('open');
    }
  </script>

</body>
</html>
