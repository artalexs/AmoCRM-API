<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="jquery.js"></script>
    <title>Авторизация</title>
</head>
<body>
    <div  class="login-form">

    <h1>Авторизация</h1>

    <form action="auth.php" method="post">

    <input type="text" name="name" id="contact_name" placeholder="Имя">

    <input type="text" name="company" id="contact_company" placeholder="Компания">

    <input type="text" name="position" id="contact_position" placeholder="Должность">

    <input  type="text" placeholder="Ваш телефонный номер"  maxlength='15' name="phone" id="contact_phone" >

    <input type="email" name="email" id="contact_email" placeholder="E-mail">

    <input type="number" name="budget" id="budget" placeholder="Бюджет (в рублях)">

    <input type="submit" value="Отправить">
</form>
    </div>
</body>
</html>
