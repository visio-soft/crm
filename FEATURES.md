# CRM Module Features Documentation

## Overview

This document provides detailed information about all features available in the CRM module.

## 1. Customer Management

### Features
- **Complete Customer Profiles**: Store comprehensive customer information including contact details, company information, and addresses
- **Priority System**: Assign priority levels (High, Medium, Low) to customers
- **Source Tracking**: Track where customers came from (website, referral, cold call, etc.)
- **Stage-based Pipeline**: Move customers through different stages of the sales process
- **Notes & History**: Add notes and track all interactions with customers

### Customer Stages
1. **Lead**: Initial contact, not yet qualified
2. **Contacted**: Initial contact made
3. **Qualified**: Customer meets criteria and has interest
4. **Proposal Sent**: Quote or proposal has been sent
5. **Negotiation**: In active negotiation
6. **Won**: Deal closed successfully
7. **Lost**: Deal lost

### Kanban Board
The visual Kanban board provides:
- Drag-and-drop functionality (future enhancement)
- Visual pipeline overview
- Quick customer information at a glance
- Stage-based organization
- Priority indicators

**Usage:**
1. Navigate to CRM > Customers
2. Click "Kanban Board" button
3. View customers organized by stage
4. Click on any customer card to edit

## 2. Product Management

### Features
- **Product Catalog**: Maintain a complete catalog of products/services
- **SKU Management**: Unique SKU for each product
- **Pricing**: Set both sale price and cost
- **Categories**: Organize products into categories
- **Stock Tracking**: Monitor inventory levels
- **Active/Inactive Status**: Control product availability

### Product Categories
- Software
- Hardware
- Service
- Consulting
- Training
- Other

**Usage:**
1. Navigate to CRM > Products
2. Click "Create" to add a new product
3. Fill in product details, pricing, and stock information
4. Products can be used in quotes

## 3. Quote Management

### Features
- **Multi-line Quotes**: Add multiple products/services to a single quote
- **Auto-calculated Totals**: Automatic calculation of subtotals and totals
- **Tax & Discount**: Apply tax and discount to quotes
- **Quote Numbering**: Automatic quote number generation
- **Status Tracking**: Track quote status (Draft, Sent, Accepted, Rejected)
- **Validity Period**: Set expiration dates for quotes
- **PDF Generation**: Generate professional PDF quotes
- **Catalog Attachments**: Attach PDF catalogs to quotes

### Quote Workflow
1. Create quote and select customer
2. Add line items (products or custom items)
3. Apply tax and discount if needed
4. Set validity period
5. Save as draft or mark as sent
6. Download PDF for sending to customer
7. Track acceptance/rejection

### PDF Features
- Professional formatting
- Company branding area
- Itemized pricing
- Terms & conditions
- Notes section

**Usage:**
1. Navigate to CRM > Quotes
2. Click "Create"
3. Select customer
4. Add products or custom line items
5. Set pricing, tax, and discount
6. Click "PDF" to download the quote

## 4. Follow-up Management

### Features
- **Scheduled Activities**: Plan future interactions with customers
- **Activity Types**: Different types of follow-up activities
- **Status Tracking**: Track completion of activities
- **Assignment**: Assign tasks to team members
- **Notes**: Add detailed notes about follow-ups

### Follow-up Types
- **Phone Call**: Schedule a call with the customer
- **Email**: Plan an email follow-up
- **Meeting**: Schedule in-person or virtual meetings
- **Product Demo**: Plan product demonstrations
- **Other**: Any other type of follow-up

### Follow-up States
- **Pending**: Not yet completed
- **Completed**: Successfully completed
- **Cancelled**: Cancelled follow-up

**Usage:**
1. Navigate to CRM > Follow Ups
2. Click "Create"
3. Select customer and type
4. Schedule date and time
5. Add description and notes
6. Mark as completed when done

## 5. Email Templates

### Features
- **Pre-built Templates**: Create reusable email templates
- **Variable Substitution**: Use placeholders for dynamic content
- **Rich Text Editor**: Format emails with rich text
- **Template Types**: Organize templates by purpose
- **Active/Inactive**: Control which templates are available

### Template Types
- **Quote**: Templates for sending quotes
- **Information**: General information emails
- **Follow-up**: Follow-up email templates

### Available Variables
- `{customer_name}`: Customer's name
- `{company}`: Customer's company name
- `{quote_number}`: Quote number
- `{quote_total}`: Total amount of quote
- `{quote_link}`: Link to view quote
- `{valid_until}`: Quote validity date

**Usage:**
1. Navigate to CRM > Email Templates
2. Click "Create"
3. Enter template name and subject
4. Use rich text editor for email body
5. Insert variables using curly braces
6. Activate template for use

## 6. Email Tracking

### Features
- **Open Tracking**: Track when emails are opened
- **Click Tracking**: Track when links are clicked
- **Multiple Opens**: Count how many times an email is opened
- **Timestamps**: Record exact time of first open and click
- **Integration**: Works with quotes and customers

### How It Works

#### Open Tracking
- A 1x1 transparent pixel image is embedded in emails
- When the email is opened, the image loads from the server
- The server logs the open event

#### Click Tracking
- Links in emails are wrapped with tracking URLs
- When clicked, the server logs the click
- User is then redirected to the actual destination

### Tracking API Endpoints
- `GET /api/crm/track/email/{tracking_id}`: Track email opens
- `GET /api/crm/track/link/{tracking_id}/{link_id}`: Track link clicks

**Implementation:**
```php
// Create tracking record
$tracking = $emailTrackingService->createTracking($customer, $quote);

// Get tracking pixel URL
$pixelUrl = $emailTrackingService->getTrackingPixelUrl($tracking->tracking_id);

// Embed in email
<img src="{{ $pixelUrl }}" width="1" height="1" alt="" />

// Get tracking link URL
$trackingUrl = $emailTrackingService->getTrackingLinkUrl($tracking->tracking_id, $linkId);

// Use in email
<a href="{{ $trackingUrl }}">Click here</a>
```

## 7. Advanced Features

### Database Structure
All CRM data is stored in separate tables:
- `customers`: Customer information
- `products`: Product catalog
- `quotes`: Quote headers
- `quote_items`: Quote line items
- `follow_ups`: Follow-up activities
- `email_templates`: Email templates
- `email_trackings`: Email tracking data

### Services
- **QuotePdfService**: Handles PDF generation for quotes
- **EmailTrackingService**: Manages email tracking functionality

### Security
- All routes are protected by Filament authentication
- Email tracking uses unique, non-guessable UUIDs
- File uploads are validated and stored securely

## 8. Customization

### Extending the Module

#### Adding New Fields
1. Create a new migration in `Modules/CRM/database/migrations/`
2. Add the field to the model in `Modules/CRM/app/Models/`
3. Update the Filament resource to include the new field

#### Adding New Features
1. Create new models in `Modules/CRM/app/Models/`
2. Create migrations in `Modules/CRM/database/migrations/`
3. Create Filament resources in `Modules/CRM/app/Filament/Resources/`
4. Add routes if needed in `Modules/CRM/routes/`

### Configuration
Module configuration is stored in `Modules/CRM/Config/config.php`:
- Kanban stages
- Follow-up types
- Quote validity defaults

## 9. Best Practices

### Customer Management
- Always set a priority for new customers
- Move customers through stages systematically
- Add notes for important interactions
- Use the Kanban board for daily pipeline review

### Quote Management
- Keep quote numbers sequential
- Set realistic validity periods
- Include detailed descriptions in line items
- Use the PDF for formal communication

### Follow-up Management
- Schedule follow-ups immediately after interactions
- Set realistic due dates
- Add detailed notes about what to discuss
- Mark activities as completed promptly

### Email Templates
- Keep templates professional and concise
- Test variables before using in production
- Maintain multiple templates for different scenarios
- Review and update templates regularly

## 10. Reporting & Analytics

### Available Metrics
- Customer count by stage
- Total quote value
- Acceptance/rejection rates
- Follow-up completion rates
- Email open rates
- Product sales

### Future Enhancements
- Dashboard widgets for key metrics
- Custom reports
- Export functionality
- Advanced filtering
- Bulk operations

## 11. Integration Possibilities

The module is designed to be extensible and can integrate with:
- Email service providers (SendGrid, Mailgun, etc.)
- Payment gateways
- Accounting software
- Calendar applications
- Marketing automation tools

## 12. Troubleshooting

### PDF Generation Issues
- Ensure dompdf is properly configured
- Check storage permissions
- Verify fonts are accessible

### Email Tracking Not Working
- Confirm tracking pixel image exists
- Check route registration
- Verify database records are created

### Performance Optimization
- Use database indexing on frequently queried columns
- Implement caching for static data
- Optimize database queries
- Use queue for email sending

## Support

For additional help:
- Review the INSTALLATION.md guide
- Check the README.md file
- Consult Laravel and Filament documentation
- Open an issue on GitHub

## License

This CRM module is open-source software licensed under the MIT license.
