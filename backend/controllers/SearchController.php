<?php 
namespace backend\controllers;
use common\models\Kurslar;
use yii\web\Controller;
use yii;

class SearchController extends Controller
{
    public function actionSearch(){

        
        if(\Yii::$app->request->isAjax){
            $inputVal = 'aefwefwef';
         //return 'Запрос принят!';
        }
       
        return $this->render('search', [
            'inputVal' => $inputVal,
        ]);


       
    }
}

?>