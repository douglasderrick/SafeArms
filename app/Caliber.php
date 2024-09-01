<?php

namespace App;

enum Caliber: string
{
    case NineMM = '9mm';
    case FortyFiveACP = '.45 ACP';
    case FiveFiveSixMM = '5.56mm';
    case SevenSixTwoMM = '7.62mm';
    case FiftyCal = '.50 cal';
    case TwelveGauge = '12-gauge';

    public static function getValues(): array
    {
        return [
            self::NineMM,
            self::FortyFiveACP,
            self::FiveFiveSixMM,
            self::SevenSixTwoMM,
            self::FiftyCal,
            self::TwelveGauge,
        ];
    }
}
