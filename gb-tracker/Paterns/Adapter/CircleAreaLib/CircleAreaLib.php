<?
//require_once 'D:\ProgramsMy\OSPanel\domains\patern\interface\interface.php';
//namespace patern\CircleAreaLib;
class CircleAreaLib 
{
public function getCircleArea(int $diagonal)
{
$area = (M_PI * $diagonal**2)/4;

   return $area;
}
};