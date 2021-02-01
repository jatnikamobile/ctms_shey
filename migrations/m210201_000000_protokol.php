<?php

use yii\db\Migration;

class m210201_000000_protokol extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        try {
            $this->execute("
                SET foreign_key_checks = 0;

                DROP TABLE IF EXISTS `protokol_uji`;

                DROP TABLE IF EXISTS `dokumen_protokol`;
                CREATE TABLE `dokumen_protokol` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `id_protokol` bigint(20) NOT NULL,
                `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                `file_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                DROP TABLE IF EXISTS `instansi`;
                CREATE TABLE `instansi` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `kode` int(4) DEFAULT NULL,
                `nama` varchar(255) NOT NULL,
                `bagian` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                INSERT INTO `instansi` (`id`, `kode`, `nama`, `bagian`) VALUES (10,	1113,	'RSAU',	NULL);

                DROP TABLE IF EXISTS `protokol`;
                CREATE TABLE `protokol` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
                `id_instansi` bigint(20) DEFAULT NULL,
                `tanggal` datetime DEFAULT NULL,
                `phase` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1,2,3',
                `tujuan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `id_sponsor` bigint(20) DEFAULT NULL,
                `jml_subject` int(11) DEFAULT NULL,
                `inklusi_subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                `eklusi_subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `id_instansi` (`id_instansi`),
                KEY `id_sponsor` (`id_sponsor`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                DROP TABLE IF EXISTS `sponsor`;
                CREATE TABLE `sponsor` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

                INSERT INTO `sponsor` (`id`, `nama`) VALUES (3,	'Biontech');
            ");
        } catch(\Exception $e) {
            print_r($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
