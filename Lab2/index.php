<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <?php echo '<title>'.$name = 'Веб-разработчик Воробьев В.А.'.' </title>' ?>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <header class="header">
            <div class="container">
                <nav class="main-menu">
                    <a class = "navigation" href="
                    <?php
                        $text='Главная';
                        $ref='index.php';
                        $current=true;
                        echo $ref;                    
                    ?>"
                    <?php
                        if($current) echo ' id="underline"';
                    ?>

                    ><?= $text?></a>
                    <a class = "navigation" href="#about">Обо мне</a>
                    <a href="<?php
                        $text='Навыки';
                        $ref='skills.html';
                        echo $ref;
                    ?>"
                    class = "navigation"><?= $text?></a>
                    <a  href="<?php
                        $text='Технологии';
                        $ref='technologies.html';
                        echo $ref;
                    ?>"
                    class = "navigation"><?= $text?></a>
                </nav>   
            <div class="text-center py-5">
                <h1 class="name">Воробьев Владислав Алексеевич</h1>
                <h2>Мой коронный анекдот:</h2>
                <p class="w-50 mx-auto my-3 ">
                    Идёт грузин с бумерангом, весь в синяках и ссадинах. Hавстречу ему другой:
                    <p>
                        - Вано, эта чито у тэбя в рукэ?
                    </p>
                    <p>
                        - Hэ знаю.
                    </p>
                    <p>
                        - А зачэм она тибэ?
                    </p>
                    <p>
                        - Hэ знаю.
                    </p>
                    <p>
                        - Так ти её викинь.
                    </p>
                    <p>
                        - Hа, билят, сам викинь!
                    </p>
                </p>
                <a class="btn contact-me-btn" href="mailto:vlad.vlad.vorobyov@mail.ru">Написать мне</a>
            </div>
            </div>
        </header>
        
        <main>
            <div class="container">
                <section id="about">
                <h1>Обо мне</h1>
                <?php
                    if (date("s") % 2 === 0) {
                        $name = "images\person.png";
                    } else {
                        $name = "images\php.png";
                    }
                ?>  

                <figure class="avatar">
                    <img src=<?=$name?> alt="Person"> 
                </figure>
                
                <p>
                Я живу в подмосковном городе Жуковский. Окончил школу №3 с углубленным изучением английского языка, 
                    поэтому владею им на повышенном уровне. В 10-11 классах понял, что мне нравится информационные технологиии. 
                    Так я поступил в Московский политех. На первом курсе мои навыки в области программирования улучшились. 
                    Я крайне доволен своим обучением и предметами, которые изучаю в универе.
                </p>
            </section> 
            <section id="skills">
                <h1>Навыки</h1>
                <p>
                Я хорошо программирую на JAVA. Знаю SQL на базовом уровне. Также я хотел бы научиться работать в какой-нибудь программе для 3D моделирования.
                </p>
                <div class="text-right">
                    <a class="btn" href="skills.html">Подробнее</a>
                </div>
                
            </section>   

            <section>
                <h1>Технологии</h1>
                <p>
                Список технологий, которыми я владею:
                </p>
                <?php
                    $arr = array('SQL', 'Python', 'Java');
                ?>
                <ul>
                    <li><?=$arr[0];?></li>
                    <li><?=$arr[1];?></li>
                    <li><?=$arr[2];?></li>
                </ul>
                <div class="text-right">
                    <a class="btn" href="technologies.html">Подробнее</a>
                </div>
            </section>
            </div>
        </main>
        
        <footer class="footer">
            <div class="container">
                &copy; Воробьев В.А.
                <?php
                    date_default_timezone_set("Europe/Moscow");
                    echo "<p>&nbsp; Сформировано: ".date("d.m.Y в H-i.s")."</p>";
                ?>
            </div>
        </footer>

    </body>
</html>