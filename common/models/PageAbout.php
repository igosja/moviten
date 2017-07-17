<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class PageAbout extends ActiveRecord
{
    /**
     * @var UploadedFile file attributes
     */
    public $upload_image;
    /**
     * @var UploadedFile file attributes
     */
    public $upload_team_1;
    /**
     * @var UploadedFile file attributes
     */
    public $upload_team_2;
    /**
     * @var UploadedFile file attributes
     */
    public $upload_team_3;
    /**
     * @var UploadedFile file attributes
     */
    public $upload_team_4;

    public static function tableName()
    {
        return '{{%pageabout}}';
    }

    public function rules()
    {
        return [
            [['image_id', 'team_1', 'team_2', 'team_3', 'team_4'], 'integer'],
            [['h1', 'h2', 'h3_1', 'h3_2', 'seo_title'], 'string', 'max' => 255],
            [['text_1', 'text_2', 'text_3', 'seo_description', 'seo_keywords'], 'safe'],
            [
                ['upload_image', 'upload_team_1', 'upload_team_2', 'upload_team_3', 'upload_team_4'],
                'image',
                'extensions' => 'png, jpg, jpeg, gif'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'h1' => 'Заголовок 1',
            'h2' => 'Заголовок 2',
            'h3_1' => 'Заголовок 3',
            'h3_2' => 'Заголовок 4',
            'image_id' => 'Изображение',
            'team_1' => 'Изображение (команда 1)',
            'team_2' => 'Изображение (команда 2)',
            'team_3' => 'Изображение (команда 3)',
            'team_4' => 'Изображение (команда 4)',
            'text_1' => 'Текст 1',
            'text_2' => 'Текст 2',
            'text_3' => 'Текст 3',
            'upload_image' => 'Изображение',
            'upload_team_1' => 'Изображение (команда 1)',
            'upload_team_2' => 'Изображение (команда 2)',
            'upload_team_3' => 'Изображение (команда 3)',
            'upload_team_4' => 'Изображение (команда 4)',
            'seo_description' => 'SEO description',
            'seo_keywords' => 'SEO keywords',
            'seo_title' => 'SEO title',
        ];
    }

    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    public function getTeam1()
    {
        return $this->hasOne(Image::className(), ['id' => 'team_1']);
    }

    public function getTeam2()
    {
        return $this->hasOne(Image::className(), ['id' => 'team_2']);
    }

    public function getTeam3()
    {
        return $this->hasOne(Image::className(), ['id' => 'team_3']);
    }

    public function getTeam4()
    {
        return $this->hasOne(Image::className(), ['id' => 'team_4']);
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_image->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_image->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload1()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_team_1->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_team_1->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload2()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_team_2->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_team_2->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload3()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_team_3->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_team_3->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }

    /**
     * Сохраняет загруженный файл и делает запись в БД
     * @return integer image_id
     */
    public function upload4()
    {
        $file_name = substr(md5(uniqid()), -20) . '.' . $this->upload_team_4->extension;
        $path = array();
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $path[] = substr(md5(uniqid(rand(), 1)), -3);
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, 1);
        }
        $upload_url = $upload_dir . '/' . $file_name;
        $file_url = '/upload/' . implode('/', $path) . '/' . $file_name;
        if ($this->upload_team_4->saveAs($upload_dir . '/' . $file_name)) {
            chmod($upload_url, 0777);
        }
        $o_image = new Image();
        $o_image['url'] = $file_url;
        $o_image->save();
        return $o_image->primaryKey;
    }
}