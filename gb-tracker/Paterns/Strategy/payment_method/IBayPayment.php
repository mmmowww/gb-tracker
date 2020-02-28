<?
include_once 'Cash\Cash.php';
include_once 'WithoutCash\WithoutCash.php';

interface IBayPayments{
	public function Payments(Cash $var);
	
}
