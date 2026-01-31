<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quote #{{ $quote->quote_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
        }
        .company-info {
            margin-bottom: 30px;
        }
        .customer-info {
            margin-bottom: 30px;
        }
        .quote-details {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th {
            background-color: #f3f4f6;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #2563eb;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }
        .totals {
            margin-top: 20px;
            text-align: right;
        }
        .totals table {
            margin-left: auto;
            width: 300px;
        }
        .totals table td {
            border: none;
        }
        .total-row {
            font-weight: bold;
            font-size: 1.2em;
            color: #2563eb;
        }
        .notes {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9fafb;
            border-left: 4px solid #2563eb;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9em;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>PRICE QUOTE</h1>
        <p>Quote #{{ $quote->quote_number }}</p>
    </div>

    <div class="company-info">
        <strong>From:</strong><br>
        Your Company Name<br>
        Address Line 1<br>
        City, State, ZIP<br>
        Email: info@yourcompany.com
    </div>

    <div class="customer-info">
        <strong>To:</strong><br>
        {{ $quote->customer->name }}<br>
        @if($quote->customer->company)
            {{ $quote->customer->company }}<br>
        @endif
        @if($quote->customer->address)
            {{ $quote->customer->address }}<br>
        @endif
        @if($quote->customer->city || $quote->customer->country)
            {{ $quote->customer->city }}@if($quote->customer->city && $quote->customer->country), @endif{{ $quote->customer->country }}<br>
        @endif
        @if($quote->customer->email)
            {{ $quote->customer->email }}
        @endif
    </div>

    <div class="quote-details">
        <p><strong>Title:</strong> {{ $quote->title }}</p>
        <p><strong>Date:</strong> {{ $quote->created_at->format('F d, Y') }}</p>
        <p><strong>Valid Until:</strong> {{ $quote->valid_until ? $quote->valid_until->format('F d, Y') : 'N/A' }}</p>
        @if($quote->description)
            <p><strong>Description:</strong> {{ $quote->description }}</p>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quote->items as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td>{{ number_format($item->quantity, 2) }}</td>
                    <td>${{ number_format($item->unit_price, 2) }}</td>
                    <td>${{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td>Subtotal:</td>
                <td>${{ number_format($quote->subtotal, 2) }}</td>
            </tr>
            @if($quote->discount > 0)
                <tr>
                    <td>Discount:</td>
                    <td>-${{ number_format($quote->discount, 2) }}</td>
                </tr>
            @endif
            @if($quote->tax > 0)
                <tr>
                    <td>Tax:</td>
                    <td>${{ number_format($quote->tax, 2) }}</td>
                </tr>
            @endif
            <tr class="total-row">
                <td>Total:</td>
                <td>${{ number_format($quote->total, 2) }}</td>
            </tr>
        </table>
    </div>

    @if($quote->notes)
        <div class="notes">
            <strong>Notes:</strong><br>
            {{ $quote->notes }}
        </div>
    @endif

    @if($quote->terms_conditions)
        <div class="notes">
            <strong>Terms & Conditions:</strong><br>
            {{ $quote->terms_conditions }}
        </div>
    @endif

    <div class="footer">
        <p>Thank you for your business!</p>
        <p>This quote is valid until {{ $quote->valid_until ? $quote->valid_until->format('F d, Y') : 'specified date' }}</p>
    </div>
</body>
</html>
