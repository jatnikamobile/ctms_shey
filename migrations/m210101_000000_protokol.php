<?php

use yii\db\Migration;

class m210101_000000_protokol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                CREATE TABLE `protokol_uji` (
                    `id` bigint(20) NOT NULL AUTO_INCREMENT,
                    `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
                    `id_instansi` int(11) DEFAULT NULL,
                    `id_paket` int(11) DEFAULT NULL,
                    `tanggal` datetime NOT NULL,
                    `phase` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1,2,3',
                    PRIMARY KEY (`id`),
                    KEY `id_instansi` (`id_instansi`),
                    KEY `id_paket` (`id_paket`),
                    CONSTRAINT `protokol_uji_ibfk_6` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
                    CONSTRAINT `protokol_uji_ibfk_7` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");
        } catch(\Exception $e) {
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
