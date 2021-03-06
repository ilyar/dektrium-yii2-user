<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $model
 */

$this->title = Yii::t('user', 'Email settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <?php if (Yii::$app->getSession()->hasFlash('user.reconfirmation_sent')): ?>
        <div class="col-md-12">
            <div class="alert alert-info">
                <?= Yii::t('user', 'Before your email will be changed we need you to confirm your new email address') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->getSession()->hasFlash('user.email_changed')): ?>
        <div class="col-md-12">
            <div class="alert alert-info">
                <?= Yii::t('user', 'Your email has been successfully changed') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->getSession()->hasFlash('user.email_change_cancelled')): ?>
        <div class="col-md-12">
            <div class="alert alert-info">
                <?= Yii::t('user', 'Email change has been cancelled') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::$app->getUser()->getIdentity()->username ?></h3>
            </div>
            <div class="panel-body">
                <?= \yii\widgets\Menu::widget([
                    'options' => [
                        'class' => 'nav nav-pills nav-stacked'
                    ],
                    'items' => [
                        ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
                        ['label' => Yii::t('user', 'Email'), 'url' => ['/user/settings/email']],
                        ['label' => Yii::t('user', 'Password'), 'url' => ['/user/settings/password']],
                        ['label' => Yii::t('user', 'Networks'), 'url' => ['/user/settings/networks']],
                    ]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                ]); ?>

                <?= $form->field($model, 'unconfirmed_email')->hint('Enter your current email to cancel email change') ?>

                <?= $form->field($model, 'current_password')->passwordInput() ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-success']) ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
