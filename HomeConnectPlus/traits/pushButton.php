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
                'label' => 'Button 1',
                'name'  => self::propertyPrefix . 'Button1ID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ],
            [
                'label' => 'Button 2',
                'name'  => self::propertyPrefix . 'Button2ID',
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
        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'Button1ID']);
        if ($currentStatus != 'OK') {
            return 'Button 1: ' . $currentStatus;
        }

        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'Button2ID']);
        if ($currentStatus != 'OK') {
            return 'Button 2: ' . $currentStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Button: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'Button1ID']) && IPS_VariableExists($configuration[self::propertyPrefix . 'Button2ID'])) {
            return [
                'button1'  => IPS_GetVariable($configuration[self::propertyPrefix . 'Button1ID'])['VariableUpdated'] ,
                'button2'  => IPS_GetVariable($configuration[self::propertyPrefix . 'Button2ID'])['VariableUpdated']
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
            $configuration[self::propertyPrefix . 'Button1ID'],
            $configuration[self::propertyPrefix . 'Button2ID']
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
