<?php

namespace App\Enums;

use EnumToArray;

enum VisitRequestStatus: string
{
    use EnumToArray;

    case pending = 'pending';
    case voice_com = 'voice_com';
    case start = 'start';
    case end = 'end';
    case delay = 'delay';
}
