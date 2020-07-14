<?php

declare(strict_types=1);

class DeviceTypePushButton
{
    use HelperDeviceType;
    private static $implementedType = 'BUTTON';

    private static $implementedTraits = [
        'Button'
    ];

    private static $displayStatusPrefix = false;

    public static function getPosition()
    {
        return 50;
    }

    public static function getCaption()
    {
        return 'Push button';
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

DeviceTypeRegistry::register('PushButton');
