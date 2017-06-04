<?php

use yii\db\Migration;

class m170604_111807_alter_timestamp extends Migration
{
    public function up()
    {
        $this->alterColumn('message', 'date', 'timestamp');
    }

    public function down()
    {
        echo "m170604_111807_alter_timestamp cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
