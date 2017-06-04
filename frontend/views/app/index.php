<?php
use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row-fluid">
    <div class="span2"></div>
    <div class="span8">

        <? if (!Yii::$app->user->isGuest):?>

        <?php
        $form = ActiveForm::begin([
            'id' => 'message-form',
            'options' => [
                    'class' => 'form-horizontal',
                    'style' => 'margin-bottom: 50px;'
            ],
            'enableClientValidation' => false,
        ]) ?>
        <?= Alert::widget([
                'options' => [
                   // 'class' => 'alert-error'
                ],
                'closeButton' => false
            ]); ?>

        <?= $form->field($model, 'text', [
                'template' => '{input}',
                'options' => ['class' => 'control-group'],
            ])->textarea([
                'placeholder' => 'Ваше сообщение...',
                'data-cip-id' => 'inputText',
                'style' => 'width: 100%;height: 50px;',
                'type' => 'password',
                'class' => false
            ]);?>

        <div class="control-group">
            <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end()   ?>

        <?endif;?>

        <?foreach ($models as $model):?>
        <div class="well">
            <h5><?=$model->user->username?></h5>

           <?=$model->text?>

        </div>
        <?endforeach;?>

    </div>
</div>
