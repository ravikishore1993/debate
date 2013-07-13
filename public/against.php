<?php

$db = new PDO('mysql:host=localhost;dbname=debate;charset=utf8', 'test', 'test');

$result = $db->query("select * from againstside where session='".$_GET['session']."' and id > '".$_GET['id']."' ");
echo json_encode($result->fetchAll());