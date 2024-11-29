<!DOCTYPE html>
<html lang="pl_PL">
    <head>
        <title>Rejestracja ukończona</title>
        <meta charset="utf-8">
    </head>
<body>
<style>
    body{
        margin-left: 35%;
        margin-right: 30%;
        margin-top:10%;
        background-image: url(https://images.inc.com/uploaded_files/image/1920x1080/getty_695858178_370363.jpg);
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .formularz{
        width:450px;
        height:auto;
        background-color:rgba(199, 198, 152, 0.7);
        text-align: center;
        border-radius: 5%;
        font-size: large;
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    button{
        margin-left: 10px;
        width: 148px;
        height: 18px;
        background-color: antiquewhite;
        color:crimson
    }
    button:hover{
        width: 152px;
        height: 22px;
        transition: all 0.5s ease;
        transform: scale(1.1);
    }
    #pw_do_REJ{
        margin-left: 10px;
        width: 196px;
        height: 18px;
        background-color: antiquewhite;
        color:crimson
    }
    #pw_do_REJ:hover{
        margin-left: 10px;
        width: 206px;
        height: 18px;
        background-color: antiquewhite;
        color:crimson
    }
</style>
<?php
    $polaczenie = mysqli_connect("localhost", "root", "", "biblioteka2");

    if(isset($_POST['zar'])) {
        $email = $_POST['email'];
        $haslo = $_POST['haslo'];
        $adres_zam = $_POST['adres_zam'];
        $miasto = $_POST['miasto'];
        $numer_tel = $_POST['numer_tel'];

        // Проверка на наличие пробела в номере телефона
        if (strpos($numer_tel, ' ') === false) {
            echo " <section class='formularz'>";
            echo "<strong>Błąd: Numer telefonu musi zawierać spację.</strong><br><br>
                  <button id='pw_do_REJ'><b><i><a href='ck_rejestracja.php'>POWRÓT DO REJESTRACJI</a></i></b></button>";
            echo " </section>";
        } else {
            // Проверка на существование клиента с таким email и haslo
            $sprawdz_klienta = "SELECT * FROM klienci WHERE email = '$email' AND haslo = '$haslo'";
            $result = mysqli_query($polaczenie, $sprawdz_klienta);

            if (mysqli_num_rows($result) > 0) {
                // Если такой клиент уже существует, выводим сообщение об ошибке
                echo "<section class='formularz'> ";
                echo "<strong>Użytkownik z tym adresem email już <i>istnieje.</i></strong><br><br>
                      <button><b><i><a href='logowanie.html'>ZALOGUJ</a></i></b></button>";
                echo "</section> ";
            } else {
                // Если клиента с таким email и haslo нет, добавляем его в базу данных
                $tworzenie_danych = "INSERT INTO klienci (email, haslo, adres_zam, miasto, numer_tel) VALUES ('$email', '$haslo', '$adres_zam', '$miasto', '$numer_tel')";
                if (mysqli_query($polaczenie, $tworzenie_danych)) {
                    echo "<section class='formularz'>";
                    echo "<strong>Dane zostały <i>dodane.</i></strong> <br><b>Zaloguj się do systemu</b> <br><br>
                          <button><b><i><a href='logowanie.html'>ZALOGUJ</a></i></b></button>";
                    echo "</section>";
                } else {
                    echo "<section class='formularz'>";
                    echo "<strong>Błąd w dodawaniu danych. Spróbój ponownie</strong><br><br>
                          <button><b><i><a href='ck_rejestracja.php'>PONOWNA REJESTRACJA</a></i></b></button>";
                    echo "</section>";
                }
            }
        }
    }

    mysqli_close($polaczenie);
?>
</body>
</html>