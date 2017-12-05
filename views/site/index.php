<?php

/* @var $this yii\web\View */
/* @var $news app\models\entities\News [] */

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
              <?php foreach($news as $item): ?>
                  <?php echo $item->text; ?>
                  <?php echo ;?>
              <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
