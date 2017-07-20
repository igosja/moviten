<?php

/**
 * @var $exception yii\web\NotFoundHttpException
 * @var $message string
 * @var $name string
 * @var $this \yii\web\View
 */

$this->title = $name;

?>
<div>
    <div class="container">
        <div class="inner">
            <p class="error-page-p text-center">
                <span class="code"><?= $exception->statusCode; ?></span>
                <strong>
                    <?= $message; ?>
                </strong>
            </p>
        </div>
    </div>
</div>
