<?
include_once 'Page.php'; 
class Home implements Page {
	public $URL;
	public $Page;
	public $JS;
	public function Render($var){
		$this->URL = $var;
		echo $this->Page;
		return $this;
	} 
}