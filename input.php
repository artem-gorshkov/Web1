<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab1</title>
    <link rel="stylesheet" href="reset.css">
    <style type="text/css">
        body {
            background: #45688E;
            font-family: monospace;
            color: black;
        }

        table {
            width: 100%;
            margin-top: 2%;
            background: url("img/xv.png") white;
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
            background: #5E81A8;
            width: 60%;
            table-layout: auto;
            margin: 10px 0 10px 20%;
        }

        .word-break {
            word-break: break-all;
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
            color: #45688E;
        }

        .Header * {
            margin-top: 5px;
        }

        .Header h1 {
            font-size: 25pt;
            color: darkblue;
        }

        .Header h2 {
            font-size: 18pt;
        }

        .Header h3 {
            font-size: 14pt;
            color: #5E81A8;
        }

        .Header h4 {
            font-size: 14pt;
            color: cornflowerblue;
        }

        .bold {
            font-weight: bold;
        }

        .Blue:focus-within {
            background: #45688E;
        }

        [type="submit"] {
            margin-top: 1%;
        }

        #error {
            color = red;
        }
    </style>
</head>
<body>
<table id="mainTable">
    <tr>
        <td>
            <div class="Header bold">
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
                    <tr class="Blue">
                        <td>
                            <p>
                                <label for="textfieldY">Значение Y ∈ (-5;3):</label>
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
                <input type="hidden" name="uniqid" value="<?= uniqid() ?>">
            </form>
        </td>
    </tr>
    <?php
    $start = microtime(true);
    if (isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R'])) {
        $Y = $_GET['Y'];
        $Y = str_ireplace(",", ".", $Y);
        $Y_Num = substr($_GET['Y'], 0, 10);
        $X = $_GET['X'];
        $R = $_GET['R'];
        $validX = false;
        $validR = false;

        for ($i = -2; $i <= 2; $i += 0.5) {
            if (strcasecmp(strval($i), $X) == 0) $validX = true;
        }
        for ($i = 1; $i <= 5; $i += 1) {
            if (strcasecmp(strval($i), $R) == 0) $validR = true;
        }
        if (!is_numeric($Y)) {
            echo '<tr id="servErr"><td>Y не число!</td></tr>';
        } elseif (!is_numeric($R)) {
            echo '<tr id="servErr"><td>R не число!</td></tr>';
        } elseif (!is_numeric($X)) {
            echo '<tr id="servErr"><td>X не число!</td></tr>';
        } elseif ($Y_Num <= -5 || $Y_Num >= 3) {
            echo '<tr id="servErr"><td>Y не в диапазоне</td></tr>';
        } elseif ($validX == false) {
            echo '<tr id="servErr"><td>Недопустимое значение X</td></tr>';
        } elseif ($validR == false) {
            echo '<tr id="servErr"><td>Недопустимое значение R</td></tr>';
        }
    } ?>
    <tr>
        <td>
            <table id="answer">
                <tr class='bold'>
                    <td>X</td>
                    <td>Y</td>
                    <td>R</td>
                    <td>Ответ</td>
                    <td>Время</td>
                    <td>Время работы скрипта (в мс)</td>
                </tr>
                <?php
                $history = isset($_SESSION['history']) && is_array($_SESSION['history']) ? $_SESSION['history'] : [];
                if ((isset($_GET['X']) && isset($_GET['Y']) && isset($_GET['R'])) && !($Y_Num <= -5 || $Y_Num >= 3)) {
                    $Ans = "<tr><td>" . $X . "</td><td class='word-break'>" . $Y . "</td><td>" . $R . "</td><td>";
                    if ($X >= 0) {
                        if ($Y_Num >= 0) {
                            if ($X <= $R / 2 && $Y_Num <= $R) {
                                $Ans = $Ans . "Точка в зоне";
                                $AnsW = "Точка в зоне";
                            } else {
                                $Ans = $Ans . "Точка  не в зоне";
                                $AnsW = "Точка  не в зоне";
                            }
                        } else {
                            if ($X ^ 2 + $Y_Num ^ 2 <= $R ^ 2) {
                                $Ans = $Ans . "Точка в зоне";
                                $AnsW = "Точка в зоне";
                            } else {
                                $Ans = $Ans . "Точка  не в зоне";
                                $AnsW = "Точка  не в зоне";
                            }
                        }
                    } else {
                        if ($Y >= 0) {
                            $Ans = $Ans . "Точка  не в зоне";
                            $AnsW = "Точка  не в зоне";
                        } else {
                            if ($Y_Num + $X > -$R / 2) {
                                $Ans = $Ans . "Точка в зоне";
                                $AnsW = "Точка в зоне";
                            } else {
                                $Ans = $Ans . "Точка  не в зоне";
                                $AnsW = "Точка  не в зоне";
                            }
                        }
                    }
                    setlocale(LC_ALL, 'ru_RU.UTF-8');
                    $time = strftime(' %d %b %Y %H:%M:%S', time());
                    $script = round((microtime(true) - $start) * 10 ** 3, 3);
                    $script = str_ireplace(",", ".", $script);
                    $uniqid = $_GET['uniqid'];
                    if ($history[0]["uniqid"] !== $uniqid) {
                        array_unshift($history, [
                            'X' => $X,
                            'Y' => $Y,
                            'R' => $R,
                            'Ans' => $AnsW,
                            'time' => $time,
                            'script' => $script,
                            'uniqid' => $uniqid
                        ]);
                    }
                    $_SESSION['history'] = $history;

                }
                foreach ($history as $result) {
                    ?>
                    <tr>
                        <td><?= $result['X'] ?></td>
                        <td class="word-break"><?= $result['Y'] ?></td>
                        <td><?= $result['R'] ?></td>
                        <td><?= $result["Ans"] ?></td>
                        <td><?= $result["time"] ?></td>
                        <td class="script_time"><?= $result["script"] ?></td>
                    </tr>
                    <?php
                }
                ?></table>
        </td>
    </tr>
    <tr>
        <td id="stand_deviation"></td>
    </tr>
</table>
<script type="text/javascript">
    let er = document.getElementById("error");
    let textField = document.getElementById("textfieldY");
    let Xfield = document.getElementsByName("X");
    let Rfield = document.getElementsByName("R");
    let script_time = [];
    Array.prototype.forEach.call(document.getElementsByClassName("script_time"), el => {
        script_time.push(el.textContent);
    });
    if (script_time.length !== 0) {
        document.getElementById("stand_deviation").innerHTML = "Время стандартного отклонения работы скрипта: " + calc_stand_deviation(script_time) + " мс.";
    }

    function calc_stand_deviation(arr) {
        let sum = 0;
        Array.prototype.forEach.call(arr, (el) => {
            sum = sum + parseFloat(el);
        });
        let mid_arifm = sum / arr.length;
        let sum_of_sq = 0;
        Array.prototype.forEach.call(arr, el => {
            sum_of_sq += Math.pow((parseFloat(el) - mid_arifm), 2);
        });
        return Math.round(Math.sqrt(sum_of_sq / arr.length) * Math.pow(10,6)) / Math.pow(10,6);
    }

    function valid() {
        let validX = false;
        let validR = false;
        Array.prototype.forEach.call(Xfield, function (button) {
            if (button.checked) validX = true;
        });
        Array.prototype.forEach.call(Rfield, function (button) {
            if (button.checked) validR = true;
        });
        let value = textField.value.substring(0, 10);
        value = value.replace(",", ".");
        if (value === "" || isNaN(value) || value <= -5 || value >= 3) {
            if (document.getElementById("servErr") != null) document.getElementById("servErr").innerHTML = "";
            er.innerHTML = "Значение Y должно быть в диапазоне (-5;3)";
            textField.style.borderColor = "red";
            return false;
        }
        if (!validX) {
            if (document.getElementById("servErr") != null) document.getElementById("servErr").innerHTML = "";
            er.innerText = "Укажите значение X";
            return false;
        }
        if (!validR) {
            if (document.getElementById("servErr") != null) document.getElementById("servErr").innerHTML = "";
            er.innerHTML = "Укажите значение R";
            return false;
        }
        return true;
    }
</script>
</body>
</html>