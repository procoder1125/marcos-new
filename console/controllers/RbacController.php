<?php

namespace console\controllers;

use yii\helpers\Console;
use yii\console\Controller;
use Yii;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        

        // $unvCreate = $auth->createPermission("talabaCreate");
        // $unvCreate->description = "talaba qoshish";
        // $auth->add($unvCreate);

        // $fakCreate = $auth->createPermission("fakCreate");
        // $fakCreate->description = "fakultet qoshish";
        // $auth->add($fakCreate);

        $groupCreate = $auth->createPermission("groupCreate");
        $groupCreate->description = "guruh qoshish dostupi";
        ;
        $auth->add($groupCreate);

        $talabaCreate = $auth->createPermission("talabaCreate");
        $talabaCreate->description = "talaba qoshish dostupi";
        $auth->add($talabaCreate);

        $talabaDelete = $auth->createPermission("talabaDelete");
        $talabaDelete->description = "talaba ochirish";
        ;
        $auth->add($talabaDelete);

        $theCreator = $auth->createRole("theCreator");
        $theCreator->description = "bosh admin";
        $auth->add($theCreator);

        $admin = $auth->createRole("admin");
        $admin->description = "admin";
        $auth->add($admin);

        $talaba = $auth->createRole("talaba");
        $talaba->description = "talaba";
        $auth->add($talaba);

        // $accountant = $auth->createRole("accountant");
        // $accountant->description = "Buhgalter yordamchisi";
        // $auth->add($accountant);

        $auth->addChild($theCreator, $admin);
        $auth->addChild($admin, $talaba);

        $auth->addChild($admin, $talabaCreate);
        $auth->addChild($admin, $talabaDelete);
        $auth->addChild($admin, $groupCreate);

        // $auth->addChild($theCreator, $unvCreate);
        // $auth->addChild($theCreator, $fakCreate);
    }
}   
