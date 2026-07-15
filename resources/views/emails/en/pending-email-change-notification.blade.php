@component('mail::message')
Hello {{ $user->firstname ?: 'there' }},

Someone requested to change the login email on your EU Code Week account from **{{ $user->email }}** to **{{ $newEmail }}**.

**This is only a security notice.** The confirmation link was sent separately to **{{ $newEmail }}**. Open that inbox and click **Confirm new login email** to finish the change.

If you made this request, you can ignore this email and confirm from **{{ $newEmail }}** instead.

If you did **not** request this, please contact us immediately at info@codeweek.eu.

Thanks,<br>
The EU Code Week team
@endcomponent
