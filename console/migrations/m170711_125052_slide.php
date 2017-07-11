<?php

use yii\db\Migration;

class m170711_125052_slide extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%slide}}', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->defaultValue(0),
            'order' => $this->integer()->defaultValue(0),
            'status' => $this->integer(1)->defaultValue(1),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%slide}}');
    }
}
