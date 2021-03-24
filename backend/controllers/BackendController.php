<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\User;
use Yii;

/**
 * BackendController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for 
 * your controllers and their actions.
 */
class BackendController extends Controller
{ 
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */

   

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [ 
                        'actions' => ['login', 'error',],
                        'allow' => true,
                    ],
                    [
                        'controllers' => ['site','guruhlar','kurslar','kurs-rejasi','messages','student','user','xizmatlar'],
                        'actions' => ['index', 'view','create', 'update', 'delete',],
                        'allow' => true,
                        'roles' => ['theCreator'],    
                    ],
                    [
                        'controllers' => ['messages'],
                        'actions' => ['index', 'view','create', 'update', 'delete', 'send'],
                        'allow' => true,
                        //'roles' => ['theCreator'],    
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
} // BackendController