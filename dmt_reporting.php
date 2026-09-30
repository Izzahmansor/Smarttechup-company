<?php
/**
 * dmt_reporting_3.php
 * Dynamic Reporting Overview with Multi-Format Exporting (XLS, PDF, PPT)
 * Updated with Dynamic Module KPIs and Module 3 & 4 Filter Controls
 */

session_start();

// Force session reset if requested or if mockData is uninitialized/malformed
if (
    isset($_GET['reset_session']) || 
    !isset($_SESSION['mockData']) || 
    !is_array($_SESSION['mockData']) || 
    !isset($_SESSION['mockData'][3]) ||
    !isset($_SESSION['mockData'][3][0]['recognition_tier']) ||
    !isset($_SESSION['mockData'][4][0]['review_status'])
) {
    unset($_SESSION['mockData']);
}

$dataUpdated = date('d M Y, h:i A');

// Initialize Mock Data with numeric array indices (1-6)
if (!isset($_SESSION['mockData'])) {
    $_SESSION['mockData'] = [
        // Module 1: OSFA
        1 => [
            [
                'company_id' => '2600032',
                'company_name' => 'AURA 1 COMPANY',
                'type_of_industry' => 'MANUFACTURING',
                'sector' => '',
                'date_submit_sa' => '17/09/2026',
                'rating_before_osfa' => '0',
                'recognition_scheme_before' => 'Conventional',
                'self_assessment_status' => 'FAIL',
                'date_agree_nda' => '17/09/2026',
                'date_submit_docs_loan' => '17/09/2026',
                'date_fi_respond_deadline' => '01/10/2026',
                'date_fi_give_response' => '18/09/2026',
                'elapsed_days_fi' => '0 day',
                'status_fi_response' => 'Submitted',
                'osfa_payment_made' => 'NO',
                'osfa_conducted' => 'NO',
                'rating_after_osfa' => '-',
                'recognition_scheme_after' => '-',
                'date_osfa_paid' => '-',
                'lead_assessor' => '-',
                'assessor' => '-',
                'ssor' => '-',
                'date_first_conduct_osfa' => '-',
                'date_second_conduct_osfa' => '-',
                'date_conduct_osfa' => '-',
                'date_osfa_report_deadline' => '-',
                'date_submit_osfa_report' => '-',
                'elapsed_days_osfa_report' => '-',
                'status_osfa_report_submission' => 'Pending',
                'status_submission' => 'Pending',
                'status' => 'In Progress',
                'action_plan' => ''
            ],
            [
                'company_id' => '2600014',
                'company_name' => 'STUREACTUSER01 COMPANY',
                'type_of_industry' => 'MANUFACTURING',
                'sector' => 'Food Processing',
                'date_submit_sa' => '19/08/2026',
                'rating_before_osfa' => '30',
                'recognition_scheme_before' => 'Conventional',
                'self_assessment_status' => 'FAIL',
                'date_agree_nda' => '19/08/2026',
                'date_submit_docs_loan' => '19/08/2026',
                'date_fi_respond_deadline' => '02/09/2026',
                'date_fi_give_response' => '-',
                'elapsed_days_fi' => '-',
                'status_fi_response' => '-',
                'osfa_payment_made' => 'YES',
                'osfa_conducted' => 'YES',
                'rating_after_osfa' => '39.0',
                'recognition_scheme_after' => 'Newcomer',
                'date_osfa_paid' => '20/08/2026',
                'lead_assessor' => 'STU Assessor AND PM 1',
                'assessor' => 'ASSESSOR AND PM 2',
                'ssor' => 'SSOR AND PM 2',
                'date_first_conduct_osfa' => '20/08/2026',
                'date_second_conduct_osfa' => '21/08/2026',
                'date_conduct_osfa' => '20 - 21 AUG 2026',
                'date_osfa_report_deadline' => '28/08/2026',
                'date_submit_osfa_report' => '21/08/2026',
                'elapsed_days_osfa_report' => '0 day',
                'status_osfa_report_submission' => 'Submitted',
                'status_submission' => 'Submitted',
                'status' => 'Completed',
                'action_plan' => 'View Plan'
            ]
        ],

        // Module 2: Projects
        2 => [
            [
                'company_id' => '2600032',
                'company_name' => 'AURA 1 COMPANY',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Automotive',
                'project_initiation' => 'Initiated',
                'pre-approval_amount' => '300,000.00',
                'actual_amount' => '250,000.00',
                'project_manager' => 'STU Assessor AND PM 1',
                'section' => 'Technology Implementation',
                'project_title' => 'Smart Automation Line Upgrade',
                'grant_amount_commited' => '250,000.00',
                'grant_amount_approved' => '250,000.00',
                'grant_amount_disbursed' => '125,000.00',
                'revenue_realised' => '50,000.00',
                'review_date' => '15/06/2026',
                'date_company_accept_report' => '20/06/2026',
                'date_paid_submit_finance' => '25/06/2026',
                'lead_assessor_s' => 'STU Assessor AND PM 1',
                'assessor_s' => 'ASSESSOR AND PM 2',
                'lead_assessor_rm' => 'Lead RM John',
                'assessor_rm' => 'Assessor RM Jane',
                'reviewer_gm_rm' => 'GM Reviewer Mark',
                'date_project_initiation' => '01/02/2026',
                'date_offerletter_issued' => '10/02/2026',
                'date_assign_pm' => '12/02/2026',
                'date_pm_accept_proposal' => '15/02/2026',
                'date_pm_submit_proposal' => '01/03/2026',
                'date_pm_approve_proposal' => '10/03/2026',
                'date_project_close' => '15/11/2026',
                'status' => 'In Progress',
                'action_plan' => 'To continue with follow up'
            ],
            [
                'company_id' => '2600014',
                'company_name' => 'STUREACTUSER01 COMPANY',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Food Processing',
                'project_initiation' => 'Approved',
                'pre-approval_amount' => '150,000.00',
                'actual_amount' => '120,000.00',
                'project_manager' => 'ASSESSOR AND PM 2',
                'section' => 'IoT & Analytics',
                'project_title' => 'IoT Sensors Integration',
                'grant_amount_commited' => '120,000.00',
                'grant_amount_approved' => '120,000.00',
                'grant_amount_disbursed' => '120,000.00',
                'revenue_realised' => '100,000.00',
                'review_date' => '10/08/2026',
                'date_company_accept_report' => '12/08/2026',
                'date_paid_submit_finance' => '15/08/2026',
                'lead_assessor_s' => 'STU Assessor AND PM 2',
                'assessor_s' => 'ASSESSOR AND PM 1',
                'lead_assessor_rm' => 'Lead RM Sarah',
                'assessor_rm' => 'Assessor RM Paul',
                'reviewer_gm_rm' => 'GM Reviewer Mark',
                'date_project_initiation' => '10/03/2026',
                'date_offerletter_issued' => '15/03/2026',
                'date_assign_pm' => '18/03/2026',
                'date_pm_accept_proposal' => '20/03/2026',
                'date_pm_submit_proposal' => '05/04/2026',
                'date_pm_approve_proposal' => '15/04/2026',
                'date_project_close' => '30/08/2026',
                'status' => 'Completed',
                'action_plan' => 'View Plan'
            ]
        ],

        // Module 3: Smart Factory Recognition
        3 => [
            [
                'company_id' => '2600014',
                'company_name' => 'STUREACTUSER01 COMPANY',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Food Processing',
                'recognition_tier' => 'Newcomer',
                'rating_after_osfa' => '39%',
                'audit_status' => 'Passed',
                'action' => 'Details'
            ],
            [
                'company_id' => '2600032',
                'company_name' => 'AURA 1 COMPANY',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Automotive',
                'recognition_tier' => 'Gold',
                'rating_after_osfa' => '78%',
                'audit_status' => 'Passed',
                'action' => 'Details'
            ],
            [
                'company_id' => '2600045',
                'company_name' => 'NEXUS AUTOMATION SDN BHD',
                'industry_type' => 'TECHNOLOGY',
                'sector' => 'Electronics',
                'recognition_tier' => 'Platinum',
                'rating_after_osfa' => '92%',
                'audit_status' => 'Passed',
                'action' => 'Details'
            ],
            [
                'company_id' => '2600058',
                'company_name' => 'PRECISION ENGINEERING CORP',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Machinery',
                'recognition_tier' => 'Silver',
                'rating_after_osfa' => '62%',
                'audit_status' => 'Passed',
                'action' => 'Details'
            ],
            [
                'company_id' => '2600061',
                'company_name' => 'TRADITIONAL PACKAGING INDUSTRY',
                'industry_type' => 'MANUFACTURING',
                'sector' => 'Packaging',
                'recognition_tier' => 'Conventional',
                'rating_after_osfa' => '15%',
                'audit_status' => 'Pending',
                'action' => 'Details'
            ]
        ],

        // Module 4: Crowd Innovators
        4 => [
            [
                'ci_code' => 'CI-1092',
                'myep_id' => 'MYEP-2026-001',
                'vendor_name' => 'Tech Solutions Sdn Bhd',
                'application_date' => '12/04/2026',
                'contact_person' => 'Alex Tan',
                'email_contact_person' => 'alex.tan@techsolutions.com',
                'handphone_contact_person' => '+60 12-345 6789',
                'entity_type' => 'SME',
                'business_sector' => 'Software & AI',
                'pillar_ir4.0' => 'Artificial Intelligence',
                'review_status' => 'Reviewed'
            ],
            [
                'ci_code' => 'CI-1093',
                'myep_id' => 'MYEP-2026-002',
                'vendor_name' => 'RoboTech Systems',
                'application_date' => '25/05/2026',
                'contact_person' => 'Siti Nurhaliza',
                'email_contact_person' => 'siti@robotech.my',
                'handphone_contact_person' => '+60 19-876 5432',
                'entity_type' => 'Startup',
                'business_sector' => 'Robotics & Automation',
                'pillar_ir4.0' => 'Autonomous Robots',
                'review_status' => 'Not Reviewed'
            ]
        ],

        // Module 5: Assessors
        5 => [
            [
                'assessor_id' => 'ASR-001',
                'full_name' => 'STU Assessor AND PM 1',
                'email' => 'assessor1@example.com',
                'department' => 'Manufacturing Systems',
                'section' => 'Automation & Robotics',
                'expertise' => 'Smart Factory & IoT Integration',
                'smart_technology' => 'Industrial IoT, PLC Controls',
                'experience' => '10 Years',
                'education_quilification' => "B.Eng Mechanical Engineering - University A (2015)\nPMP Certification (2018)",
                'work_experience' => "Senior Assessor at SIRIM (2020 - Present)\nLead Auditor at TechCorp (2016 - 2020)",
                'professional_competency' => "IR4.0 Certified Assessor\nISO 9001 Lead Auditor\nSmart Factory Systems Architect",
                'professional_membership' => "Member of Board of Engineers Malaysia (Reg: BEM-12345)\nIEM Senior Member"
            ],
            [
                'assessor_id' => 'ASR-002',
                'full_name' => 'ASSESSOR AND PM 2',
                'email' => 'assessor2@example.com',
                'department' => 'Operations & Tech Implementation',
                'section' => 'Digital Transformation',
                'expertise' => 'Data Analytics & AI Systems',
                'smart_technology' => 'Predictive Analytics, Cloud Manufacturing',
                'experience' => '8 Years',
                'education_quilification' => "M.Sc Computer Science - Tech University (2017)\nB.Sc Data Science (2014)",
                'work_experience' => "Tech Lead at MDEC (2021 - Present)\nEnterprise Architect at SystemX (2017 - 2021)",
                'professional_competency' => "Certified Data Scientist (CDS)\nCloud Architecture Specialist\nBig Data Analytics",
                'professional_membership' => "IEEE Senior Member (ID: 987654)\nAssociation for Computing Machinery (ACM)"
            ]
        ],

        // Module 6: Project Managers
        6 => [
            [
                'pm_id' => 'PM-001',
                'full_name' => 'ASSESSOR AND PM 2',
                'email' => 'pm2@example.com',
                'department' => 'Operations & Tech Implementation',
                'section' => 'Project Governance',
                'expertise' => 'Agile Project Management, Tech Deployment',
                'smart_technology' => 'ERP & MES Systems',
                'experience' => '12 Years',
                'education_quilification' => "B.Sc Industrial Engineering (2012)\nProject Management Professional (PMP)",
                'work_experience' => "Senior PM at TechCorp (2018 - Present)\nOperations Manager at InfraWorks (2012 - 2018)",
                'professional_competency' => "PMP Certification\nCertified ScrumMaster (CSM)\nLean Six Sigma Black Belt",
                'professional_membership' => "PMI Malaysia Chapter Member\nInstitute of Industrial Engineers"
            ],
            [
                'pm_id' => 'PM-002',
                'full_name' => 'STU Assessor AND PM 1',
                'email' => 'pm1@example.com',
                'department' => 'Manufacturing Systems',
                'section' => 'Grant Management',
                'expertise' => 'Financial Oversight, Risk Management',
                'smart_technology' => 'Smart Factory Platforms',
                'experience' => '15 Years',
                'education_quilification' => "MBA in Finance - Business School (2016)\nB.Eng Electrical Engineering (2009)",
                'work_experience' => "Head of PMO at Automation Corp (2019 - Present)\nProject Lead at Energy Systems (2010 - 2019)",
                'professional_competency' => "PRINCE2 Practitioner\nCertified Risk Management Professional (CRMP)\nGrant Administration Specialist",
                'professional_membership' => "PMI Member\nIEM Registered Engineer"
            ]
        ]
    ];
}

$mockData = &$_SESSION['mockData'];

// Helper to filter dataset per module category
function filterDataset($allData, $category, $search, $osfaFilter, $tierFilter = 'all', $m4Filter = 'all') {
    $catKey = (int)$category;
    if (!isset($allData[$catKey])) return [];
    $rows = $allData[$catKey];

    // Module 1 Filter
    if ($catKey === 1 && !empty($osfaFilter) && $osfaFilter !== 'all') {
        $rows = array_filter($rows, function($row) use ($osfaFilter) {
            if ($osfaFilter === 'paid') {
                return ($row['osfa_payment_made'] ?? '') === 'YES' || (!empty($row['date_osfa_paid']) && $row['date_osfa_paid'] !== '-');
            }
            if ($osfaFilter === 'submitted') {
                $subStatus = strtolower($row['status_submission'] ?? $row['status_osfa_report_submission'] ?? '');
                return $subStatus === 'submitted';
            }
            if ($osfaFilter === 'accepted') {
                $st = strtolower($row['status'] ?? '');
                return $st === 'completed' || $st === 'accepted';
            }
            return true;
        });
    }

    // Module 3 Tier Filter
    if ($catKey === 3 && !empty($tierFilter) && strtolower($tierFilter) !== 'all') {
        $rows = array_filter($rows, function($row) use ($tierFilter) {
            $t = strtolower($row['recognition_tier'] ?? '');
            return $t === strtolower($tierFilter);
        });
    }

    // Module 4 Review Status Filter
    if ($catKey === 4 && !empty($m4Filter) && strtolower($m4Filter) !== 'all') {
        $rows = array_filter($rows, function($row) use ($m4Filter) {
            $status = strtolower(str_replace(' ', '_', $row['review_status'] ?? ''));
            return $status === strtolower($m4Filter);
        });
    }

    // Search Query Filter
    if (!empty($search)) {
        $searchTerm = strtolower($search);
        $rows = array_filter($rows, function($row) use ($searchTerm) {
            foreach ($row as $val) {
                if (stripos((string)$val, $searchTerm) !== false) return true;
            }
            return false;
        });
    }
    return array_values($rows);
}

// Module Labels Helper
function getModuleName($cat) {
    $names = [
        '1' => 'OSFA',
        '2' => 'Projects',
        '3' => 'Smart Factory Recognition',
        '4' => 'Crowd Innovators',
        '5' => 'Assessors',
        '6' => 'Project Managers'
    ];
    return $names[$cat] ?? 'Report';
}

// AJAX Request Handling
if (isset($_GET['action'])) {
    if (ob_get_length()) ob_clean();

    $category   = $_GET['category'] ?? '1';
    $search     = trim($_GET['search'] ?? '');
    $osfaFilter = $_GET['osfa_filter'] ?? 'all';
    $tierFilter = $_GET['tier_filter'] ?? 'all';
    $m4Filter   = $_GET['m4_filter'] ?? 'all';
    $page       = max(1, (int)($_GET['page'] ?? 1));
    $perPage    = min(500, max(1, (int)($_GET['per_page'] ?? 100)));

    if ($_GET['action'] === 'update') {
        header('Content-Type: application/json');
        $rowKey = $_POST['record_id'] ?? $_POST['company_id'] ?? '';
        $field  = $_POST['field'] ?? '';
        $value  = $_POST['value'] ?? '';

        $catKey = (int)$category;
        if (isset($mockData[$catKey])) {
            foreach ($mockData[$catKey] as &$row) {
                $id = $row['company_id'] ?? $row['project_id'] ?? $row['scheme_id'] ?? $row['ci_code'] ?? $row['assessor_id'] ?? $row['pm_id'] ?? '';
                if ($id === $rowKey) {
                    $row[$field] = $value;
                    $_SESSION['mockData'] = $mockData;
                    echo json_encode(['status' => 'success', 'message' => 'Updated successfully']);
                    exit;
                }
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Record not found']);
        exit;
    }

    $filteredRows = filterDataset($mockData, $category, $search, $osfaFilter, $tierFilter, $m4Filter);
    $totalCount   = count($filteredRows);

    if ($_GET['action'] === 'fetch') {
        header('Content-Type: application/json');
        $offset        = ($page - 1) * $perPage;
        $paginatedRows = array_slice($filteredRows, $offset, $perPage);

        // Compute dynamic KPI metrics for each module
        $kpiStats = [];

        // Module 1 (OSFA)
        $m1Rows = $mockData[1] ?? [];
        $kpiStats[1] = [
            ['label' => 'Total Records', 'value' => count($m1Rows), 'icon' => 'fa-layer-group', 'color' => 'blue'],
            ['label' => 'OSFA Conducted', 'value' => count(array_filter($m1Rows, fn($r) => ($r['osfa_conducted'] ?? '') === 'YES')), 'icon' => 'fa-circle-check', 'color' => 'green'],
            ['label' => 'Pending Submissions', 'value' => count(array_filter($m1Rows, fn($r) => strtolower($r['status_submission'] ?? $r['status_osfa_report_submission'] ?? '') === 'pending')), 'icon' => 'fa-hourglass-half', 'color' => 'amber'],
            ['label' => 'Submitted Reports', 'value' => count(array_filter($m1Rows, fn($r) => strtolower($r['status_submission'] ?? $r['status_osfa_report_submission'] ?? '') === 'submitted')), 'icon' => 'fa-file-circle-check', 'color' => 'cyan']
        ];

        // Module 2 (Projects)
        $m2Rows = $mockData[2] ?? [];
        $disbursedTotal = 0;
        foreach ($m2Rows as $r) {
            $disbursedTotal += floatval(str_replace(',', '', $r['grant_amount_disbursed'] ?? '0'));
        }
        $kpiStats[2] = [
            ['label' => 'Total Projects', 'value' => count($m2Rows), 'icon' => 'fa-diagram-project', 'color' => 'blue'],
            ['label' => 'In Progress', 'value' => count(array_filter($m2Rows, fn($r) => strtolower($r['status'] ?? '') === 'in progress')), 'icon' => 'fa-spinner', 'color' => 'amber'],
            ['label' => 'Completed Projects', 'value' => count(array_filter($m2Rows, fn($r) => strtolower($r['status'] ?? '') === 'completed')), 'icon' => 'fa-circle-check', 'color' => 'green'],
            ['label' => 'Total Disbursed', 'value' => 'RM ' . number_format($disbursedTotal, 0), 'icon' => 'fa-money-bill-wave', 'color' => 'cyan']
        ];

        // Module 3 (Smart Factory Recognition)
        $m3Rows = $mockData[3] ?? [];
        $kpiStats[3] = [
            ['label' => 'Total Companies', 'value' => count($m3Rows), 'icon' => 'fa-industry', 'color' => 'blue'],
            ['label' => 'Audits Passed', 'value' => count(array_filter($m3Rows, fn($r) => strtolower($r['audit_status'] ?? '') === 'passed')), 'icon' => 'fa-circle-check', 'color' => 'green'],
            ['label' => 'Audits Pending', 'value' => count(array_filter($m3Rows, fn($r) => strtolower($r['audit_status'] ?? '') === 'pending')), 'icon' => 'fa-hourglass-half', 'color' => 'amber'],
            ['label' => 'Top Performers (Gold/Plat)', 'value' => count(array_filter($m3Rows, fn($r) => in_array(strtolower($r['recognition_tier'] ?? ''), ['gold', 'platinum']))), 'icon' => 'fa-crown', 'color' => 'cyan']
        ];

        // Module 4 (Crowd Innovators)
        $m4Rows = $mockData[4] ?? [];
        $kpiStats[4] = [
            ['label' => 'Total Innovators', 'value' => count($m4Rows), 'icon' => 'fa-lightbulb', 'color' => 'blue'],
            ['label' => 'Reviewed', 'value' => count(array_filter($m4Rows, fn($r) => strtolower($r['review_status'] ?? '') === 'reviewed')), 'icon' => 'fa-circle-check', 'color' => 'green'],
            ['label' => 'Not Reviewed', 'value' => count(array_filter($m4Rows, fn($r) => strtolower($r['review_status'] ?? '') === 'not reviewed')), 'icon' => 'fa-clock', 'color' => 'amber'],
            ['label' => 'Registered Entities', 'value' => count($m4Rows), 'icon' => 'fa-building', 'color' => 'cyan']
        ];

        // Module 5 (Assessors)
        $m5Rows = $mockData[5] ?? [];
        $kpiStats[5] = [
            ['label' => 'Total Assessors', 'value' => count($m5Rows), 'icon' => 'fa-user-check', 'color' => 'blue'],
            ['label' => 'Manufacturing Dept', 'value' => count(array_filter($m5Rows, fn($r) => strpos(strtolower($r['department'] ?? ''), 'manufacturing') !== false)), 'icon' => 'fa-gears', 'color' => 'green'],
            ['label' => 'Operations Dept', 'value' => count(array_filter($m5Rows, fn($r) => strpos(strtolower($r['department'] ?? ''), 'operations') !== false)), 'icon' => 'fa-sliders', 'color' => 'amber'],
            ['label' => 'Certified Lead Auditors', 'value' => count($m5Rows), 'icon' => 'fa-award', 'color' => 'cyan']
        ];

        // Module 6 (Project Managers)
        $m6Rows = $mockData[6] ?? [];
        $kpiStats[6] = [
            ['label' => 'Total Project Managers', 'value' => count($m6Rows), 'icon' => 'fa-user-tie', 'color' => 'blue'],
            ['label' => 'Project Governance', 'value' => count(array_filter($m6Rows, fn($r) => strpos(strtolower($r['section'] ?? ''), 'governance') !== false)), 'icon' => 'fa-clipboard-list', 'color' => 'green'],
            ['label' => 'Grant Management', 'value' => count(array_filter($m6Rows, fn($r) => strpos(strtolower($r['section'] ?? ''), 'grant') !== false)), 'icon' => 'fa-file-invoice-dollar', 'color' => 'amber'],
            ['label' => 'PMP Certified', 'value' => count($m6Rows), 'icon' => 'fa-certificate', 'color' => 'cyan']
        ];

        // Provide updated tab counts for all modules
        $tabCounts = [];
        for ($i = 1; $i <= 6; $i++) {
            $tabCounts[$i] = count($mockData[$i] ?? []);
        }

        echo json_encode([
            'total'      => $totalCount,
            'kpi_stats'  => $kpiStats,
            'tab_counts' => $tabCounts,
            'data'       => $paginatedRows
        ]);
        exit;
    }

    // MULTI-FORMAT EXPORT HANDLER (.xls, .pdf, .ppt)
    if ($_GET['action'] === 'export') {
        $format = strtolower($_GET['format'] ?? 'xls');
        $moduleTitle = getModuleName($category);
        $dateStr = date('Y-m-d');
        $filename = "Export_{$moduleTitle}_{$dateStr}";

        // 1. EXCEL (.xls) OUTPUT
        if ($format === 'xls') {
            header('Content-Type: application/vnd.ms-excel; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filename . '.xls"');
            header('Cache-Control: max-age=0');

            echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">';
            echo '<head><meta charset="UTF-8"><style>th{background-color:#0f172a;color:#ffffff;font-weight:bold;padding:8px;} td{padding:6px;border:1px solid #e2e8f0;}</style></head><body>';
            echo '<h2>' . htmlspecialchars($moduleTitle) . ' Export Report</h2>';
            echo '<table border="1">';
            if (!empty($filteredRows)) {
                echo '<tr>';
                foreach (array_keys($filteredRows[0]) as $head) {
                    echo '<th>' . htmlspecialchars(strtoupper(str_replace('_', ' ', $head))) . '</th>';
                }
                echo '</tr>';
                foreach ($filteredRows as $row) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr><td>No records available.</td></tr>';
            }
            echo '</table></body></html>';
            exit;
        }

        // 2. PDF (.pdf) PRINTABLE DOCUMENT OUTPUT
        if ($format === 'pdf') {
            header('Content-Type: text/html; charset=utf-8');
            ?>
            <!DOCTYPE html>
            <html>
            <head>
              <meta charset="UTF-8">
              <title><?= htmlspecialchars($moduleTitle) ?> Report - PDF</title>
              <style>
                body { font-family: 'Helvetica Neue', Arial, sans-serif; padding: 20px; color: #0f172a; }
                .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #2563eb; padding-bottom: 12px; margin-bottom: 20px; }
                h1 { margin: 0; font-size: 20px; color: #0f172a; }
                .meta { font-size: 12px; color: #64748b; }
                table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 11px; }
                th, td { border: 1px solid #cbd5e1; padding: 8px; text-align: left; word-break: break-word; }
                th { background-color: #f1f5f9; color: #1e293b; font-weight: bold; text-transform: uppercase; }
                tr:nth-child(even) { background-color: #f8fafc; }
                @media print {
                  @page { size: landscape; margin: 10mm; }
                  .no-print { display: none; }
                }
                .btn-print { background: #2563eb; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: bold; }
              </style>
            </head>
            <body>
              <div class="header">
                <div>
                  <h1><?= htmlspecialchars($moduleTitle) ?> - Executive Summary Report</h1>
                  <div class="meta">Generated on <?= date('d M Y, h:i A') ?> | Total Records: <?= count($filteredRows) ?></div>
                </div>
                <div class="no-print">
                  <button class="btn-print" onclick="window.print()">Print / Save as PDF</button>
                </div>
              </div>
              <table>
                <thead>
                  <?php if (!empty($filteredRows)): ?>
                    <tr>
                      <?php foreach (array_keys($filteredRows[0]) as $col): ?>
                        <th><?= htmlspecialchars(strtoupper(str_replace('_', ' ', $col))) ?></th>
                      <?php endforeach; ?>
                    </tr>
                  <?php endif; ?>
                </thead>
                <tbody>
                  <?php foreach ($filteredRows as $row): ?>
                    <tr>
                      <?php foreach ($row as $val): ?>
                        <td><?= nl2br(htmlspecialchars($val)) ?></td>
                      <?php endforeach; ?>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <script>
                window.onload = function() {
                  setTimeout(function() { window.print(); }, 500);
                };
              </script>
            </body>
            </html>
            <?php
            exit;
        }

        // 3. POWERPOINT (.ppt) PRESENTATION SLIDES OUTPUT
        if ($format === 'ppt') {
            header('Content-Type: application/vnd.ms-powerpoint; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . $filename . '.ppt"');
            header('Cache-Control: max-age=0');

            echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:powerpoint" xmlns="http://www.w3.org/TR/REC-html40">';
            echo '<head><meta charset="UTF-8">';
            echo '<style>';
            echo 'body { font-family: Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 20px; }';
            echo '.slide { background: #ffffff; border: 2px solid #2563eb; border-radius: 12px; padding: 30px; margin-bottom: 30px; page-break-after: always; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }';
            echo '.slide-title { color: #0f172a; font-size: 22px; font-weight: bold; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 20px; }';
            echo '.grid { display: table; width: 100%; table-layout: fixed; }';
            echo '.row { display: table-row; }';
            echo '.cell-label { display: table-cell; font-weight: bold; color: #475569; padding: 6px 12px; width: 30%; background: #f1f5f9; border-bottom: 1px solid #e2e8f0; }';
            echo '.cell-value { display: table-cell; color: #0f172a; padding: 6px 12px; border-bottom: 1px solid #e2e8f0; }';
            echo '</style></head><body>';

            echo '<div class="slide">';
            echo '<div class="slide-title" style="font-size: 28px; text-align: center; margin-top: 80px;">' . htmlspecialchars($moduleTitle) . ' Briefing Presentation</div>';
            echo '<p style="text-align: center; color: #64748b;">Generated Date: ' . date('d M Y') . ' | Total Items: ' . count($filteredRows) . '</p>';
            echo '</div>';

            foreach ($filteredRows as $index => $row) {
                $mainTitle = $row['company_name'] ?? $row['vendor_name'] ?? $row['full_name'] ?? ('Record #' . ($index + 1));
                echo '<div class="slide">';
                echo '<div class="slide-title">Item ' . ($index + 1) . ': ' . htmlspecialchars($mainTitle) . '</div>';
                echo '<div class="grid">';
                foreach ($row as $k => $v) {
                    echo '<div class="row">';
                    echo '<div class="cell-label">' . htmlspecialchars(strtoupper(str_replace('_', ' ', $k))) . '</div>';
                    echo '<div class="cell-value">' . nl2br(htmlspecialchars($v)) . '</div>';
                    echo '</div>';
                }
                echo '</div></div>';
            }

            echo '</body></html>';
            exit;
        }
    }
}

if (file_exists('dmt_navbar.php')) {
    include 'dmt_navbar.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive Dynamic Reporting System</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --bg-color: #f8fafc;
      --card-bg: #ffffff;
      --border-color: #e2e8f0;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --primary-navy: #0f172a;
      --primary-blue: #2563eb;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Plus Jakarta Sans', sans-serif; }
    body { background-color: var(--bg-color); color: var(--text-main); padding: 24px; -webkit-font-smoothing: antialiased; }

    .dashboard-container { max-width: 100%; margin: 0 auto; }

    /* Utility Header */
    .d-flex { display: flex; }
    .justify-content-between { justify-content: space-between; }
    .align-items-center { align-items: center; }
    .gap-3 { gap: 0.75rem; }
    .gap-2 { gap: 0.5rem; }
    .mb-1 { margin-bottom: 0.25rem; }
    .mb-3 { margin-bottom: 1rem; }
    .mb-4 { margin-bottom: 1.25rem; }
    .m-0 { margin: 0; }
    .me-1 { margin-right: 0.25rem; }
    .fw-bold { font-weight: 700; }
    .text-muted { color: var(--text-muted); }
    .text-dark { color: #0f172a; }
    .text-uppercase { text-transform: uppercase; }
    .small { font-size: 0.85rem; }
    .extra-small { font-size: 0.6875rem; letter-spacing: 0.04em; font-weight: 700; }
    .fs-3 { font-size: 1.35rem; line-height: 1.2; }

    .header-badge {
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid var(--border-color);
      border-radius: 9999px;
      padding: 6px 16px; font-size: 12.5px; font-weight: 600; color: #475569;
    }

    /* Dynamic Module Nav Tabs */
    .module-nav-container {
      display: flex; gap: 8px; overflow-x: auto; padding: 6px;
      background: #f1f5f9; border-radius: 12px; border: 1px solid var(--border-color);
      margin-bottom: 20px; scrollbar-width: none;
    }
    .module-nav-container::-webkit-scrollbar { display: none; }

    .module-tab-btn {
      display: flex; align-items: center; gap: 10px; padding: 10px 18px;
      font-size: 13px; font-weight: 600; color: var(--text-muted);
      background: transparent; border: none; border-radius: 8px;
      cursor: pointer; transition: all 0.2s ease; white-space: nowrap;
    }

    .module-tab-btn i { font-size: 14px; opacity: 0.7; }
    .module-tab-btn:hover { color: var(--primary-navy); background: rgba(255, 255, 255, 0.6); }

    .module-tab-btn.active {
      background: #ffffff; color: var(--primary-blue);
      box-shadow: 0 2px 4px rgba(15, 23, 42, 0.06); font-weight: 700;
    }

    .module-tab-btn.active i { color: var(--primary-blue); opacity: 1; }

    .tab-badge {
      font-size: 11px; padding: 2px 8px; border-radius: 9999px;
      background: #e2e8f0; color: #475569; font-weight: 700;
    }

    .module-tab-btn.active .tab-badge { background: #dbeafe; color: #1e40af; }

    /* Module-Specific Dynamic KPI Grid */
    .row { display: flex; flex-wrap: wrap; margin-left: -0.5rem; margin-right: -0.5rem; }
    .g-3 > [class*="col-"] { padding-left: 0.5rem; padding-right: 0.5rem; }
    .col-md-3 { flex: 0 0 25%; max-width: 25%; }

    @media (max-width: 992px) { .col-md-3 { flex: 0 0 50%; max-width: 50%; margin-bottom: 0.75rem; } }
    @media (max-width: 576px) { .col-md-3 { flex: 0 0 100%; max-width: 100%; } }

    .kpi-card {
      background: #ffffff; border: 1px solid var(--border-color);
      border-radius: 12px; padding: 14px 18px; position: relative;
      overflow: hidden; transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }

    .kpi-card:hover { transform: translateY(-2px); box-shadow: 0 8px 16px -4px rgba(15, 23, 42, 0.08); border-color: #cbd5e1; }
    .kpi-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; }

    .kpi-card.blue::before { background: linear-gradient(90deg, #3b82f6, #60a5fa); }
    .kpi-card.green::before { background: linear-gradient(90deg, #10b981, #34d399); }
    .kpi-card.amber::before { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
    .kpi-card.cyan::before { background: linear-gradient(90deg, #06b6d4, #22d3ee); }

    .kpi-icon {
      width: 42px; height: 42px; min-width: 42px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center; font-size: 16px;
    }

    .kpi-icon.blue { background: rgba(59, 130, 246, 0.1); color: #2563eb; }
    .kpi-icon.green { background: rgba(16, 185, 129, 0.1); color: #059669; }
    .kpi-icon.amber { background: rgba(245, 158, 11, 0.1); color: #d97706; }
    .kpi-icon.cyan { background: rgba(6, 182, 212, 0.1); color: #0891b2; }

    /* Rating Progress Bar */
    .rating-container { display: flex; align-items: center; gap: 8px; width: 120px; }
    .rating-bar-bg { flex-grow: 1; height: 6px; background: #e2e8f0; border-radius: 9999px; overflow: hidden; }
    .rating-bar-fill { height: 100%; background: linear-gradient(90deg, #2563eb, #3b82f6); border-radius: 9999px; }
    .rating-value { font-size: 12px; font-weight: 700; color: var(--text-main); min-width: 28px; }

    /* Tier Badges */
    .badge-tier { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 700; }
    .badge-conventional { background: #f1f5f9; color: #475569; }
    .badge-newcomer { background: #dbeafe; color: #1e40af; }
    .badge-silver { background: #e0f2fe; color: #0369a1; }
    .badge-gold { background: #fef3c7; color: #92400e; }
    .badge-platinum { background: #f3e8ff; color: #6b21a8; }

    /* Main Section Container */
    .main-card {
      background: var(--card-bg); border-radius: 16px;
      border: 1px solid var(--border-color); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
      padding: 20px;
    }

    .toolbar-header { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 16px; flex-wrap: wrap; }
    .toolbar-left { display: flex; align-items: center; gap: 12px; flex-grow: 1; max-width: 720px; }

    .filter-select {
      padding: 9px 14px; font-size: 13.5px; font-weight: 600;
      border: 1px solid var(--border-color); border-radius: 8px;
      background-color: #fff; color: var(--text-main); outline: none;
      cursor: pointer; min-width: 200px; transition: all 0.2s ease;
    }

    .search-container { position: relative; flex-grow: 1; }
    .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8; width: 15px; height: 15px; }

    .search-input {
      width: 100%; padding: 9px 14px 9px 36px; font-size: 13.5px;
      border: 1px solid var(--border-color); border-radius: 8px; outline: none; background-color: #fff;
    }

    .toolbar-right { display: flex; align-items: center; gap: 10px; }

    .btn {
      display: inline-flex; align-items: center; gap: 8px; padding: 9px 16px;
      font-size: 13px; font-weight: 600; border-radius: 8px; cursor: pointer;
      border: 1px solid transparent; transition: all 0.2s;
    }

    .btn-edit { background-color: #ffffff; color: #0f172a; border-color: var(--border-color); }
    .btn-close-edit { background-color: #10b981; color: #ffffff; border-color: #10b981; }

    /* Multi-Format Export Dropdown */
    .export-dropdown { position: relative; display: inline-block; }
    .btn-export-main {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: #ffffff; border: none; font-weight: 700;
    }
    .btn-export-main:hover { background: linear-gradient(135deg, #1d4ed8, #1e40af); }
    
    .export-menu {
      position: absolute; right: 0; top: 105%; background: #ffffff;
      border: 1px solid var(--border-color); border-radius: 10px;
      box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); display: none;
      min-width: 170px; z-index: 100; overflow: hidden; padding: 6px 0;
    }
    .export-menu.show { display: block; }
    .export-item {
      display: flex; align-items: center; gap: 10px; padding: 10px 16px;
      font-size: 13px; font-weight: 600; color: #334155; text-decoration: none;
      transition: background 0.15s ease; cursor: pointer;
    }
    .export-item:hover { background-color: #f1f5f9; color: var(--primary-blue); }
    .export-item i { width: 16px; font-size: 14px; text-align: center; }

    /* Dynamic Table */
    .table-wrapper { width: 100%; overflow-x: auto; border: 1px solid var(--border-color); border-radius: 10px; position: relative; }
    table { width: 100%; border-collapse: separate; border-spacing: 0; white-space: nowrap; font-size: 13px; }
    th {
      background-color: #f8fafc; color: #475569; font-weight: 700;
      font-size: 11px; letter-spacing: 0.04em; text-transform: uppercase;
      text-align: left; padding: 12px 16px; border-bottom: 1px solid var(--border-color);
    }

    td { padding: 12px 16px; border-bottom: 1px solid #f1f5f9; color: #334155; vertical-align: middle; }
    tbody tr:hover { background-color: #f8fafc; }

    .id-badge { display: inline-block; padding: 2px 7px; background: #eff6ff; color: #2563eb; font-weight: 700; border-radius: 5px; font-size: 12px; }
    .primary-title { font-weight: 700; color: #0f172a; }

    /* Status Badges */
    .badge-pill { display: inline-flex; align-items: center; gap: 5px; padding: 3px 9px; border-radius: 9999px; font-size: 11px; font-weight: 600; }
    .badge-pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; }

    .badge-pass { background: #dcfce7; color: #15803d; } .badge-pass::before { background: #16a34a; }
    .badge-fail { background: #fee2e2; color: #b91c1c; } .badge-fail::before { background: #dc2626; }
    .badge-pending { background: #fef3c7; color: #b45309; } .badge-pending::before { background: #d97706; }
    .badge-submitted { background: #e0f2fe; color: #0369a1; } .badge-submitted::before { background: #0284c7; }
    .badge-completed { background: #dcfce7; color: #15803d; } .badge-completed::before { background: #16a34a; }
    .badge-progress { background: #e0e7ff; color: #3730a3; } .badge-progress::before { background: #4f46e5; }
    .badge-reviewed { background: #dcfce7; color: #15803d; } .badge-reviewed::before { background: #16a34a; }
    .badge-not-reviewed { background: #fee2e2; color: #b91c1c; } .badge-not-reviewed::before { background: #dc2626; }

    /* Editable Controls */
    .edit-select {
      width: 100%; min-width: 150px;
      padding: 6px 10px; font-size: 12.5px; border: 1px solid #cbd5e1;
      border-radius: 6px; background-color: #ffffff; color: var(--text-main); outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
    }
    .edit-textarea {
      width: 100%; min-width: 240px; min-height: 70px;
      padding: 8px 10px; font-size: 12.5px; line-height: 1.4; border: 1px solid #cbd5e1;
      border-radius: 6px; background-color: #ffffff; color: var(--text-main); outline: none;
      font-family: inherit; resize: vertical; transition: border-color 0.2s, box-shadow 0.2s;
    }
    .edit-select:focus, .edit-textarea:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.15);
    }

    #toastNotice {
      position: fixed; bottom: 24px; right: 24px; background: #0f172a; color: #fff;
      padding: 10px 18px; border-radius: 8px; font-size: 13px; font-weight: 600;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); opacity: 0; pointer-events: none;
      transition: opacity 0.3s ease; z-index: 1000; display: flex; align-items: center; gap: 8px;
    }
    #toastNotice.show { opacity: 1; }

    .pagination-bar { display: flex; justify-content: space-between; align-items: center; margin-top: 16px; font-size: 13px; color: var(--text-muted); }
    .pagination-right { display: flex; align-items: center; gap: 6px; }

    .page-btn {
      width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;
      border: 1px solid var(--border-color); border-radius: 6px; background: #ffffff;
      color: var(--text-main); cursor: pointer; font-weight: 600;
    }
    .page-btn.active { background: var(--primary-navy); color: #ffffff; border-color: var(--primary-navy); }
    .per-page-select { padding: 6px 10px; border: 1px solid var(--border-color); border-radius: 6px; background: #fff; font-size: 12.5px; color: var(--text-main); }
  </style>
</head>
<body>

<div class="dashboard-container">

  <!-- Executive Header -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h2 class="fw-bold mb-1" id="headerTitle" style="color: var(--primary-navy); letter-spacing: -0.02em;">Executive Reporting Dashboard</h2>
      <p class="text-muted small m-0" id="headerSub">Dynamic module tabs with customized data schemas and multi-format reporting options.</p>
    </div>
    <div class="d-flex align-items-center gap-3">
      <div class="header-badge">
        <i class="fa-regular fa-clock me-1 text-primary"></i> Sync: <strong class="text-dark"><?= $dataUpdated ?></strong>
      </div>
    </div>
  </div>

  <!-- Dynamic Module Navigation Tabs -->
  <div class="module-nav-container">
    <button class="module-tab-btn active" data-cat="1">
      <i class="fa-solid fa-clipboard-check"></i>
      <span>OSFA</span>
      <span class="tab-badge" id="tabBadge1"><?= count($_SESSION['mockData'][1] ?? []) ?></span>
    </button>
    <button class="module-tab-btn" data-cat="2">
      <i class="fa-solid fa-diagram-project"></i>
      <span>Projects</span>
      <span class="tab-badge" id="tabBadge2"><?= count($_SESSION['mockData'][2] ?? []) ?></span>
    </button>
    <button class="module-tab-btn" data-cat="3">
      <i class="fa-solid fa-industry"></i>
      <span>Smart Factory Recognition</span>
      <span class="tab-badge" id="tabBadge3"><?= count($_SESSION['mockData'][3] ?? []) ?></span>
    </button>
    <button class="module-tab-btn" data-cat="4">
      <i class="fa-solid fa-lightbulb"></i>
      <span>Crowd Innovators</span>
      <span class="tab-badge" id="tabBadge4"><?= count($_SESSION['mockData'][4] ?? []) ?></span>
    </button>
    <button class="module-tab-btn" data-cat="5">
      <i class="fa-solid fa-user-check"></i>
      <span>Assessors</span>
      <span class="tab-badge" id="tabBadge5"><?= count($_SESSION['mockData'][5] ?? []) ?></span>
    </button>
    <button class="module-tab-btn" data-cat="6">
      <i class="fa-solid fa-user-tie"></i>
      <span>Project Managers</span>
      <span class="tab-badge" id="tabBadge6"><?= count($_SESSION['mockData'][6] ?? []) ?></span>
    </button>
  </div>

  <!-- Dynamic Module KPI Cards Grid -->
  <div class="row g-3 mb-4" id="moduleKpiRow">
    <div class="col-md-3">
      <div class="kpi-card blue d-flex align-items-center gap-3">
        <div class="kpi-icon blue" id="kpiIcon1"><i class="fa-solid fa-layer-group"></i></div>
        <div>
          <div class="text-muted extra-small text-uppercase" id="kpiLabel1">Total Records</div>
          <div class="fs-3 fw-bold text-dark" id="kpiVal1">0</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="kpi-card green d-flex align-items-center gap-3">
        <div class="kpi-icon green" id="kpiIcon2"><i class="fa-solid fa-circle-check"></i></div>
        <div>
          <div class="text-muted extra-small text-uppercase" id="kpiLabel2">Metric 2</div>
          <div class="fs-3 fw-bold text-dark" id="kpiVal2">0</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="kpi-card amber d-flex align-items-center gap-3">
        <div class="kpi-icon amber" id="kpiIcon3"><i class="fa-solid fa-hourglass-half"></i></div>
        <div>
          <div class="text-muted extra-small text-uppercase" id="kpiLabel3">Metric 3</div>
          <div class="fs-3 fw-bold text-dark" id="kpiVal3">0</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="kpi-card cyan d-flex align-items-center gap-3">
        <div class="kpi-icon cyan" id="kpiIcon4"><i class="fa-solid fa-file-circle-check"></i></div>
        <div>
          <div class="text-muted extra-small text-uppercase" id="kpiLabel4">Metric 4</div>
          <div class="fs-3 fw-bold text-dark" id="kpiVal4">0</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Data Section -->
  <div class="main-card">
    
    <!-- Toolbar Header -->
    <div class="toolbar-header">
      <div class="toolbar-left">

        <!-- Module 1: OSFA Filter Dropdown -->
        <select id="osfaFilterSelect" class="filter-select">
          <option value="all" selected>Filter: All OSFA Statuses</option>
          <option value="paid">OSFA Paid</option>
          <option value="submitted">OSFA Report Submitted</option>
          <option value="accepted">OSFA Report Accepted</option>
        </select>

        <!-- Module 3: Recognition Tier Selection Dropdown Filter -->
        <select id="tierFilterSelect" class="filter-select" style="display: none;">
          <option value="all" selected>Filter: All Recognition Tiers</option>
          <option value="conventional">Conventional</option>
          <option value="newcomer">Newcomer</option>
          <option value="silver">Silver</option>
          <option value="gold">Gold</option>
          <option value="platinum">Platinum</option>
        </select>

        <!-- Module 4: Review Status Selection Dropdown Filter -->
        <select id="m4FilterSelect" class="filter-select" style="display: none;">
          <option value="all" selected>Filter: All (Reviewed & Not Reviewed)</option>
          <option value="reviewed">Reviewed</option>
          <option value="not_reviewed">Not Reviewed</option>
        </select>

        <!-- Global Search Input -->
        <div class="search-container">
          <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 0 0114 0z"/>
          </svg>
          <input type="text" id="searchInput" class="search-input" placeholder="Search record...">
        </div>
      </div>

      <div class="toolbar-right">
        <!-- Variable Multi-Format Export Dropdown -->
        <div class="export-dropdown">
          <button class="btn btn-export-main" id="exportToggleBtn">
            <i class="fa-solid fa-download"></i> Export As... <i class="fa-solid fa-chevron-down" style="font-size:11px; margin-left:4px;"></i>
          </button>
          <div class="export-menu" id="exportMenu">
            <div class="export-item" data-format="xls">
              <i class="fa-solid fa-file-excel" style="color:#10b981;"></i> Excel (.xls)
            </div>
            <div class="export-item" data-format="pdf">
              <i class="fa-solid fa-file-pdf" style="color:#ef4444;"></i> PDF Document (.pdf)
            </div>
            <div class="export-item" data-format="ppt">
              <i class="fa-solid fa-file-powerpoint" style="color:#f97316;"></i> PowerPoint (.ppt)
            </div>
          </div>
        </div>

        <button class="btn btn-edit" id="toggleEditBtn">
          <i class="fa-solid fa-pen-to-square"></i> Edit
        </button>
      </div>
    </div>

    <!-- Dynamic Table Wrapper -->
    <div class="table-wrapper">
      <table>
        <thead id="tableHeader"></thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>

    <!-- Pagination Bar -->
    <div class="pagination-bar">
      <div id="entriesSummary">Showing 0 entries</div>
      <div class="pagination-right">
        <button class="page-btn" id="prevBtn">&lt;</button>
        <button class="page-btn active" id="pageOneBtn">1</button>
        <button class="page-btn" id="nextBtn">&gt;</button>

        <select id="perPageSelect" class="per-page-select">
          <option value="100" selected>100 / pag</option>
          <option value="50">50 / pag</option>
          <option value="25">25 / pag</option>
        </select>
      </div>
    </div>

  </div>
</div>

<div id="toastNotice">
  <i class="fa-solid fa-circle-check" style="color:#34d399;"></i>
  <span id="toastMsg">Updated successfully</span>
</div>

<script>
// Module Column Schemas & Headers Configuration
const MODULE_SCHEMAS = {
  '1': {
    title: 'OSFA Overview',
    subtitle: 'Dynamic module tabs with customized data schemas and multi-format reporting options.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'company_id', label: 'COMPANY ID', badge: true },
      { key: 'company_name', label: 'COMPANY NAME', bold: true },
      { key: 'type_of_industry', label: 'TYPE OF INDUSTRY', editable: 'industry' },
      { key: 'sector', label: 'SECTOR', editable: 'sector' },
      { key: 'date_submit_sa', label: 'D1 - DATE SUBMIT SA' },
      { key: 'rating_before_osfa', label: 'RATING BEFORE OSFA (%)' },
      { key: 'recognition_scheme_before', label: 'RECOGNITION SCHEME BEFORE OSFA' },
      { key: 'self_assessment_status', label: 'SA STATUS', format: 'badge' },
      { key: 'date_agree_nda', label: 'D2 - DATE AGREE NDA' },
      { key: 'date_submit_docs_loan', label: 'D3 - SUBMIT DOCS LOAN' },
      { key: 'date_fi_respond_deadline', label: 'D4 - FI RESPOND DEADLINE' },
      { key: 'date_fi_give_response', label: 'D5 - DATE FI GIVE RESPONSE' },
      { key: 'elapsed_days_fi', label: 'ELAPSED DAYS' },
      { key: 'status_fi_response', label: 'STATUS FI RESPONSE', format: 'badge' },
      { key: 'osfa_payment_made', label: 'OSFA PAYMENT MADE' },
      { key: 'osfa_conducted', label: 'OSFA CONDUCTED' },
      { key: 'rating_after_osfa', label: 'RATING AFTER OSFA (%)' },
      { key: 'recognition_scheme_after', label: 'RECOGNITION SCHEME AFTER OSFA' },
      { key: 'date_osfa_paid', label: 'D6 - DATE OSFA PAID' },
      { key: 'lead_assessor', label: 'LEAD ASSESSOR' },
      { key: 'assessor', label: 'ASSESSOR' },
      { key: 'ssor', label: 'SSOR' },
      { key: 'date_first_conduct_osfa', label: 'D7 - DATE FIRST CONDUCT OSFA' },
      { key: 'date_second_conduct_osfa', label: 'D8 - DATE SECOND CONDUCT OSFA' },
      { key: 'date_conduct_osfa', label: 'D9 - DATE CONDUCT OSFA' },
      { key: 'date_osfa_report_deadline', label: 'D10 - OSFA REPORT DEADLINE' },
      { key: 'date_submit_osfa_report', label: 'D11 - DATE SUBMIT OSFA REPORT' },
      { key: 'elapsed_days_osfa_report', label: 'ELAPSED DAYS (REPORT)' },
      { key: 'status_submission', label: 'REPORT SUBMISSION', format: 'badge' },
      { key: 'status', label: 'STATUS', editable: 'status' },
      { key: 'action_plan', label: 'ACTION PLAN', editable: 'action_plan' }
    ]
  },
  '2': {
    title: 'Projects Dashboard',
    subtitle: 'Comprehensive tracking of tech implementation, grant allocations, and milestone reviews.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'company_id', label: 'COMPANY ID', badge: true },
      { key: 'company_name', label: 'COMPANY NAME', bold: true },
      { key: 'industry_type', label: 'TYPE OF INDUSTRY', editable: 'industry' },
      { key: 'sector', label: 'SECTOR', editable: 'sector' },
      { key: 'project_initiation', label: 'PROJECT INITIATION' },
      { key: 'pre-approval_amount', label: 'PRE-APPROVAL AMOUNT' },
      { key: 'actual_amount', label: 'ACTUAL AMOUNT' },
      { key: 'project_manager', label: 'PROJECT MANAGER' },
      { key: 'section', label: 'SECTION' },
      { key: 'project_title', label: 'PROJECT TITLE' },
      { key: 'grant_amount_commited', label: 'GRANT AMOUNT COMMITTED' },
      { key: 'grant_amount_approved', label: 'GRANT AMOUNT APPROVED' },
      { key: 'grant_amount_disbursed', label: 'GRANT AMOUNT DISBURSED' },
      { key: 'revenue_realised', label: 'REVENUE REALISED' },
      { key: 'review_date', label: 'REVIEW DATE' },
      { key: 'date_company_accept_report', label: 'DATE COMPANY ACCEPT REPORT' },
      { key: 'date_paid_submit_finance', label: 'DATE PAID SUBMIT FINANCE' },
      { key: 'lead_assessor_s', label: 'LEAD ASSESSOR (SYSTEM)' },
      { key: 'assessor_s', label: 'ASSESSOR (SYSTEM)' },
      { key: 'lead_assessor_rm', label: 'LEAD ASSESSOR (RM)' },
      { key: 'assessor_rm', label: 'ASSESSOR (RM)' },
      { key: 'reviewer_gm_rm', label: 'REVIEWER GM (RM)' },
      { key: 'date_project_initiation', label: 'DATE PROJECT INITIATION' },
      { key: 'date_offerletter_issued', label: 'DATE OFFER LETTER ISSUED' },
      { key: 'date_assign_pm', label: 'DATE ASSIGN PM' },
      { key: 'date_pm_accept_proposal', label: 'DATE PM ACCEPT PROPOSAL' },
      { key: 'date_pm_submit_proposal', label: 'DATE PM SUBMIT PROPOSAL' },
      { key: 'date_pm_approve_proposal', label: 'DATE PM APPROVE PROPOSAL' },
      { key: 'date_project_close', label: 'DATE PROJECT CLOSE' },
      { key: 'status', label: 'STATUS / STATS', editable: 'status' },
      { key: 'action_plan', label: 'ACTION', editable: 'action_plan' }
    ]
  },
  '3': {
    title: 'Smart Factory Recognition',
    subtitle: 'Recognition tier classification and assessment analytics breakdown.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'company_id', label: 'COMPANY ID', badge: true },
      { key: 'company_name', label: 'COMPANY NAME', bold: true },
      { key: 'industry_type', label: 'INDUSTRY TYPE', editable: 'industry' },
      { key: 'sector', label: 'SECTOR', editable: 'sector' },
      { key: 'recognition_tier', label: 'RECOGNITION TIER', format: 'tier' },
      { key: 'rating_after_osfa', label: 'RATING AFTER OSFA', format: 'rating' },
      { key: 'audit_status', label: 'AUDIT STATUS', format: 'badge' },
      { key: 'action', label: 'ACTION' }
    ]
  },
  '4': {
    title: 'Crowd Innovators',
    subtitle: 'Directory of SMEs and startups contributing to IR4.0 solutions.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'ci_code', label: 'CI CODE', badge: true },
      { key: 'myep_id', label: 'MYEP ID' },
      { key: 'vendor_name', label: 'VENDOR NAME', bold: true },
      { key: 'application_date', label: 'APPLICATION DATE' },
      { key: 'contact_person', label: 'CONTACT PERSON' },
      { key: 'email_contact_person', label: 'EMAIL' },
      { key: 'handphone_contact_person', label: 'PHONE' },
      { key: 'entity_type', label: 'ENTITY TYPE' },
      { key: 'business_sector', label: 'BUSINESS SECTOR' },
      { key: 'pillar_ir4.0', label: 'PILLAR IR4.0' },
      { key: 'review_status', label: 'REVIEW STATUS', format: 'badge', editable: 'review_status' }
    ]
  },
  '5': {
    title: 'Assessors Directory',
    subtitle: 'Qualified assessors list, domain expertise, and accreditation records.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'assessor_id', label: 'ASSESSOR ID', badge: true },
      { key: 'full_name', label: 'FULL NAME', bold: true },
      { key: 'email', label: 'EMAIL' },
      { key: 'department', label: 'DEPARTMENT' },
      { key: 'section', label: 'SECTION' },
      { key: 'expertise', label: 'EXPERTISE' },
      { key: 'smart_technology', label: 'SMART TECHNOLOGY' },
      { key: 'experience', label: 'EXPERIENCE' },
      { key: 'education_quilification', label: 'EDUCATION AND QUALIFICATION', editable: 'textarea' },
      { key: 'work_experience', label: 'WORK EXPERIENCE', editable: 'textarea' },
      { key: 'professional_competency', label: 'PROFESSIONAL COMPETENCIES', editable: 'textarea' },
      { key: 'professional_membership', label: 'PROFESSIONAL MEMBERSHIPS', editable: 'textarea' }
    ]
  },
  '6': {
    title: 'Project Managers',
    subtitle: 'Project leadership directory, certifications, and operational coverage.',
    columns: [
      { key: 'no', label: 'NO.' },
      { key: 'pm_id', label: 'PM ID', badge: true },
      { key: 'full_name', label: 'FULL NAME', bold: true },
      { key: 'email', label: 'EMAIL' },
      { key: 'department', label: 'DEPARTMENT' },
      { key: 'section', label: 'SECTION' },
      { key: 'expertise', label: 'EXPERTISE' },
      { key: 'smart_technology', label: 'SMART TECHNOLOGY' },
      { key: 'experience', label: 'EXPERIENCE' },
      { key: 'education_quilification', label: 'EDUCATION AND QUALIFICATION', editable: 'textarea' },
      { key: 'work_experience', label: 'WORK EXPERIENCE', editable: 'textarea' },
      { key: 'professional_competency', label: 'PROFESSIONAL COMPETENCIES', editable: 'textarea' },
      { key: 'professional_membership', label: 'PROFESSIONAL MEMBERSHIPS', editable: 'textarea' }
    ]
  }
};

let currentState = {
  category: '1',
  search: '',
  osfaFilter: 'all',
  tierFilter: 'all',
  m4Filter: 'all',
  page: 1,
  perPage: 100,
  totalRecords: 0,
  isEditMode: false
};

const tableHeader = document.getElementById('tableHeader');
const tableBody   = document.getElementById('tableBody');

function renderTableHeader() {
  const schema = MODULE_SCHEMAS[currentState.category] || MODULE_SCHEMAS['1'];
  
  const titleEl = document.getElementById('headerTitle');
  const subEl   = document.getElementById('headerSub');
  if (titleEl) titleEl.textContent = schema.title || 'Executive Reporting Dashboard';
  if (subEl) subEl.textContent = schema.subtitle || '';

  tableHeader.innerHTML = `<tr>${schema.columns.map(col => `<th>${col.label}</th>`).join('')}</tr>`;
}

function renderBadge(val) {
  if (!val || val === '-') return '-';
  const lower = String(val).toLowerCase();

  if (lower === 'pass' || lower === 'passed' || lower === 'completed' || lower === 'active') {
    return `<span class="badge-pill badge-pass">${val}</span>`;
  }
  if (lower === 'fail' || lower === 'failed' || lower === 'rejected') {
    return `<span class="badge-pill badge-fail">${val}</span>`;
  }
  if (lower === 'pending' || lower === 'in progress' || lower === 'on hold') {
    return `<span class="badge-pill badge-pending">${val}</span>`;
  }
  if (lower === 'submitted') {
    return `<span class="badge-pill badge-submitted">${val}</span>`;
  }
  if (lower === 'reviewed') {
    return `<span class="badge-pill badge-reviewed"><i class="fa-solid fa-check me-1"></i> ${val}</span>`;
  }
  if (lower === 'not reviewed') {
    return `<span class="badge-pill badge-not-reviewed"><i class="fa-solid fa-clock me-1"></i> ${val}</span>`;
  }
  return `<span class="badge-pill badge-progress">${val}</span>`;
}

function renderTierBadge(tierVal) {
  if (!tierVal || tierVal === '-') return '-';
  const t = String(tierVal).trim();
  const lower = t.toLowerCase();

  if (lower === 'conventional') {
    return `<span class="badge-tier badge-conventional"><i class="fa-solid fa-industry"></i> ${t}</span>`;
  }
  if (lower === 'newcomer') {
    return `<span class="badge-tier badge-newcomer"><i class="fa-solid fa-seedling"></i> ${t}</span>`;
  }
  if (lower === 'silver') {
    return `<span class="badge-tier badge-silver"><i class="fa-solid fa-medal"></i> ${t}</span>`;
  }
  if (lower === 'gold') {
    return `<span class="badge-tier badge-gold"><i class="fa-solid fa-crown"></i> ${t}</span>`;
  }
  if (lower === 'platinum') {
    return `<span class="badge-tier badge-platinum"><i class="fa-solid fa-gem"></i> ${t}</span>`;
  }

  return `<span class="badge-tier badge-conventional">${t}</span>`;
}

function renderRatingBar(ratingVal) {
  if (!ratingVal || ratingVal === '-') return '-';
  const num = parseFloat(String(ratingVal).replace('%', '')) || 0;
  const clamped = Math.min(100, Math.max(0, num));
  
  return `
    <div class="rating-container">
      <div class="rating-bar-bg">
        <div class="rating-bar-fill" style="width: ${clamped}%;"></div>
      </div>
      <span class="rating-value">${clamped}%</span>
    </div>
  `;
}

function renderEditableInput(recordId, editableType, field, currentValue) {
  const val = currentValue ?? '';

  if (editableType === 'textarea') {
    return `<textarea class="edit-textarea" data-id="${recordId}" data-field="${field}" placeholder="Enter details...">${val}</textarea>`;
  }

  let options = [];
  if (editableType === 'industry') {
    options = ['MANUFACTURING', 'SERVICES', 'CONSTRUCTION', 'ENERGY', 'TECHNOLOGY', 'AGRICULTURE', 'OTHERS'];
  } else if (editableType === 'sector') {
    options = ['Food Processing', 'Automotive', 'Electronics', 'Chemicals', 'Renewable Energy', 'Commercial Construction', 'Software', 'General'];
  } else if (editableType === 'status') {
    options = ['Active', 'In Progress', 'Pending', 'Completed', 'On Hold', 'Archived', 'Rejected'];
  } else if (editableType === 'review_status') {
    options = ['Reviewed', 'Not Reviewed'];
  } else if (editableType === 'action_plan' || editableType === 'action') {
    options = ['', 'View Plan', 'Details', 'To continue with follow up', 'Pending Review', 'Assign Assessor', 'Edit Details', 'Export Data', 'Archive'];
  } else {
    return val || '-';
  }

  const optsHtml = options.map(opt => `<option value="${opt}" ${opt === val ? 'selected' : ''}>${opt || '-- Select --'}</option>`).join('');
  return `<select class="edit-select" data-id="${recordId}" data-field="${field}">${optsHtml}</select>`;
}

function renderTableBody(data) {
  const schema = MODULE_SCHEMAS[currentState.category] || MODULE_SCHEMAS['1'];

  if (!data || data.length === 0) {
    tableBody.innerHTML = `<tr><td colspan="${schema.columns.length}" style="text-align:center; padding:32px; color:#94a3b8;">No records found for ${schema.title}</td></tr>`;
    return;
  }

  const offset = (currentState.page - 1) * currentState.perPage;

  tableBody.innerHTML = data.map((row, idx) => {
    const recordId = row.company_id || row.project_id || row.scheme_id || row.ci_code || row.assessor_id || row.pm_id || '';
    
    const cells = schema.columns.map(col => {
      if (col.key === 'no') return `<td>${offset + idx + 1}</td>`;
      if (col.badge) return `<td><span class="id-badge">${row[col.key] || '-'}</span></td>`;
      if (col.bold) return `<td><span class="primary-title">${row[col.key] || '-'}</span></td>`;
      
      if (currentState.isEditMode && col.editable) {
        return `<td>${renderEditableInput(recordId, col.editable, col.key, row[col.key])}</td>`;
      }
      
      if (col.format === 'badge') return `<td>${renderBadge(row[col.key])}</td>`;
      if (col.format === 'tier') return `<td>${renderTierBadge(row[col.key])}</td>`;
      if (col.format === 'rating') return `<td>${renderRatingBar(row[col.key])}</td>`;
      
      if (col.key === 'action_plan' && row[col.key] === 'View Plan') {
        return `<td><a href="#" style="color:#2563eb; font-weight:600;"><i class="fa-regular fa-eye me-1"></i> View Plan</a></td>`;
      }

      if (col.key === 'action') {
        const linkText = row[col.key] || 'Details';
        return `<td><a href="#" style="color:#2563eb; font-weight:600;"><i class="fa-regular fa-eye me-1"></i> ${linkText}</a></td>`;
      }

      const displayVal = row[col.key] ?? '-';
      const formattedVal = typeof displayVal === 'string' ? displayVal.replace(/\n/g, '<br>') : displayVal;

      return `<td>${formattedVal}</td>`;
    }).join('');

    return `<tr>${cells}</tr>`;
  }).join('');

  if (currentState.isEditMode) bindEditEvents();
}

// Update 4 KPI Cards Dynamically for Each Module
function updateDynamicKpiCards(kpiData) {
  if (!kpiData || !Array.isArray(kpiData)) return;

  for (let i = 0; i < 4; i++) {
    const cardInfo = kpiData[i];
    if (!cardInfo) continue;

    const index = i + 1;
    const labelEl = document.getElementById(`kpiLabel${index}`);
    const valEl   = document.getElementById(`kpiVal${index}`);
    const iconEl  = document.getElementById(`kpiIcon${index}`);

    if (labelEl) labelEl.textContent = cardInfo.label || 'Metric';
    if (valEl) valEl.textContent = cardInfo.value ?? '0';
    if (iconEl && cardInfo.icon) {
      iconEl.innerHTML = `<i class="fa-solid ${cardInfo.icon}"></i>`;
    }
  }
}

function updateSummary() {
  const entriesSummary = document.getElementById('entriesSummary');
  const pageOneBtn = document.getElementById('pageOneBtn');
  if (!entriesSummary) return;

  const total = currentState.totalRecords;
  if (total === 0) {
    entriesSummary.textContent = 'Showing 0 entries';
  } else {
    const start = (currentState.page - 1) * currentState.perPage + 1;
    const end = Math.min(start + currentState.perPage - 1, total);
    entriesSummary.textContent = `Showing ${start} to ${end} of ${total} entries`;
  }

  if (pageOneBtn) {
    pageOneBtn.textContent = currentState.page;
  }
}

async function fetchReportData() {
  const query = new URLSearchParams({
    action: 'fetch',
    category: currentState.category,
    search: currentState.search,
    osfa_filter: currentState.osfaFilter,
    tier_filter: currentState.tierFilter,
    m4_filter: currentState.m4Filter,
    page: currentState.page,
    per_page: currentState.perPage
  });

  try {
    const response = await fetch(`${window.location.pathname}?${query.toString()}`);
    if (!response.ok) throw new Error(`HTTP ${response.status}`);
    const res = await response.json();

    currentState.totalRecords = res.total;

    // Update KPI metrics for active module
    if (res.kpi_stats && res.kpi_stats[currentState.category]) {
      updateDynamicKpiCards(res.kpi_stats[currentState.category]);
    }

    // Update dynamic tab badge counts
    if (res.tab_counts) {
      for (const [cat, count] of Object.entries(res.tab_counts)) {
        const badgeEl = document.getElementById(`tabBadge${cat}`);
        if (badgeEl) badgeEl.textContent = count;
      }
    }

    renderTableBody(res.data);
    updateSummary();
  } catch (err) {
    console.error('Data error:', err);
    const schema = MODULE_SCHEMAS[currentState.category] || MODULE_SCHEMAS['1'];
    tableBody.innerHTML = `<tr><td colspan="${schema.columns.length}" style="text-align:center; padding: 24px; color:#ef4444;">Error loading data (${err.message}).</td></tr>`;
  }
}

function updateFilterVisibility() {
  const osfaSelect = document.getElementById('osfaFilterSelect');
  const tierSelect = document.getElementById('tierFilterSelect');
  const m4Select   = document.getElementById('m4FilterSelect');

  if (osfaSelect) osfaSelect.style.display = (currentState.category === '1') ? 'block' : 'none';
  if (tierSelect) tierSelect.style.display = (currentState.category === '3') ? 'block' : 'none';
  if (m4Select)   m4Select.style.display   = (currentState.category === '4') ? 'block' : 'none';
}

function bindTabEvents() {
  document.querySelectorAll('.module-tab-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      document.querySelectorAll('.module-tab-btn').forEach(b => b.classList.remove('active'));
      const targetBtn = e.currentTarget;
      targetBtn.classList.add('active');
      
      currentState.category = targetBtn.getAttribute('data-cat');
      currentState.page = 1;
      currentState.osfaFilter = 'all';
      currentState.tierFilter = 'all';
      currentState.m4Filter   = 'all';

      // Reset dropdown filter choices
      const osfaSelect = document.getElementById('osfaFilterSelect');
      const tierSelect = document.getElementById('tierFilterSelect');
      const m4Select   = document.getElementById('m4FilterSelect');
      if (osfaSelect) osfaSelect.value = 'all';
      if (tierSelect) tierSelect.value = 'all';
      if (m4Select) m4Select.value = 'all';

      updateFilterVisibility();
      renderTableHeader();
      fetchReportData();
    });
  });
}

function bindPaginationEvents() {
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  const perPageSelect = document.getElementById('perPageSelect');

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      if (currentState.page > 1) {
        currentState.page--;
        fetchReportData();
      }
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      const maxPage = Math.ceil(currentState.totalRecords / currentState.perPage);
      if (currentState.page < maxPage) {
        currentState.page++;
        fetchReportData();
      }
    });
  }

  if (perPageSelect) {
    perPageSelect.addEventListener('change', (e) => {
      currentState.perPage = parseInt(e.target.value, 10);
      currentState.page = 1;
      fetchReportData();
    });
  }
}

function bindFilterDropdownEvents() {
  const osfaSelect = document.getElementById('osfaFilterSelect');
  const tierSelect = document.getElementById('tierFilterSelect');
  const m4Select   = document.getElementById('m4FilterSelect');

  if (osfaSelect) {
    osfaSelect.addEventListener('change', (e) => {
      currentState.osfaFilter = e.target.value;
      currentState.page = 1;
      fetchReportData();
    });
  }

  if (tierSelect) {
    tierSelect.addEventListener('change', (e) => {
      currentState.tierFilter = e.target.value;
      currentState.page = 1;
      fetchReportData();
    });
  }

  if (m4Select) {
    m4Select.addEventListener('change', (e) => {
      currentState.m4Filter = e.target.value;
      currentState.page = 1;
      fetchReportData();
    });
  }
}

function bindEditEvents() {
  const updateRecord = async (target) => {
    const recordId = target.getAttribute('data-id');
    const field = target.getAttribute('data-field');
    const value = target.value;

    const body = new URLSearchParams({
      record_id: recordId,
      field: field,
      value: value
    });

    try {
      const res = await fetch(`${window.location.pathname}?action=update&category=${currentState.category}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: body.toString()
      });
      const data = await res.json();
      if (data.status === 'success') {
        showToast('Updated successfully');
      } else {
        alert(data.message || 'Error updating record');
      }
    } catch (err) {
      console.error('Update error:', err);
      alert('Failed to save changes.');
    }
  };

  document.querySelectorAll('.edit-select').forEach(sel => {
    sel.addEventListener('change', (e) => updateRecord(e.target));
  });

  document.querySelectorAll('.edit-textarea').forEach(ta => {
    ta.addEventListener('change', (e) => updateRecord(e.target));
  });
}

function showToast(msg) {
  const toast = document.getElementById('toastNotice');
  const toastMsg = document.getElementById('toastMsg');
  if (!toast) return;
  toastMsg.textContent = msg;
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 3000);
}

document.addEventListener('DOMContentLoaded', () => {
  bindTabEvents();
  bindPaginationEvents();
  bindFilterDropdownEvents();
  updateFilterVisibility();
  renderTableHeader();
  fetchReportData();

  // Search filter handling with debounce
  let searchTimeout = null;
  const searchInput = document.getElementById('searchInput');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(() => {
        currentState.search = e.target.value;
        currentState.page = 1;
        fetchReportData();
      }, 300);
    });
  }

  // Multi-Format Export Menu Handling
  const exportToggleBtn = document.getElementById('exportToggleBtn');
  const exportMenu = document.getElementById('exportMenu');

  if (exportToggleBtn && exportMenu) {
    exportToggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      exportMenu.classList.toggle('show');
    });

    document.addEventListener('click', () => {
      exportMenu.classList.remove('show');
    });

    document.querySelectorAll('.export-item').forEach(item => {
      item.addEventListener('click', (e) => {
        const format = e.currentTarget.getAttribute('data-format');
        const query = new URLSearchParams({
          action: 'export',
          format: format,
          category: currentState.category,
          search: currentState.search,
          osfa_filter: currentState.osfaFilter,
          tier_filter: currentState.tierFilter,
          m4_filter: currentState.m4Filter
        });
        window.open(`${window.location.pathname}?${query.toString()}`, '_blank');
      });
    });
  }

  // Toggle Edit Mode
  const toggleEditBtn = document.getElementById('toggleEditBtn');
  if (toggleEditBtn) {
    toggleEditBtn.addEventListener('click', () => {
      currentState.isEditMode = !currentState.isEditMode;
      if (currentState.isEditMode) {
        toggleEditBtn.classList.remove('btn-edit');
        toggleEditBtn.classList.add('btn-close-edit');
        toggleEditBtn.innerHTML = '<i class="fa-solid fa-check"></i> Done';
      } else {
        toggleEditBtn.classList.remove('btn-close-edit');
        toggleEditBtn.classList.add('btn-edit');
        toggleEditBtn.innerHTML = '<i class="fa-solid fa-pen-to-square"></i> Edit';
      }
      fetchReportData();
    });
  }
});
</script>

</body>
</html>