<?php

namespace app\models\gii;

use app\models\Employee;
use app\models\queries\SkillQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%skill}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property EmployeeSkillLink[] $employeeSkillLinks
 * @property Employee[] $employees
 */
class BaseSkill extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%skill}}';
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
    public function getEmployeeSkillLinks()
    {
        return $this->hasMany(EmployeeSkillLink::className(), ['skillId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['id' => 'employeeId'])->viaTable('{{%employee_skill_link}}', ['skillId' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SkillQuery(get_called_class());
    }

}