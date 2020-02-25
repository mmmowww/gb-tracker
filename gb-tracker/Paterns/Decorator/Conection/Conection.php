<?
include_once "ConsoleChat\ConsoleChat.php";
include_once "SMS\Sms.php";
include_once "VebChat\VebChat.php";

abstract class ConectionDecorator implements ConsoleChat,SMS,VebChat{
public $Message;
public $NameConection;
public function __construct(ConsoleChat $class){
$this->NameConection = $class;
}
public function SendMessage($Message){
	$this->Message = $Message;
	return $this->Message;
}
}