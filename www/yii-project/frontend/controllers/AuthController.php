<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\web\Response;

class AuthController extends \yii\rest\Controller
{
    public function actionToken()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;

        $email = $request->post('email');
        $senha = $request->post('senha');

        $user = User::findByEmail($email);

        if ($user && $user->validatePassword($senha)) {
            $user->generateAccessToken();
            $user->save();

            $response->format = Response::FORMAT_JSON;

            return [
                'access_token' => $user->access_token,
            ];
        }

        $response->statusCode = 401;
        return [
            'error' => 'Credenciais inválidas.',
        ];
    }
}
