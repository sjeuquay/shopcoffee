<?php

namespace App\Utils;

use App\Models\Setting\Status;

class StatusMounter
{
    public static function ORDER_PROCESS()
    {
        return Status::whereBetween(Status::STATUS_CODE, [ '01', '05' ])->get();
    }
    public static function EQUIPMENT()
    {
        return Status::whereBetween(Status::STATUS_CODE, [ '06', '10' ])->get();
    }
    public static function OTHER()
    {
        return Status::whereBetween(Status::STATUS_CODE, [ '11', '20' ])->get();
    }
}
