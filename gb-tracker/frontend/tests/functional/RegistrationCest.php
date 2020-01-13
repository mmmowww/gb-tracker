<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class RegistrationCest
{
    protected $formId = 'form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('index.php?r=site%2Fregistration');
    }

       public function TestLoogg(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignupForm[username]'  => 'Imperator',
            'SignupForm[email]'     => 'mail@mail.ru',
            'SignupForm[password]'  => '123456',
        ]
        );
       $I->click('Signup');
        $I->wantTo("Imperator"); 
        $I->wantTo("mail@mail"); 
        $I->wantTo("123456"); 
    }

   
}


/// Функцыональный тест