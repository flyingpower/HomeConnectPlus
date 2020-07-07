<?php

declare(strict_types=1);

class DeviceTraitMeter
{
    use HelperNumberDevice;
    use HelperSetDevice;
    const propertyPrefix = 'Meter';

    public static function getColumns()
    {
        return [
            [
                'label' => 'Current consumption',
                'name'  => self::propertyPrefix . 'CurrentID',
                'width' => '200px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ],
            [
                'label' => 'Total consumption',
                'name'  => self::propertyPrefix . 'TotalID',
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
        $currentStatus = self::getGetNumberCompatibility($configuration[self::propertyPrefix . 'CurrentID']);
        if ($currentStatus != 'OK') {
            return 'Current: ' . $currentStatus;
        }

        $totalStatus = self::getGetNumberCompatibility($configuration[self::propertyPrefix . 'TotalID']);
        if ($totalStatus != 'OK') {
            return 'Total: ' . $totalStatus;
        }

        return 'OK';
    }

    public static function getStatusPrefix()
    {
        return 'Consumption: ';
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration[self::propertyPrefix . 'CurrentID']) && IPS_VariableExists($configuration[self::propertyPrefix . 'TotalID'])) {
            return [
                'currentConsumption'  => GetValue($configuration[self::propertyPrefix . 'CurrentID']),
                'totalConsumption'  => GetValue($configuration[self::propertyPrefix . 'TotalID'])
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
            $configuration[self::propertyPrefix . 'CurrentID'],
            $configuration[self::propertyPrefix . 'TotalID']
        ];
    }

    public static function supportedTraits($configuration)
    {
        return [
            'action.devices.traits.Meter'
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
            'currentConsumptionUnit' => 'W',
            'totalConsumptionUnit' => 'Wh'
        ];
    }
}
