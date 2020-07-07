<?php

declare(strict_types=1);

class DeviceTraitTemperatureSensor
{
    use HelperFloatDevice;
    use HelperSetDevice;
    const propertyPrefix = 'TemperatureSensor';

    public static function getColumns()
    {
        return [
            [
                'label' => 'Ambient Temperature',
                'name'  => self::propertyPrefix . 'AmbientID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ]
        ];
    }

    public static function getStatus($configuration)
    {
        $ambientStatus = self::getGetFloatCompatibility($configuration[self::propertyPrefix . 'AmbientID']);
        if ($ambientStatus != 'OK') {
            return 'Ambient: ' . $ambientStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Temperature: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'AmbientID'])) {
            return [
                'thermostatTemperatureAmbient'  => GetValue($configuration[self::propertyPrefix . 'AmbientID'])
            ];
        } else {
            return [];
        }
    }

    public static function doExecute($configuration, $command, $data, $emulateStatus)
    {

    }

    public static function getObjectIDs($configuration)
    {
        return [
            $configuration[self::propertyPrefix . 'AmbientID']
        ];
    }

    public static function supportedTraits($configuration)
    {
        return [
            'action.devices.traits.TemperatureSensor'
        ];
    }

    public static function supportedCommands()
    {
        return [
        ];
    }

    public static function getAttributes()
    {
        return [
            'thermostatTemperatureUnit' => 'C'
        ];
    }
}
