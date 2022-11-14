<?php

if (!file_exists("tasks.db")) {

	$dbh = new PDO('sqlite:tasks.db') or die("cannot open the database");

	$dbh->beginTransaction();

	$sth = $dbh->exec('CREATE TABLE IF NOT EXISTS "tasks" ("id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, "number"  TEXT, "name"  TEXT, "alias"  TEXT, "status"  TEXT, "color" TEXT, "ord"  INTEGER, "row"  INTEGER, UNIQUE ("id" ASC) );');

	$sth = $dbh->exec("INSERT INTO tasks VALUES(1,'10.210/2021','supply','pay supplyers','payment','green',1,1);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(2,'10.217/2020','real state','apartment','rent','green',1,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(3,'10.224/2021','tv show','watch','daily','green',3,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(4,'20.231/2019','doorway','put glass','call','green',2,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(5,'20.238/2020','sales','house sales','payment','black',5,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(6,'20.245/2021','spreadsheet','expenses','fill','black',2,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(7,'20.252/2020','sales','house sales','payment','black',5,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(8,'10.259/2020','groceries','pack and send','demand','blue',3,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(11,'10.280/2020','restaurant','call friends','reserve','blue',3,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(12,'10.287/2019','office','clean office','buy tools','blue',2,1);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(13,'10.294/2020','tax','pay tax','paid','black',2,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(23,'20.350/2021','party','shop food and drink','go shopping','blue',2,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(26,'10.371/2019','store','clean store','pending','red',2,0);");
	$sth = $dbh->exec("INSERT INTO tasks VALUES(99,'10.308/2019','coffe','buy coffee','supermarket','black',1,0);");

	$dbh->commit();
	
}	


?>
