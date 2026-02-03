# CRM Module for Laravel

[![Latest Version](https://img.shields.io/packagist/v/visio-soft/crm.svg)](https://packagist.org/packages/visio-soft/crm)
[![License](https://img.shields.io/packagist/l/visio-soft/crm.svg)](https://packagist.org/packages/visio-soft/crm)

A comprehensive CRM (Customer Relationship Management) module for Laravel 11+ and Filament v4. This package provides complete customer management, kanban board visualization, quote generation with PDF export, follow-up tracking, email templates, and email engagement tracking.

## Features

### 🎯 Customer Management
- Complete customer profiles with contact information
- Priority system (High, Medium, Low)
- Source tracking
- Stage-based sales pipeline
- Notes and interaction history
- **Visual Kanban Board** across 7 stages:
  - Lead → Contacted → Qualified → Proposal → Negotiation → Won/Lost

### 📦 Product Catalog
- SKU tracking, pricing and cost management
- Category organization
- Stock quantity tracking

### 💼 Quote System
- Multi-line item quotes with auto-calculated totals
- Quote status tracking (Draft, Sent, Accepted, Rejected)
- **Professional PDF generation** with PDF catalog attachments
- Validity period management

### 📅 Follow-up Management
- Schedule activities (Call, Email, Meeting, Demo)
- Status tracking with team assignment

### ✉️ Email System
- Reusable templates with variable substitution
- **Email open and click tracking**

## Requirements

- PHP 8.2+
- Laravel 11.0 or 12.0
- Filament v4

## Installation

```bash
composer require visio-soft/crm
```

### Publish and Migrate

```bash
php artisan vendor:publish --tag=crm-config
php artisan migrate
```

### Seed Initial Data (Optional)

```bash
php artisan db:seed --class=Modules\\CRM\\database\\seeders\\CRMDatabaseSeeder
```

## Usage

Access the CRM in your Filament admin panel at `/admin`. The module adds:
- Customers (with Kanban Board)
- Products
- Quotes (with PDF download)
- Follow-ups
- Email Templates

## Configuration

Edit `config/crm.php` to customize kanban stages, follow-up types, and defaults.

## API Endpoints

```
GET /api/crm/track/email/{uuid}    # Track email opens
GET /api/crm/track/link/{uuid}/{id} # Track link clicks
```

## Documentation

- [FEATURES.md](FEATURES.md) - Complete feature guide
- [CHANGELOG.md](CHANGELOG.md) - Version history

## License

MIT License. See [LICENSE.md](LICENSE.md) for details.
