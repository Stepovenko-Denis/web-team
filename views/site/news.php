<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $news app\models\entities\News */

$this->title = $news->text;

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h3>
                    <?php echo $news->text; ?>
                </h3>
            </div>
        </div>

    </div>
</div>
