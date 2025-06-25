<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        .invoice-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 30px;
            margin: 25px 0;
            border-left: 4px solid #667eea;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .invoice-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .invoice-number {
            font-size: 14px;
            color: #6c757d;
            background: #e9ecef;
            padding: 4px 12px;
            border-radius: 20px;
        }

        .invoice-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 16px;
            color: #2c3e50;
            font-weight: 500;
        }

        .amount {
            font-size: 24px !important;
            font-weight: 700 !important;
            color: #28a745 !important;
        }

        .status-badge {
            background: #d4edda;
            color: #155724;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .cta-section {
            text-align: center;
            margin: 30px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
        }

        .footer {
            background: #2c3e50;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .footer h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer p {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 5px;
        }

        .social-links {
            margin-top: 20px;
        }

        .social-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #667eea, transparent);
            margin: 30px 0;
        }

        @media (max-width: 600px) {
            .email-container {
                margin: 0;
                box-shadow: none;
            }

            .header,
            .content,
            .footer {
                padding: 20px;
            }

            .invoice-card {
                padding: 20px;
            }

            .invoice-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .invoice-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Invoice Generated</h1>
            <p>Thank you for your continued subscription</p>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="greeting">
                Hello [Customer Name],
            </div>

            <p>Your subscription invoice has been generated successfully. Below are the details of your current
                subscription:</p>

            <!-- Invoice Card -->
            <div class="invoice-card">
                <div class="invoice-header">
                    <div class="invoice-title">Subscription Invoice</div>
                    <div class="invoice-number">INV-{{ date('Y-m-d') }}-001</div>
                </div>

                <div class="invoice-details">
                    <div class="detail-item">
                        <span class="detail-label">Plan</span>
                        <span class="detail-value">{{ $subscription->plan->name }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Amount</span>
                        <span class="detail-value amount">${{ $subscription->amount }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Start Date</span>
                        <span class="detail-value">{{ $subscription->start_date }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">End Date</span>
                        <span class="detail-value">{{ $subscription->end_date }}</span>
                    </div>

                    <div class="detail-item">
                        <span class="detail-label">Status</span>
                        <span class="status-badge">Active</span>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <p>Your subscription will automatically renew unless cancelled before the end date. You can manage your
                subscription at any time through your account dashboard.</p>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="#" class="cta-button">View Full Invoice</a>
            </div>

            <p><strong>Questions?</strong> Our support team is here to help. Reply to this email or contact us through
                your account.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <h3>NectarBits Pvt Ltd</h3>
                <p>123 Business Street, Suite 100</p>
                <p>City, State 12345</p>
                <p>support@yourcompany.com | (555) 123-4567</p>
            </div>

            <div class="social-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Unsubscribe</a>
            </div>
        </div>
    </div>
</body>

</html>
