<?php

use yii\db\Migration;

class m210124_000000_protokol_update extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->execute("
        //     CREATE TABLE `protokol_uji` (
        //         `id` bigint(20) NOT NULL AUTO_INCREMENT,
        //         `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
        //         `id_instansi` int(11) DEFAULT NULL,
        //         `id_paket` int(11) DEFAULT NULL,
        //         `tanggal` datetime NOT NULL,
        //         `phase` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1,2,3',
        //         PRIMARY KEY (`id`),
        //         KEY `id_instansi` (`id_instansi`),
        //         KEY `id_paket` (`id_paket`),
        //         CONSTRAINT `protokol_uji_ibfk_6` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
        //         CONSTRAINT `protokol_uji_ibfk_7` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
        //     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        //     // ALTER TABLE `protokol_uji` DROP FOREIGN KEY `protokol_uji_ibfk_7`;
        //     // ALTER TABLE `protokol_uji` DROP `anj`;

        // ");
        try { $this->execute("ALTER TABLE `protokol_uji` DROP FOREIGN KEY `protokol_uji_ibfk_6`"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP FOREIGN KEY `protokol_uji_ibfk_7`"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP INDEX `id_paket`;"); } catch(\Exception $e) {}
        try { $this->execute("ALTER TABLE `protokol_uji` DROP `id_paket`"); } catch(\Exception $e) {}

        try {
            $this->execute("
                ALTER TABLE `protokol_uji`
                    ADD `id_sponsor` bigint(20) NULL,
                    ADD `deskripsi` text
            ;`");
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
