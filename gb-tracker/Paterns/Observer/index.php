<?
////Наблюдатель
include_once 'InterFaceVacancy/InterFaceVacancy.php'; 

class SearchVacancy implements InterFaceVacancy{
public $vacancyFaound = array();
public $vacancySubscribe = array();
public function SortVacancy($var){
$this->vacancySubscribe = new Vacancy();
foreach ($this->vacancySubscribe->ArrayVacancy as $Vacancy => $Work) {
	if($var == $Vacancy){
		$this->vacancyFaound = array_merge($this->vacancyFaound,$Vacancy);
	}
	var_dump($this->vacancyFaound);

}
}
}
