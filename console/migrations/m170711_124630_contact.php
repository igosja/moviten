<?php

use yii\db\Migration;

class m170711_124630_contact extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'address_1' => $this->string(255),
            'address_2' => $this->string(255),
            'address_3' => $this->string(255),
            'email' => $this->string(255),
            'google_lat' => $this->decimal(15,12)->defaultValue(0),
            'google_lng' => $this->decimal(15,12)->defaultValue(0),
            'h1' => $this->string(255),
            'phone_1' => $this->string(20),
            'phone_2' => $this->string(20),
            'shedule_mn' => $this->string(20),
            'shedule_sn' => $this->string(20),
            'shedule_st' => $this->string(20),
            'seo_description' => $this->text(),
            'seo_keywords' => $this->text(),
            'seo_title' => $this->string(255),
        ]);

        $this->insert('{{%contact}}', ['id' => null]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
