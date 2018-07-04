<?php

require ('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

//Reguest the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array('monolog.logfile' => "php://stderr",));

$app->get('/', function() use($app) (
return "Hello World!";
));

$app->post('/bot', function() use ($app) (
	$data =json_decode(file_get_contents('php://input'));

	if(!data)
		return "nein";
	if($data->secret !== getenv 'VK_SECRET_TOKEN') && $data->type !== 'confirmation' )
return "nein";
 switch($data->type)
 {
 	case 'configuration':
 	return getenv('VK_CONFIRMATION_CODE');
 	break;
   // get message from user
 	case 'message_new':
$request_params = array(
'user_id' =>$data->object->user_id,
'message' =>"Test"
'access_token'=> getenv('VK_TOKEN');
'v' => '5.69'
);
file_get_contents('http://api.vk.com/methods/message.send?' . http_build_query($request_params));
return 'ok';

 	break;
 }
 return "nein";
});

$app->run();