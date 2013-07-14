<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(
        array(
        	 'templates.path' => './',
            'cookies.httponly' => true          
        )
    );

$app->get('/',function () use($app){
    $app->render('index.html');
});

$app->get('/room/:name', function ($name) use ($app) {
		
	require 'config.php';    

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
    	$db->query("insert into rooms (name,session) values ('".$name."','".$session."') " );
    }

    $token = $apiObj->generate_token($session);

    $app->render('room.php',array('session' => $session , 'token' => $token ));
});

$app->post('/submit', function () use ($app) {
	$app->render('submit.php');
});

$app->get('/for', function () use ($app) {
	$app->render('for.php');
});


$app->get('/against', function () use ($app) {
	$app->render('against.php');
});
$app->run();

?>