<?php

require 'config.php';    
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(
        array(
        	 'templates.path' => './',
            'cookies.httponly' => true          
        )
    );

$app->get('/room/:name', function ($name) use ($app) {
    require_once 'SDK/API_Config.php';
    require_once 'SDK/OpenTokSDK.php';
    $secret = $CONFIG['secret'] ;
    $key = $CONFIG['key'];
    $apiObj = new OpenTokSDK($key, $secret);

        


$db = new PDO('mysql:host=localhost;dbname=debate;charset=utf8', 'test', 'test');

    $room = $db->query("select * from rooms where name='".$name."' or code='".$name."' ");
    if($room->rowCount() > 0){
    	
    	while ($row = $room->fetch()) {
    $session = $row['session'];
}
    }
    else{
    	$sessionc = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
        $session = $sessionc->getSessionId();
        print_r($sessionc);
    	$db->query("insert into rooms (name,session) values ('".$name."','".$session."') " );
    }

    $token = $apiObj->generate_token($session);

    $app->render('room.php',array('session' => $session , 'token' => $token ));
});

$app->run();

?>