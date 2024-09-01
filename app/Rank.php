<?php

namespace App;


enum Rank: string
{
    case Private = 'Private';
    case Corporal = 'Corporal';
    case Sergeant = 'Sergeant';
    case Lieutenant = 'Lieutenant';
    case Captain = 'Captain';
    case Major = 'Major';
    case Colonel = 'Colonel';
    case General = 'General';

    // getValues
    public static function getValues(): array
    {
        return [
            self::Private,
            self::Corporal,
            self::Sergeant,
            self::Lieutenant,
            self::Captain,
            self::Major,
            self::Colonel,
            self::General,
        ];
    }
}

