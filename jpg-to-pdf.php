<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah JPG ke PDF Online Cepat dan Gratis</title>
    <meta name="description" content="Gabungkan banyak gambar JPG, JPEG, atau PNG menjadi satu file PDF yang rapi dengan mudah. Tanpa pendaftaran dan 100% gratis.">
    
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
        
        .btn-convert { background-color: #8b5cf6; color: white; border: none; padding: 14px 24px; border-radius: 6px; font-size: 15px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 100%; gap: 8px; font-weight: 600; }
        .btn-convert:hover { background-color: #7c3aed; }
        
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
    <a href="word-to-pdf.php">Word ke PDF</a>
    <a href="pdf-to-jpg.php">PDF ke JPG</a>
    <a href="jpg-to-pdf.php" style="color:#1e3a8a;">JPG ke PDF</a>
</div>

<div class="main-content">
    <div class="container">
        <div class="header">
            <span class="icon">📑</span>
            <h2>JPG to PDF</h2>
        </div>
        <p>Gabungkan satu atau banyak gambar (JPG/PNG) menjadi satu file PDF yang rapi.</p>
        
        <form action="process_jpg2pdf.php" method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <input type="file" name="images[]" accept="image/jpeg, image/png, image/jpg" multiple required>
            </div>
            
            <button type="submit" class="btn-convert">
                <span>🔄</span> Konversi ke PDF
            </button>
        </form>
    </div>

    <!-- SEO Content -->
    <div class="seo-content">
        <h1>Ubah dan Gabungkan Gambar JPG/PNG menjadi PDF dengan Mudah</h1>
        
        <h2>Cara Menyatukan Gambar ke dalam Format PDF</h2>
        <ul>
            <li><strong>Unggah Gambar:</strong> Klik "Pilih File" dan sorot (block) beberapa foto atau gambar JPG/PNG sekaligus dari komputer Anda.</li>
            <li><strong>Proses Otomatis:</strong> Sistem kami akan menyatukan gambar-gambar tersebut menjadi satu urutan dokumen berformat PDF.</li>
            <li><strong>Unduh Dokumen:</strong> File PDF hasil gabungan foto Anda siap untuk diunduh dan dibagikan.</li>
        </ul>

        <h2>Mengapa Menggunakan Layanan JPG to PDF Kami?</h2>
        <ul>
            <li><strong>Mendukung Multi-Gambar:</strong> Unggah banyak foto hasil scan dokumen tugas atau laporan kerja secara bersamaan dan jadikan satu file PDF utuh.</li>
            <li><strong>Privasi Terjamin:</strong> Data pribadi dalam dokumen gambar Anda tidak akan bocor karena file otomatis terhapus dari server segera setelah dikonversi.</li>
            <li><strong>100% Cepat & Gratis:</strong> Solusi harian Anda tanpa batas konversi maupun pendaftaran akun ribet.</li>
        </ul>
    </div>
</div>

</body>
</html>
