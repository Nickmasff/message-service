<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m170531_080117_create_message_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('message', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'date' =>  $this->timestamp()->defaultValue(null),
            'user_id' => $this->integer()->notNull()
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-message-user_id',
            'message',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-message-user_id',
            'message',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-message-user_id',
            'message'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-message-user_id',
            'message'
        );

        $this->dropTable('message');
    }
}
