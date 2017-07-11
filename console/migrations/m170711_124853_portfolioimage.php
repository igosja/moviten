<?php

use yii\db\Migration;

class m170711_124853_portfolioimage extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%portfolioimage}}', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->defaultValue(0),
            'portfolio_id' => $this->integer()->defaultValue(0),
            'order' => $this->integer()->defaultValue(0),
            'status' => $this->integer(1)->defaultValue(1),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%portfolioimage}}');
    }
}
