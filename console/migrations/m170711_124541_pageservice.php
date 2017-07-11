<?php

use yii\db\Migration;

class m170711_124541_pageservice extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%pageservice}}', [
            'id' => $this->primaryKey(),
            'h1' => $this->string(255),
            'text' => $this->text(),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);

        $this->insert('{{%pageservice}}', ['id' => null]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%pageservice}}');
    }
}
