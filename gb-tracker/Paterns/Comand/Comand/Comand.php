<?
include_once "comandInterface/interfaceComand.php";

class Comand implements interfaceComand{
	public $LOG = array();
	public $LastComand;
	public $Comand;
    protected function giveCommand($var){
    	$this->Comand=$var;
    	return $this->Comand;
    };
	protected function logCommand($var){
		array_push($this->LOG,$var);
		echo "Команда залагирована";
		return $this;
	};
	protected function previousСommand(){
		if($this->LOG != 0){
		$this->LastComand=array_pop($this->LOG);
		echo "Последняя команда".$this->LastComand;
	}
};
}