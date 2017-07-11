<?php

use yii\db\Migration;

class m170711_124512_pagemain extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%pagemain}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);

        $this->insert('{{%pagemain}}', ['id' => null]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%pagemain}}');
    }
}
