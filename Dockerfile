FROM php:8.2-apache

# Update and install required dependencies
# python3, venv, tesseract-ocr, poppler-utils (for pdf2image), and libs for opencv
RUN apt-get update && apt-get install -y \
    python3 \
    python3-venv \
    tesseract-ocr \
    tesseract-ocr-ind \
    tesseract-ocr-eng \
    poppler-utils \
    libgl1-mesa-glx \
    libglib2.0-0 \
    && rm -rf /var/lib/apt/lists/*

# Create a virtual environment and update PATH
ENV VIRTUAL_ENV=/opt/venv
RUN python3 -m venv $VIRTUAL_ENV
ENV PATH="$VIRTUAL_ENV/bin:$PATH"

# Copy requirements
COPY requirements.txt /tmp/

# Install python packages in the virtual environment
RUN pip install --no-cache-dir -r /tmp/requirements.txt

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application files to web root
COPY . /var/www/html/

# Ensure uploads directory exists and is writable by Apache
RUN mkdir -p /var/www/html/uploads && chmod -R 777 /var/www/html/uploads

# Expose port 80 for Render
EXPOSE 80
