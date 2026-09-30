<?php 
  $page_title = "01 DMT OSFA - Assessor & PM Admin Panel";
  include 'dmt_navbar.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title; ?></title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      color: #333;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
    .custom-card {
      background: #fff;
      border-radius: 8px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      margin-bottom: 1.5rem;
      padding: 1.5rem;
    }
    .section-title {
      font-weight: 600;
      font-size: 1.1rem;
      color: #1e293b;
      margin-bottom: 1rem;
    }
    .text-label {
      font-size: 0.85rem;
      color: #64748b;
      font-weight: 500;
    }
    .text-value {
      font-size: 0.95rem;
      color: #0f172a;
      font-weight: 600;
    }
    .required-asterisk {
      color: #ef4444;
      margin-right: 4px;
    }
    .form-label {
      font-size: 0.9rem;
      font-weight: 600;
      color: #334155;
    }
    .btn-bidding-tab {
      border: 1px solid #cbd5e1;
      background-color: #f8fafc;
      color: #475569;
      font-weight: 500;
      padding: 0.375rem 0.85rem;
    }
    .btn-bidding-tab.active {
      background-color: #2563eb;
      color: #fff;
      border-color: #2563eb;
    }
    /* Simple Inline Calendar Widget */
    .calendar-widget {
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      padding: 12px;
      max-width: 280px;
      background: #fff;
    }
    .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
      font-size: 0.82rem;
      row-gap: 6px;
    }
    .calendar-grid div {
      padding: 4px 0;
      border-radius: 4px;
      cursor: pointer;
    }
    .calendar-grid .day-header {
      font-weight: 600;
      color: #64748b;
      cursor: default;
    }
    .calendar-grid .day.selected {
      background-color: #2563eb;
      color: #fff;
    }
    .accordion-button:not(.collapsed) {
      background-color: #f1f5f9;
      color: #1e293b;
      box-shadow: none;
    }
    .accordion-button {
      font-weight: 600;
      color: #334155;
    }
    .accordion-button i {
      margin-right: 10px;
      color: #2563eb;
    }
    footer {
      font-size: 0.85rem;
      color: #64748b;
      border-top: 1px solid #e2e8f0;
      padding: 1.5rem 0;
      margin-top: 3rem;
    }
  </style>
</head>
<body>

<div class="container my-4">

  <!-- Company Details Card -->
  <div class="custom-card">
    <h5 class="section-title">Company Details</h5>
    <div class="row">
      <div class="col-md-5 mb-3 mb-md-0">
        <div class="mb-2">
          <span class="text-label">Company Name:</span>
          <span class="text-value ms-1">BIOGA MAJU SDN BHD</span>
        </div>
        <div>
          <span class="text-label">Address:</span>
          <span class="text-value ms-1">123, JALAN 1, TAMASN 1, 12345 KUALA LUMPUR</span>
        </div>
      </div>
      <div class="col-md-7">
        <div class="mb-2">
          <span class="text-label">Project Title:</span>
          <span class="text-value ms-1">BIOGA MAJU - AUTOMATED PRODUCTION MONITORING AND QUALITY CONTROL SYSTEM</span>
        </div>
        <div>
          <span class="text-label">Description:</span>
          <span class="text-value ms-1">Implement an integrated production monitoring system to capture real-time machine data, track output and downtime, detect quality issues, and provide management dashboards for faster operational decisions.</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Bidding Details Card -->
  <div class="custom-card">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
      <h5 class="section-title mb-0">Bidding Details</h5>
      <div class="d-flex align-items-center gap-2">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-bidding-tab active">1 -</button>
          <button type="button" class="btn btn-bidding-tab">2 +</button>
          <button type="button" class="btn btn-bidding-tab">+ Bidding Title</button>
        </div>
        <button type="button" class="btn btn-outline-secondary btn-sm">Save Bidding Title</button>
        <button type="button" class="btn btn-danger btn-sm">Remove Bidding Title</button>
      </div>
    </div>

    <!-- RFP Forms -->
    <div class="mb-3">
      <label class="form-label"><span class="required-asterisk">*</span>RFP Title:</label>
      <input type="text" class="form-control" placeholder="Title">
    </div>

    <div class="mb-3">
      <label class="form-label"><span class="required-asterisk">*</span>RFP Summary:</label>
      <textarea class="form-control" rows="3" placeholder="Description"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label"><span class="required-asterisk">*</span>DMT Remarks <small class="text-muted">(not visible to CI)</small>:</label>
      <textarea class="form-control" rows="2" placeholder="DMT Remarks"></textarea>
    </div>

    <div class="mb-4">
      <label class="form-label">Project Manager Remarks:</label>
      <textarea class="form-control" rows="2" placeholder="No PM remarks" disabled></textarea>
    </div>

    <!-- Sub Bidding Details Grid -->
    <div class="row g-4">
      <!-- Left Column -->
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>1. Open Bidding?</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="openBidding" id="openYes" checked>
              <label class="form-check-label" for="openYes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="openBidding" id="openNo">
              <label class="form-check-label" for="openNo">No</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>2. Start and Close Bidding Date</label>
          <div class="calendar-widget">
            <div class="calendar-header">
              <i class="bi bi-chevron-left text-muted cursor-pointer"></i>
              <span>September 2026</span>
              <i class="bi bi-chevron-right text-muted cursor-pointer"></i>
            </div>
            <div class="calendar-grid">
              <div class="day-header">S</div>
              <div class="day-header">M</div>
              <div class="day-header">T</div>
              <div class="day-header">W</div>
              <div class="day-header">T</div>
              <div class="day-header">F</div>
              <div class="day-header">S</div>
              <div></div><div></div><div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div><div class="day">5</div>
              <div class="day">6</div><div class="day">7</div><div class="day">8</div><div class="day">9</div><div class="day">10</div><div class="day">11</div><div class="day">12</div>
              <div class="day">13</div><div class="day">14</div><div class="day">15</div><div class="day">16</div><div class="day">17</div><div class="day">18</div><div class="day">19</div>
              <div class="day">20</div><div class="day">21</div><div class="day">22</div><div class="day">23</div><div class="day">24</div><div class="day selected">25</div><div class="day">26</div>
              <div class="day">27</div><div class="day">28</div><div class="day">29</div><div class="day">30</div>
            </div>
          </div>
          <div class="form-text mt-2"><i class="bi bi-clock"></i> Bidding will close on - 12:00 PM</div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>3. Bidding Type</label>
          <select class="form-select">
            <option selected>Select</option>
            <option value="1">Project (Open)</option>
            <option value="2">Project (Training)</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>Need Rebidding?</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rebidding" id="rebidNo" checked>
              <label class="form-check-label" for="rebidNo">No</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rebidding" id="rebidYes">
              <label class="form-check-label" for="rebidYes">Yes</label>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>4. RFP No.</label>
          <input type="text" class="form-control" value="STU-RFP-2025XXXX" placeholder="STU-RFP-2025XXXX">
        </div>

        <div class="mb-3">
          <label class="form-label">5. RFP and Risk Profile <small class="text-muted">(Uploaded by PM)</small></label>
          <p class="text-muted small">-</p>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>6. RFP and Risk Profile <small class="text-muted">(Uploaded by DMT)</small></label>
          <div>
            <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-plus-lg"></i> Upload</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Side-by-side Briefing & Site Visit Cards -->
  <div class="row g-4 mb-4">
    <!-- Briefing Details -->
    <div class="col-md-6">
      <div class="custom-card h-100 mb-0">
        <h5 class="section-title">Briefing Details</h5>
        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>7. Briefing Date</label>
          <div class="calendar-widget">
            <div class="calendar-header">
              <i class="bi bi-chevron-left text-muted cursor-pointer"></i>
              <span>September 2026</span>
              <i class="bi bi-chevron-right text-muted cursor-pointer"></i>
            </div>
            <div class="calendar-grid">
              <div class="day-header">S</div><div class="day-header">M</div><div class="day-header">T</div><div class="day-header">W</div><div class="day-header">T</div><div class="day-header">F</div><div class="day-header">S</div>
              <div></div><div></div><div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div><div class="day">5</div>
              <div class="day">6</div><div class="day">7</div><div class="day">8</div><div class="day">9</div><div class="day">10</div><div class="day">11</div><div class="day">12</div>
              <div class="day">13</div><div class="day">14</div><div class="day">15</div><div class="day">16</div><div class="day selected">17</div><div class="day">18</div><div class="day">19</div>
              <div class="day">20</div><div class="day">21</div><div class="day">22</div><div class="day">23</div><div class="day">24</div><div class="day">25</div><div class="day">26</div>
              <div class="day">27</div><div class="day">28</div><div class="day">29</div><div class="day">30</div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>8. Briefing Type</label>
          <select class="form-select">
            <option selected>Select Briefing Type</option>
            <option value="1">Physical</option>
            <option value="2">Online</option>
          </select>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-6">
            <label class="form-label"><span class="required-asterisk">*</span>Start Time</label>
            <input type="text" class="form-control" placeholder="Start Time">
          </div>
          <div class="col-6">
            <label class="form-label"><span class="required-asterisk">*</span>End Time</label>
            <input type="text" class="form-control" placeholder="End Time">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>Briefing Link / Address</label>
          <textarea class="form-control" rows="2" placeholder="Briefing Address"></textarea>
        </div>
      </div>
    </div>

    <!-- Site Visit Details -->
    <div class="col-md-6">
      <div class="custom-card h-100 mb-0">
        <h5 class="section-title">Site Visit Details</h5>
        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>9. Required Site Visit?</label>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="siteVisit" id="siteYes" checked>
              <label class="form-check-label" for="siteYes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="siteVisit" id="siteNo">
              <label class="form-check-label" for="siteNo">No</label>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>Site Visit Date</label>
          <div class="calendar-widget">
            <div class="calendar-header">
              <i class="bi bi-chevron-left text-muted cursor-pointer"></i>
              <span>September 2026</span>
              <i class="bi bi-chevron-right text-muted cursor-pointer"></i>
            </div>
            <div class="calendar-grid">
              <div class="day-header">S</div><div class="day-header">M</div><div class="day-header">T</div><div class="day-header">W</div><div class="day-header">T</div><div class="day-header">F</div><div class="day-header">S</div>
              <div></div><div></div><div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div><div class="day">5</div>
              <div class="day">6</div><div class="day">7</div><div class="day">8</div><div class="day">9</div><div class="day">10</div><div class="day">11</div><div class="day">12</div>
              <div class="day">13</div><div class="day">14</div><div class="day selected">15</div><div class="day">16</div><div class="day">17</div><div class="day">18</div><div class="day">19</div>
              <div class="day">20</div><div class="day">21</div><div class="day">22</div><div class="day">23</div><div class="day">24</div><div class="day">25</div><div class="day">26</div>
              <div class="day">27</div><div class="day">28</div><div class="day">29</div><div class="day">30</div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><span class="required-asterisk">*</span>Site Visit Address:</label>
          <textarea class="form-control" rows="3" placeholder="Site Visit Address"></textarea>
        </div>
      </div>
    </div>
  </div>

  <!-- Accordion Sections -->
  <div class="accordion mb-4" id="biddingAccordion">
    
    <!-- 1. Invite CIs for Bidding -->
    <div class="accordion-item mb-2 border rounded">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
          <i class="bi bi-envelope"></i> Invite CIs for Bidding
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#biddingAccordion">
        <div class="accordion-body">
          <div class="row mb-3 align-items-center">
            <div class="col-md-6">
              <input type="text" class="form-control form-control-sm" placeholder="Search Crowd Innovator by Company Name">
            </div>
          </div>
          <button class="btn btn-primary btn-sm mb-3">Select All</button>

          <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-nowrap" style="font-size: 0.85rem;">
              <thead class="table-light">
                <tr>
                  <th>No.</th>
                  <th>Vendor Name</th>
                  <th>Email</th>
                  <th>Type of Entity</th>
                  <th>Business Sector</th>
                  <th>Pillar IR4.0</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>SUNSET INNOVATIONS</td>
                  <td>cinnovator02@yopmail.com</td>
                  <td>Solution Provider</td>
                  <td>ERP</td>
                  <td>Advanced Material, Artificial Intelligence</td>
                  <td><button class="btn btn-primary btn-sm py-0 px-2">Select</button></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>TWILIGHT VENDOR SDN. BHD.</td>
                  <td>cinnovator01@yopmail.com</td>
                  <td>Training Provider, Solution Provider, Distributor</td>
                  <td>ERP, MES, TRAINING</td>
                  <td>Advanced Automation, Advanced Mut...</td>
                  <td><button class="btn btn-primary btn-sm py-0 px-2">Select</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="d-flex justify-content-center align-items-center gap-2 mt-2 text-muted" style="font-size: 0.85rem;">
            <span>&lt;</span> <span>1</span> <span>&gt;</span>
            <select class="form-select form-select-sm" style="width: auto;">
              <option>15/page</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- 2. CIs Interested to Join -->
    <div class="accordion-item mb-2 border rounded">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
          <i class="bi bi-chat-left-dots"></i> CIs Interested to Join
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#biddingAccordion">
        <div class="accordion-body">
          <p class="text-muted small">0 Crowd Innovators Interested to Join</p>
          <div class="table-responsive">
            <table class="table table-bordered align-middle" style="font-size: 0.85rem;">
              <thead class="table-light">
                <tr>
                  <th>No.</th>
                  <th>Vendor Name</th>
                  <th>Email</th>
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" class="text-center text-muted">No data available</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. Selected CIs For Bidding -->
    <div class="accordion-item mb-2 border rounded">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
          <i class="bi bi-check-lg"></i> Selected CIs For Bidding
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#biddingAccordion">
        <div class="accordion-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" class="form-control form-control-sm" placeholder="Search Crowd Innovator by Company Name">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-nowrap" style="font-size: 0.85rem;">
              <thead class="table-light">
                <tr>
                  <th>Attended Briefing?</th>
                  <th>Vendor Name</th>
                  <th>Email</th>
                  <th>Type of Entity</th>
                  <th>Business Sector</th>
                  <th>Pillar IR4.0</th>
                  <th>Announced</th>
                  <th>Open</th>
                  <th>Closed</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox"></td>
                  <td>SUNSET INNOVATIONS</td>
                  <td>cinnovator02@yopmail.com</td>
                  <td>Solution Provider</td>
                  <td>ERP</td>
                  <td>Advanced Material, Artificial Intelligence</td>
                  <td>No</td>
                  <td>No</td>
                  <td>No</td>
                  <td><button class="btn btn-primary btn-sm py-0 px-2">Deselect</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bottom Action Buttons -->
  <div class="d-flex justify-content-end align-items-center gap-2 mb-5">
    <button class="btn btn-outline-secondary">Cancel</button>
    <button class="btn btn-outline-secondary">Save As Draft</button>
    <button class="btn btn-primary" style="background-color: #1e3a8a; border-color: #1e3a8a;" data-bs-toggle="modal" data-bs-target="#confirmModal">Send Notification for Briefing</button>
  </div>

  <!-- Confirmation Modal -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-3">
        <div class="modal-body">
          <h5 class="mb-4">Are you sure you want to send notifications for briefing?</h5>
          <div class="d-flex justify-content-center gap-2">
            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary px-4" style="background-color: #1e3a8a;">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="d-flex justify-content-between align-items-center flex-wrap">
    <div>Copyright © 2026 Smart Tech Up. All rights reserved.</div>
    <div class="d-flex gap-3">
      <a href="#" class="text-decoration-none text-muted">Legal Terms</a>
      <a href="#" class="text-decoration-none text-muted">Privacy Policy</a>
      <a href="#" class="text-decoration-none text-muted">Cookie Policy</a>
    </div>
  </footer>

</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>