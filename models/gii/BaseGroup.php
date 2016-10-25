<?php

namespace app\models\gii;

use app\models\Employee;
use app\models\queries\GroupQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%group}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property EmployeeGroupLink[] $employeeGroupLinks
 * @property Employee[] $employees
 */
class BaseGroup extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getEmployeeGroupLinks()
    {
        return $this->hasMany(EmployeeGroupLink::className(), ['groupId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['id' => 'employeeId'])->viaTable('{{%employee_group_link}}', ['groupId' => 'id']);
    }

}