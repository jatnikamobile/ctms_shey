<?php

use yii\db\Migration;

class m210124_000000_protokol_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try { $this->execute("ALTER TABLE `protokol_uji` DROP FOREIGN KEY `protokol_uji_ibfk_6`"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP FOREIGN KEY `protokol_uji_ibfk_7`"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP INDEX `id_paket`;"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP `id_paket`"); } catch(\Exception $e) {}

        try {
            $this->execute("
                ALTER TABLE `protokol_uji`
                    ADD `id_sponsor` bigint(20) NULL,
                    ADD `deskripsi` text
            ");
        } catch(\Exception $e) {}

        try { $this->execute("ALTER TABLE `protokol_uji` ADD INDEX `id_sponsor` (`id_sponsor`)"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` CHANGE `id_instansi` `id_instansi` bigint NULL AFTER `nama`"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `instansi` CHANGE `id` `id` bigint NOT NULL AUTO_INCREMENT FIRST;"); } catch(\Exception $e) {}

        try {
            $this->execute("
                CREATE TABLE `sponsor` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;              
            ;`");
        } catch(\Exception $e) {}
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
