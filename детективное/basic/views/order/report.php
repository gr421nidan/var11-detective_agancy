<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = 'Отчет за оказанные услуги';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
    <div class="order-report">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            Общая стоимость заказанных услуг: <?= Html::encode($totalPrice) ?> рублей.
        </p>

    </div>
<?php
