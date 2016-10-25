<?php

use yii\db\Migration;

/**
 * @author Albert Garipov <bert320@gmail.com>
 */
class m161025_192556_base_tables extends Migration
{

    public function up()
    {
        /* entity tables */
        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%employee}} (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                `isInPlace` tinyint(1) unsigned NOT NULL DEFAULT '1',
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%group}} (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%skill}} (
                `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");


        /* link tables */
        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%employee_group_link}} (
                `employeeId` int(10) unsigned NOT NULL,
                `groupId` int(10) unsigned NOT NULL,
                PRIMARY KEY (`employeeId`,`groupId`),
                KEY `employe_group_link_fk2` (`groupId`),
                CONSTRAINT `employe_group_link_fk2` FOREIGN KEY (`groupId`) REFERENCES {{%group}} (`id`) 
                    ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `employe_group_link_fk1` FOREIGN KEY (`employeeId`) REFERENCES {{%employee}} (`id`) 
                    ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%employee_skill_link}} (
                `employeeId` int(10) unsigned NOT NULL,
                `skillId` int(10) unsigned NOT NULL,
                PRIMARY KEY (`employeeId`,`skillId`),
                KEY `employee_skill_link_fk2` (`skillId`),
                CONSTRAINT `employee_skill_link_fk2` FOREIGN KEY (`skillId`) REFERENCES {{%skill}} (`id`) 
                    ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT `employee_skill_link_fk1` FOREIGN KEY (`employeeId`) REFERENCES {{%employee}} (`id`) 
                    ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down()
    {
        /* link tables */
        $this->execute("
            DROP TABLE IF EXISTS {{%employee_group_link}}
        ");
        $this->execute("
            DROP TABLE IF EXISTS {{%employee_skill_link}}
        ");


        /* entity tables */
        $this->execute("
            DROP TABLE IF EXISTS {{%employee}}
        ");
        $this->execute("
            DROP TABLE IF EXISTS {{%group}}
        ");
        $this->execute("
            DROP TABLE IF EXISTS {{%skill}}
        ");

        return false;
    }

}