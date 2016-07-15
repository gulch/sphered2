<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h4>Добавление работы</h4>
        <table>
            <tr>
                <td>Имя: </td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Телефон: </td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td>Веб-сайт: </td>
                <td>{{ $website }}</td>
            </tr>
            <tr>
                <td>Тип работи: </td>
                <td>{{ $project_type }}</td>
            </tr>
            <tr>
                <td>Кто: </td>
                <td>{{ $business }}</td>
            </tr>
        </table>
        <p>Описание: </p>
        <p>{{ nl2br($description) }}</p>
    </body>
</html>
