<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_file'])) {
    $file = $_FILES['pdf_file'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file. Code: " . $file['error']);
    }
    
    // Create safe filenames
    $originalName = basename($file['name']);
    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    
    if ($fileExt !== 'pdf') {
        die("Error: File must be a PDF.");
    }
    
    // Generate unique name to prevent collisions
    $uid = uniqid();
    $pdfPath = __DIR__ . '/uploads/' . $uid . '.pdf';
    $docxPath = __DIR__ . '/uploads/' . $uid . '.docx';
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $pdfPath)) {
        
        // Execute the python converter script
        $command = escapeshellcmd("python convert.py " . escapeshellarg($pdfPath) . " " . escapeshellarg($docxPath));
        $output = shell_exec($command);
        
        // Check if output file was created
        if (file_exists($docxPath)) {
            // Serve the DOCX file for download
            $finalName = str_replace('.pdf', '.docx', $originalName);
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Disposition: attachment; filename="' . $finalName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($docxPath));
            
            // Clean output buffer to ensure no extra characters
            ob_clean();
            flush();
            
            readfile($docxPath);
            
            // Clean up files after serving
            unlink($pdfPath);
            unlink($docxPath);
            
            exit;
        } else {
            // Cleanup on failure
            unlink($pdfPath);
            echo "Konversi Gagal. Output dari server: " . htmlspecialchars($output);
        }
    } else {
        echo "Gagal menyimpan file PDF yang diunggah.";
    }
} else {
    echo "Invalid request.";
}
?>
