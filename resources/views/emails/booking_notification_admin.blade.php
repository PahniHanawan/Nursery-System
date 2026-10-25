<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Visit Tour Request</title>
</head>
<body style="margin: 0; padding: 24px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f7faf7; color: #1f2937;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; border: 1px solid #e5e7eb;">
        <tr>
            <td style="background-color: #0f172a; padding: 28px 24px; color: #ffffff;">
                <span style="background-color: #f59e0b; color: #111827; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 3px 8px; border-radius: 4px; letter-spacing: 0.5px;">Admissions Action Required</span>
                <h1 style="margin: 10px 0 0; font-size: 20px; font-weight: 700;">New Visit Tour Request Received</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 28px 24px;">
                <p style="font-size: 15px; margin-top: 0;">A prospective parent has submitted a visit tour enquiry through the website:</p>

                <table style="width: 100%; border-collapse: collapse; font-size: 14px; margin: 18px 0;">
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280; width: 35%;"><strong>Parent Name:</strong></td>
                        <td style="padding: 8px 0; color: #111827;">{{ $booking->parent_name }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Email:</strong></td>
                        <td style="padding: 8px 0; color: #111827;"><a href="mailto:{{ $booking->email }}" style="color: #2563eb; text-decoration: none;">{{ $booking->email }}</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Phone:</strong></td>
                        <td style="padding: 8px 0; color: #111827;"><a href="tel:{{ $booking->phone }}" style="color: #2563eb; text-decoration: none;">{{ $booking->phone }}</a></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Child Age / DOB:</strong></td>
                        <td style="padding: 8px 0; color: #111827;">{{ $booking->child_age_or_dob }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Preferred Date:</strong></td>
                        <td style="padding: 8px 0; color: #111827; font-weight: 600;">{{ $booking->preferred_date->format('l, F j, Y') }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Preferred Time:</strong></td>
                        <td style="padding: 8px 0; color: #111827; font-weight: 600;">{{ $booking->preferred_time }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f3f4f6;">
                        <td style="padding: 8px 0; color: #6b7280;"><strong>Intended Start:</strong></td>
                        <td style="padding: 8px 0; color: #111827;">{{ $booking->intended_start_date ?? 'Not specified' }}</td>
                    </tr>
                    @if($booking->notes)
                    <tr>
                        <td style="padding: 8px 0; color: #6b7280; vertical-align: top;"><strong>Notes / Questions:</strong></td>
                        <td style="padding: 8px 0; color: #111827; line-height: 1.5;">{{ $booking->notes }}</td>
                    </tr>
                    @endif
                </table>

                <div style="margin: 28px 0 16px; text-align: center;">
                    <a href="{{ route('admin.bookings.show', $booking) }}" style="display: inline-block; background-color: #15803d; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; font-size: 14px;">
                        Open Booking in Admin Dashboard &rarr;
                    </a>
                </div>
            </td>
        </tr>
        <tr>
            <td style="background-color: #f9fafb; padding: 16px 24px; text-align: center; border-top: 1px solid #e5e7eb; font-size: 12px; color: #9ca3af;">
                Little Sprouts Nursery Admissions System &bull; Automated Staff Alert
            </td>
        </tr>
    </table>
</body>
</html>
