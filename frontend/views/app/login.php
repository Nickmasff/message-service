<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\Alert;
$this->title = 'Авторизация';
?>

<div class="row-fluid">
    <div class="span4"></div>
    <div class="span3">

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => [
                'class' => 'form-horizontal',
            ],
            'enableClientValidation' => false
        ]); ?>

        <?= Alert::widget([
                'closeButton' => false
        ]); ?>

            <div class="control-group">
                <b><?= Html::encode($this->title) ?></b>
            </div>


        <?= $form->field($model, 'username', [
            'template' => '{input}',
            'options' => ['class' => 'control-group'],
            'inputOptions' => ['data-cip-id' => 'inputLogin', 'autocomplete' => 'off', 'placeholder' => "Логин", 'class' => false],
        ])->textInput(); ?>


        <?= $form->field($model, 'password', [
            'template' => '{input}',
            'options' => ['class' => 'control-group'],
            'inputOptions' => ['data-cip-id' => 'inputLogin', 'autocomplete' => 'off', 'placeholder' => "Пароль", 'class' => false],
        ])->passwordInput(); ?>

        <?
        $field = $form->field($model, 'rememberMe', [
            'options' => ['class' => 'control-group']
        ]);

        echo $field->begin();
        echo Html::activeCheckbox($model, 'rememberMe', [
            'labelOptions' => ['class' => 'checkbox'],
            'label' => 'Запомнить меня'
        ]);
        echo Html::submitButton('Вход', ['class' => 'btn btn-primary']);
        echo $field->end();
        ?>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
