<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h4>Заявка на новий проект</h4>
        <table>
            <tr>
                <td>Ім'я:</td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Телефон:</td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td>Веб-сайт:</td>
                <td>{{ $website ? $website : 'Не вказано'}}</td>
            </tr>
            <tr>
                <td>Тип роботи:</td>
                <td>{{ $project_type ? $project_type : 'Не вказано' }}</td>
            </tr>
            <tr>
                <td>Діяльність:</td>
                <td>{{ $business ? $business : 'Не вказано' }}</td>
            </tr>
        </table>
        <p>Опис:</p>
        <p>{{ nl2br($description) }}</p>
    </body>
</html>