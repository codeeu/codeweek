@component('mail::message')
Hello {{ $user->firstname ?: 'there' }},

You requested to change the login email on your EU Code Week account to **{{ $user->pending_email }}**.

Click the button below to confirm this change. This link expires in 48 hours.

@component('mail::button', ['url' => $confirmUrl])
Confirm new login email
@endcomponent

If you did not request this change, you can ignore this email.

Thanks,<br>
The EU Code Week team
@endcomponent
