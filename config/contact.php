<?php

return [
    // Email address that receives contact-form submissions.
    'recipient_email' => env('CONTACT_RECIPIENT_EMAIL', 'anwar@buildcares.com'),

    // WhatsApp number (digits only, with country code, no +). Used by the "Send via WhatsApp"
    // button on the contact form to open wa.me/<number> with the message pre-filled.
    'whatsapp_number' => env('WHATSAPP_NUMBER', '447586750755'),
];
