<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;


class CheckSignonCest{
	 public function _before(AcceptanceTester $I)
    {
       
    }
    public function tryToTest(AcceptanceTester $I){

    }
    public function checkSignon(){
    	$I->amOnPage(Url::toRoute('/site/index/signup'));
        $I->see('My Application');

        $I->seeLink('Signon');
        $I->click('Signon');
        $I->wantTo("NULL"); 

        $I->see('NULL');
    }
}
?>