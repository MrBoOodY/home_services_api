<?php

namespace App\Enums;

enum VisitStatus: string
{
    case pending = 'pending';
    case start = 'start';
    case end = 'end';
    case delay = 'delay';
}


trait EnumToArray
{

  public static function names(): array
  {
    return array_column(self::cases(), 'name');
  }

  public static function values(): array
  {
    return array_column(self::cases(), 'value');
  }

  public static function array(): array
  {
    return array_combine(self::values(), self::names());
  }

}