<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab1</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="Style.css">
    <style type="text/css">
    </style>
</head>
<body>
<table id="mainTable">
    <tr>
        <td>
            <div class="Header">
                <h1>Лабораторная работа №1 по <span class="Pip"> Веб-программированию</span></h1>
                <h2>Вариант №211006</h2>
                <h3>Выполнил: Горшков Артем Владимирович</h3>
                <h4>Группа: P3211</h4>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <img src="img/image_1.png">
        </td>
    </tr>

    <tr>
        <td>
         <?php
              $X = $_GET['x[]'];
              $Y = $_GET['Y'];
              $R = $_GET['R'];
              echo 'Входит в область';
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <p>
            <div id="time"></div>
            </p>
        </td>
    </tr>
</table>
<script type="text/javascript">
    let timeField = document.getElementById("time");
    updateTime();
    setInterval(updateTime, 1000);

    function updateTime() {
        let now = new Date();
        timeField.innerHTML = "Текущее время: " + now.toString();
    }
</script>
</body>
</html>