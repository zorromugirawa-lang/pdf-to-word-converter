import sys
import fitz  # PyMuPDF
import zipfile

if len(sys.argv) < 4:
    print("Usage: python convert_jpg.py <input.pdf> <output.zip> <quality>")
    sys.exit(1)

pdf_file = sys.argv[1]
zip_file = sys.argv[2]
quality = sys.argv[3]  # 'standard' or 'high'

# Set zoom factor based on quality
zoom = 3.0 if quality == 'high' else 1.5
mat = fitz.Matrix(zoom, zoom)

try:
    doc = fitz.open(pdf_file)
    with zipfile.ZipFile(zip_file, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for page_num in range(len(doc)):
            page = doc.load_page(page_num)
            pix = page.get_pixmap(matrix=mat)
            img_data = pix.tobytes("jpeg")
            img_name = f"page_{page_num + 1}.jpg"
            zipf.writestr(img_name, img_data)
    doc.close()
    print("SUCCESS")
except Exception as e:
    print(f"ERROR: {str(e)}")
    sys.exit(1)
