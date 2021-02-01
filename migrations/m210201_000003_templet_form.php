<?php

use yii\db\Migration;

class m210201_000003_templet_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                ALTER TABLE `form` ADD `id_protokol` bigint(20) NOT NULL DEFAULT '0' AFTER `id`;
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
