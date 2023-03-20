<?php

namespace App\Enums;

use EnumToArray;

enum VisitRequestStatus: string
{
    use EnumToArray;

    case pending = 'pending';
    case voice_communication = 'voice_communication';
    case preview_start = 'preview_start';
    case end = 'end';
    case delay = 'delay';
}
