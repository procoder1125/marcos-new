<?php
namespace frontend\controllers;

use common\models\Kurslar;
use yii\web\Controller;

class KursController extends Controller
{
    public function actionKurs($id){
        
        $kurs = Kurslar::findOne($id);
        return $this->render('kurs',[
            'kurs' => $kurs,
            'id' => $id,
            
        ]);
    }
}

?>