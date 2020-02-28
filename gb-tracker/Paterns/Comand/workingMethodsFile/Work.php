<?
include_once "StorageMethods/storage.php";
class WorkLibrari implements storage {
	protected $NameFile;
	protected $FILE;
	protected $ReadOption;
	protected $LOG  = array();
	protected $EditComand;
	protected function methoodOpenFile($var){
		$this->NameFile = $var;
		$this->FILE = fopen($this->NameFile, $this->ReadOption);
		echo "Установлена настройка";
		return $this;
	};
	protected function methodReadFile($var){
		$this->ReadOption = $var;
		echo "Установлена форма чтения";
		return $this;
	};
	protected function methodEditFile($var){
		/// Дореализовать внесение изменения в фаил
		$this->EditComand = $var;
		return $this;
	}
	protected function methodCloseFile(){
		fclose($this->NameFile);
		echo "фаил закрыт";
		return $this;
	};

}
