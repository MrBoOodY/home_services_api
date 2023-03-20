<?php



trait EnumToArray
{

    public   function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public   function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public   function array(): array
    {
        return array_combine(self::values(), self::names());
    }
}
