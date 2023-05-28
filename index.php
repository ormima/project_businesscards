<?php

    $con = mysqli_connect("localhost", "root", "", "firma");

    $sql1 = "SELECT `pracownicy`.`id`, `pracownicy`.`imie`, `pracownicy`.`nazwisko`, `pracownicy`.`adres`, `pracownicy`.`miasto` FROM `pracownicy` WHERE `pracownicy`.`id` = '1'";
    $query1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT `pracownicy`.`imie`, `pracownicy`.`nazwisko` FROM `pracownicy` WHERE `pracownicy`.`czyRODO` = '0'";
    $query2 = mysqli_query($con, $sql2);

    $res1 = "";
    $res2 = "";

    if($con){
        while($row1 = mysqli_fetch_row($query1)){
            $res1 = '<img src="'.$row1[0].'.jpg" alt="pracownik"/>
                        <h2>'.$row1[1].' '.$row1[2].'</h2>
                        <h4>Adres:</h4>
                        <p>'.$row1[3].', '.$row1[4].'</p>';
        }
        while($row2 = mysqli_fetch_row($query2)){
            $res2 .= "<li>".$row2[0]." ".$row2[1]."</li>";
        }
    } else{
        echo "Something went wrong!!!";
    }

    mysqli_close($con);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizytówki</title>
    <link rel="stylesheet" href="./styl4.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Wizytówki pracowników</h1>
            <form action="./index.php" method="post">
                <input type="number" min="1" max="9" value="1" name="var">
                <input type="submit" value="WYŚWIETL" class="btn" name="btn">
            </form>
        </header>
        <main>
            <!-- PHP res1 -->
            <?=

                $res1;

            ?>
        </main>
        <div class="box">
            <small class="left">
                <img src="./obraz.jpg" alt="pracownicy firmy">
            </small>
            <small class="middle">
                <p>Autorem wizytownika jest: <i>000</i></p>
                <a href="https://agencjareklamowa543.pl/" target="_blank">Zobacz nasze realizacje</a>
            </small>
            <small class="right">
                <p>Osoboy proszone o podpisanie dokumentu RODO:</p>
                <!-- PHP res2 -->
                <ol>
                    <?=
                    
                        $res2;

                    ?>
                </ol>
            </small>
        </div>
    </div>
</body>
</html>