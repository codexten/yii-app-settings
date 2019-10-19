<?php

namespace codexten\yii\app\settings\migrations;

use yii\db\Migration;

/**
 * Class M191019074734Create_app_setting_table
 * @package codexten\yii\app\settings\migrations
 */
class M191019074734Create_app_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%app_setting}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(50),
            'value' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%app_setting}}');
    }

}
