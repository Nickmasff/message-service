<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>

<div class="row-fluid">
    <div class="span4"></div>
    <div class="span8">
        <?php $form = ActiveForm::begin([
            'id' => 'form-signup',
            'errorCssClass' => 'error',
            'options' => [
                'class' => 'form-horizontal',
            ],
        ]); ?>
        <div class="control-group">
            <b><?= Html::encode($this->title) ?></b>
        </div>

            <?= $form->field($model, 'username', [
                    'template' => '{input}{error}',
                    'options' => ['class' => 'control-group'],
                    'inputOptions' => ['data-cip-id' => 'inputLogin', 'autocomplete' => 'off', 'placeholder' => "Логин", 'class' => false],
                    'errorOptions' => ['class' => 'help-inline', 'tag' => 'span']
            ])->textInput(); ?>

        <?= $form->field($model, 'password', [
            'template' => '{input}{error}',
            'options' => ['class' => 'control-group'],
            'inputOptions' => ['data-cip-id' => 'inputLogin', 'autocomplete' => 'off', 'placeholder' => "Пароль", 'class' => false],
            'errorOptions' => ['class' => 'help-inline', 'tag' => 'span']
        ])->textInput(); ?>

        <?= $form->field($model, 'passwordRepeat', [
            'template' => '{input}{error}',
            'options' => ['class' => 'control-group'],
            'inputOptions' => ['data-cip-id' => 'inputLogin', 'autocomplete' => 'off', 'placeholder' => "Повторите пароль", 'class' => false],
            'errorOptions' => ['class' => 'help-inline', 'tag' => 'span']
        ])->textInput(); ?>

        <div class="control-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
        
    </div>
</div>