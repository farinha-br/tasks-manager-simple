<?php

include "strings.php";
menu();

if (isset($_POST['do_search'])) {
	$str = $_POST['str'];
	$sql = "SELECT * FROM tasks WHERE number LIKE '%$str%' OR alias LIKE '%$str%' OR name LIKE '%$str%' OR status LIKE '%$str%' order by ord, number";
} else {
	$sql = "select * from tasks order by ord, number";
}	

$rdb = $db->prepare($sql);
$rdb->execute();
$result = $rdb->fetchAll(PDO::FETCH_ASSOC);

$k = 0;
echo "<table>" . PHP_EOL;
foreach ($result as $row) {
	$color = $row['color'];
	$tr = $row['row'];
	$class = '';
	if ($tr) $class = ' class="trx"';
	$k++;
	echo "<tr" . $class . ">";
	echo "<td width=150><a href=update.php?id=" . $row['id'] . ">" . $row['number'] . "</td>";
	echo "<td width=200>" . $row['alias'] . "</td>";
	echo "<td width=250><a style='color: " . $color . ";' href='update.php?id=" . $row['id'] . "'>". $row['status'] . "</a></td>";
	echo "<td width=200>" . substr($row['name'], 0, 30) . "</td>";
	echo "</tr>" . PHP_EOL;   
	if ($k>4) {
		$k = 0;
		echo "<tr><td style='background-color: #FFEBE1; font-size: 8px; ' colspan=8>&nbsp;</td></tr>" . PHP_EOL;
	}
}
?>
</table>
<br/>
</body>
</html>