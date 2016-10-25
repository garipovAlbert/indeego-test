<?php

use app\models\Account;
use yii\BaseYii;
use yii\web\Application;
use yii\web\Request;
use yii\web\Response;
use yii\web\User;


/**
 * 
 */
class Yii extends BaseYii
{

    /**
     * @var MyApp the application instance
     */
    public static $app;

}

/**
 * @property Account $identity
 */
class MyUser extends User
{
    
}

/**
 * @property Response $response
 * @property Request $request
 */
class MyApp extends Application
{
    
}