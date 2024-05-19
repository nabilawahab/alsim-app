<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createArtificialId($schedule_date, $schedule_shift) {
        // Mengubah format tanggal menjadi YYYYMMDD
        $formatted_date = date('Ymd', strtotime($schedule_date));
        $formatted_shift = str_pad($schedule_shift, 2, '0', STR_PAD_LEFT);

        // Menggabungkan tanggal dan shift menjadi ID
        $artificial_id = $formatted_date . $formatted_shift;
    
        return $artificial_id;
    }

    public function logDefinedId($schedule_date, $schedule_shift, $time_in, $id_alsim) {
        // Mengubah format tanggal menjadi YYYYMMDD
        $formatted_date = date('Ymd', strtotime($schedule_date));
        $formatted_shift = str_pad($schedule_shift, 2, '0', STR_PAD_LEFT);
        $formatted_time_in = str_pad($time_in, 2, '0', STR_PAD_LEFT);
        $formatted_id_alsim = str_pad($id_alsim, 2, '0', STR_PAD_LEFT);

        // Menggabungkan tanggal dan shift menjadi ID
        $artificial_id = $formatted_date . $formatted_shift . $formatted_time_in . $formatted_id_alsim;
    
        return $artificial_id;
    }


}
