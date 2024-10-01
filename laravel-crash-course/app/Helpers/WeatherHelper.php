<?php

namespace App\Helpers;

class WeatherHelper
{
    public static function getForecastIcon($code)
    {
        $iconMap = [
            0 => 'wind',
            1 => 'wind',
            2 => 'wind',
            3 => 'bolt',
            4 => 'bolt-lightning',
            5 => 'snowflake',
            6 => 'snowflake',
            7 => 'snowflake',
            8 => 'icicles',
            9 => 'cloud-rain',
            10 => 'cloud-rain',
            11 => 'cloud-showers-heavy',
            12 => 'cloud-showers-heavy',
            13 => 'snowflake',
            14 => 'snowflake',
            15 => 'snowflake',
            16 => 'snowflake',
            17 => 'cloud-hail-mixed',
            18 => 'cloud-rain',
            19 => 'smog',
            20 => 'smog',
            21 => 'smog',
            22 => 'smog',
            23 => 'wind',
            24 => 'wind',
            25 => 'icicles',
            26 => 'cloud',
            27 => 'cloud-moon',
            28 => 'cloud-sun',
            29 => 'cloud-moon',
            30 => 'cloud-sun',
            31 => 'moon',
            32 => 'sun',
            33 => 'moon',
            34 => 'sun',
            35 => 'cloud-hail-mixed',
            36 => 'temperature-high',
            37 => 'bolt',
            38 => 'bolt',
            39 => 'cloud-showers-heavy',
            40 => 'cloud-rain',
            41 => 'snowflake',
            42 => 'snowflake',
            43 => 'snowflake',
            44 => 'cloud',
            45 => 'bolt',
            46 => 'snowflake',
            47 => 'bolt'
        ];

        return $iconMap[$code] ?? 'question';
    }
}
