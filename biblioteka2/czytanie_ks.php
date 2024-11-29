<!DOCTYPE html>
<html>
<head>
    <title>Czytanie Książki</title>
    <meta charset="utf-8">
</head>
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
        #zal_btn2{
            width: 190px;
            height: 20px;
            background-color: antiquewhite;
            color:crimson;
            transition: all 0.5s ease;
        }
        #zal_btn2:hover{
            width: 200px;
            height: 24px;
            transform: scale(1.1);
        }
</style>
<body>
    <div class="container2">
        <h1>BIBLIOTEKA</h1><br>
            <nev>
                <ul>
                    <li><a href='logowanie.html'><button id='zal_btn2'>POWRÓĆ DO LOGOWANIA</button></a></li><br>
                    <li><a href='rejestracja.html'><button id='zal_btn2'>WRÓĆ DO REJESTRACJI</button></a></li><br>
                </ul>
                <img src='images.jpg'>
             </nev>
    </div>
</body>
<?php
            $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka2");
                if(isset($_POST['czytanieKS'])){
                    $nazwa=$_POST['nazwa']
                    $zapytanie=mysqli_query($polaczenie, "SELECT * FROM ksiazki WHERE nazwa = '$nazwa'");
                    while ($wiersz = mysqli_fetch_array($zapytanie)) {
                        echo "<li class='book-info'>
                                <p><span>Krótki opis:</span> {$wiersz[6]}</p>
                            </li>";
                    }
                }
            ?>
</html>