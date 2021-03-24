<?php
namespace frontend\controllers;
use common\models\UserProfile;
use yii\web\Controller;

class UserProfileController extends Controller{
    
    public function actionAccaunt(){
        return $this->render('accaunt');
    }

    public function actionCreateAccaunt(){

        return $this->render('create-accaunt');
    }
}

?>