<?php

namespace App\Enums;

enum VisitStatus: string
{
    use EnumToArray;

    case pending = 'pending';
    case start = 'start';
    case end = 'end';
    case delay = 'delay';
}
