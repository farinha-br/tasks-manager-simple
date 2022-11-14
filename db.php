﻿<?php

include "strings.php";

$p = (object) $_POST;
$g = (object) $_GET;

if (isset($p->update_id)) {
	
	$rdb = $db->prepare("UPDATE tasks SET alias=?, number=?, name=?, status=?, color=?, ord=?, row=? WHERE id=?;");
	$rdb->execute([$p->f_alias, $p->f_number, $p->f_name, $p->f_status, $p->f_color, $p->f_ord, $p->f_row, $p->f_id]);
	
}

if (isset($p->insert_id)) {
	
	$rdb = $db->prepare("INSERT INTO tasks (number, alias, color, ord, row) VALUES (?, ?, ?, ?, ?);");
	$rdb->execute([$p->f_number, $p->f_alias, 'black', '1', 0]);
	
}

if (isset($g->export)) {	

	$rdb = $db->prepare("select * from tasks");
	$rdb->execute();
	$r = $rdb->fetchAll(PDO::FETCH_ASSOC);

	$txt = json_encode($r, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	file_put_contents('data/export.json', $txt);

}

if (isset($p->del_id)) {
	
	$rdb = $db->prepare("DELETE FROM tasks WHERE id=?");
	$rdb->execute([$p->del_id]);

}

header('Location: index.php');

?>
