<?php

use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;

$user = Yii::$app->user->identity;
$isDetective = $user && $user->isDetective();
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($isDetective): ?>
            <?= Html::a('Добавить услугу', ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php if (Yii::$app->user->identity->isDetective()): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'price',
                'description:ntext',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Service $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    },
                ],
            ],
        ]); ?>
    <?php else: ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'price',
                'description:ntext',
                [
                    'format' => 'raw',
                    'label' => 'Заказать',
                    'value' => function ($model) {
                        return Html::a('Заказать услугу', ['order/create', 'id' => $model->id], ['class' => 'btn btn-success']);
                    },

                ],
            ],
        ]); ?>
    <?php endif; ?>


</div>
