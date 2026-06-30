<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['word_file'])) {
    $file = $_FILES['word_file'];
    
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file. Code: " . $file['error']);
    }
    
    // Create safe filenames
    $originalName = basename($file['name']);
    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    
    if (!in_array($fileExt, ['doc', 'docx'])) {
        die("Error: File must be a Word Document (DOC/DOCX).");
    }
    
    // Generate unique name to prevent collisions
    $uid = uniqid();
    $wordPath = __DIR__ . '/uploads/' . $uid . '.' . $fileExt;
    $pdfPath = __DIR__ . '/uploads/' . $uid . '.pdf';
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $wordPath)) {
        
        // Execute the python converter script
        $command = escapeshellcmd("python convert_word2pdf.py " . escapeshellarg($wordPath) . " " . escapeshellarg($pdfPath));
        $output = shell_exec($command);
        
        // Check if output file was created
        if (file_exists($pdfPath)) {
            // Serve the PDF file for download
            $finalName = str_replace(['.docx', '.doc'], '.pdf', $originalName);
            
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $finalName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfPath));
            
            // Clean output buffer
            ob_clean();
            flush();
            
            readfile($pdfPath);
            
            // Clean up files after serving
            unlink($wordPath);
            unlink($pdfPath);
            
            exit;
        } else {
            // Cleanup on failure
            unlink($wordPath);
            echo "Konversi Gagal. Output dari server: " . htmlspecialchars($output);
        }
    } else {
        echo "Gagal menyimpan file Word yang diunggah.";
    }
} else {
    echo "Invalid request.";
}
?>
