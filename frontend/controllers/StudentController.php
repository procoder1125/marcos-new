<?php
namespace frontend\controllers;

use common\models\Kurslar;
use common\models\Student;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

class StudentController extends Controller
{
   
    public function actionSignup()
    {   
        $kurs_id = isset($_GET['kurs_id']) ? $_GET['kurs_id'] : null;
        $kurs = Kurslar::findOne($kurs_id); 


        $model = new Student();
        if($model->load(Yii::$app->request->post()) ){
            $model->user_id = Yii::$app->user->id;
            $model->kurs_id = $kurs_id;
            if($model->validate()){
             
               $model->save();
                Yii::$app->session->setFlash('success', "Siz kursga ro'yhatdan o'tdingiz.");
            }
    
        }

       
        return $this->render('signup',[
            'model' => $model, 
            'kurs' => $kurs, 
            'kurs_id' =>$kurs_id,  
        ]);
    }

    public function actionApi(){

        return $this->render('api');
    }
}
?>