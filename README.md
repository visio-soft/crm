# CRM Application

A comprehensive CRM (Customer Relationship Management) system built with Laravel 12, Filament v4, and nWidart/laravel-modules.

## Features

### 1. Customer Management
- Complete customer information tracking
- Customer prioritization (High, Medium, Low)
- Customer source tracking
- Stage-based pipeline management
- **Kanban Board** for visual customer tracking across stages:
  - Lead
  - Contacted
  - Qualified
  - Proposal Sent
  - Negotiation
  - Won
  - Lost

### 2. Product Management
- Product catalog with SKU tracking
- Pricing and cost management
- Category organization
- Stock quantity tracking
- Active/Inactive status

### 3. Quote Management
- Create professional quotes with multiple line items
- **PDF generation** for quotes with beautiful formatting
- Auto-calculated totals with tax and discount support
- Quote status tracking (Draft, Sent, Accepted, Rejected)
- Validity period management
- **PDF catalog attachments**
- Quote number auto-generation

### 4. Follow-up System
- Schedule follow-up activities
- Multiple follow-up types:
  - Phone Call
  - Email
  - Meeting
  - Product Demo
  - Other
- Track completion status
- Assign to team members
- Detailed notes and descriptions

### 5. Email Templates
- Pre-built email templates for:
  - Quotes
  - Information
  - Follow-ups
- Variable substitution support
- Rich text editing
- Template activation/deactivation

### 6. Email Tracking
- **Track email opens** with pixel tracking
- **Track link clicks** in emails
- View open and click counts
- Timestamps for first open and click
- Integration with quotes and customers

## Installation

### Requirements
- PHP 8.2 or higher
- Composer
- SQLite, MySQL, or PostgreSQL

### Steps

1. Clone the repository:
```bash
git clone https://github.com/visio-soft/crm.git
cd crm
```

2. Install dependencies:
```bash
composer install
```

3. Copy environment file and configure:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

6. Create an admin user:
```bash
php artisan make:filament-user
```

7. Start the development server:
```bash
php artisan serve
```

8. Access the application at `http://localhost:8000/admin`

## Module Structure

The CRM functionality is organized as a Laravel module located in `Modules/CRM/`:

```
Modules/CRM/
├── app/
│   ├── Filament/
│   │   └── Resources/      # Filament admin resources
│   ├── Http/
│   │   └── Controllers/    # HTTP controllers
│   ├── Models/             # Eloquent models
│   ├── Services/           # Business logic services
│   └── Providers/          # Service providers
├── Config/                 # Module configuration
├── database/
│   ├── migrations/         # Database migrations
│   ├── seeders/           # Database seeders
│   └── factories/         # Model factories
├── resources/
│   └── views/             # Blade templates
└── routes/                # Module routes
```

## Usage

### Customer Management
1. Navigate to **CRM > Customers**
2. Click **Create** to add a new customer
3. Fill in customer details and set their stage and priority
4. Use the **Kanban Board** button to view customers in a visual pipeline

### Creating Quotes
1. Navigate to **CRM > Quotes**
2. Click **Create**
3. Select a customer
4. Add products to the quote
5. Set pricing, tax, and discount
6. Optionally attach a PDF catalog
7. Download the quote as PDF

### Follow-up Management
1. Navigate to **CRM > Follow Ups**
2. Create follow-up tasks for customers
3. Schedule dates and times
4. Track completion status

### Email Templates
1. Navigate to **CRM > Email Templates**
2. Create templates for different purposes
3. Use variables like `{customer_name}`, `{quote_number}`
4. Activate templates for use

## Email Tracking

The system includes built-in email tracking capabilities:

- **Open Tracking**: Add a tracking pixel to emails to detect when they're opened
- **Click Tracking**: Wrap links with tracking URLs to monitor clicks
- View tracking statistics in the customer and quote records

## Development

### Adding New Features

The modular structure makes it easy to extend:

1. Add new models in `Modules/CRM/app/Models/`
2. Create migrations in `Modules/CRM/database/migrations/`
3. Add Filament resources in `Modules/CRM/app/Filament/Resources/`
4. Implement business logic in services

### Testing

```bash
php artisan test
```

## Technology Stack

- **Framework**: Laravel 12
- **Admin Panel**: Filament v4
- **Modules**: nWidart/laravel-modules
- **PDF Generation**: barryvdh/laravel-dompdf
- **Database**: SQLite (default), MySQL, PostgreSQL

## License

MIT License

## Support

For issues and feature requests, please use the GitHub issue tracker.

## Credits

Developed by Visio-Soft