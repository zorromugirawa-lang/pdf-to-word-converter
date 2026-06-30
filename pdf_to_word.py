import os
import PyPDF2
import pytesseract
from PIL import Image
from pdf2image import convert_from_path

# Try to load python-dotenv if installed (useful for local development)
try:
    from dotenv import load_dotenv
    load_dotenv()
except ImportError:
    pass

# Set the path to the Tesseract executable from Environment Variables
# Fallback to the default Windows path if not set
tesseract_cmd = os.getenv('TESSERACT_CMD', r'C:\Program Files\Tesseract-OCR\tesseract.exe')
pytesseract.pytesseract.tesseract_cmd = tesseract_cmd

# Specify the path to your PDF file from Environment Variables
pdf_path = os.getenv('PDF_PATH', 'path/to/your/pdf/file.pdf')

if not os.path.exists(pdf_path) and pdf_path != 'path/to/your/pdf/file.pdf':
    print(f"Error: PDF file not found at {pdf_path}")
    print("Please check your PDF_PATH environment variable.")
    exit(1)

# Create a directory to store the extracted images
images_dir = 'extracted_images'
os.makedirs(images_dir, exist_ok=True)

# Open the PDF file
with open(pdf_path, 'rb') as file:
    # Create a PDF reader object
    pdf_reader = PyPDF2.PdfReader(file)

    # Get the number of pages in the PDF
    num_pages = len(pdf_reader.pages)

    # Iterate through each page
    for page_num in range(num_pages):
        # Extract the page
        page = pdf_reader.pages[page_num]

        # Extract the text from the page
        text = page.extract_text()

        # Save the extracted text to a file
        with open(f'page_{page_num+1}.txt', 'w', encoding='utf-8') as text_file:
            text_file.write(text)

        # Convert the PDF page to images
        images = convert_from_path(pdf_path, first_page=page_num+1, last_page=page_num+1)

        # Save the images to the extracted_images directory
        for i, image in enumerate(images):
            image_path = os.path.join(images_dir, f'page_{page_num+1}_image_{i+1}.png')
            image.save(image_path)

        # Perform OCR on the extracted images
        for image_file in os.listdir(images_dir):
            image_path = os.path.join(images_dir, image_file)
            image = Image.open(image_path)
            ocr_text = pytesseract.image_to_string(image)

            # Save the OCR text to a file
            with open(f'ocr_page_{page_num+1}.txt', 'a', encoding='utf-8') as ocr_file:
                ocr_file.write(ocr_text)
