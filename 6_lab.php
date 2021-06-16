<?php
header('Content-Type: text/html; charset=utf-8');
//Данные для подключения к серверу MySQL
$servername = "localhost";
$username = "root";
$password = "admin";
// Вводим название базы данных
$dbname = "register";

$link = mysql_connect('localhost', 'root', 'admin');
if (!$link) {
die('Not connected : ' . mysql_error());
}
//Созданиие подключения
$conn = mysqli_connect($servername, $username, $password,$dbname);
$db_selected = mysql_select_db('register', $link);
if (!$db_selected) {
die ('Can\'t use register : ' . mysql_error());
}
//Проверка кодировки utf8
mysql_query('SET NAMES utf8') or die ("не удалось установить
кодировку");
//Проверка соединения с БД
if (!$conn) {
die("Подключение не выполнено: " . mysqli_connect_error());
}
//Строка с текстом sql запроса для таблицы
$sql = "INSERT INTO register_data (`email`, `name`, `surname`,
`date_of_birth`, `phone`)
VALUES ('".$_POST['email']."','".$_POST['name']."',
'".$_POST['surname']."','".$_POST['date_of_birth']."',
'".$_POST['phone']."')" ;
//mysqli_query($conn, $sql); // - выполнение sql запроса
//Проверка статуса выполнения sql запроса
if (mysqli_query($conn, $sql)) {
echo "Запись успешно добавлена</br>";
echo "<a href='main_page.html'>На главную</a>";
} else {
echo "Ошибка добавления записи: " . $sql . "<br>";
mysqli_error($conn);
}
//Закрытие соединения
mysqli_close($conn);
?> 


<?php

echo "Поле добавлено: ".$_POST['email']."<br>";
echo "Поле добавлено: ".$_POST['name']."<br>";
echo "Поле добавлено: ".$_POST['surname']."<br>";
echo "Поле добавлено: ".$_POST['date_of_birth']."<br>";
echo "Поле добавлено: ".$_POST['phone']."<br>";

?>
