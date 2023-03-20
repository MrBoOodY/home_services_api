<?php

namespace App\Enums;

use EnumToArray;

enum VisitRequestStatus: string
{
    use EnumToArray;

    case pending = 'pending';
    case voice_communication = 'voice_communication';
    case preview_pending = 'preview_pending';
    case preview_start = 'preview_start';
    case preview_end = 'preview_end';
    case end = 'end';
    case delay = 'delay';
}
