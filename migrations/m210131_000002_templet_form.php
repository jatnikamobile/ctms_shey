<?php

use yii\db\Migration;

class m210131_000002_templet_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                ALTER TABLE `form`
                ADD `status` tinyint NOT NULL DEFAULT '0' COMMENT '0=draft, 1=aktif';
            ");
        } catch (\Exception $e) {}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
