<?php

namespace App\Enums;

use EnumToArray;

enum ItemType: string
{
    use EnumToArray;

    case visit_request = 'visit_request';
    case preview_visit = 'preview_visit';
    case visit = 'visit';
}
