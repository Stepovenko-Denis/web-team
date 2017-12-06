<?php


use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $this yii\web\View */
/* @var $item app\models\entities\NewsView */

$this->title = 'Stats';

?>
<div class="site-contact">
      <h1><?= Html::encode($this->title) ?></h1>
  
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>News_id</th>
          <th>Unique_clicks</th>
          <th>Clicks</th>
          <th>Country_code</th>
          <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($dataProvider->getModels() as $item): ?>
          <tr>
            <td><?php echo $item->news_id; ?></td>
            <td><?php echo $item->unique_clicks; ?></td>
            <td><?php echo $item->clicks; ?></td>
            <td><?php echo $item->country_code; ?></td>
            <td><?php echo $item->date; ?></td>
          </tr>
        <?php endforeach ?>
        </tbody>
      </table>
      <?= LinkPager::widget([
          'pagination' => $dataProvider->getPagination(),
      ]) ?>
</div>
