<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'id_user',
            'name',
            'last_name',
            'email:email',
            'phone',
            'address',
            'sum',
            ['attribute' => 'status',
                'value' => function($info) {
                    return $info->status == 'Close' ? "<div style='color: red'>$info->status</div>" :
                        "<div style='color: green'>$info->status</div>";
                },
                'format' => 'raw'
            ],
            'delivery_method',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
