<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab1</title>
    <link rel="stylesheet" href="reset.css">
    <style type="text/css">
        body {
            background-color: blueviolet;
            font-family: monospace;
        }

        table {
            width: 100%;
            margin-top: 2%;
            background: aqua;
            text-align: center;
            font-family: monospace;
            font-size: 14pt;
        }


        img[src] {
            vertical-align: top;
            margin: 10px 0 0 0;
        }

        .Form p {
            margin-bottom: 2px;
        }

        input {
            margin: 0 0 0 1px;
        }

        #answer {
            background: aquamarine;
            width: 15%;
            table-layout: auto;
            margin: 10px 0 10px 43%;
        }

        #answer td {
            border: 2px solid black;
        }

        .Pip:before {
            text-decoration: line-through;
            content: "ПИПу";
        }

        .Header {
            font-family: monospace;
            color: white;
        }

        .Header * {
            margin-top: 5px;
        }

        .Header h1 {
            font-size: 25pt;
            color: black;
        }

        .Header h2 {
            font-size: 18pt;
        }

        .Header h3 {
            font-size: 14pt;
            color: grey;
        }

        .Header h4 {
            font-size: 14pt;
            color: darkgrey;
        }

        .bold {
            font-weight: bold;
        }

        .Yellow:focus-within {
            background: yellow;
        }

        [type="submit"] {
            margin-top: 1%;
        }

        #time {
            margin-top: 1%;
        }
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
            <form method="GET" action="input.php" onsubmit="return valid()">
                <table class="Form">
                    <tr>
                        <td>
                            <p>Значение X:
                                <input type="radio" name="X" value="-2" id="X0">
                                <label for="X0">-2</label>
                                <input type="radio" name="X" value="-1.5" id="X1">
                                <label for="X1">-1.5</label>
                                <input type="radio" name="X" value="-1" id="X2">
                                <label for="X2">-1</label>
                                <input type="radio" name="X" value="-0.5" id="X3">
                                <label for="X3">-0.5</label>
                                <input type="radio" name="X" value="0" id="X4">
                                <label for="X4">0</label>
                                <input type="radio" name="X" value="0.5" id="X5">
                                <label for="X5">0.5</label>
                                <input type="radio" name="X" value="1" id="X6">
                                <label for="X6">1</label>
                                <input type="radio" name="X" value="1.5" id="X7">
                                <label for="X7">1.5</label>
                                <input type="radio" name="X" value="2" id="X8">
                                <label for="X8">2</label>
                            </p>
                        </td>
                    </tr>
                    <tr class="Yellow">
                        <td>
                            <p>
                                <label for="textfieldY">Значение Y:</label>
                                <input type="text" id="textfieldY" autocomplete="off" name="Y">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Значение R:
                                <input type="radio" name="R" value="1" id="R0">
                                <label for="R0">1</label>
                                <input type="radio" name="R" value="2" id="R1">
                                <label for="R1">2</label>
                                <input type="radio" name="R" value="3" id="R2">
                                <label for="R2">3</label>
                                <input type="radio" name="R" value="4" id="R3">
                                <label for="R3">4</label>
                                <input type="radio" name="R" value="5" id="R4">
                                <label for="R4">5</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="submit" value="Отправить">
                            </p>
                            <div id="error"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <?php
    $start = microtime(true);
    if (isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R'])) {
        $Y = $_GET['Y'];
        $Y = substr($Y, 0, 8);
        if (!($Y <= -5 || $Y >= 3)) {
            $X = $_GET['X'];
            $R = $_GET['R'];
            echo "<tr><td><table id=\"answer\"><tr class='bold'><td>X</td><td>Y</td><td>R</td><td>Ответ</td></tr>";
            $Ans = "<tr><td>" . $X . "</td><td>" . $Y . "</td><td>" . $R . "</td><td>";
            if ($X >= 0) {
                if ($Y >= 0) {
                    if ($X <= $R / 2 && $Y <= $R) {
                        $Ans = $Ans . "Точка в зоне";
                    } else {
                        $Ans = $Ans . "Точка  не в зоне";
                    }
                } else {
                    if ($X ^ 2 + $Y ^ 2 <= $R ^ 2) {
                        $Ans = $Ans . "Точка в зоне";
                    } else {
                        $Ans = $Ans . "Точка  не в зоне";
                    }
                }
            } else {
                if ($Y >= 0) {
                    $Ans = $Ans . "Точка  не в зоне";
                } else {
                    if ($Y + $X > -$R / 2) {
                        $Ans = $Ans . "Точка в зоне";
                    } else {
                        $Ans = $Ans . "Точка  не в зоне";
                    }
                }
            }
            $Ans = $Ans . "</tr></table>";
            echo $Ans;
            echo 'Время выполнения скрипта: ' . round((microtime(true) - $start) * pow(10, 6), 3) . ' микросек.';
            echo '</td></tr><tr><td><div id="time">';
            echo date(DATE_RFC850) . '</div></td></tr>';
        }
    }
    ?>
</table>
<script type="text/javascript">
    //document.getElementById("time").innerHTML = "Текущее время: " + new Date(<?php echo date() ?>);
    let er = document.getElementById("error");
    let textField = document.getElementById("textfieldY");
    let Xfield = document.getElementsByName("X");

    let Rfield = document.getElementsByName("R");

    function valid() {
        let validX = false;
        let validR = false;
        Xfield.forEach(function (button) {
            if (button.checked) validX = true;
        });
        Rfield.forEach(function (button) {
            if (button.checked) validR = true;
        });
        let value = textField.value.substring(0, 8);
        if (value === "" || isNaN(value) || value <= -5 || value >= 3) {
            er.innerHTML = "Значение Y должно быть в диапазоне (-5;3)";
            textField.style.borderColor = "red";
            return false;
        }
        if (!validX) {
            er.innerHTML = "Укажите значение X";
            return false;
        }
        if (!validR) {
            er.innerHTML = "Укажите значение R";
            return false;
        }
        return true;
    }
</script>
</body>
</html>