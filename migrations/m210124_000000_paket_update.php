<?php

use yii\db\Migration;

class m210124_000000_paket_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try { $this->execute("ALTER TABLE `paket` ADD `id_protokol_uji` bigint(20) NULL"); } catch(\Exception $e) {}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
