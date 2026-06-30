<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah PDF ke JPG (Gambar) Online Kualitas Tinggi</title>
    <meta name="description" content="Ekstrak gambar dari PDF atau ubah seluruh halaman PDF menjadi format JPG berkualitas tinggi. Proses instan dan 100% gratis.">
    
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
        
        .options { margin-bottom: 20px; text-align: left; background: #f1f5f9; padding: 15px; border-radius: 8px; }
        .options label { font-size: 14px; color: #374151; display: flex; align-items: center; gap: 8px; margin-bottom: 10px; cursor: pointer; }
        
        .btn-convert { background-color: #10b981; color: white; border: none; padding: 14px 24px; border-radius: 6px; font-size: 15px; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 100%; gap: 8px; font-weight: 600; }
        .btn-convert:hover { background-color: #059669; }
        
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
    <a href="pdf-to-jpg.php" style="color:#1e3a8a;">PDF ke JPG</a>
    <a href="jpg-to-pdf.php">JPG ke PDF</a>
</div>

<div class="main-content">
    <div class="container">
        <div class="header">
            <span class="icon">🖼️</span>
            <h2>PDF to JPG</h2>
        </div>
        <p>Ubah halaman PDF menjadi gambar kualitas tinggi (.zip berisi .jpg). Pilih kualitas yang diinginkan.</p>
        
        <form action="process_jpg.php" method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <input type="file" name="pdf_file" accept="application/pdf" required>
            </div>
            
            <div class="options">
                <label><input type="radio" name="quality" value="standard" checked> Kualitas Standar (Cepat, Ukuran Kecil)</label>
                <label><input type="radio" name="quality" value="high"> Kualitas High (Resolusi Tinggi, Detail Tajam)</label>
            </div>

            <button type="submit" class="btn-convert">
                <span>🔄</span> Konversi ke JPG
            </button>
        </form>
    </div>

    <!-- SEO Content -->
    <div class="seo-content">
        <h1>Ubah PDF menjadi JPG (Gambar) Secara Online dan Gratis</h1>
        
        <h2>Cara Mengubah PDF ke JPG dalam 3 Langkah Mudah</h2>
        <ul>
            <li><strong>Unggah File:</strong> Klik tombol "Pilih File" dan pilih dokumen PDF dari perangkat Anda.</li>
            <li><strong>Pilih Kualitas:</strong> Anda dapat memilih kualitas standar untuk ukuran file kecil, atau kualitas tinggi untuk hasil gambar yang detail dan tajam. Klik Konversi.</li>
            <li><strong>Unduh Hasilnya:</strong> Sistem akan mengonversi semua halaman PDF Anda menjadi JPG dan memadatkannya ke dalam sebuah file ZIP. Klik "Unduh" untuk menyimpannya.</li>
        </ul>

        <h2>Mengapa Memilih Konverter Kami?</h2>
        <ul>
            <li><strong>Resolusi Tinggi:</strong> Algoritma rendering PDF kami memastikan gambar JPG yang dihasilkan memiliki kejelasan maksimal tanpa blur.</li>
            <li><strong>Aman & Terlindungi:</strong> Privasi Anda adalah prioritas kami. Semua file yang diunggah akan dihapus secara otomatis dari server kami dalam 1 jam.</li>
            <li><strong>Gratis Tanpa Batas:</strong> Nikmati layanan konversi dokumen tanpa biaya tersembunyi dan tanpa perlu mendaftar akun.</li>
        </ul>
    </div>
</div>

</body>
</html>
