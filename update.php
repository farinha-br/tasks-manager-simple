<?php 

include "strings.php";
menu();

$xid = $_GET['id'];

$rdb = $db->prepare("select * from tasks where id=$xid");
$rdb->execute();
$row = $rdb->fetch(PDO::FETCH_ASSOC);

$color = $row['color'];
$rowcolor = $row['row'];
?>

<form method="post" action="db.php">
<input type="hidden" id="f_id" name="f_id" value="<?php echo $row['id']; ?>">
    <table>
		<tr><td>Number: </td><td><input type="text" id="f_number" name="f_number" size="20" value="<?php echo $row['number']; ?>">&nbsp;
		<tr><td>Name: </td><td><input type="text" name="f_name" size="75" value="<?php echo $row['name']; ?>"></td></tr>
		<tr><td>Subject: </td><td><input type="text" name="f_alias" size="50" value="<?php echo $row['alias']; ?>"></td></tr>
		<tr><td>Status: </td><td><input type="text" name="f_status" size="50" value="<?php echo $row['status']; ?>">
		
		<input name="f_color" <?php if ($color=='black') echo 'checked'; ?> value="black" type="radio">███ &nbsp;  &nbsp; 
		<input name="f_color" <?php if ($color=='blue') echo 'checked'; ?> value="blue" type="radio"><span style="color: blue;">███</span> &nbsp;  &nbsp; 
		<input name="f_color" <?php if ($color=='green') echo 'checked'; ?> value="green" type="radio"><span style="color: green;">███</span> &nbsp;  &nbsp; 
		<input name="f_color" <?php if ($color=='red') echo 'checked'; ?> value="red" type="radio"><span style="color: red;">███</span> &nbsp;  &nbsp;</td></tr>
		
		<tr><td>Order: </td><td><input type="text" name="f_ord" size="2" value="<?php echo $row['ord']; ?>">
		 &nbsp;  &nbsp; Row highlight: &nbsp;
		<input name="f_row" <?php if ($rowcolor=='0') echo 'checked'; ?> value="0" type="radio">off 
		<input name="f_row" <?php if ($rowcolor=='1') echo 'checked'; ?> value="1" type="radio">on
		</td></tr>
		<tr><td><input type="submit" name="update_id" value="Update"></td><td><input type="button" value="Delete" onclick="ifdel(<?php echo $row['id']; ?>);"></td></tr>
    </table>
</form>
<div id="my"></div>
<br/>
<form method=post id="dodel" name="dodel" action="db.php">
<input type=hidden name="del_id">
</form>
<br/>

<script>
function ifdel(id) {
	let x = confirm("Confirm delete");
	dodel.del_id.value = id;
	if (x) dodel.submit();
}
</script>

</body>
</html>

