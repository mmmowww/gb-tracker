<?php
namespace console\controllers;
use yii\console\Controller;
//////
/*
use Rathet\Server\IoServerer;
use Rathet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
*/
/////
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
class SocketControllers extends Controller{

public function actionStart($port = 8080){
	$server = IoServer::factory(
		new HttpServer(
			new WsServer(
				new SocketServer()
			)
		), 
		$port
	);
	echo "Server наверное Online, Но это не точно! ".PHP_EOL;
	$server->run();
	echo "Server остановлен, как ракета перед запуском ".PHP_EOL;
}


}
