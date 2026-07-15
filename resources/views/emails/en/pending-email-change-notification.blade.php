@component('mail::message')
Hello {{ $user->firstname ?: 'there' }},

Someone requested to change the login email on your EU Code Week account from **{{ $user->email }}** to **{{ $newEmail }}**.

If you made this request, no action is needed — the change will only take effect after the new address is confirmed.

If you did **not** request this, please contact us immediately at info@codeweek.eu.

Thanks,<br>
The EU Code Week team
@endcomponent
