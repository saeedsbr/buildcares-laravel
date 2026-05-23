<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New enquiry — BuildCares</title>
</head>
<body style="margin:0; padding:0; background:#f1f5f9; font-family:'DM Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',sans-serif; color:#0f172a;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f1f5f9; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="max-width:600px; background:#ffffff; border:1px solid #e2e8f0;">
                    {{-- Header --}}
                    <tr>
                        <td style="background:#0f172a; padding:24px 28px; border-bottom:2px solid #2563eb;">
                            <div style="color:#ffffff; font-size:20px; font-weight:700; letter-spacing:-0.01em;">
                                Build<span style="color:#60a5fa;">Cares</span>
                            </div>
                            <div style="color:#94a3b8; font-size:11px; text-transform:uppercase; letter-spacing:0.18em; margin-top:4px;">
                                New contact enquiry
                            </div>
                        </td>
                    </tr>

                    {{-- Subject --}}
                    <tr>
                        <td style="padding:28px 28px 8px;">
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.18em; color:#2563eb; margin-bottom:8px;">
                                Subject
                            </div>
                            <div style="font-size:18px; font-weight:600; color:#0f172a; line-height:1.4;">
                                {{ $contact->subject }}
                            </div>
                        </td>
                    </tr>

                    {{-- Details --}}
                    <tr>
                        <td style="padding:20px 28px 8px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background:#f8fafc; border:1px solid #e2e8f0; border-left:3px solid #2563eb;">
                                <tr>
                                    <td style="padding:18px 20px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td style="padding:6px 0; font-size:11px; text-transform:uppercase; letter-spacing:0.12em; color:#94a3b8; width:90px;">From</td>
                                                <td style="padding:6px 0; font-size:14px; color:#0f172a; font-weight:600;">{{ $contact->name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:6px 0; font-size:11px; text-transform:uppercase; letter-spacing:0.12em; color:#94a3b8;">Email</td>
                                                <td style="padding:6px 0; font-size:14px;">
                                                    <a href="mailto:{{ $contact->email }}" style="color:#2563eb; text-decoration:none;">{{ $contact->email }}</a>
                                                </td>
                                            </tr>
                                            @if($contact->phone)
                                            <tr>
                                                <td style="padding:6px 0; font-size:11px; text-transform:uppercase; letter-spacing:0.12em; color:#94a3b8;">Phone</td>
                                                <td style="padding:6px 0; font-size:14px;">
                                                    <a href="tel:{{ $contact->phone }}" style="color:#2563eb; text-decoration:none;">{{ $contact->phone }}</a>
                                                </td>
                                            </tr>
                                            @endif
                                            @if($contact->service)
                                            <tr>
                                                <td style="padding:6px 0; font-size:11px; text-transform:uppercase; letter-spacing:0.12em; color:#94a3b8;">Service</td>
                                                <td style="padding:6px 0; font-size:14px; color:#0f172a;">{{ ucwords(str_replace('-', ' ', $contact->service)) }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td style="padding:6px 0; font-size:11px; text-transform:uppercase; letter-spacing:0.12em; color:#94a3b8;">Received</td>
                                                <td style="padding:6px 0; font-size:14px; color:#475569;">{{ $contact->created_at->format('M j, Y · g:i a') }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Message --}}
                    <tr>
                        <td style="padding:20px 28px;">
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.18em; color:#2563eb; margin-bottom:10px;">
                                Message
                            </div>
                            <div style="font-size:14px; line-height:1.6; color:#1e293b; white-space:pre-line;">{{ $contact->message }}</div>
                        </td>
                    </tr>

                    {{-- CTA --}}
                    <tr>
                        <td style="padding:8px 28px 28px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="background:#2563eb;">
                                        <a href="mailto:{{ $contact->email }}?subject={{ urlencode('Re: ' . $contact->subject) }}"
                                           style="display:inline-block; padding:12px 22px; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.1em; color:#ffffff; text-decoration:none;">
                                            Reply to {{ $contact->name }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background:#f8fafc; border-top:1px solid #e2e8f0; padding:18px 28px; text-align:center;">
                            <div style="font-size:11px; color:#94a3b8; line-height:1.6;">
                                Sent from the BuildCares contact form.<br>
                                Just hit reply — your response will go straight to <strong style="color:#475569;">{{ $contact->name }}</strong>.
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
