<?
    
    class Connect {

        public $dbName;
        public $argUpd; // свойство $argUpd - содержит названия переменных $_POST, которые нужно будет обновить в БД, при отправке запроса $requestRed
        
        public $argAdd; // свойство $argAdd - содержит названия переменных $_POST, которые нужно будет добавить в БД, при отправке запроса $requestAdd
        public $requestAdd;
        public $requestRed;
        public $requestDel;
        public static $scriptJsAdd = '
        <script type="text/javascript">
        function hideText(c) {
            document.querySelector(c).classList.remove("active");
        } 
        function showText(c) {
            document.querySelector(c).classList.add("active");
            setTimeout(hideText, 2000, c);  
        } 
        showText(".modalAdd");
        </script>
        ';
        public static $scriptJsDel = '
        <script type="text/javascript">
        function hideText(c) {
            document.querySelector(c).classList.remove("active");
        } 
        function showText(c) {
            document.querySelector(c).classList.add("active");
            setTimeout(hideText, 2000, c);  
        } 
        showText(".modalDel");
        </script>
        ';

        public function __construct($dbName, $argUpd, $argAdd, $requestAdd, $requestRed, $requestDel) {
            $this->dbName = $dbName;
            $this->argUpd = $argUpd;
            $this->argAdd = $argAdd;
            $this->requestAdd = $requestAdd;
            $this->requestRed = $requestRed;
            $this->requestDel = $requestDel;
        }

        public function redirect() {
            $redirect = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; //Формируем ссылку
            $redirect = preg_replace('/\?.*/', '', $redirect); //Очищаем ссылку от мусора GET данных
            header("Location:" . $redirect); //Редирект на чистую страницу
        }
        public function checkAdd($link) {
            if (isset($this->requestAdd)) {    //Проверяем отправлен ли запрос на добавление
                if (isset($this->requestRed)) { //Проверяем во время запроса на добавление, есть ли  запрос на редактирование, если есть выполняем следующую логику
                    foreach ($this->argUpd as $arg) {
                        $sql = mysqli_query($link, "UPDATE $this->dbName SET `$arg` = '{$_POST[$arg]}' WHERE `id`={$this->requestRed}"); //Запрос на обновление записей в БД по id 
                    }
                $this->redirect();
                } else { //Иначе, если это чистый запрос на добавление выполняем следующую логику
                    $arrayName = implode(', ', $this->argAdd); //формируем названия аргументов таблицы, которые нужно добавить в БД
                    $result = []; 
                    $k = 0;
                    foreach ($this->argAdd as $char){
                        $result[$k] = $_POST[$char];  //Здесь динамически формируем массив значений VALUE, зависящий от кол-ва значений переданных в $argAdd
                        $k++;
                    };
                    $arrayValue = implode("'" . ", " . "'", $result); //формируем значения аргументов которые добавятся в БД
                    $sql = mysqli_query($link, "INSERT $this->dbName ($arrayName) VALUES ('$arrayValue')"); //Запрос на добавление записей в БД
                }
                
            if ($sql) {
                echo self::$scriptJsAdd;   //если запрос существует, то выводим наш JS-скрипт "Модалки на добавление" 
            }
            
        }
        if (isset($this->requestDel)) { //Проверяем отправлен ли запрос на удаление
            $sql = mysqli_query($link, "DELETE FROM $this->dbName WHERE `id` = '{$this->requestDel}'"); //Запрос на удаление по id
            if ($sql) {
                echo self::$scriptJsDel; //если запрос существует, то выводим наш JS-скрипт "Модалки на удаление" 
            }
        }
       }
        public function selectInput($link) {
            if (isset($this->requestRed)) { //Проверяем во время запроса на добавление, есть ли запрос на редактирование
                $arrayName = implode(', ', $this->argAdd);
                $sql = mysqli_query($link, "SELECT `id`, $arrayName FROM $this->dbName WHERE `ID`={$this->requestRed}"); 
                return mysqli_fetch_array($sql); //Возвращаем значения всех полей
            }
       } 

        public function showPage($link, $requestPage, $limit = 10) { //вывод только 10-и элементов 
            $page = isset($requestPage) ? $requestPage : 1;
            // $limit = 10;
            $offset = $limit * ($page - 1);
            $arrayName = implode(', ', $this->argAdd);
            $query = mysqli_query($link, "SELECT `id`, $arrayName FROM $this->dbName ORDER BY id DESC LIMIT $limit OFFSET $offset"); //запрос с лимитом и обратной сортировкой
            while ($result = mysqli_fetch_array($query)) {
                echo "
                <div class='conclusion__block'>
                    <div class='conclusion__text'>
                        <p>Имя: <span>{$result['first_name']}</span></p>
                        <p>Фамилия: <span>{$result['last_name']}</span></p>
                        <p>Email: <span>{$result['email']}</span></p>
                        <p>Название компании: <span>{$result['company_name']}</span></p>
                        <p>Адрес: <span>{$result['position']}</span></p>
                        <p>Личный телефон: <span>{$result['number']}</span></p>
                        <p>Домашний телефон: <span>{$result['number_home']}</span></p>
                    <p>Рабочий телефон: <span>{$result['number_work']}</span></p>
                    </div>
                    <form action='' method='post'>
                        <input type='hidden' name='del' value='{$result['id']}'>
                        <input class='del' type='submit' value='Удалить '>
                    </form>
                    <a class='red' href='index.php?red={$result['id']}'>Редактировать</a>
                </div>
                "; 
            }
       }

        public function showPagination($link, $requestPage, $limit = 10, $radius = 10) {
            $res = mysqli_query($link, "SELECT COUNT(*) FROM $this->dbName");
            $row = mysqli_fetch_row($res);
            $total = $row[0]; // всего записей
            $str_pag = ceil($total / $limit);
            $radius = 10; //кол-во отображаемых ссылок пагинации
            if ($requestPage < $radius) {
                for ($i = 1; $i <= $str_pag; $i++){  
                    if ($i <= ($radius)) {
                        echo "<a class='pagination__child' href='index.php?page=".$i."'> ".$i." </a>";
                    } else {
                        echo ". . .";
                        break;
                    }
                }
            } else {
                echo "<a class='pagination__child' href='index.php?page="."1"."'> "."1"." </a>";
                echo ". . .";
                for ($i = $radius+1; $i <= $str_pag; $i++){  
                    if ($i <= ($radius*2)) {
                        echo "<a class='pagination__child' href='index.php?page=".$i."'> ".$i." </a>";
                    } else {
                        echo ". . .";
                        break;
                    }
                }
            }
        }
       
    };
?>