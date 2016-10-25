<?php

namespace app\models;

use app\models\gii\BaseEmployee;
use app\models\queries\EmployeeQuery;
use Yii;

/**
 * @author Albert Garipov <bert320@gmail.com>
 */
class Employee extends BaseEmployee
{

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'isInPlace' => Yii::t('app', 'In Place'),
        ];
    }

}