<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $news app\models\entities\News [] */

$this->title = 'Web-team';

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
              <?php foreach($news as $item): ?>
                  <p>
                      <?php echo $item->text; ?>
                      <?php echo Html::a('Read more', ['/site/news', 'id' => $item->id]); ?>
                  </p>
                  <hr>
              <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
