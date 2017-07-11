<?php

use yii\db\Migration;

class m170711_124530_pageabout extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%pageabout}}', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()->defaultValue(0),
            'h1' => $this->string(255),
            'h2' => $this->string(255),
            'h3_1' => $this->string(255),
            'h3_2' => $this->string(255),
            'team_1' => $this->integer()->defaultValue(0),
            'team_2' => $this->integer()->defaultValue(0),
            'team_3' => $this->integer()->defaultValue(0),
            'team_4' => $this->integer()->defaultValue(0),
            'text_1' => $this->text(),
            'text_2' => $this->text(),
            'text_3' => $this->text(),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);

        $this->insert('{{%pageabout}}', ['id' => null]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%pageabout}}');
    }
}
