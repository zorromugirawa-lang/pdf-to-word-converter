FROM php:8.2-apache

# Update and install required dependencies
# python3, pip, tesseract-ocr (for pytesseract), poppler-utils (for pdf2image)
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    tesseract-ocr \
    tesseract-ocr-ind \
    tesseract-ocr-eng \
    poppler-utils \
    libgl1-mesa-glx \
    && rm -rf /var/lib/apt/lists/*

# Copy requirements
COPY requirements.txt /tmp/

# Install python packages
RUN pip3 install --no-cache-dir -r /tmp/requirements.txt --break-system-packages

# Create a symlink so 'python' command points to 'python3'
RUN ln -sf /usr/bin/python3 /usr/bin/python

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application files to web root
COPY . /var/www/html/

# Ensure uploads directory exists and is writable by Apache
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads

# Expose port 80 for Render
EXPOSE 80
