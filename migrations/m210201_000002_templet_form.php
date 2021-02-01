<?php

use yii\db\Migration;

class m210201_000002_templet_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                CREATE TABLE `parameter_opsi_label` (
                    `id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `label` text NOT NULL
                ) ENGINE='InnoDB' COLLATE 'utf8mb4_unicode_ci';
                ALTER TABLE `parameter_opsi_label` ADD UNIQUE `label` (`label`(100));
                ALTER TABLE `parameter_opsi` 
                    ADD `id_label` bigint NOT NULL AFTER `label`,
                    CHANGE `label` `label` text COLLATE 'utf8mb4_unicode_ci' NULL AFTER `id_param`;
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
