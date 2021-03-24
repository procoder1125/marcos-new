<?php

namespace backend\controllers;

use Yii;
use common\models\Messages;
use common\models\Send;
use common\models\User;
use PDO;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class MessagesController extends BackendController
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => ['login', 'error'],
    //                     'allow' => true,
    //                 ],
    //                 [
    //                     //'controllers' => ['user', 'site','lang','guruhlar'],
    //                     'actions' => ['index', 'view','create', 'update', 'delete'],
    //                     'allow' => true,
    //                     'roles' => ['@'],    
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }


    public function actionIndex()
    {
        $messages = Messages::find()->where([])->orderBy(['id' => SORT_DESC])->all();
        $count =  Messages::find()->where([])->orderBy(['id' => SORT_DESC])->count();
        return $this->render('index', [
            'messages' => $messages,
            'count' => $count,
        ]);
    }

    public function actionReadMessage($id)
    {
        $message = Messages::findOne($id);
        $resend = new Messages;
        return $this->render('read-message', [
            'message' => $message,
            'resend' => $resend,
        ]);
    }

    public function actionCompose()
    {
        $message = new Messages();
        if ($message->load(\Yii::$app->request->post())) {
            if ($message->validate()) {
                $message->from = User::findOne(['id' => 1])->email;
                $message->name = 'admin';
                $message->created_at = date("Y-m-d H:i");
                $message->save();
                
                Yii::$app->session->setFlash('success', 'Xabar yuborildi !!!');
                return $this->refresh();

            }
        }
        return $this->render('compose', [
            'message' => $message,
        ]);
    }

    public function actionSend()
    {
        $messages = Messages::find()->where(['user_id' => 0])->orderBy(['id' => SORT_DESC])->all();
        return $this->render('send', [
            'messages' => $messages,
        ]);
    }

    public function actionDelete($id)
    {
        Messages::findOne($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteAll()
    {
       echo "fefaef";
        $connect = new PDO('mysql:host=localhost; dbname=marcos', 'root', '');
        if (isset($_POST['checkbox_value'])) {
            for ($count = 0; $count < count($_POST['checkbox_value']); $count++) {
                $query = "delete from messages where id = '".$_POST['checkbox_value'][$count] ."'" ;
                $statement = $connect->prepare($query);
                $statement->execute();
            }
        }
    }
}
