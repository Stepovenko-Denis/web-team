<?php

use yii\db\Migration;

/**
 * Class m171205_163523_crate_table_clicks
 */
class m171205_163523_crate_table_clicks extends Migration
{
    public $table;

    public function init()
    {
        parent::init();
        $this->table = '{{%clicks}}';
    }

    public function safeUp()
    {
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } else {
            $tableOptions = null;
        }

        $columns = [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'unique_clicks' => $this->integer(),
            'clicks' => $this->integer(),
            'country_code' => $this->char(2),
            'date' => $this->date(),
        ];

        $this->createTable($this->table, $columns, $tableOptions);

        $this->addForeignKey('fk_clicks_news_id', $this->table, 'news_id', '{{%news}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_clicks_news_id', $this->table);
        $this->dropTable($this->table);
    }
}
