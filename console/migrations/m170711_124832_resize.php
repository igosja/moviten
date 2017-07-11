<?php

use yii\db\Migration;

class m170711_124832_resize extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%resize}}', [
            'id' => $this->primaryKey(),
            'cut' => $this->integer(1)->defaultValue(0),
            'height' => $this->integer()->defaultValue(0),
            'image_id' => $this->integer()->defaultValue(0),
            'url' => $this->string()->notNull(),
            'width' => $this->integer()->defaultValue(0),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%resize}}');
    }
}
