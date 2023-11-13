<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!" />
    <meta name="keywords" content="calendar, events, reminders, javascript, html, css, open source coding" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/calendariooficial.css" />
    <title>Calendário</title>
</head>

<?php
include 'conexao.php';

session_start();

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Função para obter tarefas do banco de dados com base na data
function getTasks($date)
{
    global $conn;
    $sql = "SELECT * FROM tarefas WHERE data_tarefa = '$date'";
    $result = $conn->query($sql);
    $tasks = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row['descricao_tarefa'];
        }
    }
    return $tasks;
}

if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
} else {
    $month = date("n");
    $year = date("Y");
}

$first_day = mktime(0, 0, 0, $month, 1, $year);
$last_day = mktime(0, 0, 0, $month + 1, 0, $year);
$month_name = date("F", $first_day);
$num_days = date("t", $first_day);
$day_of_week = date("w", $first_day);
$prev_month = date("n", strtotime("-1 month", $first_day));
$prev_year = date("Y", strtotime("-1 month", $first_day));
$next_month = date("n", strtotime("+1 month", $first_day));
$next_year = date("Y", strtotime("+1 month", $first_day));

echo "<div class='calendar'>";
echo "<div class='month'>$month_name $year</div>";
echo "<table>";
echo "<tr><th class='day'>Sun</th><th class='day'>Mon</th><th class='day'>Tue</th><th class='day'>Wed</th><th class='day'>Thu</th><th class='day'>Fri</th><th class='day'>Sat</th></tr>";
echo "<tr>";

// Preencha os dias vazios no início do mês
for ($i = 0; $i < $day_of_week; $i++) {
    echo "<td></td>";
}

// Preencha os dias do mês
for ($day = 1; $day <= $num_days; $day++) {
    $date = "$year-$month-$day";
    $tasks = getTasks($date);
    echo "<td>";
    echo "<div class='date'>$day</div>";
    echo "<ul>";
    foreach ($tasks as $task) {
        echo "<p>$task</p>";
    }
    echo "</ul>";
    echo "</td>";
    $day_of_week++;
    if ($day_of_week == 7) {
        echo "</tr>";
        if ($day < $num_days) {
            echo "<tr>";
        }
        $day_of_week = 0;
    }
}

// Preencha os dias vazios no final do mês
while ($day_of_week > 0 && $day_of_week < 7) {
    echo "<td></td>";
    $day_of_week++;
}

echo "</tr>";
echo "</table>";
echo "</div>";

$conn->close();
?>