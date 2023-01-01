<!DOCTYPE html>
<html>
<head>
	<title>Aviyan Group</title>
</head>
<body>
	<h3>Hi {{ $body['name'] }},</h3>
    <p>You have been registered to Aviyan Group. Your login details are shared below:</p><br>

	Email: {{ $body['email'] ?? '' }} <br>
	Password: {{ $body['password'] ?? '' }} <br>

    <a href="{{ $body['url'] }}">login</a>
</body>
</html>
