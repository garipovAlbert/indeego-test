<?php

namespace app\models\search;

use app\models\Employee;
use common\models\Applicant;
use common\models\queries\AccountQuery;
use common\models\queries\ApplicantQuery;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * @author Albert Garipov <bert320@gmail.com>
 * @see Applicant
 */
class EmployeeSearch extends Employee
{

    public $pageSize = 1000;

    /**
     * @var AccountQuery
     */
    public $query;

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), [
            'groupId', 'skillId',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'name', 'isInPlace', 'groupId', 'skillId',
                ],
                'safe',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_replace(parent::attributeLabels(), [
            'groupId' => Yii::t('app', 'Group'),
            'skillId' => Yii::t('app', 'Skill'),
        ]);
    }

    /**
     * @param array $params
     * @param string $formName
     * @return ActiveDataProvider
     */
    public function search($params = [], $formName = null)
    {
        /* @var $query ApplicantQuery */
        $query = $this->query ? $this->query : Employee::find();

        $query->joinWith([
            'groups',
            'skills',
        ]);


        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $provider->pagination->defaultPageSize = $this->pageSize;

        $provider->sort->defaultOrder = [
            'id' => SORT_DESC,
        ];

        $loaded = $this->load($params, $formName);

        // load the seach form data and validate
        if (!($loaded && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['like', '{{%employee}}.name', $this->name]);
        $query->andFilterWhere(['isInPlace' => $this->isInPlace]);
        $query->andFilterWhere(['{{%group}}.id' => $this->groupId]);
        $query->andFilterWhere(['{{%skill}}.id' => $this->skillId]);

        return $provider;
    }

}