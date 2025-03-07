<!DOCTYPE html>
<html>
<head>
    <title>Your Salary Has Been Credited</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}!</h1>
    <p>We are happy to inform you that your salary for this month has been successfully credited to your account.</p>
    <p>Your current balance is now: <strong>{{ number_format($amount, 2) }} DH</strong>.</p>
    <p>Thank you for being a valued member of our company!</p>
    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
