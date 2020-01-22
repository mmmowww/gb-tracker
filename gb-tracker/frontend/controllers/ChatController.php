<?php
namespace frontend\controllers;
use frontend\models\Chatlog;
use yii\web\Controller;
class ChatController extends Controller{
	public function actionChat(){
		return $this->render('chat');
	}
}