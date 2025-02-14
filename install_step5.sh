echo "Time to install PHP Artisan!"
composer global require laravel/installer

echo "Finally, it's time to actually build the darknet store. We will be creating a folder in /var/www to hold the files. We'll call it /var/www/thevault but you could name it anything you like."

# Create the main directory if it doesn't exist
if [ ! -d /var/www/thevault ]; then
    sudo mkdir /var/www/thevault
else
    echo "/var/www/thevault already exists."
fi

# Check if the www-data group exists, if not create it
if ! getent group www-data > /dev/null; then
    echo "Creating group www-data."
    sudo groupadd www-data
fi

# Change ownership and permissions
sudo chown -R www-data:www-data /var/www/thevault/public 2>/dev/null || echo "Directory /var/www/thevault/public does not exist."
sudo chmod 755 /var/www 2>/dev/null || echo "Failed to change permissions for /var/www."
sudo chmod -R 755 /var/www/thevault/bootstrap/cache 2>/dev/null || echo "Directory /var/www/thevault/bootstrap/cache does not exist."
sudo chmod -R 755 /var/www/thevault/storage 2>/dev/null || echo "Directory /var/www/thevault/storage does not exist."

# Create storage link
if [ -f artisan ]; then
    php artisan storage:link
else
    echo "Could not find artisan file. Make sure you are in the correct directory."
fi

# Create child directories if they don't exist
if [ ! -d /var/www/thevault/storage/public/products ]; then
    sudo mkdir -p /var/www/thevault/storage/public/products
else
    echo "/var/www/thevault/storage/public/products already exists."
fi

# Set permissions for the products directory
sudo chmod -R 755 /var/www/thevault/storage/public/products
sudo chgrp -R www-data /var/www/thevault/storage/public/products
sudo chmod -R ug+rwx /var/www/thevault/storage/public/products

sudo cp -rf the_vault /var/www/thevault

echo "Setup completed."
