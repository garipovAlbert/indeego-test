<?php

use app\models\Group;
use app\models\search\EmployeeSearch;
use app\models\Skill;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel EmployeeSearch */

$this->title = Yii::t('app', 'Employees');
$this->params['breadcrumbs'] = [Yii::t('app', 'Employees')];
?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'name',
        ],
        [
            'attribute' => 'isInPlace',
            'format' => 'boolean',
            'headerOptions' => ['style' => 'width: 160px;'],
            'filter' => [
                0 => Yii::t('yii', 'No'),
                1 => Yii::t('yii', 'Yes'),
            ],
        ],
        [
            'attribute' => 'groupId',
            'header' => Yii::t('app', 'Groups'),
            'filter' => Group::getList(),
            'value' => function($model) {
                return join(', ', ArrayHelper::getColumn($model->groups, 'name'));
            },
        ],
        [
            'attribute' => 'skillId',
            'header' => Yii::t('app', 'Skills'),
            'filter' => Skill::getList(),
            'value' => function($model) {
                return join(', ', ArrayHelper::getColumn($model->skills, 'name'));
            },
        ],
    ],
]);
?>