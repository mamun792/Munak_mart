<!DOCTYPE html>
<html>
<head>
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            padding: 20px;
            border: 1px solid #ccc;
            width: 80%;
            margin: 0 auto;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Invoice ID: {{ $invoice->id }}</p>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Invoice No</td>
                <td>{{ $invoice->invoice_no }}</td>
            </tr>
            {{-- <tr>
                <td>Product Name</td>
                <td>{{  $invoice_details->product->product_name }}</td>
            </tr> --}}
            <tr>
                <td>Quantity</td>
                <td>
                    @if ($invoice->invoiceDownload)
                    {{ $invoice->invoiceDownload->quantity }}
                @else
                    N/A
                @endif
                </td>
            </tr>
            <tr>
                <td>User Name</td>
                <td>{{ $adderss->CustomerName }}</td>
            </tr>
            <tr>
                <td>User Address</td>
                <td>{{  $adderss->CustomerAddress }}</td>
            </tr>
            <tr>
                <td>User ID</td>
                <td>{{ $invoice->user_id }}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ $adderss->PhoneNumber }}</td>
            </tr>
            <!-- Add more rows for other fields as needed -->
        </table>
        <p class="total">Total Amount: {{ $invoice->total_amount }}</p>


    </div>
</body>
</html>


