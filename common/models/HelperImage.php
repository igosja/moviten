<?php

namespace common\models;

use yii\base\Model;

class HelperImage extends Model
{
    /**
     * Обрезка изображения до нужного размера
     * Пример использования - <img src="<?= HelperImage::resize($image_id, $width, $height); ?>">
     *
     * @param $image_id integer id изображения в БД
     * @param $width integer ширина нового файла
     * @param $height integer высота нового файла
     * @param $cut boolean обрезать лишнее или вставить белые полосы, по умолчанию обрезать
     * @return string адрес jpg картинки
     */
    public static function resize($image_id, $width, $height, $cut = true)
    {
        $sizeh = (int)$height;
        $sizew = (int)$width;
        $cut = (int)$cut;

        $o_resize = Resize::findOne([
            'cut' => $cut,
            'height' => $sizeh,
            'image_id' => $image_id,
            'width' => $sizew,
        ]);

        if ($o_resize) {
            return $o_resize['url'];
        } else {
            $o_image = Image::findOne($image_id);

            if (isset($o_image['url'])) {
                $image_url = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web' . $o_image['url'];
                $image_info = getimagesize($image_url);
                $image_height = $image_info[1];
                $image_width = $image_info[0];
                $h_koef = $sizeh / $image_height;
                $w_koef = $sizew / $image_width;

                if (0 == $cut) {
                    if ($h_koef > $w_koef) {
                        $sizeh_new = $image_height * $w_koef;
                        $sizew_new = $sizew;
                    } else {
                        $sizew_new = $image_width * $h_koef;
                        $sizeh_new = $sizeh;
                    }
                } else {
                    if ($h_koef > $w_koef) {
                        $sizew_new = $image_width * $h_koef;
                        $sizeh_new = $sizeh;
                    } else {
                        $sizeh_new = $image_height * $w_koef;
                        $sizew_new = $sizew;
                    }
                }

                if ($image_info[2] == IMAGETYPE_JPEG) {
                    $src = imagecreatefromjpeg($image_url);
                } elseif ($image_info[2] == IMAGETYPE_GIF) {
                    $src = imagecreatefromgif($image_url);
                } else {
                    $src = imagecreatefrompng($image_url);
                }

                $im = imagecreatetruecolor($sizew, $sizeh);
                $back = imagecolorallocate($im, 255, 255, 255);
                imagefill($im, 0, 0, $back);

                $file_name = substr(md5(uniqid()), -20) . '.jpg';

                $path = array();
                $path[] = substr(md5(uniqid(rand(), 1)), -3);
                $path[] = substr(md5(uniqid(rand(), 1)), -3);
                $path[] = substr(md5(uniqid(rand(), 1)), -3);

                $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/frontend/web/upload/' . implode('/', $path);

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, 1);
                }

                $file_url = $upload_dir . '/' . $file_name;

                if (0 == $cut) {
                    imagecopyresampled($im, $src, ($sizew - $sizew_new) / 2, ($sizeh - $sizeh_new) / 2, 0, 0, $sizew_new, $sizeh_new, imagesx($src), imagesy($src));
                } else {
                    $offset_x = ($sizew_new - $sizew) / $h_koef / 2;

                    if (0 > $offset_x) {
                        $offset_x = -$offset_x;
                    }

                    $offset_y = ($sizeh_new - $sizeh) / $w_koef / 2;

                    if (0 > $offset_y) {
                        $offset_y = -$offset_y;
                    }

                    imagecopyresampled($im, $src, 0, 0, $offset_x, $offset_y, $sizew_new, $sizeh_new, imagesx($src), imagesy($src));
                }

                if (imagejpeg($im, $file_url, 100)) {
                    chmod($file_url, 0777);
                }

                imagedestroy($im);

                $resize_url = str_replace($_SERVER['DOCUMENT_ROOT'] . '/frontend/web', '', $file_url);

                $o_resize = new Resize();
                $o_resize['image_id'] = $image_id;
                $o_resize['url'] = $resize_url;
                $o_resize['width'] = $width;
                $o_resize['height'] = $height;
                $o_resize['cut'] = $cut;
                $o_resize->save();

                return $resize_url;
            } else {
                return '';
            }
        }
    }
}