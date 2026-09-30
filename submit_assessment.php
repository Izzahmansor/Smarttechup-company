<?php
// submit_assessment.php

session_start();

$uploadDir = __DIR__ . '/uploads/';
$allowedExtensions = ['pdf', 'png', 'jpg', 'jpeg'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

// Ensure uploads directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$uploadedFilePaths = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Capture standard form text inputs
    $smartStrategy = $_POST['smartStrategy'] ?? null;
    $strategyImplementation = $_POST['strategyImplementation'] ?? null;
    $strategyGrowth = $_POST['strategyGrowth'] ?? null;
    $growthMetrics = $_POST['growthMetrics'] ?? [];
    $staffCompetency = $_POST['staffCompetency'] ?? null;
    $assessmentMethods = $_POST['assessmentMethods'] ?? [];

    // Process file uploads
    if (isset($_FILES['attachments'])) {
        foreach ($_FILES['attachments']['name'] as $questionKey => $fileName) {
            
            // Check if file was actually submitted for this question
            if ($_FILES['attachments']['error'][$questionKey] === UPLOAD_ERR_OK) {
                
                $tmpName  = $_FILES['attachments']['tmp_name'][$questionKey];
                $fileSize = $_FILES['attachments']['size'][$questionKey];
                $fileExt  = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                // 1. Check size limit
                if ($fileSize > $maxFileSize) {
                    $errors[] = "File for $questionKey exceeds max allowed size of 5MB.";
                    continue;
                }

                // 2. Check extension
                if (!in_array($fileExt, $allowedExtensions)) {
                    $errors[] = "Invalid file type uploaded for $questionKey.";
                    continue;
                }

                // 3. Generate sanitized unique name
                $uniqueName = 'evidence_' . $questionKey . '_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $fileExt;
                $targetFile = $uploadDir . $uniqueName;

                // 4. Save file to server
                if (move_uploaded_file($tmpName, $targetFile)) {
                    $uploadedFilePaths[$questionKey] = 'uploads/' . $uniqueName;
                } else {
                    $errors[] = "Failed to upload file for $questionKey.";
                }
            }
        }
    }

    // Save answers and file paths to Database or Session
    // $db->saveSelfAssessment($_SESSION['user_id'], $_POST, $uploadedFilePaths);

    if (empty($errors)) {
        header('Location: company_selfassessment_results.php');
        exit;
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>