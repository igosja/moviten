<?php

namespace common\models;

use yii\db\ActiveRecord;

class Resize extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%resize}}';
    }

    public function rules()
    {
        return [
            [['cut', 'height', 'image_id', 'url', 'width'], 'required'],
            [['url'], 'string', 'max' => 255],
            [['cut', 'height', 'image_id', 'width'], 'integer'],
        ];
    }

    public function beforeDelete()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this['url'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $this['url']);
        }
        return parent::beforeDelete();
    }
}