<?
/// логика в виде
echo "PROJECT: ".$id;
//var_dump($ProjectJSON);
echo "</br>---</br>";
////Кастыль обработчик
$Res1 = $ProjectJSONdecode['0'];
$Res2 = $Res1['ProjectJSON']; // Получил JSON как он есть
//// И я не понял почему он завёрнут в масив, хотя вызов прямой
$Res2;
$MyArr = json_decode($Res2, true);
$increment = 1;

foreach($MyArr as $MyKey => $MyValue){
     if(is_array($MyValue)){
     	$MyValue = "Вышестоящий уровень разработки для его просмотра, решите текущий уровень разработки";}
	echo "Значение ".$increment." параметра: ".$MyKey." Значение :".$MyValue."</br>__</br>";
	$increment++;
}
// Согласен, можно было поиграть с рекурсией и т.д.
// Но я пока не знаю какое ДЗ следующее
// По этому пока задачу решаю в лоб, позже подправлю