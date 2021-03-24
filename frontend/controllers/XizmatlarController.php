<?php
namespace frontend\controllers;

use common\models\Xizmatlar;
use yii\helpers\Url;
use yii\web\Controller;

class XizmatlarController extends Controller{

    public function actionIndex(){

        return $this->render('index');
    }

    public function actionView($id){
        $model = Xizmatlar::findOne($id);
        return $this->render('view',[
            'model' => $model,
            'id' => $id,
        ]);
    }
}

?>