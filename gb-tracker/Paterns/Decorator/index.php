<?
include_once "Conection\Conection.php";

class Mailer extends ConectionDecorator {
	public $Conection;
	public function __constructor ($var){
		$this->Conection = $var;
	}
	public function Send():string{

		echo $this->Conection."/".$this->Conection."php";
		$send = new Mailer(new ConsoleChat);
		return 'Send_mail';
	}


}