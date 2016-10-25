<?php

namespace app\models\gii;

use app\models\Group;
use app\models\queries\EmployeeQuery;
use app\models\Skill;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isInPlace
 *
 * @property EmployeeGroupLink[] $employeeGroupLinks
 * @property Group[] $groups
 * @property EmployeeSkillLink[] $employeeSkillLinks
 * @property Skill[] $skills
 */
class BaseEmployee extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['isInPlace'], 'integer'],
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
            'isInPlace' => Yii::t('app', 'Is In Place'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getEmployeeGroupLinks()
    {
        return $this->hasMany(EmployeeGroupLink::className(), ['employeeId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'groupId'])->viaTable('{{%employee_group_link}}', ['employeeId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getEmployeeSkillLinks()
    {
        return $this->hasMany(EmployeeSkillLink::className(), ['employeeId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['id' => 'skillId'])->viaTable('{{%employee_skill_link}}', ['employeeId' => 'id']);
    }

}