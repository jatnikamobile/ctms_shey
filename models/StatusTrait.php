<?php 
namespace app\models;

trait StatusTrait {

	public static function getStatusYa($value)
    {
        if ($value == 1) {
            return "Ya";
        } else {
            return "Tidak";
        }
    }

    public static function getStatusCidera($value)
    {
        if ($value == 1) {
            return "Cidera";
        } else {
            return "Tidak Ada Cidera";
        }
    }

    public static function getStatusLengkap($value)
    {
        if ($value == 1) {
            return "Lengkap";
        } else {
            return "Tidak Lengkap";
        }
    }

    public static function getStatusInfeksi($value)
    {
        if ($value == 1) {
            return "Infeksi";
        } else {
            return "Tidak Infeksi";
        }
    }

    public static function getStatusKepatuhan($value)
    {
        if ($value == 1) {
            return "Patuh";
        } else {
            return "Tidak Patuh";
        }
    }
}

?>