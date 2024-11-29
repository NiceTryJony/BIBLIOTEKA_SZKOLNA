<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <title>Rejestracja ukończona</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://images.inc.com/uploaded_files/image/1920x1080/getty_695858178_370363.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
            color: #333;
        }

        .container {
            /* margin-top: 14000px; */
            background-color: rgba(255, 200, 100, 0.5); /* Прозрачный белый фон */
            padding: 20px;
            border-radius: 8px;
            width: 70%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8); /* Тень для карточек */
        }

        .container h1 {
            text-align: center;
            color: rgb(100, 100, 0);
        }

        ol {
            list-style-type: none; /* Убираем стандартные маркеры списка */
            padding: 0;
            margin: 0;
        }

        ol li {
            background-color:antiquewhite;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 1s ease; /* переход для плавной анимации */
            transform: scale(1);
        }

        ol li:hover {
            background-color: rgba(203, 155, 60, 0.6);
            transition: background-color 1.5s ease;
            transition: all 1s ease; /* переход для плавной анимации */
            transform: scale(1.025);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 1.8); /* Тень для карточек */
        }

        .book-info {
            line-height: 1.6;
            padding: 5px;
        }

        .book-info span {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            margin: 5px;
            color: black;
            font-size: 16px; /* начальный размер текста */
            transition: all 1s ease; /* переход для плавной анимации */
            transform: scale(0.9); /* начальный масштаб */
        }

        .book-info span:hover {
            font-size: 22px; /* увеличенный размер текста при наведении */
            transform: scale(1.2); /* увеличение масштаба */
        }

        #zal_btn{
            width: 174px;
            height: 20px;
            background-color: antiquewhite;
            color:crimson;
            transition: all 0.5s ease;
        }
        #zal_btn:hover{
            width: 190px;
            height: 24px;
            transform: scale(1.1);
        }
        .downloadBtn{
            width: 174px;
            height: 20px;
            background-color: antiquewhite;
            color:rgb(200, 100, 0);
            transition: all 0.5s ease;
        }
        .downloadBtn:hover{
            width: 190px;
            height: 24px;
            transform: scale(1.0);
        }
        #zar_btn{
            width: 174px;
            height: 20px;
            background-color: antiquewhite;
            color:crimson;
            transition: all 0.5s ease;
        }
        #zar_btn:hover{
            width: 190px;
            height: 24px;
            transform: scale(1.1);
        }
        .container2{
            background-color: rgba(255, 200, 100, 0.5); /* Прозрачный белый фон */
            padding: 20px;
            margin:18px;
            border-radius: 8px;
            width: 300px;
            height: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8); /* Тень для карточек */
            position: fixed;    
            transform: translate(-50%,-50%);
            left:10%;
            top:33%;
        }
        img{
            width: 300px;
            height: 400px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 1.8); /* Тень для карточек */
            border-radius: 8px;
        }
        .zal_btn2{
            width: 190px;
            height: 20px;
            background-color: antiquewhite;
            color:crimson;
            transition: all 0.5s ease;
        }
        .zal_btn2:hover{
            width: 200px;
            height: 24px;
            transform: scale(1.1);
        }
        .readBtn{
            width: 174px;
            height: 20px;
            background-color: antiquewhite;
            color:rgb(200, 100, 0);
            transition: all 0.5s ease;
        }
        .readBtn:hover{
            width: 190px;
            height: 24px;
            transform: scale(1.0);
        }
        .inputs{
            background-color: antiquewhite;
            border: none;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 85%;
        }
    </style>
</head>
<div class="container2">
<h1>BIBLIOTEKA</h1><br>
    <nev>
        <ul>
            <li><a href='logowanie.html'><button class='zal_btn2'>POWRÓĆ DO LOGOWANIA</button></a></li><br>
            <li><a href='rejestracja.html'><button class='zal_btn2'>WRÓĆ DO REJESTRACJI</button></a></li><br>
        </ul>
        <img src='images.jpg'>
     </nev>
</div>
<div class="container">
<h1>Dostępne książki</h1>
    <ol>
        <?php
            $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka2");

            if (isset($_POST['zal'])) {
                $email = $_POST['email'];
                $haslo = $_POST['haslo'];
             
                $zapytanie = mysqli_query($polaczenie, "SELECT * FROM klienci WHERE email='$email' AND haslo='$haslo'");
                
                if (mysqli_num_rows($zapytanie) == 0) {
                    echo "<p style='color: red; text-align: center; font-size:30px;'>Nie istnieje danego użytkownika !!!<br><br>
                            <button id='zal_btn'><a href='logowanie.html'>ZALOGUJ</a></button></p><br>";
                    echo "<p style='color: rgb(0, 0, 0); text-align: center;'>Jeżęli nie masz konta to zapraszam do rejestracji!<br><br>
                            <button id='zar_btn'><a href='rejestracja.html'>ZAREJESTRUJ</a></button></p>";
                } else {
                    $zapytanieKS = mysqli_query($polaczenie, "SELECT * FROM ksiazki");
                    while ($wiersz = mysqli_fetch_array($zapytanieKS)) {
                        $fileContent = <<<EOD
                            =====================================
                                        DZIĘKUJEMY!
                            =====================================
                            Dziękujemy za pobranie książki!
                            Poniżej znajdują się jej szczegóły:

                            ------------ 
                            📖 Tytuł: {$wiersz[1]}
                            ------------ 
                            ✍️ Autor: {$wiersz[2]}
                            ------------ 
                            📜 Krótki opis:

                            {$wiersz[6]}

                            =====================================
                                    Życzymy miłej lektury!
                            =====================================
                            EOD;

                        $fileName = "{$wiersz[1]}.txt"; // Уникальное имя файла
                        
                        echo "<li class='book-info'>
                                <p><span>Nazwa:</span> {$wiersz[1]}</p>
                                <p><span>Autor:</span> {$wiersz[2]}</p>
                                <p><span>Wydawnictwo:</span> {$wiersz[3]}</p>
                                <p><span>Dostępna ilość:</span> {$wiersz[4]}</p>
                                <p><span>Stan książki:</span> {$wiersz[5]}</p>
                                <p><span><button class='downloadBtn' data-filename='{$fileName}' data-content='{$fileContent}'>Zainstaluj książkę</button></span></p>
                            </li>";
                    }
                }
            }
             
            ?>


            <script>
            // Обработчик клика для всех кнопок скачивания
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.downloadBtn').forEach(button => {
                    button.addEventListener('click', function () {
                        const fileName = this.dataset.filename;
                        const fileContent = this.dataset.content;
             
                        const blob = new Blob([fileContent], { type: 'text/plain' });
                        const url = URL.createObjectURL(blob);
                        
                        const link = document.createElement('a');
                        link.href = url;
            link.download = fileName;
            link.click();
                        
                        URL.revokeObjectURL(url);
                    });
                });
            });
            </script>

    </ol>
</div>
</body>
</html>
<?php 
    mysqli_close($polaczenie);
?>