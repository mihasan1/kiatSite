<?

/*
. ..: w o s c r i p t s t e a m :.. .

�������� ������� : IVASH PHP COUNTER
������ : 1.0
����� : ivash
E-mail : ivash@womail.net
Web : http://www.woscripts.com
����� : http://forums.woscripts.com

*/

$file = "count.txt"; // ���� ��������
$dir = "image/"; // ���������� ��� ��������� ������� ��� ��������
$format = ".gif"; // ���������� ������ ��� ������ ������������ ��������

$vis = file($file); // ��������� ���������� ����� � ������
$current_visitors =$vis[0]; // ������� ������ (� ������������) �������
++$current_visitors; // ��������� ������� ���������
$fh = fopen($file, "w"); // ������� ���� $file � ���������� ��������� �� �������
// � ������ �����
@fwrite($fh, $current_visitors); // �������� ����� �������� ��������
fclose($fh); // ������� ����
switch($type) { // ��������� ������� ��������� �������������
case "text": // ������� "text"
echo $current_visitors; // ������� �������� �������� � ��������� ������
break; // ��������� ������
case "gfx": // ������� "gfx"
$i = 0; // �������� ��������� $i
$cntn = strlen($current_visitors); // �������� ������ ������ (���������� ����)
while($i < $cntn) { // ������������ ���������� ����
$tmpnum = substr($current_visitors, $i, 1); // �����������
echo("<img src=\"$dir/$tmpnum$format\">"); // ������� �������� �������� � ����������� �������
$i++; // ��������� ����
}
break; // ��������� ������
case "hide": // ������� "hide"
break; // �� ������� �������� � ��������� ������
default: // ���� ������ �� ������� ���������
echo("count.php <b>������</b> : ������� ��� ������ �������� �� �������");
break; // �������� ������
}
?>