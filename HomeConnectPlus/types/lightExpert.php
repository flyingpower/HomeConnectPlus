<?php

declare(strict_types=1);

class DeviceTypeLightExpert
{
    use HelperDeviceType;
    private static $implementedType = 'LIGHT';

    private static $implementedTraits = [
        'OnOff', 'Brightness', 'ColorSpectrum'
    ];

    private static $displayStatusPrefix = true;

    public static function getPosition()
    {
        return 3;
    }

    public static function getCaption()
    {
        return 'Light (Color)';
    }

    public static function getTranslations()
    {
        return [
            'de' => [
                'Light (Color)'      => 'Licht (Farbe)',
                'Switch Variable'     => 'Schaltervariable',
                'Brightness Variable' => 'Helligkeitsvariable',
                'Color Variable'      => 'Farbvariable'
            ]
        ];
    }
}

DeviceTypeRegistry::register('LightExpert');
