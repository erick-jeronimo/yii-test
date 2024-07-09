<?php

namespace frontend\controllers;

use common\models\Produto;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ProdutoController extends ActiveController
{
    public $modelClass = Produto::class;

    public function actionClienteProdutos($cliente_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Produto::find()->where(['cliente_id' => $cliente_id]),
        ]);

        return $dataProvider;
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class
        ];

        return $behaviors;
    }
}