<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/tab.css">
    <title>Кураторы</title>
</head>
<body>
<?php
$db = mysqli_connect("localhost", "root", "root", "yourTest");

session_start();
if (isset($_SESSION['user'])) {
//    echo("Вы вошли как " . $_SESSION['user']['nick']);
    $login = $_SESSION['user']['nick'];

    /*header("Location: /mentor/mentor.html");*/
}

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// SQL-запрос для получения данных
$sql = "SELECT login, password FROM mentor";
$result = $db->query($sql);

// Определяем колонку для сортировки и порядок
$sort_column = 'login'; // например, сортируем по имени

// SQL-запрос с фильтрацией и сортировкой
$sql = "SELECT * FROM mentor WHERE rol = 0 AND ychet = $login ORDER BY $sort_column ";

// Выполнение запроса
$result = $db->query($sql);

// Проверка и вывод результатов

if ($result->num_rows > 0) {
    // Вывод данных в таблицу
    echo '<table>';
    echo '<thead><tr><th>Логин</th><th>Пароль</th></tr></thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['login'] . '</td>';
        echo '<td>' . $row['password'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
} else {
    echo "0 результатов";
}

$db->close();
?>


</body>
</html>