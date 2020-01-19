<?php
namespace frontend\controllers;

use yii\web\Controller;
class ChatController extends Controller{
	public function actionChat(){
		return $this->render('chat');
	}
}