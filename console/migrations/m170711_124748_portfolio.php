<?php

use yii\db\Migration;

class m170711_124748_portfolio extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%portfolio}}', [
            'id' => $this->primaryKey(),
            'h1' => $this->string(255),
            'portfoliocategory_id' => $this->integer()->defaultValue(0),
            'text' => $this->text(),
            'url' => $this->string(255),
            'status' => $this->integer(1)->defaultValue(1),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%portfolio}}');
    }
}
