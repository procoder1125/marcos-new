<?php

namespace backend\controllers;

use Yii;
use common\models\Guruhlar;
use common\models\GuruhlarSearch;
use common\models\GuruhStudent;
use common\models\Kurslar;
use common\models\Student;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * GuruhlarController implements the CRUD actions for Guruhlar model.
 */
class GuruhlarController extends BackendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        //'controllers' => ['user', 'site','lang','guruhlar'],
                        'actions' => ['index', 'view','create','group', 'update', 'delete','ww'],
                        'allow' => true,
                        'roles' => ['@'],    
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Guruhlar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuruhlarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $kurslar = Kurslar::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'kurslar' => $kurslar,
        ]);
    }

   

   

    /**
     * Displays a single Guruhlar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guruhlar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Guruhlar();
        $id = $_GET['id'];

        if ($model->load(Yii::$app->request->post()) ) {
            $model->kurs_id = $id;
            if($model->validate()){
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Updates an existing Guruhlar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Guruhlar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Guruhlar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guruhlar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guruhlar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionGroup(){
        $id = $_GET['id'];
        $guruhlar = Guruhlar::find()->where(['kurs_id' => $id])->all();
        return $this->render('group',[
            'guruhlar' => $guruhlar,
            'id' =>$id,
        ]);
    }


    public function actionWw(){
        $kurs_id = $_GET['kurs_id'];
        $id = $_GET['id'];
        $sudents = Student::find()->where(['kurs_id' => $kurs_id])->all();
        $crstudents = GuruhStudent::find()->where(['guruh_id'=>$id])->all();
        return $this->render('ww',
    [
        'students' => $sudents,
        'crstudents' => $crstudents,
        'id'=>$id,
    ]);
    }


    public function actionCreateStudent(){
        if(Yii::$app->request->isAjax){
            $id = $_POST['data'];
            $guruh_id = $_POST['guruh_id'];
            $model = new GuruhStudent();
            $result = Student::findOne(['id' => $id]);

            $model->name = $result->fullname;
            $model->guruh_id = $guruh_id;
            $model->telefon = $result->phone;

            $model->save();

           echo "<td>$model->id</td>
           <td><a href='/student/viewid=$model->id'>$model->name </a></td>
           <td><a href='/student/viewid=$model->id'>$model->telefon</a></td>
           <td><span class='label label-success'>Approved</span></td>";
        }
       
    }
}
