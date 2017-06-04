<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Message;
use frontend\models\SignupForm;
use frontend\models\LoginForm;
use yii\web\Controller;

class AppController extends Controller
{
    public function actionIndex()
    {

        $models = Message::find()->with('user')->orderBy('date DESC')->all();

        $model = new Message();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->user_id =Yii::$app->user->identity->id;

            if ($model->validate()) {

                $model->save();
                return $this->refresh();

            } else if ($model->hasErrors('text')) {

                Yii::$app->session->setFlash('error', $model->getFirstError('text'));
                return $this->refresh();

            }
        }
        else {
            return $this->render('index', [
                'model' => $model,
                'models' => $models
            ]);
        }

    }

    public function actionLogin()
    {

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        elseif ($model->load(Yii::$app->request->post()) && !$model->login()) {
            Yii::$app->session->setFlash('error', 'Вход в систему с указанными данными невозможен');
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                return $this->render('reg_success');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);

    }

}