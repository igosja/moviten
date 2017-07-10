<?php

use yii\db\Migration;

class m170710_112935_user extends Migration
{
    public function safeUp()
    {
        $this->batchInsert(
            '{{%user}}',
            ['auth_key', 'date_create', 'email', 'username', 'password_hash', 'status'],
            [
                ['YofjNe6hAmYH86UnS2Uy4H3S2Pj_ZIEe', 1499685924, 'moviten@yandex.ru', 'v_mokhort', '$2y$13$fSNnUaptFtjOnkfQUl2oiOi8tnOM/Zm/cl5ao.kSP/yU0aTfx69rq', 10],
                ['K61D0SCUf1BQTciLOFdOC91R-mM4ma92', 1499686152, 'igosja@ukr.net', 'igosja', '$2y$13$y9i8GfN6004e./YPmsrbs.OiFxGiKr0yuWNUhzIRPefD8/McQ8YvO', 10]
            ]);
    }

    public function safeDown()
    {
        $this->truncateTable('{{%user}}');
    }
}
