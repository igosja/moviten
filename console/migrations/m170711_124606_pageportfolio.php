<?php

use yii\db\Migration;

class m170711_124606_pageportfolio extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%pageportfolio}}', [
            'id' => $this->primaryKey(),
            'h1' => $this->string(255),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);

        $this->insert('{{%pageportfolio}}', ['id' => null]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%pageportfolio}}');
    }
}
