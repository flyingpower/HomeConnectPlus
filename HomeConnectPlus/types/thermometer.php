<?php

declare(strict_types=1);

class DeviceTypeThermometer
{
    use HelperDeviceType;
    private static $implementedType = 'THERMOMETER';

    private static $implementedTraits = [
        'TemperatureSensor'
    ];

    private static $displayStatusPrefix = false;

    public static function getPosition()
    {
        return 11;
    }

    public static function getCaption()
    {
        return 'Thermometer';
    }

    public static function getTranslations()
    {
        return [
            'de' => [
                'Thermometer'          => 'Thermometer',
                'Ambient Temperature' => 'Umgebungstemperatur'
            ]
        ];
    }
}

DeviceTypeRegistry::register('Thermometer');
