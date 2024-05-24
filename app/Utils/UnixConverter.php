<?php

namespace App\Utils;

use Carbon\Carbon;

class UnixConverter
{
    const VN_TIMEZONE = 'Asia/Ho_Chi_Minh';

    public static function HM($datetime): string
    {
        $begin         = Carbon::createFromTimestamp(0);
        $unix          = Carbon::createFromTimestamp($datetime->format('U'));
        $total_minutes = $begin->diffInMinutes($unix);

        $hours   = intdiv($total_minutes, 60);
        $minutes = $total_minutes % 60;

        return "$hours giờ $minutes phút";

    }
}
