import sys
from pdf2docx import Converter

if len(sys.argv) < 3:
    print("Usage: python convert.py <input.pdf> <output.docx>")
    sys.exit(1)

pdf_file = sys.argv[1]
docx_file = sys.argv[2]

try:
    cv = Converter(pdf_file)
    cv.convert(docx_file)
    cv.close()
    print("SUCCESS")
except Exception as e:
    print(f"ERROR: {str(e)}")
    sys.exit(1)
