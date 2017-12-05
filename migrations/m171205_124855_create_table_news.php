<?php

use yii\db\Migration;

/**
 * Class m171205_124855_create_table_news
 */
class m171205_124855_create_table_news extends Migration
{
    public $table;

    public function init()
    {
        parent::init();
        $this->table = '{{%news}}';
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
            'text' => $this->text()
        ];

        $this->createTable($this->table, $columns, $tableOptions);

        $this->insert($this->table, ['text' => 'Text 1']);
        $this->insert($this->table, ['text' => 'Text 2']);
        $this->insert($this->table, ['text' => 'Text 3']);
        $this->insert($this->table, ['text' => 'Text 4']);
        $this->insert($this->table, ['text' => 'Text 5']);
        $this->insert($this->table, ['text' => 'Text 6']);
        $this->insert($this->table, ['text' => 'Text 7']);
        $this->insert($this->table, ['text' => 'Text 8']);
        $this->insert($this->table, ['text' => 'Text 9']);
        $this->insert($this->table, ['text' => 'Text 10']);
        $this->insert($this->table, ['text' => 'Text 11']);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
