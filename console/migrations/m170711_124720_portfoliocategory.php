<?php

use yii\db\Migration;

class m170711_124720_portfoliocategory extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%portfoliocategory}}', [
            'id' => $this->primaryKey(),
            'h1' => $this->string(255),
            'url' => $this->string(255),
            'order' => $this->integer()->defaultValue(0),
            'status' => $this->integer(1)->defaultValue(1),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%portfoliocategory}}');
    }
}
