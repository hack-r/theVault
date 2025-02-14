#!/bin/bash

# Define the paths to the old and new projects
OLD_PROJECT_DIR="/home/user/Documents/clean_eckmar/Eckmar-Script-V2/Eckmar2.0"
NEW_PROJECT_DIR="/var/www/tmp/theVault"

# Function to pause and wait for user confirmation
pause() {
    read -p "Press [Enter] to continue..."
}

# Migrate Controllers
echo "Migrating Controllers..."
cp -r "$OLD_PROJECT_DIR/app/Http/Controllers/"* "$NEW_PROJECT_DIR/app/Http/Controllers/"
echo "Controllers migrated."
pause

# Migrate Models (if applicable)
if [ -d "$OLD_PROJECT_DIR/app/Models" ]; then
    echo "Migrating Models..."
    cp -r "$OLD_PROJECT_DIR/app/Models/"* "$NEW_PROJECT_DIR/app/Models/"
    echo "Models migrated."
else
    echo "No Models directory found in the old project."
fi
pause

# Migrate Views
echo "Migrating Views..."
cp -r "$OLD_PROJECT_DIR/resources/views/"* "$NEW_PROJECT_DIR/resources/views/"
echo "Views migrated."
pause

# Migrate Routes
echo "Migrating Routes..."
cp -r "$OLD_PROJECT_DIR/routes/"* "$NEW_PROJECT_DIR/routes/"
echo "Routes migrated."
pause

# Migrate Public Assets
echo "Migrating Public Assets..."
cp -r "$OLD_PROJECT_DIR/public/"* "$NEW_PROJECT_DIR/public/"
echo "Public assets migrated."
pause

# Update Composer Dependencies
echo "Updating Composer dependencies..."
cd "$NEW_PROJECT_DIR" || exit
composer install
echo "Composer dependencies updated."

echo "Migration completed successfully!"
