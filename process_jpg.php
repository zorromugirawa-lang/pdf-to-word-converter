<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_file'])) {
    $file = $_FILES['pdf_file'];
    $quality = isset($_POST['quality']) && $_POST['quality'] === 'high' ? 'high' : 'standard';
    
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
    $zipPath = __DIR__ . '/uploads/' . $uid . '.zip';
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $pdfPath)) {
        
        // Execute the python converter script
        $command = escapeshellcmd("python convert_jpg.py " . escapeshellarg($pdfPath) . " " . escapeshellarg($zipPath) . " " . escapeshellarg($quality));
        $output = shell_exec($command);
        
        // Check if output file was created
        if (file_exists($zipPath)) {
            // Serve the ZIP file for download
            $finalName = str_replace('.pdf', '_images.zip', $originalName);
            
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $finalName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zipPath));
            
            // Clean output buffer
            ob_clean();
            flush();
            
            readfile($zipPath);
            
            // Clean up files after serving
            unlink($pdfPath);
            unlink($zipPath);
            
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
