<?php
// Load API Secret from environment or set directly here
$convertApiSecret = getenv('CONVERT_API_SECRET') ?: 'PqUKqCZrll0cePNVVHxA0GtiNNDEuYls';

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
        
        // Execute conversion using ConvertAPI via cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://v2.convertapi.com/convert/pdf/to/docx?Secret=' . $convertApiSecret);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        $cfile = new CURLFile($pdfPath, 'application/pdf', $originalName);
        $data = array('File' => $cfile, 'StoreFile' => 'true');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
        // Timeout for conversion
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        $output = '';
        if ($httpcode == 200) {
            $json = json_decode($result, true);
            if (isset($json['Files'][0]['Url'])) {
                $fileUrl = $json['Files'][0]['Url'];
                // Download the converted file
                $fileContent = file_get_contents($fileUrl);
                if ($fileContent !== false) {
                    file_put_contents($docxPath, $fileContent);
                } else {
                    $output = "Failed to download the converted file from API.";
                }
            } else {
                $output = "Invalid response format from API.";
            }
        } else {
             $output = "API Error Code: " . $httpcode . " - " . $result;
        }
        
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
