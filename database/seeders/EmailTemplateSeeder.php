<?php

namespace Modules\CRM\database\seeders;

use Illuminate\Database\Seeder;
use Modules\CRM\app\Models\EmailTemplate;

class EmailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Quote Email',
                'subject' => 'Your Price Quote #{quote_number}',
                'body' => '<p>Dear {customer_name},</p>
                    <p>Thank you for your interest in our products and services.</p>
                    <p>Please find attached your personalized quote #{quote_number} for a total of ${quote_total}.</p>
                    <p>This quote is valid until {valid_until}.</p>
                    <p>If you have any questions, please don\'t hesitate to contact us.</p>
                    <p>Best regards,<br>Your Company Team</p>',
                'type' => 'quote',
                'is_active' => true,
            ],
            [
                'name' => 'Follow-up Email',
                'subject' => 'Following up on your inquiry',
                'body' => '<p>Dear {customer_name},</p>
                    <p>I wanted to follow up on our recent conversation.</p>
                    <p>Have you had a chance to review our proposal?</p>
                    <p>I\'d be happy to answer any questions or provide additional information.</p>
                    <p>Looking forward to hearing from you.</p>
                    <p>Best regards,<br>Your Company Team</p>',
                'type' => 'follow_up',
                'is_active' => true,
            ],
            [
                'name' => 'Product Information',
                'subject' => 'Information about our products',
                'body' => '<p>Dear {customer_name},</p>
                    <p>Thank you for your interest in our products.</p>
                    <p>Please find attached our product catalog with detailed information about our offerings.</p>
                    <p>We\'d be happy to schedule a demo or answer any questions you may have.</p>
                    <p>Best regards,<br>Your Company Team</p>',
                'type' => 'information',
                'is_active' => true,
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::create($template);
        }
    }
}
