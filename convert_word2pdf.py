import sys
import os
from docx2pdf import convert

if len(sys.argv) < 3:
    print("Usage: python convert_word2pdf.py <input.docx> <output.pdf>")
    sys.exit(1)

docx_file = sys.argv[1]
pdf_file = sys.argv[2]

try:
    # docx2pdf requires absolute paths on windows
    abs_input = os.path.abspath(docx_file)
    abs_output = os.path.abspath(pdf_file)
    convert(abs_input, abs_output)
    print("SUCCESS")
except Exception as e:
    print(f"ERROR: {str(e)}")
    sys.exit(1)
