<?php

namespace App\Enums;

enum StandTypeEnum: string
{
    case ELECTRICITY = "electricity";
    case STANDARD = "standard";

    public function getType(): string
    {
        return match($this)
        {
            self::ELECTRICITY => __("electricity"),
            self::STANDARD => __("standard"),
        };
    }
}
