<?php

use yii\db\Migration;

/**
 * Class m171205_163523_crate_table_clicks
 */
class m171205_163523_crate_table_news_views extends Migration
{
    public $table;

    public function init()
    {
        parent::init();
        $this->table = '{{%news_views}}';
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
            'unique_clicks' => $this->integer()->defaultValue(0),
            'clicks' => $this->integer()->defaultValue(0),
            'country_code' => $this->char(2),
            'date' => $this->date(),
        ];

        $this->createTable($this->table, $columns, $tableOptions);

        $this->addForeignKey('fk_news_view_news_id', $this->table, 'news_id', '{{%news}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_news_view_news_id', $this->table);
        $this->dropTable($this->table);
    }
}
