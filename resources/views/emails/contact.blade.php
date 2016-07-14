<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h4>Новое сообщение с сайта Sphered</h4>
        <table>
            <tr>
                <td>Имя</td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td>{{ $phone }}</td>
            </tr>
        </table>
        <p>Сообщение:</p>
        <p>{{ nl2br($client_message) }}</p>
    </body>
</html>
