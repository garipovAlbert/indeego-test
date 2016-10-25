<?php

namespace app\models\queries;

use app\models\Employee;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Employee]].
 *
 * @see Employee
 */
class EmployeeQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return Employee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Employee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

}