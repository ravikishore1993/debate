<?php
$db = new PDO('mysql:host=localhost;dbname=debate;charset=utf8', 'test', 'test');
if($_POST['side'] == 'for')
$db->query("insert into forside (message,session,time) values ('".$_POST['message']."' , '".$_POST['session']."' , '".$_POST['time']."') ");
else
$db->query("insert into againstside (message,session,time) values ('".$_POST['message']."' , '".$_POST['session']."' , '".$_POST['time']."') ");
?>