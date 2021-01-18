<?php 

namespace app\models;

use yii\helpers\ArrayHelper;

trait ListableTrait
{
    /**
     * @return array
     */
    public static function getList()
	{
		$query = self::find();

		return ArrayHelper::map($query->all(), 'id', 'nama');
	}

    /**
     * @return array
     */
    public static function getListCidera()
	{
		return [
			self::CIDERA => 'Cidera',
			self::TIDAK_CIDERA => 'Tidak Ada Cidera',
		];
	}

    /**
     * @return array
     */
    public static function getListYaTidak()
	{
		return [
			self::YA => 'Ya',
			self::TIDAK => 'Tidak',
		];
	}

    /**
     * @return array
     */
    public static function getListLengkap()
	{
		return [
			self::LENGKAP => 'Lengkap',
			self::TIDAK_LENGKAP => 'Tidak Lengkap',
		];
	}

	/**
     * @return array
     */
    public static function getListInfeksi()
	{
		return [
			self::INFEKSI => 'Infeksi',
			self::TIDAK_INFEKSI => 'Tidak Infeksi',
		];
	}


    /**
     * @return array
     */
    public static function getListKepatuhan()
	{
		return [
			self::PATUH => 'Patuh',
			self::TIDAK_PATUH => 'Tidak Patuh',
		];
	}

	public static function getListPakai()
	{
		return [
			self::PAKAI => 'Pakai',
			self::TIDAK_PAKAI => 'Tidak Pakai',
		];
	}

	public static function getListKelopakMata()
	{
		return [
			self::KELOPAK1 => 'Normal',
			self::KELOPAK2 => 'Hordeolum',
			self::KELOPAK3 => 'Lain-Lain',
		];
	}
}

?>
