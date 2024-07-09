<?php

namespace frontend\controllers;

use common\models\Cliente;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ClienteController extends ActiveController
{
    public $modelClass = Cliente::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class
        ];

        return $behaviors;
    }
}