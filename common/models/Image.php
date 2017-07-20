<?php

namespace common\models;

use yii\db\ActiveRecord;

class Image extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%image}}';
    }

    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string', 'max' => 255],
        ];
    }

    public function getResize()
    {
        return $this->hasMany(Resize::className(), ['image_id' => 'id']);
    }

    public function beforeDelete()
    {
        foreach ($this['resize'] as $item) {
            /* @var $item Resize */
            $item->delete();
        }
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this['url'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this['url']);
        }
        return parent::beforeDelete();
    }
}