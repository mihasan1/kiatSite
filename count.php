<?

/*
. ..: w o s c r i p t s t e a m :.. .

Название скрипта : IVASH PHP COUNTER
Версия : 1.0
Автор : ivash
E-mail : ivash@womail.net
Web : http://www.woscripts.com
Форум : http://forums.woscripts.com

*/

$file = "count.txt"; // Файл счетчика
$dir = "image/"; // Директория где находится графика для счетчика
$format = ".gif"; // Расширения файлов для показа графического счетчика

$vis = file($file); // Прочитать содержимое файла в массив
$current_visitors =$vis[0]; // Извлечб первый (и единственный) элемент
++$current_visitors; // Увелечить счетчик обращений
$fh = fopen($file, "w"); // Открыть файл $file и установить указатель на позицию
// в начало файла
@fwrite($fh, $current_visitors); // Записать новое значение счетчика
fclose($fh); // Закрыть файл
switch($type) { // Проверяем команду выбранную пользователем
case "text": // Команда "text"
echo $current_visitors; // Выводим значение счетчика в текстовом режиме
break; // Завершаем работу
case "gfx": // Команда "gfx"
$i = 0; // Обнуляем переменую $i
$cntn = strlen($current_visitors); // Получаем размер строки (количество цыфр)
while($i < $cntn) { // Подсчитываем количество цифр
$tmpnum = substr($current_visitors, $i, 1); // Преобразуем
echo("<img src=\"$dir/$tmpnum$format\">"); // Выводим значение счетчика в графическом формате
$i++; // Продолжем цикл
}
break; // Завершаем работу
case "hide": // Команда "hide"
break; // Не выводим значений и завершаем работу
default: // Если ошибка то выводим сообщение
echo("count.php <b>Ошибка</b> : Команда для вывода счетчика не выбрана");
break; // Завершим работу
}
?>