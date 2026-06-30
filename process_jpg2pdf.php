<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
    $files = $_FILES['images'];
    
    $uid = uniqid();
    $pdfPath = __DIR__ . '/uploads/' . $uid . '.pdf';
    $uploadedPaths = [];
    $rawPaths = [];
    
    // Process each uploaded file
    for ($i = 0; $i < count($files['name']); $i++) {
        if ($files['error'][$i] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                $tempPath = __DIR__ . '/uploads/' . $uid . '_' . $i . '.' . $ext;
                if (move_uploaded_file($files['tmp_name'][$i], $tempPath)) {
                    $uploadedPaths[] = escapeshellarg($tempPath);
                    $rawPaths[] = $tempPath;
                }
            }
        }
    }
    
    if (count($uploadedPaths) > 0) {
        // Run python script
        $command = escapeshellcmd("python convert_jpg2pdf.py") . " " . escapeshellarg($pdfPath) . " " . implode(" ", $uploadedPaths);
        $output = shell_exec($command);
        
        if (file_exists($pdfPath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="converted_document.pdf"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfPath));
            
            ob_clean();
            flush();
            readfile($pdfPath);
            
            // Cleanup
            unlink($pdfPath);
            foreach ($rawPaths as $path) {
                if(file_exists($path)) unlink($path);
            }
            exit;
        } else {
            foreach ($rawPaths as $path) {
                if(file_exists($path)) unlink($path);
            }
            echo "Konversi Gagal. Output: " . htmlspecialchars($output);
        }
    } else {
        echo "Tidak ada gambar valid yang diunggah. Pastikan format file adalah JPG atau PNG.";
    }
} else {
    echo "Invalid request.";
}
?>
