<?php
// Патерн Абстрактная фабрика
namespace RealizationBD;
include_once 'autoload.php';


class WorkBd {
protected $NameBD;
protected $ComandBD;
protected $OperationBD; // String comand
protected $Resault; //Array

public function __constructor($nameBD,$comandBD,$operationBD){
$this->NameBD=$nameBD;
$this->ComandBD=$comandBD;
$this->OperationBD=$operationBD;
}
protected function BDWORK($namespace){
	 $work implements $namespace;
	 $work->DBConnection();
	 $work->DBRecrord();
	 $work->DBQueryBuiler();
}
};

function Work(){
	$workBd = new WorkBd('','pass,login,ip','select * from');
	$namespace = __namespace__.$workBd->Namebd;
	$workBd->BDWORK($namespace);
};
Work();