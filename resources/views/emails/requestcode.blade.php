<!DOCTYPE html>
<html lang="uk-UA">
<head>
    <meta charset="utf-8">
    <style>
        td{
            padding: 15px;
        }
    </style>
</head>
<body>
<h4>Заявка на код вставки</h4>
<table>
    <tr>
        <td>Ім'я:</td>
        <td>{{$name?$name:'Не вказано'}}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{$email?$email:'Не вказано'}}</td>
    </tr>
    <tr>
        <td>Сайт:</td>
        <td>{{$site?$site:'Не вказано'}}</td>
    </tr>
    <tr>
        <td>Назва роботи:</td>
        <td>{{$workname?$workname:'Не вказано'}}</td>
    </tr>
</table>
<p>Ціль:</p>
<p>{{$goal?nl2br($goal):'Не вказано'}}</p>
</body>
</html>