<?php

namespace app\controllers;

use app\models\search\EmployeeSearch;
use Yii;
use yii\web\Controller;

/**
 * @author Albert Garipov <bert320@gmail.com>
 */
class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $provider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $provider,
            'searchModel' => $searchModel,
        ]);
    }

}