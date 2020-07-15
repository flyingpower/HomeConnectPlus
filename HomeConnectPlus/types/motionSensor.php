<?php

declare(strict_types=1);

class DeviceTypeMotionSensor
{
    use HelperDeviceType;
    private static $implementedType = 'MOTIONSENSOR';

    private static $implementedTraits = [
        'MotionSensor'
    ];

    private static $displayStatusPrefix = false;

    public static function getPosition()
    {
        return 50;
    }

    public static function getCaption()
    {
        return 'Motion sensor';
    }

    public static function getTranslations()
    {
        return [
            'de' => [
                'Short press' => 'Druck'
            ]
        ];
    }
}

DeviceTypeRegistry::register('MotionSensor');
