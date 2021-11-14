<?php
    include 'header.html';
    if (isset($_GET['name'])){
        $name=$_GET['name'];
        $email=$_GET['email'];
        $source=$_GET['source'];
    }
    ?>

    <main class="main-form">
    <h1>Форма обратной связи</h1>
    <div class="container">
        <form action="home.php" method="POST">
            <input type="hidden" name="id" value="6">
            <div class="form-group">
                <label class="form-label" for="name">ФИО</label>
                <input type="text" name="name" id="name" value="<?=$name;?>" required>
            </div>
            <div class="form-group">
                <div class="flex">
                    <input type="checkbox" name="send" id="send">
                    <label class="form-label" for="send">Отправить текст сообщения на почту?</label>
                </div>
                <div class="e-mail">
                    <label class="form-label" for="email">Мыло</label>
                    <input type="text" name="email" id="email" value="<?=$email;?>" placeholder="Введите email" required>
                </div>
            </div>
            <div class="form-group">
                <p class="form-label">Как вы узнали о нас?</p>
                <input type="radio" name="source" id="advertising" value="advertising"
                <?php if ($source == 'advertising') echo 'checked';?>>
                <label for="advertising">Реклама в интернете</label>
                <input type="radio" name="source" id="friends" value="friends"
                <?php if ($source == 'friends') echo 'checked';?>>
                <label for="friends">Рассказали друзья</label>
            </div>
            <div class="form-group">
                <label class="form-label" for="category">Категория обращения</label>
                <select name="category" id="category">
                    <option value="propose">Предложение</option>
                    <option value="grievance">Жалоба</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="message">Текст сообщения</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="attachment">Вложение</label>
                <input type="file" name="attachment" id="attachment">
            </div>
            <div class="form-group">
                <input type="checkbox" name="agreement" id="agreement" value="yes" required>
                <label class="form-label" for="checkbox">Даю согласие на обработку формы</label>
            </div>
            <div class="form-group">
                <input class="button" type="submit" id="submit" value="Отправить" disabled>
            </div>
        </form>
    </div>
    </main>

</body>
</html>
<script src="script.js"></script>