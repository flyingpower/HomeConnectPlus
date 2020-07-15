<?php

declare(strict_types=1);

class DeviceTraitMotionSensor
{
    use HelperBoolDevice;
    use HelperNumberDevice;
    use HelperSetDevice;
    const propertyPrefix = 'MotionSensor';

    public static function getColumns()
    {
        return [
            [
                'label' => 'Motion detected',
                'name'  => self::propertyPrefix . 'DetectedID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ],
            [
                'label' => 'Illumination',
                'name'  => self::propertyPrefix . 'IlluminationID',
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
        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'DetectedID']);
        if ($currentStatus != 'OK') {
            return 'Detected: ' . $currentStatus;
        }

        $currentStatus = self::getGetNumberCompatibility($configuration[self::propertyPrefix . 'IlluminationID']);
        if ($currentStatus != 'OK') {
            return 'Illumination: ' . $currentStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Motion sensor: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'DetectedID']) && IPS_VariableExists($configuration[self::propertyPrefix . 'IlluminationID'])) {
            return [
                'detected'  => IPS_GetVariable($configuration[self::propertyPrefix . 'DetectedID'])['VariableUpdated'] ,
                'illumination'  => GetValue($configuration[self::propertyPrefix . 'IlluminationID'])
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
            $configuration[self::propertyPrefix . 'DetectedID'],
            $configuration[self::propertyPrefix . 'IlluminationID']
        ];
    }

    public static function supportedTraits($configuration)
    {
        return [
            'action.devices.traits.MotionSensor'
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
        ];
    }
}
