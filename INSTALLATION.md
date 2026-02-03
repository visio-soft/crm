# CRM Module Installation Guide

## Overview

This guide provides instructions for installing the CRM module in your Laravel application. The CRM module can be installed in two ways:
1. **As a module in an existing Laravel 12+ application** (recommended for production)
2. **As a standalone application** (for testing or development)

## Prerequisites

- PHP 8.2 or higher
- Composer
- Existing Laravel 12+ application (for Option 1)
- SQLite, MySQL, or PostgreSQL database
- Web server (Apache, Nginx, or PHP built-in server)

## Option 1: Install in Existing Laravel Application (Recommended)

This is the recommended approach if you already have a Laravel application and want to add CRM functionality.

### Step 1: Copy the CRM Module

Copy the CRM module to your Laravel application's Modules directory:

```bash
# From this repository root
cp -r Modules/CRM /path/to/your/laravel/app/Modules/

# If Modules directory doesn't exist, create it first
mkdir -p /path/to/your/laravel/app/Modules
```

### Step 2: Update Composer Autoloading

Add the following to your Laravel application's `composer.json`:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Modules\\": "Modules/"
        },
        "files": [
            "app/helpers.php"
        ]
    }
}
```

### Step 3: Copy Helper File

```bash
cp app/helpers.php /path/to/your/laravel/app/app/helpers.php
```

### Step 4: Install Required Dependencies

```bash
cd /path/to/your/laravel/app
composer require filament/filament:^4.0
composer require nwidart/laravel-modules:^11.0
composer require barryvdh/laravel-dompdf:^3.0
composer dump-autoload
```

### Step 5: Register Service Provider

Add the CRM service provider to your `bootstrap/app.php`:

```php
return Application::configure(basePath: dirname(__DIR__))
    // ... other configuration
    ->withProviders([
        // ... other providers
        Modules\CRM\app\Providers\CRMServiceProvider::class,
    ])
    ->create();
```

If you're using Laravel 11 or older with config/app.php, add to the providers array instead:

```php
'providers' => [
    // ... other providers
    Modules\CRM\app\Providers\CRMServiceProvider::class,
],
```

### Step 6: Copy Configuration Files (Optional)

Copy module configuration files if needed:

```bash
cp config/modules.php /path/to/your/laravel/app/config/
cp config/dompdf.php /path/to/your/laravel/app/config/
```

### Step 7: Run Migrations

Run the CRM module migrations:

```bash
php artisan migrate
```

This will create the following tables:
- customers
- products
- quotes
- quote_items
- follow_ups
- email_templates
- email_trackings

### Step 8: Seed Initial Data (Optional)

Populate the database with sample products and email templates:

```bash
php artisan db:seed --class=Modules\\CRM\\database\\seeders\\CRMDatabaseSeeder
```

### Step 9: Register Admin Panel Provider (if not already)

If you haven't set up Filament yet, create an admin panel provider:

```bash
php artisan make:filament-panel admin
```

Or copy the provided AdminPanelProvider:

```bash
cp app/Providers/AdminPanelProvider.php /path/to/your/laravel/app/app/Providers/
```

### Step 10: Create Admin User

If you don't have an admin user yet:

```bash
php artisan make:filament-user
```

### Step 11: Access the CRM

Start your Laravel application and access the admin panel:

```bash
php artisan serve
```

Navigate to: `http://localhost:8000/admin`

---

## Option 2: Standalone Installation

For a fresh standalone CRM application:

### 1. Clone the Repository

```bash
git clone https://github.com/visio-soft/crm.git
cd crm
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Configure your database in `.env`:

For SQLite (default):
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

For MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Seed Initial Data (Optional)

To populate the database with sample products and email templates:

```bash
php artisan db:seed --class=Modules\\CRM\\database\\seeders\\CRMDatabaseSeeder
```

### 7. Create Storage Link

```bash
php artisan storage:link
```

### 8. Create Admin User

Create your first admin user for Filament:

```bash
php artisan make:filament-user
```

You'll be prompted to enter:
- Name
- Email address
- Password

### 9. Start the Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

Access the admin panel at: `http://localhost:8000/admin`

## Post-Installation

### Configure Email

For email tracking and quote sending to work properly, configure your mail settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### File Permissions

Make sure the following directories are writable:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

## Troubleshooting

### Issue: Database file not found (SQLite)

Make sure the database file exists:

```bash
touch database/database.sqlite
```

### Issue: Permission denied errors

Ensure proper permissions:

```bash
chmod -R 775 storage bootstrap/cache
```

### Issue: Composer dependencies conflicts

Try clearing composer cache:

```bash
composer clear-cache
composer install
```

### Issue: Filament assets not loading

Clear the cache and rebuild assets:

```bash
php artisan filament:clear-cached-components
php artisan filament:upgrade
```

## Development

### Running Migrations

```bash
php artisan migrate
```

### Rolling Back Migrations

```bash
php artisan migrate:rollback
```

### Fresh Migration with Seed

```bash
php artisan migrate:fresh --seed
```

## Production Deployment

For production deployment:

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
2. Optimize the application:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

3. Set up a proper web server (Apache/Nginx)
4. Configure SSL certificate
5. Set up automated backups for your database
6. Configure a queue worker for background jobs

## Support

For issues and questions:
- GitHub Issues: https://github.com/visio-soft/crm/issues
- Documentation: See README.md

## Next Steps

After installation:
1. Log in to the admin panel
2. Create your first customer
3. Add products to your catalog
4. Create email templates
5. Generate your first quote
6. Explore the Kanban board for customer pipeline management
