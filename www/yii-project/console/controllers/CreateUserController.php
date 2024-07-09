<?php

namespace console\controllers;

use common\models\User;
use yii\console\Controller;

class CreateUserController extends Controller
{
    public function actionCreate($name = 'User', $login = 'user@mail.com', $pass = '12345678')
    {
        $user = new User();
        $user->username = $name;
        $user->email = $login;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($pass);
        $user->generateAuthKey();
        $user->save();

        echo "Usuário criado!\n";
        echo "## Credenciais: " . "\n";
        echo "Login: " . $user->email . "\n";
        echo "Senha: " . $pass . "\n";
    }
}