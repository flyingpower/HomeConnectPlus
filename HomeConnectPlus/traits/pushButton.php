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
                'label' => 'Short press',
                'name'  => self::propertyPrefix . 'ShortID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ],
            [
                'label' => 'Long press',
                'name'  => self::propertyPrefix . 'LongID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ],
            [
                'label' => 'Double press',
                'name'  => self::propertyPrefix . 'DoubleID',
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
            return 'Short: ' . $currentStatus;
        }

        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'LongID']);
        if ($currentStatus != 'OK') {
            return 'Long: ' . $currentStatus;
        }

        $currentStatus = self::getBoolCompatibility($configuration[self::propertyPrefix . 'DoubleID']);
        if ($currentStatus != 'OK') {
            return 'Double: ' . $currentStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Button: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'ShortID']) && IPS_VariableExists($configuration[self::propertyPrefix . 'LongID']) && IPS_VariableExists($configuration[self::propertyPrefix . 'DoubleID'])) {
            return [
                'short'  => GetValue($configuration[self::propertyPrefix . 'ShortID']),
                'long'  => GetValue($configuration[self::propertyPrefix . 'LongID']),
                'double'  => GetValue($configuration[self::propertyPrefix . 'DoubleID'])
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
            $configuration[self::propertyPrefix . 'shortID'],
            $configuration[self::propertyPrefix . 'longID'],
            $configuration[self::propertyPrefix . 'doubleID']
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
