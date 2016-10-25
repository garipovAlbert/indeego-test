<?php

namespace app\models\queries;

use app\models\Group;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Group]].
 *
 * @see Group
 */
class GroupQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Group[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Group|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}