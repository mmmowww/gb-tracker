<?
include_once 'D:\ProgramsMy\OSPanel\domains\paternsBild\Builder.php';
class EngineBuilder implements Builder{
	public $ChoiseBd;
	public $Dbconnection;
	public $DBRecrord;
public ChoiseBd($val){
	return __DIR__."BD/".$val."/"."General".$val.".php";
};
public DBConnection($LoginPassBD){
	$this->Dbconnection= $LoginPassBD;
return $LoginPass;
};
public DBRecrord($BDcomand){
	$this->DBRecrord = $BDcomand;
	return $Bdcomand;
}
public DBQueryBuiler(){
$this->$ChoiseBd;
$this->$Dbconnection;
$this->$DBRecrord;
 

};
public DBbuild();
}