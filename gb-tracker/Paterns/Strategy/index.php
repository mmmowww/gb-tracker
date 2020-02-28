<? //Patern Strategy //Not debaging
include_once "payment_method/IBayPayment.php";
 class CassPayments implements IBayPayments{
	public $Payments;
	public function Payments(Cash $cash,$price){
		$this->Payments = new $cash;
		$this->Payments->Payment($price);
		
	}
};
$operation = new CassPayments();
$operation::Payments(new Cash(),345);