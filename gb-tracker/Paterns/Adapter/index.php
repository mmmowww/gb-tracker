<?

require_once 'CircleAreaLib\CircleAreaLib.php';
require_once 'SquareAreaLib\SquareAreaLib.php';
require_once 'interface\Adapter_interface.php';

class Adapter implements Adapter_interface {
	public function squareArea(int $var){
		$Square = new SquareAreaLib();
		return $Square->getSquareArea($var);
	}
	public function circleArea(int $var){
		$Circle = new CircleAreaLib();
		return $Circle->getCircleArea($var);
	}
}
