<?php

declare(strict_types=1);

class DeviceTypeMeter
{
    use HelperDeviceType;
    private static $implementedType = 'METER';

    private static $implementedTraits = [
        'Meter'
    ];

    private static $displayStatusPrefix = false;

    public static function getPosition()
    {
        return 12;
    }

    public static function getCaption()
    {
        return 'Meter';
    }

    public static function getTranslations()
    {
        return [
            'de' => [
                'Meter'          => 'Verbrauchsmesser',
                'Current consumption' => 'Aktueller Verbrauch',
                'Total consumption' => 'Gesamter Verbrauch'
            ]
        ];
    }
}

DeviceTypeRegistry::register('Meter');
