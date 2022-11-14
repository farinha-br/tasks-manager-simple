﻿<?php

$db = new PDO('sqlite:data/tasks.db');

$g = (object) $_GET;

function menu() {
	
	echo <<<MENU
		<html>
		<head lang="pt-br">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		</head>
		<body>

		<br class="hgt" />
		<span class="titlemain">Tasks Manager</span><br/><br class="hgt" />
		<span class="menu">
			<a href="index.php">Tasks</a> &nbsp; &nbsp; &nbsp; 
			<a href="strings.php?insert">Add</a> &nbsp; &nbsp; &nbsp; 
			<a href="db.php?export">Export</a>
		</span> 

		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		  
		﻿<form style="display: inline;" method="post" action="index.php">
		<input style="font-size: 16px;" id="str" name="str" type="text" size="30">
		<input name="do_search" type="submit" value="Search">	
		</form>

		<br/>
		<br/>
	MENU;
	
}	

if (isset($g->insert)) {	

	menu();
	echo <<<ADD
	<form method="post" action="db.php">
		<table>
		<tr><td>Number: </td><td><input type="text" name="f_number" size="25" value=""></td></tr>
		<tr><td>Subject: </td><td><input type="text" name="f_alias" size="75" value=""></td></tr>
		<tr><td><input type="submit" name="insert_id" value="Inserir"></td><td></td></tr>
		</table>
	</form>

	<br/>

	</body>
	</html>
	ADD;
	
}

?>
