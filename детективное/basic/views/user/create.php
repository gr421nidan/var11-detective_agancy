<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Добавление клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
