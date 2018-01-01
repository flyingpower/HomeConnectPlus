<?php

declare(strict_types=1);

class DeviceTraitOnOff
{
    const propertyPrefix = 'OnOff';

    use HelperSwitchDevice;

    public static function getColumns()
    {
        return [
            [
                'label' => 'VariableID',
                'name'  => 'OnOffID',
                'width' => '100px',
                'add'   => 0,
                'edit'  => [
                    'type' => 'SelectVariable'
                ]
            ]
        ];
    }

    public static function getStatus($configuration)
    {
        return self::getSwitchCompatibility($configuration['OnOffID']);
    }

    public static function doQuery($configuration)
    {
        if (IPS_VariableExists($configuration['OnOffID'])) {
            return [
                'on' => self::getSwitchValue($configuration['OnOffID'])
            ];
        } else {
            return [];
        }
    }

    public static function doExecute($configuration, $command, $data)
    {
        switch ($command) {
            case 'action.devices.commands.OnOff':
                if (self::switchDevice($configuration['OnOffID'], $data['on'])) {
                    return [
                        'id'     => $configuration['ID'],
                        'status' => 'SUCCESS',
                        'states' => [
                            'on'     => self::getSwitchValue($configuration['OnOffID']),
                            'online' => true
                        ]
                    ];
                } else {
                    return [
                        'id'        => $configuration['ID'],
                        'status'    => 'ERROR',
                        'errorCode' => 'deviceTurnedOff'
                    ];
                }
                break;
            default:
                throw new Exception('Command is not supported by this trait!');
        }
    }

    public static function supportedTrait()
    {
        return 'action.devices.traits.OnOff';
    }

    public static function supportedCommands()
    {
        return [
            'action.devices.commands.OnOff'
        ];
    }
}
