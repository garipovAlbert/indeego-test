<?php

namespace app\models\queries;

use app\models\Skill;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Skill]].
 *
 * @see Skill
 */
class SkillQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Skill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Skill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}