<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h4>Нове повідомлення на сайті Sphered</h4>
<table>
    <tr>
        <td>Ім'я</td>
        <td>{{$name}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$email}}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>{{$phone}}</td>
    </tr>
</table>
<p>Повідомлення:</p>
<p>{{nl2br($client_message)}}</p>
</body>
</html>
