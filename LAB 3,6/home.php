<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ЛР3</title>
</head>
<body>
    <header>
        <img src="" alt="Картинка">
    </header>
    <main class="main-form">
        <?php
        echo '<p>Здравствуйте, '.$_POST['name'].'</p>';
        if ($_POST['category'] == 'propose'){
            echo '<p>Спасибо за Ваше предложение:</p>';
            echo '<textarea>'.$_POST['message'].'</textarea>';
        }else{
            echo '<p>Мы рассмтрим Вашу жалобу:</p>';
            echo '<textarea>'.$_POST['message'].'</textarea>';
        }
        if ($_POST['attachment']) echo 'Вы приложили следующий файл:'.$_POST['attachment'];
        echo '<a class="button" href="index.php?name='.$_POST['name'].'&email='.$_POST['email'].'&source='.$_POST['source'].'">Заполнить форму еще раз</a>';
        ?>
    </main>

</body>
</html>