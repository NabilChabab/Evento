<!DOCTYPE html>
<html>
<head>
    <title>Your Event Ticket</title>
</head>
<body>
    <p>Dear {{ $user->name }},</p>
    <p>Please find attached your event ticket for "{{ $event->title }}".</p>
    
    <p>Thank you for your reservation!</p>

 
</body>
</html>
