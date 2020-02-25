<?
//require_once 'D:\ProgramsMy\OSPanel\domains\patern\interface\interface.php';

//namespace patern\SquareAreaLib;
class SquareAreaLib 
{
public function getSquareArea(int $diagonal)
{
$area = ($diagonal**2)/2;

   return $area;
}
}