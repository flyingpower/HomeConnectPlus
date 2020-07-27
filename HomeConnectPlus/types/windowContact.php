<?php

declare(strict_types=1);

class DeviceTypeWindowContact
{
    use HelperDeviceType;
    private static $implementedType = 'WINDOWCONTACT';

    private static $implementedTraits = [
        'WindowContact'
    ];

    private static $displayStatusPrefix = false;

    public static function getPosition()
    {
        return 50;
    }

    public static function getCaption()
    {
        return 'Window contact';
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

DeviceTypeRegistry::register('WindowContact');
