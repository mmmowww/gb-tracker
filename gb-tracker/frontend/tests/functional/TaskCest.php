<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class TaskCest
{
    public function TASKAbout(FunctionalTester $I)
    {
        $I->amOnRoute('site/task');
        $I->see('This Task');
    }
}
/// 39.56 unit тесты
/// https://www.youtube.com/watch?v=Z2jKjjba7eQ&feature=youtu.be