<?php

use yii\db\Migration;

/**
 * Fill tables with random data.
 * 
 * @author Albert Garipov <bert320@gmail.com>
 */
class m161025_194331_fill_data extends Migration
{

    public function safeUp()
    {
        /* employee */
        $this->insert('{{%employee}}', ['id' => 1, 'name' => 'Петров', 'isInPlace' => 1]);
        $this->insert('{{%employee}}', ['id' => 2, 'name' => 'Иванов', 'isInPlace' => 0]);
        $this->insert('{{%employee}}', ['id' => 3, 'name' => 'Сидоров', 'isInPlace' => 1]);
        $this->insert('{{%employee}}', ['id' => 4, 'name' => 'Васильев', 'isInPlace' => 1]);
        $this->insert('{{%employee}}', ['id' => 5, 'name' => 'Григорьев', 'isInPlace' => 1]);
        $this->insert('{{%employee}}', ['id' => 6, 'name' => 'Степанов', 'isInPlace' => 0]);

        /* group */
        $this->insert('{{%group}}', ['id' => 1, 'name' => '1']);
        $this->insert('{{%group}}', ['id' => 2, 'name' => '2']);
        $this->insert('{{%group}}', ['id' => 3, 'name' => '3']);
        $this->insert('{{%group}}', ['id' => 4, 'name' => '4']);

        /* skill */
        $this->insert('{{%skill}}', ['id' => 1, 'name' => 'A']);
        $this->insert('{{%skill}}', ['id' => 2, 'name' => 'B']);
        $this->insert('{{%skill}}', ['id' => 3, 'name' => 'C']);


        /* links */
        $this->insert('{{%employee_group_link}}', ['employeeId' => 1, 'groupId' => 2]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 1, 'groupId' => 3]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 2, 'groupId' => 4]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 3, 'groupId' => 4]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 3, 'groupId' => 3]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 4, 'groupId' => 2]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 5, 'groupId' => 1]);
        $this->insert('{{%employee_group_link}}', ['employeeId' => 6, 'groupId' => 1]);

        $this->insert('{{%employee_skill_link}}', ['employeeId' => 1, 'skillId' => 2]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 2, 'skillId' => 3]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 3, 'skillId' => 3]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 4, 'skillId' => 1]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 4, 'skillId' => 2]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 4, 'skillId' => 3]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 5, 'skillId' => 1]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 5, 'skillId' => 3]);
        $this->insert('{{%employee_skill_link}}', ['employeeId' => 6, 'skillId' => 1]);
    }

    public function safeDown()
    {

        $this->delete('{{%employee}}');
        $this->delete('{{%group}}');
        $this->delete('{{%skill}}');

        return false;
    }

}