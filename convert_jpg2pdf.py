import sys
from PIL import Image

if len(sys.argv) < 3:
    print("Usage: python convert_jpg2pdf.py <output.pdf> <input1.jpg> <input2.jpg> ...")
    sys.exit(1)

output_pdf = sys.argv[1]
image_paths = sys.argv[2:]

try:
    images = []
    for path in image_paths:
        img = Image.open(path)
        # Convert to RGB to ensure compatibility when saving as PDF
        if img.mode != 'RGB':
            img = img.convert('RGB')
        images.append(img)
    
    if len(images) == 0:
        raise Exception("No images provided")
        
    first_image = images[0]
    rest_images = images[1:]
    
    first_image.save(output_pdf, "PDF", resolution=100.0, save_all=True, append_images=rest_images)
    print("SUCCESS")
except Exception as e:
    print(f"ERROR: {str(e)}")
    sys.exit(1)
