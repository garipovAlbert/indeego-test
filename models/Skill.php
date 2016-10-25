<?php

namespace app\models;

use app\models\gii\BaseSkill;
use app\models\queries\SkillQuery;
use yii\helpers\ArrayHelper;

/**
 * @author Albert Garipov <bert320@gmail.com>
 */
class Skill extends BaseSkill
{

    /**
     * @inheritdoc
     * @return SkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SkillQuery(get_called_class());
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(static::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }

}