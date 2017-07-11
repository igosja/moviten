<?php

use yii\db\Migration;

class m170711_124826_image extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
