<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visit Request Received - Little Sprouts Nursery</title>
</head>
<body style="margin: 0; padding: 24px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f7faf7; color: #1f2937;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e5e7eb; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
        <tr>
            <td style="background-color: #15803d; padding: 32px 24px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px; font-weight: 700; letter-spacing: -0.5px;">Little Sprouts Nursery</h1>
                <p style="margin: 6px 0 0; font-size: 14px; opacity: 0.9;">Visit Tour Request Confirmation</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 32px 24px;">
                <p style="font-size: 16px; margin-top: 0;">Dear <strong>{{ $booking->parent_name }}</strong>,</p>
                <p style="font-size: 15px; line-height: 1.6; color: #4b5563;">
                    Thank you for your interest in Little Sprouts Nursery! We have safely received your request for a facility tour (show-around).
                </p>

                <div style="background-color: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 18px; margin: 24px 0;">
                    <h3 style="margin: 0 0 12px; color: #166534; font-size: 16px; font-weight: 600;">Requested Visit Details:</h3>
                    <table style="width: 100%; font-size: 14px; line-height: 1.8;">
                        <tr>
                            <td style="color: #4b5563; width: 40%;"><strong>Preferred Date:</strong></td>
                            <td style="color: #111827;">{{ $booking->preferred_date->format('l, F j, Y') }}</td>
                        </tr>
                        <tr>
                            <td style="color: #4b5563;"><strong>Preferred Time:</strong></td>
                            <td style="color: #111827;">{{ $booking->preferred_time }}</td>
                        </tr>
                        <tr>
                            <td style="color: #4b5563;"><strong>Child Age / DOB:</strong></td>
                            <td style="color: #111827;">{{ $booking->child_age_or_dob }}</td>
                        </tr>
                        @if($booking->intended_start_date)
                        <tr>
                            <td style="color: #4b5563;"><strong>Estimated Start:</strong></td>
                            <td style="color: #111827;">{{ $booking->intended_start_date }}</td>
                        </tr>
                        @endif
                    </table>
                </div>

                <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; padding: 14px 16px; border-radius: 0 8px 8px 0; margin-bottom: 24px;">
                    <p style="margin: 0; font-size: 14px; color: #1e40af; line-height: 1.5;">
                        <strong>Next Steps:</strong> Our admissions team reviews visits to ensure dedicated staff-to-child ratios during tours. We will contact you within <strong>24–48 hours</strong> via phone or email to confirm your exact meeting slot.
                    </p>
                </div>

                <p style="font-size: 14px; color: #6b7280; line-height: 1.6;">
                    If you need to adjust your requested date or have urgent inquiries, please contact our admissions office directly at:
                    <br>
                    <strong>Phone:</strong> +44 (0) 20 7946 0912
                    <br>
                    <strong>Email:</strong> admissions@littlesproutsnursery.test
                </p>

                <p style="font-size: 15px; margin-bottom: 0; color: #111827;">
                    Warm regards,<br>
                    <strong>Sarah Jenkins & the Little Sprouts Admissions Team</strong>
                </p>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f9fafb; padding: 20px 24px; text-align: center; border-top: 1px solid #e5e7eb; font-size: 12px; color: #9ca3af;">
                <p style="margin: 0;">Little Sprouts Nursery &bull; 14 Primrose Lane, Kensington, London, W8 7PT</p>
                <p style="margin: 4px 0 0;">This email was sent in response to your enquiry form submission under EU GDPR consent guidelines.</p>
            </td>
        </tr>
    </table>
</body>
</html>
