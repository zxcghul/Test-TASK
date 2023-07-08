<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="./fonts/stylesheet.css">
</head>
<body>
    <div class="modalAdd">
        <p>Добавление прошло успешно</p>
    </div>
    <div class="modalDel">
        <p>Удаление прошло успешно</p>
    </div>
    <?
    include 'function.php';
    $link = mysqli_connect('localhost', 'root', '', 'user_info');
    $con = new Connect(
        'user_info', 
        ['first_name', 'last_name', 'email', 'company_name', 'position', 'number', 'number_home', 'number_work'], 
        ['first_name', 'last_name', 'email', 'company_name', 'position', 'number', 'number_home', 'number_work'],
        $_POST["add"],
        $_GET['red'],
        $_POST['del']
    );
    $con->checkAdd($link);
    $product = $con->selectInput($link);
    ?>
    
    <form class="form" action="" method="post">
        <div class="form__block">
            <label class="form__label" for="first_name">Имя</label>
            <input class="form__input" type="text" id="first_name" name="first_name" value="<?= isset($_GET['red']) ? $product['first_name'] : ''; ?>" required><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="last_name">Фамилия</label>
            <input class="form__input" type="text" id="last_name" name="last_name" value="<?= isset($_GET['red']) ? $product['last_name'] : ''; ?>" required><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="email">Email</label>
            <input type="email" class="form__input" type="text" id="email" name="email" value="<?= isset($_GET['red']) ? $product['email'] : ''; ?>" required><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="company_name">Название компании</label>
            <input class="form__input" type="text" id="company_name" name="company_name" value="<?= isset($_GET['red']) ? $product['company_name'] : ''; ?>"><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="position">Адрес проживания</label>
            <input class="form__input" type="text" id="position" name="position" value="<?= isset($_GET['red']) ? $product['position'] : ''; ?>"><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="number">Личный телефон</label>
            <input type="tel" class="form__input" type="text" id="number" name="number" value="<?= isset($_GET['red']) ? $product['number'] : ''; ?>"><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="number_home">Домашний телефон</label>
            <input type="tel" class="form__input" type="text" id="number_home" name="number_home" value="<?= isset($_GET['red']) ? $product['number_home'] : ''; ?>"><br>
        </div>
        <div class="form__block">
            <label class="form__label" for="number_work">Рабочий телефон</label>
            <input type="tel" class="form__input" type="text" id="number_work" name="number_work" value="<?= isset($_GET['red']) ? $product['number_work'] : ''; ?>"><br>
        </div>
        <div class="form__block">
            <input type='hidden' name='add'>
            <input class="form__button" type="submit" name="add">
        </div>
    </form>
    <div class="conclusion">
    <?
    $con->showPage($link, $_GET['page']);
    ?>
    </div>
    <div class="pagination">
    <?
    $con->showPagination($link, $_GET['page']);
    ?>
    </div>
    <script src="./inputmask.min.js"></script>
    <script src="./script.js"></script>
</body>
</html>