<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>
    <style>
        /* Your ticket styling goes here */
    </style>
</head>
<body>
    <h1>Ticket for {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Event: {{ $event->title }}</p>
    <p>Date: {{ $event->date }}</p>
    <p>Location: {{ $event->location }}</p>
    <!-- Add more details as needed -->
</body>
</html>
