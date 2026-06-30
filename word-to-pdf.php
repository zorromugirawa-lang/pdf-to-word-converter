<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Word ke PDF Online & Gratis</title>
    <meta name="description" content="Ubah dokumen Word (DOC/DOCX) menjadi PDF dengan mempertahankan format asli. Proses cepat, mudah, dan file otomatis terhapus dari server.">
    
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; color: #333; }
        .nav { background: #fff; padding: 15px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); display: flex; gap: 20px; }
        .nav a { text-decoration: none; color: #4b5563; font-weight: bold; }
        .nav a:hover { color: #1e3a8a; }
        .main-content { display: flex; flex-direction: column; align-items: center; padding: 50px 20px; }
        .container { background-color: #ffffff; padding: 40px 50px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); text-align: center; max-width: 450px; width: 100%; margin-bottom: 50px; }
        .icon { font-size: 32px; margin-right: 12px; }
        .header { display: flex; align-items: center; justify-content: center; margin-bottom: 15px; }
        .container h2 { color: #1e3a8a; font-size: 22px; margin: 0; }
        .container p { color: #4b5563; font-size: 14px; margin-bottom: 25px; line-height: 1.5; }
        .file-upload { margin-bottom: 25px; }
        input[type="file"] { font-size: 14px; width: 100%; padding: 10px; border: 1px dashed #cbd5e1; border-radius: 6px; background: #f8fafc; }
        
        .btn-convert { background-color: #eab308; color: white; border: none; padding: 14px 24px; border-radius: 6px; font-size: 15px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 100%; gap: 8px; font-weight: 600; }
        .btn-convert:hover { background-color: #ca8a04; }
        
        /* SEO Content Section */
        .seo-content { max-width: 800px; width: 100%; background: #fff; padding: 40px; border-radius: 8px; line-height: 1.6; color: #4b5563; }
        .seo-content h1 { font-size: 24px; color: #1e3a8a; margin-top: 0; }
        .seo-content h2 { font-size: 20px; color: #374151; margin-top: 30px; }
        .seo-content ul { padding-left: 20px; }
        .seo-content li { margin-bottom: 10px; }
        .seo-content strong { color: #111827; }
    </style>
</head>
<body>

<div class="nav">
    <a href="index.php">← Beranda</a>
    <a href="pdf-to-word.php">PDF ke Word</a>
    <a href="word-to-pdf.php" style="color:#1e3a8a;">Word ke PDF</a>
    <a href="pdf-to-jpg.php">PDF ke JPG</a>
    <a href="jpg-to-pdf.php">JPG ke PDF</a>
</div>

<div class="main-content">
    <div class="container">
        <div class="header">
            <span class="icon">📝</span>
            <h2>Word to PDF</h2>
        </div>
        <p>Ubah dokumen Word Anda menjadi format PDF dengan aman tanpa merusak struktur dan format bawaan.</p>
        
        <form action="process_word2pdf.php" method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <input type="file" name="word_file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
            </div>
            
            <button type="submit" class="btn-convert">
                <span>🔄</span> Konversi ke PDF
            </button>
        </form>
    </div>

    <!-- SEO Content -->
    <div class="seo-content">
        <h1>Convert Word ke PDF Secara Online dan Gratis</h1>
        
        <h2>Cara Merubah File Word ke PDF</h2>
        <ul>
            <li><strong>Unggah Dokumen:</strong> Klik "Pilih File" dan tentukan dokumen Microsoft Word (DOC atau DOCX) yang ingin diubah.</li>
            <li><strong>Tunggu Sebentar:</strong> Aplikasi kami akan mengonversi dokumen Word Anda menjadi PDF persis dengan format aslinya.</li>
            <li><strong>Unduh Dokumen:</strong> Anda bisa langsung mengunduh hasil PDF-nya yang rapi dan siap untuk dicetak atau dikirim.</li>
        </ul>

        <h2>Mengapa Word to PDF Kami Terbaik?</h2>
        <ul>
            <li><strong>Struktur Tidak Berantakan:</strong> Semua jenis font, spasi, gambar, dan tata letak dalam dokumen Word Anda tidak akan bergeser saat diubah menjadi PDF.</li>
            <li><strong>100% Cepat & Gratis:</strong> Gunakan sesuka hati tanpa dipungut biaya apapun dan tanpa limitasi file.</li>
            <li><strong>Keamanan Privasi:</strong> Data bisnis dan tugas Anda aman karena file langsung kami hapus dari sistem setelah selesai.</li>
        </ul>
    </div>
</div>

</body>
</html>
