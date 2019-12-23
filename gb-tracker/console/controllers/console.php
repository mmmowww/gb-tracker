<?
namespace console\controllers;

use Yii;

class console extends \yii\console\Controller /// Not working....
{                                             ///Why?
    public function actionGreatings()
    {
        print "Hello, world";
    }
}



