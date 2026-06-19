from flask import Flask, request, send_file, render_template_string
from pdf2docx import Converter
import os

app = Flask(__name__)
UPLOAD_FOLDER = 'uploads'
CONVERTED_FOLDER = 'converted'

os.makedirs(UPLOAD_FOLDER, exist_ok=True)
os.makedirs(CONVERTED_FOLDER, exist_ok=True)

HTML = '''
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF to Word Converter</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
        .container { max-width: 700px; margin: 40px auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #1e3a8a; }
        button {
            background: #1e40af;
            color: white;
            padding: 14px 32px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { background: #1e3a8a; }
        #status { margin-top: 20px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📄 PDF to Word Converter</h1>
        <p>Konversi PDF ke Word dengan gambar & tabel</p>
        
        <form action="/convert" method="post" enctype="multipart/form-data">
            <input type="file" name="pdf" accept=".pdf" required><br><br>
            <button type="submit">🔄 Konversi ke Word</button>
        </form>
    </div>
</body>
</html>
'''

@app.route('/')
def home():
    return render_template_string(HTML)

@app.route('/convert', methods=['POST'])
def convert():
    if 'pdf' not in request.files:
        return "Tidak ada file", 400
    file = request.files['pdf']
    if file.filename == '':
        return "File tidak dipilih", 400
    if not file.filename.lower().endswith('.pdf'):
        return "Hanya PDF yang diizinkan", 400

    pdf_path = os.path.join(UPLOAD_FOLDER, file.filename)
    file.save(pdf_path)

    docx_filename = file.filename.rsplit('.', 1)[0] + '.docx'
    docx_path = os.path.join(CONVERTED_FOLDER, docx_filename)

    try:
        cv = Converter(pdf_path)
        cv.convert(docx_path)
        cv.close()
        return send_file(docx_path, as_attachment=True, download_name=docx_filename)
    except Exception as e:
        return f"Error: {str(e)}", 500

if __name__ == '__main__':
    print("🚀 Server berjalan di http://127.0.0.1:5000")
    app.run(debug=True)