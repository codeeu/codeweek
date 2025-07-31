<h2>New Contact Form Submission</h2>

<p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
<p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
@if (!empty($data['phone']))
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
@endif
@if (!empty($data['subject']))
    <p><strong>Subject:</strong> {{ ucfirst($data['subject']) }}</p>
@endif
<p><strong>Message:</strong></p>
<p>{!! nl2br(e($data['message'])) !!}</p>
