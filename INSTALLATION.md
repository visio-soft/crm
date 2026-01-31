# CRM Application Installation Guide

## Quick Start

This guide will help you set up the CRM application on your local machine.

## Prerequisites

- PHP 8.2 or higher
- Composer
- SQLite, MySQL, or PostgreSQL database
- Web server (Apache, Nginx, or PHP built-in server)

## Installation Steps

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
