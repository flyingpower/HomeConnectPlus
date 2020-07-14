<?php

declare(strict_types=1);

class DeviceTraitButton
{
    use HelperBoolDevice;
    use HelperSetDevice;
    const propertyPrefix = 'Button';

    public static function getColumns()
    {
        return [
            [
                'label' => 'Press',
                'name'  => self::propertyPrefix . 'ShortID',
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
        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'ShortID']);
        if ($currentStatus != 'OK') {
            return 'Press: ' . $currentStatus;
        }
        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Button: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'ShortID'])) {
            return [
                'press'  => IPS_GetVariable($configuration[self::propertyPrefix . 'ShortID'])['VariableChanged'] 
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
            $configuration[self::propertyPrefix . 'ShortID']
        ];
    }

    public static function supportedTraits($configuration)
    {
        return [
            'action.devices.traits.Button'
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
